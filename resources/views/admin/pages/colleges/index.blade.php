@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'college'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All Colleges</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('college.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; ADD
                                    COLLEGE</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th>BANNER IMAGE</th> --}}
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>STREAMS</th>
                                    <TH>CODE</TH>
                                    <TH>ADDRESS</TH>
                                    <TH>CITY</TH>
                                    <TH>STATE</TH>
                                    <TH>ZIP</TH>
                                    <TH>CONTACT NO.</TH>
                                    <TH>EMAIL</TH>
                                    <TH>PRINCIPAL NAME</TH>
                                    <TH>ACTION</TH>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($college as $data)
                                    <tr>
                                        {{-- <td class="text-sm">
                                           <img src="{{ asset('storage/'.  $data->banner_image) }}" alt="" srcset="">
                                        </td> --}}
                                        <td class="text-sm">{{ $data->name}}</td>
                                        <td class="text-sm">{{ $data->description}}</td>
                                        <td class="text-sm"><textarea disabled>@foreach(json_decode($data->streams) as $stream){{$stream}},@endforeach</textarea></td>
                                        <td class="text-sm">{{ $data->code}}</td>
                                        <td class="text-sm">{{ $data->address}}</td>
                                        <td class="text-sm">{{ $data->city}}</td>
                                        <td class="text-sm">{{ $data->state}}</td>
                                        <td class="text-sm">{{ $data->zip}}</td>
                                        <td class="text-sm">{{ $data->contact_number}}</td>
                                        <td class="text-sm">{{ $data->email}}</td>
                                        <td class="text-sm">{{ $data->principal_name}}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('college.edit', $data->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <a href="#"
                                                onclick="event.preventDefault(); if (confirm('{{ __('Are you sure you want to delete this College?') }}')) { document.getElementById('stream_delete-{{ $data->id }}').submit(); }"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </a>

                                            <form id="stream_delete-{{ $data->id }}" class="d-none"
                                                action="{{ route('college.destroy', $data->id) }}" method="post">
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
