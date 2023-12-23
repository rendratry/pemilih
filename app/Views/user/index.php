<?php echo $this->include('master_partial/dashboard/header'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <a href="#!" class="avatar avatar-xl">
                        <img class="avatar-img rounded-circle" src="<?= base_url('../assets/assets/images/nafa.png') ?>" alt="">
                        <!-- <img src="./assets/avatars/face-4.jpg" alt="..." class="avatar-img rounded-circle"> -->
                    </a>
                    <div class="card-text my-2">
                        <strong class="h5 card-title">Tabulasi Pemilih Kecamatan
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
        <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="page-title">Pilih Desa</h2>
                    </div>
                </div>
            <div class="card shadow mb-4">
                <div class="card-body text-center">
                    <form method="POST" action="<?= base_url('tabulasi/tps/pilih-tps') ?>"
                        enctype="multipart/form-data" id="importPemilih" onsubmit="disableButton()">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select required class="custom-select" id="custom-select" name="desa">
                                    <option selected>Pilih Desa</option>
                                    <?php foreach ($desa as $d): ?>
                                    <option value="<?=$d['desa']?>"> <?=$d['desa']?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="inputPhotoFile" class="col-sm-3 col-form-label">Import Data Pemilih</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputPhotoFile" name="photo_file"
                                        onchange="updateFileName(this)">
                                    <label class="custom-file-label" for="inputPhotoFile">Pilih Excel Disini</label>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group mb-2">
                            <button id="submitBtn" type="submit" class="btn btn-primary">Lanjutkan</button>
                        </div>
                    </form>
                </div> <!-- ./card-text -->
            </div> <!-- /.card -->
        </div>
    </div>
</main>
<!-- .col-12 -->
<?php echo $this->include('master_partial/dashboard/footer'); ?>