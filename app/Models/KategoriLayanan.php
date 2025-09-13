<?php

namespace App\Models;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;

class KategoriLayanan extends Model
{
    protected $table = 'kategori_layanans';

    protected $fillable = ['nama'];

    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'kategorilayanan_id');
    }
}
