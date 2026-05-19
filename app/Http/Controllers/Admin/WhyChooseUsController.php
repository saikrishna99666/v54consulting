<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $content = WhyChooseUs::firstOrCreate(['id' => 1]);
        return view('admin.why-choose-us.edit', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $content = WhyChooseUs::firstOrCreate(['id' => 1]);
        return view('admin.why-choose-us.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $content = WhyChooseUs::findOrFail($id);
        
        $data = $request->all();
        
        // Filter mission points to remove empty ones
        if ($request->has('mission_points')) {
            $data['mission_points'] = array_filter($request->mission_points, function($value) {
                return !is_null($value) && $value !== '';
            });
            $data['mission_points'] = array_values($data['mission_points']);
        }

        // Filter vision points to remove empty ones
        if ($request->has('vision_points')) {
            $data['vision_points'] = array_filter($request->vision_points, function($value) {
                return !is_null($value) && $value !== '';
            });
            $data['vision_points'] = array_values($data['vision_points']);
        }

        $content->update($data);

        return redirect()->back()->with('success', 'Why Choose Us section updated successfully.');
    }
}
