@extends('layouts.app')

@section('title', 'Careers | Join Abroad Study Advisors')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #0048B4 0%, #002D72 100%);
        --accent-gradient: linear-gradient(135deg, #E13833 0%, #A31B17 100%);
        --soft-bg: #F0F4FA;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .careers-value-card {
        background: #fff;
        padding: 40px 30px;
        border-radius: 20px;
        box-shadow: var(--card-shadow);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(0, 0, 0, 0.03);
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .careers-value-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--hover-shadow);
    }

    .careers-value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-gradient);
    }

    .value-icon {
        width: 60px;
        height: 60px;
        background: var(--soft-bg);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: #0048B4;
        font-size: 24px;
    }

    .job-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        margin-bottom: 20px;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(0, 0, 0, 0.04);
        transition: all 0.3s ease;
    }

    .job-card:hover {
        box-shadow: var(--hover-shadow);
        border-color: rgba(0, 72, 180, 0.2);
    }

    .job-badge {
        font-size: 12px;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 30px;
        display: inline-block;
        margin-bottom: 15px;
    }

    .badge-fulltime {
        background: #EBF3FF;
        color: #0048B4;
    }

    .badge-location {
        background: #FFF0F0;
        color: #E13833;
        margin-left: 5px;
    }

    .apply-section {
        background: #001533;
        position: relative;
        overflow: hidden;
        border-radius: 24px;
        padding: 60px;
        color: #fff;
        z-index: 1;
    }

    .apply-section::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(0, 72, 180, 0.15) 0%, transparent 70%);
        z-index: -1;
    }
</style>

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
            <h1 class="breadcrumb-title">Careers</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Join Our Team</li>
            </ul>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section-padding fix bg-light">
    <div class="container">
        <div class="section-title text-center mb-60">
            <span class="sub-title wow fadeInUp">Work With Us</span>
            <h2 class="split-text-right split-text-in-right">Why Build Your Career at V54?</h2>
            <p class="mt-3 col-lg-8 mx-auto">We believe in empowering minds, fostering continuous professional growth, and shaping global educational futures together.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="careers-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <h4>Exponential Growth</h4>
                    <p>Unlock your potential with active career mentorship, structured performance rewards, and dynamic learning opportunities.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="careers-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h4>Empowered Culture</h4>
                    <p>Thrive in a highly transparent, diverse, supportive, and collaboratively-driven work environment where all ideas are valued.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="careers-value-card">
                    <div class="value-icon">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h4>Global Impact</h4>
                    <p>Make a real-world difference by helping thousands of ambitious students secure life-changing international education opportunities.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Job Openings Section -->
<section class="section-padding fix bg-white">
    <div class="container">
        <div class="section-title text-center mb-60">
            <span class="sub-title wow fadeInUp">Active Opportunities</span>
            <h2 class="split-text-right split-text-in-right">Current Open Openings</h2>
            <p class="mt-3">Ready to make a shift? Explore our active positions and apply today.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                @forelse($careers as $key => $career)
                    <div class="job-card wow fadeInUp" data-wow-delay="{{ 0.1 * ($key + 1) }}s">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <span class="job-badge badge-fulltime">{{ $career->type }}</span>
                                <span class="job-badge badge-location"><i class="fa-solid fa-location-dot"></i> {{ $career->location }}</span>
                                <h3><a href="{{ route('careers.show', $career->id) }}" style="color: inherit; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='#0048B4'" onmouseout="this.style.color='inherit'">{{ $career->title }}</a></h3>
                                <p class="mb-0 mt-2 text-muted" style="font-size: 15px;">{{ Str::limit(strip_tags($career->description), 180) }}</p>
                            </div>
                            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                                <a href="{{ route('careers.show', $career->id) }}" class="theme-btn btn-sm">View Details & Apply <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-5 rounded-4 shadow-sm bg-white border border-light">
                        <i class="fa-solid fa-briefcase text-muted mb-3" style="font-size: 48px; opacity: 0.5;"></i>
                        <h4>No Active Openings</h4>
                        <p class="mb-0 text-muted">We don't have any active openings right now, but feel free to send a general application below!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>


@endsection
