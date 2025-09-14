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

        $portofolio = Portofolio::with('category')->get();
        $categories = Category::all();
        return view('admin.portofolio.index', compact('portofolio', 'categories'));
    }


 public function store(Request $request)
    {

        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'], // Validasi category_id
            'judul' => ['required', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        Portofolio::create($validated);
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
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
    $data = Portofolio::with('category')->get(); // biar ga query ulang2
    $categories = Category::all(); 

    return view('halaman-portofolio', compact('data', 'categories'));
}

public function showPortofolio($id)
{
    $item = Portofolio::findOrFail($id); // Atau pakai where('slug', $id) jika pakai slug
    return view('halaman-portofolio-detail', compact('item'));
}
}
