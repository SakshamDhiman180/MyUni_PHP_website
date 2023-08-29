<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.4
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-dashboard-pro
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('assets/admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ URL::asset('assets/admin/img/favicon.png') }}">
  <title>{{ config('app.name') }}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ URL::asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ URL::asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ URL::asset('assets/admin/css/soft-ui-dashboard.css?v=1.0.4') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ URL::asset('assets/admin/css/main.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('pages-rtl') ? 'rtl' : (Request::is('dashboard-virtual-default')||Request::is('dashboard-virtual-info') ? 'virtual-reality' : (Request::is('authentication-error404')||Request::is('authentication-error500') ? 'error-page' : ''))) }}">
  @auth
    @yield('auth')
  @endauth
  @guest
    @yield('guest')
  @endguest

  <!--   Core JS Files   -->
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/admin/js/core/popper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ URL::asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>

  <!-- Kanban scripts -->
  <script src="{{ URL::asset('assets/admin/js/plugins/dragula/dragula.min.js') }}"></script>
  <script src="{{ URL::asset('assets/admin/js/plugins/jkanban/jkanban.js') }}"></script>
  @stack('js')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ URL::asset('assets/admin/js/soft-ui-dashboard.min.js?v=1.0.4') }}"></script>
</body>

</html>
