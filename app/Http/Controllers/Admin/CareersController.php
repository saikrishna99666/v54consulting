<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $careers = Career::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                             ->orWhere('location', 'LIKE', "%{$search}%")
                             ->orWhere('type', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'status' => 'required|in:1,0',
        ]);

        Career::create($request->all());

        return redirect()->route('admin.careers.index')->with('success', 'Career opening created successfully.');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.careers.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'requirements' => 'nullable|string',
            'status' => 'required|in:1,0',
        ]);

        $career->update($request->all());

        return redirect()->route('admin.careers.index')->with('success', 'Career opening updated successfully.');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);
        $career->delete();
        return redirect()->route('admin.careers.index')->with('success', 'Career opening deleted successfully.');
    }
}
