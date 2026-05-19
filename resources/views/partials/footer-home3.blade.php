<!--Footer Section Start -->
<footer class="footer-section-3 fix bg-cover" style="background-image: url({{ asset('assets/img/home-3/footer.jpg') }});">
    <div class="container">
        <div class="footer-top-item">
            <div class="footer-logo">
                <a href="{{ url('/') }}">
                    @if($siteSettings && $siteSettings->logoimage)
                        <img src="{{ asset('uploads/settings/' . $siteSettings->logoimage) }}" alt="img">
                    @else
                        <img src="{{ asset('assets/img/logo/white-logo.svg') }}" alt="img">
                    @endif
                </a>
            </div>
            <ul class="top-list">
                <li><a href="{{ url('/') }}">HOME</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/services') }}">VISA</a></li>
                <li><a href="{{ url('/services') }}">PAGES</a></li>
                <li><a href="{{ url('/blog') }}">Blog</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
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
        <div class="footer-widget-wrapper-3">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-lg-5">
                    <div class="single-footer-widget">
                        <div class="footer-content">
                            <div class="newsletter-content">
                            <h3>Subscribe To Our Newsletter</h3>
                            <p>Subscribe to receive the latest immigration news, visa tips, and expert updates straight to your inbox.</p>
                            
                            <div id="subscribe-msg" class="mt-2" style="display: none;"></div>

                            <form id="subscribe-form" action="{{ route('subscribe') }}" method="POST">
                                @csrf
                                <div class="form-clt">
                                    <input type="email" name="email" id="subscriber-email" placeholder="Email Address" required>
                                    <button type="submit" id="subscribe-btn" class="theme-btn">
                                        <span class="btn-text">Subscribe Now</span>
                                        <i class="fa-solid fa-spinner fa-spin d-none" id="subscribe-loader"></i>
                                        <i class="fa-solid fa-arrow-right btn-icon"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                            <h6>Copyright &copy; {{ $siteSettings->copyrightyear ?? date('Y') }} <span>{{ $siteSettings->companyname ?? 'Visaway Immigration' }}</span> All Rights Reserved.</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h3>Services</h3>
                        </div>
                        <ul class="list">
                            @foreach($footerServices as $service)
                                <li><a href="{{ route('service.detail', $service->servicesUrl) }}">{{ $service->ServicesTitle }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 ps-xl-5 col-md-6 col-lg-4">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h3>Locations</h3>
                        </div>
                        <div class="contact-content">
                            <p><a href="{{ $headOffice->google_maps_link ?: '#' }}" target="_blank" class="text-white">{{ strip_tags($headOffice->address) }}</a></p>
                            <h3>Contact</h3>
                            <ul class="contact-list">
                                @foreach(explode('/', $headOffice->email) as $em)
                                    <li class="mb-3"><a href="mailto:{{ trim($em) }}" class="d-block">{{ trim($em) }}</a></li>
                                @endforeach
                                @foreach(explode('/', $headOffice->phone) as $ph)
                                    <li class="mb-3"><a href="tel:{{ trim($ph) }}" class="d-block">{{ trim($ph) }}</a></li>
                                @endforeach
                                @php
                                    $waPhone = preg_replace('/[^0-9]/', '', explode('/', $headOffice->phone)[0]);
                                @endphp
                                <li>
                                    <a href="https://wa.me/{{ $waPhone }}" target="_blank" class="d-inline-block text-success">
                                        <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp Now
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('scripts')
<script>
$(document).ready(function() {
    $('#subscribe-form').on('submit', function(e) {
        e.preventDefault();
        
        let form = $(this);
        let btn = $('#subscribe-btn');
        let loader = $('#subscribe-loader');
        let btnText = btn.find('.btn-text');
        let btnIcon = btn.find('.btn-icon');
        let msgDiv = $('#subscribe-msg');

        msgDiv.fadeOut(function(){ $(this).empty().removeClass('alert alert-success alert-danger'); });
        btn.prop('disabled', true);
        loader.removeClass('d-none');
        btnIcon.addClass('d-none');
        btnText.text('Subscribing...');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                msgDiv.text(response.message).addClass('alert alert-success mt-2 py-2').css('font-size', '14px').fadeIn();
                $('#subscriber-email').val('');
            },
            error: function(xhr) {
                let errorMsg = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'An error occurred.';
                msgDiv.text(errorMsg).addClass('alert alert-danger mt-2 py-2').css('font-size', '14px').fadeIn();
            },
            complete: function() {
                btn.prop('disabled', false); loader.addClass('d-none'); btnIcon.removeClass('d-none'); btnText.text('Subscribe Now');
            }
        });
    });
});
</script>
@endpush
