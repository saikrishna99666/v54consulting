	<!-- Popup Section -->
	<div id="popup" class="popup-overlay">
		<div class="popup-content">
			<span class="close-btn" id="close-popup">&times;</span>
			<div class="popup-icon">
				<img src="{{ asset('assets_eventify/img/logo/popup-logo.png') }}" alt="" />
			</div>
			<div class="space32"></div>
			<div class="heading2">
				<h2>Grow your business with our agency</h2>
				<div class="space8"></div>
				<ul>
					<li><img src="{{ asset('assets_eventify/img/icons/check3.svg') }}" alt="" />Elevate User Experience Expertise</li>
					<li><img src="{{ asset('assets_eventify/img/icons/check3.svg') }}" alt="" /> Elevate Your UI/UX Skills Designer</li>
					<li><img src="{{ asset('assets_eventify/img/icons/check3.svg') }}" alt="" />Join Leading UI/UX Event the Year</li>
				</ul>
			</div>
			<div class="space50"></div>
			<a class="vl-btn2" href="{{ route('contact') }}"><span class="demo">Buy Ticket Now</span><span class="arrow"><i class="fa-solid fa-arrow-right"></i></span>
			</a>
			<p class="no-thanks">No thanks</p>
		</div>
	</div>
	<!--===== PRELOADER STARTS =======-->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="{{ asset('assets_eventify/img/logo/preloader.png') }}" alt="" /></div>
		</div>
	</div>
	<!--===== PRELOADER ENDS =======-->

	<!--===== PAGE PROGRESS START=======-->
	<div class="paginacontainer">
		<div class="progress-wrap">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
			</svg>
		</div>
	</div>
	<!--===== PAGE PROGRESS END=======-->
