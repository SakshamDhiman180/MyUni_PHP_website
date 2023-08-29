$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.data-table thead tr').clone(true).appendTo('.data-table thead');
    $('.data-table thead tr:eq(1) th').each(function(i) {
        var title = $(this).text().replace(/\s/g, '');
        if (title == 'Action') {
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
        language: {
            paginate: {
                "first": '<i class="fa fa-angles-left"></i>',
                "last": '<i class="fa fa-angles-right"></i>',
                "previous": '<i class="fa fa-chevron-left"></i>',
                "next": '<i class="fa fa-chevron-right"></i>'
            }
        },
        autoWidth: false
    });
});