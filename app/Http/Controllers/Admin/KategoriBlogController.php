<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class KategoriBlogController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $kategoris = KategoriBlog::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%");
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString(); // pertahankan ?q=... di pagination

        return view('admin.kategori-blog.index', compact('kategoris', 'q'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_blogs,nama'],
        ]);

        KategoriBlog::create($validated);

        return redirect()
            ->route('admin.kategori-blog.index')
            ->with('success', 'Kategori blog berhasil dibuat.');
    }

    public function update(Request $request, KategoriBlog $kategori_blog)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255', 'unique:kategori_blogs,nama,' . $kategori_blog->id],
        ]);

        $kategori_blog->update($validated);

        return redirect()
            ->route('admin.kategori-blog.index')
            ->with('success', 'Kategori blog berhasil diperbarui.');
    }

    public function destroy(KategoriBlog $kategori_blog)
    {
        $kategori_blog->delete();

        return redirect()
            ->route('admin.kategori-blog.index')
            ->with('success', 'Kategori blog berhasil dihapus.');
    }

    // Tidak dipakai (kita pakai modal di index)
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
