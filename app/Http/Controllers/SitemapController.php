<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Service;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic sitemap.xml.
     */
    public function index()
    {
        $urls = [];
        $registeredPaths = [];

        // 1. Load all SEO Settings configured for the sitemap
        $seoSettings = SeoSetting::all();
        $excludedPaths = $seoSettings->where('in_sitemap', false)->pluck('url_path')->map(fn($p) => trim($p))->toArray();
        $includedSeo = $seoSettings->where('in_sitemap', true);

        foreach ($includedSeo as $seo) {
            $path = trim($seo->url_path);
            
            // Format location URL
            $loc = url($path);
            
            $urls[] = [
                'loc' => $loc,
                'lastmod' => $seo->updated_at ? $seo->updated_at->format('c') : now()->startOfMonth()->format('c'),
                'changefreq' => $seo->sitemap_changefreq ?? 'weekly',
                'priority' => $seo->sitemap_priority ?? '0.8',
            ];
            
            $registeredPaths[] = $path;
        }

        // 2. Load dynamic Services not already overridden or excluded in SEO Settings
        $services = Service::where('status', 1)->get();
        foreach ($services as $service) {
            $path = '/services/' . trim($service->servicesUrl);
            
            // Check if this path is explicitly registered or excluded in SEO settings
            if (in_array($path, $registeredPaths) || in_array($path, $excludedPaths)) {
                continue;
            }
            
            $urls[] = [
                'loc' => route('service.detail', $service->servicesUrl),
                'lastmod' => $service->updated_at ? $service->updated_at->format('c') : now()->startOfMonth()->format('c'),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // 3. Load dynamic Blogs not already overridden or excluded in SEO Settings
        $blogs = Blog::where('status', 'published')->where('visible', 1)->get();
        foreach ($blogs as $blog) {
            $path = '/blog/' . trim($blog->blogurl);
            
            // Check if this path is explicitly registered or excluded in SEO settings
            if (in_array($path, $registeredPaths) || in_array($path, $excludedPaths)) {
                continue;
            }
            
            $urls[] = [
                'loc' => route('blog.details', $blog->blogurl),
                'lastmod' => ($blog->last_updated ?? $blog->updated_at) ? ($blog->last_updated ?? $blog->updated_at)->format('c') : now()->startOfMonth()->format('c'),
                'changefreq' => 'weekly',
                'priority' => '0.6',
            ];
        }

        $content = view('sitemap', compact('urls'))->render();

        return Response::make($content, 200, [
            'Content-Type' => 'text/xml',
        ]);
    }
}
