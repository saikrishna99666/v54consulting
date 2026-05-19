@extends('layouts.app')

@section('title', 'Login – Visaway')

@section('content')
<!-- Breadcrumb-Wrapper Section Start -->
<section class="breadcrumb-wrapper fix bg-cover" style="background-image: url({{ asset('assets/img/inner-page/breadcrumb.jpg') }});">
    <div class="shape"><img src="{{ asset('assets/img/inner-page/shape.png') }}" alt="img"></div>
    <div class="container">
        <div class="page-heading">
            <h1 class="breadcrumb-title">Admin Login</h1>
            <ul class="breadcrumb-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><i class="fa-solid fa-chevron-right"></i></li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</section>

<!-- Login Section Start -->
<section class="contact-section-3 section-padding fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="contact-from-wrapper" style="background: #f9f9f9; padding: 40px; border-radius: 10px;">
                    <h3 class="text-center mb-4">Welcome Back</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST" class="contact-form-items">
                        @csrf
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="form-clt">
                                    <span>Email Address</span>
                                    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-clt" style="position: relative;">
                                    <span>Password</span>
                                    <input type="password" name="password" id="password" placeholder="Password" required>
                                    <i class="fa-solid fa-eye-slash toggle-password" style="position: absolute; right: 20px; top: 50px; cursor: pointer; color: #666;"></i>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" id="login-btn" class="theme-btn style-2 w-100">
                                    <span class="btn-text">LOGIN NOW</span>
                                    <i class="fa-solid fa-spinner fa-spin d-none" id="login-loader"></i>
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

@push('scripts')
<script>
$(document).ready(function() {
    // Password visibility toggle
    $('.toggle-password').on('click', function() {
        let input = $('#password');
        let icon = $(this);
        
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        }
    });

    $('.contact-form-items').on('submit', function() {
        let btn = $('#login-btn');
        let loader = $('#login-loader');
        let btnText = btn.find('.btn-text');
        let btnIcon = btn.find('.btn-icon');

        btn.prop('disabled', true);
        loader.removeClass('d-none');
        btnIcon.addClass('d-none');
        btnText.text('AUTHENTICATING...');
    });
});
</script>
@endpush
@endsection
