<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ceo;
use Illuminate\Http\Request;

class CeoController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $ceos = Ceo::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.ceo.index', compact('ceos', 'q'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'gambar'    => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ceos', 'public');
        }

        Ceo::create($validated);

        return redirect()->route('admin.ceo.index')->with('success', 'Data CEO berhasil ditambahkan.');
    }

    public function update(Request $request, Ceo $ceo)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'gambar'    => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ceos', 'public');
        }

        $ceo->update($validated);

        return redirect()->route('admin.ceo.index')->with('success', 'Data CEO berhasil diperbarui.');
    }

    public function destroy(Ceo $ceo)
    {
        $ceo->delete();
        return redirect()->route('admin.ceo.index')->with('success', 'Data CEO berhasil dihapus.');
    }

    // Modal langsung di index, jadi ini tidak dipakai
    public function create()
    {
        abort(404);
    }
    public function edit()
    {
        abort(404);
    }
    public function show()
    {
        abort(404);
    }
}
