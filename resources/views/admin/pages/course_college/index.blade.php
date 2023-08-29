@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'streams'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Course College</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('cource_college.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Add
                                    course college</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th class="text-uppercase">College</th>
                                    <th class="text-uppercase">Course</th>
                                    <th class="text-uppercase">Code</th>
                                    <th class="text-uppercase">Fee</th>
                                    <th class="text-uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($collegeList as $data)
                                    <tr>
                                        <td class="text-sm">{{ $data->college->name }}</td>
                                        <td class="text-sm">{{ $data->course->name }}</td>
                                        <td class="text-sm">{{ $data->code }}</td>
                                        <td class="text-sm">Rs {{ $data->fee }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('cource_college.edit', $data->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a href=""
                                                onclick="event.preventDefault(); if (confirm('{{ __('Are you sure you want to delete this College_course?') }}')) { document.getElementById('stream_delete-{{ $data->id }}').submit(); }"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </a>

                                            <form id="stream_delete-{{ $data->id }}" class="d-none"
                                                action="{{ route('cource_college.destroy', $data->id) }}" method="post">
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
