<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $branches = Branch::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('address', 'LIKE', "%{$search}%")
                             ->orWhere('phone', 'LIKE', "%{$search}%")
                             ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->orderByRaw('is_head_office DESC, name ASC')
            ->paginate(15)
            ->withQueryString();

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'is_head_office' => 'required|in:1,0',
            'google_maps_link' => 'nullable|string',
        ]);

        $data = $request->all();
        $isHeadOffice = $request->input('is_head_office') == '1';

        if ($isHeadOffice) {
            Branch::where('is_head_office', true)->update(['is_head_office' => false]);
        }

        Branch::create($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch location created successfully.');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'operating_hours' => 'nullable|string|max:255',
            'is_head_office' => 'required|in:1,0',
            'google_maps_link' => 'nullable|string',
        ]);

        $data = $request->all();
        $isHeadOffice = $request->input('is_head_office') == '1';

        if ($isHeadOffice) {
            Branch::where('id', '!=', $id)->where('is_head_office', true)->update(['is_head_office' => false]);
        }

        $branch->update($data);

        return redirect()->route('admin.branches.index')->with('success', 'Branch location updated successfully.');
    }

    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->route('admin.branches.index')->with('success', 'Branch location deleted successfully.');
    }
}
