<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    protected $table = 'karirs';

    protected $fillable = [
        'nama',
        'deskripsi',
        'jenis',
    ];
}
