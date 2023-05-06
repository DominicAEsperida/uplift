<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
        <div class="hero vh-100 px-5 pt-3">
            <nav class="navbar navbar-expand-md">
                <div class="container-fluid">
                    
                    <!-- Logo -->
                    <a class="navbar-brand ms-5" href="{{ url('/') }}">
                        <img id="word_logo" src="{{asset('/img/word_logo.png')}}" alt="word_logo" style="height: 50px; width: 100px;">
                    </a>

                    <!-- Middle part -->
                    <div class="navbar-nav gap-5 text-uppercase fw-bold mx-auto">
                        <ul class="navbar-nav ms-auto gap-4">
                            <li class="nav-item "><a href="/" class="nav-link {{request()->is('/') ? 'active' : ''}}">Home</a></li>
                            <li class="nav-item "><a href="/contact-us" class="nav-link {{request()->is('/contact-us') ? 'active' : ''}}">Contact Us</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
                                    Articles
                                </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/videos" class="dropdown-item text-center nav-link {{request()->is('videos') ? 'active' : ''}}">Videos</a></li>
                                        <hr>
                                        <li><a href="/texts" class="dropdown-item text-center nav-link {{request()->is('texts') ? 'active' : ''}}">Texts</a></li>
                                    </ul>
                            </li>
                            <li class="nav-item "><a href="/forums" class="nav-link {{request()->is('forums') ? 'active' : ''}}">Forums</a></li>
                        </ul>
                    </div>

                    <!-- Right part -->
                    <ul class="navbar-nav gap-1 me-5">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#login_modal" href="{{ route('login') }}">{{ __('Login') }} </a>
                                </li>

                                <!-- Login Modal -->
                                <div class="modal fade" id="login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                        <div class="col-md-8 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Login') }}
                                                            </button>

                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Your Password?') }}
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
                                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#register_modal" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>

                                <!-- Register Modal -->
                                <div class="modal fade" id="register_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                        <div class="col-md-5 offset-md-5">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Register') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>

            
            <!-- form -->
            <div class="container">
                <div class="h1 fw-bold text-center mt-5">Talk to Us</div>
                <div class="h6 text-center mt-2">Just let it all out, we’ll listen to you</div>
                <div class="row">

                    <div class="col-10 offset-1 mt-4">
                        <div class="card bg-transparent">
                            
                            <div id="contact_card" class="card-body">
        
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                            
                                <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                                    {{ csrf_field() }}
                                    
                                    <div class="row mt-2 mb-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong class="ms-3">Name:</strong>
                                                <input type="text" name="name" class="form-control" placeholder="Please Enter Your Name" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong class="ms-3">Email:</strong>
                                                <input type="text" name="email" class="form-control" placeholder="Please Enter Your Email" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong class="ms-3">Phone:</strong>
                                                <input type="text" name="phone" class="form-control" placeholder="Please Enter Your Phone Number" value="{{ old('phone') }}">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <strong class="ms-3">Subject:</strong>
                                                <input type="text" name="subject" class="form-control" placeholder="Please Enter The Subject" value="{{ old('subject') }}">
                                                @if ($errors->has('subject'))
                                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <strong class="ms-3">Message:</strong>
                                                <textarea id="textarea" name="message" rows="3" placeholder="Tell me, I'll listen" class="form-control">{{ old('message') }}</textarea>
                                                @if ($errors->has('message'))
                                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                                @endif
                                            </div>  
                                        </div>
                                    </div>
                            
                                    <div class="form-group text-center mt-5">
                                        <button class="buttons pe-5 ps-5 pt-2 pb-2 rounded-pill ">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Footer -->
       <div id="footer" class="container-fluid pt-5 text-center ">
            <div class="pb-5"><img id="pic_logo" src="{{asset('/img/pic_logo.png')}}" alt="some"></div>
            <p class="fs-5 text-light-emphasis">
                Don’t be afraid to let go of your emotions
            </p>
            <p class="fs-6 text-light-emphasis">
                You can also find us here
            </p>
            <div class="pt-3 pb-3 ">
                <img src="{{asset('/img/fb.png')}}" alt="">
                <img src="{{asset('/img/twit.png')}}" alt="">
                <img src="{{asset('/img/instagram.png')}}" style="width: 48px; height: 48px;"  alt="">
            </div>
        </div>     
</body>
</html>