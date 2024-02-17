<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>DATA LAPORAN</h3> <a href="<?=base_url("kunjungan/dataKunjungan?tahun=".$tahun."&bulan=".$bulan)?>" target="blank" class="btn btn-secondary btn-sm">Export Data Kunjungan (DEMO: Bulan <?= $bulan ?> / <?= $tahun ?>) <i class="fa fa-print"></i></a>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= site_url() ?>/kunjungan/data/" enctype="multipart/form-data" method="get" accept-charset="utf-8">
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
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <?php if ($laporan->num_rows() > 0) { ?>
                        <div class="card text-white bg-success mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><ion-icon name="checkmark-done-circle-outline"></ion-icon> Laporan Terupload</h5>
                                <p class="card-text">Terima kasih anda telah melakukan upload laporan pada <?= $laporan->row("created")?></p>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card text-white bg-danger mb-2">
                            <div class="card-body">
                                <h5 class="card-title"><ion-icon name="checkmark-done-circle-outline"></ion-icon> Laporan Belum Terupload</h5>
                                <p class="card-text">Anda belum mengupload laporan bulan ini. Batas akhir upload laporan adalah tanggal 29 setiap bulannya. Silahkan upload pada menu yang telah disediakan.</p>
                                <?php if ($row->num_rows() >= 15) { ?>
                                    <a href="<?= site_url('kunjungan/addlaporan/') ?>" class="btn btn-success btn-block btn-sm">UPLOAD LAPORAN</a>
                                <?php } ?>
                            </div>
                        </div>
                </div>
            <?php } ?>
            <div class="card">
                <?php $this->view('message'); ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <div style="overflow-x:auto;">
                            <table class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Tanggal</th>
                                        <th width="60%">Tujuan</th>
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
                                            <td><?= date("d-m-Y G:i:s", strtotime($data->created)) ?></td>
                                            <td>
                                                <?= $data->tujuan ?>
                                            </td>
                                            <td>
                                                <a href="<?= site_url('kunjungan/edit/' . $data->id); ?>" class="btn btn-info btn-sm"><ion-icon name="eye-outline"></ion-icon></a>
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