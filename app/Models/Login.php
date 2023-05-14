<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;
    public $fillable = [
        'username',
        'password',
        'create_date',
        'created_by',
    ];
}
