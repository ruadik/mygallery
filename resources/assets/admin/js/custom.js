$(function () {
    $('.select2').select2();
    $('#example1').DataTable();
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    })
});

$(function () {
    $('#example1').DataTable()
});
