<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Auth extends Model
{
    use HasFactory;

    protected $table = '__users';
    protected $fillable = [
        'Email',
        'UserName',
        'Hpasswd',
    ];  
}
