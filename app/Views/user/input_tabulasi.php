<?php echo $this->include('master_partial/dashboard/header'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <a href="#!" class="avatar avatar-xl">
                        <img src="<?= base_url('../assets/assets/images/kotak-suara.png') ?>" alt="">
                        <!-- <img src="./assets/avatars/face-4.jpg" alt="..." class="avatar-img rounded-circle"> -->
                    </a>
                    <div class="card-text my-2">
                        <strong class="h5 card-title">Tabulasi Pemilih
                            <?= session()->get('name'); ?>
                        </strong>
                        <br>
                        <h6 class="text-muted"><strong>Sistem untuk mengelola data pemilih</strong></h6>
                        <a href="<?= base_url('logout') ?>" type="button" class="btn btn-danger">Logout</a>
                    </div>
                </div> <!-- ./card-text -->
            </div> <!-- /.card -->
        </div>
        <!-- .col-12 -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <form method="POST" action="<?= base_url('dashboard/admin/import_data_pemilih') ?>"
                        enctype="multipart/form-data" id="input-tabulasi" onsubmit="disableButton()">
                        <div class="form-group row">
                            <label class="col-sm-12" for="jumlah_pemilih"><strong>Masukkan Jumlah
                                    Pemilih</strong></label>
                            <div class="col-sm-12">
                                <input name="jumlah_pemilih" type="number" class="form-control" id="jumlah_pemilih"
                                    rows="2" placeholder="Input Disini"></input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12" for="inputPhotoFile"><strong>Unggah Foto Bukti</strong></label>
                            <div class="col-sm-12">
                                <input type="file" class="custom-file-input" id="inputPhotoFile" name="photo_file"
                                    onchange="updateFileName(this)">
                                <label class="custom-file-label" for="inputPhotoFile">Klik untuk unggah</label>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div> <!-- ./card-text -->
            </div> <!-- /.card -->
        </div>
    </div>
</main>
<!-- .col-12 -->
<?php echo $this->include('master_partial/dashboard/footer'); ?>