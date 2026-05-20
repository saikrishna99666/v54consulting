@extends('layouts.app')

@section('content')

    <!--Hero Section Start -->
    <section class="hero-section hero-1 fix bg-cover"
        style="background-image: url({{ asset('assets/img/home-1/hero/bg.jpg') }});">
        <div class="left-shape">
            <img src="{{ asset('assets/img/home-1/hero/sape-2.png') }}" alt="img">
        </div>
        <!-- <div class="hero-shape">
                                            <img src="{{ asset('assets/img/home-1/hero/shape.png') }}" alt="img">
                                        </div> -->
        <div class="top-shape">
            <img src="{{ asset('assets/img/home-1/hero/shape-3.png') }}" alt="img">
        </div>
        <div class="right-shape">
            <img src="{{ asset('assets/img/home-1/hero/shape-4.png') }}" alt="img">
        </div>
        <div class="container-fluid">
            <div class="swiper hero-slider">
                <div class="swiper-wrapper">
                    @if(isset($carousels) && $carousels->count() > 0)
                        @foreach($carousels as $carousel)
                            <div class="swiper-slide">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="hero-content">
                                            @if(!empty($carousel->subtitle))
                                                <h6>{{ $carousel->subtitle }}</h6>
                                            @endif
                                            <h1>
                                                {{ $carousel->title }}
                                            </h1>
                                            @if(!empty($carousel->description))
                                                <p>{!! strip_tags($carousel->description) !!}</p>
                                            @endif
                                            <div class="hero-button">
                                                <a href="{{ route('contact') }}" class="theme-btn">
                                                    Contact Us
                                                    <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="hero-image">
                                            @if(!empty($carousel->image_url))
                                                <img src="{{ asset('uploads/carousel/' . $carousel->image_url) }}" alt="img"
                                                    style="border-radius: 16px;">
                                            @else
                                                <img src="{{ asset('assets/img/home-1/hero/man.png') }}" alt="img">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <h6>Global Education Simplified</h6>
                                        <h1>
                                            From Application to Visa – We’ve Got You Covered
                                        </h1>
                                        <p>
                                            We guide you through every step of the education visa process, from initial
                                            application to final approval, ensuring a smooth, hassle-free journey.
                                        </p>
                                        <div class="hero-button">
                                            <a href="{{ route('contact') }}" class="theme-btn">
                                                Contact Us
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-image">
                                        <img src="{{ asset('assets/img/home-1/hero/man.png') }}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--About Section Start -->
    <section class="about-section section-padding fix pb-0">
        <div class="top-shape">
            <img src="{{ asset('assets/img/home-1/about/globe.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="about-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-image">
                            <img src="{{ asset('assets/img/custom/home_about_1_v2.png') }}" alt="img"
                                class="wow img-custom-anim-left"
                                style="width: 375px; height: 416px; object-fit: cover; border-radius: 16px;">
                            <div class="about-image-2">
                                <img src="{{ asset('assets/img/custom/home_about_2_v2.png') }}" alt="img"
                                    class="wow img-custom-anim-right"
                                    style="width: 376px; height: 394px; object-fit: cover; border-radius: 16px;">
                            </div>
                            <div class="bg-shape">
                                <img src="{{ asset('assets/img/home-1/about/Vector.png') }}" alt="img">
                            </div>
                            <div class="plane-shape float-bob-y">
                                <img src="{{ asset('assets/img/home-1/about/plane.png') }}" alt="img">
                            </div>
                            <div class="top-shape float-bob-y">
                                <img src="{{ asset('assets/img/home-1/about/shape.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title mb-0">
                                <span class="sub-title wow fadeInUp"
                                    style="background: #EBF2FF; color: var(--theme-2); border: none; padding: 6px 18px; border-radius: 50px; font-size: 14px; margin-bottom: 20px; display: inline-block;">Our
                                    Story</span>
                                <h2 class="split-text-right split-text-in-right"
                                    style="font-size: 48px; line-height: 1.2; font-weight: 800;">
                                    Built on <span style="color: #E13833;">Experience,</span> Driven by Results
                                </h2>
                            </div>
                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                V54 Abroad Study Advisors Private Limited is a premier overseas education consultancy
                                built by a team with more than 15 years of industry excellence. We specialize in
                                bridging the gap between ambitious students and leading global educational institutions.
                            </p>

                            <blockquote class="wow fadeInUp" data-wow-delay=".4s"
                                style="border-left: 4px solid #E13833; padding: 14px 20px; margin: 20px 0; background: #FFF7F7; border-radius: 0 10px 10px 0;">
                                <p
                                    style="margin: 0; font-style: italic; font-weight: 600; color: #151A26; font-size: 15px;">
                                    &ldquo;We don&rsquo;t just process applications; we architect careers.&rdquo;
                                </p>
                            </blockquote>

                            <p class="text wow fadeInUp" data-wow-delay=".45s" style="margin-top: 0;">
                                Our commitment is to provide an end-to-end service that is smooth, transparent, and
                                entirely stress-free.
                            </p>
                            <div class="about-item wow fadeInUp" data-wow-delay=".5s"
                                style="display: flex; gap: 30px; margin-top: 30px;">
                                <div class="content" style="display: flex; align-items: flex-start; gap: 10px;">
                                    <div
                                        style="width: 30px; height: 30px; background: #0048B4; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="fa-solid fa-globe" style="font-size: 14px;"></i>
                                    </div>
                                    <div>
                                        <span style="font-weight: 700; color: #151A26; display: block;">Global Reach-</span>
                                        <p style="font-size: 14px; margin: 0;">Expanding Opportunities Worldwide</p>
                                    </div>
                                </div>
                                <div class="content" style="display: flex; align-items: flex-start; gap: 10px;">
                                    <div
                                        style="width: 30px; height: 30px; background: #0048B4; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="fa-solid fa-globe" style="font-size: 14px;"></i>
                                    </div>
                                    <div>
                                        <span style="font-weight: 700; color: #151A26; display: block;">Global Reach-</span>
                                        <p style="font-size: 14px; margin: 0;">Expanding Opportunities Worldwide</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list wow fadeInUp" data-wow-delay=".3s"
                                style="margin-top: 25px; list-style: none; padding: 0;">
                                <li
                                    style="display: flex; align-items: center; gap: 10px; margin-bottom: 12px; color: #535761; font-weight: 500;">
                                    <i class="fa-solid fa-angles-right" style="color: #0048B4; font-size: 14px;"></i>
                                    Fastest Visa Form Processing With Skilled Immigration Agents
                                </li>
                                <li
                                    style="display: flex; align-items: center; gap: 10px; color: #535761; font-weight: 500;">
                                    <i class="fa-solid fa-angles-right" style="color: #0048B4; font-size: 14px;"></i>
                                    Partnership With International Educational Institutions
                                </li>
                            </ul>
                            <a href="{{ route('about') }}" class="theme-btn wow fadeInUp" data-wow-delay=".5s"
                                style="border-radius: 50px; background: #fff; border: 1px solid #ddd; padding: 8px 8px 8px 30px; display: inline-flex; align-items: center; gap: 20px; margin-top: 30px; text-transform: uppercase; font-weight: 700; font-size: 14px; color: #151A26;">
                                GET STARTED
                                <span
                                    style="width: 45px; height: 45px; background: #E13833; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Service Section Start -->
    <section class="service-section section-padding fix" style="background: #fdfdfd; padding: 60px 0;">
        <div class="container">
            <div class="section-title text-center mb-40">
                <span class="sub-title wow fadeInUp"
                    style="background: #EBF2FF; color: var(--theme-2); border: none; padding: 6px 18px; border-radius: 50px; font-size: 14px;">Our
                    Expert Services</span>
                <h2 class="wow fadeInUp" data-wow-delay=".3s"
                    style="font-size: 36px; font-weight: 800; text-transform: uppercase; margin-top: 15px;">
                    Comprehensive Visa Solutions
                </h2>
                <p class="wow fadeInUp" data-wow-delay=".5s" style="font-size: 16px; color: var(--text); margin-top: 10px;">
                    Expert guidance at every step of your education visa journey.
                </p>
            </div>
            <div class="row g-4">
                @foreach($services as $index => $service)
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.2 * ($index + 1) }}s">
                        <div class="service-card-v2">
                            <div class="service-illustration {{ $index >= 2 ? 'is-flyer' : 'is-photo' }}">
                                <img src="{{ asset('uploads/services/' . $service->serviceimage) }}"
                                    alt="{{ $service->ServicesTitle }}">
                            </div>
                            <div class="service-content">
                                <h3>{{ $service->ServicesTitle }}</h3>
                                <div class="accent-line"></div>
                                <p>
                                    {{ $service->other }}
                                </p>
                                <a href="{{ route('service.detail', $service->servicesUrl) }}" class="service-details-link">
                                    Service Details <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose V54 Section Start -->
    <style>
        .why-choose-section {
            position: relative;
            overflow: hidden;
            background: #F8FAFD;
        }

        /* Soft radial glow backgrounds */
        .why-choose-section::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(0, 72, 180, 0.05) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        .why-choose-section::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(225, 56, 51, 0.03) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        .why-choose-image-wrapper {
            position: relative;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 72, 180, 0.1);
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
            z-index: 2;
        }

        .why-choose-image-wrapper:hover {
            transform: translateY(-8px);
            box-shadow: 0 30px 60px rgba(0, 72, 180, 0.18);
        }

        .why-choose-image-wrapper img {
            transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .why-choose-image-wrapper:hover img {
            transform: scale(1.06);
        }

        .stats-overlay-badge {
            position: absolute;
            bottom: 25px;
            left: 25px;
            right: 25px;
            background: rgba(0, 72, 180, 0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 18px 24px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease;
        }

        .why-choose-image-wrapper:hover .stats-overlay-badge {
            background: rgba(0, 72, 180, 0.96);
            transform: translateY(-3px);
        }

        .why-choose-right {
            position: relative;
            z-index: 2;
        }

        .why-choose-value-card {
            background: #fff;
            border-radius: 22px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.015);
            border: 1px solid rgba(0, 72, 180, 0.03);
            display: flex;
            gap: 22px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .why-choose-value-card::after {
            content: '';
            position: absolute;
            left: 0;
            top: 10%;
            height: 80%;
            width: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .why-choose-value-card.card-blue::after {
            background: #0048B4;
        }

        .why-choose-value-card.card-red::after {
            background: #E13833;
        }

        .why-choose-value-card:hover {
            transform: translateY(-6px);
            border-color: rgba(0, 72, 180, 0.08);
            background: #fff;
        }

        .why-choose-value-card.card-blue:hover {
            box-shadow: 0 20px 40px rgba(0, 72, 180, 0.07);
        }

        .why-choose-value-card.card-red:hover {
            box-shadow: 0 20px 40px rgba(225, 56, 51, 0.07);
            border-color: rgba(225, 56, 51, 0.08);
        }

        .icon-box-wrapper {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .why-choose-value-card.card-blue .icon-box-wrapper {
            background: #EBF3FF;
            color: #0048B4;
        }

        .why-choose-value-card.card-red .icon-box-wrapper {
            background: #FFF0F0;
            color: #E13833;
        }

        .why-choose-value-card:hover .icon-box-wrapper {
            transform: scale(1.12) rotate(6deg);
        }

        .why-choose-value-card.card-blue:hover .icon-box-wrapper {
            background: #0048B4;
            color: #fff;
        }

        .why-choose-value-card.card-red:hover .icon-box-wrapper {
            background: #E13833;
            color: #fff;
        }

        .value-card-title {
            font-weight: 800;
            color: #151A26;
            font-size: 19px;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        .why-choose-value-card:hover .value-card-title {
            color: #0048B4;
        }

        .why-choose-value-card.card-red:hover .value-card-title {
            color: #E13833;
        }
    </style>

    <section class="why-choose-section section-padding fix" style="padding: 90px 0;">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left: Trust Certified Consultation Image -->
                <div class="col-lg-5 col-md-12">
                    <div class="why-choose-left wow fadeInLeft" data-wow-delay=".2s">
                        <div class="why-choose-image-wrapper">
                            <img src="{{ asset('assets/img/custom/why_choose_v54.png') }}" alt="Why Choose V54"
                                style="width: 100%; height: auto; display: block; object-fit: cover;">
                            <div class="stats-overlay-badge">
                                <div
                                    style="width: 48px; height: 48px; background: #E13833; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 4px 10px rgba(225, 56, 51, 0.4);">
                                    <i class="fa-solid fa-award" style="font-size: 20px; color: #fff;"></i>
                                </div>
                                <div>
                                    <h5
                                        style="margin: 0; font-weight: 800; font-size: 15px; color: #fff; letter-spacing: 0.6px; text-transform: uppercase;">
                                        ISO 9001:2015 Certified</h5>
                                    <p style="margin: 0; font-size: 12px; opacity: 0.9; font-weight: 500;">Globally
                                        Recognized Quality & Trust</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Content & Core Value Card Stack -->
                <div class="col-lg-7 col-md-12">
                    <div class="why-choose-right wow fadeInRight" data-wow-delay=".3s">
                        <div class="section-title mb-40">
                            <span class="sub-title"
                                style="background: #E13833; color: #fff; border: none; padding: 6px 18px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase; display: inline-block; margin-bottom: 15px; letter-spacing: 1px;">
                                WHY CHOOSE V54?
                            </span>
                            <h2
                                style="font-size: 42px; font-weight: 800; color: #151A26; line-height: 1.25; margin-bottom: 0;">
                                Empowering Your Global <span style="color: #0048B4;">Education Journey</span>
                            </h2>
                        </div>

                        <!-- Core Value Card Stack -->
                        <div style="display: flex; flex-direction: column; gap: 24px;">
                            <!-- Value 1: Global Reach, Personal Touch -->
                            <div class="why-choose-value-card card-blue">
                                <div class="icon-box-wrapper">
                                    <i class="fa-solid fa-earth-americas" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h4 class="value-card-title">Global Reach, Personal Touch</h4>
                                    <p
                                        style="color: #535761; font-size: 14.5px; line-height: 1.65; margin: 0; font-weight: 500;">
                                        We offer comprehensive services for leading institutions across the globe. Our
                                        management team brings valuable international exposure, having lived and worked in
                                        most of the countries we process. This allows us to understand student challenges
                                        deeply and provide practical, reliable guidance.
                                    </p>
                                </div>
                            </div>

                            <!-- Value 2: Continuous Innovation -->
                            <div class="why-choose-value-card card-red">
                                <div class="icon-box-wrapper">
                                    <i class="fa-solid fa-wand-magic-sparkles" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h4 class="value-card-title">Continuous Innovation</h4>
                                    <p
                                        style="color: #535761; font-size: 14.5px; line-height: 1.65; margin: 0; font-weight: 500;">
                                        At V54, we believe in staying ahead to serve students better. Our team regularly
                                        undergoes rigorous training and workshops with international universities and
                                        business partners to stay updated on the latest immigration policies, technology,
                                        and global education trends.
                                    </p>
                                </div>
                            </div>

                            <!-- Value 3: Ethical & Student-Centric -->
                            <div class="why-choose-value-card card-blue">
                                <div class="icon-box-wrapper">
                                    <i class="fa-solid fa-shield-halved" style="font-size: 24px;"></i>
                                </div>
                                <div>
                                    <h4 class="value-card-title">Ethical & Student-Centric</h4>
                                    <p
                                        style="color: #535761; font-size: 14.5px; line-height: 1.65; margin: 0; font-weight: 500;">
                                        Our pride lies in our ethics. We are committed to understanding your unique goals
                                        and providing the honest, personalized advice necessary to turn your dream of
                                        studying abroad into a concrete reality.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Feature Section Start -->
    <section class="feature-section section-padding fix bg-cover"
        style="background-image: url({{ asset('assets/img/home-1/feature/bg.png') }});">
        <div class="container">
            <div class="feature-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="feature-content">
                            <div class="section-title mb-0">
                                <span class="sub-title bg-2 wow fadeInUp">UK. United Kingdom</span>
                                <h2 class="text-white split-text-right split-text-in-right">
                                    Visa & vISAWAY Services To uk
                                </h2>
                            </div>
                            <p class="text wow fadeInUp" data-wow-delay=".3s">
                                The Express Entry program is designed for skilled workers who wish to immigrate to Canada.
                                It includes the Federal Skilled Worker Program, the Federal Skilled…
                            </p>
                            <div class="feature-list-item wow fadeInUp" data-wow-delay=".5s">
                                <ul class="list">
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Visitor Visa
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Student Visa & Admission
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Work Visa – H1B
                                    </li>
                                </ul>
                                <ul class="list">
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Business Visa
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Work permit for Canada
                                    </li>
                                    <li>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        Student Visa for Canada
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('contact') }}" class="theme-btn">
                                Get Started
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-image">
                            <div class="orbit-container">
                                <div class="orbit-ring"></div>
                                <div class="orbit-ring orbit-ring--2"></div>
                                <div class="orbit-flag flag-1"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-usa.png') }}" alt="USA"></div>
                                <div class="orbit-flag flag-2"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-uk.png') }}" alt="UK"></div>
                                <div class="orbit-flag flag-3"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-australia.png') }}" alt="Australia">
                                </div>
                                <div class="orbit-flag flag-4"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-canada.png') }}" alt="Canada"></div>
                                <div class="orbit-flag flag-5"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-india.png') }}" alt="India"></div>
                                <div class="orbit-flag flag-6"><img
                                        src="{{ asset('assets/img/home-1/feature/flag-germany.png') }}" alt="Germany"></div>
                                <div class="orbit-center-dot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Testimonial Section Start -->
    <style>
        .premium-testimonial-card {
            background: #ffffff;
            border: 1px solid rgba(0, 72, 180, 0.05);
            border-radius: 24px;
            padding: 35px 30px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .premium-testimonial-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--theme-2) 0%, var(--theme) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .premium-testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 72, 180, 0.08);
            border-color: rgba(0, 72, 180, 0.1);
        }
        .premium-testimonial-card:hover::before {
            opacity: 1;
        }
        .card-quote-icon {
            position: absolute;
            top: 30px;
            right: 30px;
            font-size: 38px;
            color: rgba(0, 72, 180, 0.08);
            transition: all 0.3s ease;
        }
        .premium-testimonial-card:hover .card-quote-icon {
            color: rgba(225, 56, 51, 0.15);
            transform: scale(1.1) rotate(-10deg);
        }
        .star-rating {
            margin-bottom: 20px;
        }
        .star-rating i {
            color: #FFB800;
            font-size: 14px;
            margin-right: 2px;
        }
        .testimonial-text {
            font-size: 15.5px;
            line-height: 1.7;
            color: #535761;
            font-style: italic;
            font-weight: 500;
            margin-bottom: 30px;
        }
        .client-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: auto;
        }
        .client-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
        }
        .client-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .client-info h4 {
            font-size: 17px;
            font-weight: 800;
            color: #151A26;
            margin: 0 0 4px 0;
        }
        .client-info .destination {
            font-size: 12px;
            font-weight: 600;
            color: var(--theme-2);
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>

    <section class="testimonial-section section-padding pb-0 fix" style="padding-bottom: 90px !important;">
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title wow fadeInUp"
                    style="background: #EBF2FF; color: var(--theme-2); border: none; padding: 6px 18px; border-radius: 50px; font-size: 14px; font-weight: 800; text-transform: uppercase; display: inline-block; margin-bottom: 15px; letter-spacing: 1px;">
                    WHAT OUR STUDENTS SAY
                </span>
                <h2 class="split-text-right split-text-in-right"
                    style="font-size: 42px; font-weight: 800; color: #151A26; line-height: 1.25; margin-bottom: 0; text-transform: uppercase;">
                    Student Reviews & <span style="color: var(--theme-2);">Testimonials</span>
                </h2>
            </div>
            <div class="testimonial-wrapper">
                <div class="row g-4 align-items-stretch">
                    <!-- Left Column: Video Poster -->
                    <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
                        <div class="testimonia-image tp-clip-anim p-relative shadow-lg" style="height: 100%; min-height: 370px; border-radius: 24px; overflow: hidden; border: 1px solid rgba(0, 0, 0, 0.05);">
                            <img src="{{ asset('assets/img/home-1/testimonial/01.png') }}" alt="Student Success Story" class="tp-anim-img"
                                data-animate="true" style="object-fit: cover; width: 100%; height: 100%;">
                            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup shadow-lg" style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                <i class="fa-solid fa-play"></i>
                            </a>
                            <h5 style="background: rgba(21, 26, 38, 0.75); backdrop-filter: blur(8px); padding: 10px 20px; border-radius: 12px; font-size: 15px; font-weight: 700; width: calc(100% - 48px); margin: 0; text-align: center; left: 24px; bottom: 24px; border: 1px solid rgba(255,255,255,0.15);">
                                Real Success Stories
                            </h5>
                        </div>
                    </div>
                    
                    <!-- Right Column: Swiper Slider -->
                    <div class="col-lg-8 wow fadeInRight" data-wow-delay=".3s">
                        <div class="swiper testimonial-slider" style="padding: 10px 5px 30px 5px;">
                            <div class="swiper-wrapper">
                                @foreach($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="premium-testimonial-card">
                                            <div class="card-quote-icon">
                                                <i class="fa-solid fa-quote-right"></i>
                                            </div>
                                            <div>
                                                <div class="star-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= $testimonial->stars)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="fa-regular fa-star" style="color: rgba(255, 184, 0, 0.2);"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <p class="testimonial-text">
                                                    "{{ $testimonial->quote }}"
                                                </p>
                                            </div>
                                            <div class="client-meta">
                                                <div class="client-avatar">
                                                    @if($testimonial->image)
                                                        <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="{{ $testimonial->name }}">
                                                    @else
                                                        <img src="{{ asset('assets/img/home-1/testimonial/client.png') }}" alt="{{ $testimonial->name }}">
                                                    @endif
                                                </div>
                                                <div class="client-info">
                                                    <h4>{{ $testimonial->name }}</h4>
                                                    <span class="destination">
                                                        <i class="fa-solid fa-location-dot" style="margin-right: 4px;"></i> {{ $testimonial->destination }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Booking Section Start -->
    <style>
        .booking-section {
            background: linear-gradient(135deg, #F5F8FF 0%, #FFFFFF 100%);
            position: relative;
            overflow: hidden;
            border-top: 1px solid rgba(0, 72, 180, 0.05);
            border-bottom: 1px solid rgba(0, 72, 180, 0.05);
        }
        .booking-section::before {
            content: '';
            position: absolute;
            top: -10%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 72, 180, 0.04) 0%, transparent 70%);
            pointer-events: none;
        }
        .booking-section::after {
            content: '';
            position: absolute;
            bottom: -10%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(225, 56, 51, 0.03) 0%, transparent 70%);
            pointer-events: none;
        }
        .booking-card {
            background: #ffffff;
            border: 1px solid rgba(0, 72, 180, 0.08);
            border-radius: 24px;
            box-shadow: 0 15px 40px rgba(0, 72, 180, 0.06);
            padding: 40px;
            position: relative;
            z-index: 2;
        }
        .booking-form .form-label {
            font-weight: 700;
            color: #151A26;
            font-size: 13px;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
        }
        .booking-form .form-control, 
        .booking-form .form-select {
            border: 1px solid #E2E8F0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #1e293b;
            background-color: #f8fafc;
            transition: all 0.3s ease;
            width: 100%;
        }
        .booking-form .form-control:focus,
        .booking-form .form-select:focus {
            border-color: #0048B4;
            background-color: #fff;
            box-shadow: 0 0 0 4px rgba(0, 72, 180, 0.1);
            outline: none;
        }
        .booking-form .theme-btn {
            width: 100%;
            justify-content: center;
            border-radius: 12px;
            padding: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .booking-benefit-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 24px;
        }
        .booking-benefit-icon {
            width: 40px;
            height: 40px;
            background: #EBF2FF;
            color: #0048B4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(0, 72, 180, 0.05);
        }
        .booking-benefit-content h5 {
            font-weight: 800;
            color: #151A26;
            font-size: 16px;
            margin: 0 0 4px 0;
        }
        .booking-benefit-content p {
            margin: 0;
            font-size: 14px;
            color: #535761;
            line-height: 1.5;
        }
        .is-invalid {
            border-color: #dc3545 !important;
            background-color: #fff8f8 !important;
        }
        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            font-weight: 600;
            margin-top: 5px;
            display: block;
        }
    </style>

    <section class="booking-section section-padding fix" id="book-appointment-section" style="padding: 90px 0;">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Left: Copywriting & Value Props -->
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay=".2s">
                    <div class="section-title mb-4">
                        <span class="sub-title"
                            style="background: #0048B4; color: #fff; border: none; padding: 6px 18px; border-radius: 50px; font-size: 12px; font-weight: 800; text-transform: uppercase; display: inline-block; margin-bottom: 15px; letter-spacing: 1px;">
                            FREE ADVISORY SESSION
                        </span>
                        <h2 style="font-size: 42px; font-weight: 800; color: #151A26; line-height: 1.25; margin-bottom: 20px;">
                            Take the First Step to Your <span style="color: #E13833;">Global Career</span>
                        </h2>
                        <p style="color: #535761; font-size: 16px; line-height: 1.8; font-weight: 500;">
                            Book a one-on-one session with our certified education and visa specialists. Get personalized guidance on choosing the right study destinations, university selection, visa documentation, and post-study opportunities.
                        </p>
                    </div>

                    <!-- Trust Cards -->
                    <div class="mt-4">
                        <div class="booking-benefit-item">
                            <div class="booking-benefit-icon">
                                <i class="fa-solid fa-user-tie"></i>
                            </div>
                            <div class="booking-benefit-content">
                                <h5>Certified Visa Experts</h5>
                                <p>Get guided by professionals with over 15+ years of combined immigration compliance and visa success experience.</p>
                            </div>
                        </div>

                        <div class="booking-benefit-item">
                            <div class="booking-benefit-icon" style="background: #FFF0F0; color: #E13833;">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                            <div class="booking-benefit-content">
                                <h5>100% Personal Study Plans</h5>
                                <p>We don't follow cookie-cutter templates. We custom architecture study plans suited directly to your career aims.</p>
                            </div>
                        </div>

                        <div class="booking-benefit-item">
                            <div class="booking-benefit-icon">
                                <i class="fa-solid fa-handshake"></i>
                            </div>
                            <div class="booking-benefit-content">
                                <h5>Global University Network</h5>
                                <p>Leverage direct admissions and entry paths with top universities across the USA, UK, Canada, Australia, and Europe.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Sleek Appointment Form -->
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".3s">
                    <div class="booking-card">
                        <h3 style="font-size: 24px; font-weight: 800; color: #151A26; margin-bottom: 25px; text-transform: uppercase; text-align: center;">
                            Book An Appointment
                        </h3>

                        {{-- Alert messages --}}
                        <div id="booking-alert" style="display: none; margin-bottom: 20px;"></div>

                        <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST" class="booking-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="book_name">Full Name *</label>
                                    <input type="text" name="name" id="book_name" class="form-control" placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_email">Email Address *</label>
                                    <input type="email" name="email" id="book_email" class="form-control" placeholder="Enter email address" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_phone">Phone Number *</label>
                                    <input type="text" name="phone" id="book_phone" class="form-control" placeholder="Enter phone number" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_service">Desired Service *</label>
                                    <select name="service_id" id="book_service" class="form-select" style="height: 50px; background-color: #f8fafc;" required>
                                        <option value="">Select Service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->Serviceid }}">{{ $service->ServicesTitle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_date">Appointment Date *</label>
                                    <input type="date" name="appointment_date" id="book_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="book_time">Preferred Time Slot *</label>
                                    <select name="appointment_time" id="book_time" class="form-select" style="height: 50px; background-color: #f8fafc;" required>
                                        <option value="">Select Time Slot</option>
                                        <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                        <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                        <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                                        <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                        <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                                        <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                                        <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="book_message">Additional Message</label>
                                    <textarea name="message" id="book_message" class="form-control" rows="3" placeholder="Tell us about your visa goals or questions (optional)"></textarea>
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="theme-btn btn-blue" style="background-color: #0048B4; color: #fff;">
                                        <span>SUBMIT BOOKING REQUEST</span>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Faq Section Start -->
    <section class="faq-section section-padding fix">
        <div class="container">
            <div class="faq-wrapper">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="faq-content">
                            <div class="section-title mb-0">
                                <span class="sub-title wow fadeInUp">Visa FAQs</span>
                                <h2 class="split-text-right split-text-in-right">
                                    Got Questions? We’ve Got Answers
                                </h2>
                            </div>
                            <p class="text">
                                We understand students often have many questions about studying abroad. Our experts provide
                                clear.
                            </p>
                            <a href="{{ route('contact') }}" class="theme-btn">
                                contact us
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="faq-items">
                            <div class="accordion" id="accordionExample">
                                @php
                                    $displayFaqs = (isset($homeFaqs) && $homeFaqs->count() > 0) ? $homeFaqs->take(5) : \App\Models\Faq::take(5)->get();
                                @endphp
                                @foreach($displayFaqs as $idx => $faq)
                                    <div class="accordion-item wow fadeInUp" data-wow-delay="{{ 0.2 * ($idx + 1) }}s">
                                        <h5 class="accordion-header" id="heading-{{ $faq->id }}">
                                            <button class="accordion-button {{ $idx == 0 ? '' : 'collapsed' }}" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse-{{ $faq->id }}"
                                                aria-expanded="{{ $idx == 0 ? 'true' : 'false' }}"
                                                aria-controls="collapse-{{ $faq->id }}">
                                                {{ $faq->question }}
                                            </button>
                                        </h5>
                                        <div id="collapse-{{ $faq->id }}"
                                            class="accordion-collapse collapse {{ $idx == 0 ? 'show' : '' }}"
                                            aria-labelledby="heading-{{ $faq->id }}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                {!! $faq->answer !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Counter Section Start -->
    <section class="counter-section section-padding pb-0 fix bg-cover"
        style="background-image: url({{ asset('assets/img/home-1/feature/bg-2.jpg') }});">
        <div class="shape">
            <img src="{{ asset('assets/img/home-1/feature/shape-2.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="sub-title bg-2 wow fadeInUp">Did You Know</span>
                <h2 class="text-white split-text-right split-text-in-right">
                    Our Achievements in Numbers
                </h2>
            </div>
        </div>
        <div class="counter-wrapper">
            <div class="container">
                <div class="counter-main-item">
                    <div class="counter-item style-2">
                        <h2><span class="odometer" data-count="5">0</span>k+</h2>
                        <h5>Students Counselled</h5>
                        <p>
                            Successfully assisted over 5000 students worldwide.
                        </p>
                    </div>
                    <div class="counter-item style-2">
                        <h2><span class="odometer" data-count="99">00</span>%</h2>
                        <h5>Visa Success Rate</h5>
                        <p>
                            Maintaining an industry-leading approval rate.
                        </p>
                    </div>
                    <div class="counter-item style-2">
                        <h2><span class="odometer" data-count="15">00</span>+</h2>
                        <h5>Years of Experience</h5>
                        <p>
                            Expert team with over 15 years of industry excellence.
                        </p>
                    </div>
                    <div class="counter-item">
                        <h2><span class="odometer" data-count="100">00</span>%</h2>
                        <h5>Admission Assistance</h5>
                        <p>
                            Comprehensive support for global university admissions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Visa-Consultency Section Start -->
    <!-- <section class="visa-consultency-section section-padding fix">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="visa-consultency-item">
                                <div class="image">
                                    <img src="{{ asset('assets/img/home-1/feature/icon-1.png') }}" alt="img">
                                </div>
                                <h3>Best Visa Consultancy</h3>
                                <h6>2025</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="visa-consultency-item">
                                <div class="image">
                                    <img src="{{ asset('assets/img/home-1/feature/icon-2.png') }}" alt="img">
                                </div>
                                <h3>Visa Success Award</h3>
                                <h6>2025</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="visa-consultency-item">
                                <div class="image">
                                    <img src="{{ asset('assets/img/home-1/feature/icon-3.png') }}" alt="img">
                                </div>
                                <h3>Innovation Award</h3>
                                <h6>2025</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="visa-consultency-item">
                                <div class="image">
                                    <img src="{{ asset('assets/img/home-1/feature/icon-4.png') }}" alt="img">
                                </div>
                                <h3>Global Education Partner</h3>
                                <h6>2025</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

    <!--Careers CTA Section Start -->
    <section class="careers-cta-section section-padding fix bg-light"
        style="padding: 80px 0; background: #F0F4FA; border-top: 1px solid rgba(0,0,0,0.03); border-bottom: 1px solid rgba(0,0,0,0.03);">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 wow img-custom-anim-left">
                    <div class="about-image p-relative">
                        <img src="{{ asset('assets/img/custom/join_our_team.png') }}" alt="Join Our Team"
                            class="img-fluid rounded-4 shadow-lg" style="object-fit: cover; width: 100%; height: 350px;">
                        <div class="experience-badge"
                            style="position: absolute; bottom: -20px; right: 20px; background: #0048B4; color: #fff; padding: 20px 30px; border-radius: 15px; box-shadow: 0 15px 30px rgba(0, 72, 180, 0.2);">
                            <h4 class="text-white mb-0">WE ARE</h4>
                            <p class="text-white mb-0"
                                style="font-size: 16px; font-weight: 700; text-transform: uppercase; color: #E13833 !important;">
                                HIRING!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title mb-4">
                        <span class="sub-title wow fadeInUp"
                            style="background: #EBF2FF; color: var(--theme-2); border: none; padding: 6px 18px; border-radius: 50px; font-size: 14px; margin-bottom: 20px; display: inline-block;">Grow
                            With Us</span>
                        <h2 class="split-text-right split-text-in-right"
                            style="font-size: 38px; line-height: 1.2; font-weight: 800; text-transform: uppercase;">
                            Shape the Future of <span style="color: #E13833;">Global Education</span>
                        </h2>
                    </div>
                    <p class="text wow fadeInUp" data-wow-delay=".3s"
                        style="font-size: 16px; line-height: 1.8; color: #535761;">
                        Are you passionate about guiding students toward their dream careers? Join V54 Abroad Study Advisors
                        and work with a premium team driven by industry excellence.
                        We operate through our structured <strong>V54 Methodology</strong>: built upon <strong>5 Pillars of
                            Foundation</strong> (Precision, Transparency, Expertise, Compliance, and Career-Centricity), and
                        executed across the <strong>4 Phases of a Student's Journey</strong> to achieve
                        <strong>Victory</strong>.
                    </p>
                    <div class="row g-3 mt-2 wow fadeInUp" data-wow-delay=".5s">
                        <div class="col-sm-6">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa-solid fa-circle-check" style="color: #0048B4; font-size: 18px;"></i>
                                <span style="font-weight: 600; color: #151A26;">Precision & Transparency</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa-solid fa-circle-check" style="color: #0048B4; font-size: 18px;"></i>
                                <span style="font-weight: 600; color: #151A26;">Career-Centric Mentorship</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa-solid fa-circle-check" style="color: #0048B4; font-size: 18px;"></i>
                                <span style="font-weight: 600; color: #151A26;">100% Documentation Compliance</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <i class="fa-solid fa-circle-check" style="color: #0048B4; font-size: 18px;"></i>
                                <span style="font-weight: 600; color: #151A26;">Victory-Focused Growth</span>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('careers') }}" class="theme-btn wow fadeInUp" data-wow-delay=".6s"
                        style="border-radius: 50px; background: #fff; border: 1px solid #ddd; padding: 8px 8px 8px 30px; display: inline-flex; align-items: center; gap: 20px; margin-top: 35px; text-transform: uppercase; font-weight: 700; font-size: 14px; color: #151A26;">
                        Explore Career Openings
                        <span
                            style="width: 45px; height: 45px; background: #E13833; color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--Brand Section Start -->
    <div class="brand-section fix">
        <div class="container">
            <div class="brand-wrapper style-1">
                <div class="brand-item">
                    <div class="swiper brand-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-image text-center">
                                    <img src="{{ asset('assets/img/home-1/brand/01.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-image text-center">
                                    <img src="{{ asset('assets/img/home-1/brand/02.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-image text-center">
                                    <img src="{{ asset('assets/img/home-1/brand/03.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-image text-center">
                                    <img src="{{ asset('assets/img/home-1/brand/04.png') }}" alt="img">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-image text-center">
                                    <img src="{{ asset('assets/img/home-1/brand/05.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--News Section Start -->
    <section class="news-section section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="sub-title wow fadeInUp">Visa Tips & Guides</span>
                    <h2 class="split-text-right split-text-in-right">
                        Latest Insights & Updates
                    </h2>
                </div>
                <a href="{{ url('/blog') }}" class="theme-btn wow fadeInUp" data-wow-delay=".3s">
                    view all articies
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            <div class="row">
                @foreach($latestBlogs as $blog)
                    @php
                        $blogImg = ($blog->image1) ? asset('uploads/blog/' . $blog->image1) : asset('assets/img/home-1/news/news-1.jpg');
                    @endphp
                    <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="news-card-item">
                            <div class="news-image">
                                <img src="{{ $blogImg }}" alt="{{ $blog->name }}"
                                    onerror="this.src='{{ asset('assets/img/home-1/news/news-1.jpg') }}'">
                                <span>{{ $blog->category ?? 'Visa' }}</span>
                                <div class="news-layer-wrapper">
                                    <div class="news-layer-image" style="background-image: url('{{ $blogImg }}');"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ $blogImg }}');"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ $blogImg }}');"></div>
                                    <div class="news-layer-image" style="background-image: url('{{ $blogImg }}');"></div>
                                </div>
                            </div>
                            <div class="news-content">
                                <h3>
                                    <a href="{{ url('/blog/' . $blog->blogurl) }}">
                                        {{ $blog->name }}
                                    </a>
                                </h3>
                                <div class="news-bottom">
                                    <a href="{{ url('/blog/' . $blog->blogurl) }}" class="link-btn">View Articles<i
                                            class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#appointmentForm').on('submit', function(e) {
            e.preventDefault();

            var $form = $(this);
            var $button = $form.find('button[type="submit"]');
            var $alertBox = $('#booking-alert');
            
            // Clear previous errors
            $form.find('.form-control, .form-select').removeClass('is-invalid');
            $form.find('.invalid-feedback').remove();
            $alertBox.hide().html('');

            // Loading state
            $button.prop('disabled', true).html('<span>PROCESSING BOOKING...</span> <i class="fa-solid fa-spinner fa-spin"></i>');

            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                dataType: 'json',
                success: function(response) {
                    // Success message
                    $alertBox.html('<div class="alert alert-success" style="border-radius: 12px; border: none; background-color: #d1e7dd; color: #0f5132; padding: 15px; font-weight: 600;"><i class="fa-solid fa-circle-check mr-2" style="font-size: 16px;"></i> ' + response.message + '</div>').fadeIn();
                    
                    // Reset form
                    $form[0].reset();

                    // Restore button
                    $button.prop('disabled', false).html('<span>SUBMIT BOOKING REQUEST</span> <i class="fa-solid fa-arrow-right"></i>');

                    // Scroll slightly to let user see success alert clearly
                    $('html, body').animate({
                        scrollTop: $("#book-appointment-section").offset().top - 100
                    }, 500);
                },
                error: function(xhr) {
                    $button.prop('disabled', false).html('<span>SUBMIT BOOKING REQUEST</span> <i class="fa-solid fa-arrow-right"></i>');

                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '<div class="alert alert-danger" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029; padding: 15px; font-weight: 600;"><i class="fa-solid fa-triangle-exclamation mr-2" style="font-size: 16px;"></i> Please fill all required fields correctly.</div>';
                        $alertBox.html(errorHtml).fadeIn();

                        // Highlight specific invalid fields
                        $.each(errors, function(field, messages) {
                            var $input = $form.find('[name="' + field + '"]');
                            $input.addClass('is-invalid');
                            $input.parent().append('<div class="invalid-feedback">' + messages[0] + '</div>');
                        });
                    } else {
                        // General server error
                        $alertBox.html('<div class="alert alert-danger" style="border-radius: 12px; border: none; background-color: #f8d7da; color: #842029; padding: 15px; font-weight: 600;"><i class="fa-solid fa-circle-exclamation mr-2" style="font-size: 16px;"></i> An unexpected error occurred. Please try again later.</div>').fadeIn();
                    }

                    // Scroll slightly to let user see alert
                    $('html, body').animate({
                        scrollTop: $("#book-appointment-section").offset().top - 100
                    }, 500);
                }
            });
        });
    });
</script>
@endpush