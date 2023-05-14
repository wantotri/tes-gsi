<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('input-transaksi', [LoginController::class, 'inputTransaksi'])->name('input-transaksi')->middleware('auth');
Route::post('input-transaksi', [LoginController::class, 'createTransaksi'])->name('create-transaksi')->middleware('auth');
Route::get('view-transaksi', [LoginController::class, 'viewTransaksi'])->name('view-transaksi')->middleware('auth');
Route::post('search-transaksi', [LoginController::class, 'searchTransaksi'])->name('searchTransaksi')->middleware('auth');
Route::post('get-transaksi', [LoginController::class, 'getTransaksi'])->name('getTransaksi')->middleware('auth');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.custom');
Route::get('logout', [LoginController::class, 'logOut'])->name('logout');

