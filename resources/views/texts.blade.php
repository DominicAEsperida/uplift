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
		<div class="hero vh-100 px-5 pt-3">
			<nav class="navbar navbar-expand-md">
				<div class="container-fluid">
					<!-- Logo -->
					<a class="navbar-brand ms-5" href="{{ url('/') }}">
						<img id="word_logo" src="{{ asset('/img/word_logo.png') }}" alt="word_logo" style="height: 50px; width: 100px" />
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

			<!-- text -->
			<div class="container">
				<div class="mt-5 px-5"><img src="{{ asset('/img/imgtips.jpg') }}" class="rounded" /></div>
				<div class="h1 fw-bold text-center mt-5">Understanding Mental Health Disorders</div>
				<div class="row">
					<div class="col-9 mt-3 mx-auto text-center">
						<p>
							Mental health problems are a type of mental illness that affects a person's thoughts, feelings, and behavior. These
							disorders can fluctuate in severity and affect persons of all ages. Depression, anxiety, bipolar disorder,
							obsessive-compulsive disorder, and post-traumatic stress disorder are some of the most common mental health issues.
						</p>
						<p>
							There are several reasons of mental health problems, and they differ from individual to person. Factors such as genetics,
							environment, and lifestyle can all play a role in the development of a mental health issue.
						</p>
						<p>
							There are several reasons of mental health problems, and they differ from individual to person. Factors such as genetics,
							environment, and lifestyle can all play a role in the development of a mental health issue.
						</p>
						<p>
							It is critical to recognize that mental health issues are real, diagnosable illnesses that must be addressed seriously.
							Untreated mental health disorders can have serious implications, including substance abuse, interpersonal troubles, and
							even suicide.
						</p>
					</div>
				</div>
			</div>

			<div class="h1 fw-bold text-center mt-5">Do's and Dont’s to keep in mind when it comes to mental health</div>
			<div class="container">
				<div class="h1 fw-bold text-start mt-5 do">Do's</div>

				<!-- <div class="container-fluid">
					<div class="row">
						<div class="col-9 mx-auto">
							<div class="row-6">
								<div class="col-6 mt-2 mx-auto">
									<p>
										Seek professional help if you are struggling with your mental health. There is no shame in asking for help,
										and there are many resources available to you.
									</p>
								</div>
								<div class="col-6">
									<img src="{{ asset('/img/') }}" alt="" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Take care of your physical health by getting enough sleep, eating a healthy diet, and exercising regularly.
										Physical and mental health are closely linked, and taking care of your body can help improve your mental
										health.
									</p>
								</div>
								<div class="col-6">
									<img src="{{ asset('/img/') }}" alt="" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Practice self-care activities, such as taking a relaxing bath, reading a book, or doing yoga. These activities
										can help you relax and reduce stress.
									</p>
								</div>
								<div class="col-6">
									<img src="{{ asset('/img/') }}" alt="" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Connect with others, whether it's through socializing with friends or family, joining a support group, or
										seeking therapy. Having a support system can make a big difference in your mental health.
									</p>
								</div>
								<div class="col-6">
									<img src="{{ asset('/img/') }}" alt="" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Learn coping skills, such as mindfulness or deep breathing exercises, to help you manage stress and anxiety.
									</p>
								</div>
								<div class="col-6">
									<img src="{{ asset('/img/') }}" alt="" />
								</div>
							</div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
							<div class="row"></div>
						</div>
					</div>
				</div> -->

				<div class="container-fluid">
					<div class="row">
						<div class="col-9 mx-auto">
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/checked.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-2 mx-auto">
									<p>
										Seek professional help if you are struggling with your mental health. There is no shame in asking for help,
										and there are many resources available to you.
									</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto mt-3">
									<img src="{{ asset('/img/checked.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Take care of your physical health by getting enough sleep, eating a healthy diet, and exercising regularly.
										Physical and mental health are closely linked, and taking care of your body can help improve your mental
										health.
									</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/checked.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Practice self-care activities, such as taking a relaxing bath, reading a book, or doing yoga. These activities
										can help you relax and reduce stress.
									</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto mt-3">
									<img src="{{ asset('/img/checked.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Connect with others, whether it's through socializing with friends or family, joining a support group, or
										seeking therapy. Having a support system can make a big difference in your mental health.
									</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/checked.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Learn coping skills, such as mindfulness or deep breathing exercises, to help you manage stress and anxiety.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="h1 fw-bold text-start mt-5 do">Dont's</div>

				<div class="container-fluid">
					<div class="row">
						<div class="col-9 mx-auto">
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/stop.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-2 mx-auto">
									<p>Don't ignore your mental health. It's important to take care of yourself both physically and mentally.</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/stop.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>Don't self-medicate with drugs or alcohol. This can make your mental health worse and lead to addiction.</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/stop.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>Don't isolate yourself. It's important to connect with others and have a support system.</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/stop.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Don't compare yourself to others. Everyone's journey is different, and it's important to focus on your own
										progress and growth.
									</p>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-2 mx-auto">
									<img src="{{ asset('/img/stop.png') }}" alt="" class="image" />
								</div>
								<div class="col-6 mt-3 mx-auto">
									<p>
										Don't hesitate to seek help if you need it. There is no shame in asking for help, and there are many resources
										available to you.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<div id="footer" class="container-fluid pt-5 text-center text">
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
</html>
