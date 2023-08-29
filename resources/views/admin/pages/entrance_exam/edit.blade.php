@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'entrance_exam'])

@section('content')
    <main class="main-content mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card card-body mt-4">
                        <h6 class="mb-0">Add Entrance Exam</h6>
                        <hr class="horizontal dark my-3">

                        <form method="post" action="{{ route('entrance.update', $formData->id) }}" autocomplete="off" id="school_form">
                            @csrf
                            @method('put')
                            <div class="d-flex p-2 justify-content-between">
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="number" labelname="Admission Year"
                                        placeholder="admission year" attribute="admission_year" id="" value="{{$formData->admission_year}}"
                                        required />
                                </div>
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="text" labelname="name"
                                        placeholder="name" attribute="name" id="" value="{{$formData->name}}" required />
                                </div>
                            </div>
                            <div class="d-flex p-2 justify-content-between">
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="text" labelname="code"
                                        placeholder="code" attribute="code" id="" value="{{$formData->code}}" required disabled='ture'/>
                                </div>
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="date" labelname="Exam Date"
                                        placeholder="exam" attribute="exam_date" id="" value="{{$formData->exam_date}}" required />
                                </div>
                            </div>
                            <div class="col-md-12 p-2">
                                <x-form.select label="Course" attribute="course_id" class="form-group" required>
                                    <option value="">Select the course</option>
                                    @foreach ($courses as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == ($formData->course_id ?? 0) ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </x-form.select>
                            </div>
                            <div class="col-md-12 p-2">
                                <x-form.textarea class="col-form-label pt-0"
                                label="Description" attribute="description"
                                placeholder="Type here...">
                                {{$formData->description}}
                            </x-form.textarea>
                            </div>
                            <div class="d-flex p-2 justify-content-between">
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="date"
                                        labelname="Registeration Start Date" placeholder="registration start date"
                                        attribute="registration_start_date" id="" value="{{$formData->registration_start_date}}" required />
                                </div>
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="date"
                                        labelname="Registeration Last Date" placeholder="registeration last date"
                                        attribute="reg_last_date" id="" value="{{$formData->reg_last_date}}" required />
                                </div>
                            </div>
                            <div class="d-flex p-2 justify-content-between">
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="number" labelname="Fees"
                                        placeholder="fee" attribute="fee" id="" value="{{$formData->fee}}" required />
                                </div>
                                <div class="col-md-6 p-2">
                                    <x-form.input class="col-form-label pt-0" type="date" labelname="Result date"
                                        placeholder="result date" attribute="result_date" id="" value="{{$formData->result_date}}"
                                        required />
                                </div>
                            </div>

                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('entrance.index') }}" type="button" name="button"
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
