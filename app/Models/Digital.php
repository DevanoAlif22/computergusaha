<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Digital extends Model
{
    use HasFactory;

    protected $table = 'digitals';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
