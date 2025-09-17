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
        $q          = trim((string) $request->query('q', ''));
        $kategoriId = $request->query('kategori');

        // whitelist kolom sortir
        $allowedSortBy = ['created_at', 'nama', 'kategori', 'dilihat'];
        $sortBy = $request->query('sort_by', 'created_at');
        if (!in_array($sortBy, $allowedSortBy, true)) {
            $sortBy = 'created_at';
        }

        // arah sortir
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'desc';
        }

        $blogs = Blog::query()
            ->with('kategori')
            // Pencarian (judul, deskripsi, nama kategori)
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($q1) use ($q) {
                    $q1->where('nama', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%")
                        ->orWhereHas('kategori', function ($q2) use ($q) {
                            $q2->where('nama', 'like', "%{$q}%");
                        });
                });
            })
            // Filter kategori
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategoriblog_id', $kategoriId);
            })
            // Sorting
            ->when(
                $sortBy === 'kategori', // urut berdasar nama kategori
                function ($query) use ($sort) {
                    $query->leftJoin('kategori_blogs as kb', 'kb.id', '=', 'blogs.kategoriblog_id')
                        ->select('blogs.*')
                        ->orderBy('kb.nama', $sort);
                },
                function ($query) use ($sortBy, $sort) {
                    $query->orderBy($sortBy, $sort);
                }
            )
            ->paginate(10)
            ->withQueryString();

        $kategoris = \App\Models\KategoriBlog::orderBy('nama')->get();

        return view('admin.blog.index', compact('blogs', 'kategoris', 'q', 'kategoriId', 'sortBy', 'sort'));
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
