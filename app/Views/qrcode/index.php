<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
  <div class="card">
    <div class="card-header">
      <h5>Generate Qr Code</h5>
    </div>
    <div class="card tbl-card">
      <div class="card-body">
        <div class="col-12">
          <form action="<?= base_url('qr/save') ?>" method="post">
            <?= csrf_field() ?>
            <label for="jumlah">Jumlah QR yang ingin digenerate:</label>
            <input type="number" name="jumlah" id="jumlah" min="1" value="10" required>
            <button type="submit" class="btn btn-primary">Generate QR</button>
          </form>
        </div>
        <div class="col-12 mt-3 p-3">
          <h5 class="text-center">Tampilan Generate QR Code</h5>
          <button class="btn btn-success mb-3" onclick="window.print()" <?= empty($qrList) ? 'disabled' : '' ?>>
            Print QR Code
          </button>
          <div class="print-area">
            <div class="row">
              <?php if (!empty($qrList)): ?>
                <?php foreach ($qrList as $item): ?>
                  <div class="card mb-3 mx-2 mt-2" style="max-width: 540px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="<?= $item['qr']; ?>" class="img-fluid rounded-start" alt="qrcode">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body" style="width: 220px;">
                          <h5 class="card-title"><?= esc($item['nama_asset']); ?></h5>
                          <p class="card-text"><?= esc($item['no_asset']); ?></p>
                          <p class="card-text"><?= (new DateTime($item['tgl_perolehan']))->format('d-m-Y'); ?></p>
                          <!-- <p class="card-text">lala<small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p class="text-center">Belum ada QR Code yang digenerate.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
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

    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>