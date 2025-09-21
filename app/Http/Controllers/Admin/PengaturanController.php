<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pengaturan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::first(); // jika belum ada, form akan submit ke store
        return view('admin.pengaturan.index', compact('pengaturan'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_website' => ['required', 'string', 'max:150'],
            'logo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'header'       => ['nullable', 'string', 'max:255'],
            'slogan'       => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:191'],
            'nomor'        => ['nullable', 'string', 'max:50'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'instagram'    => ['nullable', 'url', 'max:255'],
            'footer_text'  => ['nullable', 'string'],
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('pengaturan', 'public');
        }

        Pengaturan::create($validated);

        return back()->with('success', 'Pengaturan berhasil dibuat.');
    }

    public function update(Request $request, Pengaturan $pengaturan)
    {
        $validated = $request->validate([
            'nama_website' => ['required', 'string', 'max:150'],
            'logo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'header'       => ['nullable', 'string', 'max:255'],
            'slogan'       => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:191'],
            'nomor'        => ['nullable', 'string', 'max:50'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'instagram'    => ['nullable', 'url', 'max:255'],
            'footer_text'  => ['nullable', 'string'],
        ]);

        if ($request->hasFile('logo')) {
            if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
                Storage::disk('public')->delete($pengaturan->logo);
            }
            $validated['logo'] = $request->file('logo')->store('pengaturan', 'public');
        }

        $pengaturan->update($validated);

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

    // opsional: jika tidak ingin delete, biarkan tidak diimplementasi/return 404
    public function destroy(Pengaturan $pengaturan)
    {
        if ($pengaturan->logo && Storage::disk('public')->exists($pengaturan->logo)) {
            Storage::disk('public')->delete($pengaturan->logo);
        }
        $pengaturan->delete();
        return back()->with('success', 'Pengaturan dihapus.');
    }

    // tidak dipakai (pakai satu halaman index)
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
