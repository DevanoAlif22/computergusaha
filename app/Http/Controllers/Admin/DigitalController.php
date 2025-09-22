<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Digital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DigitalController extends Controller
{
    protected string $folder = 'digital';

    public function index()
    {
        $item = Digital::first();
        return view('admin.pages.simple', [
            'title'     => 'Digital',
            'routeBase' => 'admin.digital',
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

        Digital::create($validated);
        return back()->with('success', 'Data berhasil dibuat.');
    }

    public function update(Request $request, Digital $digital)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($digital->gambar && Storage::disk('public')->exists($digital->gambar)) {
                Storage::disk('public')->delete($digital->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        $digital->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Digital $digital)
    {
        if ($digital->gambar && Storage::disk('public')->exists($digital->gambar)) {
            Storage::disk('public')->delete($digital->gambar);
        }
        $digital->delete();
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
