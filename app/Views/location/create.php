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
            <h5>Form Tambah Data Location</h5>
          </div>
          <div class="card-body">
            <form action="/Location/save" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="kode_location" class="col-sm-3 col-form-label">Kode Location</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= (validation_show_error('kode_location')) ? 'is-invalid' : ''; ?>" name="kode_location" id="kode_location" autofocus value="<?= old('kode_location'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('kode_location'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_location" class="col-sm-3 col-form-label">Nama Location</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control <?= (validation_show_error('nama_location')) ? 'is-invalid' : ''; ?>" id="nama_location" name="nama_location" value="<?= old('nama_location'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('nama_location'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="lantai" class="col-sm-3 col-form-label">Lantai</label>
                <div class="col-sm-8">
                  <textarea class="form-control <?= (validation_show_error('lantai')) ? 'is-invalid' : ''; ?>" id="lantai" name="lantai" aria-label="With textarea"><?= old('lantai'); ?></textarea>

                  <div class="invalid-feedback">
                    <?= validation_show_error('lantai'); ?>
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
                <a href="/location" class="btn btn-secondary me-3">Close</a>
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
<!-- [ Main Content ] end -->
<?= $this->endSection(); ?>