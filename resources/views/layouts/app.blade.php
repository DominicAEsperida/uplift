<!doctype html>
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
    <div id="app">
        <!-- Hero -->
        <div class="hero vh-100 position-relative" style="overflow:hidden ">
            
            <nav class="navbar navbar-expand-md ">
                <div class="container-fluid" >
                    
                    <!-- Logo -->
                    <a class="navbar-brand ms-5" href="{{ url('/') }}">
                        <img id="word_logo" class="ms-5" src="{{asset('/img/word_logo.png')}}" alt="word_logo" style="height: 50px; width: 100px;">
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

            <!-- content -->
            <div class="d-flex align-items-center" style="height: 90%;">
            
              <div class="container-fluid " >
                <div class="row">
                        <div id="home_btn" class="col">
                        <a href="/contact-us"><button id="btn_effect" class="buttons pe-5 ps-5 pt-2 pb-2 rounded-pill ">Talk to Us</button></a>
                            
                        </div>
                        
                        <div class="col">
                            <p id="home_text" class="fs-5 mt-auto mb-auto ms-5 px-5 ">
                                Welcome to Uplift, the revolutionary website application designed to provide invaluable support to individuals struggling with mental health issues. 
                                With Uplift, users can connect with qualified experts, educate themselves on healthy coping strategies, and access helpful resources - all in a safe, anonymous space. 
                                Our mission is to reduce the stigma associated with mental health and to empower individuals to take control of their own mental health and well-being. 
                                No one should have to go through their mental health journey alone, so we are here to provide support, resources, and a sense of community. 
                                Join us today and start your mental health journey.
                            </p>
                        </div>
                </div>
              </div>
            </div>
            
            <!-- bckgrnd carousel -->
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade vignette position-absolute" data-bs-ride="carousel" style="z-index: -1000;" >
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="{{asset('/img/home_slide1.jpg')}}" class="d-block w-100 carousel_img" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('/img/home_slide2.jpg')}}" class="d-block w-100 carousel_img" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="{{asset('/img/home_slide3.jpg')}}" class="d-block w-100 carousel_img" alt="...">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <main>
            @yield('content')
        </main> -->
    </div>

    <!-- Testimonials -->
    <div class="container-fluid mt-5 ">
        <h2 class="text-center mb-5 fw-semibold">Testimonials</h2>

            <div id="myCarousel" class="carousel slide carousel-dark carousel-fade mb-5">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex justify-content-center mb-4 "><img src="{{asset('/img/testimonial1.jpg')}}" class="d-block t_carousel_img rounded-circle shadow" alt="..."></div>
                        <div class="col-md-6 mx-auto">
                            <div class="row mx-auto fs-3 d-flex justify-content-center mb-3 text-decoration-underline fw-medium">Luna Lefrey</div>
                            <div class="row mx-auto testimonial_content ">
                                "I was struggling with depression and anxiety for a long time and wasn't sure where to turn for help. 
                                I found Uplift and was immediately impressed by the level of care and support they provided. 
                                I was able to access online counseling services and connect with others who were going through similar issues. 
                                Uplift has helped me to take control of my mental health and I'm so thankful for the support they've given me.
                                Thanks to Uplift, I've been able to make significant progress in my mental health journey. 
                                I'm now much more confident, resilient, and better equipped to handle life's challenges. 
                                If you're struggling with your mental health, I highly recommend giving this service a try." 
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center mb-4"><img src="{{asset('/img/testimonial2.jpg')}}" class="d-block t_carousel_img rounded-circle shadow" alt="..."></div>
                        <div class="col-md-6 mx-auto">
                            <div class="row mx-auto fs-3 d-flex justify-content-center mb-3 text-decoration-underline fw-medium">DeShaun Marley</div>
                            <div class="row mx-auto testimonial_content">
                                "I cannot express enough gratitude for the life-changing experience I had with Uplift. 
                                The team was incredibly understanding, empathetic, and provided me with the tools and support I needed to overcome my struggles. 
                                From the moment I reached out for help, I felt like I was in good hands. 
                                The therapists were knowledgeable and professional, and their approach was personalized to my needs. 
                                They were patient, compassionate, and truly listened to what I had to say. 
                                With their guidance, I was able to develop coping strategies and gain a better understanding of myself. 
                                I now feel more empowered, confident, and in control of my life. 
                                I highly recommend Uplift to anyone who is struggling and looking for support."
                            </div>
                        </div>
                    </div>
                        
                    <div class="carousel-item">
                        <div class="d-flex justify-content-center mb-4"><img src="{{asset('/img/testimonial3.jpg')}}" class="d-block t_carousel_img rounded-circle shadow" alt="..."></div>
                        <div class="col-md-6 mx-auto">
                            <div class="row mx-auto fs-3 d-flex justify-content-center mb-3 text-decoration-underline fw-medium">Halsey Lee</div>
                            <div class="row mx-auto testimonial_content">
                            "I was hesitant to seek help for my mental health issues, but I'm so glad I did. The mental wellness service I used was outstanding. 
                            The therapists were incredibly supportive, and they provided a safe and non-judgmental space for me to open up about my struggles. 
                            They gave me practical tools and strategies that I could use in my daily life to manage my anxiety and depression. 
                            The service was flexible, and I was able to schedule sessions at times that were convenient for me. 
                            The therapists were responsive and available whenever I needed them. With their help, I was able to make significant progress in my mental health journey. 
                            I'm now in a much better place, and I have the mental wellness service to thank for it. I would highly recommend them to anyone who needs support with their mental health."
                            </div>
                        </div>
                    </div>
                        
                </div>

                <button class="carousel-control-prev ms-5" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next me-5" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon " aria-hidden="true"></span>
                    <span class="visually-hidden ">Next</span>
                </button>
            </div>
            
    </div>

    <hr>
    <!-- FERRER -->
    <!-- About Us -->
    <div class="container-fluid">
        <div class="col-12 mx-auto abt-us">
            <h2 class="text-center fw-semibold my-5">About Us</h2>
            <div class="container-fluid about">
                <img src="{{asset('/img/pexels-fauxels-3228685.jpg')}}" class="d-block about-img" alt="about us">
                    <div class="center-right me-5 mt-5">
                        <h2 class="text-center ">JOURNEY TO BETTER</h2>
                        <h2 class="text-center ">MENTAL HEALTH</h2>
                        <p class="fs-5 mt-5">
                            We confidently believe that everyone has the right to prioritize their 
                            mental health and to have access to the resources and support required 
                            to help them lead a healthier and more fulfilling life. Uplift provides
                            a safe, secure and confidential space for individuals to seek support from 
                            mental health professionals and to connect with other individuals who are going 
                            through similar experiences.
                        </p>
                    </div>
            </div>
            <div class="mx-5 px-5">
                <p class="text-center fw-semibold fs-4 mx-5 px-5 mb-4">
                    We strive to empower individuals to take control of their mental health
                    and well-being by providing user-friendly tools and resources to reduce
                    the stigma associated with mental health and help people lead happier
                    and healthier lives.
                </p>
            </div>
            
                
            <!-- Benefits of Using UpLift -->
            <div class="benefits">
                <hr class="border border-dark border-2">
                <div class="container-fluid wrapper">
                    <img src="{{asset('/img/stigma.png')}}" class="d-block ebnft-img mt-5" alt="bnft">
                    <div class="end">
                        <h4 class="text-start fs-1 fw-bold mb-4">Reduce Stigma</h4>
                            <p class="fs-4">
                                One mission of Uplift is to reduce the stigma associated with 
                                mental health issues. This can involve promoting awareness and 
                                education about mental health, challenging negative stereotypes 
                                and beliefs, and creating a supportive and accepting environment 
                                for those who struggle with mental health issues.
                            </p>
                    </div>
                </div>
                <hr class="border border-dark border-2">
                <div class="container-fluid wrapper">
                    <img src="{{asset('/img/punch.png')}}" class="d-block sbnft-img mt-5" alt="bnft">
                    <div class="start">
                        <h4 class="text-start fs-1 fw-bold mb-4">Empowerment</h4>
                            <p class="fs-4">
                                Another mission is to empower individuals to take control of their 
                                own mental health and well-being. This can involve providing education 
                                and resources on self-care and coping strategies, as well as offering 
                                tools and support to help individuals manage their mental health concerns.
                            </p>
                    </div>
                </div>
                <hr class="border border-dark border-2">
                <div class="container-fluid wrapper">
                    <img src="{{asset('/img/accesibility.png')}}" class="d-block ebnft-img mt-5" alt="bnft">
                    <div class="end">
                        <h4 class="text-start fs-1 fw-bold mb-4">Accessibility</h4>
                            <p class="fs-4">
                                Uplift aims to make mental health support more accessible by providing 
                                a user-friendly platform that can be easily accessed by anyone with an 
                                internet connection. This involves creating an online community that is 
                                supportive, non-judgmental, and easy to navigate, and providing resources 
                                that are tailored to the needs of different individuals.
                            </p>
                    </div>
                </div>
                <hr class="border border-dark border-2">
                <div class="container-fluid wrapper">
                    <img src="{{asset('/img/life.png')}}" class="d-block sbnft-img mt-5 lst_img" alt="bnft">
                    <div class="start">
                        <h4 class="text-start fs-1 fw-bold mb-4">Healthier Lives</h4>
                            <p class="fs-4">
                                Ultimately, Uplift aims to provide the tools and resources that can help 
                                people lead happier and healthier lives: This involves promoting positive 
                                mental health and well-being, as well as addressing mental health issues 
                                in a way that is effective and supportive. By helping individuals to achieve 
                                better mental health, Uplift is working to improve overall quality of life for everyone.
                            </p>
                    </div>
                </div>
                <hr class="border border-dark border-2">
            </div>

            <!-- The Team -->
                <h1 class="text-center fw-semibold my-5">The Team</h1>
                <div class="container px-4 text-center">
                    <div class="row gx-5 th-tm">
                        <div class="col">
                            <div class="p-3">
                                <img src="{{asset('/img/Alden.jpg')}}" class="d-block tt-img rounded-circle shadow" alt="Alden">
                                    <div class="mmb">
                                        <h4 class="fs-4 fw-semibold">Mark Niño Joseph A. Alden</h4>
                                    </div>
                                        <div class="sph">
                                            <p class="fs-5">
                                                Here in uplift, we strive to create a significant impact 
                                                on people's lives. I'm sure that by lowering the 
                                                stigma attached to mental illness and giving people the 
                                                assistance they need to take charge of their own well-being, 
                                                our platform will contribute to a reduction in this stigma. 
                                                For people who require mental health support, Uplift offers 
                                                a priceless service. I am honored to be working on a team to 
                                                develop a platform that empowers users to take charge of their 
                                                own mental health and wellbeing. To help individuals live happier 
                                                and healthier lives, we are dedicated to provide the skills and 
                                                resources they require.
                                            </p>
                                        </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <img src="{{asset('/img/Esperida.jpg')}}" class="d-block tt-img rounded-circle shadow" alt="Esperida">
                                    <div class="mmb">
                                        <h4 class="fs-4 fw-semibold">Emmanuel Dominic A. Esperida</h4>
                                    </div>
                                        <div class="sph">
                                            <p class="fs-5">
                                                Uplift is a great way to help people take the first step towards 
                                                getting the help they need. I'm proud of the work we do to provide 
                                                the tools and resources that can help people lead happier and 
                                                healthier lives. With Uplift, we are helping to create a safe space 
                                                for people to openly ask for help and get the support they need. 
                                                I'm passionate about our mission and am confident that we will continue 
                                                to make a positive impact in the lives of those seeking mental health support.
                                            </p>
                                        </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-3">
                                <img src="{{asset('/img/Ferrer.jpg')}}" class="d-block tt-img rounded-circle shadow" alt="Ferrer">
                                    <div class="mmb">
                                        <h4 class="fs-4 fw-semibold">Blademhir U. Ferrer</h4>
                                    </div>
                                        <div class="sph">
                                            <p class="fs-5">
                                                I'm proud to be a part of the Uplift team and to have the 
                                                chance to be a part of the effort to reduce the stigma surrounding 
                                                mental health. With our user-friendly platform, I'm confident that 
                                                we can make it easier for anyone with an internet connection to access 
                                                the support they need and take control of their mental health and 
                                                well-being. Through Uplift, we strive to create a community of support 
                                                and understanding and provide resources to help people in their journey 
                                                towards better mental health. I'm excited to be a part of the team that 
                                                is making a difference in the lives of those seeking help.
                                            </p>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- FERRER -->

    <!-- Footer -->
    <div id="footer" class="container-fluid pt-5 text-center ">
            <div class="pb-5"><img id="pic_logo" src="{{asset('/img/pic_logo.png')}}" alt="some"></div>
            <p class="fs-5 ">
                Don’t be afraid to let go of your emotions
            </p>
            <p class="fs-6 text-light-emphasis">
                You can also find us here
            </p>
            <div class="pt-3 pb-3 ">
                <img src="{{asset('/img/fb.png')}}" alt="">
                <img src="{{asset('/img/twit.png')}}" alt="">
                <img src="{{asset('/img/instagram.png')}}" style="width: 48px; height: 48px;"  alt="">

                <p class="mb-4 mt-4">
                    © 2023 Uplift, Inc. All Rights Reserved
                </p>
            </div>
            
    </div>   
</body>
@yield('javascript')
</html>
