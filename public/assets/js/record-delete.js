$(function () {

    $('.data-table').on('click', '.btn-delete[data-remote]', function (e) {

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
                    success: function (response) {
                        $('.data-table').DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        $('.data-table').DataTable().ajax.reload();
                    }
                }).always(function (data) {
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