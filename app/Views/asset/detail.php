<?= $this->extend('asset/templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-xl-4">
      <div class="col-md-12 col-xl-4">
          <h5 class="mb-3">Income Overview</h5>
          <div class="card">
            <div class="card-body">
              <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
              <h3 class="mb-3">$7,650</h3>
              <div id="income-overview-chart" style="min-height: 380px;"></div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?= $this->endSection();?>