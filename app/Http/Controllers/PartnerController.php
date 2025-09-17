<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        // asc/desc (default: desc)
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'desc';
        }

        $partners = Partner::query()
            ->orderBy('created_at', $sort)
            ->paginate(12)
            ->withQueryString();

        return view('admin.partner.index', compact('partners', 'sort'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => ['required', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('partners', 'public');
        }

        Partner::create($validated);

        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            // opsional: hapus file lama agar tidak orphan
            if (!empty($partner->gambar) && Storage::disk('public')->exists($partner->gambar)) {
                Storage::disk('public')->delete($partner->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        // opsional: hapus file di storage
        if (!empty($partner->gambar) && Storage::disk('public')->exists($partner->gambar)) {
            Storage::disk('public')->delete($partner->gambar);
        }

        $partner->delete();
        return redirect()->route('admin.partner.index')->with('success', 'Partner berhasil dihapus.');
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
