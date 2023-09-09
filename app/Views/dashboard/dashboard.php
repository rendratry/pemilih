<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <a href="#!" class="avatar avatar-xl">
                            <img src="<?= base_url('../assets/assets/images/kotak-suara.png') ?>" alt="">
                            <!-- <img src="./assets/avatars/face-4.jpg" alt="..." class="avatar-img rounded-circle"> -->
                        </a>
                        <p><span class="badge badge-pill badge-info">DASHBOARD ADMIN PEMILIH</span></p>
                        <div class="card-text my-2">
                            <strong class="h5 card-title">Selamat Datang, <?= session()->get('name'); ?></strong>
                            <br>
                            <h6 class="text-muted"><strong>Sistem untuk mengelola data pemilih</strong></h6>
                        </div>
                    </div> <!-- ./card-text -->
                </div> <!-- /.card -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body text-center">
                                <div class="avatar avatar-lg mt-4">
                                    <a href="">
                                        <i class="fe fe-user" style="font-size: 4em;"></i>
                                    </a>
                                </div>
                                <div class="card-text my-2">
                                    <p class="card-title my-0">Pemilih Kecamatan Mejayan</p>
                                    <p><strong><?= $jumlah_pemilih_mejayan; ?></strong></p>
                                </div>
                            </div> <!-- ./card-text -->
                        </div>
                    </div> <!-- .col -->
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body text-center">
                                <div class="avatar avatar-lg mt-4">
                                    <a href="">
                                        <i class="fe fe-user" style="font-size: 4em;"></i>
                                    </a>
                                </div>
                                <div class="card-text my-2">
                                    <p class="card-title my-0">Pemilih Kecamatan Saradan</p>
                                    <p><strong><?= $jumlah_pemilih_saradan; ?></strong></p>
                                </div>
                            </div> <!-- ./card-text -->
                        </div>
                    </div> <!-- .col -->
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body text-center">
                                <div class="avatar avatar-lg mt-4">
                                    <a href="">
                                        <i class="fe fe-user" style="font-size: 4em;"></i>
                                    </a>
                                </div>
                                <div class="card-text my-2">
                                    <p class="card-title my-0">Chekclist Kecamatan Mejayan</p>
                                    <p><strong><?= $jumlah_checklist_mejayan; ?></strong></p>
                                </div>
                            </div> <!-- ./card-text -->
                        </div>
                    </div> <!-- .col -->
                    <div class="col-md-3">
                        <div class="card shadow mb-4">
                            <div class="card-body text-center">
                                <div class="avatar avatar-lg mt-4">
                                    <a href="">
                                        <i class="fe fe-user" style="font-size: 4em;"></i>
                                    </a>
                                </div>
                                <div class="card-text my-2">
                                    <p class="card-title my-0">Checklist Kecamatan Saradan</p>
                                    <p><strong><?= $jumlah_checklist_saradan; ?></strong></p>
                                </div>
                            </div> <!-- ./card-text -->
                        </div>
                    </div> <!-- .col -->
                </div>
                <!-- .row-->
            </div>
            <!-- .col-12 -->
        </div>
            </div>
            <!-- .col-12 -->
        </div>
        <!-- .row -->
    </div>


</main>
<?php echo $this->include('master_partial/dashboard/footer'); ?>