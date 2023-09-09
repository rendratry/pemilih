<?php echo $this->include('master_partial/dashboard/header'); ?>
<?php echo $this->include('master_partial/dashboard/top_menu'); ?>
<?php echo $this->include('master_partial/dashboard/side_menu'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="page-title">Import Data Pemilih</h2>
                    </div>
                </div>
                <div class="row my-4">
                <div class="col-md-12">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <strong class="card-title">Import data</strong>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="<?=base_url('import_data_pemilih')?>" enctype="multipart/form-data" id="importPemilih" onsubmit="disableButton()">
                    <div class="form-group row">
    <label class="col-sm-3 col-form-label">Pilih Kecamatan</label>
    <div class="col-sm-9">
        <select name="kecamatan" id="kecamatan" class="form-control select2">
            <option>Pilih Kecamatan</option>
            <option value="MEJAYAN">MEJAYAN</option>
            <option value="SARADAN">SARADAN</option>
        </select>
    </div>
</div>

                      <div class="form-group row">
                                            <label for="inputExcelFile" class="col-sm-3 col-form-label">Import Data Pemilih</label>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputExcelFile" name="excel_file" onchange="updateFileName(this)">
                                                   <label class="custom-file-label" for="inputExcelFile">Pilih Excel Disini</label>
                                                </div>
                                            </div>
                                        </div>
                      <div class="form-group mb-2">
                        <button id="submitBtn" type="submit" class="btn btn-primary">Import</button>
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
<script>
    function disableButton() {
    var submitBtn = document.getElementById("submitBtn");
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengimport...';
    submitBtn.disabled = true;
  }
  function updateFileName(input) {
    var fileName = input.value.split("\\").pop();
    var label = input.nextElementSibling;
    label.innerHTML = fileName;
}

</script>
<?php echo $this->include('master_partial/dashboard/footer'); ?>