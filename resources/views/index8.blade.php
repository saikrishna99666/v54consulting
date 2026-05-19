@extends('layouts.app')

@section('title', 'Homepage Eight - Eventify')

@section('body-class', 'homepage8-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero8-slider-area" style="background-image: url({{ asset('assets/img/bg/header-bg19.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center bottom">
			<img src="{{ asset('assets/img/elements/layer1.png') }}" alt="" class="layer1" />
			<div class="container">
				<div class="row">
					<div class="col-lg-8 m-auto">
						<div class="hero8-header text-center">
							<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />Join the the Future of crypto</h5>
							<div class="space32"></div>
							<h1 class="text-anime-style-3">Digital crypto</h1>
							<div class="space24"></div>
							<h1 class="text-anime-style-3"><span class="conferences">Conferences</span> ‘25</h1>
							<div class="space40"></div>
							<div class="btn-area1">
								<a href="{{ route('contact') }}" class="vl-btn8"
									><span class="demo">Reserve premium Seat</span><span class="arrow"><i class="fa-solid fa-arrow-right"></i></span
								></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="date-btn aniamtion-key-1">
				<h4>15</h4>
				<div class="space14"></div>
				<p>January</p>
				<div class="space20"></div>
				<a href="{{ route('pricing') }}">Buy Ticket</a>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
@endsection
