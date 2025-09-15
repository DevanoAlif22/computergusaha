<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KarirController extends Controller
{
       public function index()
    {
        $karirs = Karir::all();
        return view('admin.karir.index', compact('karirs'));
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => ['required', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'jenis' => ['required', 'string', 'max:255'],
    ]);

    Karir::create($validated);

    return redirect()->route('admin.karir.index')->with('success', 'Karir berhasil ditambahkan.');
}
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama' => ['required', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'jenis' => [
            'required',
            'string',
            Rule::in([
                'part_time',
                'contract',
                'internship',
                'freelance',
                'temporary',
                'remote',
                'hybrid',
                'volunteer',
            ]),
        ],
    ]);

    $karir = Karir::findOrFail($id);
    $karir->update($validated);

    return redirect()->route('admin.karir.index')->with('success', 'Karir berhasil diperbarui.');
}
public function destroy($id)
{
    $karir = Karir::findOrFail($id);
    $karir->delete();

    return redirect()->route('admin.karir.index')->with('success', 'Karir berhasil dihapus.');
}

}
