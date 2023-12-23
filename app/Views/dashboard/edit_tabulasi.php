<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="page-title">Edit Data Tabulasi</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header">
              <strong class="card-title">Edit Data</strong>
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url("dashboard/admin/update-tabulasi/". $tabulasi->id) ?>"
                onsubmit="disableButton()">
                <div class="form-group mb-3">
                  <label for="simpleinput">Kecamatan</label>
                  <input type="text" id="simpleinput" value="<?=$tabulasi->kecamatan?>" name="kecamatan" disabled class="form-control"
                    required>
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">Desa</label>
                  <input type="text" id="simpleinput" value="<?=$tabulasi->desa?>" disabled name="desa" class="form-control"
                    required>
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">TPS</label>
                  <input type="text" id="simpleinput" value="<?=$tabulasi->tps?>" disabled name="tps" class="form-control"
                    required>
                </div>
                <div class="form-group mb-3">
                  <label for="simpleinput">Jumlah Pemilih</label>
                  <input type="number" id="simpleinput" value="<?=$tabulasi->hasil?>" name="hasil" class="form-control"
                    required>
                </div>
            <div class="form-group mb-2">
              <button id="submitBtn" type="submit" class="btn btn-primary">Update</button>
              <a href="<?= base_url('dashboard/admin/back-data-tabulasi')?>" class="btn btn-danger">Batal</a>
            </div>
            </form>
            </div>
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