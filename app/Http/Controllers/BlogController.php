<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of blogs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::where('status', 'published')->where('visible', 1)->orderByDesc('last_updated')->paginate(9);
        return view('blog', compact('blogs'));
    }

    /**
     * Display the specified blog details.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $blog = Blog::where('blogurl', $slug)->where('status', 'published')->firstOrFail();
        
        // Fetch recent blogs for the sidebar
        $recentBlogs = Blog::where('id', '!=', $blog->id)
                            ->orderByDesc('last_updated')
                            ->take(5)
                            ->get();

        return view('blog-details', compact('blog', 'recentBlogs'));
    }
}
