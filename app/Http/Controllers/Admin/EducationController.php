<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) $sort = 'desc';

        $q = trim((string)$request->query('q', ''));

        $educations = Education::query()
            ->when($q !== '', fn($qr) => $qr->where('link', 'like', "%{$q}%"))
            ->orderBy('created_at', $sort)
            ->paginate(12)
            ->withQueryString();

        return view('admin.education.index', compact('educations', 'sort', 'q'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => ['required', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('educations', 'public');
        }

        Education::create($validated);
        return redirect()->route('admin.education.index')->with('success', 'Education berhasil ditambahkan.');
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'gambar' => ['nullable', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($education->gambar && Storage::disk('public')->exists($education->gambar)) {
                Storage::disk('public')->delete($education->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('educations', 'public');
        }

        $education->update($validated);
        return redirect()->route('admin.education.index')->with('success', 'Education berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        if ($education->gambar && Storage::disk('public')->exists($education->gambar)) {
            Storage::disk('public')->delete($education->gambar);
        }
        $education->delete();
        return redirect()->route('admin.education.index')->with('success', 'Education berhasil dihapus.');
    }

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
