@extends('common.layouts.auth', [
    'page' => __('Signup'),
])
@section('content')
    <!-- -------- CREATE Register------- -->
    <section class="padding-tb pt-0 pt-lg-5 pt-md-4 mt-3 ">
        <div class="container " style="background-image: url({{asset('assets/img/choosing-bg.jpg')}});  border-radius: 10px;">
            <div class="row">
                <div class="col-xl-7 col-lg-8 col-md-12 d-flex  mx-auto">
                    <div class="card bg-transparent border-0 w-100 p-4">
                        <div class="card-header text-center bg-transparent border-0">
                            <h2 class="mb-2" style="color: white">Admission Form 20{{date('y')}}</h2>
                            <p class="mb-3"style="color: white">Enter your valid details
                            </p>
                        </div>
                        <div class="card-body form-body p-0">
                            <form method="POST" action="{{ route('common.signup.submit') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                <div class="form-group-wrapper">
                                    <x-form.input type="text" labelname="First Name" value="{{ old('first_name') }}"
                                        placeholder="First Name" attribute="first_name" required="true" />
                                    <x-form.input type="text" labelname="Last Name" value="{{ old('last_name') }}"
                                        placeholder="Last Name" attribute="last_name" required="true" />

                                    <div class="form-group" hidden>
                                        <x-form.radio-user-type class="users-type users-type-2" hidden/>
                                    </div>

                                    <x-form.input type="email" labelname="Email" value="{{ old('email') }}"
                                        placeholder="Email" attribute="email" required="true" />


                                    <x-form.select label="Cource" attribute="cource_id" class="form-group" required>
                                        <option value="">Select the course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == ($parent->country_id ?? 0) ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </x-form.select>

                                    <x-form.dependent-option />

                                    {{-- <x-form.input type="password" labelname="Password" placeholder="Password"
                                        attribute="password" required="true" /> --}}

                                    <x-form.agree-term-condition />

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-1 mt-lg-2 px-5 w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-4 bg-transparent border-0">
                            <p class="mb-4 mx-auto">
                                Already have an account?
                                <a href="{{ route('common.signin') }}">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
