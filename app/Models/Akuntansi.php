<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akuntansi extends Model
{
    use HasFactory;

    protected $table = 'akuntansis';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
