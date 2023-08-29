@extends('admin.app')

@section('auth')
    @include('admin/layouts/navbars/auth/sidebar')
    <main class="main-content max-height-vh-100 h-100 {{ (Request::is('ecommerce-products-new-product')||$childFolder == 'profile' ? 'position-relative bg-gray-100' : (Request::is('pages-rtl') ? 'position-relative border-radius-lg overflow-hidden' : 'position-relative border-radius-lg')) }}">

        @include('admin/layouts/navbars/auth/nav')

        <div class="container-fluid py-4">
            @yield('content')
            @include('admin/layouts/footers/auth/footer')
        </div>

    </main>
@endsection