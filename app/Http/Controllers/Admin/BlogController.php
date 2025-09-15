<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('kategori')->orderBy('created_at', 'desc')->paginate(10);
        $kategoris = KategoriBlog::all();
        return view('admin.blog.index', compact('blogs', 'kategoris'));
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
