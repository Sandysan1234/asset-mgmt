<?= $this->extend('asset/templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-3 bg-warning p-3">
      <h5 class="mb-3">Income Overview</h5>
      <div class="card my-4">
        <img src="<?= $qr ?>" alt="">
        <!-- <img src="<?= base_url(); ?>assets/images/logo-jmi.png" class="card-img-top" alt="QR Code"> -->
        <div class="card-body">
          <p class="card-text text-center"><?= $asset['no_asset'];?></p>
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
          <p class="card-text text-center"><?= $asset['serial_number'];?></p>
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