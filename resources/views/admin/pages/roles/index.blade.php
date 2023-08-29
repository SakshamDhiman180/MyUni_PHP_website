@extends('admin.user_type.auth', ['parentFolder' => 'admin', 'childFolder' => 'role'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- Card header -->
            <div class="card-header pb-0">
                <div class="d-lg-flex">
                    <div>
                        <h5 class="mb-0">All Roles</h5>
                    </div>
                    @can('role-create')
                    <div class="ms-auto my-auto mt-lg-0 mt-4">
                        <div class="ms-auto my-auto">
                            <a href="{{ route('roles.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Role</a>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                    @if($errors->get('msgError'))
                    <div class="m-3  alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    <table class="table table-flush" id="roles-list">
                        <thead class="thead-light">
                            <tr>
                                <th>NAME</th>
                                <th>CREATION DATE</th>
                                @if($can['edit'] || $can['delete'])
                                <th>ACTION</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($roles) >= 1)
                            @foreach($roles as $role)
                            <tr>
                                <td class="text-sm">{{$role->name}}</td>
                                <td class="text-sm">{{$role->created_at}}</td>
                                @if($can['edit'] || $can['delete'])
                                <td class="td-actions text-right">
                                    @if($can['edit'])
                                    <a href="{{ route('roles.edit', $role) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit role">
                                        <i class="fas fa-user-edit text-secondary"></i>
                                    </a>
                                    @endif
                                    @if($can['delete'] && $role->name != 'Admin')
                                    <a href="#"  onclick="event.preventDefault(); confirm('{{ __("Are you sure you want to delete this role?") }}') ? document.getElementById('role_delete_frm-{{ $role->id }}').submit() : ''" data-bs-toggle="tooltip" data-bs-original-title="Delete role">
                                        <i class="fas fa-trash text-secondary"></i>
                                    </a>
                                    <form id="role_delete_frm-{{ $role->id }}" class="d-none" action="{{ route('roles.destroy', $role) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td class="text-sm" colspan="5">no content</td>
                            </tr>
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
<script src="{{ URL::asset('assets/js/plugins/datatables.js') }}"></script>
<script>
    if (document.getElementById('roles-list')) {
        const dataTableSearch = new simpleDatatables.DataTable("#roles-list", {
            searchable: true,
            fixedHeight: false,
            perPage: 5
        });

        document.querySelectorAll(".export").forEach(function(el) {
            el.addEventListener("click", function(e) {
                var type = el.dataset.type;

                var data = {
                    type: type,
                    filename: "soft-ui-" + type,
                };

                if (type === "csv") {
                    data.columnDelimiter = "|";
                }

                dataTableSearch.export(data);
            });
        });
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#alert-success").delay(3000).slideUp(300);

    });
</script>
@endpush