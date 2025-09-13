<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class, 'category_id');
    }
}
