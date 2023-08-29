@extends('parent.layouts.app', [
    'page' => __('Dashboard'),
    'active' => 'dashboard',
])


@section('content')
    <div class="container-fluid middle-content">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
                <h3 class="font-weight-bold mb-3" style="color: white">Dashboard</h3>
                <div class="row">
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3 d-flex align-items-center justify-content-between">
                                <div class="numbers">
                                    <p class="mb-1 text-uppercase font-weight-bod">College Applied for<Br />
                                        <strong>{{ $userCourse->name }}</strong>
                                    </p>
                                    <h3 class="font-weight-bolder mb-0">
                                        {{ $userCollege->name }}
                                    </h3>
                                </div>
                                <img src="#" class="hide-for-md" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="card  mb-4">
                            <div class="card-body p-3 d-flex align-items-center justify-content-between">
                                <div class="numbers">
                                    <p class="mb-1 text-uppercase font-weight-bod">Total Courses<Br />
                                        <strong>Active</strong>
                                    </p>
                                    <h3 class="font-weight-bolder mb-0">
                                        {{ count($course) }}
                                    </h3>
                                </div>
                                <img src="#" class="hide-for-md" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="card  mb-4">
                            <a href="{{ route('parent.notifications') }}" style="text-decoration: none">
                                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                                    <div class="numbers">
                                        <p class="mb-1 text-uppercase font-weight-bod">Notifications<Br />
                                            <strong>{{ count($notification) }}</strong>
                                        </p>
                                        <h5 class="font-weight-bolder mb-0">
                                            @if (count($notification) != 0)
                                                <span>
                                                    {{ $notification[count($notification) - 1]->notification }}
                                                </span>
                                            @else
                                                No Notification Yet!
                                            @endif
                                        </h5>
                                    </div>
                                    <img src="#" class="hide-for-md" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-7 col-md-12">
                <div class="card p-4" style="height: 480px;">
                    <div class="card-header py-3 bg-white">
                        <div class="d-flex justify-content-between align-items-center  flex-wrap">
                            <h5 class="p-0 font-weight-bold">Your Course Info</h5>
                            @if (count($course) > 0)
                                <a href="{{ route('parent.course') }}"class="btn btn-primary">View All courses</a>
                            @endif
                        </div>
                    </div>
                    <div style="margin-left: 120px;">
                        <form action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="row">
                                <div class="col-md-10">
                                    <x-form.input type="text" class="col-form-label pt-0" value="{{ $userCourse->name }}"
                                        labelname="Course Name" name="coursename" placeholder="First Name" attribute="name"
                                        disabled />
                                </div>
                                <div class="col-md-10">
                                    <x-form.textarea attribute="address" label="Description" disabled>
                                        {{ $userCourse->description }}
                                    </x-form.textarea>
                                </div>
                                <div class="col-md-10">
                                    <x-form.input type="text" class="col-form-label pt-0"
                                        value="{{ $userCourse->stream->name }}" labelname="Stream" attribute="name"
                                        disabled />
                                </div>
                                <div class="col-md-10">
                                    <x-form.input type="text" class="col-form-label pt-0"
                                        value="{{ $userCourse->category->name }}" labelname="category"attribute="name"
                                        disabled />
                                </div>
                                <div class="col-md-10">
                                    <x-form.input type="text" class="col-form-label pt-0"
                                        value="{{ $userCourse->code }}" labelname="Course Code" attribute="name"
                                        disabled />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
