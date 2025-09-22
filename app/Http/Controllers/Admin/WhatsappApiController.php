<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhatsappApiController extends Controller
{
    protected string $folder = 'whatsappapi';

    public function index()
    {
        $item = WhatsappApi::first();
        return view('admin.pages.simple', [
            'title'     => 'WhatsApp API',
            'routeBase' => 'admin.whatsappapi',
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

        WhatsappApi::create($validated);
        return back()->with('success', 'Data berhasil dibuat.');
    }

    public function update(Request $request, WhatsappApi $whatsappapi)
    {
        $validated = $request->validate([
            'judul'     => ['required', 'string', 'max:150'],
            'gambar'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($whatsappapi->gambar && Storage::disk('public')->exists($whatsappapi->gambar)) {
                Storage::disk('public')->delete($whatsappapi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store($this->folder, 'public');
        }

        $whatsappapi->update($validated);
        return back()->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(WhatsappApi $whatsappapi)
    {
        if ($whatsappapi->gambar && Storage::disk('public')->exists($whatsappapi->gambar)) {
            Storage::disk('public')->delete($whatsappapi->gambar);
        }
        $whatsappapi->delete();
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
