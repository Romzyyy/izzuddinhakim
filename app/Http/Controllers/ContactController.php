<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class ContactController extends Controller
{
public function index(Request $request)
{
    $socialMediaContact = Contact::where('type', 'social')->get();
    $officialContact = Contact::where('type', 'official')->get();
    $contacts = Contact::all();

    $title = 'Contact';
    $desc = 'Find my content on social media, or reach out to me for collaboration opportunities and joint projects';

    // Cek apakah URL saat ini berada dalam konteks admin
    if ($request->is('admin/*')) {
        // Jika admin, kembalikan view admin
        return view('admin.admin-contact', compact('socialMediaContact', 'officialContact', 'contacts'));
    } else {
        // Jika bukan admin, kembalikan view untuk user
        return view('contact', compact('socialMediaContact', 'officialContact', 'contacts', 'title', 'desc'));
    }
}


        public function create()
    {
        return view('admin.admin-contact');
    }

    public function store(Request $request)
    {
        try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required',
            'type' => 'required|string|max:255',
        ]);

           $contacts = Contact::create($validatedData);

        return redirect()->route('admin.contact.index')
                         ->with('success', 'Data contact berhasil disimpan.')
                         ->with('contacts', $contacts);
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data contact: ' . $e->getMessage());
            return redirect()->route('admin.contact.index')
                             ->with('error', 'Gagal menyimpan data contact.');
        }
    }

    public function edit(string $id)
    {
        try {
            $contacts = Contact::findOrFail($id);

            return view('admin.admin-contact', compact('contacts'));
            } catch (\Exception $e) {
                Log::error('Error ketika memuat data contact: ' . $e->getMessage());
                return redirect()->route('admin.contact.index')
                            ->with('error', 'Gagal memuat data contact.');
            }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'link' => 'required',
                'type' => 'required|string|max:255',
            ]);

            $contacts = Contact::findOrFail($id);

            $contacts->update($validated);

            return redirect()->route('admin.contact.index')
                             ->with('success', 'contact berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error ketika memperbarui contact: ' . $e->getMessage());
            return redirect()->route('admin.contact.index')
                             ->with('error', 'Gagal memperbarui data contact.');
        }
    }

        public function destroy(Contact $contacts, $id)
    {
        try {
            $contacts = Contact::findOrFail($id);

            $contacts->delete();

            return redirect()->route('admin.contact.index')
                             ->with('success', 'contact berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus contact: ' . $e->getMessage());
                return redirect()->route('admin.contact.index')
                             ->with('error', 'Gagal menghapus data contact.');
        }
    }
}
