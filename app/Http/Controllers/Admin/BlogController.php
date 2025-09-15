<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        $blogs = Blog::with('kategori')
            ->when($q !== '', function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhereHas('kategori', function ($q2) use ($q) {
                        $q2->where('nama', 'like', "%{$q}%");
                    });
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        // untuk dropdown kategori di modal
        $kategoris = KategoriBlog::orderBy('nama')->get();

        return view('admin.blog.index', compact('blogs', 'kategoris', 'q'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategoriblog_id' => ['required', 'exists:kategori_blogs,id'],
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('blogs', 'public');
        }

        $validated['dilihat'] = 0;

        Blog::create($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'kategoriblog_id' => ['required', 'exists:kategori_blogs,id'],
            'nama' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('blogs', 'public');
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dihapus.');
    }

    // kita pakai modal di index, jadi tidak perlu create/edit/show terpisah
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
