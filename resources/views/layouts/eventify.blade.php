<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Eventify">
        <meta name="description" content="{{ $pageSeo->seo_description ?? 'Eventify - Event Management & Conference HTML Template' }}">
        <meta name="keywords" content="{{ $pageSeo->seo_keywords ?? '' }}">
        
        <title>{{ $pageSeo->seo_title ?? 'Eventify - Event Management' }}</title>

        <link rel="shortcut icon" href="{{ asset('assets_eventify/img/logo/favicon.png') }}">

        <!--===== CSS SCRIPT LINK =======-->
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/slick-slider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/owlcarousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('assets_eventify/css/main.css') }}">

        @stack('styles')
    </head>
    <body class="homepage1-body">

        @include('partials_eventify.preloader')

        @include('partials_eventify.header')

        @yield('content')

        @include('partials_eventify.footer')

        <!--===== JS SCRIPT LINK =======-->
        <script src="{{ asset('assets_eventify/js/vendor/jquery-3.7.1.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/fontawesome.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/aos.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/jquery.appear.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/jquery.odometer.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/sidebar.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/magnific-popup.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/gsap.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/ScrollTrigger.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/Splitetext.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/mobilemenu.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/owlcarousel.min.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/nice-select.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/waypoints.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/slick-slider.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/vendor/circle-progress.js') }}"></script>
        <script src="{{ asset('assets_eventify/js/main.js') }}"></script>

        @stack('scripts')
    </body>
</html>
