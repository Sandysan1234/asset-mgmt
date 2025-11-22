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
              <!-- <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">Tambah Asset</li> -->
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Welcome in, Jayamas Asset Management</h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <!-- <div class="card">
          <div class="card-header">
            <h5>Hello card</h5>
          </div>
          <div class="card-body">
          </div>
        </div> -->
        <!-- <h3 class="mb-3">Welcome in, Jayamas Asset Management </h3> -->
        <div class="card-body tbl-card">
          <div class="row">
            <div class="col-xl-4 col-md-12">
              <div class="card comp-card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="m-b-20">Total Asset</h5>
                      <h3><?= $total_asset; ?></h3>
                    </div>
                    <div class="col-auto">
                      <div class="ti ti-report-money text-primary f-36"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12">
              <div class="card comp-card">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col">
                      <h5 class="m-b-20">Total Transaction</h5>
                      <h3><?= $total_transaction; ?></h3>
                    </div>
                    <div class="col-auto">
                      <div class="ti ti-chart-bar text-success f-36"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">

              <!-- <canvas id="categoryChart" width="400" height="400"></canvas> -->
            </div>
            <div class="col-md-5 col-xxl-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Status Asset</h5>
                    <div class="dropdown"></div>
                  </div>
                  <div class="" id="">
                    <canvas id="categoryChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-xxl-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Hasil Audit</h5>
                    <div class="dropdown"></div>
                  </div>
                  <div class="" id="">
                    <canvas id="pindaiChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
              const ctx = document.getElementById('categoryChart').getContext('2d');
              const data = <?= json_encode($chartData) ?>;

              const pnd = document.getElementById('pindaiChart').getContext('2d');
              const pnddata = <?= json_encode($pindaiData) ?>;

              // Chart pertama: Status Asset
              new Chart(ctx, {
                type: 'doughnut',
                data: { // ✅ benar
                  labels: data.labels,
                  datasets: [{
                    data: data.values,
                    backgroundColor: data.colors,
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'bottom'
                    }
                  }
                }
              });

              // Chart kedua: Status Pindai (Perbaikan di sini!)
              new Chart(pnd, {
                type: 'doughnut',
                data: { // ✅ HARUS "data", bukan "pnddata"
                  labels: pnddata.labels,     // ✅ gunakan "pnddata"
                  datasets: [{
                    data: pnddata.values,    // ✅ gunakan "pnddata"
                    backgroundColor: pnddata.colors,
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'bottom'
                    }
                  }
                }
              });
            </script>
<!--             
            <div class="col-md-12 col-xl-8">
              <h5 class="mb-3">Sales Report</h5>
              <div class="card">
                <div class="card-body">
                  <h6 class="mb-2 f-w-400 text-muted">This Week Statistics</h6>
                  <h3 class="mb-0">$7,650</h3>
                  <div id="sales-report-chart"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5>Category</h5>
                    <div class="dropdown"></div>
                  </div>
                  <div class="" id="category-donut-chart">
                    <div id="apexcharts2wyi6bmq" class="apexcharts-canvas apexcharts2wyi6bmq apexcharts-theme-light">
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
</div>
<!-- [ Main Content ] end -->
<?= $this->endSection(); ?>