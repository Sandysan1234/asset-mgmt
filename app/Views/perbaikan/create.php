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
            <h5>Form Tambah Data Perbaikan</h5>
          </div>
          <div class="card-body">
            <form action="/plant/save" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="jenis_perbaikan" class="col-sm-3 col-form-label">Jenis Perbaikan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('jenis_perbaikan')) ? 'is-invalid' : ''; ?>" name="jenis_perbaikan" id="jenis_perbaikan" autofocus value="<?= old('jenis_perbaikan'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('jenis_perbaikan'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                  <textarea class="form-control <?= (validation_show_error('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" aria-label="With textarea"><?= old('keterangan'); ?></textarea>

                  <div class="invalid-feedback">
                    <?= validation_show_error('keterangan'); ?>
                  </div>
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('biaya')) ? 'is-invalid' : ''; ?>" id="biaya" name="biaya" value="<?= old('biaya'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('biaya'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="teknisi" class="col-sm-3 col-form-label">Teknisi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('teknisi')) ? 'is-invalid' : ''; ?>" id="teknisi" name="teknisi" value="<?= old('teknisi'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('teknisi'); ?>
                  </div>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                    <label class="form-check-label" for="gridRadios1">
                      Proses
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1">
                    <label class="form-check-label" for="gridRadios2">
                      Selesai
                    </label>
                  </div>
                </div>
              </fieldset>
              <div class="modal-footer">
                <a href="/perbaikan" class="btn btn-secondary me-3">Close</a>
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
<script>
  let biaya = document.getElementById('biaya');
  biaya.addEventListener('keyup', function(e) {
    biaya.value = formatRupiah(this.value);
  });

  function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>

<!-- [ Main Content ] end -->
<?= $this->endSection(); ?>