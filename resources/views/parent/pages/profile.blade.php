@extends('parent.layouts.app', [
    'page' => __('Profile'),
])

@section('content')
    <div class="container-fluid middle-content">
        <div class="row">
            <div class="col-lg-12 position-relative z-index-2">
                <h3 class="font-weight-bold mb-0 text-center" style="color: white;">Profile Details</h3>
                <p class=" text-center mb-4" style="color: white;">Please complete your profile</p>
            </div>

            <div class="col-lg-8 col-md-12 mx-auto">

                <div class="card p-4">
                    <form action="#" method="POST" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                        <div class="avatar-upload">

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <x-form.input type="text" class="col-form-label pt-0" value="{{ $parent->first_name }}"
                                    labelname="First name" name="firstname" placeholder="First Name" attribute="first_name"
                                    disabled />
                            </div>
                            <div class="col-md-6">
                                <x-form.input type="text" class="col-form-label pt-0" value="{{ $parent->last_name }}"
                                    labelname="Last Name" placeholder="Last Name" attribute="last_name" disabled />
                            </div>
                            <div class="col-md-6">
                                <x-form.input type="email" class="col-form-label pt-0" value="{{ $parent->email }}"
                                    labelname="Email" placeholder="Email" attribute="email" disabled />
                            </div>
                            <div class="col-md-6">
                                <x-form.input type="number" class="col-form-label pt-0" value="{{ $parent->phone }}"
                                    labelname="Phone" placeholder="Enter your valid Phone no." attribute="phone" disabled />
                            </div>
                            <div class="col-md-12">
                                <x-form.input type="text" class="col-form-label pt-0" value="{{ $parent->college->name }}"
                                    labelname="College" placeholder="College" attribute="college_id" disabled/>
                            </div>
                            <div class="col-md-12">
                                <x-form.input type="text" class="col-form-label pt-0" value="{{ $parent->course->name }}"
                                    labelname="Course" placeholder="course" attribute="course_id" disabled />
                            </div>
                            <div class="col-md-12">
                                <x-form.input type="text" class="col-form-label pt-0" value="{{ $parent->exam->name }}"
                                    labelname="Exam" placeholder="Exam" attribute="exam_id" disabled/>
                            </div>
                  
                            <div class="col-md-12">
                                <x-form.input type="number" class="col-form-label pt-0" value="{{ $parent->zip_code }}"
                                    id="" labelname="Zip" placeholder="Enter your zip" attribute="zip_code"
                                    disabled/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#imageUpload').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endpush
