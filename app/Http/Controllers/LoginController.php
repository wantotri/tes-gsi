<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use App\Models\MasterKaryawan;
use App\Models\MasterAchievement;
use App\Models\MasterLokasi;
use App\Models\MasterItem;
use App\Models\TransaksiProduksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Loged in');
        }

        return redirect("login")->withErrors([
            'username' => ['Wrong username or password.'],
            'password' => ['Wrong username or password.'],
        ]);
    }

    public function dashboard()
    {
        $daftar_karyawan = MasterKaryawan::all();
        $daftar_lokasi = MasterLokasi::all();

        return view('dashboard', compact('daftar_lokasi', 'daftar_karyawan'));
    }

    public function inputTransaksi(Request $request)
    {
        $daftar_lokasi = MasterLokasi::all();
        $daftar_item = MasterItem::all();

        return view('transaksi.input', compact('daftar_lokasi', 'daftar_item'));
    }

    public function createTransaksi(Request $request)
    {
        TransaksiProduksi::updateOrInsert([
            'npk' => Auth::user()->username,
            'tanggal_transaksi' => $request->inputDate,
            'lokasi' => $request->inputLokasi,
            'kode' => $request->inputItem
        ], [
            'qty_actual' => $request->inputQty,
        ]);

        return back()->with('success', 'Data Transaksi Berhasil Tersimpan');
    }

    public function searchTransaksi(Request $request) {
        $filtered_transaksi = TransaksiProduksi::with(['master_lokasi', 'item'])
            ->where('lokasi', $request->inputLokasi)
            ->whereDate('tanggal_transaksi', $request->inputDate)
            ->get();

        return response()->json($filtered_transaksi);
    }

    public function getTransaksi(Request $request)
    {
        $tanggal = $request->inputDate;
        $lokasi = $request->inputLokasi;
        $karyawan = $request->inputKaryawan;

        $filtered_transaksi = TransaksiProduksi::select(DB::raw('transaksi_produksi.kode, sum(qty_actual) as total_actual, sum(qty_target) as total_target'))
            ->leftJoin('master_planning', 'transaksi_produksi.kode', '=', 'master_planning.kode')
            ->groupBy('kode')
            ->when($tanggal, function ($query, $tanggal) {
                $query->whereDate('tanggal_transaksi', $tanggal);
            })
            ->when($lokasi, function ($query, $lokasi) {
                $query->where('lokasi', $lokasi);
            })
            ->when($karyawan, function ($query, $karyawan) {
                $query->where('npk', $karyawan);
            })
            ->get();

        return response()->json($filtered_transaksi);
    }

    public function viewTransaksi(Request $request)
    {
        $daftar_lokasi = MasterLokasi::all();
        $daftar_transaksi = TransaksiProduksi::all();

        return view('transaksi.view', compact('daftar_lokasi', 'daftar_transaksi'));
    }

    public function logOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
