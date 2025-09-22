<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akuntansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AkuntansiController extends Controller
{
    protected string $folder = 'akuntansi';

    public function index()
    {
        $item = Akuntansi::first();
        return view('admin.pages.simple', [
            'title'     => 'Akuntansi',
            'routeBase' => 'admin.akuntansi',
            'item'      => $item,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        Akuntansi::create($validated);
        return back()->with('success', 'Data berhasil dibuat.');
    }

    public function update(Request $request, Akuntansi $akuntansi)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($akuntansi->gambar && Storage::disk('public')->exists($akuntansi->gambar)) {
                Storage::disk('public')->delete($akuntansi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        $akuntansi->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Akuntansi $akuntansi)
    {
        if ($akuntansi->gambar && Storage::disk('public')->exists($akuntansi->gambar)) {
            Storage::disk('public')->delete($akuntansi->gambar);
        }
        $akuntansi->delete();
        return back()->with('success', 'Data dihapus.');
    }

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
