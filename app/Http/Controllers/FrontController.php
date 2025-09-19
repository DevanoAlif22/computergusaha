<?php

namespace App\Http\Controllers;

use App\Models\Ceo;
use App\Models\Blog;
use App\Models\Karir;
use App\Models\Client;
use App\Models\Journey;
use App\Models\Lamaran;
use App\Models\Layanan;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Ecosystem;
use App\Models\Education;
use App\Models\Portofolio;
use App\Models\FaqCategory;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;
use App\Models\Application;

class FrontController extends Controller
{
public function index()
{
    $layanans = Layanan::with('kategori')->get();
    $portofolios = Portofolio::with('category')->latest()->get();
    $blogs = Blog::with('kategori')->latest()->take(5)->get();
    $clients = Client::all(); 
    $ecosystems = Ecosystem::all(); 
    $educations = Education::all(); // ambil semua education

    return view('index', compact('layanans', 'portofolios', 'blogs', 'clients', 'ecosystems', 'educations'));
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
public function storeApplication(Request $request)
{
    $validated = $request->validate([
        'full_name'   => 'required|string|max:255',
        'email'       => 'required|email',
        'phone_number'=> 'required|string|max:20',
        'cv_file'     => 'required|mimes:pdf,doc,docx|max:2048',
        'message'     => 'nullable|string',
    ]);

    // Upload file CV
    if ($request->hasFile('cv_file')) {
        $cvPath = $request->file('cv_file')->store('cv', 'public');
        $validated['cv_path'] = $cvPath;
    }

    unset($validated['cv_file']); // hapus sebelum insert

    Lamaran::create($validated);

    return redirect()->route('karir.index')->with('success', 'Lamaran berhasil dikirim!');
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
public function faq()
{
    $categories = FaqCategory::with('faqs')
                    ->orderBy('id', 'asc') // urut kategori by id
                    ->get();

    return view('faq', compact('categories'));
}



}
