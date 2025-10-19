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
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">Generate QR Code</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Generate QR Code</h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] start -->
    <div class="card ">
      <div class="card-header">
        <h5>Generate QR Code</h5>
      </div>
      <div class="card-body tbl-card">
        <div class="col-12">

          <form method="post" class="d-print-none row g-3" action="<?= base_url('qr/save') ?>">
            <?= csrf_field() ?>
            <!-- Filter PIC -->
            <div class="col-md-4 mb-3">
              <label>PIC:</label>
              <select name="id_pic" class="form-control">
                <option value="">-- Semua PIC --</option>
                <?php foreach ($picList as $pic): ?>
                  <option value="<?= $pic->id ?>"><?= esc($pic->username) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Filter Cost Center -->
            <div class="col-md-4 mb-3">
              <label>Cost Center:</label>
              <select name="id_cost_center" class="form-control">
                <option value="">-- Semua Cost Center --</option>
                <?php foreach ($costCenterList as $cc): ?>
                  <option value="<?= $cc['id_cost_center'] ?>">
                    <?= esc($cc['kode'] ?? $cc['nama_cost_center']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Filter Lokasi -->
            <div class="col-md-4 mb-3">
              <label>Plant:</label>
              <select name="id_plant" class="form-control">
                <option value="">-- Semua Plant --</option>
                <?php foreach ($plants as $lok): ?>
                  <option value="<?= $lok['id_plant'] ?>"><?= esc($lok['nama_plant']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Jumlah Maksimal -->
            <div class="mb-3">
              <label>Jumlah QR (opsional, maks 100):</label>
              <input type="number" name="limit" class="form-control" min="1" max="100" placeholder="Contoh: 10">
            </div>

            <!-- Alternatif: input manual no_asset -->
            <div class="mb-3">
              <label>Atau masukkan Nomor Asset (pisahkan koma):</label>
              <input type="text" name="no_asset" class="form-control" placeholder="A001, A002">
              <button type="submit" class="btn mt-3 btn-primary">Generate QR</button>
            </div>

          </form>
        </div>
        <div class="col-12 mt-3 p-3">
          <h5 class="text-center d-print-none">Tampilan Generate QR Code</h5>
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
                        <div class="card-body" style="width: 300px;">
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
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>