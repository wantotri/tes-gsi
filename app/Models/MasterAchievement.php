<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAchievement extends Model
{
    use HasFactory;
    protected $table = 'master_achievement';
    public $fillable = [
        'kode',
        'time_from',
        'time_to',
    ];
}
