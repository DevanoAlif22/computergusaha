<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class KategoriBlog extends Model
{
    protected $table = 'kategori_blogs';

    protected $fillable = ['nama'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'kategoriblog_id');
    }
}
