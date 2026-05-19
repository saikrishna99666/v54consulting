@extends('layouts.app')

@section('title', 'Home 2 – Immigration & Visa Consulting | Visaway')

@section('content')

{{-- Header Top Bar (unique to home-2) --}}
<div class="header-top-section-2 fix">
    <div class="container-fluid">
        <div class="header-top-wrapper-2">
            <div class="header-left">
                <span>Opening Hour: Mon - Fri 8am - 8pm</span>
                <span><a href="mailto:visaway@gmail.com">Send Us mail: visaway@gmail.com</a></span>
            </div>
            <div class="social-item">
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
</div>

<!--Hero Section Start -->
<section class="hero-section hero-2 fix bg-cover" style="background-image: url({{ asset('assets/img/home-2/hero/hero-bg.jpg') }});">
    <div class="shape">
        <img src="{{ asset('assets/img/home-2/hero/shape.png') }}" alt="img">
    </div>
    <div class="container-fluid">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="hero-image">
                    <img src="{{ asset('assets/img/home-2/hero/hero.png') }}" alt="img">
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2">
                <div class="hero-content">
                    <h6 class="wow fadeInUp" data-wow-delay=".3s">Global Education Simplified</h6>
                    <h1 class="split-text-right split-text-in-right">Fast, Reliable &amp; Hassle-Free Travel Visa Solutions</h1>
                    <p>We simplify the entire travel visa process with expert guidance, quick processing, and personalized support. From application to approval, we ensure your journey is smooth and stress-free.</p>
                    <div class="hero-button wow fadeInUp" data-wow-delay=".5s">
                        <a href="{{ url('/contact') }}" class="theme-btn">Get Your Visa <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="{{ url('/contact') }}" class="theme-btn style-2">Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Service Section Start -->
<section class="service-section-2 section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title wow fadeInUp">Services We Provide</span>
            <h2 class="split-text-right split-text-in-right">Explore Our Visa Assistance</h2>
        </div>
        <div class="service-wrapper-2">
            <div class="swiper service-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="service-box-item">
                            <div class="service-image"><img src="{{ asset('assets/img/home-2/service.jpg') }}" alt="img"></div>
                            <h2>01</h2>
                            <h3><a href="{{ url('/services') }}">Tourist Visa <br> Assistance</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service-box-item">
                            <div class="service-image"><img src="{{ asset('assets/img/home-2/service.jpg') }}" alt="img"></div>
                            <h2>02</h2>
                            <h3><a href="{{ url('/services') }}">Student Visa <br> Support</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service-box-item">
                            <div class="service-image"><img src="{{ asset('assets/img/home-2/service.jpg') }}" alt="img"></div>
                            <h2>03</h2>
                            <h3><a href="{{ url('/services') }}">Business Visa <br> Services</a></h3>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="service-box-item">
                            <div class="service-image"><img src="{{ asset('assets/img/home-2/service.jpg') }}" alt="img"></div>
                            <h2>04</h2>
                            <h3><a href="{{ url('/services') }}">Work Visa <br> Consulting</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-bottom">
            <div class="service-pagi-items">
                <div class="service-dot"></div>
            </div>
            <div class="array-buttons-3">
                <button class="array-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button class="array-next"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Feature Section Start -->
