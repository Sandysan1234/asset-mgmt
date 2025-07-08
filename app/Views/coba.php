<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
  <div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <!-- <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Sample Page</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Pemasok</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <?= validation_list_errors(); ?>
              <?= form_open('form'); ?>
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="kode_vendor" class="col-sm-3 col-form-label">Kode Vendor</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="kode_vendor" id="kode_vendor" autofocus>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_vendor" class="col-sm-3 col-form-label">Nama Vendor</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nama_vendor" name="nama_vendor">
                </div>
              </div>
              <div class="row mb-3">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <textarea class="form-control" id="alamat" name="alamat" aria-label="With textarea"></textarea>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                    <label class="form-check-label" for="status1">
                      Aktif
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                    <label class="form-check-label" for="status0">
                      Nonaktif
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
              <?= form_close(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>


<!-- [ Main Content ] end -->
<?= $this->endSection('page-content'); ?>