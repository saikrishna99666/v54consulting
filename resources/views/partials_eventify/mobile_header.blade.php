	<!--===== MOBILE HEADER STARTS =======-->
	<div class="mobile-header mobile-haeder1 d-block d-lg-none">
		<div class="container-fluid">
			<div class="col-12">
				<div class="mobile-header-elements">
					<div class="mobile-logo">
						<a href="{{ route('home') }}"><img src="{{ asset('assets_eventify/img/logo/logo1.png') }}" alt="" /></a>
					</div>
					<div class="mobile-nav-icon dots-menu">
						<i class="fa-solid fa-bars-staggered"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="mobile-sidebar mobile-sidebar1">
		<div class="logosicon-area">
			<div class="logos">
				<img src="{{ asset('assets_eventify/img/logo/logo2.png') }}" alt="" />
			</div>
			<div class="menu-close">
				<i class="fa-solid fa-xmark"></i>
			</div>
		</div>
		<div class="mobile-nav mobile-nav1">
			<ul class="mobile-nav-list nav-list1">
				<li>
					<a href="{{ route('home') }}">Home </a>
					<ul class="sub-menu">
						<li><a href="{{ route('home') }}">Home One</a></li>
						<li><a href="{{ route('home2') }}">Home Two</a></li>
						<li><a href="{{ route('home3') }}">Home Three</a></li>
						<li><a href="{{ route('home4') }}">Home Four</a></li>
						<li><a href="{{ route('home5') }}">Home Five</a></li>
						<li><a href="{{ route('home6') }}">Home Six</a></li>
						<li><a href="{{ route('home7') }}">Home Seven</a></li>
						<li><a href="{{ route('home8') }}">Home Eight</a></li>
						<li><a href="{{ route('home9') }}">Home Nine</a></li>
						<li><a href="{{ route('home10') }}">Home Ten</a></li>
					</ul>
				</li>
				<li><a href="{{ route('about') }}">About Event</a></li>
				<li>
					<a href="#">Speakers</a>
					<ul class="sub-menu">
						<li><a href="{{ route('speakers') }}">Speakers</a></li>
						<li><a href="{{ route('speaker.details') }}">Speakers Details</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Schedule</a>
					<ul class="sub-menu">
						<li><a href="{{ route('events') }}">Our Event</a></li>
						<li><a href="{{ route('event.schedule') }}">Event Schedule</a></li>
						<li><a href="{{ route('event.details') }}">Event Details</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Blogs</a>
					<ul class="sub-menu">
						<li><a href="{{ route('blog') }}">Our Blog</a></li>
						<li><a href="{{ route('blog.details', ['slug' => 'sample-blog']) }}">Blog Details</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Pages</a>
					<ul class="sub-menu">
						<li><a href="{{ route('memories') }}">Our Memories</a></li>
						<li><a href="{{ route('pricing') }}">Pricing Plan</a></li>
						<li><a href="{{ route('faq') }}">FAQ,s</a></li>
						<li><a href="{{ route('contact') }}">Contact Us</a></li>
					</ul>
				</li>
				<li><a href="{{ route('contact') }}">Contact Us</a></li>
			</ul>
			<div class="allmobilesection">
				<a href="{{ route('contact') }}" class="vl-btn1">Contact Now</a>
				<div class="single-footer">
					<h3>Contact Info</h3>
					<div class="footer1-contact-info">
						<div class="contact-info-single">
							<div class="contact-info-icon">
								<span><i class="fa-solid fa-phone-volume"></i></span>
							</div>
							<div class="contact-info-text">
								<a href="tel:+3(924)4596512">+3(924)4596512</a>
							</div>
						</div>
						<div class="contact-info-single">
							<div class="contact-info-icon">
								<span><i class="fa-solid fa-envelope"></i></span>
							</div>
							<div class="contact-info-text">
								<a href="mailto:info@example.com">info@example.com</a>
							</div>
						</div>
						<div class="single-footer">
							<h3>Our Location</h3>
							<div class="contact-info-single">
								<div class="contact-info-icon">
									<span><i class="fa-solid fa-location-dot"></i></span>
								</div>
								<div class="contact-info-text">
									<a href="#">55 East Birchwood Ave.Brooklyn, <br />
										New York 11201,United States</a>
								</div>
							</div>
						</div>
						<div class="single-footer">
							<h3>Social Links</h3>
							<div class="social-links-mobile-menu">
								<ul>
									<li>
										<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-instagram"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa-brands fa-youtube"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--===== MOBILE HEADER STARTS =======-->
