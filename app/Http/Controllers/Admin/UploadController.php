<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class UploadController extends Controller
{
    public function summernote(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => ['required', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:2048'], // 2MB
        ]);

        // Simpan ke storage/public/summernote
        $path = $request->file('file')->store('summernote', 'public');

        // Kembalikan URL publik
        return response()->json([
            'url' => asset('storage/' . $path),
        ]);
    }
    public function uploadImage(Request $request)
    {
        try {
            // Validasi file
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // max 2MB
            ]);

            $file = $request->file('file');

            // Generate nama file unik
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            // Simpan ke storage/app/public/uploads/editor
            $path = $file->storeAs('uploads/editor', $filename, 'public');

            // Return URL untuk digunakan di editor
            $url = asset('storage/' . $path);

            return response()->json([
                'success' => true,
                'url' => $url,
                'path' => $path,
                'message' => 'Image uploaded successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Exception $e) {
            Log::error('Image upload error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
