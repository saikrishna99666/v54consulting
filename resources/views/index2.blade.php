@extends('layouts.app')

@section('title', 'Homepage Two - Eventify')

@section('body-class', 'homepage2-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero2-slider-area">
			<div class="her2-section-area">
				<img src="{{ asset('assets/img/elements/elements9.png') }}" alt="" class="elements9" />
				<img src="{{ asset('assets/img/elements/elements10.png') }}" alt="" class="elements10" />
				<img src="{{ asset('assets/img/elements/elements11.png') }}" alt="" class="elements11" />
				<div class="img1">
					<img src="{{ asset('assets/img/all-images/hero/hero-img2.png') }}" alt="" />
				</div>
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="hero2-header">
								<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />Lead Purpose, Innovate with Passion</h5>
								<div class="space28"></div>
								<h1>Yearly Business</h1>
								<div class="space16"></div>
								<h1><span class="conferences">Conferences</span> “ <span class="odometer" data-count="25"></span> ”</h1>
								<div class="timer">
									<div class="time-box">
										<span id="days" class="time-value">119</span>
										<div class="space8"></div>
									</div>
									<div class="space14"></div>
									<div class="time-box">
										<span id="hours" class="time-value">22</span>
										<div class="space8"></div>
									</div>
									<div class="space14"></div>
									<div class="time-box">
										<span id="minutes" class="time-value">18</span>
										<div class="space8"></div>
									</div>
									<div class="space14"></div>
									<div class="time-box" style="margin: 0">
										<span id="seconds" class="time-value">44</span>
										<div class="space8"></div>
									</div>
								</div>
								<div class="space32"></div>
								<div class="btn-area1">
									<a href="{{ route('event.schedule') }}" class="vl-btn2"
										><span class="demo">Reserve My Seat</span><span class="arrow"><i class="fa-solid fa-arrow-right"></i></span
									></a>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="arrow-btn">
								<div class="about-btnarea">
									<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200" fill="none" class="keyframe5">
										<path
											d="M93.8771 2.53621C96.8982 1.28483 98.4087 0.659138 100 0.659138C101.591 0.659138 103.102 1.28483 106.123 2.5362L164.588 26.7531C167.609 28.0045 169.119 28.6302 170.245 29.7554C171.37 30.8806 171.995 32.3912 173.247 35.4123L197.464 93.8771C198.715 96.8982 199.341 98.4087 199.341 100C199.341 101.591 198.715 103.102 197.464 106.123L173.247 164.588C171.995 167.609 171.37 169.119 170.245 170.245C169.119 171.37 167.609 171.995 164.588 173.247L106.123 197.464C103.102 198.715 101.591 199.341 100 199.341C98.4087 199.341 96.8982 198.715 93.8771 197.464L35.4123 173.247C32.3912 171.995 30.8806 171.37 29.7554 170.245C28.6302 169.119 28.0045 167.609 26.7531 164.588L2.53621 106.123C1.28483 103.102 0.659138 101.591 0.659138 100C0.659138 98.4087 1.28483 96.8982 2.5362 93.8771L26.7531 35.4123C28.0045 32.3912 28.6302 30.8806 29.7554 29.7554C30.8806 28.6302 32.3912 28.0045 35.4123 26.7531L93.8771 2.53621Z"
											fill="#C0F037"
										/>
									</svg>
									<a href="{{ route('pricing') }}">
										<span><i class="fa-solid fa-arrow-right"></i></span>
										<br />
										<div class="space12"></div>
										Buy Ticket
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->

		<!--===== ABOUT AREA STARTS =======-->
		<div class="about2-section-area sp1">
			<img src="{{ asset('assets/img/elements/elements13.png') }}" alt="" class="elements12" />
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<div class="about-images-area">
							<img src="{{ asset('assets/img/elements/elements14.png') }}" alt="" class="elements14" />
							<div class="row align-items-center">
								<div class="col-lg-6 col-md-6">
									<div class="img1 image-anime reveal">
										<img src="{{ asset('assets/img/all-images/about/about-img4.png') }}" alt="" />
									</div>
									<div class="space24 d-md-none d-block"></div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="img1 image-anime reveal">
										<img src="{{ asset('assets/img/all-images/about/about-img5.png') }}" alt="" />
									</div>
									<div class="space24"></div>
									<div class="img1 image-anime reveal">
										<img src="{{ asset('assets/img/all-images/about/about-img6.png') }}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-1"></div>
					<div class="col-lg-5">
						<div class="about2-header heading4">
							<h5 data-aos="fade-left" data-aos-duration="800">about our business conferences</h5>
							<div class="space18"></div>
							<h2 class="text-anime-style-3">Growth Through World Class And Conferences</h2>
							<div class="space16"></div>
							<p data-aos="fade-left" data-aos-duration="900">At Business, we bring together brightest minds, leaders, and trailblazers from across industries to explore latest trends, technologies, and strategies shaping the future.</p>
							<div class="others-boxarea" data-aos="fade-left" data-aos-duration="1000">
								<div class="icons-box">
									<div class="icons">
										<img src="{{ asset('assets/img/icons/about-icon1.svg') }}" alt="" />
									</div>
									<p><span class="odometer" data-count="40"></span>+ Speakers</p>
								</div>
								<div class="icons-box">
									<div class="icons">
										<img src="{{ asset('assets/img/icons/about-icon2.svg') }}" alt="" />
									</div>
									<p><span class="odometer" data-count="19"></span>+ Sponsors</p>
								</div>
							</div>
							<div class="space32"></div>
							<div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
								<a href="{{ route('contact') }}" class="vl-btn2"
									><span class="demo">Become an Attendee</span><span class="arrow"><i class="fa-solid fa-arrow-right"></i></span
								></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== ABOUT AREA ENDS =======-->
@endsection
