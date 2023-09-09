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

            </div>
            <!-- .col-12 -->
        </div>
        <!-- .row -->
    </div>


</main>
<?php echo $this->include('master_partial/dashboard/footer'); ?>