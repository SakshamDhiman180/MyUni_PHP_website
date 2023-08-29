@extends('parent.layouts.app', [
    'page' => __('notifications'),
    'active' => 'courses',
])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">Notification</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>Course</th>
                                    <th>Notification</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($notification) != 0)
                                    @foreach ($notification as $data)
                                        <tr>
                                            <td class="text-sm">{{ $data->course->name }}</td>
                                            <td class="text-sm">{{ $data->notification }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    No data found!
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
