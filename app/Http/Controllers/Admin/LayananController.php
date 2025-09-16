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
        $q = trim((string) $request->query('q', ''));
        $kategoriId = $request->query('kategori');

        $layanans = Layanan::with('kategori')
            ->when($q !== '', function ($query) use ($q) {
                // group kondisi pencarian agar tidak bentrok dengan filter lain
                $query->where(function ($q1) use ($q) {
                    $q1->where('nama', 'like', "%{$q}%")
                        ->orWhereHas('kategori', function ($q2) use ($q) {
                            $q2->where('nama', 'like', "%{$q}%");
                        });
                });
            })
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategorilayanan_id', $kategoriId);
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        $kategoris = KategoriLayanan::orderBy('nama')->get();

        return view('admin.layanan.index', compact('layanans', 'kategoris', 'q', 'kategoriId'));
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
