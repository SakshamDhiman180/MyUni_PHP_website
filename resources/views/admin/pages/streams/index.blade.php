@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'stream'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header pb-0">
                    <div class="d-lg-flex">
                        <div>
                            <h5 class="mb-0">All stream</h5>
                        </div>

                        <div class="ms-auto my-auto mt-lg-0 mt-4">
                            <div class="ms-auto my-auto">
                                <a href="{{ route('form') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New
                                    Stream</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-0 p-4">
                    <div class="table-responsive p-4">
                        <table class="table table-flush" id="roles-list">
                            <thead class="thead-light">
                                <tr>
                                    <th>STREAM CODE</th>
                                    <th>STREAM NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($streams as $stream)
                                    <tr>
                                        <td class="text-sm">{{ $stream->code }}</td>
                                        <td class="text-sm">{{ $stream->name }}</td>
                                        <td class="text-sm">{{ $stream->description }}</td>
                                        <td class="td-actions text-right">
                                            <a href="{{ route('edit', $stream->id) }}" class="mx-3"
                                                data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            {{-- <form action="{{ route('delete', $stream->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="mx-3" type="submit" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Delete Stream">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </button>
                                            </form> --}}
                                            <a href="#"
                                                onclick="event.preventDefault(); if (confirm('{{ __('Are you sure you want to delete this stream?') }}')) { document.getElementById('stream_delete-{{ $stream->id }}').submit(); }"
                                                data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                                <i class="fas fa-trash text-secondary"></i>
                                            </a>

                                            <form id="stream_delete-{{ $stream->id }}" class="d-none"
                                                action="{{ route('delete', $stream->id) }}" method="post">
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
