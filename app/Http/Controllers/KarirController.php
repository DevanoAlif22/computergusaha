<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KarirController extends Controller
{

public function index(Request $request)
{
    $q    = $request->input('q');
    $sort = strtolower($request->query('sort', 'desc')); // default desc

    if (!in_array($sort, ['asc', 'desc'], true)) {
        $sort = 'desc';
    }

    $karirs = Karir::query();

    if ($q) {
        $karirs->where('nama', 'like', '%' . $q . '%');
    }

    $karirs = $karirs
        ->orderBy('id', $sort) // urut berdasarkan id (baru/lama)
        ->paginate(10)
        ->withQueryString();

    return view('admin.karir.index', compact('karirs', 'q', 'sort'));
}

public function store(Request $request)
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

    Karir::create($validated);

    return redirect()
        ->route('admin.karir.index')
        ->with('success', 'Karir berhasil ditambahkan.');
}

public function update(Request $request, Karir $karir)
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

    $karir->update($validated);

    return redirect()
        ->route('admin.karir.index')
        ->with('success', 'Karir berhasil diperbarui.');
}

public function destroy(Karir $karir)
{
    $karir->delete();

    return redirect()
        ->route('admin.karir.index')
        ->with('success', 'Karir berhasil dihapus.');
}

}
