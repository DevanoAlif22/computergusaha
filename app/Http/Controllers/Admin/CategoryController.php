<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Tampilkan semua kategori
public function index(Request $request)
{
    $q    = $request->input('q');
    $sort = strtolower($request->query('sort', 'desc')); // default desc

    if (!in_array($sort, ['asc', 'desc'], true)) {
        $sort = 'desc';
    }

    $categories = Category::query();

    if ($q) {
        $categories->where('name', 'like', '%' . $q . '%');
    }

    $categories = $categories
        ->orderBy('id', $sort) // urut berdasarkan id (baru/lama)
        ->paginate(10)
        ->withQueryString();

    return view('admin.category.index', compact('categories', 'q', 'sort'));
}

    // Simpan kategori baru
 public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name'],
        ]);

        Category::create($validated);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Update kategori
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:categories,name,' . $category->id],
        ]);

        $category->update($validated);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Hapus kategori
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
