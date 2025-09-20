<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;

    protected $table = 'pengaturan';

    protected $fillable = [
        'nama_website',
        'logo',
        'header',
        'slogan',
        'email',
        'nomor',
        'linkedin',
        'instagram',
        'footer_text',
    ];

    // Optional: bantu akses URL logo langsung di Blade: $pengaturan->logo_url
    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute(): ?string
    {
        return $this->logo ? asset('storage/' . $this->logo) : null;
    }

    // (Opsional) kalau pakai 1 baris settings saja:
    // public static function singleton(): self
    // {
    //     return static::firstOrCreate(['id' => 1], [
    //         'nama_website' => 'Nama Website',
    //     ]);
    // }
}
