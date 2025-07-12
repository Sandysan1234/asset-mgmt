<!-- [ Main Content ] start -->
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
            <h5>Cost Center</h5>
          </div>
          <div class="card-body">
            <form action="/costcenter/save" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="kode_cost_center" class="col-sm-3 col-form-label">Kode Cost Center</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= (validation_show_error('kode_cost_center')) ? 'is-invalid' : ''; ?>" name="kode_cost_center" id="kode_cost_center" autofocus value="<?= old('kode_cost_center'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('kode_cost_center'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_cost_center" class="col-sm-3 col-form-label">Nama Cost Center</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= (validation_show_error('nama_cost_center')) ? 'is-invalid' : ''; ?>" id="nama_cost_center" name="nama_cost_center" value="<?= old('nama_cost_center'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('nama_cost_center'); ?>
                  </div>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                <div class="col-sm-8">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Aktif
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0">
                    <label class="form-check-label" for="gridRadios2">
                      Nonaktif
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="modal-footer">
                <a href="/costcenter" class="btn btn-secondary me-3">Close</a>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
</div>
<!-- [ Main Content ] end -->
<?= $this->endSection(); ?>