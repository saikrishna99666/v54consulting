@extends('layouts.app')

@section('title', 'Homepage Nine - Eventify')

@section('body-class', 'homepage9-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero9-slider-area" style="background-image: url({{ asset('assets/img/bg/header-bg22.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div class="hero8-header">
							<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />WE ARE COMING FOR</h5>
							<div class="space16"></div>
							<h1 class="text-anime-style-3">World Music Events 2025</h1>
							<div class="space32"></div>
							<div class="btn-area1">
								<a href="{{ route('contact') }}" class="vl-btn9"><span class="demo">Buy Tickets Now!</span></a>
								<a href="{{ route('event.schedule') }}" class="vl-btn9 btn2"><span class="demo">Schedules</span></a>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="img1">
							<img src="{{ asset('assets/img/all-images/hero/hero-img11.png') }}" alt="" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="timer-bg-area">
							<div class="row">
								<div class="col-lg-7">
									<div class="timer-btn-area">
										<div class="timer">
											<div class="time-box">
												<span id="days" class="time-value">119</span>
												<br />
											</div>
											<div class="space14"></div>
											<div class="time-box">
												<span id="hours" class="time-value">22</span>
												<br />
											</div>
											<div class="space14"></div>
											<div class="time-box">
												<span id="minutes" class="time-value">18</span>
												<br />
											</div>
											<div class="space14"></div>
											<div class="time-box box2">
												<span id="seconds" class="time-value">44</span>
												<br />
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-5">
									<div class="heading12">
										<h3>30 January 2025</h3>
										<div class="space16"></div>
										<p><img src="{{ asset('assets/img/icons/location1.svg') }}" alt="" /> Secret Location In The UK</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
@endsection
