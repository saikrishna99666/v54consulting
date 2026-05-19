<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Dynamically load dynamic content mail settings
        try {
            if (config('app.env') !== 'testing' && \Illuminate\Support\Facades\Schema::hasTable('dynamic_contents')) {
                $siteSettings = \App\Models\DynamicContent::first();
                if ($siteSettings) {
                    if ($siteSettings->mail_mailer) {
                        config([
                            'mail.default' => $siteSettings->mail_mailer,
                            'mail.mailers.smtp.host' => $siteSettings->mail_host,
                            'mail.mailers.smtp.port' => $siteSettings->mail_port,
                            'mail.mailers.smtp.encryption' => $siteSettings->mail_encryption ?: 'tls',
                            'mail.mailers.smtp.username' => $siteSettings->mail_username,
                            'mail.mailers.smtp.password' => $siteSettings->mail_password,
                        ]);
                    }
                    if ($siteSettings->mail_from_address) {
                        config([
                            'mail.from.address' => $siteSettings->mail_from_address,
                            'mail.from.name' => $siteSettings->mail_from_name ?: $siteSettings->companyname,
                        ]);
                    } elseif ($siteSettings->email) {
                        config([
                            'mail.from.address' => $siteSettings->email,
                            'mail.from.name' => $siteSettings->companyname ?: config('app.name'),
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            // Prevent failing when running migrations or if database is not set up
        }

        \Illuminate\Support\Facades\View::composer('partials.header', function ($view) {
            $view->with('headerServices', \App\Models\Service::whereRaw('LOWER(pagecategory) = ?', ['services'])
                ->get(['ServicesTitle', 'servicesUrl']));
            $view->with('headerVisas', \App\Models\Service::whereRaw('LOWER(pagecategory) LIKE ?', ['%visa%'])
                ->orWhereRaw('LOWER(pagecategory) = ?', ['study destinations'])
                ->get(['ServicesTitle', 'servicesUrl']));
        });

        \Illuminate\Support\Facades\View::composer(['partials.footer-home3', '*'], function ($view) {
            $view->with('footerServices', \App\Models\Service::where('pagecategory', 'services')
                ->take(4)->get(['ServicesTitle', 'servicesUrl']));
        });

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $siteSettings = \App\Models\DynamicContent::first() ?? new \App\Models\DynamicContent();
            $view->with('siteSettings', $siteSettings);

            // Fetch and share Head Office branch globally with robust fallbacks
            try {
                if (config('app.env') !== 'testing' && \Illuminate\Support\Facades\Schema::hasTable('branches')) {
                    $headOffice = \App\Models\Branch::where('is_head_office', true)->first();
                } else {
                    $headOffice = null;
                }
            } catch (\Exception $e) {
                $headOffice = null;
            }

            if (!$headOffice) {
                $headOffice = (object)[
                    'name' => 'Head Office',
                    'address' => $siteSettings->address ?? 'Plot No 121, PadmaNagar, Beside Maruthi Suzuki Service, Champapet Rd, Karmanghat, Hyderabad, Telangana, India - 500079.',
                    'phone' => $siteSettings->phone_number ?? '+91 7286847203 / 9490091830',
                    'email' => $siteSettings->email ?? 'info@v54abroadstudies.com / vinayreddy@v54abroadstudies.com',
                    'operating_hours' => $siteSettings->operating_hours ?? 'Monday to Saturday : 10:00 AM to 6:30 PM, Sunday : Closed',
                    'google_maps_link' => $siteSettings->google_maps_link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3809.1171871239846!2d78.52932131487593!3d17.348480988102375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9f7f4577884d%3A0xe54cb8ab8db73041!2sKarmanghat%20X%20Roads!5e0!3m2!1sen!2sin!4v1680000000000!5m2!1sen!2sin',
                ];
            }
            $view->with('headOffice', $headOffice);

            // Sync AdminLTE Logo with Backend
            if ($siteSettings->white_logoimage) {
                config(['adminlte.logo_img' => 'uploads/settings/' . $siteSettings->white_logoimage]);
            }

            $view->with('aboutContent', \App\Models\AboutUs::first() ?? new \App\Models\AboutUs());

            // SEO Dynamic Logic
            $path = request()->getPathInfo();
            $seo = \App\Models\SeoSetting::where('url_path', $path)->first();
            
            // If not found in SeoSetting, try to see if it's a dynamic page (Blog/Service) 
            // and the view already has the object.
            $viewData = $view->getData();
            if (!$seo) {
                if (isset($viewData['blog'])) {
                    $item = $viewData['blog'];
                    $seo = (object)[
                        'seo_title' => $item->seo_title,
                        'seo_description' => $item->seo_description,
                        'seo_keywords' => $item->seo_keywords,
                        'og_title' => $item->og_title ?? $item->seo_title,
                        'og_description' => $item->og_description ?? $item->seo_description,
                        'canonical_url' => $item->canonical_url,
                    ];
                } elseif (isset($viewData['service'])) {
                    $item = $viewData['service'];
                    $seo = (object)[
                        'seo_title' => $item->seo_title,
                        'seo_description' => $item->seo_description,
                        'seo_keywords' => $item->seo_keywords,
                        'og_title' => $item->og_title ?? $item->seo_title,
                        'og_description' => $item->og_description ?? $item->seo_description,
                        'canonical_url' => $item->canonical_url,
                    ];
                }
            }

            $view->with('pageSeo', $seo);
        });
    }
}
