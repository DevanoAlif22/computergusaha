<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $sort = strtolower($request->query('sort', 'desc'));
        if (!in_array($sort, ['asc', 'desc'], true)) $sort = 'desc';

        $q = trim((string)$request->query('q', ''));

        $clients = Client::query()
            ->when(
                $q !== '',
                fn($qr) =>
                $qr->where('link', 'like', "%{$q}%")
            )
            ->orderBy('created_at', $sort)
            ->paginate(12)
            ->withQueryString();

        return view('admin.client.index', compact('clients', 'sort', 'q'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gambar' => ['required', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('clients', 'public');
        }

        Client::create($validated);
        return redirect()->route('admin.client.index')->with('success', 'Client berhasil ditambahkan.');
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'gambar' => ['nullable', 'image', 'max:2048'],
            'link'   => ['nullable', 'max:255'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($client->gambar && Storage::disk('public')->exists($client->gambar)) {
                Storage::disk('public')->delete($client->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('clients', 'public');
        }

        $client->update($validated);
        return redirect()->route('admin.client.index')->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($client->gambar && Storage::disk('public')->exists($client->gambar)) {
            Storage::disk('public')->delete($client->gambar);
        }
        $client->delete();
        return redirect()->route('admin.client.index')->with('success', 'Client berhasil dihapus.');
    }

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
