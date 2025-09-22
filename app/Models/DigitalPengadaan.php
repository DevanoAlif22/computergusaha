<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalPengadaan extends Model
{
    use HasFactory;

    protected $table = 'digitalpengadaans';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
