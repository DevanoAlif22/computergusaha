<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

// ==== sesuaikan nama model di projectmu ====
use App\Models\User;
use App\Models\KategoriLayanan;
use App\Models\Layanan;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\KategoriBlog;
use App\Models\Blog;
use App\Models\Kontak; // kalau ada tabel kontak/form contact

class DashboardController extends Controller
{
    public function index()
    {
        // Ringkasan jumlah (gunakan null coalescing untuk aman kalau model belum ada)
        $stats = [
            'users'            => User::query()->count() ?? 0,
            'kategoriLayanan'  => KategoriLayanan::query()->count() ?? 0,
            'layanan'          => Layanan::query()->count() ?? 0,
            'category'         => Category::query()->count() ?? 0,
            'portofolio'       => Portofolio::query()->count() ?? 0,
            'kategoriBlog'     => KategoriBlog::query()->count() ?? 0,
            'blog'             => Blog::query()->count() ?? 0,
            // 'kontak'           => class_exists(Kontak::class) ? (Kontak::query()->count() ?? 0) : 0,
        ];

        // Data terbaru (limit 5)
        $recent = [
            'blogs'    => Blog::with('kategori')->latest()->take(5)->get(),
            'layanan'  => Layanan::with('kategori')->latest()->take(5)->get(),
            'projects' => Portofolio::latest()->take(5)->get(),
        ];

        $me = Auth::user();

        return view('admin.dashboard.index', compact('stats', 'recent', 'me'));
    }
}
