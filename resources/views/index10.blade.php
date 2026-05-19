@extends('layouts.app')

@section('title', 'Homepage Ten - Eventify')

@section('body-class', 'homepage10-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero10-section-area" style="background-image: url({{ asset('assets/img/bg/header-bg23.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div class="hero6-header">
							<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />12th Technology Forum Conference</h5>
							<div class="space24"></div>
							<h1 class="text-anime-style-3">Technology</h1>
							<h1 class="text-anime-style-3"><span>Forum “2025”</span></h1>
							<div class="space32"></div>
							<p>
								Explore cutting-edge innovations, network <br class="d-lg-block d-none" />
								with industry leaders and gain insight.
							</p>
							<div class="space16"></div>
							<ul>
								<li>
									<a href="#"><img src="{{ asset('assets/img/icons/calender1.svg') }}" alt="" /> 15th, 16th, & 17th January “2025”</a>
								</li>
							</ul>
							<div class="space32"></div>
							<div class="btn-area1">
								<a href="{{ route('contact') }}" class="vl-btn10">Register now <img src="{{ asset('assets/img/icons/arrow2.svg') }}" alt="" /></a>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="hero10-images">
							<div class="img1">
								<img src="{{ asset('assets/img/all-images/hero/hero-img12.png') }}" alt="" />
							</div>
							<div class="img2">
								<img src="{{ asset('assets/img/all-images/hero/hero-img13.png') }}" alt="" />
							</div>
							<div class="img3">
								<img src="{{ asset('assets/img/all-images/hero/hero-img14.png') }}" alt="" />
							</div>
							<div class="img4">
								<img src="{{ asset('assets/img/all-images/hero/hero-img15.png') }}" alt="" />
							</div>
							<img src="{{ asset('assets/img/elements/elements38.png') }}" alt="" class="elements38 keyframe5" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
@endsection
