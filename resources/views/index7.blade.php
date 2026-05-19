@extends('layouts.app')

@section('title', 'Homepage Seven - Eventify')

@section('body-class', 'homepage7-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero7-section-area" style="background-image: url({{ asset('assets/img/bg/header-bg18.png') }}); background-position: center; background-size: cover; background-repeat: no-repeat;">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-3">
						<div class="date-btn">
							<svg xmlns="http://www.w3.org/2000/svg" width="148" height="168" viewBox="0 0 148 168" fill="none">
								<path d="M66 3.6188C69.9043 1.36467 71.8564 0.237604 74 0.237604C76.1436 0.237604 78.0957 1.36467 82 3.6188L139.612 36.8812C143.516 39.1353 145.469 40.2624 146.54 42.1188C147.612 43.9752 147.612 46.2293 147.612 50.7376V117.262C147.612 121.771 147.612 124.025 146.54 125.881C145.469 127.738 143.516 128.865 139.612 131.119L82 164.381C78.0957 166.635 76.1436 167.762 74 167.762C71.8564 167.762 69.9043 166.635 66 164.381L8.38784 131.119C4.48357 128.865 2.53143 127.738 1.45964 125.881C0.38784 124.025 0.38784 121.771 0.38784 117.262V50.7376C0.38784 46.2293 0.38784 43.9752 1.45964 42.1188C2.53143 40.2624 4.48357 39.1353 8.38784 36.8812L66 3.6188Z" fill="#FC226A"/>
							</svg>
							<h2>15</h2>
							<p>jan 2025</p>
						</div>
					</div>
					<div class="col-lg-5 col-md-9">
						<div class="heading-area">
							<h1 class="text-anime-style-3">Digital World Conference</h1>
						</div>
					</div>
				</div>
				<div class="space60"></div>
				<div class="row">
					<div class="col-lg-5 col-md-6">
						<div class="img1 image-anime reveal">
							<img src="{{ asset('assets/img/all-images/hero/hero-img9.png') }}" alt="">
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="img1 image-anime reveal">
							<img src="{{ asset('assets/img/all-images/hero/hero-img10.png') }}" alt="">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="heading-area">
							<p>From cutting-edge technology and digital transformation to leadership strategies and sustainable growth, Innovate 2024 provide.</p>
							<div class="space32"></div>
							<div class="btn-area1">
								<a href="{{ route('contact') }}" class="vl-btn7">Reserve My Seat <span><i class="fa-solid fa-arrow-right"></i></span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
@endsection
