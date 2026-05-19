<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $carousels = Carousel::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                             ->orWhere('subtitle', 'LIKE', "%{$search}%")
                             ->orWhere('description', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.carousel.index', compact('carousels'));
    }

    public function create()
    {
        return view('admin.carousel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $imageUrl = time() . '_carousel_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/carousel'), $imageUrl);
            $data['image_url'] = $imageUrl;
        }
        
        Carousel::create($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide added successfully.');
    }

    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    public function update(Request $request, Carousel $carousel)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:255',
            'button_link' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            if ($carousel->image_url && file_exists(public_path('uploads/carousel/' . $carousel->image_url))) {
                @unlink(public_path('uploads/carousel/' . $carousel->image_url));
            }
            $name = time() . '_carousel_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/carousel'), $name);
            $data['image_url'] = $name;
        }
        
        $carousel->update($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel slide updated successfully.');
    }

    public function destroy(Carousel $carousel)
    {
        if ($carousel->image_url && file_exists(public_path('uploads/carousel/' . $carousel->image_url))) {
            unlink(public_path('uploads/carousel/' . $carousel->image_url));
        }
        $carousel->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Carousel deleted.');
    }
}
