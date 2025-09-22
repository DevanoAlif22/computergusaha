<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhatsappApi extends Model
{
    use HasFactory;

    protected $table = 'whatsappapis';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
