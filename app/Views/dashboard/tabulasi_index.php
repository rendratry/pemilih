<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="page-title">Cari Data Tabulasi</h2>
                    </div>
                </div>
                <div class="col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Pilih Filter Data</strong>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="<?=base_url("dashboard/admin/data-tabulasi-detail")?>" onsubmit="disableButton()">
                                    <div class="form-group mb-3">
                                        <label for="example-select">Kecamatan</label>
                                        <select name="kecamatan"
                                            class="form-control select2">
                                            <option>Pilih Kecamatan</option>
                                            <option required value="MEJAYAN">MEJAYAN
                                            </option>
                                            <option required value="SARADAN">SARADAN
                                        </select>
                                        <div class="invalid-feedback">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                        <label for="simpleinput">Desa</label>
                        <select required class="custom-select" id="custom-select" name="desa">
                                    <option selected>Pilih Desa</option>
                                    <?php foreach ($desa as $d): ?>
                                    <option value="<?=$d['desa']?>"> <?=$d['desa']?> </option>
                                    <?php endforeach; ?>
                                </select>
                      </div>
                      <div id="formContainer">
                      <!-- Kontainer untuk menampilkan elemen form -->
                      </div>
                      <div class="form-group mb-2">
                        <button id="submitBtn" type="submit" class="btn btn-primary">Lanjutkan</button>
                      </div>
                    </form>
                  </div>
                </div>
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