<?php

namespace App\Models;

use App\Models\KategoriLayanan;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';

    protected $fillable = [
        'kategorilayanan_id',
        'nama',
        'deskripsi',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriLayanan::class, 'kategorilayanan_id');
    }
}
