<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mb-2">
        <div class="tab-content">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url() ?>/laporan/statistik/" enctype="multipart/form-data" method="get" accept-charset="utf-8">
                        <div class="input-group mb-3">
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
                            <a href="<?= base_url("dashboard") ?>" class="btn btn-info float-right">Kembali <i class="fa fa-fw fa-angle-double-left" aria-hidden="true"></i></a>
                        </div>
                    </form>
                    <a class="btn btn-block btn-warning" href="<?= base_url() ?>/laporan/statistik?wilayah_kerja=40&tahun=<?= $tahun ?>&bulan=<?= $bulan ?>">Lihat Statistik Per Daerah</a>
                </div>
            </div>


            <hr>

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div id="chartContainer2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div id="chartContainer3" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
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

        var chart = new CanvasJS.Chart("chartContainer", {
            exportEnabled: true,
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Jumlah Tenaga Pendamping"
            },
            legend: {
                cursor: "pointer",
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}</strong>",
                indexLabel: "{name} - {y}",
                dataPoints: [{
                        y: <?= $k_tp_ukm->num_rows() ?>,
                        name: "UKM"
                    },
                    {
                        y: <?= $k_tp_koperasi->num_rows() - 1   ?>,
                        name: "KOPERASI"
                    }
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer2", {
            exportEnabled: true,
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Total Kunjungan <?= $bulan ?> / <?= $tahun ?> sejumlah <?= $k_kunjungan_ukm->num_rows() + $k_kunjungan_koperasi->num_rows() + $k_kunjungan_lainnya->num_rows()  ?>"
            },
            legend: {
                cursor: "pointer",
            },
            data: [{
                type: "pie",
                showInLegend: true,
                toolTipContent: "{name}: <strong>{y}</strong>",
                indexLabel: "{name} - {y}",
                dataPoints: [{
                        y: <?= $k_kunjungan_ukm->num_rows()   ?>,
                        name: "UKM"
                    },
                    {
                        y: <?= $k_kunjungan_koperasi->num_rows()   ?>,
                        name: "KOPERASI"
                    },
                    {
                        y: <?= $k_kunjungan_lainnya->num_rows()   ?>,
                        name: "LAINNYA"
                    }
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            zoomEnabled: true, 
            title: {
                text: "Berdasarkan Rata2 Poin TP Per Daerah <?= $bulan ?> / <?= $tahun ?>"
            },
            axisY: {
                title: "Jumlah"
            },
            data: [{
                    type: "column",
                    name: "Kunjungan Perdaerah",
                    // legendText: "Kunjungan Ke Koperasi",
                    showInLegend: true,
                    dataPoints: [
                        <?php foreach ($daerah->result() as $key => $data) {; ?> {
                                y: <?= $this->fungsi->getPoinCustom("wilayah_kerja",$data->id,date($tahun),date($bulan))->row("poin") / $this->fungsi->pilihan_advanced("tb_user","wilayah_kerja",$data->id)->num_rows() ?>,
                                label: "<?= $data->kota ?>"
                            },
                        <?php } ?>
                    ]
                }
                
            ]
        });
        chart.render();
    }
</script>