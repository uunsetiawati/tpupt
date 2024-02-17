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

    <div class="container mt-5">
        <!-- membuat tabel -->
        <table id="example" class="table table-striped display table-responsive">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>Agama</th>
                    <th>NIK</th>
                    <th>TTL</th>
                    <th>Pendidikan</th>
                    <th>HP</th>
                    <th>Email</th>
                    <th>Brand</th>
                    <th>Alamat</th>
                    <th>Produk</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>NIK Koperasi</th>
                    <th>Tahun Berdiri</th>
                    <th>NIB</th>
                    <th>Jabatan</th>
                    <th>Skala</th>
                    <th>Omset</th>
                    <th>Jumlah Karyawan</th>
                    <th>Masalah</th>
                    <th>Kebutuhan</th>
                    <th>Rekomendasi</th>
                    <th>Target</th>
                    <th>Realisasi</th>
                    <th>Kegiatan</th>
                    <th>Tujuan</th>
                    <th>Kesimpulan</th>
                    <th>Tindak Lanjut</th>
                    <th>Keterangan</th>
                    <th>Maps</th>
                    <th>Foto Selfie</th>
                    <th>Foto Lokasi</th>
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
                        <td><?= date("d-m-Y G:i:s", strtotime($data->created)) ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->kelamin ?></td>
                        <td><?= $data->agama ?></td>
                        <td><?= $data->nik ?></td>
                        <td><?= $data->tempat_lahir ?>,<?= $data->tgl_lahir ?></td>
                        <td><?= $data->pendidikan ?></td>
                        <td><?= $data->hp ?></td>
                        <td><?= $data->email ?></td>
                        <td><?= $data->brand ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->produk ?></td>
                        <td><?= $data->provinsi ?></td>
                        <td><?= $data->kota ?></td>
                        <td><?= $data->nik_koperasi ?></td>
                        <td><?= $data->tahun_berdiri ?></td>
                        <td><?= $data->iumk ?></td>
                        <td><?= $data->jabatan ?></td>
                        <td><?= $data->skala ?></td>
                        <td><?= $data->omset ?></td>
                        <td><?= $data->jumlah_karyawan ?></td>
                        <td><?= $data->masalah ?></td>
                        <td><?= $data->kebutuhan ?></td>
                        <td><?= $data->rekomendasi ?></td>
                        <td><?= $data->target ?></td>
                        <td><?= $data->realisasi ?></td>
                        <td><?= $data->kegiatan ?></td>
                        <td><?= $data->tujuan ?></td>
                        <td><?= $data->kesimpulan ?></td>
                        <td><?= $data->tindak_lanjut ?></td>
                        <td><?= $data->keterangan ?></td>
                        <td>
                            <a href="https://maps.google.com/maps?q=<?= $data->lat ?>,<?= $data->lng ?>" target="blank">
                                <img src="https://tp.uptkukm.id/assets/files/maps/<?= $data->loc_img ?>" alt="" class="img-thumbnail">
                        </td>

                        <td>
                            <img src="https://tp.uptkukm.id/assets/files/foto_selfie/<?= $data->foto_selfie ?>" alt="" class="img-thumbnail">
                        </td>
                        <td>
                            <img src="https://tp.uptkukm.id/assets/files/foto_lokasi/<?= $data->foto_lokasi ?>" alt="" class="img-thumbnail">
                        </td>
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