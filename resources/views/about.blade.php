@extends('layouts.app')

@section('title', 'About V54 Abroad Study Advisors')

@section('content')
<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #0048B4 0%, #002D72 100%);
        --accent-gradient: linear-gradient(135deg, #E13833 0%, #A31B17 100%);
        --soft-bg: #F0F4FA;
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        --hover-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .v54-hero {
        padding: 100px 0;
        background: var(--soft-bg);
        position: relative;
        overflow: hidden;
    }

    .v54-hero::after {
        content: 'V54';
        position: absolute;
        right: -5%;
        top: 50%;
        transform: translateY(-50%);
        font-size: 300px;
        font-weight: 900;
        color: rgba(0, 0, 0, 0.02);
        z-index: 0;
        line-height: 1;
    }

    .pillar-card {
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

    .pillar-card:hover {
        transform: translateY(-10px);
        box-shadow: var(--hover-shadow);
    }

    .pillar-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: var(--primary-gradient);
    }

    .pillar-number {
        font-size: 50px;
        font-weight: 800;
        color: rgba(0, 72, 180, 0.1);
        position: absolute;
        top: 20px;
        right: 30px;
        line-height: 1;
    }

    .phase-roadmap {
        position: relative;
        padding-left: 50px;
    }

    .phase-roadmap::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        width: 2px;
        height: 100%;
        background: rgba(225, 56, 51, 0.2);
        border-radius: 2px;
    }

    .phase-item {
        position: relative;
        margin-bottom: 60px;
    }

    .phase-item:last-child {
        margin-bottom: 0;
    }

    .phase-dot {
        position: absolute;
        left: -50px;
        top: 0;
        width: 32px;
        height: 32px;
        background: #fff;
        border: 4px solid var(--theme);
        border-radius: 50%;
        z-index: 2;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        color: var(--theme);
        box-shadow: 0 0 0 5px rgba(225, 56, 51, 0.1);
    }

    .stat-box {
        text-align: center;
        padding: 30px;
    }

    .stat-number {
        font-size: 48px;
        font-weight: 800;
        color: var(--theme-2);
        margin-bottom: 10px;
        display: block;
    }

    .methodology-box {
        border-radius: 24px;
        background: #fff;
        padding: 50px;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .icon-circle {
        width: 70px;
        height: 70px;
        background: var(--soft-bg);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 25px;
        color: var(--theme-2);
        font-size: 28px;
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
            <h1 class="breadcrumb-title">About V54</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="v54-hero fix">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 wow img-custom-anim-left">
                <div class="about-image p-relative">
                    <img src="{{ asset('assets/img/custom/about_story.png') }}" alt="V54 Story" class="img-fluid rounded-4 shadow-lg">
                    <div class="experience-badge" style="position: absolute; bottom: 30px; right: -30px; background: var(--theme); color: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 15px 30px rgba(225, 56, 51, 0.3);">
                        <h3 class="text-white mb-0">15+</h3>
                        <p class="text-white mb-0" style="font-size: 14px; font-weight: 500;">Years of Excellence</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title mb-4">
                    <span class="sub-title-2 wow fadeInUp" data-wow-delay=".2s">Our Story</span>
                    <h2 class="split-text-right split-text-in-right">Built on Experience, <span style="color: var(--theme);">Driven by Results</span></h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".4s" style="font-size: 18px; line-height: 1.8; color: #555;">
                    V54 Abroad Study Advisors Private Limited is a premier overseas education consultancy built by a team with more than 15 years of industry excellence. We specialize in bridging the gap between ambitious students and leading global educational institutions.
                </p>
                <div class="mt-4 wow fadeInUp" data-wow-delay=".6s">
                    <p style="font-weight: 600; color: var(--header);">"We don't just process applications; we architect careers."</p>
                    <p>Our commitment is to provide an end-to-end service that is smooth, transparent, and entirely stress-free.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Methodology Section -->
<section class="section-padding fix" style="background: #fff;">
    <div class="container">
        <div class="methodology-box wow fadeInUp">
            <div class="row align-items-center g-4">
                <div class="col-lg-4 text-center text-lg-start border-end">
                    <h2 class="mb-3">The Meaning <br>Behind <span style="color: var(--theme-2);">V54</span></h2>
                    <p>Our name is a reflection of our structured approach to your success. It is not just a number—it is a blueprint.</p>
                </div>
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="method-item px-4">
                                <div class="icon-circle">V</div>
                                <h4>Victory</h4>
                                <p>Your ultimate goal of a global career.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="method-item px-4 border-start">
                                <div class="icon-circle">5</div>
                                <h4>5 Pillars</h4>
                                <p>Represents the 5 Pillars of our Foundation.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="method-item px-4 border-start">
                                <div class="icon-circle">4</div>
                                <h4>4 Phases</h4>
                                <p>Represents the 4 Phases of Your Journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The 5 Pillars -->
<section class="section-padding fix bg-light">
    <div class="container">
        <div class="section-title text-center mb-60">
            <span class="sub-title wow fadeInUp">Our Foundation</span>
            <h2 class="split-text-right split-text-in-right">The 5 Pillars of Excellence</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".1s">
                <div class="pillar-card">
                    <span class="pillar-number">01</span>
                    <div class="icon-circle"><i class="fa-solid fa-bullseye"></i></div>
                    <h4>Precision (Vetting)</h4>
                    <p>We use data-driven insights to match your academic profile and financial goals to the perfect university.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="pillar-card">
                    <span class="pillar-number">02</span>
                    <div class="icon-circle"><i class="fa-solid fa-eye"></i></div>
                    <h4>Transparency</h4>
                    <p>No hidden costs or false promises—just a clear, honest view of your global opportunities.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                <div class="pillar-card">
                    <span class="pillar-number">03</span>
                    <div class="icon-circle"><i class="fa-solid fa-user-graduate"></i></div>
                    <h4>Expertise</h4>
                    <p>Our mentors have lived and studied abroad, offering real-world wisdom that textbooks cannot provide.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                <div class="pillar-card">
                    <span class="pillar-number">04</span>
                    <div class="icon-circle"><i class="fa-solid fa-shield-check"></i></div>
                    <h4>Compliance</h4>
                    <p>We maintain a 100% focus on legal and visa documentation accuracy to maximize your approval rates.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                <div class="pillar-card">
                    <span class="pillar-number">05</span>
                    <div class="icon-circle"><i class="fa-solid fa-briefcase"></i></div>
                    <h4>Career-Centricity</h4>
                    <p>We select courses for the future job market trends and post-study work opportunities, not just the degree.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The 4 Phases -->
<section class="section-padding fix" style="background: #fff;">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="section-title mb-4">
                    <span class="sub-title-2 wow fadeInUp">Your Journey</span>
                    <h2 class="split-text-right split-text-in-right">The 4 Phases Roadmap</h2>
                </div>
                <p class="mb-4">Every student at V54 follows a structured, four-stage journey designed for success.</p>
                <div class="image wow img-custom-anim-left">
                    <img src="{{ asset('assets/img/custom/about_journey.png') }}" alt="Journey" class="img-fluid rounded-4 shadow-sm">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="phase-roadmap">
                    <div class="phase-item wow fadeInUp" data-wow-delay=".1s">
                        <div class="phase-dot">1</div>
                        <h4>Phase 1: The Discovery (The Blueprint)</h4>
                        <p>Personalized one-on-one counselling to identify your strengths and build a "University Shortlist" tailored to your long-term vision.</p>
                    </div>
                    <div class="phase-item wow fadeInUp" data-wow-delay=".2s">
                        <div class="phase-dot">2</div>
                        <h4>Phase 2: The Gateway (The Application)</h4>
                        <p>Crafting compelling Statements of Purpose (SOPs) and managing the application flow to ensure you stand out among thousands of international applicants.</p>
                    </div>
                    <div class="phase-item wow fadeInUp" data-wow-delay=".3s">
                        <div class="phase-dot">3</div>
                        <h4>Phase 3: The Transition (Visa & Finance)</h4>
                        <p>Navigating the complexities of student visas, financial proofing, and education loans with a structured, stress-free checklist.</p>
                    </div>
                    <div class="phase-item wow fadeInUp" data-wow-delay=".4s">
                        <div class="phase-dot">4</div>
                        <h4>Phase 4: The Integration (The Landing)</h4>
                        <p>From pre-departure briefings to accommodation assistance and alumni networking, we ensure you are never alone in a new country.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose V54 & Track Record -->
<section class="section-padding fix text-white" style="background-color: #001533; background-image: url({{ asset('assets/img/home-2/feature/bg-shape.png') }}); background-size: cover; position: relative; z-index: 1;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 21, 51, 0.85); z-index: -1;"></div>
    <div class="container">
        <div class="row g-4 justify-content-center mb-60">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mb-4">Proven Track Record of Victory</h2>
                <div class="row g-4 mt-2">
                    <div class="col-md-3 col-6">
                        <div class="stat-box">
                            <span class="stat-number text-white">5000+</span>
                            <p class="text-light">Students Counselled</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-box border-start border-secondary">
                            <span class="stat-number text-white">99%</span>
                            <p class="text-light">Visa Success Rate</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-box border-start border-secondary">
                            <span class="stat-number text-white">15+</span>
                            <p class="text-light">Years Experience Team</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="stat-box border-start border-secondary">
                            <span class="stat-number text-white">100%</span>
                            <p class="text-light">Admission Assistance</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInUp">
                <div class="bg-white text-dark p-5 rounded-4 h-100 shadow-sm">
                    <h3>Continuous Innovation</h3>
                    <p class="mt-3">At V54, we believe in staying ahead serving students. Our team regularly undergoes rigorous training and workshops with Universities & other Partners to stay updated on the latest immigration policies, technology, and global education trends.</p>
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay=".2s">
                <div class="bg-white text-dark p-5 rounded-4 h-100 shadow-sm">
                    <h3>Ethical & Student-Centric</h3>
                    <p class="mt-3">Our pride lies in our ethics. We are committed to understanding your unique goals and providing the honest advice necessary to turn your dream of studying abroad into a reality.</p>
                    <a href="{{ route('contact') }}" class="theme-btn mt-4">Contact Us Today <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
