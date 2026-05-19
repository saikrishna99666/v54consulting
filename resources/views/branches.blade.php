@extends('layouts.app')

@section('title', 'Our Counselling Branches – V54 Abroad Study Advisors')

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
@php
    $breadcrumbImg = ($siteSettings && $siteSettings->breadcrumb_image) 
        ? asset('uploads/settings/' . $siteSettings->breadcrumb_image) 
        : asset('assets/img/inner-page/breadcrumb.jpg');
@endphp

<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ $breadcrumbImg }});">
    <div class="shape"><img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img"></div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">OUR BRANCHES</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Counselling Offices</li>
            </ul>
        </div>
    </div>
</section>

<!-- Branches Section Start -->
<section class="branches-section section-padding bg-light fix">
    <div class="container">
        <div class="section-title text-center mb-5">
            <span class="sub-title text-primary font-weight-bold" style="letter-spacing: 2px; font-weight: 700; text-transform: uppercase;">Counselling Offices</span>
            <h2 class="mt-2" style="font-size: 36px; font-weight: 800; color: #111;">Find Our Nearest Branch</h2>
            <p class="mt-3 mx-auto" style="max-width: 600px; color: #666;">
                "Step into any of our counselling branches today for a personalized session with our expert study abroad advisors."
            </p>
        </div>

        <div class="row g-5">
            @forelse($branches as $branch)
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="branch-card bg-white p-4 p-lg-5 rounded-lg shadow-sm border-0 h-100 d-flex flex-column transition-all" style="border-radius: 16px; border: 1px solid rgba(0,0,0,0.05); transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div class="branch-card-header d-flex align-items-center mb-4">
                            <div class="icon-box bg-primary text-white d-flex align-items-center justify-content-center mr-3" style="width: 54px; height: 54px; border-radius: 12px; font-size: 22px; flex-shrink: 0; background-color: #1b4965 !important;">
                                <i class="fa-solid fa-building-user"></i>
                            </div>
                            <div class="header-info">
                                <h3 class="branch-name mb-1" style="font-size: 24px; font-weight: 700; color: #1b4965;">{{ $branch->name }}</h3>
                                @if($branch->operating_hours)
                                    <span class="operating-badge text-muted small"><i class="fa-regular fa-clock me-1"></i> {{ $branch->operating_hours }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="branch-card-body flex-grow-1">
                            <ul class="contact-details-list list-unstyled mb-4" style="font-size: 15px; line-height: 1.6;">
                                <li class="d-flex align-items-start mb-3">
                                    <span class="text-primary mr-2 mt-1" style="color: #1b4965 !important;"><i class="fa-solid fa-location-dot"></i></span>
                                    <span style="color: #444;">{{ $branch->address }}</span>
                                </li>
                                <li class="d-flex align-items-start mb-3">
                                    <span class="text-primary mr-2 mt-1" style="color: #1b4965 !important;"><i class="fa-solid fa-phone"></i></span>
                                    <span>
                                        @foreach(explode('/', $branch->phone) as $ph)
                                            <a href="tel:{{ trim($ph) }}" class="d-block text-dark hover-primary" style="transition: color 0.2s;">{{ trim($ph) }}</a>
                                        @endforeach
                                    </span>
                                </li>
                                @if($branch->email)
                                    <li class="d-flex align-items-start mb-3">
                                        <span class="text-primary mr-2 mt-1" style="color: #1b4965 !important;"><i class="fa-solid fa-envelope"></i></span>
                                        <span>
                                            @foreach(explode('/', $branch->email) as $em)
                                                <a href="mailto:{{ trim($em) }}" class="d-block text-dark hover-primary" style="transition: color 0.2s;">{{ trim($em) }}</a>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif
                            </ul>

                            @if($branch->google_maps_link)
                                <div class="branch-map rounded overflow-hidden mb-4" style="height: 220px; border-radius: 12px; border: 1px solid rgba(0,0,0,0.1);">
                                    <iframe src="{{ $branch->google_maps_link }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            @endif
                        </div>

                        <div class="branch-card-footer mt-auto pt-3 border-top d-flex gap-2" style="border-top: 1px solid rgba(0,0,0,0.06) !important;">
                            @php
                                $firstPhone = trim(explode('/', $branch->phone)[0]);
                            @endphp
                            <a href="tel:{{ $firstPhone }}" class="theme-btn btn-sm style-2 flex-grow-1 text-center py-3 d-flex align-items-center justify-content-center" style="border-radius: 8px; font-size: 14px; text-transform: uppercase;">
                                <i class="fa-solid fa-phone-volume me-2"></i> Call Office
                            </a>
                            @if($branch->google_maps_link)
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($branch->address) }}" target="_blank" class="theme-btn btn-sm flex-grow-1 text-center py-3 d-flex align-items-center justify-content-center" style="border-radius: 8px; font-size: 14px; text-transform: uppercase; background-color: #1b4965;">
                                    <i class="fa-solid fa-map-location-dot me-2"></i> Directions
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="alert alert-info">Stay tuned! Our office branches will be listed here soon.</div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Additional Custom CSS for Interactive UI -->
<style>
    .branch-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08) !important;
    }
    .hover-primary:hover {
        color: #1b4965 !important;
    }
    .mr-3 {
        margin-right: 1rem !important;
    }
    .mr-2 {
        margin-right: 0.5rem !important;
    }
    .me-2 {
        margin-right: 0.5rem !important;
    }
    .me-1 {
        margin-right: 0.25rem !important;
    }
    .gap-2 {
        gap: 0.5rem !important;
    }
</style>
@endsection
