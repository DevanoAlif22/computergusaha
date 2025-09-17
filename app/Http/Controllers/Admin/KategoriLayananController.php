<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class KategoriLayananController extends Controller
{

    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $sort = $request->query('sort', 'desc'); // default desc

        $kategoris = KategoriLayanan::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%");
            })
            ->orderBy('created_at', $sort) // pakai asc/desc sesuai query string
            ->paginate(10)
            ->withQueryString();

        return view('admin.kategori-layanan.index', compact('kategoris', 'q', 'sort'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_layanans,nama'],
        ]);

        KategoriLayanan::create($validated);

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil dibuat.');
    }

    public function update(Request $request, KategoriLayanan $kategori_layanan)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_layanans,nama,' . $kategori_layanan->id],
        ]);

        $kategori_layanan->update($validated);

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    public function destroy(KategoriLayanan $kategori_layanan)
    {
        $kategori_layanan->delete();

        return redirect()
            ->route('admin.kategori-layanan.index')
            ->with('success', 'Kategori layanan berhasil dihapus.');
    }

    // opsional kalau mau pakai create/show/edit terpisah via halaman lain
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
