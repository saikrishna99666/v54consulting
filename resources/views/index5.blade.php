@extends('layouts.app')

@section('title', 'Homepage Five - Eventify')

@section('body-class', 'homepage5-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero5-section-area">
			<img src="{{ asset('assets/img/elements/elements31.png') }}" alt="" class="elements31" />
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div class="header5-heading">
							<h5>
								<span><img src="{{ asset('assets/img/icons/location2.svg') }}" alt="" /></span>Location: 1800 Abbot Kinney Blvd
							</h5>
							<div class="space32"></div>
							<h1 class="text-anime-style-3">AI Digital</h1>
							<div class="space32"></div>
							<h1 class="text-anime-style-3"><img src="{{ asset('assets/img/all-images/others/author-img1.png') }}" alt="" /><span>Summit</span></h1>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="img1">
							<img src="{{ asset('assets/img/all-images/hero/hero-img7.png') }}" alt="" class="keyframe5 hero-img7" />
							<a href="#">
								<div class="content" bis_skin_checked="1">
									<h6 class="circle rotateme">Build Success Brand .</h6>
								</div>
								<span><img src="{{ asset('assets/img/icons/arrow1.svg') }}" alt="" /></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->

		<!--===== OTHERS AREA STARTS =======-->
		<div class="others5-section-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="cta-counter-box">
							<img src="{{ asset('assets/img/elements/elements23.png') }}" alt="" class="elements23 keyframe5" />
							<h2><span id="days" class="time-value">49</span></h2>
						</div>
						<div class="space50 d-lg-none d-block"></div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="cta-counter-box">
							<img src="{{ asset('assets/img/elements/elements23.png') }}" alt="" class="elements23 keyframe5" />
							<h2><span id="hours" class="time-value">49</span></h2>
						</div>
						<div class="space50 d-lg-none d-block"></div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="cta-counter-box">
							<img src="{{ asset('assets/img/elements/elements23.png') }}" alt="" class="elements23 keyframe5" />
							<h2><span id="minutes" class="time-value">49</span></h2>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="cta-counter-box">
							<img src="{{ asset('assets/img/elements/elements23.png') }}" alt="" class="elements23 keyframe5" />
							<h2><span id="seconds" class="time-value">49</span></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== OTHERS AREA ENDS =======-->
@endsection
