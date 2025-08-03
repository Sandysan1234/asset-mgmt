<?= $this->extend('asset/templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container mt-4">
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
      <div class="card">
        <div class="card-body">
          <h5 class=""><i class="ti ti-notes"></i> Spesifikasi Asset</h5>
          <p><?= $asset['spek']; ?></p>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0">Relations</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-info">
                    <?= $asset['id_assetclass']; ?>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Aseet Class</h6>
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
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-success">
                    <?= $asset['id_cost_center']; ?>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Cost Center</h6>
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
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-primary">
                    <?= $asset['id_lifetime']; ?>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Lifetime</h6>
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
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s border bg-light-warning">
                    <?= $asset['id_plant']; ?>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Plant</h6>
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
                <div class="flex-shrink-0">
                  <div class="avtar avtar-s border">
                    <?= $asset['id_vendor']; ?>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 mt-2">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Vendor</h6>
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
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="text-primary mb-0"><i class="ti ti-list-search"></i> Identifikasi Lainnya</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Serial Number</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class=""><?= $asset['serial_number']; ?></p>
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
                      <h6 class="mt-1">Batch Number</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['batch_number']; ?></p>
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
                      <h6 class="mt-1">No. Purchase Order</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['no_po']; ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          </ul>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0"><i class="ti ti-file-check"></i> Administrasi & Status</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
              <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                  <div class="row g-1">
                    <div class="col-6">
                      <h6 class="mt-1">Tanggal Perolehan</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p class=""><?= $asset['tgl_perolehan']; ?></p>
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
                      <h6 class="mt-1">Harga</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p>Rp. <?= $asset['harga']; ?></p>
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
                      <h6 class=" mt-1">Lifetime</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['masa_berlaku']; ?> Tahun</p>
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
                      <h6 class="mt-1">Status</h6>
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
                      <h6 class="mt-1">PIC</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['pic_username']; ?></p>
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
                      <h6 class="mt-1">User Asset</h6>
                    </div>
                    <div class="col-6 text-end">
                      <p><?= $asset['user_username']; ?></p>
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