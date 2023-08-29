@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'entrance_exam'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Entrance Exams</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('entrance.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; ADD
                                    NEW EXAM</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>ADMISSION YEAR</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <TH>CODE</TH>
                                    <TH>COURSES</TH>
                                    <TH>EXAM DATE</TH>
                                    <TH>REG. DATE</TH>
                                    <TH>REG. LAST DATE</TH>
                                    <TH>FEE</TH>
                                    <TH>RESULT DATE</TH>
                                    <TH>ACTION</TH>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($examList as $data)
                                    <tr>
                                        <td class="text-sm">{{ $data->admission_year}}</td>
                                        <td class="text-sm">{{ $data->name}}</td>
                                        <td class="text-sm">{{ $data->description }}</td>
                                        <td class="text-sm">{{ $data->code}}</td>
                                        <td class="text-sm">{{ $data->course->name}}</td>
                                        <td class="text-sm">{{ $data->exam_date}}</td>
                                        <td class="text-sm">{{ $data->registration_start_date}}</td>
                                        <td class="text-sm">{{ $data->reg_last_date}}</td>
                                        <td class="text-sm">{{ $data->fee}}</td>
                                        <td class="text-sm">{{ $data->result_date}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('entrance.edit', $data->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a href="#"
                                                onclick="event.preventDefault(); if (confirm('{{ __('Are you sure you want to delete this Entrance Exam?') }}')) { document.getElementById('stream_delete-{{ $data->id }}').submit(); }"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </a>

                                            <form id="stream_delete-{{ $data->id }}" class="d-none"
                                                action="{{ route('entrance.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
