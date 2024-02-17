<!-- jquery datatable -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<!-- script tambahan  -->
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

<!-- fungsi datatable -->
<script>
    $(document).ready(function() {
        $('#full').DataTable({
            dom: 'Blfrtip',
            columnDefs: [ {
                targets: [0], /* column index */
                orderable: true, /* true or false */
                lengthchange: true,
            }],
            lengthMenu: [[10,25,50,100, 150, 200, -1], [10,25,50,100, 150, 200, "All"]],
            buttons: [
                'copy', 'excel', 'print', 'colvis'
            ],
        });
    });
</script>