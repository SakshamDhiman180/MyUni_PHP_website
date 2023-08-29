@extends('example.layouts.app', [])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Example Data table') }}</h4>
                    <div class=" text-end">
                        <a href="{{ route('examples.create') }}" class="btn btn-sm btn-outline-primary">
                            {{ __('Add') }}
                        </a>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <table class="table table-striped table-bordered table-hover data-table">
                    <thead class="thead-light">
                        <tr>
                            <th>
                                {{ __('Title') }}
                            </th>
                            <th>
                                {{ __('Description') }}
                            </th>
                            <th>
                                {{ __('Status') }}
                            </th>
                            <th class="text-right">
                                {{ __('Action') }}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@push('js')
<script>
    const ajax_url = "{{ route('examples.index') }}";
    const table_columns = [{
            "data": "title"
        },
        {
            "data": "description"
        },
        {
            "data": "status_title"
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ];
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.data-table thead tr').clone(true).appendTo('.data-table thead');
        $('.data-table thead tr:eq(1) th').each(function(i) {
            var title = $(this).text().replace(/\s/g, '');
            if (title == 'Action' || title == 'Status') {
                $(this).html('');
            } else {
                $(this).addClass("p-2");
                $(this).html('<input class="form-control form-control-sm" type="text" placeholder=" Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            }

        });

        let table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            bFilter: true,
            orderCellsTop: true,
            fixedHeader: true,
            ajax: ajax_url,
            columns: table_columns,
            autoWidth: false
        });

        $('.data-table').on('click', '.btn-delete[data-remote]', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var url = $(this).data('remote');
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            method: '_DELETE'
                        },
                        success: function(response) {
                            $('.data-table').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            $('.data-table').DataTable().ajax.reload();
                        }
                    }).always(function(data) {
                        $('.data-table').DataTable().draw(false);
                    });

                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
            });

        });
    });
</script>
@endpush