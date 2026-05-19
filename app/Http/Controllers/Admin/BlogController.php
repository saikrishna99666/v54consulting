<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('category', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('last_updated')
            ->paginate(15)
            ->withQueryString();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $image1Name = null;
        if ($request->hasFile('image1')) {
            $image1Name = time() . '_1_' . $request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('uploads/blogs'), $image1Name);
        }

        $image2Name = null;
        if ($request->hasFile('image2')) {
            $image2Name = time() . '_2_' . $request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path('uploads/blogs'), $image2Name);
        }

        $data = $request->except(['_token', 'image1', 'image2']);
        $data['blogurl'] = $request->blogurl ?: Str::slug($request->name);
        $data['last_updated'] = now();
        $data['image1'] = $image1Name;
        $data['image2'] = $image2Name;

        Blog::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $data = $request->except(['_token', '_method', 'image1', 'image2']);
        $data['blogurl'] = $request->blogurl ?: Str::slug($request->name);
        $data['last_updated'] = now();

        if ($request->hasFile('image1')) {
            if ($blog->image1 && file_exists(public_path('uploads/blogs/' . $blog->image1))) {
                @unlink(public_path('uploads/blogs/' . $blog->image1));
            }
            $image1Name = time() . '_1_' . $request->file('image1')->getClientOriginalName();
            $request->file('image1')->move(public_path('uploads/blogs'), $image1Name);
            $data['image1'] = $image1Name;
        }

        if ($request->hasFile('image2')) {
            if ($blog->image2 && file_exists(public_path('uploads/blogs/' . $blog->image2))) {
                @unlink(public_path('uploads/blogs/' . $blog->image2));
            }
            $image2Name = time() . '_2_' . $request->file('image2')->getClientOriginalName();
            $request->file('image2')->move(public_path('uploads/blogs'), $image2Name);
            $data['image2'] = $image2Name;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image1 && file_exists(public_path('uploads/blogs/' . $blog->image1))) {
            unlink(public_path('uploads/blogs/' . $blog->image1));
        }
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
