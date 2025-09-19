<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function index(Request $request)
{
    $q    = $request->input('q'); // keyword pencarian
    $sort = strtolower($request->query('sort', 'desc')); // default desc

    // validasi sort hanya asc/desc
    if (!in_array($sort, ['asc', 'desc'], true)) {
        $sort = 'desc';
    }

    $applications = Lamaran::query();

    // filter pencarian (nama / email / nomor hp / pesan)
    if ($q) {
        $applications->where(function ($query) use ($q) {
            $query->where('full_name', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%')
                ->orWhere('phone_number', 'like', '%' . $q . '%')
                ->orWhere('message', 'like', '%' . $q . '%');
        });
    }

    // sorting berdasarkan created_at (lamaran terbaru / terlama)
    $applications = $applications
        ->orderBy('created_at', $sort)
        ->paginate(10)
        ->withQueryString();

    return view('admin.lamaran.index', compact('applications', 'q', 'sort'));
}
  public function destroy($id)
    {
        $application = Lamaran::findOrFail($id);

        // kalau ada file CV, hapus juga dari storage
        if ($application->cv_path && \Storage::disk('public')->exists($application->cv_path)) {
            \Storage::disk('public')->delete($application->cv_path);
        }

        $application->delete();

        return redirect()
            ->route('admin.lamaran.index')
            ->with('success', 'Lamaran berhasil dihapus!');
    }

}
