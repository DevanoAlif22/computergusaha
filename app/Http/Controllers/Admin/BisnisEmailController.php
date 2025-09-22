<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BisnisEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BisnisEmailController extends Controller
{
    protected string $folder = 'bisnisemail';

    public function index()
    {
        $item = BisnisEmail::first();
        return view('admin.pages.simple', [
            'title'     => 'Bisnis Email',
            'routeBase' => 'admin.bisnisemail',
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

        BisnisEmail::create($validated);
        return back()->with('success', 'Data berhasil dibuat.');
    }

    public function update(Request $request, BisnisEmail $bisnisemail)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($bisnisemail->gambar && Storage::disk('public')->exists($bisnisemail->gambar)) {
                Storage::disk('public')->delete($bisnisemail->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        $bisnisemail->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(BisnisEmail $bisnisemail)
    {
        if ($bisnisemail->gambar && Storage::disk('public')->exists($bisnisemail->gambar)) {
            Storage::disk('public')->delete($bisnisemail->gambar);
        }
        $bisnisemail->delete();
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
