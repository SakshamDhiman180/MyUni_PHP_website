@extends('admin.user_type.guest', ['parentFolder' => 'pages', 'childFolder' => 'resetPasswprd'])

@section('content')
    <main class="main-content main-content-bg mt-0">
        <section>
            <div class="page-header section-height-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-12 px-5 d-flex flex-column">
                            <div class="card card-plain mt-8">
                                @if($errors->any())
                                    <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                        <span class="alert-text text-white">
                                        {{$errors->first()}}</span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                            <i class="fa fa-close" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                @endif
                                @if(session('success'))
                                <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                                    <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <i class="fa fa-close" aria-hidden="true"></i>
                                    </button>
                                </div>
                                @endif
                                <div class="card-header pb-0 text-left">
                                    <h3 class="text-info text-gradient">Reset Password</h3>
                                    <p class="mb-0">You will receive an e-mail in maximum 60 seconds</p>
                                </div>
                                <div class="card-body pb-3">
                                    <form action="{{ route('password.update') }}" method="POST" role="form text-left">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div>
                                            <label>Email</label>
                                            <div class=" mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            </div>
                                        </div>
                                        <div>
                                            <label>{{ __('Password') }}</label>
                                            <div class=" mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div>
                                            <label>{{ __('Confirm Password') }}</label>
                                            <div class=" mb-3">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ asset("assets/admin/img/curved-images/curved6.jpg") }}')"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
