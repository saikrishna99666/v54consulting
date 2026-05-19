@extends('layouts.app')

@section('title', $service->ServicesTitle . ' – Immigration & Visa Consulting')

@push('styles')
<style>
    .news-details-section {
        background-color: #F8F8F9; /* Light contrast background */
    }
    .service-details-card {
        background: #fff;
        padding: 50px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.05);
        border-top: 5px solid var(--theme);
        position: relative;
        overflow: hidden;
    }
    @media (max-width: 767px) {
        .service-details-card {
            padding: 25px;
        }
    }
    .service-details-card .details-image {
        height: 450px;
        margin-bottom: 40px;
        border-radius: 15px;
        overflow: hidden;
    }
    @media (max-width: 767px) {
        .service-details-card .details-image {
            height: 300px;
        }
    }
    .service-details-card .details-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .service-details-card .details-image:hover img {
        transform: scale(1.05);
    }
    /* Typography for Dynamic Content */
    .description h2, .description h3 {
        margin-top: 35px;
        margin-bottom: 20px;
        font-weight: 700;
        color: var(--header);
    }
    .description p {
        margin-bottom: 20px;
        line-height: 1.8;
        font-size: 17px;
        color: var(--text);
    }
    .description strong, .description b {
        color: var(--theme-2);
        font-weight: 700;
    }
    .description ul {
        margin-bottom: 30px;
        padding-left: 0;
    }
    .description ul li {
        list-style: none;
        position: relative;
        padding-left: 30px;
        margin-bottom: 12px;
        font-size: 16px;
        color: var(--text);
    }
    .description ul li::before {
        content: "\f058"; /* FontAwesome check-circle */
        font-family: "Font Awesome 6 Pro";
        font-weight: 900;
        position: absolute;
        left: 0;
        top: 2px;
        color: var(--theme);
        font-size: 18px;
    }
    /* Styling for manual emoji lists (✔) */
    .description p {
        position: relative;
    }
    .description p br + span, 
    .description p:first-letter {
        /* This is tricky without wrapping each line, so we'll use a broader approach */
    }
    /* Fallback for hardcoded checkmarks if wrapped in paragraphs */
    .description p {
        margin-bottom: 20px;
        line-height: 1.8;
    }
    .description {
        color: var(--text);
    }
    .breadcrumb-wrapper {
        padding: 100px 0;
        position: relative;
    }
    .news-widget-categories ul li {
        padding: 0 !important;
        margin-bottom: 15px !important;
        background: #fff !important;
        border-radius: 100px !important;
        overflow: hidden;
        border: 1px solid #eee;
        transition: all 0.3s ease;
    }
    .news-widget-categories ul li a {
        display: flex !important;
        align-items: center;
        padding: 12px 25px;
        line-height: 1.3;
        width: 100%;
        color: var(--header) !important;
        font-weight: 500;
    }
    .news-widget-categories ul li i {
        margin-right: 12px;
        color: var(--theme) !important;
        font-size: 14px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    /* Active State */
    .news-widget-categories ul li.active {
        background: var(--theme) !important;
        border-color: var(--theme);
    }
    .news-widget-categories ul li.active a, 
    .news-widget-categories ul li.active i {
        color: #fff !important;
    }
    /* Hover State */
    .news-widget-categories ul li:hover:not(.active) {
        background: #f8f8f8 !important;
        transform: translateX(5px);
    }
</style>
@endpush

@section('content')
<!-- Breadcrumb Section -->
@php
    $breadcrumbImg = ($siteSettings && $siteSettings->breadcrumb_image) 
        ? asset('uploads/settings/' . $siteSettings->breadcrumb_image) 
        : asset('assets/img/inner-page/breadcrumb.jpg');
@endphp
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ $breadcrumbImg }});">
    <div class="shape">
        <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">{{ $service->ServicesTitle }}</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="{{ url('/services') }}">Our Services</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>{{ $service->ServicesTitle }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Service Details Section -->
<section class="news-details-section section-padding fix">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-xl-8 col-lg-7">
                <div class="service-details-wrapper">
                    <div class="service-details-card">
                        <div class="details-image">
                            @php
                                $imageUrl = $service->serviceimage ? asset('uploads/services/' . $service->serviceimage) : asset('assets/img/service/details.jpg');
                            @endphp
                            <img src="{{ $imageUrl }}" alt="{{ $service->ServicesTitle }}">
                        </div>

                        <div class="details-content">
                            <div class="description">
                                {!! $service->ServicesText !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-xl-4 col-lg-5">
                <div class="main-sideber">
                    <!-- Categories Widget -->
                    <div class="news-sideber-box">
                        <div class="wid-title">
                            <h3>Our Services</h3>
                        </div>
                        <div class="news-widget-categories">
                            <ul>
                                @foreach($relatedServices ?? [] as $related)
                                    <li class="{{ $related->Serviceid == $service->Serviceid ? 'active' : '' }}">
                                        <a href="{{ route('service.detail', $related->servicesUrl) }}" class="{{ $related->Serviceid == $service->Serviceid ? 'active-link' : '' }}">
                                            <i class="fa-solid fa-chevrons-right"></i>
                                            {{ $related->ServicesTitle }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Help Widget -->
                    <div class="news-sideber-box">
                        <div class="wid-title">
                            <h3>Need Expert Help?</h3>
                        </div>
                        <div class="help-widget-content text-center" style="background: #fff; border-radius: 12px; padding: 40px 30px; border: 1px solid #eee; box-shadow: 0 10px 30px rgba(0,0,0,0.03);">
                            <div class="icon-item mb-4">
                                <i class="fa-solid fa-phone-volume" style="font-size: 50px; color: var(--theme); transition: transform 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></i>
                            </div>
                            <h4 class="mb-3" style="font-weight: 700;">Contact us for personalized guidance.</h4>
                            <p class="mb-4" style="color: var(--text); font-size: 15px;">Our expert consultants are ready to assist you right now.</p>
                            <div class="phone-number mb-4">
                                <h3 style="font-size: 28px; font-weight: 800;">
                                    <a href="tel:{{ $siteSettings->phone_number }}" style="color: var(--header);">{{ $siteSettings->phone_number }}</a>
                                </h3>
                            </div>
                            <a href="{{ url('/contact') }}" class="theme-btn w-100" style="display: block; text-align: center;">
                                Contact Us <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('partials.footer-home3')
@endsection
