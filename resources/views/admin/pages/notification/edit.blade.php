@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'notification'])

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<main class="main-content mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card card-body mt-4">
                    <h6 class="mb-0">Add New Notification</h6>
                    <hr class="horizontal dark my-3">
                    <form method="post" action="{{ route('notification.update', $formData->id) }}" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <label class="col-form-label pt-0" for="Courses">Courses</label>
                            <select class="form-control" name="courses[]" id="courses" >
                                @foreach($courseList as $data)
                                    <option value="{{ $data->id }}" @if($formData->course_id == $data->id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-form.textarea type="text" label="Notification" placeholder="Notification"
                            attribute="notification" required="true">
                            {{ $formData->notification }}
                        </x-form.textarea>

                        <div class="col-md-12">
                            <x-form.select label="Status" attribute="status" class="col-form-label pt-0"
                                required>
                                <option value="">Select the status</option>
                                <option value="1" @if($formData->status == 'active') selected @endif>active</option>
                                <option value="0" @if($formData->status == 'in-active') selected @endif>in-active</option>
                            </x-form.select>
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
@push('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#courses').select2({
            tags: true,
            tokenSeparators: [',', ' '],
            placeholder: "select courses"
        });
    });
</script>
@endpush
