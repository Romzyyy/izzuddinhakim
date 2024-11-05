<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();;

        return view('admin.admin-experience', compact('experiences'));  
    }

    public function create()
    {
        return view('admin.admin-experience');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'currently_working' => 'nullable|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('assets/images/experience'), $imageName);

        $validatedData['image'] = $imageName;

        $experiences = Experience::create($validatedData);

        return redirect()->route('admin.experience.index')
                         ->with('success', 'Data experience berhasil disimpan.')
                         ->with('experiences', $experiences);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data experience: ' . $e->getMessage());
            return redirect()->route('admin.experience.index')
                         ->with('error', 'Gagal menyimpan data experience.'. $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        try {
            $experiences = Experience::findOrFail($id);

            return view('admin.admin-experience', compact('experiences'));
            } catch (\Exception $e) {
                Log::error('Error ketika memuat data experience: ' . $e->getMessage());
                return redirect()->route('admin.experience.index')
                            ->with('error', 'Gagal memuat data experience.');
            }
    }

    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'company_name' => 'required',
            'job_title' => 'required',
            'job_description' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'currently_working' => 'required|boolean', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $experiences = Experience::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($experiences->image) {
                Storage::delete('public/assets/images/experience/' . $experiences->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/experience'), $imageName);

            $validated['image'] = $imageName;
        } else {
            unset($validated['image']);
        }

        $experiences->update($validated);

        return redirect()->route('admin.experience.index')
                         ->with('success', 'experience berhasil diperbarui.');
    } catch (\Exception $e) {
        Log::error('Error ketika memperbarui experience: ' . $e->getMessage());
        return redirect()->route('admin.experience.index')
                         ->with('error', 'Gagal memperbarui data experience.' );
    }
}


    public function destroy(experience $experiences, $id)
    {
        try {
            $experiences = Experience::findOrFail($id);

            if ($experiences->image) {
                Storage::delete('public/assets/images/experience/' . $experiences->image);
            }

            $experiences->delete();

            return redirect()->route('admin.experience.index')
                             ->with('success', 'experience berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus experience: ' . $e->getMessage());
                return redirect()->route('admin.experience.index')
                             ->with('error', 'Gagal menghapus data experience.');
        }
    }
}
