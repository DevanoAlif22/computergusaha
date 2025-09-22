<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DigitalPengadaan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DigitalPengadaanController extends Controller
{
    protected string $folder = 'digitalpengadaan';

    public function index()
    {
        $item = DigitalPengadaan::first();
        return view('admin.pages.simple', [
            'title'     => 'Digital Pengadaan',
            'routeBase' => 'admin.digitalpengadaan',
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

        DigitalPengadaan::create($validated);
        return back()->with('success', 'Data berhasil dibuat.');
    }

    public function update(Request $request, DigitalPengadaan $digitalpengadaan)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($digitalpengadaan->gambar && Storage::disk('public')->exists($digitalpengadaan->gambar)) {
                Storage::disk('public')->delete($digitalpengadaan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        $digitalpengadaan->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(DigitalPengadaan $digitalpengadaan)
    {
        if ($digitalpengadaan->gambar && Storage::disk('public')->exists($digitalpengadaan->gambar)) {
            Storage::disk('public')->delete($digitalpengadaan->gambar);
        }
        $digitalpengadaan->delete();
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
