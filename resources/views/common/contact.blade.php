@extends('common.layouts.app',
[
    'page' => __('Contact Us')
])

@section('header_content')
<div class="page-header above_the_fold_page d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-sm-12 text-center mx-auto">
                <h1 class="mb-3">How can we help you?</h1>
                <h4 class="mb-1 px-lg-5">You can reach us anytime via <a href="mailto:help@blessateacher.com">help@blessateacher.com</a>
                </h4>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- -------- CREATE contact------- -->
<section class="padding-tb pt-2 pt-lg-5 pt-md-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="card border-0 p-0">
                    <form id="contact-form" method="post" action="{{ route('common.sendMail') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 px-3">
                                    <x-form.input type="text" placeholder="First Name" attribute="first_name" value="{{$userDetails->first_name ?? ''}}" required="true" />
                                </div>
                                <div class="col-md-6 px-3">
                                    <x-form.input type="text" placeholder="Last Name" attribute="last_name" value="{{$userDetails->last_name ?? ''}}" required="true" />
                                </div>
                                <div class="col-md-6  px-3">
                                    <x-form.input type="email" placeholder="Email" attribute="email" value="{{$userDetails->email ?? ''}}" required="true" />
                                </div>
                                <div class="col-md-6  px-3">
                                    <x-form.input type="number" placeholder="Phone Number" attribute="phone" value="{{$userDetails->phone ?? ''}}" required="true" />
                                </div>
                                <div class="col-md-12  px-3">
                                    <x-form.textarea attribute="message" required="true" label="What can we help you?" rows="6" placeholder="Describe your problem in at least 250 characters"></x-form.textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary mt-1 mt-lg-2 px-5 width-240">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection