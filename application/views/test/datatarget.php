<!DOCTYPE html>
<html lang="id">

<head>
    <!-- datatable style -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <!-- bootstrap 4 css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- css tambahan  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
</head>

<body>
    <marquee style="background-color:DodgerBlue;"><h2 style="color:Tomato;">LIST YANG SUDAH UPLOAD TARGET TAHUNAN</h2></marquee>
    <div class="container mt-5">
        <!-- membuat tabel -->
        <table id="example" class="table table-striped display table-responsive">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Asal Kab/Kota</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) {;
                ?>
                    <tr>
                        <td scope="row">
                            <p><?= $no++ ?></p>
                        </td>                       
                        <td><?= $data->nama ?></td>
                        <td><?= $data->hp ?></td>
                        <td><?= $data->kota ?></td>
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'excel', 'print', 'colvis'
                ]
            });
        });
    </script>
</body>

</html>