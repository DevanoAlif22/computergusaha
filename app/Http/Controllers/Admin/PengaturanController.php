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
        $pengaturan = Pengaturan::first(); // singleton
        return view('admin.pengaturan.index', compact('pengaturan'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_website' => ['required', 'string', 'max:150'],
            'logo'         => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'header'       => ['nullable', 'string', 'max:255'], // header text/judul
            'slogan'       => ['nullable', 'string', 'max:255'],
            'email'        => ['nullable', 'email', 'max:191'],
            'nomor'        => ['nullable', 'string', 'max:50'],
            'linkedin'     => ['nullable', 'url', 'max:255'],
            'instagram'    => ['nullable', 'url', 'max:255'],
            'footer_text'  => ['nullable', 'string'],
        ]);

        $pengaturan = Pengaturan::first() ?? new Pengaturan();

        // handle upload logo
        if ($request->hasFile('logo')) {
            // hapus logo lama kalau ada
            if (!empty($pengaturan->logo) && Storage::disk('public')->exists($pengaturan->logo)) {
                Storage::disk('public')->delete($pengaturan->logo);
            }
            $validated['logo'] = $request->file('logo')->store('pengaturan', 'public');
        } else {
            // kalau tidak upload, jangan overwrite kolom logo ke null
            unset($validated['logo']);
        }

        $pengaturan->fill($validated)->save();

        return back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
