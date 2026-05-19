@extends('layouts.app')

@section('title', $career->title . ' | Careers')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #0048B4 0%, #002D72 100%);
        --accent-gradient: linear-gradient(135deg, #E13833 0%, #A31B17 100%);
        --soft-bg: #F0F4FA;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .detail-card {
        background: #fff;
        border-radius: 20px;
        padding: 40px;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .info-badge {
        font-size: 13px;
        font-weight: 700;
        padding: 8px 18px;
        border-radius: 30px;
        display: inline-block;
        margin-right: 8px;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .info-badge.badge-type {
        background: #EBF3FF;
        color: #0048B4;
    }

    .info-badge.badge-loc {
        background: #FFF0F0;
        color: #E13833;
    }

    .meta-list {
        list-style: none;
        padding: 0;
        margin: 25px 0;
        border-top: 1px solid rgba(0,0,0,0.06);
        border-bottom: 1px solid rgba(0,0,0,0.06);
        padding: 20px 0;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
    }

    .meta-list li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 15px;
        color: #535761;
    }

    .meta-list li i {
        color: #0048B4;
        font-size: 18px;
    }

    .apply-sidebar {
        background: #001533;
        border-radius: 24px;
        padding: 40px 30px;
        color: #fff;
        box-shadow: var(--hover-shadow);
        position: sticky;
        top: 100px;
    }

    .apply-sidebar .form-control, 
    .apply-sidebar .form-select {
        background: #fff !important;
        color: #000 !important;
        border: none !important;
        border-radius: 10px !important;
        padding: 12px 15px !important;
    }

    .apply-sidebar label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #e2e8f0;
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
            <h1 class="breadcrumb-title">Job Details</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li><a href="{{ route('careers') }}">Careers</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>{{ $career->title }}</li>
            </ul>
        </div>
    </div>
</section>

<!-- Job Details Content Section -->
<section class="section-padding fix bg-light">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Description and Requirements -->
            <div class="col-lg-7">
                <div class="detail-card wow fadeInUp">
                    <span class="info-badge badge-type">{{ $career->type }}</span>
                    <span class="info-badge badge-loc"><i class="fa-solid fa-location-dot"></i> {{ $career->location }}</span>
                    
                    <h2 class="mt-3 mb-2" style="font-weight: 800; color: #151A26;">{{ $career->title }}</h2>
                    
                    <ul class="meta-list">
                        <li><i class="fa-regular fa-clock"></i> <strong>Job Type:</strong> {{ $career->type }}</li>
                        <li><i class="fa-solid fa-location-dot"></i> <strong>Location:</strong> {{ $career->location }}</li>
                        <li><i class="fa-regular fa-calendar"></i> <strong>Posted:</strong> {{ $career->created_at->format('M d, Y') }}</li>
                    </ul>

                    <div class="job-description-content mt-4">
                        <h4 class="mb-3" style="font-weight: 700; color: #0048B4;">Role Description</h4>
                        <div class="text-muted" style="line-height: 1.8; font-size: 16px;">
                            {!! $career->description !!}
                        </div>
                    </div>

                    @if($career->requirements)
                        <div class="job-requirements-content mt-5 pt-4" style="border-top: 1px solid rgba(0,0,0,0.06);">
                            <h4 class="mb-3" style="font-weight: 700; color: #0048B4;">Requirements & Qualifications</h4>
                            <div class="text-muted" style="line-height: 1.8; font-size: 16px;">
                                {!! $career->requirements !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Application Form -->
            <div class="col-lg-5">
                <div class="apply-sidebar wow fadeInUp" data-wow-delay=".2s">
                    <h3 class="text-white mb-3" style="font-weight: 700;">Apply for this Position</h3>
                    <p class="text-light-50 mb-4" style="font-size: 14px;">Complete the form below to submit your application. Our recruiting managers will contact you shortly.</p>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show border-0 rounded-3 p-4 mb-4" role="alert">
                            <h5 class="alert-heading text-success mb-2" style="font-weight:700;"><i class="fa-solid fa-circle-check me-2"></i> Application Sent!</h5>
                            <p class="mb-0 text-success" style="font-size:14px;">{{ session('success') }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form id="careers-detail-form" action="{{ route('contact') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="source" value="Careers - {{ $career->title }}">
                        <div class="col-12">
                            <label class="form-label">Full Name *</label>
                            <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email Address *</label>
                            <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Phone Number *</label>
                            <input type="text" name="phone" class="form-control" placeholder="+1234567890" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Applying For</label>
                            <input type="text" class="form-control bg-light text-muted" value="{{ $career->title }}" disabled style="opacity: 0.8; font-weight: 600;">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Cover Letter / Message *</label>
                            <textarea id="cover-letter" class="form-control" rows="4" placeholder="Briefly detail your profile and career vision..." required></textarea>
                        </div>
                        
                        <!-- Hidden message field to compile details -->
                        <input type="hidden" id="hidden-message" name="message">

                        <div class="col-12">
                            <label class="form-label">Upload Resume <span style="font-size:12px; font-weight:400; opacity:.7;">(PDF, DOC, DOCX – max 5MB)</span></label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx"
                                style="background:#fff; color:#000; border:none; border-radius:10px; padding:10px 15px;">
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="theme-btn w-100 style-3" style="background-color: #E13833; border-color: #E13833; font-weight: 700; height: 50px;">
                                Submit Application <i class="fa-solid fa-paper-plane ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('careers-detail-form')?.addEventListener('submit', function(e) {
        const position = "{{ $career->title }}";
        const coverLetter = document.getElementById('cover-letter').value;
        const hiddenMessage = document.getElementById('hidden-message');
        if (hiddenMessage) {
            hiddenMessage.value = `[CAREER APPLICATION: ${position}]\n\n${coverLetter}`;
        }
    });
</script>
@endsection
