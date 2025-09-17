<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PortofolioController extends Controller
{
public function index(Request $request)
{
    $q          = trim((string) $request->query('q', ''));
    $categoryId = $request->query('category');
    
    // whitelist kolom sortir
    $allowedSortBy = ['created_at', 'judul'];
    $sortBy = $request->query('sort_by', 'created_at');
    if (!in_array($sortBy, $allowedSortBy, true)) {
        $sortBy = 'created_at';
    }

    // arah sortir
    $sort = strtolower($request->query('sort', 'desc'));
    if (!in_array($sort, ['asc', 'desc'], true)) {
        $sort = 'desc';
    }

    $portofolio = Portofolio::with('category')
        ->when($q !== '', function ($query) use ($q) {
            $query->where(function ($q1) use ($q) {
                $q1->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhereHas('category', function ($q2) use ($q) {
                        $q2->where('name', 'like', "%{$q}%");
                    });
            });
        })
        ->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->orderBy($sortBy, $sort)
        ->paginate(10)
        ->withQueryString();

    $categories = Category::orderBy('name')->get();

    return view('admin.portofolio.index', compact('portofolio', 'categories', 'q', 'categoryId', 'sortBy', 'sort'));
}




 public function store(Request $request)
    {

        $validated = $request->validate([
            'category_id' => ['required', 'exists:categories,id'], // Validasi category_id
            'judul' => ['required', 'string'],
            'deskripsi' => ['nullable', 'string'],
            'gambar' => ['nullable', 'image', 'max:2048'],
        ]);
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        Portofolio::create($validated);
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }
    
public function uploadImage(Request $request)
{
    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('portofolio', 'public');
        $url = asset('storage/' . $path);
        return response($url, 200)->header('Content-Type', 'text/plain');
    }
    return response('', 400);
}
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'nullable',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $path = $portofolio->gambar;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('portofolio', 'public');
        }

        $portofolio->update([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $path,
        ]);

        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil diperbarui');
    }

    public function destroy(Portofolio $portofolio)
    {
        $portofolio->delete();
        return redirect()->route('admin.portofolio.index')->with('success', 'Portofolio berhasil dihapus');
    }

public function listPortofolio()
{
    $data = Portofolio::with('category')->get(); // biar ga query ulang2
    $categories = Category::all(); 

    return view('halaman-portofolio', compact('data', 'categories'));
}

public function showPortofolio($id)
{
    $item = Portofolio::findOrFail($id); // Atau pakai where('slug', $id) jika pakai slug
    return view('halaman-portofolio-detail', compact('item'));
}
}
