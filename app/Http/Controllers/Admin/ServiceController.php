<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceVideo;
use App\Models\ServiceGallery;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $services = Services::when($search, function ($query, $search) {
                return $query->where('ServicesTitle', 'LIKE', "%{$search}%")
                             ->orWhere('pagecategory', 'LIKE', "%{$search}%")
                             ->orWhere('pagesubcategory', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::mainCategories()->get();
        $subcategories = ServiceCategory::subCategories()->get();
        return view('admin.services.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ServicesTitle' => 'required|string|max:60',
            'ServicesText' => 'required|string',
            'category_id' => 'required|exists:service_categories,id',
            'subcategory_id' => 'nullable|exists:service_categories,id',
        ]);

        $data = $request->except(['gallery', 'upload_videos', 'videos', 'video_titles']);
        
        // Default date to today if not provided
        if (!isset($data['servicesdate'])) {
            $data['servicesdate'] = date('Y-m-d');
        }
        
        // Sync string fields for backward compatibility
        if ($request->category_id) {
            $cat = ServiceCategory::find($request->category_id);
            $data['pagecategory'] = $cat->name;
        }
        if ($request->subcategory_id) {
            $sub = ServiceCategory::find($request->subcategory_id);
            $data['pagesubcategory'] = $sub->name;
        }

        if ($request->hasFile('serviceimage')) {
            $name = time() . '_service_' . $request->serviceimage->getClientOriginalName();
            $request->serviceimage->move(public_path('uploads/services'), $name);
            $data['serviceimage'] = $name;
        }

        if ($request->hasFile('icon')) {
            $name = time() . '_icon_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/services/icons'), $name);
            $data['icon'] = $name;
        }

        foreach (['seo_image', 'og_image', 'twitter_image'] as $img) {
            if ($request->hasFile($img)) {
                $name = time() . '_' . $img . '_' . $request->$img->getClientOriginalName();
                $request->$img->move(public_path('uploads/services'), $name);
                $data[$img] = $name;
            }
        }

        $data['serviceuid'] = $request->serviceuid ?: Str::random(12);
        $data['servicesUrl'] = $request->servicesUrl ?: Str::slug($request->ServicesTitle);

        $service = Services::create($data);

        // Videos (YouTube)
        if ($request->videos) {
            foreach ($request->videos as $index => $url) {
                if ($url) {
                    ServiceVideo::create([
                        'Serviceid' => $service->Serviceid,
                        'video_type' => 'youtube',
                        'youtube_url' => $url,
                        'title' => $request->video_titles[$index] ?? null,
                    ]);
                }
            }
        }

        // Uploaded Videos
        if ($request->hasFile('upload_videos')) {
            foreach ($request->file('upload_videos') as $video) {
                $name = time() . '_v_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/services/videos'), $name);
                ServiceVideo::create([
                    'Serviceid' => $service->Serviceid,
                    'video_type' => 'upload',
                    'video_file' => $name,
                ]);
            }
        }

        // Gallery
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $name = time() . '_gal_' . $img->getClientOriginalName();
                $img->move(public_path('uploads/services/gallery'), $name);
                ServiceGallery::create([
                    'Serviceid' => $service->Serviceid,
                    'image' => $name,
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
    }

    public function edit(Services $service)
    {
        $service->load(['videos', 'galleries']);
        $categories = ServiceCategory::mainCategories()->get();
        $subcategories = ServiceCategory::subCategories()->get();
        return view('admin.services.edit', compact('service', 'categories', 'subcategories'));
    }

    public function update(Request $request, Services $service)
    {
        $request->validate([
            'ServicesTitle' => 'required|string|max:60',
            'ServicesText' => 'required|string',
            'category_id' => 'required|exists:service_categories,id',
            'subcategory_id' => 'nullable|exists:service_categories,id',
        ]);

        $data = $request->except(['gallery', 'upload_videos', 'videos', 'video_titles']);

        // Sync string fields for backward compatibility
        if ($request->category_id) {
            $cat = ServiceCategory::find($request->category_id);
            $data['pagecategory'] = $cat->name;
        }
        if ($request->subcategory_id) {
            $sub = ServiceCategory::find($request->subcategory_id);
            $data['pagesubcategory'] = $sub->name;
        }

        if ($request->hasFile('serviceimage')) {
            if ($service->serviceimage && file_exists(public_path('uploads/services/' . $service->serviceimage))) {
                unlink(public_path('uploads/services/' . $service->serviceimage));
            }
            $name = time() . '_service_' . $request->serviceimage->getClientOriginalName();
            $request->serviceimage->move(public_path('uploads/services'), $name);
            $data['serviceimage'] = $name;
        }

        if ($request->hasFile('icon')) {
            if ($service->icon && file_exists(public_path('uploads/services/icons/' . $service->icon))) {
                unlink(public_path('uploads/services/icons/' . $service->icon));
            }
            $name = time() . '_icon_' . $request->icon->getClientOriginalName();
            $request->icon->move(public_path('uploads/services/icons'), $name);
            $data['icon'] = $name;
        }

        foreach (['seo_image', 'og_image', 'twitter_image'] as $img) {
            if ($request->hasFile($img)) {
                if ($service->$img && file_exists(public_path('uploads/services/' . $service->$img))) {
                    unlink(public_path('uploads/services/' . $service->$img));
                }
                $name = time() . '_' . $img . '_' . $request->$img->getClientOriginalName();
                $request->$img->move(public_path('uploads/services'), $name);
                $data[$img] = $name;
            }
        }

        $service->update($data);

        // Videos (YouTube)
        if ($request->videos) {
            foreach ($request->videos as $index => $url) {
                if ($url) {
                    ServiceVideo::create([
                        'Serviceid' => $service->Serviceid,
                        'video_type' => 'youtube',
                        'youtube_url' => $url,
                        'title' => $request->video_titles[$index] ?? null,
                    ]);
                }
            }
        }

        // Uploaded Videos
        if ($request->hasFile('upload_videos')) {
            foreach ($request->file('upload_videos') as $video) {
                $name = time() . '_v_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/services/videos'), $name);
                ServiceVideo::create([
                    'Serviceid' => $service->Serviceid,
                    'video_type' => 'upload',
                    'video_file' => $name,
                ]);
            }
        }

        // Gallery
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $name = time() . '_gal_' . $img->getClientOriginalName();
                $img->move(public_path('uploads/services/gallery'), $name);
                ServiceGallery::create([
                    'Serviceid' => $service->Serviceid,
                    'image' => $name,
                ]);
            }
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Services $service)
    {
        if ($service->serviceimage && file_exists(public_path('uploads/services/' . $service->serviceimage))) {
            unlink(public_path('uploads/services/' . $service->serviceimage));
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function deleteVideo($id)
    {
        ServiceVideo::where('id', $id)->delete();
        return back()->with('success', 'Video deleted.');
    }

    public function deleteGallery($id)
    {
        $g = ServiceGallery::findOrFail($id);
        if (file_exists(public_path('uploads/services/gallery/' . $g->image))) {
            unlink(public_path('uploads/services/gallery/' . $g->image));
        }
        $g->delete();
        return back()->with('success', 'Image deleted.');
    }
    public function toggleStatus($id)
    {
        $service = Services::findOrFail($id);
        $service->status = $service->status == 1 ? 0 : 1;
        $service->save();

        return response()->json([
            'status'  => $service->status,
            'message' => $service->status == 1 ? 'Service activated successfully.' : 'Service deactivated successfully.',
        ]);
    }
}
