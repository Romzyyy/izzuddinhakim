<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SummaryController extends Controller
{
        public function index()
    {
        $summaries = Summary::latest()->get();;

        return view('admin.admin-aboutme', compact('summaries'));  
    }

    public function create()
    {
        return view('admin.admin-aboutme');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'summary' => 'required',
            'name' => 'required',
            'short_bio' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/images/summary'), $imageName);

        $validatedData['image'] = $imageName;

        $summaries = Summary::create($validatedData);

        return redirect()->route('admin.aboutme.index')
                         ->with('success', 'Data aboutme berhasil disimpan.')
                         ->with('summaries', $summaries);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data aboutme: ' . $e->getMessage());
            return redirect()->route('admin.aboutme.index')
                         ->with('error', 'Gagal menyimpan data aboutme.');
        }
    }

    public function edit(string $id)
    {
        try {
            $summaries = Summary::findOrFail($id);

            return view('admin.admin-aboutme', compact('summaries'));
            } catch (\Exception $e) {
                Log::error('Error ketika menyimpan data aboutme: ' . $e->getMessage());
                return redirect()->route('admin.aboutme.index')
                                 ->with('error', 'Gagal menyimpan data aboutme. Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'name' => 'required',
            'short_bio' => 'required',
            'summary' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $summaries = Summary::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($summaries->image) {
                Storage::delete('public/assets/images/summary/' . $summaries->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/summary'), $imageName);

            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $summaries->update($validated);

        return redirect()->route('admin.aboutme.index')
                         ->with('success', 'aboutme berhasil diperbarui.');
    } catch (\Exception $e) {
        Log::error('Error ketika memperbarui aboutme: ' . $e->getMessage());
        return redirect()->route('admin.aboutme.index')
                         ->with('error', 'Gagal memperbarui data aboutme.');
    }
}


    public function destroy(Summary $summaries, $id)
    {
        try {
            $summaries = Summary::findOrFail($id);

            if ($summaries->image) {
                Storage::delete('public/assets/images/summary/' . $summaries->image);
            }

            $summaries->delete();

            return redirect()->route('admin.aboutme.index')
                             ->with('success', 'aboutme berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus aboutme: ' . $e->getMessage());
                return redirect()->route('admin.aboutme.index')
                             ->with('error', 'Gagal menghapus data aboutme.');
        }
    }
}
