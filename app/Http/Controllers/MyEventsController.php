<?php

namespace App\Http\Controllers;

use App\Models\MyEvents;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MyEventsController extends Controller
{
    public function index(Request $request)
    {   
        $my_events = MyEvents::latest()->get();;
        $title = 'Events';
        $desc = 'Events that I have organized in collaboration with various parties, creating space for community collaboration and growth';

       
        if ($request->is('admin/*')) {
            return view('admin.admin-event', compact('my_events'));  
        } else {
            return view('event', compact('my_events', 'title', 'desc'));  
        }
    }

public function show($slug)
{
    try {
        // Ambil blog berdasarkan slug
        $event = MyEvents::where('slug', $slug)->firstOrFail();
        return view('event-detail', compact('event'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('event')->with('error', 'Event tidak ditemukan.');
    } catch (\Exception $e) {
        return redirect()->route('event')->with('error', 'Terjadi kesalahan.');
    }
}

    public function create()
    {
        return view('admin.admin-event');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required',
            'organizer' => 'required|string|max:255',
            'tanggal' => 'required',
            'link' => 'required|url',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

         $validatedData['slug'] = Str::slug($request->title);

        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('assets/images/event'), $imageName);

        $validatedData['gambar'] = $imageName;

        $my_events = MyEvents::create($validatedData);

        return redirect()->route('admin.event.index')
                         ->with('success', 'Data event berhasil disimpan.')
                         ->with('my_events', $my_events);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data event: ' . $e->getMessage());
            return redirect()->route('admin.event.index')
                         ->with('error', 'Gagal menyimpan data event.');
        }
    }

    public function edit(string $id)
    {
        try {
            $my_events = MyEvents::findOrFail($id);

            return view('admin.admin-event', compact('my_events'));
            } catch (\Exception $e) {
                Log::error('Error ketika memuat data event: ' . $e->getMessage());
                return redirect()->route('admin.event.index')
                            ->with('error', 'Gagal memuat data event.');
            }
    }

    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'organizer' => 'required',
            'tanggal' => 'required',
            'link' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $my_events = MyEvents::findOrFail($id);

         $validated['slug'] = Str::slug($request->title);

        if ($request->hasFile('gambar')) {
            if ($my_events->gambar) {
                Storage::delete('public/assets/images/event/' . $my_events->gambar);
            }

            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/event'), $imageName);

            $validated['gambar'] = $imageName;
        } else {
            unset($validated['gambar']);
        }

        $my_events->update($validated);

        return redirect()->route('admin.event.index')
                         ->with('success', 'Event berhasil diperbarui.');
    } catch (\Exception $e) {
        Log::error('Error ketika memperbarui event: ' . $e->getMessage());
        return redirect()->route('admin.event.index')
                         ->with('error', 'Gagal memperbarui data event.');
    }
}


    public function destroy(MyEvents $my_events, $id)
    {
        try {
            $my_events = MyEvents::findOrFail($id);

            if ($my_events->image) {
                Storage::delete('public/assets/images/event/' . $my_events->image);
            }

            $my_events->delete();

            return redirect()->route('admin.event.index')
                             ->with('success', 'event berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus event: ' . $e->getMessage());
                return redirect()->route('admin.event.index')
                             ->with('error', 'Gagal menghapus data event.');
        }
    }
}

