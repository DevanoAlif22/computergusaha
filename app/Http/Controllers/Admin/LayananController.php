<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{


    public function index(Request $request)
    {
        $q          = trim((string) $request->query('q', ''));
        $kategoriId = $request->query('kategori');

        // whitelist kolom sort_by agar aman
        $allowedSortBy = ['created_at', 'nama', 'kategori'];
        $sortBy = $request->query('sort_by', 'created_at');
        if (!in_array($sortBy, $allowedSortBy, true)) {
            $sortBy = 'created_at';
        }

        // whitelist arah sort
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'desc';
        }

        $layanans = \App\Models\Layanan::query()
            ->with('kategori')
            // cari
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($q1) use ($q) {
                    $q1->where('nama', 'like', "%{$q}%")
                        ->orWhereHas('kategori', function ($q2) use ($q) {
                            $q2->where('nama', 'like', "%{$q}%");
                        });
                });
            })
            // filter kategori
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategorilayanan_id', $kategoriId);
            })
            // sorting
            ->when(
                $sortBy === 'kategori',
                // jika sort_by kategori → join ke tabel kategori
                function ($query) use ($sort) {
                    $query->leftJoin('kategori_layanans as k', 'k.id', '=', 'layanans.kategorilayanan_id')
                        ->select('layanans.*')
                        ->orderBy('k.nama', $sort);
                },
                // else: sort_by kolom layanan (created_at / nama)
                function ($query) use ($sortBy, $sort) {
                    $query->orderBy($sortBy, $sort);
                }
            )
            ->paginate(10)
            ->withQueryString();

        $kategoris = \App\Models\KategoriLayanan::orderBy('nama')->get();

        return view('admin.layanan.index', compact('layanans', 'kategoris', 'q', 'kategoriId', 'sortBy', 'sort'));
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
