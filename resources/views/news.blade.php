@extends('layouts.app')

@section('title', 'Blog Standard – Immigration & Visa Consulting')

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
    <div class="shape"><img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img"></div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Blog Standard</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Blog Standard</li>
            </ul>
        </div>
    </div>
</section>

<!--News Section Start -->
<section class="news-standard-section section-padding fix">
    <div class="container">
        <div class="news-standard-wrapper">
            <div class="row g-4">
                <div class="col-lg-8 col-12">
                    <div class="news-standard-post">
                        <div class="news-image"><img src="{{ asset('assets/img/home-1/news/news-13.jpg') }}" alt="img"></div>
                        <div class="news-content">
                            <ul class="news-list">
                                 <li><i class="fa-solid fa-user"></i> By Admin</li>
                                <li><i class="fa-solid fa-calendar-days"></i> 11 March 2025</li>
                                <li><i class="fa-solid fa-comments"></i> 0 Comments</li>
                            </ul>
                            <h3><a href="{{ url('/news-details') }}">How to Avoid Common Mistakes in Visa Applications</a></h3>
                            <p>A business consultant provides expert guidance, strategic planning, and problem-solving support—helping startups avoid mistakes, grow faster, and operate more efficiently from day one.</p>
                            <a href="{{ url('/news-details') }}" class="theme-btn">VIEW MORE <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- ... More news posts ... -->
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sideber">
                        <div class="news-sideber-box">
                            <div class="search-widget">
                                <form action="#"><input type="text" placeholder="Search Blog"><button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></form>
                            </div>
                        </div>
                        <div class="news-sideber-box">
                            <div class="wid-title"><h3>Categories</h3></div>
                            <div class="news-widget-categories">
                                <ul>
                                    <li><a href="{{ url('/news-details') }}"><i class="fa-solid fa-chevrons-right"></i> Permanent Residency (PR)</a><span>(04)</span></li>
                                    <li><a href="{{ url('/news-details') }}"><i class="fa-solid fa-chevrons-right"></i> Immigration Policy Updates</a><span>(09)</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
