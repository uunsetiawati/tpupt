<div class="tab-pane fade show active" id="feed" role="tabpanel">
    <div class="mt-2 pr-2 pl-2">
        <div class="row">
            <div class="col-12 mb-2">
                <div id="grafikTotalKunjungan" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
            </div>
            <hr>
            <div class="col-12 mb-2">
                <div id="grafikTotalKunjungan2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
            </div>
            <hr>
            <div class="col-12 mb-2">
                <div id="grafikTotalKunjungan2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("grafikTotalKunjungan", {
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
                            y: <?= $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "koperasi", "created", date($tahun) . "-" . date($bulan))->num_rows() + $this->fungsi->loadDataLike2("tb_kunjungan", "tipe", "ukm", "created", date($tahun) . "-" . date($bulan))->num_rows() ?>,
                            name: "<?= $data->nama ?>"
                        },
                    <?php } ?>
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("grafikTotalKunjungan2", {
            animationEnabled: true,
            theme: "light2", // "light1", "light2", "dark1", "dark2"
            title: {
                text: "Berdasarkan Jumlah Kunjungan ke Kantor"
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