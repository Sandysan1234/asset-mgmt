<?= $this->extend('asset/templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4 col-xxl-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="mb-0"><?= $asset['nama_asset']; ?></h5>
          </div>
          <div class="card">
            <img class="" src="<?= $qr; ?>" alt="">
          </div>

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
      <div class="row">
        <div class="col-md-6 col-xxl-4">
          <div class="card">
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item px-0">
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-3 mt-2">
                      <div class="row g-1">
                        <div class="col-6">
                          <h6 class="mt-1">No. Asset</h6>
                        </div>
                        <div class="col-6 text-end">
                          <p class="text-success"><?= $asset['no_asset']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item px-0">
                  <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-3 mt-2">
                      <div class="row g-1">
                        <div class="col-6">
                          <h6 class="mt-1">Sub Asset</h6>
                        </div>
                        <div class="col-6 text-end">
                          <p class="text-warning"><?= $asset['sub_asset']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xxl-4">
          <div class="card">
            <div class="card-body"></div>
          </div>
        </div>
        <div class="col-md-6 col-xxl-4">
          <div class="card">
            <div class="card-body"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-xxl-12">
      <div class="card">
        <div class="card-body">
          <h5>Details</h5>
          <p><?= $asset['spek']; ?></p>
          <p>Tanggal Perolehan : <?= (new DateTime($asset['tgl_perolehan']))->format('d-m-Y');?></p>
          <p>No. Purchase Order: <?= $asset['no_po'];?></p>
          <p>Serial Number: <?= $asset['serial_number'];?></p>
          <p>Batch Number: <?= $asset['batch_number'];?></p>
          <p>Merek: <?= $asset['merek'];?></p>
          <p>Status: <?= $asset['status'];?></p>
          <p>PIC : <?= $asset['user_fullname'];?> - <?= $asset['user_username'];?></p>
          <p>User Asset:  <?= $asset['pic_fullname'];?> - <?= $asset['pic_username'];?></p>
        </div>

      </div>
    </div>





    <div class="col-md-3 bg-warning p-3">
      <div class="print-area">
        <h5 class="mb-3">Income Overview</h5>
        <div class="card my-4">
          <img src="<?= $qr ?>" alt="">
          <!-- <img src="<?= base_url(); ?>assets/images/logo-jmi.png" class="card-img-top" alt="QR Code"> -->
          <div class="card-body">
            <p class="card-text text-center"><?= $asset['no_asset']; ?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8  bg-info">
      2 of 2
    </div>
    <div class="col-md-12 col-xl-8 ">
      <h5 class="mb-3">Sales Report</h5>
      <div class="card">
        <div class="card-body">
          <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
          <h3 class="mb-0">$7,650</h3>
          <div id="sales-report-chart"></div>
        </div>
      </div>
    </div>


    <div class="col-md-12 col-xl-8">
      <h5 class="mb-3">Recent Orders</h5>
      <div class="card tbl-card">
        <div class="card-body">
          <div class="table-responsive">
            kdsfasdfj
          </div>
        </div>
      </div>
    </div>


    <div class="col-2 bg-secondary">
      <div class="card my-4" style="width: 10rem;">
        <!-- <img src="?= $img ?>" alt=""> -->
        <img src="<?= base_url(); ?>assets/images/logo-jmi.png" class="card-img-top" alt="QR Code">
        <div class="card-body">
          <p class="card-text text-center"><?= $asset['serial_number']; ?></p>
        </div>
      </div>

    </div>
    <div class="card mb-3 bg-warning">
      <div class="row g-0 bg-info">
        <div class="col-md-4 p-4 bg-secondary">
          <img src="<?= base_url(); ?>assets/images/logo-jmi.svg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3 my-4 bg-primary">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Laptop taraktung jesss</h5>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>