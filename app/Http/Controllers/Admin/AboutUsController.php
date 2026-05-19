<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::firstOrCreate(['id' => 1]);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = AboutUs::first();
        $data = $request->all();

        // Handle Image 1
        if ($request->hasFile('image_1')) {
            if ($about->image_1 && file_exists(public_path('uploads/about/' . $about->image_1))) {
                @unlink(public_path('uploads/about/' . $about->image_1));
            }
            $name1 = time() . '_about1_' . $request->image_1->getClientOriginalName();
            $request->image_1->move(public_path('uploads/about'), $name1);
            $data['image_1'] = $name1;
        }

        // Handle Image 2
        if ($request->hasFile('image_2')) {
            if ($about->image_2 && file_exists(public_path('uploads/about/' . $about->image_2))) {
                @unlink(public_path('uploads/about/' . $about->image_2));
            }
            $name2 = time() . '_about2_' . $request->image_2->getClientOriginalName();
            $request->image_2->move(public_path('uploads/about'), $name2);
            $data['image_2'] = $name2;
        }

        // Handle Points Array
        if ($request->has('points')) {
            $data['points'] = array_filter($request->points, function($value) {
                return !empty(trim($value));
            });
        }

        $about->update($data);
        return redirect()->back()->with('success', 'About Us content updated successfully.');
    }
}