<section class="feature-section section-padding fix section-bg-1">
    <div class="container">
        <div class="feature-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="feature-image tp-clip-anim p-relative">
                        <img src="{{ asset('assets/img/home-2/feature/01.png') }}" alt="img" class="tp-anim-img" data-animate="true">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="feature-content">
                        <div class="section-title mb-0">
                            <span class="sub-title-2 wow fadeInUp">Who We Are</span>
                            <h2 class="split-text-right split-text-in-right">Trusted Guidance for Every Visa Journey</h2>
                        </div>
                        <p class="text">We provide expert guidance for every visa application, ensuring smooth processing, personalized support, and reliable assistance to make your travel experience seamless and stress-free.</p>
                        <div class="feature-count">
                            <div class="content">
                                <div class="count-image">
                                    <img src="{{ asset('assets/img/home-2/feature/Years.png') }}" alt="img">
                                </div>
                                <h5>Years of Experience</h5>
                            </div>
                            <ul class="list">
                                <li><i class="fa-solid fa-chevrons-right"></i> Experienced Visa Consultants</li>
                                <li><i class="fa-solid fa-chevrons-right"></i> Fast &amp; Reliable Processing</li>
                                <li><i class="fa-solid fa-chevrons-right"></i> Personalized Travel Assistance</li>
                                <li><i class="fa-solid fa-chevrons-right"></i> Global Reach and Support</li>
                            </ul>
                        </div>
                        <a href="{{ url('/contact') }}" class="theme-btn">Get Your Visa <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Choose-us-section-2 Start -->
<section class="choose-us-section-2 section-padding fix bg-cover" style="background-image: url({{ asset('assets/img/home-2/feature/bg-shape.png') }});">
    <div class="container">
        <div class="choose-us-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="feature-content">
                        <div class="section-title mb-0">
                            <span class="sub-title-2 wow fadeInUp">Your Travel Made Easy</span>
                            <h2 class="split-text-right split-text-in-right">Smooth Visa Journey Guaranteed</h2>
                        </div>
                        <p class="text">We provide expert guidance for every visa application, ensuring smooth processing, personalized support, and reliable assistance</p>
                        <div class="choose-us-box">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/icon/01.png') }}" alt="img"></div>
                            <div class="content">
                                <h5>Expert Consultants</h5>
                                <p>Skilled and knowledgeable visa advisors ready to help you every step of the way.</p>
                            </div>
                        </div>
                        <div class="choose-us-box">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/icon/01.png') }}" alt="img"></div>
                            <div class="content">
                                <h5>Personalized Support</h5>
                                <p>Tailored solutions designed specifically for your unique visa requirements.</p>
                            </div>
                        </div>
                        <div class="choose-us-box">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/icon/01.png') }}" alt="img"></div>
                            <div class="content">
                                <h5>Transparent Process</h5>
                                <p>Clear and honest guidance with no hidden steps or surprises along the way.</p>
                            </div>
                        </div>
                        <a href="{{ url('/contact') }}" class="theme-btn">Get Started Today <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-us-image tp-clip-anim p-relative">
                        <img src="{{ asset('assets/img/home-2/feature/02.png') }}" alt="img" class="tp-anim-img" data-animate="true">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visa-provide-section-2 Start -->
