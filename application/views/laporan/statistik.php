<!-- App Capsule -->
<div id="appCapsule">
    <div class="section full mb-2">
        <div class="tab-content">

            <!-- feed -->
            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-6 mb-2">
                            <div id="chartContainer" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                        <div class="col-6 mb-2">
                            <div id="chartContainer2" style="height: 300px; max-width: 920px; margin: 0px auto;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="tab-pane fade show active" id="feed" role="tabpanel">
                <div class="mt-2 pr-2 pl-2">
                    <div class="row">
                        <div class="col-6 mb-2">
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
                                                    <?php $no = "1"; foreach ($leaderboard->result() as $key => $data) { ?>
                                                    <tr>
                                                        <td scope="row">
                                                            <p><?= $no++ ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $this->fungsi->nama($data->user_id) ?></p>
                                                        </td>
                                                        <td>
                                                            <p><?= $data->total_score ?></p>
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
                        <div class="col-6 mb-2">
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
                                                    <tr>
                                                        <td scope="row">
                                                            <p>1</p>
                                                        </td>
                                                        <td>
                                                            <p>nama</p>
                                                        </td>
                                                        <td>
                                                            <p>1500</p>
                                                        </td>
                                                    </tr>
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

            <div class="section full mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div style="overflow-x:auto;">
                                <table id="full" class="table-striped table-bordered table-hover table-full-width dataTable">
                                    <h2>Berdasarkan Lokasi Kunjungan</h2>
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40">Maps</th>
                                            <th width="40%">Nama</th>
                                            <th width="30%">Keperluan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">
                                                <p>1</p>
                                            </td>
                                            <td>
                                                <p>Maps</p>
                                            </td>
                                            <td>
                                                <p>Dian</p>
                                            </td>
                                            <td>
                                                <p>Pembuatan NIB</P>
                                            </td>
                                        </tr>
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
<!-- * App Capsule -->

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
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
                toolTipContent: "{name}: <strong>{y}%</strong>",
                indexLabel: "{name} - {y}",
                dataPoints: [{
                        y: 26,
                        name: "UKM : ANAS"
                    },
                    {
                        y: 20,
                        name: "KOPERASI : DEDY"
                    }
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer2", {
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
                color: "teal",
                // showInLegend: true, 
                // legendMarkerColor: "grey",
                // legendText: "MMbbl = one million barrels",
                dataPoints: [{
                        y: 100,
                        label: "Venezuela"
                    },
                    {
                        y: 90,
                        label: "Saudi"
                    },
                    {
                        y: 80,
                        label: "Canada"
                    },
                    {
                        y: 70,
                        label: "Iran"
                    },
                    {
                        y: 60,
                        label: "Iraq"
                    },
                    {
                        y: 50,
                        label: "Kuwait"
                    }
                ]
            }]
        });
        chart.render();
    }
</script>