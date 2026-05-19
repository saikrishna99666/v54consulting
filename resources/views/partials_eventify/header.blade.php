	<!--=====HEADER START=======-->
	<header>
		<div class="header-area homepage1 header header-sticky d-none d-lg-block" id="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="header-elements">
							<div class="site-logo">
								<a href="{{ route('home') }}"><img src="{{ asset('assets_eventify/img/logo/logo1.png') }}" alt="" /></a>
							</div>
							<div class="main-menu">
								<ul>
									<li>
										<a href="{{ route('home') }}">Home <i class="fa-solid fa-angle-down"></i></a>
										<div class="tp-submenu">
											<div class="row">
												<div class="col-lg-12">
														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img1.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home') }}">Eventify-Homepage 01</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img2.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home2') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home2') }}">Eventify-Homepage 02</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img3.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home3') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home3') }}">Eventify-Homepage 03</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img4.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home4') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home4') }}">Eventify-Homepage 04</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img5.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home5') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home5') }}">Eventify-Homepage 05</a>
															</div>
														</div>
													</div>

													<div class="all-images-menu">
														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img6.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home6') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home6') }}">Eventify-Homepage 06</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img7.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home7') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home7') }}">Eventify-Homepage 07</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img8.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home8') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home8') }}">Eventify-Homepage 08</a>
															</div>
														</div>

														<div class="homemenu-thumb">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img9.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home9') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home9') }}">Eventify-Homepage 09</a>
															</div>
														</div>

														<div class="homemenu-thumb" style="margin: 0">
															<div class="img1">
																<img src="{{ asset('assets_eventify/img/all-images/demo/demo-img10.png') }}" alt="" />
															</div>
															<div class="homemenu-btn">
																<a class="vl-btn1" href="{{ route('home10') }}">View Demo </a>
															</div>
															<div class="homemenu-text">
																<a href="{{ route('home10') }}">Eventify-Homepage 10</a>
															</div>
														</div>
												</div>
											</div>
										</div>
									</li>
									<li><a href="{{ route('about') }}">About Event</a></li>
									<li>
										<a href="#">Speakers <i class="fa-solid fa-angle-down"></i></a>
										<ul class="dropdown-padding">
											<li><a href="{{ route('speakers') }}">Speakers</a></li>
											<li><a href="{{ route('speaker.details') }}">Speakers Details</a></li>
										</ul>
									</li>

									<li>
										<a href="#">Schedule <i class="fa-solid fa-angle-down"></i></a>
										<ul class="dropdown-padding">
											<li><a href="{{ route('events') }}">Our Event</a></li>
											<li><a href="{{ route('event.schedule') }}">Event Schedule</a></li>
											<li><a href="{{ route('event.details') }}">Event Details</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Blogs <i class="fa-solid fa-angle-down"></i></a>
										<ul class="dropdown-padding">
											<li><a href="{{ route('blog') }}">Our Blog</a></li>
											<li><a href="{{ route('blog.details', ['slug' => 'sample-blog']) }}">Blog Details</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Pages <i class="fa-solid fa-angle-down"></i></a>
										<ul class="dropdown-padding">
											<li><a href="{{ route('memories') }}">Our Memories</a></li>
											<li><a href="{{ route('pricing') }}">Pricing Plan</a></li>
											<li><a href="{{ route('faq') }}">FAQ,s</a></li>
											<li><a href="{{ route('contact') }}">Contact Us</a></li>
										</ul>
									</li>
								</ul>
							</div>
							<div class="btn-area">
								<div class="search-icon header__search header-search-btn">
									<a href="#"><img src="{{ asset('assets_eventify/img/icons/search1.svg') }}" alt="" /></a>
								</div>
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
										<a href="#" class="m-0"><i class="fa-brands fa-pinterest-p"></i></a>
									</li>
								</ul>
							</div>

							<div class="header-search-form-wrapper">
								<div class="tx-search-close tx-close"><i class="fa-solid fa-xmark"></i></div>
								<div class="header-search-container">
									<form role="search" class="search-form">
										<input type="search" class="search-field" placeholder="Search …" value="" name="s" />
										<button type="submit" class="search-submit"><img src="{{ asset('assets_eventify/img/icons/search1.svg') }}" alt="" /></button>
									</form>
								</div>
							</div>
							<div class="body-overlay"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--=====HEADER END =======-->
