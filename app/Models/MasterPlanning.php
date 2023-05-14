<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPlanning extends Model
{
    use HasFactory;
    protected $table = 'master_planning';
    public $fillable = [
        'kode',
        'qty_target',
        'waktu_target',
    ];
}
