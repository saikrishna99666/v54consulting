<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientImage;
use Carbon\Carbon;

class ClientImageController extends Controller
{
    // Show page
    public function index()
    {
        $images = ClientImage::latest()->get();
        return view('admin.client_images.index', compact('images'));
    }

    // Store Images
    public function store(Request $request)
    {
        $request->validate([
            'actorimages.*' => 'required|image|mimes:jpg,jpeg,png,webp'
        ]);

        if ($request->hasFile('actorimages')) {
            foreach ($request->file('actorimages') as $image) {

                $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = 'uploads/clients/';
                $image->move(public_path($path), $name);

                ClientImage::create([
                    'image_path' => $path . $name,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        return redirect()->back()->with('success', 'Client Images Uploaded Successfully');
    }

    // Delete Image
    public function destroy($id)
    {
        $img = ClientImage::findOrFail($id);

        if (file_exists(public_path($img->image_path))) {
            unlink(public_path($img->image_path));
        }

        $img->delete();

        return redirect()->back()->with('success', 'Image Deleted Successfully');
    }
}
