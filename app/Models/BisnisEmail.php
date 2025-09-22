<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BisnisEmail extends Model
{
    use HasFactory;

    protected $table = 'bisnisemails';

    protected $fillable = [
        'judul',
        'gambar',
        'deskripsi',
    ];
}
