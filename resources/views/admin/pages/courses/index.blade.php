@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'courses'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Courses</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('courses.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New
                                    COURSE</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>STREAM</th>
                                    <th>CATEGORY CODE</th>
                                    <th>CODE</th>
                                    <TH>ACTION</TH>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td class="text-sm">{{ $course->name }}</td>
                                        <td class="text-sm">{{ $course->description}}</td>
                                        <td class="text-sm">{{ $course->stream->name}}</td>
                                        <td class="text-sm">{{ $course->category->name}}</td>
                                        <td class="text-sm">{{ $course->code}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('courses.edit', $course->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a href="#"
                                                onclick="event.preventDefault(); if (confirm('{{ __('Are you sure you want to delete this Course ?') }}')) { document.getElementById('stream_delete-{{ $course->id }}').submit(); }"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </a>

                                            <form id="stream_delete-{{ $course->id }}" class="d-none"
                                                action="{{ route('courses.destroy', $course->id) }}" method="post">
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
