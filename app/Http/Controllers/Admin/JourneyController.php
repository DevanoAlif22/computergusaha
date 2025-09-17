<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index(Request $request)
    {
        $q      = trim((string) $request->query('q', ''));
        $tahun  = $request->query('tahun');

        // whitelist kolom sort
        $allowedSortBy = ['tahun', 'nama', 'created_at'];
        $sortBy = $request->query('sort_by', 'tahun');
        if (!in_array($sortBy, $allowedSortBy, true)) {
            $sortBy = 'tahun';
        }

        // arah sort
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'desc';
        }

        $journeys = Journey::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where(function ($q1) use ($q) {
                    $q1->where('nama', 'like', "%{$q}%")
                        ->orWhere('deskripsi', 'like', "%{$q}%");
                });
            })
            ->when($tahun, fn($query) => $query->where('tahun', $tahun))
            ->orderBy($sortBy, $sort)
            ->paginate(10)
            ->withQueryString();

        // list tahun untuk dropdown filter
        $years = Journey::query()
            ->select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view('admin.journey.index', compact('journeys', 'years', 'q', 'tahun', 'sortBy', 'sort'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tahun'     => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . (date('Y') + 10)],
        ]);

        Journey::create($validated);
        return redirect()->route('admin.journey.index')->with('success', 'Journey berhasil ditambahkan.');
    }

    public function update(Request $request, Journey $journey)
    {
        $validated = $request->validate([
            'nama'      => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'tahun'     => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . (date('Y') + 10)],
        ]);

        $journey->update($validated);
        return redirect()->route('admin.journey.index')->with('success', 'Journey berhasil diperbarui.');
    }

    public function destroy(Journey $journey)
    {
        $journey->delete();
        return redirect()->route('admin.journey.index')->with('success', 'Journey berhasil dihapus.');
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
