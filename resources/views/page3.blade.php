@extends('layouts.app')

@section('title', 'Home 3 – Immigration & Visa Consulting | Visaway')

@section('content')

{{-- Header Top Bar (unique to home-3) --}}
<div class="header-top-section-3">
    <div class="container-fluid">
        <div class="header-top-wrapper-3">
            <div class="left-item">
                <div class="social-item">
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
            <div class="header-right">
                <ul class="list">
                    <li><i class="fa-solid fa-location-dot"></i> 69 Street, 5th Avenue LA, United States</li>
                    <li><i class="fa-solid fa-envelope"></i> <a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Hero Section Start -->
<section class="hero-section hero-3 fix bg-cover" style="background-image: url({{ asset('assets/img/home-3/hero/bg.jpg') }});">
    <div class="hero-shape">
        <img src="{{ asset('assets/img/home-3/hero/flag.png') }}" alt="img">
    </div>
    <div class="pagi-item">
        <div class="dot-number">
            <span class="dot-num"><span>03</span></span>
            <span class="dot-num"><span>05</span></span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="swiper image-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-image"><img src="{{ asset('assets/img/home-3/hero/man.png') }}" alt="img"></div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-image"><img src="{{ asset('assets/img/home-3/hero/man.png') }}" alt="img"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="swiper hero-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content">
                                <h6>Expert Advice, Global Success</h6>
                                <h1>Making Immigration Easy, Fast, and Hassle-Free</h1>
                                <p>We simplify the entire travel visa process with expert guidance, quick processing, and personalized support. From application to approval, we ensure your journey is smooth and stress-free.</p>
                                <div class="hero-button">
                                    <a href="{{ url('/contact') }}" class="theme-btn">Get Your Visa <i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="{{ url('/contact') }}" class="theme-btn style-2">Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-content">
                                <h6>Expert Advice, Global Success</h6>
                                <h1>Making Immigration Easy, Fast, and Hassle-Free</h1>
                                <p>We simplify the entire travel visa process with expert guidance, quick processing, and personalized support. From application to approval, we ensure your journey is smooth and stress-free.</p>
                                <div class="hero-button">
                                    <a href="{{ url('/contact') }}" class="theme-btn">Get Your Visa <i class="fa-solid fa-arrow-right"></i></a>
                                    <a href="{{ url('/contact') }}" class="theme-btn style-2">Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--About Section Start -->
<section class="about-section section-padding fix">
    <div class="container">
        <div class="about-wrapper-3">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="section-title mb-0">
                            <span class="sub-title-2">About Our Journey</span>
                            <h2 class="split-text-right split-text-in-right">Committed to Your Immigration Success</h2>
                        </div>
                        <p class="text wow fadeInUp" data-wow-delay=".3s">We are dedicated to guiding individuals and families through the immigration process with expert advice, personalized support, and proven strategies for a successful future abroad.</p>
                        <div class="about-list-item wow fadeInUp" data-wow-delay=".5s">
                            <div class="loading-box bg-cover" style="background-image: url({{ asset('assets/img/home-3/about/bg.jpg') }});">
                                <div class="loading-content">
                                    <div class="loading-boxs">
                                        <div class="circle-bar" data-percent="0.99"></div>
                                    </div>
                                    <h6>GET 99% BEST Services &amp; Satisfaction</h6>
                                </div>
                            </div>
                            <div class="list-item">
                                <ul class="list">
                                    <li><i class="fa-solid fa-chevrons-right"></i> Experienced &amp; Certified Consultants</li>
                                    <li><i class="fa-solid fa-chevrons-right"></i> Tailored Solutions for Every Case</li>
                                    <li><i class="fa-solid fa-chevrons-right"></i> Global Reach &amp; Partnerships</li>
                                    <li><i class="fa-solid fa-chevrons-right"></i> Transparent &amp; Hassle-Free Process</li>
                                </ul>
                                <a href="{{ url('/contact') }}" class="theme-btn">Get Your Visa <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image tp-clip-anim p-relative">
                        <img src="{{ asset('assets/img/home-3/about/about-main.png') }}" alt="img" class="tp-anim-img" data-animate="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Service Section Start -->
