<style>
    /* Custom Premium Footer Styles */
    .footer-section-3 {
        position: relative;
        background-color: #08182b;
        /* Premium deep navy */
        color: #cbd5e1;
        font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
        padding-top: 80px;
        padding-bottom: 0px;
        overflow: hidden;
    }

    /* Subtle overlay on background image for high contrast */
    .footer-section-3::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, rgba(8, 24, 43, 0.95) 0%, rgba(5, 15, 28, 0.98) 100%);
        z-index: 1;
    }

    .footer-section-3 .container {
        position: relative;
        z-index: 2;
    }

    /* Footer Top Section */
    .footer-top-item-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 40px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        margin-bottom: 50px;
        flex-wrap: wrap;
        gap: 30px;
    }

    .footer-logo-custom img {
        height: 70px;
        object-fit: contain;
        filter: drop-shadow(0px 4px 10px rgba(0, 0, 0, 0.2));
        transition: transform 0.3s ease;
    }

    .footer-logo-custom img:hover {
        transform: scale(1.03);
    }

    .top-list-custom {
        display: flex;
        gap: 25px;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-wrap: wrap;
    }

    .top-list-custom a {
        color: #e2e8f0;
        font-weight: 600;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        position: relative;
        padding-bottom: 4px;
        text-decoration: none;
    }

    .top-list-custom a::after {
        content: '';
        position: absolute;
        width: 0;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #e21c25;
        /* Theme Red */
        transition: width 0.3s ease;
    }

    .top-list-custom a:hover {
        color: #ffffff;
    }

    .top-list-custom a:hover::after {
        width: 100%;
    }

    /* Social Media Glow Buttons */
    .social-item-custom {
        display: flex;
        gap: 12px;
    }

    .social-item-custom a {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 18px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        backdrop-filter: blur(5px);
        text-decoration: none;
    }

    .social-item-custom a:hover {
        background: #e21c25;
        border-color: #e21c25;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(226, 28, 37, 0.3);
        color: #ffffff;
    }

    /* Footer Widget Styles */
    .footer-widget-custom {
        margin-bottom: 40px;
    }

    .footer-widget-custom h3 {
        color: #ffffff;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 12px;
    }

    .footer-widget-custom h3::after {
        content: '';
        position: absolute;
        width: 35px;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #e21c25;
        border-radius: 2px;
    }

    /* Newsletter Card - blended version (no box container, border, or box shadow) */
    .newsletter-card {
        background: transparent;
        border: none;
        border-radius: 0;
        padding: 0;
        backdrop-filter: none;
        box-shadow: none;
        height: 100%;
    }

    .newsletter-card h3 {
        color: #ffffff;
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 25px;
        position: relative;
        padding-bottom: 12px;
    }

    .newsletter-card h3::after {
        content: '';
        position: absolute;
        width: 35px;
        height: 3px;
        bottom: 0;
        left: 0;
        background-color: #e21c25;
        border-radius: 2px;
    }

    .newsletter-card p {
        font-size: 17px;
        line-height: 1.6;
        color: #cbd5e1;
        margin-bottom: 25px;
    }

    .subscribe-form-custom .form-group-custom {
        display: flex;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 30px;
        padding: 6px;
        transition: all 0.3s ease;
    }

    .subscribe-form-custom .form-group-custom:focus-within {
        border-color: #e21c25;
        box-shadow: 0 0 15px rgba(226, 28, 37, 0.25);
        background: rgba(255, 255, 255, 0.08);
    }

    .subscribe-form-custom input {
        flex: 1;
        background: transparent;
        border: none;
        outline: none;
        color: #ffffff;
        padding: 10px 20px;
        font-size: 16px;
        width: 100%;
    }

    .subscribe-form-custom input::placeholder {
        color: #94a3b8;
    }

    .subscribe-btn-custom {
        background: #e21c25;
        color: #ffffff;
        border: none;
        outline: none;
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 600;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .subscribe-btn-custom:hover {
        background: #c8131b;
        box-shadow: 0 5px 15px rgba(226, 28, 37, 0.4);
        transform: translateX(2px);
    }

    /* Service Links Widget */
    .service-list-custom {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .service-list-custom li {
        margin-bottom: 12px;
    }

    .service-list-custom a {
        color: #cbd5e1;
        font-size: 17px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .service-list-custom a i {
        color: #e21c25;
        font-size: 14px;
        transition: transform 0.3s ease;
    }

    .service-list-custom a:hover {
        color: #ffffff;
    }

    .service-list-custom a:hover i {
        transform: translateX(3px);
    }

    /* Contact / Locations Info card */
    .contact-card-custom {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .contact-info-item {
        display: flex;
        gap: 15px;
        align-items: flex-start;
    }

    .contact-info-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: rgba(226, 28, 37, 0.1);
        border: 1px solid rgba(226, 28, 37, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #e21c25;
        font-size: 18px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover .contact-info-icon {
        background: #e21c25;
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 5px 12px rgba(226, 28, 37, 0.2);
    }

    .contact-info-text {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .contact-info-text label {
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #64748b;
        font-weight: 700;
        margin: 0;
    }

    .contact-info-text a,
    .contact-info-text p {
        color: #cbd5e1;
        font-size: 17px;
        line-height: 1.5;
        margin: 0;
        transition: color 0.3s ease;
        text-decoration: none;
    }

    .contact-info-text a:hover {
        color: #ffffff;
    }

    .whatsapp-btn-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(37, 211, 102, 0.1);
        border: 1px solid rgba(37, 211, 102, 0.3);
        color: #25d366;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-top: 8px;
        text-decoration: none;
        width: fit-content;
    }

    .whatsapp-btn-custom:hover {
        background: #25d366;
        color: #ffffff !important;
        box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3);
        transform: translateY(-2px);
    }

    /* Footer Bottom Section */
    .footer-bottom-custom {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding: 25px 0;
        margin-top: 40px;
        position: relative;
        z-index: 2;
    }

    .footer-bottom-wrapper-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .copyright-text-custom {
        font-size: 16px;
        color: #94a3b8;
        margin: 0;
    }

    .copyright-text-custom span {
        color: #ffffff;
        font-weight: 600;
    }

    .footer-bottom-links-custom {
        display: flex;
        gap: 20px;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-bottom-links-custom a {
        color: #94a3b8;
        font-size: 16px;
        transition: color 0.3s ease;
        text-decoration: none;
    }

    .footer-bottom-links-custom a:hover {
        color: #ffffff;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .footer-top-item-custom {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
        }

        .top-list-custom {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>

<footer class="footer-section-3 bg-cover" style="background-image: url({{ asset('assets/img/home-3/footer.jpg') }});">
    <div class="container">
        <!-- Footer Top Item -->
        <div class="footer-top-item-custom">
            <div class="footer-logo-custom">
                <a href="{{ url('/') }}">
                    @if($siteSettings && $siteSettings->logoimage)
                        <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="img">
                    @else
                        <img src="{{ asset('assets/img/logo/white-logo.svg') }}" alt="img">
                    @endif
                </a>
            </div>
            <ul class="top-list-custom">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About us</a></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ route('careers') }}">Careers</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
            </ul>
            <div class="social-item-custom">
                @if($siteSettings && !empty($siteSettings->facebook_link))
                    <a href="{{ $siteSettings->facebook_link }}" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                @endif
                @if($siteSettings && !empty($siteSettings->linkedin_link))
                    <a href="{{ $siteSettings->linkedin_link }}" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                @endif
                @if($siteSettings && !empty($siteSettings->twitter_link))
                    <a href="{{ $siteSettings->twitter_link }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                @endif
                @if($siteSettings && !empty($siteSettings->instagram_link))
                    <a href="{{ $siteSettings->instagram_link }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                @endif
                @if($siteSettings && !empty($siteSettings->youtube_link))
                    <a href="{{ $siteSettings->youtube_link }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                @endif
            </div>
        </div>

        <!-- Footer Grid Widget Wrapper -->
        <div class="row">
            <!-- Newsletter Card -->
            <div class="col-xl-5 col-lg-5 col-md-12 mb-4">
                <div class="newsletter-card">
                    <h3>Subscribe To Our Newsletter</h3>
                    <p>Subscribe to receive the latest immigration news, visa tips, and expert updates straight to your
                        inbox.</p>

                    <div id="subscribe-msg" class="mt-2" style="display: none;"></div>

                    <form id="subscribe-form" action="{{ route('subscribe') }}" method="POST"
                        class="subscribe-form-custom">
                        @csrf
                        <div class="form-group-custom">
                            <input type="email" name="email" id="subscriber-email" placeholder="Your Email Address"
                                required>
                            <button type="submit" id="subscribe-btn" class="subscribe-btn-custom">
                                <span class="btn-text">Subscribe</span>
                                <i class="fa-solid fa-spinner fa-spin d-none" id="subscribe-loader"></i>
                                <i class="fa-solid fa-arrow-right btn-icon"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Service links list -->
            <div class="col-xl-3 col-lg-3 col-md-6 mb-4 ps-xl-5">
                <div class="footer-widget-custom">
                    <h3>Services</h3>
                    <ul class="service-list-custom">
                        @foreach($footerServices as $service)
                            <li>
                                <a href="{{ url('/services/' . $service->servicesUrl) }}">
                                    <i class="fa-solid fa-angle-right me-2"></i>{{ $service->ServicesTitle }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Locations / Contact Details Card -->
            <div class="col-xl-4 col-lg-4 col-md-6 mb-4">
                <div class="footer-widget-custom">
                    <h3>Office Address</h3>
                    <div class="contact-card-custom">
                        <!-- Address -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="contact-info-text">
                                <label>Location</label>
                                <p>
                                    @if(!empty($headOffice->google_maps_link))
                                        <a href="{{ $headOffice->google_maps_link }}" target="_blank">
                                            {{ strip_tags($headOffice->address) }}
                                        </a>
                                    @else
                                        {{ strip_tags($headOffice->address) }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <label>Email Address</label>
                                @foreach(explode('/', $headOffice->email) as $em)
                                    <a href="mailto:{{ trim($em) }}">{{ trim($em) }}</a>
                                @endforeach
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="contact-info-text">
                                <label>Call Helpline</label>
                                @foreach(explode('/', $headOffice->phone) as $ph)
                                    <a href="tel:{{ trim($ph) }}">{{ trim($ph) }}</a>
                                @endforeach

                                @php
                                    $waPhone = preg_replace('/[^0-9]/', '', explode('/', $headOffice->phone)[0]);
                                @endphp
                                @if($waPhone)
                                    <a href="https://wa.me/{{ $waPhone }}" target="_blank" class="whatsapp-btn-custom">
                                        <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Copyright Bar -->
        <div class="footer-bottom-custom">
            <div class="footer-bottom-wrapper-custom">
                <p class="copyright-text-custom">
                    Copyright &copy; {{ $siteSettings->copyrightyear ?? date('Y') }}
                    <span>{{ $siteSettings->companyname ?? 'VISAWAY' }}</span>. All Rights Reserved.
                </p>
                <ul class="footer-bottom-links-custom">
                    <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#subscribe-form').on('submit', function (e) {
                e.preventDefault();

                let form = $(this);
                let btn = $('#subscribe-btn');
                let loader = $('#subscribe-loader');
                let btnText = btn.find('.btn-text');
                let btnIcon = btn.find('.btn-icon');
                let msgDiv = $('#subscribe-msg');

                msgDiv.fadeOut(function () { $(this).empty().removeClass('alert alert-success alert-danger'); });
                btn.prop('disabled', true);
                loader.removeClass('d-none');
                btnIcon.addClass('d-none');
                btnText.text('Subscribing...');

                $.ajax({
                    url: form.attr('action'),
                    method: 'POST',
                    data: form.serialize(),
                    success: function (response) {
                        msgDiv.text(response.message).addClass('alert alert-success mt-2 py-2').css('font-size', '14px').fadeIn();
                        $('#subscriber-email').val('');
                    },
                    error: function (xhr) {
                        let errorMsg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred.';
                        msgDiv.text(errorMsg).addClass('alert alert-danger mt-2 py-2').css('font-size', '14px').fadeIn();
                    },
                    complete: function () {
                        btn.prop('disabled', false); loader.addClass('d-none'); btnIcon.removeClass('d-none'); btnText.text('subscribe now');
                    }
                });
            });
        });
    </script>
@endpush