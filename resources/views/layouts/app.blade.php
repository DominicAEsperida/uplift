<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>{{ config("app.name", "Laravel") }}</title>

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>

		<!-- Fonts -->
		<link rel="dns-prefetch" href="//fonts.gstatic.com" />
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

		<!-- Styles -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
		<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
	</head>
	<body>
		<div id="app">
			<!-- Hero -->
			<div class="hero vh-100 position-relative" style="overflow: hidden">
				<nav class="navbar navbar-expand-md">
					<div class="container-fluid">
						<!-- Logo -->
						<a class="navbar-brand ms-5" href="{{ url('/') }}">
							<img id="word_logo" src="{{ asset('/img/word_logo.png') }}" alt="word_logo" style="height: 50px; width: 100px" />
						</a>

						<!-- Middle part -->
						<div class="navbar-nav gap-5 text-uppercase fw-bold mx-auto">
							<ul class="navbar-nav ms-auto gap-4">
								<li class="nav-item"><a href="/" class="nav-link {{request()->is('/') ? 'active' : ''}}">Home</a></li>
								<li class="nav-item">
									<a href="/contact-us" class="nav-link {{request()->is('/contact-us') ? 'active' : ''}}">Contact Us</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Articles </a>
									<ul class="dropdown-menu">
										<li>
											<a href="/videos" class="dropdown-item text-center nav-link {{request()->is('videos') ? 'active' : ''}}"
												>Videos</a
											>
										</li>
										<hr />
										<li>
											<a href="/texts" class="dropdown-item text-center nav-link {{request()->is('texts') ? 'active' : ''}}"
												>Tips</a
											>
										</li>
									</ul>
								</li>
								<li class="nav-item"><a href="/forums" class="nav-link {{request()->is('forums') ? 'active' : ''}}">Forums</a></li>
							</ul>
						</div>

						<!-- Right part -->
						<ul class="navbar-nav gap-1 me-5">
							<!-- Authentication Links -->
							@guest @if (Route::has('login'))
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="modal" data-bs-target="#login_modal" href="{{ route('login') }}"
									>{{ __("Login") }}
								</a>
							</li>

							<!-- Login Modal -->
							<div
								class="modal fade"
								id="login_modal"
								data-bs-backdrop="static"
								data-bs-keyboard="false"
								tabindex="-1"
								aria-labelledby="staticBackdropLabel"
								aria-hidden="true"
							>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form method="POST" action="{{ route('login') }}">
												@csrf

												<div class="row mb-3">
													<label for="email" class="col-md-4 col-form-label text-md-end">{{ __("Email Address") }}</label>

													<div class="col-md-6">
														<input
															id="email"
															type="email"
															class="form-control @error('email') is-invalid @enderror"
															name="email"
															value="{{ old('email') }}"
															required
															autocomplete="email"
															autofocus
														/>

														@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row mb-3">
													<label for="password" class="col-md-4 col-form-label text-md-end">{{ __("Password") }}</label>

													<div class="col-md-6">
														<input
															id="password"
															type="password"
															class="form-control @error('password') is-invalid @enderror"
															name="password"
															required
															autocomplete="current-password"
														/>

														@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row mb-3">
													<div class="col-md-6 offset-md-4">
														<div class="form-check">
															<input class="form-check-input" type="checkbox" name="remember" id="remember"
															{{ old("remember") ? "checked" : "" }}>

															<label class="form-check-label" for="remember">
																{{ __("Remember Me") }}
															</label>
														</div>
													</div>
												</div>

												<div class="row mb-0">
													<div class="col-md-8 offset-md-4">
														<button type="submit" class="btn btn-primary">
															{{ __("Login") }}
														</button>

														@if (Route::has('password.request'))
														<a class="btn btn-link" href="{{ route('password.request') }}">
															{{ __("Forgot Your Password?") }}
														</a>
														@endif
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							@endif

							<div class="vr"></div>

							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="modal" data-bs-target="#register_modal" href="{{ route('register') }}">{{
									__("Register")
								}}</a>
							</li>

							<!-- Register Modal -->
							<div
								class="modal fade"
								id="register_modal"
								data-bs-backdrop="static"
								data-bs-keyboard="false"
								tabindex="-1"
								aria-labelledby="staticBackdropLabel"
								aria-hidden="true"
							>
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="staticBackdropLabel">Register</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form method="POST" action="{{ route('register') }}">
												@csrf

												<div class="row mb-3">
													<label for="name" class="col-md-4 col-form-label text-md-end">{{ __("Name") }}</label>

													<div class="col-md-6">
														<input
															id="name"
															type="text"
															class="form-control @error('name') is-invalid @enderror"
															name="name"
															value="{{ old('name') }}"
															required
															autocomplete="name"
															autofocus
														/>

														@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row mb-3">
													<label for="email" class="col-md-4 col-form-label text-md-end">{{ __("Email Address") }}</label>

													<div class="col-md-6">
														<input
															id="email"
															type="email"
															class="form-control @error('email') is-invalid @enderror"
															name="email"
															value="{{ old('email') }}"
															required
															autocomplete="email"
														/>

														@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row mb-3">
													<label for="password" class="col-md-4 col-form-label text-md-end">{{ __("Password") }}</label>

													<div class="col-md-6">
														<input
															id="password"
															type="password"
															class="form-control @error('password') is-invalid @enderror"
															name="password"
															required
															autocomplete="new-password"
														/>

														@error('password')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
														@enderror
													</div>
												</div>

												<div class="row mb-3">
													<label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{
														__("Confirm Password")
													}}</label>

													<div class="col-md-6">
														<input
															id="password-confirm"
															type="password"
															class="form-control"
															name="password_confirmation"
															required
															autocomplete="new-password"
														/>
													</div>
												</div>

												<div class="row mb-0">
													<div class="col-md-5 offset-md-5">
														<button type="submit" class="btn btn-primary">
															{{ __("Register") }}
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							@endif @else
							<li class="nav-item dropdown">
								<a
									id="navbarDropdown"
									class="nav-link dropdown-toggle"
									href="#"
									role="button"
									data-bs-toggle="dropdown"
									aria-haspopup="true"
									aria-expanded="false"
									v-pre
								>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a
										class="dropdown-item"
										href="{{ route('logout') }}"
										onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
									>
										{{ __("Logout") }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
								</div>
							</li>
							@endguest
						</ul>
					</div>
				</nav>

				<!-- content -->
				<div class="d-flex align-items-center" style="height: 90%">
					<div class="container-fluid">
						<div class="row">
							<div id="home_btn" class="col">
								<a href="/contact-us"><button class="buttons pe-5 ps-5 pt-2 pb-2 rounded-pill">Talk to Us</button></a>
							</div>

							<div class="col">
								<p id="home_text" class="fs-5 mt-auto mb-auto ms-5 px-5">
									Welcome to Uplift, the revolutionary website application designed to provide invaluable support to individuals
									struggling with mental health issues. With Uplift, users can connect with qualified experts, educate themselves on
									healthy coping strategies, and access helpful resources - all in a safe, anonymous space. Our mission is to reduce
									the stigma associated with mental health and to empower individuals to take control of their own mental health and
									well-being. No one should have to go through their mental health journey alone, so we are here to provide support,
									resources, and a sense of community. Join us today and start your mental health journey.
								</p>
							</div>
						</div>
					</div>
				</div>

				<!-- bckgrnd carousel -->
				<div
					id="carouselExampleSlidesOnly"
					class="carousel slide carousel-fade vignette position-absolute"
					data-bs-ride="carousel"
					style="z-index: -1000"
				>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img src="{{ asset('/img/home_slide1.jpg') }}" class="d-block w-100 carousel_img" alt="..." />
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/img/home_slide2.jpg') }}" class="d-block w-100 carousel_img" alt="..." />
						</div>
						<div class="carousel-item">
							<img src="{{ asset('/img/home_slide3.jpg') }}" class="d-block w-100 carousel_img" alt="..." />
						</div>
					</div>
				</div>
			</div>

			<hr />
			<main>@yield('content')</main>
		</div>

		<!-- Footer -->
		<div id="footer" class="container-fluid pt-5 text-center">
			<div class="pb-5"><img id="pic_logo" src="{{ asset('/img/pic_logo.png') }}" alt="some" /></div>
			<p class="fs-5 text-light-emphasis">Don’t be afraid to let go of your emotions</p>
			<p class="fs-6 text-light-emphasis">You can also find us here</p>
			<div class="pt-3 pb-3">
				<img src="{{ asset('/img/fb.png') }}" alt="" />
				<img src="{{ asset('/img/twit.png') }}" alt="" />
				<img src="{{ asset('/img/instagram.png') }}" style="width: 48px; height: 48px" alt="" />
			</div>
		</div>
	</body>
	@yield('javascript')
</html>