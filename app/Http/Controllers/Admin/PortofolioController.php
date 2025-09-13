<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortofolioController extends Controller
{
    public function index()
    {
        
        $portofolio = Portofolio::all();
        return view('admin.portofolio.index', compact('portofolio'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|pimage|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('portofolio', 'public');
        }

        Portofolio::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan');
    }

    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $portofolio->gambar;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('portofolio', 'public');
        }

        $portofolio->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui');
    }

    public function destroy(Portofolio $portofolio)
    {
        $portofolio->delete();
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus');
    }

public function listPortofolio()
{
    $data = Portofolio::all();
    $categories = Category::all(); // Ambil semua kategori dari tabel

    return view('page-portfolio', compact('data', 'categories'));
}
public function showPortofolio($id)
{
    $item = Portofolio::findOrFail($id); // Atau pakai where('slug', $id) jika pakai slug
    return view('page-portfolio-detail', compact('item'));
}
}
