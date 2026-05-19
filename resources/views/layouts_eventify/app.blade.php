<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Eventify- Event And Conference Theme')</title>

    <!--=====FAB ICON=======-->
    <link rel="shortcut icon" href="{{ asset('assets_eventify/img/logo/fav-logo1.png') }}" />

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/mobile.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/owlcarousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/slick-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/vendor/odometer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_eventify/css/main.css') }}" />

    <!--=====  JS SCRIPT LINK =======-->
    <script src="{{ asset('assets_eventify/js/vendor/jquery-3.7.1.min.js') }}"></script>
    
    @stack('styles')
</head>

<body class="@yield('body-class', 'homepage1-body')">
    
    @include('partials_eventify.preloader')
    
    @include('partials_eventify.header')
    
    @include('partials_eventify.mobile_header')

    <main>
        @yield('content')
    </main>

    @include('partials_eventify.footer')

    @include('partials_eventify.scripts')
    
    @stack('scripts')
</body>

</html>
