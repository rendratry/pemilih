<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="page-title">Data Pemilih</h2>
                    </div>
                </div>
                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                            <form method="POST" action="<?=base_url('dashboard/admin/updatechecklist-data-pemilih');?>" class="mb-3">
                                <!-- table -->
                                <table class="table datatables" id="dataTable-1">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>L/P</th>
                                            <th>Usia</th>
                                            <th>Desa/Kelurahan</th>
                                            <th>RT/RW</th>
                                            <th>TPS</th>
                                            <th>Status Checklist</th>
                                            <th>Checklist</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        <?php foreach ($pemilih as $u): ?>
                                        <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$u->nama?></td>
                                        <td><?=$u->jenis_kelamin?></td>
                                        <td><?=$u->usia?></td>
                                        <td><?=$u->desa_kelurahan?></td>
                                        <td><?=$u->rt?>/<?=$u->rw?></td>
                                        <td><?=$u->tps?></td>
                                        <td>
                                        <?php if ($u->checklist == true): ?>
                                       <span class="text-success">&#10004;</span> <!-- Centang hijau jika true -->
                                        <?php else: ?>
                                           -
                                         <?php endif; ?>
                                        </td>
                                            <td>
                                            <input type="checkbox" name="checklist[]" value="<?=$u->id?>">
                                            </td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                                <div class="form-group mb-2">
                                    <button id="submitBtn" type="submit" class="btn btn-primary">Update Checklist</button>
                                </div>
                                </form>
                                <?php if (!empty($_POST['checklist'])): ?>
                                    <p>Selected items for update: <?= implode(', ', $_POST['checklist']) ?></p>
                                <?php endif; ?>
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