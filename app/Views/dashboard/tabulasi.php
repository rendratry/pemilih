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
                                            <th>Action</th>
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
                                        <td>
                                        <?php if ($u->foto != ""): ?>
                                            <a href="<?=base_url('tabulasi_assets/' . $u->foto)?>" target="_blank" class="fe fe-image fe-16"></a>
                                         <?php else: ?>
                                            -
                                            <?php endif ?>
                                        </td>
                                        <td><a href="<?=base_url('dashboard/admin/edit-data-tabulasi/' . $u->id)?>" class="fe fe-edit fe-16"></a></td>
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