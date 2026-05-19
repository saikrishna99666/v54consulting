<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SeoSetting::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('page_name', 'like', '%' . $search . '%')
                  ->orWhere('url_path', 'like', '%' . $search . '%')
                  ->orWhere('seo_title', 'like', '%' . $search . '%')
                  ->orWhere('seo_description', 'like', '%' . $search . '%');
            });
        }

        $seoSettings = $query->orderBy('id', 'asc')->paginate(10)->withQueryString();

        return view('admin.seo.index', compact('seoSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url_path' => 'required|string',
            'page_name' => 'required|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'in_sitemap' => 'required|in:1,0',
            'sitemap_priority' => 'required|string',
            'sitemap_changefreq' => 'required|string',
        ]);

        $data = $request->all();

        // Ensure leading slash
        if (isset($data['url_path'])) {
            $path = trim($data['url_path']);
            if ($path !== '/' && !str_starts_with($path, '/')) {
                $path = '/' . $path;
            }
            $data['url_path'] = $path;
        }

        // Validate uniqueness after prefixing leading slash
        $exists = SeoSetting::where('url_path', $data['url_path'])->exists();
        if ($exists) {
            return redirect()->back()->withInput()->withErrors(['url_path' => 'The URL path has already been taken.']);
        }

        // Upload OG image
        if ($request->hasFile('og_image')) {
            $image = $request->file('og_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/seo'), $imageName);
            $data['og_image'] = 'uploads/seo/' . $imageName;
        }

        SeoSetting::create($data);

        return redirect()->route('admin.seo-settings.index')->with('success', 'SEO Setting created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $seo = SeoSetting::findOrFail($id);
        return view('admin.seo.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $seo = SeoSetting::findOrFail($id);
        
        $request->validate([
            'url_path' => 'required|string',
            'page_name' => 'required|string',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'in_sitemap' => 'required|in:1,0',
            'sitemap_priority' => 'required|string',
            'sitemap_changefreq' => 'required|string',
        ]);

        $data = $request->all();

        // Ensure leading slash
        if (isset($data['url_path'])) {
            $path = trim($data['url_path']);
            if ($path !== '/' && !str_starts_with($path, '/')) {
                $path = '/' . $path;
            }
            $data['url_path'] = $path;
        }

        // Validate uniqueness after prefixing leading slash
        $exists = SeoSetting::where('url_path', $data['url_path'])->where('id', '!=', $id)->exists();
        if ($exists) {
            return redirect()->back()->withInput()->withErrors(['url_path' => 'The URL path has already been taken.']);
        }

        // Upload OG image
        if ($request->hasFile('og_image')) {
            // Delete old image if it exists
            if ($seo->og_image && file_exists(public_path($seo->og_image))) {
                @unlink(public_path($seo->og_image));
            }
            
            $image = $request->file('og_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/seo'), $imageName);
            $data['og_image'] = 'uploads/seo/' . $imageName;
        }

        $seo->update($data);

        return redirect()->route('admin.seo-settings.index')->with('success', 'SEO Setting updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $seo = SeoSetting::findOrFail($id);
        if ($seo->og_image && file_exists(public_path($seo->og_image))) {
            @unlink(public_path($seo->og_image));
        }
        $seo->delete();

        return redirect()->route('admin.seo-settings.index')->with('success', 'SEO Setting deleted successfully.');
    }
}
