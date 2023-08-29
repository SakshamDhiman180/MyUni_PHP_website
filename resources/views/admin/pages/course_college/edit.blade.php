@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'cource_cate'])

@section('content')
    <main class="main-content mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card card-body mt-4">
                        <h6 class="mb-0">Add New Category</h6>
                        <hr class="horizontal dark my-3">

                        <form method="post" action="{{ route('cource_college.update', $formdata->id) }}" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="col-md-12">
                                <x-form.select label="Course" attribute="course_id" class="col-form-label pt-0"
                                 required>
                                    <option value="">Select the Course</option>
                                    @foreach ($courseList as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == ($formdata->course_id ?? 0) ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>
                            <div class="col-md-12">
                                <x-form.select label="College" attribute="college_id" class="col-form-label pt-0" required>
                                    <option value="">Select the college</option>
                                    @foreach ($collegeList as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == ($formdata->college_id ?? 0) ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>
                            <div class="col-md-12">
                                <x-form.input class="col-form-label pt-0" type="text" labelname="Code"
                                    placeholder="Code" attribute="code" id="" value="{{$formdata->code}}" required disabled='ture' />

                            </div>
                            <div class="col-md-12">
                                <x-form.input class="col-form-label pt-0" type="text" labelname="Fees (in Rupees)"
                                    placeholder="fees" attribute="fee" id="" value="{{$formdata->fee}}" required />

                            </div>
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('cource_college.index') }}" type="button" name="button"
                                class="btn btn-light m-0">BACK TO LIST</a>
                            <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
