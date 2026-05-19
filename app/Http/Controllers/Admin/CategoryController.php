<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $categories = ServiceCategory::with('parent')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhereHas('parent', function ($q) use ($search) {
                                 $q->where('name', 'LIKE', "%{$search}%");
                             });
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $mainCategories = ServiceCategory::whereNull('parent_id')->get();
        return view('admin.categories.create', compact('mainCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name',
            'parent_id' => 'nullable|exists:service_categories,id',
        ]);

        ServiceCategory::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(ServiceCategory $category)
    {
        $mainCategories = ServiceCategory::whereNull('parent_id')
            ->where('id', '!=', $category->id) // Avoid infinite recursion
            ->get();
        return view('admin.categories.edit', compact('category', 'mainCategories'));
    }

    public function update(Request $request, ServiceCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $category->id,
            'parent_id' => 'nullable|exists:service_categories,id',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(ServiceCategory $category)
    {
        // If it's a main category, deleting it will cascade delete subcategories due to migration
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
