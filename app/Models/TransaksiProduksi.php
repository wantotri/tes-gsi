<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi_produksi';
    public $fillable = [
        'npk',
        'tanggal_transaksi',
        'lokasi',
        'kode',
        'qty_actual',
    ];
    public $timestamps = false;

    /**
     * Get the karyawan that owns the TransaksiProduksi
     */
    public function karyawan()
    {
        return $this->belongsTo(MasterKaryawan::class, 'npk', 'npk');
    }

    /**
     * Get the lokasi that owns the TransaksiProduksi
     */
    public function master_lokasi()
    {
        return $this->belongsTo(MasterLokasi::class, 'lokasi', 'kode');
    }

    /**
     * Get the item that owns the TransaksiProduksi
     */
    public function item()
    {
        return $this->belongsTo(MasterItem::class, 'kode', 'kode');
    }
}
