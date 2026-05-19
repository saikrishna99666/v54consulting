<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GalleryController extends Controller
{
    // Show all
    // public function index()
    // {
    //     $gallery = Gallery::orderBy('galleryid', 'desc')->get();
    //     return view('admin.gallery.index', compact('gallery'));
    // }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $gallery = Gallery::when($search, function ($query, $search) {
                return $query->where('image_name', 'LIKE', "%{$search}%");
            })
            ->orderBy('galleryid', 'desc')
            ->paginate(15)
            ->withQueryString();

        // Get unique image names for filtering
        $names = Gallery::select('image_name')
            ->groupBy('image_name')
            ->pluck('image_name');

        return view('admin.gallery.index', compact('gallery', 'names'));
    }


    // Upload multiple
    public function upload(Request $request)
    {
        $request->validate([
            'actorimages.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_name.*' => 'nullable|string|max:255',
            'project_link.*'=> 'nullable|url|max:255',
        ]);

        if ($request->hasFile('actorimages')) {

            foreach ($request->file('actorimages') as $index => $file) {

                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
                $path = 'Gallery/';
                $file->move(public_path($path), $fileName);

                Gallery::create([
                    'image_path' => $path . $fileName,
                    'image_name' => $request->image_name[$index] ?? 'Untitled',
                    'project_link' => $request->project_link[$index] ?? null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            return redirect()->back()->with('success', 'Images uploaded successfully!');
        }

        return redirect()->back()->with('error', 'No images found!');
    }


    // Delete image
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return redirect()->back()->with('error', 'Image not found');
        }

        // Delete file
        $file = public_path($gallery->image_path);
        if (file_exists($file)) {
            unlink($file);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
