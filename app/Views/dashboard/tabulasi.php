<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="page-title">Data Tabulasi</h2>
                    </div>
                </div>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Kecamatan</th>
                                            <th>Desa</th>
                                            <th>TPS</th>
                                            <th>Jumlah Pemilih</th>
                                            <th>Bukti Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($tabulasi as $u): ?>
                                        <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$u->kecamatan?></td>
                                        <td><?=$u->desa?></td>
                                        <td><?=$u->tps?></td>
                                        <td><?=$u->hasil?></td>
                                        <td><?=$u->foto?></td>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- simple table -->
                </div>
                <!-- end section -->
            </div>
            <!-- .col-12 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container-fluid -->
</main>
<?php echo $this->include('master_partial/dashboard/footer'); ?>