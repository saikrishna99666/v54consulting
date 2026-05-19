<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carousel;
use App\Models\Faq;
use App\Models\ServiceCategory;
use App\Models\Achievement;
use App\Models\Service;
use App\Models\WhyChooseUs;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();
        $homeFaqs = Faq::whereHas('category', function($q) {
            $q->where('name', 'Home');
        })->get();
        $achievements = Achievement::all();
        $services = Service::where('pagecategory', 'services')
            ->where('status', 1)
            ->get();
        $whyChooseUs = WhyChooseUs::first();
        $studyDestinations = Service::where('pagecategory', 'study destinations')
            ->where('status', 1)
            ->get();
        $latestBlogs = Blog::where('status', 'published')
            ->where('visible', 1)
            ->latest('last_updated')
            ->take(3)
            ->get();
        
        return view('index', compact('carousels', 'homeFaqs', 'achievements', 'services', 'whyChooseUs', 'studyDestinations', 'latestBlogs'));
    }

    public function faq()
    {
        $faqs = Faq::with('category')->get();
        
        // Fetch categories that have associated FAQs, filtering out nulls
        $categories = ServiceCategory::whereIn('id', $faqs->pluck('category_id')->filter()->unique())->get();
        
        return view('faq', compact('faqs', 'categories'));
    }
}
