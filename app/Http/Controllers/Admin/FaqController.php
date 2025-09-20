<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
 public function index(Request $request)
{
    $q = trim((string) $request->query('q', ''));

    // sort_by & sort (whitelist sederhana)
    $allowedSortBy = ['created_at', 'pertanyaan'];
    $sortBy = $request->query('sort_by', 'created_at');
    if (!in_array($sortBy, $allowedSortBy, true)) {
        $sortBy = 'created_at';
    }

    $sort = strtolower($request->query('sort', 'desc'));
    if (!in_array($sort, ['asc', 'desc'], true)) {
        $sort = 'desc';
    }

    $categories = FaqCategory::orderBy('urutan')->orderBy('id')->get();

    $faqs = Faq::with('category')
        ->when($q !== '', function ($qr) use ($q) {
            $qr->where(function ($s) use ($q) {
                $s->where('pertanyaan', 'like', "%{$q}%")
                  ->orWhere('jawaban', 'like', "%{$q}%");
            });
        })
        ->orderBy($sortBy, $sort)
        ->paginate(10)
        ->withQueryString();

    return view('admin.faq.index', compact('faqs', 'categories', 'q', 'sortBy', 'sort'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'pertanyaan'      => ['required', 'string', 'max:255'],
            'jawaban'         => ['nullable', 'string'],
        ]);

        Faq::create($validated);
        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil ditambahkan.');
    }


    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'pertanyaan'      => ['required', 'string', 'max:255'],
            'jawaban'         => ['nullable', 'string'],
        ]);

        $faq->update($validated);
        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $cat = $faq->faq_category_id;
        $faq->delete();
        return redirect()->route('admin.faq.index')
            ->with('success', 'FAQ berhasil dihapus.');
    }

    // pakai modal di index
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
