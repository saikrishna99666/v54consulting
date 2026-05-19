<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Team;
use App\Models\ContactUs;
use App\Models\Carousel;   // ✅ ADD THIS

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Services::count(),
            'blogs'    => Blog::count(),
            'faqs'     => Faq::count(),
            'contactus' => ContactUs::count(),
            'carousel' => Carousel::count(),
        ];

        $recentInquiries = ContactUs::latest()->take(5)->get();
        $recentBlogs = Blog::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentBlogs'));
    }
}
