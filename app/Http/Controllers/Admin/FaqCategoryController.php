<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));

        // sort_by & sort (whitelist)
        $allowedSortBy = ['urutan', 'nama', 'created_at'];
        $sortBy = $request->query('sort_by', 'urutan');
        if (!in_array($sortBy, $allowedSortBy, true)) {
            $sortBy = 'urutan';
        }

        $sort = strtolower($request->query('sort', 'asc'));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'asc';
        }

        $categories = FaqCategory::query()
            ->withCount('faqs')
            ->when($q !== '', fn($qr) => $qr->where('nama', 'like', "%{$q}%"))
            ->orderBy($sortBy, $sort)
            ->orderBy('id', $sort)
            ->paginate(10)
            ->withQueryString();

        return view('admin.faq-category.index', compact('categories', 'q', 'sortBy', 'sort'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'   => ['required', 'string', 'max:150'],
            'urutan' => ['nullable', 'integer', 'min:0'],
        ]);

        FaqCategory::create($validated);
        return redirect()->route('admin.faq-category.index')->with('success', 'Kategori FAQ berhasil ditambahkan.');
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $request->validate([
            'nama'   => ['required', 'string', 'max:150'],
            'urutan' => ['nullable', 'integer', 'min:0'],
        ]);

        $faqCategory->update($validated);
        return redirect()->route('admin.faq-category.index')->with('success', 'Kategori FAQ berhasil diperbarui.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        if ($faqCategory->faqs()->exists()) {
            return back()->withErrors(['Kategori masih memiliki FAQ. Hapus/ubah FAQ terlebih dahulu.']);
        }
        $faqCategory->delete();
        return redirect()->route('admin.faq-category.index')->with('success', 'Kategori FAQ berhasil dihapus.');
    }

    // tidak dipakai (pakai modal di index)
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
