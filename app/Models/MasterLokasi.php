<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLokasi extends Model
{
    use HasFactory;
    protected $table = 'master_lokasi';
    public $fillable = [
        'kode',
        'nama_lokasi',
    ];
}
