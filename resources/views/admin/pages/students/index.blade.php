@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'students'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Registered Students</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Course opted for</th>
                                    <th>College opted for</th>
                                    <th>Exam opted for</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($userData) > 0)
                                    @foreach ($userData as $data)
                                        <tr>
                                            <td class="text-sm">{{ $data->first_name }} {{ $data->last_name }}</td>
                                            <td class="text-sm">{{ $data->email }}</td>
                                            <td class="text-sm">{{ $data->course->name }}</td>
                                            <td class="text-sm">{{ $data->college->name }}</td>
                                            <td class="text-sm">{{ $data->exam->name }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                        <h4>No User Found!</h4>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
