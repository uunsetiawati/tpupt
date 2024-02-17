<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h2>LAPORAN <br><?= strtoupper($tp->row("nama")) ?> (<?= $tahun ?>/<?= $bulan ?>) </h2>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= site_url() ?>/laporan/detailTP/<?= $tp->row("id") ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                                <input type="hidden" readonly value="<?= $row->row("user_id") ?>">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>

                                    <select name="bulan" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>

                                    <select name="tahun" class="btn btn-outline-primary " required>
                                        <option value="">Pilih Tahun</option>
                                        <?php $thn_skr = date('Y');
                                        for ($x = $thn_skr; $x >= 2022; $x--) { ?>
                                            <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="btn btn-success">Filter <i class="fa fa-eye"></i></button>
                                    <a href="<?= base_url("laporan") ?>" class="btn btn-info float-right">Kembali <i class="fa fa-eye"></i></a><a href="<?= base_url("laporan/exportLaporanTP?tahun=" . $tahun . "&bulan=" . $bulan . "&tp=" . $this->uri->segment("3")) ?>" target="blank" class="btn btn-secondary btn-sm">Export Data Kunjungan (DEMO) <i class="fa fa-print"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php if ($approval->num_rows() > 0) { ?>
                        <div class="card text-white bg-success mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><ion-icon name="checkmark-done-circle-outline"></ion-icon> Laporan Sudah Divalidasi</h5>
                                <p class="card-text">Laporan atas nama <?= $tp->row("nama") ?> telah di validasi pada <?= $approval->row("created") ?></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card text-white bg-danger mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><ion-icon name="warning-outline"></ion-icon> Laporan Belum Divalidasi</h5>
                                <p class="card-text">
                                    Tenaga Pendamping atas nama <?= $tp->row("nama") ?> wajib melaporkan hasil kujungannya kepada Koordinator. Koordinator bisa melakukan pengecekan log laporan tersebut. Setiap tenaga pendamping minimal mengupload 15 check-in dalam 1 bulan. Setelah benar, silahkan APPROVE. NB: Proses approve hanya bisa dilakukan 1x dan tidak bisa ulang kembali. Seluruh aktivitas tercatat oleh sistem.
                                </p>    
                                <?php if ($row->num_rows() >= 10 and $this->session->tipe_user == "2" and $tahun == date("Y") and $bulan == date("m")) { ?>
                                    <a href="<?= site_url('laporan/accLaporanTP/' . base64_encode($tp->row("id"))) ?>" class="btn btn-success btn-block btn-sm">APPROVE LAPORAN</a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <!-- <?php $this->view('message'); ?> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="15%">Maps</th>
                                                <th width="10%">Tanggal</th>
                                                <th width="60%">Tujuan</th>
                                                <th width="15%">Foto Selfie</th>
                                                <th width="15%">Foto Lokasi</th>
                                                <th width="20%">Aksi</th>

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
                                                    <td>
                                                        <a href="https://maps.google.com/maps?q=<?= $data->lat ?>,<?= $data->lng ?>" target="blank"><img src="<?= base_url() ?>/assets/files/maps/<?= $data->loc_img ?>" alt="" class="imaged w200">
                                                    </td>
                                                    <td><?= date("d-m-Y G:i:s", strtotime($data->created)) ?></td>
                                                    <td>
                                                        <strong>Kunjungan ke <?= $data->tipe ?></strong>. Bertujuan untuk
                                                        <?= $data->tujuan ?>
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url() ?>/assets/files/foto_selfie/<?= $data->foto_selfie ?>" alt="" class="imaged w200">
                                                    </td>
                                                    <td>
                                                        <img src="<?= base_url() ?>/assets/files/foto_lokasi/<?= $data->foto_lokasi ?>" alt="" class="imaged w200">
                                                    </td>
                                                    <td>
                                                        <a href="<?= site_url('laporan/detaillaporan/' . $data->id); ?>" class="btn btn-info btn-sm">Detail</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- * App Capsule -->