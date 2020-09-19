$(document).ready(function() {
    $('.datatable').DataTable( {
        lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
    dom: 'lBfrtip',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ],
        responsive: true,
        autoFill: true,
    } );
   });