<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
        protected $table = 'applications';

    // Kolom yang boleh diisi (fillable)
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'cv_path',
        'message',
    ];
}
