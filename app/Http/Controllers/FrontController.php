<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Karir;
use App\Models\Category;
use App\Models\KategoriBlog;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function listPortofolio()
{
    $data = Portofolio::with('category')->get(); // biar ga query ulang2
    $categories = Category::all(); 

    return view('portofolio', compact('data', 'categories'));
}

public function detailPortofolio($id)
{
    $item = Portofolio::findOrFail($id); // Atau pakai where('slug', $id) jika pakai slug
    return view('portofolio-detail', compact('item'));
}
 public function listKarir()
    {
        // Ambil semua data karir terbaru
        $karirs = Karir::latest()->get();

        // Kirim ke view 'karir.blade.php'
        return view('karir', compact('karirs'));
    }

      public function detailKarir($id)
    {

        $karir = Karir::findOrFail($id);
        return view('karir-detail', compact('karir'));
    }
public function listBlog()
{
    $blogs = Blog::with('kategori')->latest()->paginate(7);
    $allBlogs = Blog::with('kategori')->latest()->get();

    $popularBlogs = Blog::with('kategori')
        ->orderBy('dilihat', 'desc')
        ->take(3)
        ->get();

    $recentPosts = Blog::with('kategori')
        ->latest()
        ->take(4)
        ->get();

    // ambil kategori dengan total blog yang terkait
    $categories = KategoriBlog::withCount('blogs')->get();

    return view('blog', compact('blogs', 'popularBlogs', 'recentPosts', 'categories', 'allBlogs'));
}
public function detailBlog($id) {
    // Ambil blog berdasarkan ID
    $blog = Blog::findOrFail($id);

    // Tambahkan jumlah dilihat (optional)
    $blog->increment('dilihat');

    return view('blog-detail', compact('blog'));
}



}
