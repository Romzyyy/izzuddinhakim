<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    if ($request->hasFile('file')) {
        try {
            $file = $request->file('file');
            $path = $file->store('images', 'public');

            return response()->json([
                'url' => asset('storage/' . $path)
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    return response()->json(['error' => 'Image upload failed, file tidak ditemukan.'], 400);
}



}
