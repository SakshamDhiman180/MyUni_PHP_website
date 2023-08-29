@extends('common.layouts.app', [
    'page' => __('Colleges'),
    'homeFor' => config('constants.userType.parent'),
])

@section('header_content')
<div class="main-header clearfix" role="header">
    <div class="logo">
        <a href="{{ route('home') }}"  style="text-decoration: none;"><em>My</em>Uni</a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
        <ul class="main-menu">
            <li><a href="{{ route('common.colleges') }}">Colleges</a></li>
            <li><a href="{{ route('common.courses') }}">Courses</a></li>
            <li><a href="{{ route('common.exams')}}">Entrance Exams</a></li>
            <li> <a href="{{ route('common.signup') }}">Admission Form 2023</a></li>
            <li> <a href="{{ route('common.signin') }}">Login</a></li>
        </ul>
    </nav>
</div>
@endsection
@section('content')
    <section class="section main-banner" id="top" data-section="section1">
        <img src="{{ asset('assets/img/college-0' . $collegeData->id . '.jpg') }}" id="bg-video" alt="">

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>{{ $collegeData->city }}</h6>
                <h2><em>{{ $collegeData->name }}</em></h2>
                <div class="main-button">
                    <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>About College</h2>
                    </div>
                </div>
                <h6 style="color:white; margin-bottom:40px; ">{{ $collegeData->description }}</h6>

                <hr style="color:white; height: 10px;">

                <div class="d-flex">
                    <div style="width: 50%">
                        <h6 style="color:white">
                            <span style="color:#f5a425">Streams We offer:- </span>
                            @foreach (json_decode($collegeData->streams) as $stream)
                                {{ $stream }},
                            @endforeach
                            etc
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Address:- </span>
                            {{ $collegeData->address }}, {{ $collegeData->state }}, {{ $collegeData->city }},
                            {{ $collegeData->zip }}
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Contact no:- </span>
                            {{ $collegeData->contact_number }}
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Email:- </span>
                            {{ $collegeData->email }}
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Principal's Name:- </span>
                            {{ $collegeData->principal_name }}
                        </h6>
                    </div>
                    <div style="width: 50%">
                        <form>
                            <h4 style="margin-left:10px; color:#f5a425;">Drop Your email and our Admission cell will contact
                                you</h4>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email"
                                    aria-describedby="emailHelp">
                                    <br>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <button
                                style="font-size: 16px; padding: 10px; width: 100px;"
                                type="submit" class="btn btn-outline">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection
