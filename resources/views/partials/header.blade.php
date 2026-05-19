<!-- Header-Top-Section Start -->
<style>
    header#header-sticky {
        background-color: #f7f7f7;
    }
</style>
<div class="header-top-section">
    <div class="container-fluid">
        <div class="header-top-wrapper">
            <div class="header-left">
                <ul class="list">
                    <li class="style-2">
                        <span>Help Line</span>
                        <i class="fa-solid fa-phone"></i>
                        @php
                            $headPhone = explode('/', $headOffice->phone)[0];
                        @endphp
                        <a
                            href="tel:{{ trim($headPhone) }}">{{ trim($headPhone) }}</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        @php
                            $headEmail = explode('/', $headOffice->email)[0];
                        @endphp
                        <a href="mailto:{{ trim($headEmail) }}">{{ trim($headEmail) }}</a>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <div class="social-item">
                    @if($siteSettings && !empty($siteSettings->facebook_link))
                        <a href="{{ $siteSettings->facebook_link }}"><i class="fa-brands fa-facebook"></i></a>
                    @endif
                    @if($siteSettings && !empty($siteSettings->linkedin_link))
                        <a href="{{ $siteSettings->linkedin_link }}"><i class="fa-brands fa-linkedin"></i></a>
                    @endif
                    @if($siteSettings && !empty($siteSettings->twitter_link))
                        <a href="{{ $siteSettings->twitter_link }}"><i class="fa-brands fa-twitter"></i></a>
                    @endif
                    @if($siteSettings && !empty($siteSettings->instagram_link))
                        <a href="{{ $siteSettings->instagram_link }}"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if($siteSettings && !empty($siteSettings->youtube_link))
                        <a href="{{ $siteSettings->youtube_link }}"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ url('/') }}">
                            @if($siteSettings && $siteSettings->logoimage)
                                <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="logo-img">
                            @else
                                <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                            @endif
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    {{ $siteSettings->about_short_description ?? 'Nullam dignissim, ante scelerisque the is euismod fermentum odio sem semper the is erat, a feugiat leo urna eget eros. Duis Aenean a imperdiet risus.' }}
                </p>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact d-xl-block">
                    <h4 class="d-xl-block">Contact Info</h4>
                    <ul class="d-xl-block">
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank"
                                    href="#">{{ strip_tags($headOffice->address) }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                @php
                                    $headEmail = explode('/', $headOffice->email)[0];
                                @endphp
                                <a href="mailto:{{ trim($headEmail) }}">{{ trim($headEmail) }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank"
                                    href="#">{{ $headOffice->operating_hours }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                @php
                                    $headPhone = explode('/', $headOffice->phone)[0];
                                @endphp
                                <a
                                    href="tel:{{ trim($headPhone) }}">{{ trim($headPhone) }}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="social-icon d-flex align-items-center">
                        @if($siteSettings && !empty($siteSettings->facebook_link))
                            <a href="{{ $siteSettings->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($siteSettings && !empty($siteSettings->twitter_link))
                            <a href="{{ $siteSettings->twitter_link }}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($siteSettings && !empty($siteSettings->youtube_link))
                            <a href="{{ $siteSettings->youtube_link }}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if($siteSettings && !empty($siteSettings->linkedin_link))
                            <a href="{{ $siteSettings->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($siteSettings && !empty($siteSettings->instagram_link))
                            <a href="{{ $siteSettings->instagram_link }}"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Section Start -->
<header id="header-sticky" class="header-1">
    <div class="container-fluid">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="header-left">
                    <div class="logo">
                        <a href="{{ url('/') }}" class="header-logo-2">
                            @if($siteSettings && $siteSettings->logoimage)
                                <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="logo-img">
                            @else
                                <img src="{{ asset('assets/img/logo/black-logo.svg') }}" alt="logo-img">
                            @endif
                        </a>
                    </div>
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                        <a href="{{ route('about') }}">About Us</a>
                                    </li>
                                    <li class="has-dropdown {{ request()->is('services*') ? 'active' : '' }}">
                                        <a href="{{ route('services') }}">Services <i
                                                class="fa-solid fa-angle-down ms-1" style="font-size: 12px;"></i></a>
                                        <ul class="submenu">
                                            @foreach($headerServices as $service)
                                                <li><a
                                                        href="{{ url('/services/' . $service->servicesUrl) }}">{{ $service->ServicesTitle }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="{{ request()->routeIs('faq') ? 'active' : '' }}">
                                        <a href="{{ route('faq') }}">FAQ</a>
                                    </li>
                                    <li class="{{ request()->routeIs('careers') ? 'active' : '' }}">
                                        <a href="{{ route('careers') }}">Careers</a>
                                    </li>
                                    <li class="{{ request()->routeIs('branches.index') ? 'active' : '' }}">
                                        <a href="{{ route('branches.index') }}">Our Branches</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}">
                                            Blog
                                        </a>
                                    </li>
                                    <!-- <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li> -->
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="header-right d-flex align-items-center mt-0">
                    <div class="header-call-item">

                        <a href="{{ route('contact') }}" class="theme-btn">
                            Contact Us
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Area Start -->
<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <div class="search-popup__content">
        <form role="search" method="get" class="search-popup__form" action="#">
            <input type="text" id="search" name="search" placeholder="Search Here...">
            <button type="submit" aria-label="search submit" class="search-btn">
                <span><i class="fa-regular fa-magnifying-glass"></i></span>
            </button>
        </form>
    </div>
</div>