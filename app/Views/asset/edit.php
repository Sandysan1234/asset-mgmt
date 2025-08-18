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
            <h5>Form Ubah Asset</h5>
          </div>
          <div class="card-body">
            <form action="/asset/update/<?= $asset['id_asset']; ?>" method="post">
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="no_asset" class="col-sm-3 col-form-label">No Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('no_asset')) ? 'is-invalid' : ''; ?>" name="no_asset" id="no_asset" value="<?= old('no_asset', $asset['no_asset']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('no_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sub_asset" class="col-sm-3 col-form-label">Sub Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('sub_asset')) ? 'is-invalid' : ''; ?>" id="sub_asset" name="sub_asset" value="<?= old('sub_asset', $asset['sub_asset']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('sub_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_asset" class="col-sm-3 col-form-label">Nama Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('nama_asset')) ? 'is-invalid' : ''; ?>" id="nama_asset" name="nama_asset" value="<?= old('nama_asset', $asset['nama_asset']); ?>" autofocus>
                  <div class="invalid-feedback">
                    <?= validation_show_error('nama_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="serial_number" class="col-sm-3 col-form-label">Serial Number</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('serial_number')) ? 'is-invalid' : ''; ?>" id="serial_number" name="serial_number" value="<?= old('serial_number', $asset['serial_number']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('serial_number'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="batch_number" class="col-sm-3 col-form-label">Batch Number</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('batch_number')) ? 'is-invalid' : ''; ?>" id="batch_number" name="batch_number" value="<?= old('batch_number'), $asset['batch_number']; ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('batch_number'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="merek" class="col-sm-3 col-form-label">Merek</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('merek')) ? 'is-invalid' : ''; ?>" id="merek" name="merek" value="<?= old('merek', $asset['merek']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('merek'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="spek" class="col-sm-3 col-form-label">Spek</label>
                <div class="col-sm-6">
                  <textarea class="form-control <?= (validation_show_error('spek')) ? 'is-invalid' : ''; ?>" id="spek" name="spek"><?= old('spek', $asset['spek']); ?></textarea>
                  <div class="invalid-feedback">
                    <?= validation_show_error('spek'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tgl_perolehan" class="col-sm-3 col-form-label">Tanggal Perolehan</label>
                <div class="col-sm-6">
                  <input type="datetime-local" class="form-control <?= (validation_show_error('tgl_perolehan')) ? 'is-invalid' : ''; ?>" id="tgl_perolehan" name="tgl_perolehan" value="<?= old('tgl_perolehan', date('Y-m-d\TH:i', strtotime($asset['tgl_perolehan']))); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('tgl_perolehan'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?= (validation_show_error('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga', $asset['harga']); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('harga'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="no_po" class="col-sm-3 col-form-label">No. Purchase Order</label>
                <div class="col-sm-6">
                  <input type="number" class="form-control <?= (validation_show_error('no_po')) ? 'is-invalid' : ''; ?>" id="no_po" name="no_po" value="<?= old('no_po'), $asset['no_po']; ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('no_po'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Asset Class</label>
                <div class="col-sm-6">
                  <select name="id_assetclass" class="form-select col-sm-6 <?= (validation_show_error('id_assetclass')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    <?php foreach ($assetclass as $as) : ?>
                      <option value="<?= $as['id_assetclass']; ?>" <?= old('id_assetclass', $asset['id_assetclass']) == $as['id_assetclass'] ? 'selected' : ''; ?>>
                        <?= $as['nama_assetclass']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_assetclass'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Cost Center</label>
                <div class="col-sm-6">
                  <select name="id_cost_center" class="form-select col-sm-6 <?= (validation_show_error('id_cost_center')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" disabled>
                    <option selected disabled>Open this select menu</option>
                    <?php foreach ($cost_center as $cs) : ?>
                      <option value="<?= $cs['id_cost_center']; ?>" <?= old('id_cost_center', $asset['id_cost_center']) == $cs['id_cost_center'] ? 'selected' : ''; ?>>
                        <?= $cs['nama_cost_center']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_cost_center'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="id_lifetime" class="col-sm-3 col-form-label">Masa Berlaku</label>
                <div class="col-sm-6">
                  <select name="id_lifetime" class="form-select col-sm-6 <?= (validation_show_error('id_lifetime')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    <?php foreach ($lifetime as $lf) : ?>
                      <option value="<?= $lf['id_lifetime']; ?>" <?= old('id_lifetime' , $asset['id_lifetime']) == $lf['id_lifetime'] ? 'selected' : ''; ?>>
                        <?= $lf['masa_berlaku']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lifetime'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Plant</label>
                <div class="col-sm-6">
                  <select name="id_plant" class="form-select col-sm-6 <?= (validation_show_error('id_plant')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" disabled>
                    <option selected disabled>Open this select menu</option>
                    <?php foreach ($plant as $pl) : ?>
                      <option value="<?= $pl['id_plant']; ?>" <?= old('id_plant', $asset['id_plant']) == $pl['id_plant'] ? 'selected' : ''; ?> aria-readonly="true">
                        <?= $pl['nama_plant']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_plant'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Vendor</label>
                <div class="col-sm-6">
                  <select name="id_vendor" class="form-select col-sm-6 <?= (validation_show_error('id_vendor')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" >
                    <option selected disabled>Open this select menu</option>
                    <?php foreach ($pemasok as $p) : ?>
                      <option value="<?= $p['id_vendor']; ?>" <?= old('id_vendor', $asset['id_vendor']) == $p['id_vendor'] ? 'selected' : ''; ?> >
                        <?= $p['nama_vendor']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_vendor'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-6">
                  <select name="id_lokasi_area" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_area')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" >
                    <option selected>Open this select menu</option>
                    <?php foreach ($lokasi_area as $la) : ?>
                      <option value="<?= $la['id_lokasi']; ?>" <?= old('id_lokasi'), $asset['id_lokasi_area'] == $la['id_lokasi'] ? 'selected' : ''; ?>>
                        <?= $la['nama_lokasi']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Gedung</label>
                <div class="col-sm-6">
                  <select name="id_lokasi_gedung" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_gedung')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" >
                    <option selected >Open this select menu</option>
                    <?php foreach ($lokasi_gedung as $lg) : ?>
                      <option value="<?= $lg['id_lokasi']; ?>" <?= old('id_lokasi'), $asset['id_lokasi_gedung'] == $lg['id_lokasi'] ? 'selected' : ''; ?>>
                        <?= $lg['nama_lokasi']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Lantai</label>
                <div class="col-sm-6">
                  <select name="id_lokasi_lantai" class="form-select col-sm-6 <?= (validation_show_error('id_lokasi_lantai')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" >
                    <option selected>Open this select menu</option>
                    <?php foreach ($lokasi_lantai as $ll) : ?>
                      <option value="<?= $ll['id_lokasi']; ?>" <?= old('id_lokasi'), $asset['id_lokasi_lantai'] == $ll['id_lokasi'] ? 'selected' : ''; ?>>
                        <?= $ll['nama_lokasi']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_lokasi'); ?>
                  </div>
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">PIC</label>
                <div class="col-sm-6">
                  <select name="id_pic" class="form-select col-sm-6" aria-label="Default select example" disabled>
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">User Asset</label>
                <div class="col-sm-6">
                  <select name="id_user_asset" class="form-select col-sm-6" aria-label="Default select example" disabled>
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <a href="/asset" class="btn btn-secondary me-3">Close</a>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
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
<?= $this->endSection(); ?>