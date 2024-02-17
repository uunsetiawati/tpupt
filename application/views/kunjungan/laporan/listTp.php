<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mt-2">
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <h3>DATA TENAGA PENDAMPING</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div style="overflow-x:auto;">
                                    <table id="full" class="<table table-striped table-bordered table-hover table-full-width dataTable" id="list">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="20%">Nama Tenaga Pendamping</th>
                                                <th width="20%">Rencana Kerja</th>
                                                <th width="10%">Estimasi Jarak</th>
                                                <th width="10%">Total Kunjungan</th>
                                                <th width="40%">Laporan Bulan Ini</th>
                                                <th width="10%">Action</th>
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
                                                    <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_target", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("target/perintah?aksi=download&tahun=2023&token=" . base64_encode($data->id)) ?>" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-download"></i> Download RK</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?= $this->fungsi->totalJarak($data->id) ?></td>
                                                    <td><?= $this->fungsi->totalKunjunganBulanIni($data->id) ?></td>
                                                    <td>
                                                        <?php if ($this->fungsi->loadDataLike1("tb_laporan", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() != null) { ?>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=surat_tugas&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Surat Tugas</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=sppd&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> SPPD</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=surat_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Kunjungan</a>
                                                            <a href="<?= base_url("laporan/perintah?aksi=download&tahun=" . date("Y") . "&bulan=" . date("m") . "&jenis=laporan_kunjungan&token=" . base64_encode($data->id)) ?>" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Laporan Kunjungan</a>
                                                        <?php } else { ?>
                                                            <span class='badge badge-danger'>Belum Upload</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><a href="<?= site_url('laporan/detailTP/' . $data->id) ?>" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
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
                    <div class="card">
                        <div class="card-body">
                            <div id="grafikKunjungan2" style="height: 300px; max-width: 1200px; margin: 0px auto;"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>
<!-- * App Capsule -->


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
    window.onload = function() {
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
                    name: "Kunjungan ke Koperasi",
                    legendText: "Kunjungan Ke Koperasi",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($row->result() as $key => $data) {; ?> {
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() ?>,
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
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() ?>,
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
                                y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "lainnya", "created", date("Y") . "-" . date("m"), $data->id)->num_rows() ?>,
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