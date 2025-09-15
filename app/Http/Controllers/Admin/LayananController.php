<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        $kategoris = KategoriLayanan::all();
        return view('admin.layanan.index', compact('layanans', 'kategoris'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategorilayanan_id' => ['required', 'exists:kategori_layanans,id'],
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dibuat.');
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'kategorilayanan_id' => ['required', 'exists:kategori_layanans,id'],
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('layanan', 'public');
        }

        $layanan->update($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    // optional
    public function create()
    {
        abort(404);
    }
    public function show()
    {
        abort(404);
    }
    public function edit()
    {
        abort(404);
    }
}
