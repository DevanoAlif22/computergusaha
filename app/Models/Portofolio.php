<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';

    protected $fillable = [
        'category_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
