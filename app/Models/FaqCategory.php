<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaqCategory extends Model
{
    use HasFactory;

    protected $table = 'faq_categories';

    protected $fillable = ['nama', 'urutan'];

    public function faqs()
{
    return $this->hasMany(Faq::class, 'faq_category_id')
                ->orderBy('id', 'asc');
}
    
}
