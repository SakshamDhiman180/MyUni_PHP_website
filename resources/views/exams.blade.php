@extends('common.layouts.app', [
    'page' => __('Exams'),
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
            <li class="active"><a href="{{ route('common.exams')}}">Entrance Exams</a></li>
            <li> <a href="{{ route('common.signup') }}">Admission Form 2023</a></li>
            <li> <a href="{{ route('common.signin') }}">Login</a></li>
        </ul>
    </nav>
</div>
    @endsection
    @section('content')
        <link id="pagestyle" href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
        <section class="section main-banner" id="top" data-section="section1" style="height:50vh;">
            <img src="{{ asset('assets/img/exam_banner-01.jpg') }}" id="bg-video" alt="">

            <div class="video-overlay header-text">
                <div class="caption">
                    <h2><em>Exams</em></h2>
                    <div class="main-button">
                        <div class="scroll-to-section"><a href="#section2">Discover more</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section courses" data-section="section4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-4" style="background: #172238">
                            <h4 style="color: #f5a425">Filter:-</h4>
                            <form id="filterForm">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label style="color: #f5a425" class="col-form-label pt-0" for="streams">Streams</label>
                                    <select class="form-control" name="streams" id="streams">
                                        <option value="">Select streams</option>
                                        @foreach ($streams as $stream)
                                            <option value="{{ $stream->id }}">{{ $stream->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label style="color: #f5a425" class="col-form-label pt-0" for="course">Courses</label>
                                    <select class="form-control" name="course" id="course">
                                        <option value="">Select Course</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label style="color: #f5a425" class="col-form-label pt-0" for="exam">Exams</label>
                                    <select class="form-control" name="exam" id="exam">
                                        <option value="">Select Exam</option>
                                        @foreach ($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label style="color: #f5a425" class="col-form-label pt-0" for="year">Year</label>
                                    <input type="number" name="year" id="year" class="form-control"
                                        placeholder="Filter by Year">
                                </div>
                                <div class="col-md-1">
                                    <button type="submit" class="btn btn-primary"
                                    style="font-size: 16px; padding: 10px; width: 100px;">Search</button>
                                </div>
                            </div></form>
                        </div>
                    </div>
                    <div class="row" id="exam-list-container">

                        <?php $n = rand(1, 8); ?>
                        @foreach ($exams as $data)
                            <div class="col-md-3 mb-4">
                                <div class="item p-4">
                                    <img style="height: 197px; width: 300.7px;"
                                        src="{{ asset('assets/img/exam_banner-0' . $n . '.jpg') }}" alt="Course #1">
                                    <div class="down-content" style="width: 300.7px;">
                                        <h4>{{ $data->name }}</h4>
                                        <p>{{ $data->description }}</p>
                                        <p>Exam fee:- ${{ $data->fee }}</p>
                                    </div>
                                </div>
                            </div>
                            <?php $n = ($n % 8) + 1; ?> {{-- Ensure $n cycles between 1 and 8 --}}
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @push('js')
        <script>
            $(document).ready(function() {
                $('#filterForm').on('submit', function(event) {
                    event.preventDefault();

                    var formData = $(this).serialize();

                    $('#exam-list-container').html(
                        '<center><h5><em style="color:#f5a425">Loading...</em></h5></center>'
                        ); // Show "Loading..." message

                    $.ajax({
                        type: 'GET',
                        url: '{{ route('common.exams') }}',
                        data: formData,
                        success: function(data) {
                            console.log(data);
                            $('#exam-list-container').empty().append(data);
                        },
                        error: function() {
                            console.log('Error occurred during AJAX request.');
                        }
                    });
                });
            });
        </script>
    @endpush