<section class="visa-provide-section section-padding fix header-bg">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-2 theme">Services We Provide</span>
            <h2 class="text-white">Explore Our Visa Assistance</h2>
        </div>
    </div>
    <div class="swiper visa-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="visa-provide-box">
                    <div class="visa-top-item">
                        <div class="visa-left">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/visa/01.png') }}" alt="img"></div>
                            <div class="content"><p>Visa Service</p><h3><a href="{{ url('/services') }}">Japan</a></h3></div>
                        </div>
                        <a href="{{ url('/services') }}" class="theme-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="visa-list-item">
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa &amp; Admission</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Work Visa – H1B</li>
                        </ul>
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Work permit for Canada</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa for Canada</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="visa-provide-box">
                    <div class="visa-top-item">
                        <div class="visa-left">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/visa/02.png') }}" alt="img"></div>
                            <div class="content"><p>Visa Service</p><h3><a href="{{ url('/services') }}">Canada</a></h3></div>
                        </div>
                        <a href="{{ url('/services') }}" class="theme-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="visa-list-item">
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa &amp; Admission</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Work Visa – H1B</li>
                        </ul>
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Work permit for Canada</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa for Canada</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="visa-provide-box">
                    <div class="visa-top-item">
                        <div class="visa-left">
                            <div class="icon"><img src="{{ asset('assets/img/home-2/visa/03.png') }}" alt="img"></div>
                            <div class="content"><p>Visa Service</p><h3><a href="{{ url('/services') }}">France</a></h3></div>
                        </div>
                        <a href="{{ url('/services') }}" class="theme-btn">Read More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <div class="visa-list-item">
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa &amp; Admission</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Work Visa – H1B</li>
                        </ul>
                        <ul class="list">
                            <li><i class="fa-regular fa-arrow-right"></i> Work permit for Canada</li>
                            <li><i class="fa-regular fa-arrow-right"></i> Student Visa for Canada</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="visa-bottom">
        <div class="container">
            <div class="visa-arrow-item">
                <button class="array-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <div class="flag-item">
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/04.png') }}" alt="img"><div class="country-name"><h4>Bangladesh</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/05.png') }}" alt="img"><div class="country-name"><h4>USA</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/06.png') }}" alt="img"><div class="country-name"><h4>Rwanda</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/07.png') }}" alt="img"><div class="country-name"><h4>Canada</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/08.png') }}" alt="img"><div class="country-name"><h4>Australia</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/09.png') }}" alt="img"><div class="country-name"><h4>Netherlands</h4></div></div>
                    <div class="flag-thumb"><img src="{{ asset('assets/img/home-2/visa/10.png') }}" alt="img"><div class="country-name"><h4>Germany</h4></div></div>
                </div>
                <button class="array-next"><i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- Contact-section-2 Start -->
<section class="contact-section-2 section-padding fix bg-cover" style="background-image: url({{ asset('assets/img/home-2/bg.jpg') }});">
    <div class="container">
        <div class="contact-wrapper-2">
            <div class="contact-from-box">
                <h3 class="split-text-right split-text-in-right">BOOK AN APPOINTMENT</h3>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <div class="form">
                                <select class="single-select w-100">
                                    <option>Select Country</option>
                                    <option>Australia</option>
                                    <option>Canada</option>
                                    <option>Russia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <div class="form">
                                <select class="single-select w-100">
                                    <option>Select Service</option>
                                    <option>Tourist Visa</option>
                                    <option>Student Visa</option>
                                    <option>Work Visa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <input type="text" name="Name" id="Name2" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <input type="text" name="Number" id="NumberH2" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <div class="form">
                                <select class="single-select w-100">
                                    <option>Select Date</option>
                                    <option>01</option><option>02</option><option>03</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-clt">
                            <div class="form">
                                <select class="single-select w-100">
                                    <option>Select Time</option>
                                    <option>09:00 AM</option><option>09:30 AM</option><option>10:00 AM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-btn">
                    <button type="submit" class="theme-btn">Contact-Us <i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <h5>Help Line Anytime</h5>
                <h2><a href="tel:+0823498590830">+08 2349 8590 830</a></h2>
                <p>The Support Centre is available 24/7</p>
            </div>
            <a href="https://www.youtube.com/watch?v=Cn4G2lZ_g2I" class="video-btn video-popup">
                <i class="fa-duotone fa-play"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonial-section-2 Start -->
