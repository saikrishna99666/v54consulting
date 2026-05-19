<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $faqs = Faq::with(['category', 'subcategory'])
            ->when($search, function ($query, $search) {
                return $query->where('question', 'LIKE', "%{$search}%")
                             ->orWhere('answer', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $categories = ServiceCategory::mainCategories()->get();
        $subcategories = ServiceCategory::subCategories()->get();
        return view('admin.faqs.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'category_id' => 'required|exists:service_categories,id',
            'subcategory_id' => 'nullable|exists:service_categories,id',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = ServiceCategory::mainCategories()->get();
        $subcategories = ServiceCategory::subCategories()->get();
        return view('admin.faqs.edit', compact('faq', 'categories', 'subcategories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string',
            'answer'   => 'required|string',
            'category_id' => 'required|exists:service_categories,id',
            'subcategory_id' => 'nullable|exists:service_categories,id',
        ]);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
