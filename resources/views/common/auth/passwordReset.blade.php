@extends('common.layouts.auth', [
    'page' => __('Reset Password'),
])
@section('content')
    <section class="padding-tb pt-0 pt-lg-5 pt-md-4 mt-4 ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-12 d-flex  mx-auto">
                    <div class="card bg-transparent border-0 w-100 ">
                        <div class="card-header text-center bg-transparent border-0">
                            <h2 class="mb-2" style="color: white" >Reset Password</h2>
                        </div>
                        <div class="card-body form-body p-0">
                            <form method="POST" action="{{ route('common.setpassword') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="form-group-wrapper">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    
                                    <x-common.input type="hidden" attribute="email" value="{{ $userEmail ?? old('email') }}" />

                                    <x-form.input type="password" attribute="password" placeholder="Password"
                                        labelname="Password" required />

                                    <x-form.input type="password" attribute="password_confirmation"
                                        labelname="Confirm Password" placeholder="Confirm Password" required />

                                    <div class="text-center">
                                        <x-form.submit-button class="btn btn-primary mt-1 mt-lg-2 px-5 w-100"
                                            text="{{ __('Reset Password') }}" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-4 bg-transparent border-0">
                            <p class="mb-4 mx-auto">
                                <a href="{{ route('common.signin') }}">Back to Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
