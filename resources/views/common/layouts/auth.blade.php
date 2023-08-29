<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        {{ env('APP_NAME', 'Bless a Teacher')  }} - {{ $page??'' }}
    </title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <body>
        <div class="auth-page" >
            <!-- -------- START HEADER 3 w/ image on background ------- -->
            <header>
                <nav id="navbar_top" class="w-100 navbar navbar-expand-lg navbar-light navbar-absolute py-0">
                    <div class="container brand_navbar py-2">
                        <a class="navbar-brand py-2" href="{{ route('home')  }}" rel="tooltip" title="" data-placement="bottom" target="_blank">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="nav navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link btn-outline" href="{{ route('home')  }}">Go to Home
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- -------- END HEADER------- -->

            @include('common.layouts.flash-message')
            @yield('content')

            <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
            <footer class="footer position-relative ">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="">
                                    Copyright ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> MyUni inc. All
                                    Rights Reserved.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
        </div>
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