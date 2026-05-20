<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $testimonials = Testimonial::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('destination', 'LIKE', "%{$search}%")
                             ->orWhere('quote', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_testimonial_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
        }

        Testimonial::create(array_merge($request->all(), [
            'image' => $imageName,
            'status' => $request->has('status') ? (bool)$request->status : true,
        ]));

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['status'] = $request->has('status') ? (bool)$request->status : false;

        if ($request->hasFile('image')) {
            if ($testimonial->image && File::exists(public_path('uploads/testimonials/' . $testimonial->image))) {
                File::delete(public_path('uploads/testimonials/' . $testimonial->image));
            }
            $imageName = time() . '_testimonial_' . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/testimonials'), $imageName);
            $data['image'] = $imageName;
        }

        $testimonial->update($data);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && File::exists(public_path('uploads/testimonials/' . $testimonial->image))) {
            File::delete(public_path('uploads/testimonials/' . $testimonial->image));
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
