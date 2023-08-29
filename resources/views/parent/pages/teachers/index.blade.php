@extends('parent.layouts.app',
[
'page' => __('Teachers'),
'active' => 'teachers'
])

@section('content')
<div class="container-fluid middle-content">
    <div class="row">
        <div class="col-lg-12 position-relative z-index-2">
            <h3 class="font-weight-bold mb-3">Teachers</h3>
        </div>
        <div class="col-12">
            <div class="card p-0">
                <!-- Card header -->
                <div class="card-header d-flex justify-content-between bg-white align-items-center p-3">
                    <h5 class="mb-0 font-weight-bold">Teachers</h5>
                    <a class="btn btn-secondary" href="{{ route('parent.teacherList') }}">Add a Teacher</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-flush" id="teacherList-search">
                        <thead class="thead-light">
                            <tr>
                                <th>Teacher Name</th>
                                <th>School</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($connectedTeachers))
                                @foreach ($connectedTeachers as $teacher)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ (($teacher->profile_image??'') != '') ? asset('storage/' . $teacher->profile_image) : asset('assets/teacher/img/default-user.png') }}" class="avatar me-3" alt="">
                                            {{ $teacher->first_name ?? '' }} {{ $teacher->last_name ?? '' }}
                                        </div>
                                    </td>
                                    <td>{{ $teacher->experiences->school->name ?? '' }}</td>
                                    <td>
                                        @if (!empty($teacher->experiences->grade))
                                            @php
                                            $grades = explode(',', $teacher->experiences->grade);
                                            @endphp
                                            @foreach ($grades as $grade)
                                                <span class="badge badge-yellow">{{ $grade }}</span>
                                            @endforeach
                                        @else
                                            Nil
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('parent.viewTeacherProfile', $teacher) }}" class="btn btn-outline btn-sm">
                                            View Profile
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    // DATA TABLES
    const dataTableSearch = new simpleDatatables.DataTable("#teacherList-search", {
        searchable: true,
        fixedHeight: true,
    });
</script>
@endpush