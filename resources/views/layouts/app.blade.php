<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<< Header Area >>-->

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Saikrishna">
    <meta name="description"
        content="{{ $pageSeo->seo_description ?? 'Visaway – Immigration & Visa Consulting HTML Template' }}">
    <meta name="keywords" content="{{ $pageSeo->seo_keywords ?? '' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $pageSeo->og_title ?? ($pageSeo->seo_title ?? 'Visaway') }}">
    <meta property="og:description" content="{{ $pageSeo->og_description ?? ($pageSeo->seo_description ?? '') }}">
    @if(isset($pageSeo->og_image))
        <meta property="og:image" content="{{ asset($pageSeo->og_image) }}">
    @endif

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $pageSeo->twitter_title ?? ($pageSeo->seo_title ?? 'Visaway') }}">
    <meta property="twitter:description"
        content="{{ $pageSeo->twitter_description ?? ($pageSeo->seo_description ?? '') }}">

    @if(isset($pageSeo->canonical_url))
        <link rel="canonical" href="{{ $pageSeo->canonical_url }}">
    @endif

    <!-- ======== Page title ============ -->
    <title>{{ $pageSeo->seo_title ?? 'Visaway – Immigration & Visa Consulting' }}</title>
    <!--<< Favcion >>-->
    <link rel="shortcut icon" href="{{ ($siteSettings && $siteSettings->preloader_image) ? asset('uploads/settings/' . $siteSettings->preloader_image) : asset('assets/img/favicon.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
    <!--<< Odometer.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ time() }}">

    @stack('styles')
    <style>
        .preloader-logo {
            max-width: 160px;
            height: auto;
            border-radius: 50%;
            animation: preloaderPulse 1.8s ease-in-out infinite;
            box-shadow: 0 10px 25px rgba(0, 72, 180, 0.15);
        }

        @keyframes preloaderPulse {
            0%, 100% {
                transform: scale(0.9);
                opacity: 0.95;
            }
            50% {
                transform: scale(1.05);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="smooth-scroll-yes">

    <!-- Preloader Start -->
    <div id="preloader" class="preloader">
        <div class="animation-preloader">
            <div class="txt-loading text-center" style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%;">
                <img src="{{ ($siteSettings && $siteSettings->preloader_image) ? asset('uploads/settings/' . $siteSettings->preloader_image) : asset('uploads/settings/preloader.png') }}" alt="Preloader" class="preloader-logo">
            </div>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- GT Back To Top Start -->
    <button id="back-top" class="back-to-top show">
        <i class="fa-regular fa-arrow-up"></i>
    </button>

    <!-- GT MouseCursor Start -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"></div>

    @include('partials.header')

    @yield('content')

    @hasSection('footer')
        @yield('footer')
    @else
        @include('partials.footer')
    @endif



    <!--<< All JS Plugins >>-->
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/viewport.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/lenis.min.js') }}"></script>
    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
    <script class="circle-progress" src="{{ asset('assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>