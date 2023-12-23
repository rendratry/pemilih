<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card profile shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <a href="#!" class="avatar avatar-xl">
                                    <img src="<?= base_url('../assets/assets/images/nafa.png') ?>" alt="..."
                                        class="avatar-img rounded-circle">
                                </a>
                                <div class="card-text my-2">
                                    <strong class="h5 card-title">Nafa</strong>
                                    <br>
                                    <h6 class="text-muted">Dapil 1 Kabupaten Madiun</h6>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">Total Jumlah Pemlih <span
                                                class="badge badge-success">update</span></h4>
                                    </div>
                                    <div class="col">
                                    </div>
                                </div>
                                <br>
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        <p class="text-muted">Total Dapil 1 :</p>
                                        <h1 id="totalPemilih" class="mb-1"><i class="fe fe-users fe-16"></i> <?=$totalMejayan + $totalSaradan?></h1>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <p class="text-muted">Mejayan :</p>
                                            <h3 id="totalMejayan" class="mb-1"><i class="fe fe-users fe-16"></i> <?=$totalMejayan?></h3>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <p class="text-muted">Saradan :</p>
                                            <h3 id="totalSaradan" class="mb-1"><i class="fe fe-users fe-16"></i> <?=$totalSaradan?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .row- -->
                    </div> <!-- / .card-body - -->
                </div> <!-- / .card- -->
            </div> <!-- / .col- -->
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        <strong class="card-title mb-0">Mejayan</strong>
                    </div>
                    <div class="card-body">
                        <canvas id="barChartjs1" width="400" height="300"></canvas>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /. col -->
            <!-- .col-12 -->
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-header">
                        <strong class="card-title mb-0">Saradan</strong>
                    </div>
                    <div class="card-body">
                        <canvas id="barChartjs2" width="300" height="200"></canvas>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /. col -->
            <!-- .col-12 -->
        </div>
    </div>
    <!-- .row -->
    </div>
</main>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen canvas
    var ctx1 = document.getElementById('barChartjs1').getContext('2d');
    var ctx2 = document.getElementById('barChartjs2').getContext('2d');

    // Fungsi untuk memperbarui grafik batang
    function updateBarChart(chart, labels, data) {
        chart.data.labels = labels;
        chart.data.datasets[0].data = data;
        chart.update();
    }

    // Fungsi untuk memanggil latest data dan memperbarui grafik
    function fetchDataAndUpdateCharts() {
        $.ajax({
            url: '/dashboard/admin/get-latest-data',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Perbarui total pemilih
                $('#totalPemilih').html('<i class="fe fe-users fe-16"></i> ' + (data.totalMejayan + data.totalSaradan));
                $('#totalMejayan').html('<i class="fe fe-users fe-16"></i> ' + data.totalMejayan);
                $('#totalSaradan').html('<i class="fe fe-users fe-16"></i> ' + data.totalSaradan);


                // Perbarui data grafik batang Mejayan
                updateBarChart(myBarChart1, data.mejayan.labels, data.mejayan.data);

                // Perbarui data grafik batang Saradan
                updateBarChart(myBarChart2, data.saradan.labels, data.saradan.data);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    }

    // Setel interval polling (misalnya, setiap 5 detik)
    setInterval(fetchDataAndUpdateCharts, 5000);

    // Inisialisasi grafik batang Mejayan
    var myBarChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?= json_encode($mejayan['labels']) ?>,
            datasets: [{
                label: 'Pemilih',
                barThickness: 20,
                backgroundColor: base.primaryColor,
                borderColor: base.primaryColor,
                pointRadius: !1,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: <?= json_encode($mejayan['data']) ?>,
                lineTension: 0.1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Inisialisasi grafik batang Saradan
    var myBarChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?= json_encode($saradan['labels']) ?>,
            datasets: [{
                label: 'Pemilih',
                barThickness: 20,
                backgroundColor: base.primaryColor,
                borderColor: base.primaryColor,
                pointRadius: !1,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: <?= json_encode($saradan['data']) ?>,
                lineTension: 0.2,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<?php echo $this->include('master_partial/dashboard/footer'); ?>