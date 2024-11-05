<?php

namespace App\Http\Controllers;

use App\Models\MyBlog;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;


class MyBlogController extends Controller
{
    public function index(Request $request)
    {
        $my_blogs = MyBlog::latest()->paginate(10);
        $title = 'Blog';
        $desc = 'A collection of writings that reflect my thoughts and ideas, exploring various topics from a creative perspective';

        if ($request->is('admin/*')) {
            return view('admin.admin-blog', compact('my_blogs'));  
        } else {
            return view('blog', compact('my_blogs', 'title', 'desc'));  
        }
    }

public function category($slug)
{
    $my_blog_category = MyBlog::where('category', $slug)->get();

    if ($my_blog_category->isEmpty()) {
        return redirect()->route('blog')->with('error', 'Tidak ada blog ditemukan untuk kategori ini.');
    }

    return view('blog-category', compact('my_blog_category'));
}


    

    public function create()
    {
        return view('admin.admin-blog', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required',
            ]);

            $validatedData['slug'] = Str::slug($request->title);

            $imageName = time() . '.' . $request->image->extension();  
            $request->image->move(public_path('assets/images/blog'), $imageName);

            $validatedData['image'] = $imageName;

            $my_blogs = MyBlog::create($validatedData);

            return redirect()->route('admin.blog.index')
                         ->with('success', 'Data blog berhasil disimpan.')
                         ->with('my_blogs', $my_blogs);
        } catch (ValidationException $e) {
        // Jika ada kesalahan validasi, kembalikan kesalahan ini
            return redirect()->back()
                         ->withErrors($e->validator)
                         ->withInput();
        } catch (Exception $e) {
            Log::error('Error ketika menyimpan data blog: ' . $e->getMessage());
            return redirect()->route('admin.blog.index')
                         ->with('error', 'Gagal menyimpan data blog: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $my_blogs = MyBlog::findOrFail($id);
            return view('admin.admin-blog', compact('my_blogs', 'categories'));
            } catch (\Exception $e) {
                Log::error('Error ketika memuat data blog: ' . $e->getMessage());
                return redirect()->route('admin.blog.index')
                            ->with('error', 'Gagal memuat data blog.');
            }
    }

public function show($slug)
{
    try {
        // Ambil blog berdasarkan slug
        $blog = MyBlog::where('slug', $slug)->firstOrFail();
        return view('blog-detail', compact('blog'));
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('blog')->with('error', 'Blog tidak ditemukan.');
    } catch (\Exception $e) {
        return redirect()->route('blog')->with('error', 'Terjadi kesalahan.');
    }
}


    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'title' => 'required',
                'category' => 'required',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $my_blogs = MyBlog::findOrFail($id);

            $validated['slug'] = Str::slug($request->title);

            if ($request->hasFile('image')) {
                if ($my_blogs->image) {
                    Storage::delete('public/assets/images/blog/' . $my_blogs->image);
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/images/blog'), $imageName);

                $validated['image'] = $imageName;
            } else {
                unset($validated['image']);
            }

            $my_blogs->update($validated);

            return redirect()->route('admin.blog.index')
                             ->with('success', 'blog berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error ketika memperbarui blog: ' . $e->getMessage());
            return redirect()->route('admin.blog.index')
                             ->with('error', 'Gagal memperbarui data blog.');
        }
    }

    public function destroy(MyBlog $my_blogs, $id)
    {
        try {
            $my_blogs = MyBlog::findOrFail($id);

            if ($my_blogs->image) {
                Storage::delete('public/assets/images/blog/' . $my_blogs->image);
            }

            $my_blogs->delete();

            return redirect()->route('admin.blog.index')
                             ->with('success', 'blog berhasil dihapus.');
            } catch (\Exception $e) {
                Log::error('Error ketika menghapus blog: ' . $e->getMessage());
                return redirect()->route('admin.blog.index')
                             ->with('error', 'Gagal menghapus data blog.');
        }
    }
}