<section class="testimonial-section section-padding fix">
    <div class="container">
        <div class="section-title text-center">
            <span class="sub-title-2">Why Clients Trust Us</span>
            <h2 class="split-text-right split-text-in-right">Stories of Successful Journeys</h2>
        </div>
        <div class="testimonial-wrapper-2">
            <div class="row g-4">
                <div class="col-lg-5">
                    <div class="testimonial-image image-scale-animation">
                        <img src="{{ asset('assets/img/home-2/testimonial/01.jpg') }}" alt="img" class="image-scale-animation-item">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-item">
                        <div class="swiper testimonial-slider-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-left">
                                        <div class="testimonial-box">
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                            </div>
                                            <p>Excellent service! The team guided me through every step, managed documents perfectly, and ensured my visa approval quickly. Truly reliable and professional consultancy service.</p>
                                        </div>
                                        <div class="info-item">
                                            <img src="{{ asset('assets/img/home-2/testimonial/client-1.png') }}" alt="img">
                                            <div class="content"><h5>David Lee</h5><span>Satisfied Client</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-left">
                                        <div class="testimonial-box">
                                            <div class="star">
                                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                            </div>
                                            <p>Excellent service! The team guided me through every step, managed documents perfectly, and ensured my visa approval quickly. Truly reliable and professional consultancy service.</p>
                                        </div>
                                        <div class="info-item">
                                            <img src="{{ asset('assets/img/home-2/testimonial/client-1.png') }}" alt="img">
                                            <div class="content"><h5>Sarah Johnson</h5><span>Happy Traveler</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-item">
                            <div class="swiper test-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide"><div class="client-image"><img src="{{ asset('assets/img/home-2/testimonial/client-2.png') }}" alt="img"></div></div>
                                    <div class="swiper-slide"><div class="client-image"><img src="{{ asset('assets/img/home-2/testimonial/client-3.jpg') }}" alt="img"></div></div>
                                    <div class="swiper-slide"><div class="client-image"><img src="{{ asset('assets/img/home-2/testimonial/client-4.jpg') }}" alt="img"></div></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News-section-2 Start -->
<section class="news-section section-padding fix">
    <div class="container">
        <div class="section-title-area">
            <div class="section-title">
                <span class="sub-title wow fadeInUp">Visa Tips &amp; Guides</span>
                <h2 class="split-text-right split-text-in-right">Latest Travel &amp; Visa Insights</h2>
            </div>
            <a href="{{ url('/news') }}" class="theme-btn">View Article <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="news-main-item fade-up-anim">
                    <div class="news-left-content">
                        <h2><sup>25</sup> <span>August, 2025</span></h2>
                        <h3><a href="{{ url('/news') }}">Student Visa vs. Work Visa – Which One is Right for You?</a></h3>
                        <div class="news-post"><span>by admin</span><span>StudentVisa</span></div>
                    </div>
                    <div class="news-right-content">
                        <div class="news-image"><img src="{{ asset('assets/img/home-2/news/01.jpg') }}" alt="img"></div>
                        <div class="content">
                            <p>Choosing between a student visa and a work visa depends on your goals. Understand the benefits, requirements, and opportunities.</p>
                            <a href="{{ url('/contact') }}" class="theme-btn">View Article <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="news-main-item fade-up-anim">
                    <div class="news-left-content">
                        <h2><sup>25</sup> <span>August, 2025</span></h2>
                        <h3><a href="{{ url('/news') }}">Common Mistakes Applicants Make During Visa Processing</a></h3>
                        <div class="news-post"><span>by admin</span><span>VisaTips</span></div>
                    </div>
                    <div class="news-right-content">
                        <div class="news-image"><img src="{{ asset('assets/img/home-2/news/02.jpg') }}" alt="img"></div>
                        <div class="content">
                            <p>Many applicants face delays due to incomplete documents, missed deadlines, or incorrect details. Avoiding these common mistakes ensures a smoother, faster process.</p>
                            <a href="{{ url('/contact') }}" class="theme-btn">View Article <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="news-main-item fade-up-anim">
                    <div class="news-left-content">
                        <h2><sup>25</sup> <span>August, 2025</span></h2>
                        <h3><a href="{{ url('/news') }}">Latest Visa Policy Updates Every Traveler Should Know</a></h3>
                        <div class="news-post"><span>by admin</span><span>PolicyUpdate</span></div>
                    </div>
                    <div class="news-right-content">
                        <div class="news-image"><img src="{{ asset('assets/img/home-2/news/03.jpg') }}" alt="img"></div>
                        <div class="content">
                            <p>Stay informed with the latest visa policy updates, including travel restrictions, document requirements, and processing changes.</p>
                            <a href="{{ url('/contact') }}" class="theme-btn">View Article <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
