<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ecosystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EcosystemController extends Controller
{
    public function index(Request $request)
    {
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) $sort = 'desc';

        $q = trim((string)$request->query('q', ''));

        $ecosystems = Ecosystem::query()
            ->when($q !== '', fn($qr) => $qr->where('link', 'like', "%{$q}%"))
            ->orderBy('created_at', $sort)
            ->paginate(12)
            ->withQueryString();

        return view('admin.ecosystem.index', compact('ecosystems', 'sort', 'q'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => ['required', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ecosystems', 'public');
        }

        Ecosystem::create($validated);
        return redirect()->route('admin.ecosystem.index')->with('success', 'Ecosystem berhasil ditambahkan.');
    }

    public function update(Request $request, Ecosystem $ecosystem)
    {
        $validated = $request->validate([
            'gambar' => ['nullable', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($ecosystem->gambar && Storage::disk('public')->exists($ecosystem->gambar)) {
                Storage::disk('public')->delete($ecosystem->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('ecosystems', 'public');
        }

        $ecosystem->update($validated);
        return redirect()->route('admin.ecosystem.index')->with('success', 'Ecosystem berhasil diperbarui.');
    }

    public function destroy(Ecosystem $ecosystem)
    {
        if ($ecosystem->gambar && Storage::disk('public')->exists($ecosystem->gambar)) {
            Storage::disk('public')->delete($ecosystem->gambar);
        }
        $ecosystem->delete();
        return redirect()->route('admin.ecosystem.index')->with('success', 'Ecosystem berhasil dihapus.');
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
