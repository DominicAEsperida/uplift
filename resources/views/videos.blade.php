<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<meta name="Learn Moreport" content="width=device-width, initial-scale=1" />

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
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
	</head>

	<body>
		<div class="hero vh-25 px-5 ">
			<nav class="navbar navbar-expand-md">
				<div class="container-fluid">
					<!-- Logo -->
					<a class="navbar-brand ms-5" href="{{ url('/') }}">
						<img id="word_logo" class="ms-5" src="{{ asset('/img/word_logo.png') }}" alt="word_logo" style="height: 50px; width: 100px" />
					</a>

					<!-- Middle part -->
					<div class="navbar-nav gap-5 text-uppercase fw-bold mx-auto">
						<ul class="navbar-nav ms-auto gap-4">
							<li class="nav-item"><a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
							<li class="nav-item">
								<a href="/contact-us" class="nav-link {{ request()->is('/contact-us') ? 'active' : '' }}">Contact Us</a>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Articles </a>
								<ul class="dropdown-menu">
									<li>
										<a href="/videos" class="dropdown-item text-center nav-link {{ request()->is('videos') ? 'active' : '' }}"
											>Videos</a
										>
									</li>
									<hr />
									<li>
										<a href="/texts" class="dropdown-item text-center nav-link {{ request()->is('texts') ? 'active' : '' }}"
											>Tips</a
										>
									</li>
								</ul>
							</li>
							<li class="nav-item"><a href="/forums" class="nav-link {{ request()->is('forums') ? 'active' : '' }}">Forums</a></li>
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

			<!-- Tips -->
			<div class="container">
			<h2 class="text-center my-5 fw-semibold fs-1">VIDEOS</h2>
				<div class="row">
					<div id="myCarousel" class="carousel slide carousel-dark carousel-fade vidcarousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<div class="row">
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=lQhpetkwWnM" target="_blank">
												<img src="{{ asset('/img/vid1.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=lQhpetkwWnM" target="_blank"
														>Mental Health Minute: Depression</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=lQhpetkwWnM"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=DxIDKZHW3-E" target="_blank">
												<img src="{{ asset('/img/vid2.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=DxIDKZHW3-E" target="_blank"
														>We All Have Mental Health</a
													>
												</h4>
											</div>
											<div class="card-read-more mt-4 ">
												<a
													href="https://www.youtube.com/watch?v=DxIDKZHW3-E"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-4 ">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=AUWhdmKyOE8" target="_blank">
												<img src="{{ asset('/img/vid3.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=AUWhdmKyOE8" target="_blank"
														>What are mental health problems?</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=AUWhdmKyOE8"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="row">
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=uWf2vDPQnx0" target="_blank">
												<img src="{{ asset('/img/vid4.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=uWf2vDPQnx0" target="_blank"
														>Understanding Mental Health</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=uWf2vDPQnx0"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=PgOmPyM1uv8" target="_blank">
												<img src="{{ asset('/img/vid5.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=PgOmPyM1uv8" target="_blank"
														>What is Mental Health and Why is it Important?</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=PgOmPyM1uv8"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=IaSpas9hWNQ" target="_blank">
												<img src="{{ asset('/img/vid6.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=IaSpas9hWNQ" target="_blank"
														>10 Common Mental Illnesses Crash Course</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=IaSpas9hWNQ"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="carousel-item">
								<div class="row">
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=1i9OktVsTWo" target="_blank">
												<img src="{{ asset('/img/vid7.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=1i9OktVsTWo" target="_blank"
														>Teen Health: Mental Health</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=1i9OktVsTWo"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=BdhbPTkfVcw" target="_blank">
												<img src="{{ asset('/img/vid8.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=BdhbPTkfVcw" target="_blank"
														>5 MOST COMMON Mental Illnesses EXPLAINED</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=BdhbPTkfVcw"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="card vidCards">
											<a class="img-card" href="https://www.youtube.com/watch?v=VpDLcq3zAdY" target="_blank">
												<img src="{{ asset('/img/vid9.jpg') }}" />
											</a>
											<div class="card-content">
												<h4 class="card-title">
													<a href="https://www.youtube.com/watch?v=VpDLcq3zAdY" target="_blank"
														>Mental illness, stigma & discrimination</a
													>
												</h4>
											</div>
											<div class="card-read-more ">
												<a
													href="https://www.youtube.com/watch?v=VpDLcq3zAdY"
													target="_blank"
													class="btn btn-link btn-block color text-dark"
												>
													<p class="text-center mt-3">Learn More</p>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<button class="carousel-control-prev controller-l" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next controller-r" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Articles -->
		<div class="articles container ">
		<h2 class="text-center my-5 fw-semibold fs-1">ARTICLES</h2>
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<div class="card card-arti">
						<a class="img-card" href="https://www.nimh.nih.gov/health/topics/index.shtml" target="_blank">
							<img src="{{ asset('/img/card1.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.nimh.nih.gov/health/topics/index.shtml" target="_blank"
									>National Institute of Mental Health</a
								>
							</h4>
							<p class="mb-0">
								The National Institute of Mental Health (NIMH) provides comprehensive information on mental
								health disorders and conditions, including symptoms, causes, diagnosis, and treatment.
							</p>
						</div>
						<div class="card-read-more mt-5">
							<a
								href="https://www.nimh.nih.gov/health/topics/index.shtml"
								target="_blank"
								class="btn btn-link btn-block color text-dark"
							>
								<p class="text-center">Read More</p>
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="card card-arti">
						<a class="img-card" href="https://www.psychiatry.org/patients-families" target="_blank">
							<img src="{{ asset('/img/card2.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.psychiatry.org/patients-families" target="_blank">
									American Psychiatric Association
								</a>
							</h4>
							<p class="mb-0">
								The American Psychiatric Association (APA) is a professional organization of psychiatrists
								dedicated to promoting mental health, preventing mental illness, and improving the treatment
								of mental health conditions.
							</p>
						</div>
						<div class="card-read-more mt-4">
							<a
								href="https://www.psychiatry.org/patients-families"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<div class="card card-arti">
						<a class="img-card" href="https://www.mhanational.org/mental-health-month" target="_blank">
							<img src="{{ asset('/img/card3.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.mhanational.org/mental-health-month" target="_blank"
									>Mental Health America
								</a>
							</h4>
							<p class="mb-0">
								Mental Health America is a non-profit organization that provides resources and support for
								individuals and families affected by mental health issues. They also raise awareness and
								advocate for policies that promote mental health.
							</p>
						</div>
						<div class="card-read-more mt-5">
							<a
								href="https://www.mhanational.org/mental-health-month"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a
							class="img-card"
							href="https://www.nami.org/About-Mental-Illness/Mental-Health-Conditions"
							target="_blank"
						>
							<img src="{{ asset('/img/card4.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.nami.org/About-Mental-Illness/Mental-Health-Conditions" target="_blank"
									>National Alliance on Mental Illness
								</a>
							</h4>
							<p class="mb-0">
								The National Alliance on Mental Illness (NAMI) is the largest grassroots mental health
								organization in the United States. They offer education, support, and advocacy for individuals
								and families affected by mental illness.
							</p>
						</div>
						<div class="card-read-more mt-4">
							<a
								href="https://www.nami.org/About-Mental-Illness/Mental-Health-Conditions"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a class="img-card" href="https://www.who.int/teams/mental-health-and-substance-use" target="_blank">
							<img src="{{ asset('/img/card5.png') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.who.int/teams/mental-health-and-substance-use" target="_blank"
									>World Health Organization</a
								>
							</h4>
							<p class="mb-0">
								The World Health Organization (WHO) provides global leadership on public health issues,
								including mental health. They offer information and resources on mental health conditions and
								treatments, as well as guidance for policy makers.
							</p>
						</div>
						<div class="card-read-more mt-5">
							<a
								href="https://www.who.int/teams/mental-health-and-substance-use"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a class="img-card" href="https://adaa.org/understanding-anxiety" target="_blank">
							<img src="{{ asset('/img/card6.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://adaa.org/understanding-anxiety" target="_blank"
									>Anxiety and Depression Association of America
								</a>
							</h4>
							<p class="mb-0">
								The Anxiety and Depression Association of America (ADAA) is a non-profit organization
								dedicated to promoting the prevention, treatment, and cure of anxiety, depression, and related
								disorders. They offer resources and support for individuals affected by these conditions.
							</p>
						</div>
						<div class="card-read-more mt-1">
							<a
								href="https://adaa.org/understanding-anxiety"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a class="img-card" href="https://www.samhsa.gov/" target="_blank">
							<img src="{{ asset('/img/card7.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.samhsa.gov/" target="_blank"
									>Substance Abuse and Mental Health Services Administration
								</a>
							</h4>
							<p class="mb-0">
								The Substance Abuse and Mental Health Services Administration (SAMHSA) is a branch of the U.S.
								Department of Health and Human Services. They provide resources and support for individuals
								and families affected by substance abuse and mental health issues.
							</p>
						</div>
						<div class="card-read-more ">
							<a href="https://www.samhsa.gov/" target="_blank" class="btn btn-link btn-block text-dark">
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a
							class="img-card"
							href="https://www.mayoclinic.org/diseases-conditions/mental-illness/symptoms-causes/syc-20374968"
							target="_blank"
						>
							<img src="{{ asset('/img/card8.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a
									href="https://www.mayoclinic.org/diseases-conditions/mental-illness/symptoms-causes/syc-20374968"
									target="_blank"
									>Mayo Clinic
								</a>
							</h4>
							<p class="mb-0">
								The Mayo Clinic is a world-renowned medical center that offers comprehensive care for
								individuals with mental health conditions. They provide information on symptoms, causes,
								diagnosis, and treatment of mental health disorders, as well as resources for individuals and
								families affected by these conditions.
							</p>
						</div>
						<div class="card-read-more mt-4">
							<a
								href="https://www.mayoclinic.org/diseases-conditions/mental-illness/symptoms-causes/syc-20374968"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4 mt-5">
					<div class="card card-arti">
						<a class="img-card" href="https://www.health.harvard.edu/topics/mental-health" target="_blank">
							<img src="{{ asset('/img/card9.jpg') }}" />
						</a>
						<div class="card-content">
							<h4 class="card-title">
								<a href="https://www.health.harvard.edu/topics/mental-health" target="_blank"
									>Harvard Health Publishing: Mental Health
								</a>
							</h4>
							<p class="mb-0">
								Harvard Health Publishing is the media and publishing division of Harvard Medical School.
								Their website has resources on mental health, including articles on specific mental health
								conditions, how to cope with stress, and how to maintain good mental health.
							</p>
						</div>
						<div class="card-read-more  ">
							<a
								href="https://www.health.harvard.edu/topics/mental-health"
								target="_blank"
								class="btn btn-link btn-block text-dark"
							>
								Read More
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Footer -->
		<div id="footer" class="container-fluid pt-5 text-center ">
            <div class="pb-5"><img id="pic_logo" src="{{asset('/img/pic_logo.png')}}" alt="some"></div>
            <p class="fs-5 ">
                Don’t be afraid to let go of your emotions
            </p>
            <p class="fs-6 text-light-emphasis">
                You can also find us here
            </p>
            <div class="pb-3">
                <img src="{{asset('/img/fb.png')}}" alt="">
                <img src="{{asset('/img/twit.png')}}" alt="">
                <img src="{{asset('/img/instagram.png')}}" style="width: 48px; height: 48px;"  alt="">

                <p class="mb-4 mt-4">
                    © 2023 Uplift, Inc. All Rights Reserved
                </p>
            </div>
            
   		 </div>   
	</body>
</html>
