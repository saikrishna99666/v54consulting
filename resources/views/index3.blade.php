@extends('layouts.app')

@section('title', 'Homepage Three - Eventify')

@section('body-class', 'homepage3-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero3-section-area">
			<img src="{{ asset('assets/img/elements/elements18.png') }}" alt="" class="elements18" />
			<img src="{{ asset('assets/img/elements/elements9.png') }}" alt="" class="elements9" />
			<div class="container">
				<div class="row">
					<div class="col-lg-8 m-auto">
						<div class="hero3-header text-center">
							<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />Join the the Future of Design</h5>
							<div class="space32"></div>
							<h1 class="text-anime-style-3">Yearly designer</h1>
							<div class="space24"></div>
							<h1 class="text-anime-style-3"><span class="conferences">Conferences</span> ‘<span>25</span></h1>
							<div class="space40"></div>
							<div class="btn-area1">
								<a href="{{ route('event.schedule') }}" class="vl-btn3">Reserve premium Seat</a>
								<a href="{{ route('pricing') }}" class="vl-btn3 btn2">buy ticket now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->

		<!--===== ABOUT AREA STARTS =======-->
		<div class="about3-section-area sp1">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="about3-images">
							<img src="{{ asset('assets/img/all-images/about/about-img10.png') }}" alt="" class="about-img10 aniamtion-key-1" />
							<div class="img1" data-aos="zoom-in" data-aos-duration="1000">
								<img src="{{ asset('assets/img/all-images/about/about-img7.png') }}" alt="" />
							</div>
							<div class="img2" data-aos="zoom-in" data-aos-duration="1100">
								<img src="{{ asset('assets/img/all-images/about/about-img8.png') }}" alt="" />
							</div>
							<div class="img3" data-aos="zoom-in" data-aos-duration="1200">
								<img src="{{ asset('assets/img/all-images/about/about-img9.png') }}" alt="" />
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="about-header heading5">
							<h5 data-aos="fade-left" data-aos-duration="800">about our Designer conferences</h5>
							<div class="space18"></div>
							<h2 class="text-anime-style-3">Explore Future Of Design At Our Yearly Conference</h2>
							<div class="space18"></div>
							<p data-aos="fade-left" data-aos-duration="900">The Yearly Designer Conferences designed to challenge, Event inspire, and push the boundaries of what is possible in design.</p>
							<div class="space32"></div>
							<div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
								<a href="{{ route('event.schedule') }}" class="vl-btn3">Reserve premium Seat</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== ABOUT AREA ENDS =======-->
@endsection
