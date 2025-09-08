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
            <form action="/perbaikan/update/<?= $repair['id_perbaikan'];?>" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Asset</label>
                <div class="col-sm-6">
                  <select name="id_asset" autofocus id="id_asset" class="form-select col-sm-6 <?= (validation_show_error('id_asset')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" disabled>
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($assets as $asset) : ?>
                      <option value="<?= $asset['id_asset']; ?>" <?= old('id_asset', $repair['id_asset']) == $asset['id_asset'] ? 'selected' : ''; ?>>
                        <?= $asset['nama_asset']; ?> - <?= $asset['no_asset']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="jenis_perbaikan" class="col-sm-3 col-form-label">Jenis Perbaikan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('jenis_perbaikan')) ? 'is-invalid' : ''; ?>" name="jenis_perbaikan" id="jenis_perbaikan" required value="<?= old('jenis_perbaikan',$repair['jenis_perbaikan']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('jenis_perbaikan'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                  <textarea class="form-control <?= (validation_show_error('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" aria-label="With textarea" required><?= old('keterangan', $repair['keterangan']); ?></textarea>

                  <div class="invalid-feedback">
                    <?= validation_show_error('keterangan'); ?>
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label for="biaya" class="col-sm-3 col-form-label">Biaya</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('biaya')) ? 'is-invalid' : ''; ?>" id="biaya" name="biaya" value="<?= old('biaya', $repair['biaya']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('biaya'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="teknisi" class="col-sm-3 col-form-label">Teknisi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('teknisi')) ? 'is-invalid' : ''; ?>" id="teknisi" name="teknisi" value="<?= old('teknisi', $repair['teknisi']); ?>" required>
                  <div class="invalid-feedback">
                    <?= validation_show_error('teknisi'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="durasi" class="col-sm-3 col-form-label">Durasi</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('durasi')) ? 'is-invalid' : ''; ?>" id="durasi" required name="durasi" value="<?= old('durasi', $repair['durasi']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('durasi'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tgl_awal" class="col-sm-3 col-form-label">Mulai Perbaikan</label>
                <div class="col-sm-6">
                  <input type="datetime-local" class="form-control <?= (validation_show_error('tgl_awal')) ? 'is-invalid' : ''; ?>" id="tgl_awal" name="tgl_awal" value="<?= old('tgl_awal', $repair['tgl_awal']); ?>" required>
                  <div class="invalid-feedback">
                    <?= validation_show_error('tgl_awal'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tgl_akhir" class="col-sm-3 col-form-label">Selesai Perbaikan</label>
                <div class="col-sm-6">
                  <input type="datetime-local" class="form-control <?= (validation_show_error('tgl_akhir')) ? 'is-invalid' : ''; ?>" id="tgl_akhir" name="tgl_akhir" value="<?= old('tgl_akhir', $repair['tgl_akhir']); ?>" required>
                  <div class="invalid-feedback">
                    <?= validation_show_error('tgl_akhir'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="place" class="col-sm-3 col-form-label">Tempat Perbaikan</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('place')) ? 'is-invalid' : ''; ?>" id="place" name="place" value="<?= old('place'),$repair['place']; ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('place'); ?>
                  </div>
                </div>
              </div>

              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0">
                    <label class="form-check-label" for="gridRadios1">
                      Proses
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
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