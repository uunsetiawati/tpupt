<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mb-2">
        <div class="tab-content">
            <div class="card">

                <div class="card-body">
                    <form action="<?= base_url() ?>/laporan/statistik/" enctype="multipart/form-data" method="get" accept-charset="utf-8">
                        <input type="hidden" readonly value="<?= $row->row("user_id") ?>">
                        <div class="input-group mb-3">
                            <select name="wilayah_kerja" class="btn btn-outline-primary " required>
                                <option value="">Pilih Kabupaten / Kota</option>
                                <?php
                                $this->db->order_by('id', 'ASC');
                                foreach ($this->fungsi->pilihan("tb_lembaga")->result() as $key => $pilihan) {;
                                ?>
                                    <option value="<?= $pilihan->id ?>"><?= $pilihan->kota ?></option>
                                <?php } ?>
                            </select>

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
                            <a href="<?= base_url("laporan/statistik") ?>" class="btn btn-info float-right">Kembali <i class="fa fa-fw fa-angle-double-left" aria-hidden="true"></i></a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- feed -->
            <div class="text-center">
                <h1>Statistik <?= $k_kota ?> <?= $bulan ?>/<?= $tahun ?></h1>
            </div>
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div id="grafikKunjungan" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                        <hr>
                        <div class="col-12 mb-2">
                            <div id="grafikKunjungan2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="section full mt-2">
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                        <h2>Detail Berdasarkan Jumlah Kunjungan</h2>
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="40%">Nama</th>
                                                <th width="10%">Koperasi</th>
                                                <th width="10%">UKM</th>
                                                <th width="10%">Lainnya</th>
                                                <th width="15%">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = "1";
                                            foreach ($row->result() as $key => $data) { ?>
                                                <tr>
                                                    <td scope="row">
                                                        <p><?= $no++ ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->nama($data->id) ?> (<?= $data->bidang ?>)</p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?></p>
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

            <hr>

            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div style="overflow-x:auto;">
                                            <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                                <h2>Berdasarkan Poin Peringkat</h2>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="30%">Nama</th>
                                                        <th width="10%">Total Poin</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                                                  

                                                    <?php $no = "1";
                                                    foreach ($row->result() as $key => $data) { ?>
                                                        <tr>
                                                            <td scope="row">
                                                                <p><?= $no++ ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->nama($data->id) ?></p>
                                                            </td>
                                                            <td>
                                                            <?= $this->fungsi->getPoin($data->id, $tahun, $bulan)->row("poin") ?>
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
                        <div class="col-lg-6 col-md-6 col-xs-12 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div style="overflow-x:auto;">
                                            <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                                <h2>Berdasarkan Jarak Kunjungan</h2>
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th width="30%">Nama</th>
                                                        <th width="10%">Total Jarak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = "1";
                                                    foreach ($row->result() as $key => $data) { ?>
                                                        <tr>
                                                            <td scope="row">
                                                                <p><?= $no++ ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->nama($data->id) ?> (<?= $data->bidang ?>)</p>
                                                            </td>
                                                            <td>
                                                                <p><?= $this->fungsi->totalJarak($data->id) ?></p>
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
                </div>
            </div>

            <hr>

            <!-- Extra Header -->
            <div class="section full mt-2">
                <div class="card">
                    <div class="card-body">
                        <h2>Berdasarkan Kegiatan Kunjungan</h2>
                        <small>*Klik nama untuk melihat detail kunjungan</small>
                        <ul class="nav nav-tabs lined" role="tablist">
                            <?php $no = "1";
                            foreach ($row->result() as $key => $data) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabKe<?= $no++ ?>" role="tab">
                                        <?= $data->nama ?> (<?= $data->bidang ?>)
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                        <hr>

                        <div class="tab-content mt-1">
                            <?php
                            $no = "1";
                            foreach ($row->result() as $key => $data) {
                                $this->db->where("tipe !=", "lainnya");
                                $item = $this->fungsi->loadDataLike2("tb_kunjungan", "user_id", $data->id, "created", $tahun . "-" . $bulan);
                            ?>
                                <!-- <?= $data->nama ?> -->
                                <div class="tab-pane fade show" id="tabKe<?= $no++ ?>" role="tabpanel">
                                    <div class="section full mt-1">
                                        <div class="table-responsive">
                                            <div style="overflow-x:auto;">
                                                <div>
                                                    Laporan :
                                                    <?php if ($this->fungsi->loadDataLike1("tb_laporan", "created", $tahun . "-" . $bulan, $data->id)->num_rows() != null) { ?>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=surat_tugas&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Surat Tugas</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=sppd&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> SPPD</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=surat_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Kunjungan</a>
                                                        <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . $tahun . "&bulan=" . $bulan . "&jenis=laporan_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Laporan Kunjungan</a>
                                                    <?php } else { ?>
                                                        <span class='badge badge-danger'>Belum Upload</span>
                                                    <?php } ?>
                                                    <br>
                                                    Izin : <?= $this->fungsi->loadDataLike2("tb_izin", "user_id", $data->id, "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>
                                                    <br>
                                                    Terlambat : <?= $this->fungsi->loadDataLike2("tb_late", "user_id", $data->id, "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>
                                                </div>
                                                <br>
                                                <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th width="20%">MAPS</th>
                                                            <th width="30%">NAMA</th>
                                                            <th width="30%">KEPERLUAN</th>
                                                            <th width="30%">REKOMENDASI/REALISASI</th>
                                                            <th width="10%">#</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($item->result() as $key => $items) { ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="https://maps.google.com/maps?q=<?= $items->lat ?>,<?= $items->lng ?>" target="blank"><img src="<?= base_url() ?>/assets/files/maps/<?= $items->loc_img ?>" alt="" class="imaged w200">
                                                                    <span class="badge <?= $this->fungsi->visitTimes($data->id,$items->lat,$items->lng,$tahun,$bulan)->num_rows() > 1 ? "badge-danger" : "badge-info"?>">Indikasi Dikunjungi Sebanyak : <?= $this->fungsi->visitTimes($data->id,$items->lat,$items->lng,$tahun,$bulan)->num_rows()?>x </span><span class="badge badge-secondary">Kordinat <?= substr($items->lat,0,6) ?>,<?= substr($items->lng,0,7) ?></span>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?= $items->nama ?> (<?= $items->brand ?>) / <a href="https://wa.me/+62<?= $items->hp ?>" target="blank"><?= $items->hp ?></a>.<br>
                                                                    <small>Kunjungan Ke <?= $items->tipe?> pada <?= $items->created?></small>
                                                                </td>
                                                                <td><?= $items->tujuan ?></td>
                                                                <td><?= $items->rekomendasi ?><br><?= $items->realisasi ?></td>
                                                                <td>
                                                                    <a href="<?= site_url('laporan/detailTP/' . $data->id) ?>" class="btn btn-primary btn-sm"><ion-icon name="eye-outline"></ion-icon></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- * <?= $data->nama ?> -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * App Capsule -->

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("grafikKunjungan", {
            exportEnabled: true,
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Berdasarkan Jumlah Kunjungan ke Koperasi / UKM"
            },
            legend: {
                cursor: "pointer",
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y} kunjungan Koperasi / UKM</strong>",
                indexLabel: "{name} - {y}",
                dataPoints: [
                    <?php foreach ($row->result() as $key => $data) {; ?> {
                            y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                            name: "<?= $data->nama ?>"
                        },
                    <?php } ?>
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("grafikKunjungan2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Berdasarkan Jumlah Kunjungan"
            },
            axisY: {
                title: "Jumlah"
            },
            data: [{
                    type: "column",
                    name: "Kunjungan ke Kantor",
                    legendText: "Kunjungan Ke Koperasi",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                },
                {
                    type: "column",
                    name: "Kunjungan Ke UKM",
                    legendText: "Kunjungan Ke UKM",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                },
                {
                    type: "column",
                    name: "Kunjungan Ke Lainnya",
                    legendText: "Kunjungan Ke Lainnya",
                    axisYType: "secondary",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date($tahun) . "-" . date($bulan), $data->id)->num_rows() ?>,
                                label: "<?= $data->nama ?>"
                            },
                        <?php } ?>
                    ]
                }
            ]
        });
        chart.render();
    }
</script>