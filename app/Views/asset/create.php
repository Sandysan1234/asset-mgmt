<!-- [ Main Content ] start -->
<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
  <div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">Tambah Asset</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Tambah Asset</h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>Tambah Asset</h5>
          </div>
          <div class="card-body">
            <form action="/asset/save" class="row" method="post">
              <?= csrf_field(); ?>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="kategori_asset" class="form-label">Kategori Asset</label>
                  <select name="kategori_asset" class="form-select <?= validation_show_error('kategori_asset') ? 'is-invalid' : ''; ?>" aria-label="Pilih kategori asset">
                    <option value="" disabled <?= old('kategori_asset') === null ? 'selected' : ''; ?>>Pilih yang sesuai</option>
                    <option value="asset" <?= old('kategori_asset') == 'asset' ? 'selected' : ''; ?>>Asset</option>
                    <option value="non" <?= old('kategori_asset') == 'non' ? 'selected' : ''; ?>>Non-Asset</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('kategori_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Asset Class</label>
                  <select name="id_assetclass" class="form-select col-sm-6 <?= (validation_show_error('id_assetclass')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($assetclass as $as) : ?>
                      <option value="<?= $as['id_assetclass']; ?>" <?= old('id_assetclass') == $as['id_assetclass'] ? 'selected' : ''; ?>>
                        <?= $as['nama_assetclass']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_assetclass'); ?>
                  </div>
                </div>
              </div>




              <div class="col-md-6">
                <div class="mb-3">
                  <label for="no_asset" class="form-label">No Asset</label>
                  <input type="text" class="form-control <?= (validation_show_error('no_asset')) ? 'is-invalid' : ''; ?>" name="no_asset" id="no_asset" autofocus value="<?= old('no_asset'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('no_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="sub_asset" class="form-label">Sub Asset</label>
                  <input type="text" class="form-control <?= (validation_show_error('sub_asset')) ? 'is-invalid' : ''; ?>" id="sub_asset" name="sub_asset" value="<?= old('sub_asset'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('sub_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="nama_asset" class="form-label">Nama Asset</label>
                  <input type="text" class="form-control <?= (validation_show_error('nama_asset')) ? 'is-invalid' : ''; ?>" id="nama_asset" name="nama_asset" value="<?= old('nama_asset'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('nama_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="serial_number" class="form-label">Serial Number</label>
                  <input type="text" class="form-control <?= (validation_show_error('serial_number')) ? 'is-invalid' : ''; ?>" id="serial_number" name="serial_number" maxlength="20" value="<?= old('serial_number'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('serial_number'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="batch_number" class="form-label">Batch Number</label>
                  <input type="text" class="form-control <?= (validation_show_error('batch_number')) ? 'is-invalid' : ''; ?>" id="batch_number" name="batch_number" maxlength="10" value="<?= old('batch_number'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('batch_number'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="merek" class="form-label">Merek</label>
                  <input type="text" class="form-control <?= (validation_show_error('merek')) ? 'is-invalid' : ''; ?>" id="merek" name="merek" value="<?= old('merek'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('merek'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="mb-3">
                  <label for="spek" class="form-label">Spesifikasi</label>
                  <textarea class="form-control <?= (validation_show_error('spek')) ? 'is-invalid' : ''; ?>" id="spek" name="spek"><?= old('spek'); ?></textarea>
                  <div class="invalid-feedback">
                    <?= validation_show_error('spek'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
                  <input type="datetime-local" class="form-control <?= (validation_show_error('tgl_perolehan')) ? 'is-invalid' : ''; ?>" id="tgl_perolehan" name="tgl_perolehan" value="<?= old('tgl_perolehan'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('tgl_perolehan'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="harga" class="form-label">Harga</label>
                  <input type="text" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('harga'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="no_po" class="form-label">No. Purchase Order</label>
                  <input type="number" class="form-control <?= (validation_show_error('no_po')) ? 'is-invalid' : ''; ?>" id="no_po" name="no_po" value="<?= old('no_po'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('no_po'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Cost Center</label>
                  <select name="id_cost_center" class="form-select col-sm-6 <?= (validation_show_error('id_cost_center')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($cost_center as $cs) : ?>
                      <option value="<?= $cs['id_cost_center']; ?>" <?= old('id_cost_center') == $cs['id_cost_center'] ? 'selected' : ''; ?>>
                        <?= $cs['nama_cost_center']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_cost_center'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="id_lifetime" class="form-label">Masa Berlaku</label>
                  <select name="id_lifetime" class="form-select col-sm-6 <?= (validation_show_error('id_lifetime')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($lifetime as $lf) : ?>
                      <option value="<?= $lf['id_lifetime']; ?>" <?= old('id_lifetime') == $lf['id_lifetime'] ? 'selected' : ''; ?>>
                        <?= $lf['masa_berlaku']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lifetime'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">PIC</label>
                  <select name="id_pic" id="id_pic" class="form-select col-sm-6 <?= (validation_show_error('id_pic')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" required>
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($pic_users as $user): ?>
                      <option value="<?= $user->id ?>" <?= old('id_pic') == $user->id ? 'selected' : ''; ?>>
                        <?= esc($user->fullname ?? $user->username) ?>
                        <?php if (!empty($user->email)): ?>
                          (<?= esc($user->email) ?>)
                        <?php endif ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_pic'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Plant</label>
                  <select name="id_plant" id="id_plant" class="form-select col-sm-6 <?= (validation_show_error('id_plant')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                    <?php foreach ($plant as $pl) : ?>
                      <option value="<?= $pl['id_plant']; ?>" <?= old('id_plant') == $pl['id_plant'] ? 'selected' : ''; ?>>
                        <?= $pl['nama_plant']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_plant'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Area</label>
                  <select name="id_lokasi_area" id="id_lokasi_area" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_area')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi_area'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Gedung</label>
                  <select name="id_lokasi_gedung" id="id_lokasi_gedung" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_gedung')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi_gedung'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Lantai</label>
                  <select name="id_lokasi_lantai" id="id_lokasi_lantai" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_lantai')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Pilih yang sesuai</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi_lantai'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="" class="form-label">Vendor</label>
                  <select name="id_vendor" class="form-select col-sm-6 <?= (validation_show_error('id_vendor')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected>Pilih yang sesuai</option>
                    <?php foreach ($pemasok as $p) : ?>
                      <option value="<?= $p['id_vendor']; ?>" <?= old('id_vendor') == $p['id_vendor'] ? 'selected' : ''; ?>>
                        <?= $p['nama_vendor']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_vendor'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="user_asset" class="form-label">User Asset</label>
                  <input type="text" class="form-control <?= (validation_show_error('user_asset')) ? 'is-invalid' : ''; ?>" id="user_asset" name="user_asset" value="<?= old('user_asset'); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('user_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="col-md-12 text-end">
                <a href="/asset" class="btn btn-secondary me-3">Close</a>
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
<script>
  let harga = document.getElementById('harga');
  harga.addEventListener('keyup', function(e) {
    harga.value = formatRupiah(this.value);
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
<script>
  document.getElementById('id_plant').addEventListener('change', function() {
    const id_plant = this.value;

    const areaSelect = document.getElementById('id_lokasi_area');
    const gedungSelect = document.getElementById('id_lokasi_gedung');
    const lantaiSelect = document.getElementById('id_lokasi_lantai');

    // Kosongkan dropdown
    areaSelect.innerHTML = '<option value="" disabled selected>Pilih yang sesuai</option>';
    gedungSelect.innerHTML = '<option value="" disabled selected>Pilih yang sesuai</option>';
    lantaiSelect.innerHTML = '<option value="" disabled selected>Pilih yang sesuai</option>';

    // Hapus error class
    [areaSelect, gedungSelect, lantaiSelect].forEach(el => {
      el.classList.remove('is-invalid');
    });

    // Sembunyikan pesan error
    document.querySelectorAll('.invalid-feedback').forEach(fb => {
      fb.style.display = 'none';
    });

    if (!id_plant) return;

    // Ambil data via AJAX
    fetch(`/asset/lokasi-by-plant/${id_plant}`)
      .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
      })
      .then(data => {
        if (data.success) {
          // Isi Area
          data.data.area.forEach(item => {
            const opt = document.createElement('option');
            opt.value = item.id_lokasi;
            opt.textContent = item.nama_lokasi;
            if ("<?= old('id_lokasi_area') ?>" == item.id_lokasi) opt.selected = true;
            areaSelect.appendChild(opt);
          });

          // Isi Gedung
          data.data.gedung.forEach(item => {
            const opt = document.createElement('option');
            opt.value = item.id_lokasi;
            opt.textContent = item.nama_lokasi;
            if ("<?= old('id_lokasi_gedung') ?>" == item.id_lokasi) opt.selected = true;
            gedungSelect.appendChild(opt);
          });

          // Isi Lantai
          data.data.lantai.forEach(item => {
            const opt = document.createElement('option');
            opt.value = item.id_lokasi;
            opt.textContent = item.nama_lokasi;
            if ("<?= old('id_lokasi_lantai') ?>" == item.id_lokasi) opt.selected = true;
            lantaiSelect.appendChild(opt);
          });
        }
      })
      .catch(err => {
        console.error('Error:', err);
        alert('Gagal memuat data lokasi. Coba lagi.');
      });
  });
</script>
<?= $this->endSection(); ?>