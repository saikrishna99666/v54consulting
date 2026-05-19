@extends('layouts.app')

@section('title', 'Homepage Six - Eventify')

@section('body-class', 'homepage6-body')

@section('content')
		<!--===== HERO AREA STARTS =======-->
		<div class="hero6-section-area" style="background-image: url({{ asset('assets/img/bg/header-bg17.png') }}); background-repeat: no-repeat; background-size: cover; background-position: center top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-7">
						<div class="hero6-header">
							<h5><img src="{{ asset('assets/img/icons/sub-logo1.svg') }}" alt="" />Marketing Summit “2025”</h5>
							<div class="space24"></div>
							<h1 class="text-anime-style-3">Empowering Tomorrow's Marketers</h1>
							<div class="space24"></div>
							<div class="btn-area1">
								<a href="{{ route('pricing') }}" class="vl-btn6">Buy Tickets Now <img src="{{ asset('assets/img/icons/arrow2.svg') }}" alt="" /></a>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="img1">
							<img src="{{ asset('assets/img/all-images/hero/hero-img8.png') }}" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--===== HERO AREA ENDS =======-->
@endsection
