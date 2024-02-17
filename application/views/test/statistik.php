<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Selamat Datang</h1>
    <p>Fitrah Izul Falaq</p>

    <div>
        <canvas id="pelatihanKoperasiChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        /*
  Chart Pelatihan Koperasi
*/
        var ctx = document.getElementById('pelatihanKoperasiChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'Koperasi',
                    'UKM',
                    'Lainnya',
                ],
                datasets: [{
                    label: 'Jumlah User',
                    backgroundColor: [
                        'green',
                        'red',
                        'blue',
                    ],
                    data: [
                        <?= $this->fungsi->loadDataLike2("tb_kunjungan","tipe","koperasi","created",date($tahun)."-".date($bulan),$user_id)->num_rows() ?>,
                        <?= $this->fungsi->loadDataLike2("tb_kunjungan","tipe","ukm","created",date($tahun)."-".date($bulan),$user_id)->num_rows() ?>,
                        <?= $this->fungsi->loadDataLike2("tb_kunjungan","tipe","lainnya","created",date($tahun)."-".date($bulan),$user_id)->num_rows() ?>,
                    ]
                }]
            },
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var allData = data.datasets[tooltipItem.datasetIndex].data;
                            var tooltipLabel = data.labels[tooltipItem.index];
                            var tooltipData = allData[tooltipItem.index];
                            var total = 0;
                            var i;
                            for (i in allData) {
                                total += parseFloat(allData[i]);
                            }
                            console.log(total);
                            var tooltipPercentage = Math.round((tooltipData / total) * 100);
                            return tooltipLabel + ': ' + tooltipData + ' orang (' + tooltipPercentage + '%)';
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>