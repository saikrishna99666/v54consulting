@extends('layouts.app')

@section('title', 'Homepage Four - Eventify')

@section('body-class', 'homepage4-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero4-section-area">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-5">
						<div class="hero4-header">
							<h5 data-aos="fade-left" data-aos-duration="800"><img src="{{ asset('assets/img/icons/sub-logo2.svg') }}" alt="" class="d-md-inline-block d-none" /> Lead Purpose, Innovate with Passion</h5>
							<div class="space20"></div>
							<h1 class="text-anime-style-3">Elevate 2025 Leading with the Purpose</h1>
							<div class="space20"></div>
							<p data-aos="fade-left" data-aos-duration="900">
								Welcome to Innovate 2024: Shaping the Future of <br class="d-lg-block d-none" />
								Business, where industry leaders, innovators.
							</p>
							<div class="space32"></div>
							<div class="btn-area1" data-aos="fade-left" data-aos-duration="1000">
								<a href="{{ route('event.schedule') }}" class="vl-btn4">Reserve My Seat</a>
							</div>
						</div>
					</div>
					<div class="col-lg-2"></div>
					<div class="col-lg-5">
						<div class="hero-content-images">
							<div class="img1 reveal image-anime">
								<img src="{{ asset('assets/img/all-images/hero/hero-img5.png') }}" alt="" />
							</div>
							<div class="content-area aniamtion-key-1">
								<div class="img2 image-anime reveal">
									<img src="{{ asset('assets/img/all-images/hero/hero-img6.png') }}" alt="" />
								</div>
								<div class="space16"></div>
								<a href="#" class="date">25 Jan, 2025</a>
								<ul>
									<li>
										<a href="#"><img src="{{ asset('assets/img/icons/clock1.svg') }}" alt="" />10.00 AM -12.00 PM</a>
									</li>
									<li>
										<a href="#"><img src="{{ asset('assets/img/icons/location1.svg') }}" alt="" />26/C Asana, New York</a>
									</li>
								</ul>
								<div class="space24"></div>
								<div class="btn-area1">
									<a href="{{ route('pricing') }}" class="vl-btn4">buy tickets</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
		<div class="others4-section-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="others-bg">
							<div class="row align-items-center">
								<div class="col-lg-4">
									<div class="heading-area">
										<h4 class="text-anime-style-3">Yearly Business Conferences “25”</h4>
										<div class="space20 d-lg-none d-block"></div>
									</div>
								</div>
								<div class="col-lg-2"></div>
								<div class="col-lg-6">
									<div class="others-times-area">
										<div class="timer">
											<div class="time-box">
												<span id="days" class="time-value">119</span>
											</div>
											<div class="time-box">
												<span id="hours" class="time-value">22</span>
											</div>
											<div class="time-box">
												<span id="minutes" class="time-value">18</span>
											</div>
											<div class="time-box" style="margin: 0">
												<span id="seconds" class="time-value">44</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection
