<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use App\Models\Category;
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
}
