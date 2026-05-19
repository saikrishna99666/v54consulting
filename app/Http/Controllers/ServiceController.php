<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::where('pagecategory', 'services')->get();
        return view('services', compact('services'));
    }

    /**
     * Display the Home 3 page with services.
     *
     * @return \Illuminate\View\View
     */
    public function home3()
    {
        $services = Service::where('pagecategory', 'services')->take(4)->get();
        return view('page3', compact('services'));
    }

    /**
     * Display the specified service.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $service = Service::where('servicesUrl', $slug)->firstOrFail();
        
        // Fetch all services in the same category for the sidebar
        $relatedServices = Service::where('pagecategory', $service->pagecategory)
                                    ->limit(6)
                                    ->get();

        return view('service-details', compact('service', 'relatedServices'));
    }
}
