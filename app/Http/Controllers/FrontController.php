<?php

namespace App\Http\Controllers;

use App\Models\Ceo;
use App\Models\Blog;
use App\Models\Karir;
use App\Models\Journey;
use App\Models\Layanan;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class FrontController extends Controller
{
public function index()
{
    $layanans = Layanan::with('kategori')->get();
    $portofolios = Portofolio::with('category')->latest()->get();
    $blogs = Blog::with('kategori')->latest()->take(5)->get(); // ambil 5 terbaru

    return view('index', compact('layanans', 'portofolios', 'blogs'));
}

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

public function about()
{
    $ceos = Ceo::all();
    $journeys = Journey::orderBy('tahun', 'asc')->get();
    $partners = Partner::all();
    $layanans = Layanan::all();
    $blogs = Blog::latest()->take(4)->get(); // ambil 4 blog terbaru

    return view('tentang-kami', compact('ceos', 'journeys', 'partners', 'layanans', 'blogs'));
}
}
