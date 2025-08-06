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
            <h5>Perubahan Asset</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <label for="" class="col-sm-3 col-form-label">Asset Class</label>
                  <select class="form-select form-select-sm" aria-label="Small select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <!-- <select name="id_vendor" class="form-select col-sm-6 <?= (validation_show_error('id_assetclass')) ? 'is-invalid' : ''; ?>" aria-label="Default select example">
                      <option selected disabled>Open this select menu</option>
                      ?php foreach ($pemasok as $p) : ?>
                        <option value="?= $p['id_vendor']; ?>" ?= old('id_vendor', $asset['id_vendor']) == $p['id_vendor'] ? 'selected' : ''; ?>>
                          ?= $p['nama_vendor']; ?>
                        </option>
                      ?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                      ?= validation_show_error('id_vendor'); ?>
                    </div> -->
                  <label for="" class="col-sm-3 col-form-label">Tindakan</label>
                  <select class="form-select form-select-sm" aria-label="Small select example">
                    <option selected>Open this select menu</option>
                    <option value="1">Mutasi Asset</option>
                    <option value="2">Penghentian Asset</option>
                    <option value="3">Pelepasan Asset</option>
                    <option value="3">Penggabungan Asset</option>
                  </select>
                  <label for="" class="my-3">Tanggal Tindakan</label>
                  <br>
                  <input type="datetime-local" name="" id="">
                </div>
                <h6>Department Asal</h6>
                <div class="col-md-12 mb-3">
                  <input type="number" name="search" placeholder="Cari Asset yang dipindahkan berdasarkan No Asset" class="form-control">
                </div>
              </div>
              <!-- <form action="/asset/update/ ?= $asset['id_asset']; ?>" method="post"> -->
              <?= csrf_field(); ?>
              <div class="row mb-3">
                <label for="no_asset" class="col-sm-3 col-form-label">No Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control  ?= (validation_show_error('no_asset')) ? 'is-invalid' : ''; ?>" name="no_asset" id="no_asset" value=" ?= old('no_asset', $asset['no_asset']); ?>" readonly>
                  <div class="invalid-feedback">
                    ?= validation_show_error('no_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="sub_asset" class="col-sm-3 col-form-label">Sub Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('sub_asset')) ? 'is-invalid' : ''; ?>" id="sub_asset" name="sub_asset" value="?= old('sub_asset', $asset['no_asset']); ?>" readonly>
                  <div class="invalid-feedback">
                    ?= validation_show_error('sub_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_asset" class="col-sm-3 col-form-label">Nama Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('nama_asset')) ? 'is-invalid' : ''; ?>" id="nama_asset" name="nama_asset" value="?= old('nama_asset', $asset['nama_asset']); ?>" autofocus>
                  <div class="invalid-feedback">
                    ?= validation_show_error('nama_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Cost Center</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('namacost_center')) ? 'is-invalid' : ''; ?>" id="namacost_center" name="namacost_center" value="?= old('namacost_center', $asset['nama_cost_center']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_cost_center'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Plant</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('namacost_center')) ? 'is-invalid' : ''; ?>" id="namacost_center" name="namacost_center" value="?= old('namacost_center', $asset['nama_cost_center']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_plant'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="tgl_perolehan" class="col-sm-3 col-form-label">Tanggal Perolehan</label>
                <div class="col-sm-6">
                  <input type="datetime-local" class="form-control ?= (validation_show_error('tgl_perolehan')) ? 'is-invalid' : ''; ?>" id="tgl_perolehan" name="tgl_perolehan" value="?= old('tgl_perolehan', date('Y-m-d\TH:i', strtotime($asset['tgl_perolehan']))); ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('tgl_perolehan'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="alasan" class="col-sm-3 col-form-label">Alasan</label>
                <div class="col-sm-6">
                  <textarea class="form-control <?= (validation_show_error('alasan')) ? 'is-invalid' : ''; ?>" id="alasan" name="alasan"><?= old('alasan'); ?></textarea>
                  <div class="invalid-feedback">
                    <?= validation_show_error('alasan'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Letak Asset</label>
                <div class="col-sm-6">
                  <p>sdf</p>
                  <p>dsfds</p>
                  <input type="text" class="form-control ?= (validation_show_error('namacost_center')) ? 'is-invalid' : ''; ?>" id="namacost_center" name="namacost_center" value="?= old('namacost_center', $asset['nama_cost_center']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_plant'); ?>
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
              <h6>Department Tujuan</h6>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Plant</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('namacost_center')) ? 'is-invalid' : ''; ?>" id="namacost_center" name="namacost_center" value="?= old('namacost_center', $asset['nama_cost_center']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_plant'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-3 col-form-label">Cost Center</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('namacost_center')) ? 'is-invalid' : ''; ?>" id="namacost_center" name="namacost_center" value="?= old('namacost_center', $asset['nama_cost_center']); ?>" readonly>
                  <div class="invalid-feedback">
                    <?= validation_show_error('id_cost_center'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="no_asset" class="col-sm-3 col-form-label">No Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control  ?= (validation_show_error('no_asset')) ? 'is-invalid' : ''; ?>" name="no_asset" id="no_asset" value=" ?= old('no_asset', $asset['no_asset']); ?>">
                  <div class="invalid-feedback">
                    ?= validation_show_error('no_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nama_asset" class="col-sm-3 col-form-label">Nama Asset</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control ?= (validation_show_error('nama_asset')) ? 'is-invalid' : ''; ?>" id="nama_asset" name="nama_asset" value="?= old('nama_asset', $asset['nama_asset']); ?>">
                  <div class="invalid-feedback">
                    ?= validation_show_error('nama_asset'); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Dept. Asal: <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="asal" switch>
                        <label class="form-check-label" for="asal">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Dept Tujuan: <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="tujuan" switch>
                        <label class="form-check-label" for="tujuan">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Menyetujui, <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="menyetujui_1" switch>
                        <label class="form-check-label" for="menyetujui_1">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h6>Menyetujui, <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="menyetujui_2" switch>
                        <label class="form-check-label" for="menyetujui_2">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h6>Mengetahui, <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="mengetahui_1" switch>
                        <label class="form-check-label" for="mengetahui_1">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h6>Mengetahui, <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="mengetahui_2" switch>
                        <label class="form-check-label" for="mengetahui_2">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h6>Mengetahui, <span></span></h6>
                      <div class="form-check form-switch my-3">
                        <input class="form-check-input" type="checkbox" value="" id="mengetahui_3" switch>
                        <label class="form-check-label" for="mengetahui_3">
                          Kabag
                        </label>
                      </div>
                      <input type="datetime-local" name="" id="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="/asset" class="btn btn-secondary me-3">Close</a>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
<?= $this->endSection(); ?>