<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $achievements = Achievement::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                             ->orWhere('count_number', 'LIKE', "%{$search}%");
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'count_number' => 'required',
            'title' => 'required',
        ]);

        Achievement::create($request->all());
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.form', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'count_number' => 'required',
            'title' => 'required',
        ]);

        $achievement->update($request->all());
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement deleted successfully.');
    }
}
