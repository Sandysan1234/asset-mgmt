<?= $this->extend('asset/templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container fluid mt-4">
  <div class="row">
    <div class="col-md-4 col-xxl-3">
      <div class="card">
        <div class="card-body">
          <div class="card">
            <img class="" src="<?= $qr; ?>" alt="">
          </div>
          <div class="text-center">
            <h4 class=""><?= $asset['nama_asset']; ?></h4>
            <p><?= $asset['no_asset']; ?></p>
          </div>
        </div>
      </div>
      <div class="card rounded-3 mb-2">
        <div class="card-body m-0 p-1 rounded-3 bg-primary opacity-75">
          <h5 class="text-light ms-4 my-2">
            <i class="ti ti-file-text"></i> Relations
          </h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <!-- <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-info">
                    ?= $asset['id_assetclass']; ?>
                  </div>
                </div> -->
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Asset Class</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class=""><?= $asset['nama_assetclass']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <!-- <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-success">
                    ?= $asset['id_cost_center']; ?>
                  </div>
                </div> -->
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-2">Cost Center</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['nama_cost_center']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <!-- <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-primary">
                    ?= $asset['id_lifetime']; ?>
                  </div>
                </div> -->
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Lifetime</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['masa_berlaku']; ?> Tahun</p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <!-- <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-warning">
                    ?= $asset['id_plant']; ?>
                  </div>
                </div> -->
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Plant</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['nama_plant']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <!-- <div class="flex-shrink-0">
                  <div class="avtar avtar-s border">
                    ?= $asset['id_vendor']; ?>
                  </div>
                </div> -->
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Vendor</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['nama_vendor']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-xxl-9">
      <div class="card rounded-3 mb-2">
        <div class="card-body m-0 p-1 rounded-3 bg-primary opacity-75">
          <h5 class="text-light ms-4 my-2">
            <i class="ti ti-file-text"></i> Identifikasi Lainnya
          </h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <!-- <div class="d-flex align-items-center justify-content-between mb-3 bg-info opacity-25 rounded-3 p-2">
            <h5 class="text-light mb-0 p-1"><i class="ti ti-list-search"></i> Identifikasi Lainnya</h5>
          </div> -->
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Kategori Asset</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold text-capitalize"><?= $asset['kategori_asset']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Serial Number</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['serial_number']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Batch Number</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['batch_number']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 border-bottom">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">No. Purchase Order</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['no_po']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="card rounded-3 mb-2">
        <div class="card-body m-0 p-1 rounded-3 bg-primary opacity-75">
          <h5 class="text-light ms-4 my-2">
            <i class="ti ti-clipboard-list"></i> Spesifikasi Asset
          </h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <p><?= $asset['spek']; ?></p>
        </div>
      </div>
      <div class="card rounded-3 mb-2">
        <div class="card-body m-0 p-1 rounded-3 bg-primary opacity-75">
          <h5 class="text-light ms-4 my-2">
            <i class="ti ti-paperclip"></i> Administrasi & Status
          </h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Tanggal Perolehan</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= (new DateTime($asset['tgl_perolehan']))->format('d-m-Y'); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Harga</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold">Rp. <?= number_format($asset['harga']); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary  mt-1">Area</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['la']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary  mt-1">Gedung</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['lg']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary  mt-1">Lantai</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['ll']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 border-bottom">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">Status</h6>
                    </div>
                    <div class="col-6 text-end">
                      <?php
                      $statusList = [
                        0 => ['label' => 'Proses Pelepasan',     'class' => 'bg-primary'],
                        1 => ['label' => 'Proses Penghentian',   'class' => 'bg-warning'],
                        2 => ['label' => 'Penggabungan',         'class' => 'bg-secondary'],
                        3 => ['label' => 'Proses Mutasi ',       'class' => 'bg-info'],
                        4 => ['label' => 'Non-Aktif ',           'class' => 'bg-danger'],
                        5 => ['label' => 'Aktif',                'class' => 'bg-success'],
                      ];
                      $currentStatus = $statusList[$asset['status']] ?? ['label' => 'Unknown', 'class' => 'bg-dark'];
                      ?>
                      <p><span class="badge <?= $currentStatus['class']; ?> rounded-2"><?= $currentStatus['label']; ?></span></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 border-bottom">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">PIC</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold text-capitalize"><?= $asset['pic_username']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0 border-bottom">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="text-secondary mt-1">User Asset</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class="fw-bold"><?= $asset['user_asset']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <?= $this->endSection(); ?>