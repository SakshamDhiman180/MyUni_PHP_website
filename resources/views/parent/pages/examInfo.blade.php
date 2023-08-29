@extends('parent.layouts.app', [
    'page' => __('courseInfo'),
    'active' => 'courses',
])

@section('content')
<link id="pagestyle" href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <section class="section main-banner" id="top" data-section="section1">
        <img src="{{ asset('assets/img/exam_banner-01.jpg') }}" id="bg-video" alt="">

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>{{$ExamInfo->code}}</h6>
                <h2><em>{{$ExamInfo->name}}</em></h2>
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
                        <h2>About Course</h2>
                    </div>
                </div>
                <h6 style="color:white; margin-bottom:40px; ">{{ $ExamInfo->description }}</h6>

                <hr style="color:white; height: 10px;">

                <div class="d-flex">
                    <div style="width: 50%">
                        

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Exam Date:- </span>
                             {{$ExamInfo->exam_date}}
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Registration Start Date:- </span>
                            {{$ExamInfo->registration_start_date}}
                        </h6> 

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Registration Last Date:- </span>
                            {{$ExamInfo->reg_last_date}}
                        </h6> 
                        
                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Registration fee:- </span>
                            $ {{$ExamInfo->fee}}
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
                            <button style="font-size: 16px; padding: 10px; width: 100px;" type="submit"
                                class="btn btn-outline">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
