<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        {{ env('APP_NAME', 'Bless a Teacher') }} - {{ $page ?? '' }}
    </title>
    <!-- CSS Files -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
        rel="stylesheet">

    <title>Grad School HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-grad-school.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link id="" href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
</head>

<body>

    <body>
        <!-- -------- START HEADER 3 w/ image on background ------- -->
        <header>
            <nav id="navbar_top"
                class="position-absolute top-0 w-100 navbar navbar-expand-lg navbar-light navbar-absolute py-0"
                style="background: #171c40;">
                <div class="container brand_navbar">
                    <a class="navbar-brand py-2" href="{{ route('home') }}" rel="tooltip" title=""
                        data-placement="bottom" style="text-decoration: none;">
                        <b><em style="color:#f58a25">My</em>Uni</b>
                    </a>
                    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        @if (Auth::guard('web')->check())
                            <ul class="nav navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link btn-secondary" href="{{ route('dashboard') }}">Back to
                                        Dashboard</a>
                                </li>
                            </ul>
                        @elseif (Auth::guard('parents')->check())
                            <ul class="nav navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link btn-secondary" href="{{ route('parent.dashboard') }}">Back to
                                        Dashboard</a>
                                </li>
                            </ul>
                        @else
                            <ul class="navbar-nav ms-auto me-3">
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ route('common.colleges') }}">Colleges</a>
                                </li>
                                <li class="nav-item mx-4"><a class="nav-link"
                                        href="{{ route('common.courses') }}">Courses</a>
                                    </li>
                                    <li class="nav-item mx-4"><a class="nav-link" href="{{ route('common.exams')}}">Entrance Exams</a></li>
                                <li class="nav-item mx-3">
                                    <a class="nav-link" href="{{ route('common.signup') }}">
                                        Admission Form 2023
                                    </a>
                                </li>
                                <li class="nav-item mx-4">
                                    <a class="nav-link" href="{{ route('common.signin') }}">
                                        Login
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    @if (($homeFor ?? '') == config('constants.userType.teacher'))
                                        <a class="nav-link btn-secondary" href="{{ route('home') }}">
                                            <img src="{{ asset('assets/img/icons/parent-user.png') }}" class="me-3"
                                                alt=""> Home
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </nav>
            @yield('header_content')
        </header>
        <!-- -------- END HEADER------- -->

        @include('common.layouts.flash-message')
        @yield('content')

        <!-- -------- START FOOTER --------->
        {{-- <div class="highlight-feature">
            <div class="container">
                <div class="card z-index-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div class="">
                                <h2 class="mb-2">Giving is Elementary</h2>
                                <p class="opacity-8 mb-0 pe-0 pe-lg-5">
                                    We help families and teachers connect on a deeper level.
                                </p>
                            </div>
                            <a class="btn btn-primary mt-3 mt-lg-0" href="{{ route('common.signup') }}">Get Started<svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 32 32">
                                    <g fill="none" stroke="#2175FF" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                        <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                        <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                                    </g>
                                </svg></a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p><i class="fa fa-copyright"></i> Copyright 2020 by MyUni</p>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</body>
<script src="{{ asset('assets/js/core/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@stack('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>

</html>
