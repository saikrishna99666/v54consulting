@extends('layouts.app')

@section('title', 'Terms & Conditions – ' . ($siteSettings->companyname ?? 'VISAWAY'))

@push('styles')
<style>
    /* Premium Legal Page Design System */
    .legal-page-wrapper {
        background: radial-gradient(circle at 10% 20%, rgba(248, 250, 252, 1) 0%, rgba(241, 245, 249, 1) 90%);
        padding: 100px 0;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }
    
    /* Elegant Breadcrumb Section */
    .breadcrumb-wrapper {
        padding: 120px 0;
        position: relative;
        overflow: hidden;
        background-color: #08182b;
    }

    .breadcrumb-wrapper::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(8, 24, 43, 0.85) 0%, rgba(5, 15, 28, 0.95) 100%);
        z-index: 1;
    }

    .breadcrumb-wrapper .container {
        position: relative;
        z-index: 2;
    }

    .breadcrumb-title {
        font-size: 48px;
        font-weight: 800;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: -0.5px;
        margin-bottom: 15px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .breadcrumb-list {
        display: flex;
        align-items: center;
        gap: 10px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .breadcrumb-list li, .breadcrumb-list a {
        color: #cbd5e1;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-list a:hover {
        color: #e21c25;
    }

    .breadcrumb-list i {
        color: #e21c25;
        font-size: 12px;
    }

    /* Left Sidebar Navigation Card */
    .legal-sidebar {
        position: sticky;
        top: 110px;
    }

    .toc-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 35px;
        box-shadow: 0 20px 40px rgba(8, 24, 43, 0.04);
        border: 1px solid rgba(226, 28, 37, 0.08);
        transition: all 0.3s ease;
    }

    .toc-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(8, 24, 43, 0.06);
    }

    .toc-card h4 {
        font-size: 18px;
        font-weight: 800;
        color: #08182b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
        position: relative;
    }

    .toc-card h4::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 3px;
        bottom: -2px;
        left: 0;
        background-color: #e21c25;
        border-radius: 2px;
    }

    .toc-list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .toc-item a {
        display: flex;
        align-items: center;
        gap: 12px;
        color: #64748b;
        font-size: 15px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        padding: 10px 15px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
    }

    .toc-item a i {
        color: #cbd5e1;
        transition: color 0.3s ease;
    }

    .toc-item a:hover {
        color: #08182b;
        background: rgba(226, 28, 37, 0.03);
        border-color: rgba(226, 28, 37, 0.15);
    }

    .toc-item a:hover i {
        color: #e21c25;
    }

    .toc-item.active a {
        color: #ffffff;
        background: linear-gradient(135deg, #e21c25 0%, #c8131b 100%);
        border-color: #e21c25;
        box-shadow: 0 10px 20px rgba(226, 28, 37, 0.2);
    }

    .toc-item.active a i {
        color: #ffffff;
    }

    /* Main Premium Legal Content Card */
    .legal-content-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 55px;
        box-shadow: 0 20px 40px rgba(8, 24, 43, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.03);
        position: relative;
        overflow: hidden;
    }

    .legal-content-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(90deg, #e21c25 0%, #08182b 100%);
    }

    /* Dynamic Badges */
    .legal-header-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 40px;
        padding-bottom: 25px;
        border-bottom: 1px solid #f1f5f9;
    }

    .policy-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 18px;
        border-radius: 50px;
        background: rgba(226, 28, 37, 0.08);
        color: #e21c25;
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .update-badge {
        font-size: 14px;
        color: #64748b;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .update-badge i {
        color: #94a3b8;
    }

    /* Typography Polish inside Card */
    .legal-body {
        color: #475569;
        font-size: 17px;
        line-height: 1.85;
    }

    .legal-body h2 {
        color: #08182b;
        font-size: 26px;
        font-weight: 800;
        margin-top: 45px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .legal-body h2::before {
        content: '';
        display: inline-block;
        width: 5px;
        height: 24px;
        background: #e21c25;
        border-radius: 4px;
    }

    .legal-body h3 {
        color: #08182b;
        font-size: 20px;
        font-weight: 700;
        margin-top: 35px;
        margin-bottom: 15px;
    }

    .legal-body p {
        margin-bottom: 22px;
    }

    .legal-body ul, .legal-body ol {
        margin-bottom: 25px;
        padding-left: 20px;
    }

    .legal-body li {
        margin-bottom: 12px;
        position: relative;
        padding-left: 5px;
    }

    .legal-body a {
        color: #e21c25;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 1px dashed rgba(226, 28, 37, 0.4);
    }

    .legal-body a:hover {
        color: #08182b;
        border-bottom-color: #08182b;
    }

    .legal-body strong {
        color: #08182b;
        font-weight: 700;
    }

    /* Support Callout Box */
    .support-callout-box {
        margin-top: 50px;
        padding: 35px;
        background: linear-gradient(135deg, #08182b 0%, #050f1c 100%);
        border-radius: 20px;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.05);
        box-shadow: 0 15px 30px rgba(8, 24, 43, 0.15);
    }

    .support-callout-box::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(226, 28, 37, 0.1);
        z-index: 1;
    }

    .support-callout-content {
        position: relative;
        z-index: 2;
    }

    .support-callout-box h4 {
        color: #ffffff;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .support-callout-box p {
        color: #94a3b8;
        font-size: 15px;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .support-callout-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e21c25;
        color: #ffffff !important;
        font-size: 14px;
        font-weight: 700;
        padding: 12px 25px;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        border: none;
    }

    .support-callout-btn:hover {
        background: #ffffff;
        color: #08182b !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 255, 255, 0.1);
    }

    /* Responsive Spacing */
    @media (max-width: 991px) {
        .legal-page-wrapper {
            padding: 60px 0;
        }
        
        .legal-sidebar {
            margin-bottom: 40px;
            position: relative;
            top: 0;
        }

        .legal-content-card {
            padding: 35px;
        }
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
        <img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="shape">
    </div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Terms & Conditions</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Terms & Conditions</li>
            </ul>
        </div>
    </div>
</section>

<!-- Content Section -->
<div class="legal-page-wrapper">
    <div class="container">
        <div class="row g-4">
            <!-- Left Sticky Sidebar -->
            <div class="col-lg-4">
                <div class="legal-sidebar">
                    <div class="toc-card">
                        <h4>Navigation</h4>
                        <ul class="toc-list">
                            <li class="toc-item">
                                <a href="{{ route('privacy.policy') }}">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    Privacy Policy
                                </a>
                            </li>
                            <li class="toc-item active">
                                <a href="{{ route('terms.conditions') }}">
                                    <i class="fa-solid fa-file-contract"></i>
                                    Terms & Conditions
                                </a>
                            </li>
                            <li class="toc-item">
                                <a href="{{ route('faq') }}">
                                    <i class="fa-solid fa-circle-question"></i>
                                    Help & FAQs
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right Legal content -->
            <div class="col-lg-8">
                <div class="legal-content-card">
                    <!-- Badges Header -->
                    <div class="legal-header-meta">
                        <span class="policy-badge">
                            <i class="fa-solid fa-file-invoice"></i> Terms of Service
                        </span>
                        <span class="update-badge">
                            <i class="fa-solid fa-clock"></i> Last Updated: {{ date('F Y') }}
                        </span>
                    </div>

                    <!-- Inner Body Content -->
                    <div class="legal-body">
                        @if($siteSettings && $siteSettings->terms_conditions)
                            {!! $siteSettings->terms_conditions !!}
                        @else
                            <h2>Terms & Conditions</h2>
                            <p>We are currently updating our Terms & Conditions. Please check back soon or contact us directly using the details below for any questions regarding our terms of service.</p>
                        @endif
                    </div>

                    <!-- Beautiful Support CTA callout box -->
                    <div class="support-callout-box">
                        <div class="support-callout-content">
                            <h4>Need Clarification or Have Questions?</h4>
                            <p>If you have any questions regarding our Terms & Conditions or agreement rules, please reach out to our support helpline.</p>
                            <a href="{{ route('contact') }}" class="support-callout-btn">
                                Contact Support Team <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
