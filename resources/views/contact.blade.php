@extends('layouts.app')

@section('title', 'Contact Us – Immigration & Visa Consulting')

@section('content')
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
            <h1 class="breadcrumb-title">CONTACT uS</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>

<!--Contact Info Section Start -->
<section class="contact-us-section-3 section-padding fix">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="contact-icon-item">
                    <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="content"><p>Location</p><h6>{{ strip_tags($headOffice->address) }}</h6></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="contact-icon-item">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <div class="content">
                        <p>Email Address</p>
                        <h6>
                            @foreach(explode('/', $headOffice->email) as $em)
                                <a href="mailto:{{ trim($em) }}">{{ trim($em) }}</a><br>
                            @endforeach
                        </h6>
                    </div>
                </div>
            </div>
             <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="contact-icon-item">
                    <div class="icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="content">
                        <p>Phone Number</p>
                        <h6>
                            @foreach(explode('/', $headOffice->phone) as $ph)
                                <a href="tel:{{ trim($ph) }}">{{ trim($ph) }}</a><br>
                            @endforeach
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Contact Form Section Start -->
<section class="contact-section-3 section-padding fix pt-0">
    <div class="container">
        <div class="contact-from-wrapper">
            <h5 class="text-center">Send Us Message</h5>
            <p class="text-center mt-3 mb-5">"Have questions about visas or immigration? Send us a message today and our expert team will respond quickly."</p>
            <div class="row g-4">
                <div class="col-xl-12">
                    <div id="contact-msg" class="alert d-none"></div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                     <form action="{{ route('contact') }}" id="contact-form1" method="POST" class="contact-form-items">
                        @csrf
                        <input type="hidden" name="source" value="Contact Form">
                        <div class="row g-4">
                            <div class="col-lg-4"><div class="form-clt"><span>Your Name</span><input type="text" name="name" value="{{ old('name') }}" placeholder="Your name">@error('name') <span class="text-danger small">{{ $message }}</span> @enderror</div></div>
                            <div class="col-lg-4"><div class="form-clt"><span>Your Email</span><input type="email" name="email" value="{{ old('email') }}" placeholder="Your email">@error('email') <span class="text-danger small">{{ $message }}</span> @enderror</div></div>
                            <div class="col-lg-4"><div class="form-clt"><span>Your Phone</span><input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">@error('phone') <span class="text-danger small">{{ $message }}</span> @enderror</div></div>
                            <div class="col-lg-12"><div class="form-clt"><textarea name="message" id="message1" placeholder="Type your message">{{ old('message') }}</textarea>@error('message') <span class="text-danger small">{{ $message }}</span> @enderror</div></div>
                            <div class="col-lg-4">
                                <button type="submit" id="contact-submit-btn" class="theme-btn style-2">
                                    <span class="btn-text">SEND MESSAGE</span>
                                    <i class="fa-solid fa-spinner fa-spin d-none" id="contact-loader"></i>
                                    <i class="fa-solid fa-arrow-right btn-icon"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section Start -->
<div class="map-section section-padding pt-0">
    <div class="map-items">
        <div class="googpemap">
            <iframe src="{{ $headOffice->google_maps_link ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd' }}" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#contact-form1').on('submit', function(e) {
        e.preventDefault();
        
        let form = $(this);
        let btn = $('#contact-submit-btn');
        let loader = $('#contact-loader');
        let btnText = btn.find('.btn-text');
        let btnIcon = btn.find('.btn-icon');
        let msgDiv = $('#contact-msg');

        // Reset messages
        msgDiv.fadeOut(function(){ 
            $(this).empty().removeClass('alert-success alert-danger').addClass('d-none'); 
        });
        $('.text-danger.small').remove(); // Remove existing validation errors

        btn.prop('disabled', true);
        loader.removeClass('d-none');
        btnIcon.addClass('d-none');
        btnText.text('Sending...');

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                msgDiv.text(response.message).removeClass('d-none alert-danger').addClass('alert-success').fadeIn();
                form[0].reset();
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;
                    let errorList = '<ul class="mb-0">';
                    $.each(errors, function(key, val) {
                        errorList += '<li>' + val[0] + '</li>';
                        // Optionally add error message under specific field
                        $('[name="' + key + '"]').after('<span class="text-danger small">' + val[0] + '</span>');
                    });
                    errorList += '</ul>';
                    msgDiv.html(errorList).removeClass('d-none alert-success').addClass('alert-danger').fadeIn();
                } else {
                    msgDiv.text('An error occurred. Please try again.').removeClass('d-none alert-success').addClass('alert-danger').fadeIn();
                }
            },
            complete: function() {
                btn.prop('disabled', false); 
                loader.addClass('d-none'); 
                btnIcon.removeClass('d-none'); 
                btnText.text('SEND MESSAGE');
            }
        });
    });
});
</script>
@endpush
