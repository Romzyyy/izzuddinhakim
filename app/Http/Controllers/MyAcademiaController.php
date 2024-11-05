<?php

namespace App\Http\Controllers;

use App\Models\MyAcademia;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MyAcademiaController extends Controller
{
    
    public function index(Request $request)
    {
        $my_academias = MyAcademia::latest()->get();;
        $title = 'Academia';
        $desc = 'Published journals as my contribution to the academic and research community';

        if ($request->is('admin/*')) {
            return view('admin.admin-academia', compact('my_academias'));  
        } else {
            return view('academia', compact('my_academias', 'title', 'desc'));  
        }

    }

    public function create()
    {
      return view('admin.admin-academia');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link_jurnal' => 'required',
        ]);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('assets/images/academia'), $imageName);

        $validatedData['gambar'] = $imageName;

        $my_academias = MyAcademia::create($validatedData);

        return redirect()->route('admin.academia.index')
                         ->with('success', 'Data academiaberhasil disimpan.')
                         ->with('my_academias', $my_academias);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan academia: ' . $e->getMessage());
            return redirect()->route('admin.academia.index')
                         ->with('error', 'Gagal menyimpan data paket layanan.');
        }
    }


    public function edit(string $id)
{
        try {
        $my_academias = MyAcademia::findOrFail($id);

        return view('admin.admin-academia', compact('my_academias'));
        } catch (\Exception $e) {
            Log::error('Error ketika memuat data academia: ' . $e->getMessage());
            return redirect()->route('admin.academia.index')
                            ->with('error', 'Gagal memuat data academia.');
        }

}

public function update(Request $request, $id)
{
    try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'link_jurnal' => 'required',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]);

            $my_academias = MyAcademia::findOrFail($id);

            if ($request->hasFile('gambar')) {
                if ($my_academias->gambar) {
                    Storage::delete('public/assets/images/academia/' . $my_academias->gambar);
                }

                $image = $request->file('gambar');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/academia'), $imageName);

                $validated['gambar'] = $imageName; 
            } else {
                unset($validated['gambar']);
            }
        
            $my_academias->update($validated);

            return redirect()->route('admin.academia.index')
                         ->with('success', 'Academia berhasil diperbarui.')
                         ->with('my_academias', $my_academias);
        } catch (\Exception $e) {
            Log::error('Error ketika memperbarui academia: ' . $e->getMessage());
            return redirect()->route('admin.academia.index')
                         ->with('error', 'Gagal memperbarui data academia.');
        }
    }

    public function destroy(MyAcademia $my_academias, $id)
    {
        try {
        $my_academias = MyAcademia::findOrFail($id);

        if ($my_academias->image) {
            Storage::delete('public/assets/images/academia/' . $my_academias->image);
        }

        $my_academias->delete();

        return redirect()->route('admin.academia.index')
                         ->with('success', 'academia berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error ketika menghapus academia: ' . $e->getMessage());
            return redirect()->route('admin.academia.index')
                         ->with('error', 'Gagal menghapus data academia.');
        }
    }

}
    