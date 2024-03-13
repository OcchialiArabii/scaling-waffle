<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllLists extends Model
{
    use HasFactory;
    protected $table = '__lists';
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'private',
        'lang1',
        'lang2'
    ];
}
