@extends('parent.layouts.app', [
    'page' => __('courseInfo'),
    'active' => 'courses',
])

@section('content')
<link id="pagestyle" href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <section class="section main-banner" id="top" data-section="section1">
        <img src="{{ asset('assets/img/courses-07.jpg') }}" id="bg-video" alt="">

        <div class="video-overlay header-text">
            <div class="caption">
                <h6>{{$courseInfo[0]->course->code}}</h6>
                <h2><em>{{$courseInfo[0]->course->name}}</em></h2>
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
                <h6 style="color:white; margin-bottom:40px; ">{{ $courseInfo[0]->course->description }}</h6>

                <hr style="color:white; height: 10px;">

                <div class="d-flex">
                    <div style="width: 50%">
                        <div class="table-responsive p-4">
                            <h5 style="color:#f58a25">Colleges Offer this course:- </h5>
                            <br>
                            <table class="table table-flush" id="datatable-search">
                                <thead class="thead-light">
                                    <tr>
                                        @foreach ($courseInfo as $data)
                                            <th style="color:white">{{ $data->college->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($courseInfo as $data)
                                            <td class="text-sm" style="color:white">$ {{$data->fee }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>    
                            </table>
                        </div>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Steam:- </span>
                             {{$streamInfo->name}}
                        </h6>

                        <h6 style="color:white; margin-top:40px;">
                            <span style="color:#f5a425">Course Category:- </span>
                            {{$categoryInfo->name}}
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
