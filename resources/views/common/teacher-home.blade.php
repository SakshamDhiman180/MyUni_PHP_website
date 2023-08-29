@extends('common.layouts.app',
[
'page' => __('Home'),
'homeFor' => config('constants.userType.teacher')
])


@section('header_content')
<div class="page-header above_the_fold d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-md-12">
                <h1 class="mb-3 mt-0  mt-lg-5 mt-md-5 pt-0 pt-lg-0 pt-md-5">We make it easy to receive gifts
                    for you & your classroom</h1>
                <h4 class="mb-1">Teachers can receive gifts from families<br />
                    with simplicity and ease.
                </h4>
                <div class="buttons mb-4 mb-lg-5">
                    <a class="btn btn-primary mt-3 mt-lg-4  mt-sm-3 mx-2" href="{{ route('common.signup') }}">Admission Form 2023<svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 32 32">
                            <g fill="none" stroke="#2175FF" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                            </g>
                        </svg></a>
                </div>
                <a href="#brand-video" class="d-flex align-items-center video-play-link">
                    <div class="video-play-button">
                        <span></span>
                    </div>
                    <span>Watch the video</span>
                </a>
            </div>
            <div class="col-lg-5 col-md-12">
                <img src="{{ asset('assets/img/teacher-image-card.png') }}" class="w-100" alt="">
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- -------- CREATE ACCOUNT------- -->
<section id="create-account" class="container create_account padding-tb pb-5">
    <div class="row">
        <div class="col-md-12 d-flex align-items-center flex-wrap flex-lg-nowrap">
            <div class="create_account_bg">
                <img class="w-100 d-block" src="{{ asset('assets/img/teacher-parent-meeting.jpg') }}" alt="Teacher Parent Meeting">
                <img src="{{ asset('assets/img/giving-is-elementary.svg') }}" class="mt-4 giving-logo" class="d-block" alt="">
            </div>
            <div class="card border-0 d-flex justify-content-center">
                <h2 class="mb-2">Admission Form 2023</h2>
                <h4 class="">Help families give to you<Br />
                    and your classroom.</h4>
                <div class="buttons">
                    <a class="btn btn-primary mt-4" href="{{ route('common.signup') }}">Admission Form 2023<svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 32 32">
                            <g fill="none" stroke="#2175FF" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                                <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                                <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                            </g>
                        </svg></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- -------- HOW IT WORKS ------- -->
<section id="how-works" class="padding-tb how-it-works pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mx-auto text-center pb-0 pb-lg-4">
                <h2 class="mb-2">How it works</h2>
                <h4>Find your child's teacher and see classroom needs.</h4>
            </div>
        </div>
        <div class="row dot-curve-bg">
            <div class="col-lg-4 col-md-12">
                <div class="px-2 text-center">
                    <img src="{{ asset('assets/img/work-step-1.png') }}" class="mb-0 mb-lg-4 py-0" alt="how it works">
                    <h3 class=" mb-0 mb-lg-2 text-dark">Step 1</h3>
                    <h5 class="mb-4">Admission Form 2023</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="px-2 text-center">
                    <img src="{{ asset('assets/img/work-step-2-1.png') }}" class="mb-0 mb-lg-4 py-0" alt="how it works">
                    <h3 class=" mb-0 mb-lg-2 text-dark">Step 2</h3>
                    <h5 class="mb-4">BlessATeacher.com will make
                        it easy for families to give to you
                        or your classroom.</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="px-2 text-center ">
                    <img src="{{ asset('assets/img/work-step-3-1.png') }}" class="mb-0 mb-lg-4 py-0" alt="how it works">
                    <h3 class=" mb-0 mb-lg-2 text-dark">Step 3</h3>
                    <h5 class="mb-4">Receive the balance in
                        your account and use it for
                        classroom needs, as well as get
                        something for you.</h5>
                </div>
            </div>
            <div class="col-lg-12 d-flex justify-content-center">
                <a class="btn btn-primary mt-0 mt-lg-4 mx-2" href="{{ route('common.signup') }}">Admission Form 2023<svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 32 32">
                        <g fill="none" stroke="#2175FF" stroke-width="1.5" stroke-linejoin="round" stroke-miterlimit="10">
                            <circle class="arrow-icon--circle" cx="16" cy="16" r="15.12"></circle>
                            <path class="arrow-icon--arrow" d="M16.14 9.93L22.21 16l-6.07 6.07M8.23 16h13.98"></path>
                        </g>
                    </svg></a>
            </div>
            <div class="col-md-12">
                <img src="{{ asset('assets/img/shapes-pattern-b-2.png') }}" class="shadow-none pattern-img" alt="">
            </div>
        </div>
    </div>
</section>

<div class="container_900 m-auto">
    <hr class="my-0 d-none mb-5 d-lg-block">
</div>

@endsection