<section class="service-section section-padding fix section-bg-1">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-2 wow fadeInUp">What We Offer</span>
            <h2 class="split-text-right split-text-in-right">Our Immigration Services</h2>
        </div>
        <div class="row">
            <div class="col-xl-12">
                @forelse($services as $index => $service)
                    @php $isEven = ($index % 2 == 1); @endphp
                    <div class="service-main-item-3 {{ $isEven ? 'style-2' : '' }} fade-up-anim">
                        @if($isEven)
                            <div class="service-button">
                                <a href="{{ route('service.detail', $service->servicesUrl) }}" class="theme-btn">read more <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <div class="service-left">
                                <div class="content">
                                    <h3><a href="{{ route('service.detail', $service->servicesUrl) }}">{{ $service->ServicesTitle }}</a></h3>
                                    <p>{{ $service->other }}</p>
                                </div>
                                <div class="service-image">
                                    <img src="{{ asset('uploads/services/' . $service->serviceimage) }}" alt="{{ $service->ServicesTitle }}" style="height: 200px; object-fit: cover;">
                                </div>
                            </div>
                        @else
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
                        @endif
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
            <span class="sub-title-2 theme wow fadeInUp">Countries We Offer</span>
            <h2 class="split-text-right split-text-in-right text-white">Choose Your Immigration Destination</h2>
        </div>
        <div class="destination-offer-wrapper-3 fade-up-anim row g-4 g-xl-4 row-cols-xl-5 row-cols-lg-4 row-cols-md-2 row-cols-1">
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us-canada.png') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-1.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/services') }}">Canada</a></h5>
                    </div>
                    <p>Canada provides quality education, rich culture and global opportunities.</p>
                </div>
            </div>
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us/02.jpg') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-2.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/services') }}">South Korea</a></h5>
                    </div>
                    <p>South Korea offers world-class universities and vibrant student life.</p>
                </div>
            </div>
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us/03.jpg') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-3.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/services') }}">France</a></h5>
                    </div>
                    <p>France offers unique cultural experiences and top-ranked universities.</p>
                </div>
            </div>
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us/04.jpg') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-2.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/services') }}">UK</a></h5>
                    </div>
                    <p>The UK provides world-class education with global recognition.</p>
                </div>
            </div>
            <div class="col destination-offer-item">
                <div class="choose-us-image"><img src="{{ asset('assets/img/home-3/choose-us-europe.png') }}" alt="img"></div>
                <div class="choose-us-content">
                    <div class="icon-item">
                        <div class="icon"><img src="{{ asset('assets/img/home-3/choose-us/icon-3.png') }}" alt="img"></div>
                        <h5><a href="{{ url('/services') }}">Germany</a></h5>
                    </div>
                    <p>Germany offers tuition-free universities and excellent career prospects.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Service-Visa Section Start -->
<section class="service-visa-section fix">
    <div class="container">
        <div class="service-visa-wrapper">
            <div class="service-visa-items">
                <div class="top-item">
                    <h4 class="number">01</h4>
                    <h3><a href="{{ url('/services') }}">Family Visa</a></h3>
                </div>
                <p>Our Family Visa services help reunite loved ones by providing expert guidance and support throughout the entire application process.</p>
                <a href="{{ url('/services') }}" class="service-button">service _ 01</a>
            </div>
            <div class="service-visa-items style-2">
                <div class="top-item">
                    <h4 class="number">02</h4>
                    <h3><a href="{{ url('/services') }}">Student Visa</a></h3>
                </div>
                <p>We provide expert guidance for student visa applications, helping you secure admission and achieve your study abroad dreams.</p>
                <a href="{{ url('/services') }}" class="service-button">service _ 02</a>
            </div>
            <div class="service-visa-items style-2">
                <div class="top-item">
                    <h4 class="number">03</h4>
                    <h3><a href="{{ url('/services') }}">Work Visa</a></h3>
                </div>
                <p>Collaboratively disintermediate one-to-one functionalities and long-term work visa solutions for global professionals.</p>
                <a href="{{ url('/services') }}" class="service-button">service _ 03</a>
            </div>
        </div>
    </div>
</section>

<!--Choose-us Section3 Start -->
<div class="choose-us-section-3 section-padding fix section-bg-1">
    <div class="container">
        <div class="choose-us-wrapper-3">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="choose-us-left-item">
                        <div class="left-item">
                            <div class="choose-us-image">
                                <img src="{{ asset('assets/img/home-3/choose-us/06.png') }}" alt="img">
                            </div>
                            <div class="caller-item">
                                <div class="icon"><i class="fa-solid fa-phone-volume"></i></div>
                                <div class="content">
                                    <span>Call For Consultation</span>
                                    <h5><a href="tel:+015671143312">+01 567 114 3312</a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="count-box">
                                <h2><span class="odometer" data-count="20">00</span>+</h2>
                                <h5>Years of <br> Experience</h5>
                            </div>
                            <div class="choose-image">
                                <img src="{{ asset('assets/img/home-3/choose-us/07.png') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-us-right-item">
                        <div class="section-title mb-0">
                            <span class="sub-title-2 wow fadeInUp">Why Choose Us</span>
                            <h2 class="split-text-right split-text-in-right">Your Trusted Immigration Partner</h2>
                        </div>
                        <p class="text">We provide expert immigration consulting with personalized support, transparent processes, and a proven track record of successful visa approvals across the globe.</p>
                        <ul class="list">
                            <li><i class="fa-solid fa-chevrons-right"></i> Expert &amp; Certified Consultants</li>
                            <li><i class="fa-solid fa-chevrons-right"></i> Transparent &amp; Timely Processing</li>
                            <li><i class="fa-solid fa-chevrons-right"></i> 24/7 Client Support Available</li>
                            <li><i class="fa-solid fa-chevrons-right"></i> High Visa Approval Success Rate</li>
                        </ul>
                        <a href="{{ url('/contact') }}" class="theme-btn">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
    @include('partials.footer-home3')
@endsection
n

