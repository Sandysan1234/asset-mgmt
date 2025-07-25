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
            <h5>Generate Qr Code</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="col-12">
                <form action="<?= base_url('qr/generate-multiple') ?>" method="post">
                  <label for="jumlah">Jumlah QR yang ingin digenerate:</label>
                  <input type="number" name="jumlah" id="jumlah" min="1" value="10" required>
                  <button type="submit" class="btn btn-primary">Generate QR</button>
                </form>
              </div>
              <div class="col-12 mt-3 p-3">
                <h5 class="text-center">Tampilan Generate QR Code</h5>
                <div class="row">
                  <!-- ?php foreach ($assets as $asset): ?>
                    <div class="col-md-3 text-center mb-4">
                      <div class="card p-2">
                        <img src="?= base_url('writable/qrcodes/asset-' . $asset['id_asset'] . '.png') ?>" alt="QR Code Asset ?= $asset['id_asset'] ?>" class="img-fluid mb-2" />
                        <p class="m-0"><strong>?= esc($asset['nama_asset']) ?></strong></p>
                        <small>ID: ?= $asset['id_asset'] ?></small><br>
                        <a href="?= base_url('asset/detail/' . $asset['id_asset']) ?>" class="btn btn-sm btn-outline-primary mt-2">Lihat Detail</a>
                      </div>
                    </div>
                  ?php endforeach; ?> -->
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>