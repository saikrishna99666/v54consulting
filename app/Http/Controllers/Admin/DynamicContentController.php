<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DynamicContent;
use Illuminate\Http\Request;

class DynamicContentController extends Controller
{
    public function index()
    {
        $settings = DynamicContent::all();
        return view('admin.settings.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = DynamicContent::findOrFail($id);
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = DynamicContent::findOrFail($id);
        $data = $request->except('logo');

        if ($request->hasFile('logo')) {
            if ($setting->logoimage && file_exists(public_path('uploads/settings/' . $setting->logoimage))) {
                @unlink(public_path('uploads/settings/' . $setting->logoimage));
            }
            $name = time() . '_logo_' . $request->logo->getClientOriginalName();
            $request->logo->move(public_path('uploads/settings'), $name);
            $data['logoimage'] = $name;
        }

        if ($request->hasFile('white_logo')) {
            if ($setting->white_logoimage && file_exists(public_path('uploads/settings/' . $setting->white_logoimage))) {
                @unlink(public_path('uploads/settings/' . $setting->white_logoimage));
            }
            $name = time() . '_white_logo_' . $request->white_logo->getClientOriginalName();
            $request->white_logo->move(public_path('uploads/settings'), $name);
            $data['white_logoimage'] = $name;
        }

        if ($request->hasFile('preloader_image')) {
            if ($setting->preloader_image && file_exists(public_path('uploads/settings/' . $setting->preloader_image))) {
                @unlink(public_path('uploads/settings/' . $setting->preloader_image));
            }
            $name = time() . '_preloader_' . $request->preloader_image->getClientOriginalName();
            $request->preloader_image->move(public_path('uploads/settings'), $name);
            $data['preloader_image'] = $name;

            // Copy preloader image to standard favicon directories to keep it in sync globally
            $preloaderFullPath = public_path('uploads/settings/' . $name);
            if (file_exists($preloaderFullPath)) {
                @copy($preloaderFullPath, public_path('favicon.ico'));
                @copy($preloaderFullPath, public_path('assets/img/favicon.png'));
                
                // Keep AdminLTE's favicon folder updated too
                if (!file_exists(public_path('favicons'))) {
                    @mkdir(public_path('favicons'), 0755, true);
                }
                @copy($preloaderFullPath, public_path('favicons/favicon.ico'));
            }
        }

        if ($request->hasFile('breadcrumb_image')) {
            if ($setting->breadcrumb_image && file_exists(public_path('uploads/settings/' . $setting->breadcrumb_image))) {
                @unlink(public_path('uploads/settings/' . $setting->breadcrumb_image));
            }
            $name = time() . '_breadcrumb_' . $request->breadcrumb_image->getClientOriginalName();
            $request->breadcrumb_image->move(public_path('uploads/settings'), $name);
            $data['breadcrumb_image'] = $name;
        }

        $setting->update($data);
        return redirect()->route('admin.settings.index')->with('success', 'Settings updated.');
    }
}
