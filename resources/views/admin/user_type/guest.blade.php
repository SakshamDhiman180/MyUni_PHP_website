@extends('admin.app')

@section('guest')
    @if(\Request::is('forgot-password')) 
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    @include('admin.layouts.navbars.guest.nav')
                </div>
            </div>
        </div>
        @yield('content')        
        @include('admin.layouts.footers.guest.footer')
    @else
        @include('admin.layouts.navbars.guest.nav')
        @yield('content')
        @include('admin.layouts.footers.guest.footer')
    @endif
@endsection