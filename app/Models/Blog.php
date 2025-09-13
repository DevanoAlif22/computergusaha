<?php

namespace App\Models;

use App\Models\Komentar;
use App\Models\KategoriBlog;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'kategoriblog_id',
        'nama',
        'deskripsi',
        'gambar',
        'dilihat',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBlog::class, 'kategoriblog_id');
    }

    public function komentars()
    {
        return $this->hasMany(Komentar::class);
    }
}
