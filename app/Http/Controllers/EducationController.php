<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{

    public function index()
    {
        $educations = Education::latest()->get();;

        return view('admin.admin-education', compact('educations'));  
    }

    public function create()
    {
        return view('admin.admin-education');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'degree' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'graduation_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/images/education'), $imageName);

        $validatedData['image'] = $imageName;

        $educations = Education::create($validatedData);

        return redirect()->route('admin.education.index')
                         ->with('success', 'Data education berhasil disimpan.')
                         ->with('educations', $educations);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data education: ' . $e->getMessage());
            return redirect()->route('admin.education.index')
                         ->with('error', 'Gagal menyimpan data education.' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        try {
            $educations = Education::findOrFail($id);

            return view('admin.admin-education', compact('educations'));
            } catch (\Exception $e) {
                Log::error('Error ketika memuat data education: ' . $e->getMessage());
                return redirect()->route('admin.education.index')
                            ->with('error', 'Gagal memuat data education.');
            }
    }

    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'degree' => 'required',
            'university' => 'required',
            'graduation_date' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $educations = Education::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($educations->image) {
                Storage::delete('public/assets/images/education/' . $educations->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/education'), $imageName);

            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $educations->update($validated);

        return redirect()->route('admin.education.index')
                         ->with('success', 'education berhasil diperbarui.');
    } catch (\Exception $e) {
        Log::error('Error ketika memperbarui education: ' . $e->getMessage());
        return redirect()->route('admin.education.index')
                         ->with('error', 'Gagal memperbarui data education.');
    }
}


    public function destroy(education $educations, $id)
    {
        try {
            $educations = Education::findOrFail($id);

            if ($educations->image) {
                Storage::delete('public/assets/images/education/' . $educations->image);
            }

            $educations->delete();

            return redirect()->route('admin.education.index')
                             ->with('success', 'education berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus education: ' . $e->getMessage());
                return redirect()->route('admin.education.index')
                                 ->with('error', 'Gagal menghapus data education.');
        }
    }
}
