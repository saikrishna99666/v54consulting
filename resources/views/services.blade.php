@extends('layouts.app')

@section('title', 'Our Services – Immigration & Visa Consulting')

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
            <h1 class="breadcrumb-title">Services</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Services</li>
            </ul>
        </div>
    </div>
</section>

<!--Service Section Start -->
<section class="service-section section-padding fix section-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                @forelse($services as $service)
                    <div class="service-main-item-3 fade-up-anim">
                        <div class="service-left">
                            <div class="service-image">
                                <img src="{{ asset('uploads/services/' . $service->serviceimage) }}" alt="{{ $service->ServicesTitle }}" style="height: 200px; object-fit: cover;">
                            </div>
                            <div class="content">
                                <h3><a href="{{ route('service.detail', $service->servicesUrl) }}">{{ $service->ServicesTitle }}</a></h3>
                                <p>{{ $service->other }}</p>
                            </div>
                        </div>
                        <div class="service-button">
                            <a href="{{ route('service.detail', $service->servicesUrl) }}" class="theme-btn">read more <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        <h4>No services found.</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<!--Destination-Offer Section Start -->
<section class="destination-offer-section section-padding fix">
    <div class="bg-image"><img src="{{ asset('assets/img/home-3/choose-us/bg.png') }}" alt="img"></div>
    <div class="container">
        <div class="section-title">
            <span class="sub-title-2 theme wow fadeInUp">Countries we offer</span>
            <h2 class="split-text-right split-text-in-right text-white">Choose Your Immigration Destination</h2>
        </div>
        <div class="destination-offer-wrapper-3 fade-up-anim row g-4 g-xl-4 row-cols-xl-5 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us/01.jpg') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-1.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/country-details') }}">Canada</a></h5>
                    </div>
                </div>
            </div>
            <!-- ... More countries ... -->
        </div>
    </div>
</section>
@endsection

@section('footer')
    @include('partials.footer-home3')
@endsection
