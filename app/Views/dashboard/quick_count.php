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
                                        <h1 class="mb-1"><i class="fe fe-users fe-16"></i> 700</h1>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <p class="text-muted">Mejayan :</p>
                                            <h3 class="mb-1"><i class="fe fe-users fe-16"></i> 350</h3>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12">
                                            <p class="text-muted">Saradan :</p>
                                            <h3 class="mb-1"><i class="fe fe-users fe-16"></i> 350</h3>
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
        var ctx = document.getElementById('barChartjs1').getContext('2d');

        // Data untuk grafik
        var data = {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
            datasets: [{
                label: 'Data Set 1',
                barThickness: 50,
                backgroundColor: base.primaryColor,
                borderColor: base.primaryColor,
                pointRadius: !1,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [19, 64, 37, 70],
                lineTension: 0.1,
            }]
        };

        // Konfigurasi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Buat objek grafik batang
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil elemen canvas
        var ctx = document.getElementById('barChartjs2').getContext('2d');

        // Data untuk grafik
        var data = {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
            datasets: [{
                label: 'Data Set 1',
                barThickness: 50,
                backgroundColor: base.primaryColor,
                borderColor: base.primaryColor,
                pointRadius: !1,
                pointColor: "#3b8bba",
                pointStrokeColor: "rgba(60,141,188,1)",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(60,141,188,1)",
                data: [19, 64, 37, 76],
                lineTension: 0.2,
            }]
        };

        // Konfigurasi grafik
        var options = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Buat objek grafik batang
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>

<?php echo $this->include('master_partial/dashboard/footer'); ?>