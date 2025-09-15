    <?= $this->extend('templates/index'); ?>
    <?= $this->section('page-content'); ?>

    <!-- jQuery UI (kalau belum ada di layout) -->
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> -->

    <div class="pc-container">
      <div class="pc-content ">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="d-print-inline">Form Pemindahan Asset</h5>
                <button type="button" class="btn btn-outline-secondary no-print" onclick="printTransaction()">
                  <i class="fas fa-print"></i> Print Form Ini
                </button>
              </div>

              <div class="card-body ">
                <form action="/transaksi/update/<?= $transaksi['id_transaksi']; ?>" method="post" enctype="multipart/form-data" class="printable-transaction row g-3 d-print-none">
                  <?= csrf_field(); ?>

                  <!-- hidden ids untuk relasi -->
                  <!-- <input type="hidden" id="id_asset" name="id_asset"> -->
                  <!--
                            <input type="hidden" id="id_assetclass" name="id_assetclass">
                            <input type="hidden" id="id_plant_asal" name="id_plant_asal">
                            <input type="hidden" id="id_cost_center_asal" name="id_cost_center_asal">
                            <input type="hidden" id="id_lokasi_area" name="id_lokasi_area">
                            <input type="hidden" id="id_lokasi_gedung" name="id_lokasi_gedung">
                            <input type="hidden" id="id_lokasi_lantai" name="id_lokasi_lantai"> -->
                  <input type="hidden" id="login_user" data-fullname="<?= esc($user->fullname ?? $user->email) ?>">
                  <!-- <input type="hidden" name="upload_img_lama" value="?= $transaksi['upload_img'];?>"> -->
                  <h5>Department Asal</h5>
                  <div class="col-md-4">
                    <label for="no_asset" class="form-label">No Asset</label>
                    <input type="text" id="no_asset" name="no_asset" class="form-control d-print-none" placeholder="Cari No Asset..." disabled required value="<?= old('no_asset', $transaksi['no_asset']); ?>">
                    <span class="d-none d-print-inline"><?= esc(old('no_asset', $transaksi['no_asset'])) ?></span>
                  </div>
                  <div class="col-md-4">
                    <label for="asset_class" class="form-label">Asset Class</label>
                    <input type="text" id="asset_class" name="asset_class" class="form-control d-print-none" disabled value="<?= old('nama_assetclass', $transaksi['nama_assetclass']); ?>">
                    <span class="d-none d-print-inline"><?= esc(old('nama_assetclass', $transaksi['nama_assetclass'])) ?></span>

                  </div>
                  <div class="col-md-4">
                    <label for="plant_asal" class="form-label">Plant</label>
                    <input type="text" id="plant_asal" name="plant_asal" class="form-control d-print-none" value="<?= old('plant_asal', $transaksi['plant_asal']); ?>" disabled>
                    <span class="d-none d-print-inline"><?= esc(old('plant_asal', $transaksi['plant_asal'])) ?></span>

                  </div>
                  <div class="col-md-4">
                    <label for="cost_center_asal" class="form-label">Cost Center</label>
                    <input type="text" id="cost_center_asal" name="cost_center_asal" class="form-control d-print-none" value="<?= old('cost_center_asal', $transaksi['cost_center_asal']); ?>" disabled readonly>
                    <span class="d-none d-print-inline"><?= esc(old('cost_center_asal', $transaksi['cost_center_asal'])) ?></span>

                  </div>
                  <div class="col-md-4">
                    <label for="sub_asset" class="form-label">Sub Asset</label>
                    <input type="text" id="sub_asset" name="sub_asset" class="form-control d-print-none" disabled value="<?= old('sub_asset', $transaksi['sub_asset']); ?>" readonly>
                    <span class="d-none d-print-inline"><?= esc(old('sub_asset', $transaksi['sub_asset'])) ?></span>

                  </div>

                  <div class="col-md-4">
                    <label for="nama_asset" class="form-label">Nama Asset</label>
                    <input type="text" id="nama_asset" name="nama_asset" class="form-control d-print-none" disabled value="<?= old('nama_asset', $transaksi['nama_asset']); ?>" readonly>
                    <span class="d-none d-print-inline"><?= esc(old('nama_asset', $transaksi['nama_asset'])) ?></span>

                  </div>
                  <div class="col-md-4">
                    <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
                    <input type="date" id="tgl_perolehan" name="tgl_perolehan" class="form-control d-print-none" disabled value="<?= old('tgl_perolehan', $transaksi['tgl_perolehan']); ?>" readonly>
                    <span class="d-none d-print-inline"><?= esc(old('tgl_perolehan', $transaksi['tgl_perolehan'])) ?></span>
                  </div>

                  <div class="col-md-4">
                    <label for="transaksi" class="form-label">Transaksi</label>
                    <select id="transaksi" name="transaksi" class="form-select d-print-none <?= (validation_show_error('transaksi')) ? 'is-invalid' : ''; ?>" disabled>
                      <option value="">Pilih Transaksi</option>
                      <option value="3" <?= old('transaksi', $transaksi['transaksi']) == 3 ? 'selected' : ''; ?>>Mutasi</option>
                      <option value="0" <?= old('transaksi', $transaksi['transaksi']) == 0 ? 'selected' : ''; ?>>Pelepasan</option>
                      <option value="1" <?= old('transaksi', $transaksi['transaksi']) == 1 ? 'selected' : ''; ?>>Penghentian</option>
                      <option value="2" <?= old('transaksi', $transaksi['transaksi']) == 2 ? 'selected' : ''; ?>>Penggabungan</option>
                    </select>
                    <span class="d-none d-print-inline"><?= esc(old('transaksi', $transaksi['transaksi'])) ?></span>

                    <div class="invalid-feedback">
                      <?= validation_show_error('transaksi'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="datetime-local" id="tgl_transaksi" name="tgl_transaksi" class="form-control d-print-none" value="<?= old('tgl_transaksi', $transaksi['tgl_transaksi']); ?>" disabled required>
                    <span class="d-none d-print-inline">: <?= esc(old('tgl_transaksi', $transaksi['tgl_transaksi'])) ?></span>

                  </div>
                  <div class="col-12">
                    <label for="alasan" class="form-label">Alasan Pemindahan</label>
                    <textarea id="alasan" name="alasan" class="form-control d-print-none" disabled required><?= old('alasan', $transaksi['alasan']); ?></textarea>
                    <span class="d-none d-print-inline"><?= esc(old('alasan', $transaksi['alasan'])) ?></span>
                  </div>

                  <hr class="mx-1">
                  <h5 class="my-0">Department Tujuan</h5>
                  <div class="col-md-3">
                    <label for="id_plant_baru" class="form-label">Plant Tujuan</label>
                    <select id="id_plant_baru" name="id_plant_baru" class="form-select d-print-none" disabled>
                      <option selected disabled>Pilih Plant</option>
                      <?php

                                                        use App\Controllers\Transaksi;

 foreach ($plants as $p): ?>
                        <option value="<?= esc($p['id_plant']) ?>" <?= old('id_plant_baru', $transaksi['id_plant_baru']) == $p['id_plant'] ? 'selected' : ''; ?>><?= esc($p['nama_plant']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="d-none d-print-inline"><?= esc(old('nama_plant', $p['nama_plant'])) ?></span>
                  </div>
                  <div class="col-md-3">
                    <label for="id_cost_center_baru" class="form-label">Cost Center Tujuan</label>
                    <select id="id_cost_center_baru" name="id_cost_center_baru" class="form-select d-print-none" disabled>
                      <option value="">Pilih Cost Center</option>
                      <?php foreach ($cost_center as $cc): ?>
                        <option value="<?= esc($cc['id_cost_center']) ?>" <?= old('id_cost_center_baru', $transaksi['id_cost_center_baru']) == $cc['id_cost_center'] ? 'selected' : ''; ?>><?= esc($cc['nama_cost_center']) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="d-none d-print-inline"><?= esc(old('nama_cost_center', $cc['nama_cost_center'])) ?></span>
                  </div>
                  <div class="col-md-3">
                    <label for="no_asset_tujuan" class="form-label">No Asset</label>
                    <span class="d-none d-print-inline"><?= esc(old('no_asset', $transaksi['no_asset'])) ?></span>
                    <input type="text" id="no_asset_tujuan" name="no_asset_tujuan" class="form-control d-print-none" value="<?= old('no_asset', $transaksi['no_asset']); ?>" disabled readonly>

                  </div>
                  <div class="col-md-3">
                    <label for="nama_asset_tujuan" class="form-label">Nama Asset</label>
                    <span class="d-none d-print-inline"><?= esc(old('nama_asset', $transaksi['nama_asset'])) ?></span>
                    <input type="text" id="nama_asset_tujuan" name="nama_asset_tujuan" class="form-control d-print-none" value="<?= old('nama_asset', $transaksi['nama_asset']); ?>" disabled readonly>
                  </div>
                  <hr class="mt-2">
                  <h4 class="text-center m-0 d-print-none">Signature</h4>
                  <!-- Dept. Asal -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Departemen Asal</h6>
                        <p>Menyetujui,</p>
                        <div class="row g-3 align-items-end">
                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch  form-check-reverse custom-switch-v1">
                              <label class="form-check-label ps-0" for="approve_kabag_asal"> Kepala Bagian</label>

                              <?php $ApproveKabagAsal = (user()->email == $transaksi['user_kabag_asal']); ?>
                              <input class="form-check-input" type="radio" role="switch"
                                id="approve_kabag_asal" name="approve_kabag_asal" <?= $transaksi['date_ttd_asal'] ? 'checked' : '' ?> <?= $ApproveKabagAsal ? '' : 'disabled'; ?>>
                              <!-- ?= has_permission('approve_kabag_asal') ? '' : 'disabled' ?> -->
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_asal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control d-print-none"
                              id="date_ttd_asal" name="date_ttd_asal" value="<?= old('date_ttd_asal', $transaksi['date_ttd_asal']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('date_ttd_asal', $transaksi['date_ttd_asal'])) ?></span>

                          </div>

                          <!-- opsional: pilih pejabat -->
                          <div class="col-12">
                            <label for="user_kabag_asal" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control d-print-none"
                              id="user_kabag_asal" name="user_kabag_asal" placeholder="Mis. Budi Santoso" value="<?= old('user_kabag_asal', $transaksi['user_kabag_asal']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('user_kabag_asal', $transaksi['user_kabag_asal'])) ?></span>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Dept. Tujuan -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Departemen Tujuan</h6>
                        <p>Menyetujui,</p>
                        <div class="row g-3 align-items-end">

                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch form-check-reverse custom-switch-v1">
                              <label class="form-check-label" for="approve_kabag_tujuan"> Kepala Bagian</label>
                              <?php $ApproveKabagTujuan = (user()->email == $transaksi['user_kabag_tujuan']); ?>

                              <input class="form-check-input" type="radio" role="switch"
                                id="approve_kabag_tujuan" name="approve_kabag_tujuan" <?= $transaksi['date_ttd_tujuan'] ? 'checked' : ''; ?> <?= $ApproveKabagTujuan ? '' : 'disabled'; ?>>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_tujuan" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control d-print-none"
                              id="date_ttd_tujuan" name="date_ttd_tujuan" value="<?= $transaksi['date_ttd_tujuan']; ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('date_ttd_tujuan', $transaksi['date_ttd_tujuan'])) ?></span>

                          </div>
                          <div class="col-12">
                            <label for="user_kabag_tujuan" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control d-print-none"
                              id="user_kabag_tujuan" name="user_kabag_tujuan" placeholder="Mis. Siti Rahma" value="<?= old('user_kabag_tujuan', $transaksi['user_kabag_tujuan']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('user_kabag_asal', $transaksi['user_kabag_tujuan'])) ?></span>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Menyetujui: IT -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Menyetujui: PIC</h6>

                        <div class="row g-3 align-items-end">
                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch form-check-reverse custom-switch-v1 my-3">
                              <label class="form-check-label" for="approve_it"> PIC </label>
                              <input class="form-check-input no-click" type="checkbox" role="switch"
                                id="approve_it" name="approve_it" <?= $transaksi['date_pic'] ? 'checked' : '' ?>
                                <?= has_permission('approve_pic') && $transaksi['created_by'] == user_id() ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12  ">
                            <label for="date_pic" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control no-click d-print-none"
                              id="date_pic" name="date_pic" value="<?= old('date_pic', $transaksi['date_pic']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('date_pic', $transaksi['date_pic'])) ?></span>

                          </div>
                          <div class="col-12">
                            <label for="nama_pic" class="form-label">Nama PIC</label>
                            <input type="text" class="form-control no-click"
                              id="nama_pic" name="nama_pic" placeholder="Mis. Admin IT" value="<?= old('nama_pic', $transaksi['nama_pic']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('nama_pic', $transaksi['nama_pic'])) ?></span>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Menyetujui: Direksi -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Menyetujui: <span class="penyetuju">-</span></h6>

                        <div class="row g-3 align-items-end">

                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch form-check-reverse custom-switch-v1 my-3">
                              <label class="form-check-label penyetuju" for="approve_dir"></label>
                              <input class="form-check-input no-click " type="checkbox" role="switch"
                                id="approve_dir" name="approve_dir" <?= $transaksi['date_direksi'] ? 'checked' : ''; ?>
                                <?php
                                $allowed = false;
                                if ($transaksi['transaksi'] == '3') {
                                  $allowed = has_permission('approve_plan_manager');
                                } else {
                                  $allowed = has_permission('approve_direksi');
                                }
                                echo $allowed ? '' : 'disabled';
                                ?> readonly>

                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_direksi" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control no-click d-print-none"
                              id="date_direksi" name="date_direksi" value="<?= old('date_direksi', $transaksi['date_direksi']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('date_direksi', $transaksi['date_direksi'])) ?></span>

                          </div>
                          <div class="col-12">
                            <label for="nama_direksi" class="form-label">Nama <span class="penyetuju"></span> </label>
                            <input type="text" class="form-control no-click d-print-none"
                              id="nama_direksi" name="nama_direksi" placeholder="Mis. Direktur Operasional" value="<?= old('nama_direksi', $transaksi['nama_direksi']); ?>" readonly>
                            <span class="d-none d-print-inline"><?= esc(old('nama_direksi', $transaksi['nama_direksi'])) ?></span>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Mengetahui: Manager Finance -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui <span class="d-none d-print-block">Finance</span></h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_fin" name="ack_fin" <?= $transaksi['date_ack_fin'] ? 'checked' : ''; ?> <?= has_permission('ack_finance') ? '' : 'disabled' ?>>
                          <label class="form-check-label" for="ack_fin"> Manager Finance</label>
                        </div>
                        <input type="datetime-local" class="form-control d-print-none"
                          id="date_ack_fin" name="date_ack_fin" value="<?= old('date_ack_fin', $transaksi['date_ack_fin']); ?>" readonly>
                        <span class="d-none d-print-inline"><?= esc(old('date_ack_fin', $transaksi['date_ack_fin'])) ?></span>

                      </div>
                    </div>
                  </div>

                  <!-- Mengetahui: Accounting -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui<span class="d-none d-print-block">Accounting</span></h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_acc" name="ack_acc" <?= $transaksi['date_ack_acc'] ? 'checked' : ''; ?> <?= has_permission('ack_accounting') ? '' : 'disabled'; ?>>
                          <label class="form-check-label" for="ack_acc"> Accounting </label>
                        </div>
                        <input type="datetime-local" class="form-control d-print-none"
                          id="date_ack_acc" name="date_ack_acc" value="<?= old('date_ack_acc', $transaksi['date_ack_acc']); ?>" readonly>
                        <span class="d-none d-print-inline"><?= esc(old('date_ack_acc', $transaksi['date_ack_acc'])) ?></span>
                      </div>
                    </div>
                  </div>

                  <!-- Mengetahui: Controlling -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui <span class="d-none d-print-block">Controlling</span></h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_ctrl" name="ack_ctrl" <?= $transaksi['date_ack_ctrl'] ? 'checked' : ''; ?> <?= has_permission('ack_controlling') ? '' : 'disabled'; ?>>
                          <label class="form-check-label" for="ack_ctrl"> Controlling </label>
                        </div>
                        <input type="datetime-local" class="form-control d-print-none"
                          id="date_ack_ctrl" name="date_ack_ctrl" value="<?= old('date_ack_ctrl', $transaksi['date_ack_ctrl']); ?>" readonly>
                        <span class="d-none d-print-inline"><?= esc(old('date_ack_ctrl', $transaksi['date_ack_ctrl'])) ?></span>

                      </div>
                    </div>
                  </div>
                  <!-- <label for="upload_img" class="form-label ?= (validation_show_error('upload_img')) ? 'is-invalid' : ''; ?>">Upload Gambar</label> -->
                  <div class="col-md-2 mt-1">
                    <!-- <img src="/img/?= $transaksi['upload_img']; ?>" class="img-thumbnail img-preview" alt=""> -->
                    <!-- <img src="?= !empty($transaksi['upload_img']) ? '/img/' . $transaksi['upload_img'] : '/img/logo-jmi.png' ?>" class="img-thumbnail img-preview" alt="Foto Transaksi"> -->

                    <figure class="figure">
                      <img src="<?= !empty($transaksi['upload_img']) ? '/img/' . $transaksi['upload_img'] : '/img/logo-jmi.png' ?>" class="figure-img img-fluid rounded" alt="...">
                      <figcaption class="figure-caption"><?= !empty($transaksi['upload_img']) ? 'Lampiran Foto' : 'Lampiran foto tidak ada';?></figcaption>
                    </figure>
                  </div>
                  <div class="col-md-10 my-2">
                    <!-- <input class="form-control" type="file" id="upload_img" name="upload_img" onchange="previewimg()" multiple> -->
                    <div class="invalid-feedback">
                      <?= validation_show_error('upload_img'); ?>
                    </div>
                  </div>
                  <div class="col-12 mt-0">
                    <label for="catatan" class="form-label">Catatan Pojok</label>
                    <textarea id="catatan" name="catatan" class="form-control d-print-none" disabled><?= old('catatan', $transaksi['catatan']); ?></textarea>
                    <span class="d-none d-print-inline"><?= esc(old('catatan', $transaksi['catatan'])) ?></span>

                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                  </div>
                </form>
                <!-- ================================================ -->
                <!-- FORM CETAK HANYA UNTUK PRINT (d-none d-print-block) -->
                <!-- ================================================ -->
                <div class="d-none d-print-block" style="font-family: 'Segoe UI', Arial, sans-serif; font-size: 10pt; line-height: 1.4; margin: 0; padding: 0mm 10mm 0mm 10mm; width: 100%; box-sizing: border-box;">

                  <!-- Header Perusahaan -->
                  <div style="text-align: center; margin-bottom: 15px;">
                    <h3 style="margin: 0; font-weight: bold; font-size: 14pt;">PT. JAYAMAS MEDICA INDUSTRI, Tbk</h3>
                    <p style="margin: 5px 0 0 0; font-weight: bold; font-size: 12pt;">FORM PEMINDAHAN ASSET</p>
                  </div>

                  <!-- Department Asal -->
                  <h4 style="border-bottom: 1px solid #000; padding-bottom: 5px; margin: 15px 0 10px 0; font-size: 11pt; font-weight: bold;">DEPARTEMEN ASAL</h4>
                  <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>No Asset:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['no_asset']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Asset Class:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['nama_assetclass']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Plant:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['plant_asal']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Cost Center:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['cost_center_asal']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Sub Asset:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['sub_asset']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Nama Asset:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['nama_asset']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Tanggal Perolehan:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['tgl_perolehan']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Transaksi:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;">
                        <?php
                        $transaksiLabel = [
                          3 => 'Mutasi',
                          0 => 'Pelepasan',
                          1 => 'Penghentian',
                          2 => 'Penggabungan'
                        ];
                        echo isset($transaksiLabel[$transaksi['transaksi']]) ? $transaksiLabel[$transaksi['transaksi']] : '-';
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Tanggal Transaksi:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['tgl_transaksi']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Alasan Pemindahan:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= nl2br(esc($transaksi['alasan'])) ?></td>
                    </tr>
                  </table>

                  <!-- Department Tujuan -->
                  <h4 style="border-bottom: 1px solid #000; padding-bottom: 5px; margin: 15px 0 10px 0; font-size: 11pt; font-weight: bold;">DEPARTEMEN TUJUAN</h4>
                  <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Plant Tujuan:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($p['nama_plant']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Cost Center Tujuan:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($cc['nama_cost_center']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>No Asset:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['no_asset']) ?></td>
                    </tr>
                    <tr>
                      <td style="width: 120px; padding: 4px;"><strong>Nama Asset:</strong></td>
                      <td style="padding: 4px; border-bottom: 1px dotted #000;"><?= esc($transaksi['nama_asset']) ?></td>
                    </tr>
                  </table>

                  <!-- Signature Blok (3 Kolom) -->
                  <div style="display: flex; gap: 15px; margin-bottom: 10px;">

                    <!-- Departemen Asal -->
                    <div style="flex: 1; text-align: center;">
                      <h5 style="margin: 0 0 8px 0; font-size: 9pt; font-weight: bold;">DEPARTEMEN ASAL</h5>
                      <p style="margin: 0 0 15px 0; font-size: 9pt;">Menyetujui,</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_ttd_asal']) ?></small><br>
                      <small><strong>Kepala Bagian</strong></small><br>
                      <small><?= esc($transaksi['user_kabag_asal']) ?></small><br>
                      <br>
                      <p style="margin: 0 0 8px 0; font-size: 9pt; font-weight: bold;">PIC</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_pic']) ?></small><br>
                      <small><strong>PIC</strong></small><br>
                      <small><?= esc($transaksi['nama_pic']) ?></small>
                    </div>

                    <!-- Departemen Tujuan -->
                    <div style="flex: 1; text-align: center;">
                      <h5 style="margin: 0 0 8px 0; font-size: 9pt; font-weight: bold;">DEPARTEMEN TUJUAN</h5>
                      <p style="margin: 0 0 15px 0; font-size: 9pt;">Menyetujui,</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_ttd_tujuan']) ?></small><br>
                      <small><strong>Kepala Bagian</strong></small><br>
                      <small><?= esc($transaksi['user_kabag_tujuan']) ?></small><br>
                      <br>
                      <p style="margin: 0 0 8px 0; font-size: 9pt; font-weight: bold;">Plant Manager</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_direksi']) ?></small><br>
                      <small><strong>Plant Manager</strong></small><br>
                      <small><?= esc($transaksi['nama_direksi']) ?></small>
                    </div>

                    <!-- Mengetahui (Finance, Accounting, Controlling) -->
                    <div style="flex: 1; text-align: center;">
                      <h5 style="margin: 0 0 8px 0; font-size: 9pt; font-weight: bold;">MENGETAHUI</h5>
                      <p style="margin: 0 0 15px 0; font-size: 9pt;">Finance</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_ack_fin']) ?></small><br>
                      <br>
                      <p style="margin: 0 0 8px 0; font-size: 9pt;">Accounting</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_ack_acc']) ?></small><br>
                      <br>
                      <p style="margin: 0 0 8px 0; font-size: 9pt;">Controlling</p>
                      <div style="text-align: center; margin: 10px 0 5px 0; font-weight: bold; font-size: 12pt; color: #000; letter-spacing: 3px; text-transform: uppercase; font-family: 'Arial', sans-serif;">
                        APPROVED
                      </div>
                      <!-- <small><strong>Tanggal</strong></small><br> -->
                      <small><?= esc($transaksi['date_ack_ctrl']) ?></small>
                    </div>
                  </div>

                  <!-- Catatan Pojok -->
                  <div>
                    <strong>Catatan Pojok:</strong><br>
                    <span style="border-bottom: 1px dotted #000; padding: 2px 0; display: inline-block; width: 100%; margin-top: 5px;"><?= esc($transaksi['catatan']) ?></span>
                  </div>

                  <!-- Footer -->
                  <!-- <div style="margin-top: 30px; text-align: center; font-size: 9pt; color: #666; font-style: italic;">
                    Form ini sah apabila telah ditandatangani oleh pihak yang berwenang.
                  </div> -->

                </div>
                <!-- ================================================ -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?= $this->endSection(); ?>

    <?= $this->section('scripts-extra'); ?>
    <script>
      jQuery(function($) {
        if (!$('#no_asset').length) return; // <— guard
        if (!$.ui || !$.ui.autocomplete) return; // UI must be loaded

        $("#no_asset").autocomplete({
          source: "<?= base_url('api/assets/suggest') ?>",
          minLength: 2,
          delay: 200,
          select: function(event, ui) {
            if (!ui.item) return false;
            $("#no_asset").val(ui.item.no_asset);
            $("#asset_class").val(ui.item.asset_class);
            $("#plant_asal").val(ui.item.plant);
            $("#cost_center_asal").val(ui.item.cost_center);
            $("#sub_asset").val(ui.item.sub_asset);
            $("#nama_asset").val(ui.item.nama_asset);
            $("#tgl_perolehan").val(ui.item.tgl_perolehan);
            $("#area").val(ui.item.area);
            $("#gedung").val(ui.item.gedung);
            $("#lantai").val(ui.item.lantai);
            $("#id_asset").val(ui.item.id_asset);
            $("#id_assetclass").val(ui.item.id_assetclass);
            $("#id_plant_asal").val(ui.item.id_plant);
            $("#id_cost_center_asal").val(ui.item.id_cost_center);
            $("#id_lokasi_area").val(ui.item.id_lokasi_area);
            $("#id_lokasi_gedung").val(ui.item.id_lokasi_gedung);
            $("#id_lokasi_lantai").val(ui.item.id_lokasi_lantai);
            $("#no_asset_tujuan").val(ui.item.no_asset);
            $("#nama_asset_tujuan").val(ui.item.nama_asset);
            return false;
          }
        });
      });
    </script>
    <script>
      function updatePenyetuju() {
        const val = document.getElementById('transaksi').value;
        const penyetuju = document.querySelectorAll('.penyetuju');

        let text = "Direksi"; // default
        if (val == '3') {
          text = "Plant Manager";
        }

        penyetuju.forEach(el => {
          el.textContent = text;
        });
      }

      document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('transaksi');
        if (select) {
          // saat user ubah pilihan
          select.addEventListener('change', updatePenyetuju);
          // saat halaman pertama kali load (nilai lama dari DB)
          updatePenyetuju();
        }
      });
    </script>


    <script>
      jQuery(function($) {

        // Ambil fullname dari hidden input
        const fullname = $("#login_user").data("fullname");

        // Fungsi helper: isi atau hapus tanggal + nama
        function toggleDateName(checkboxSelector, dateInputSelector, nameInputSelector) {
          $(checkboxSelector).on('change', function() {
            if ($(this).is(':checked')) {
              let now = new Date();

              let y = now.getFullYear();
              let m = String(now.getMonth() + 1).padStart(2, '0');
              let d = String(now.getDate()).padStart(2, '0');
              let h = String(now.getHours()).padStart(2, '0');
              let i = String(now.getMinutes()).padStart(2, '0');

              let formatted = `${y}-${m}-${d}T${h}:${i}`;
              $(dateInputSelector).val(formatted);

              // isi nama user login
              $(nameInputSelector).val(fullname);
            } else {
              $(dateInputSelector).val('');
              $(nameInputSelector).val('');
            }
          });
        }

        // Panggil untuk semua pasangan switch & tanggal + nama
        toggleDateName('#approve_kabag_asal', '#date_ttd_asal');
        toggleDateName('#approve_kabag_tujuan', '#date_ttd_tujuan');
        toggleDateName('#approve_it', '#date_pic', '#nama_pic');
        toggleDateName('#approve_dir', '#date_direksi', '#nama_direksi');
        toggleDateName('#ack_fin', '#date_ack_fin', '#nama_fin');
        toggleDateName('#ack_acc', '#date_ack_acc', '#nama_acc');
        toggleDateName('#ack_ctrl', '#date_ack_ctrl', '#nama_ctrl');
        toggleDateName('#approve_it', '#date_pic', '#nama_pic');
      });
    </script>

    <!-- <script>
      document.addEventListener('DOMContentLoaded', function() {
        const chkAsal = document.getElementById('approve_kabag_asal');
        const chkTujuan = document.getElementById('approve_kabag_tujuan');
        const dateAsal = document.getElementById('date_ttd_asal');
        const dateTujuan = document.getElementById('date_ttd_tujuan');
        const userAsal = document.getElementById('user_kabag_asal');
        const userTujuan = document.getElementById('user_kabag_tujuan');

        // Fungsi untuk mengatur tanggal dan nama otomatis
        function setApprovalData(input, dateField, userField, name) {
          if (input.checked) {
            const now = new Date().toISOString().slice(0, 16); // format YYYY-MM-DDTHH:MM
            dateField.value = now;
            userField.value = name; // Ganti dengan nama pengguna sesuai konteks
          } else {
            dateField.value = '';
            userField.value = '';
          }
        }

        // Handler untuk checkbox Dept Asal
        chkAsal.addEventListener('change', function() {
          if (this.checked) {
            chkTujuan.checked = false;
            setApprovalData(chkTujuan, dateTujuan, userTujuan, ''); // clear tujuan
            setApprovalData(chkAsal, dateAsal, userAsal, 'Budi Santoso'); // isi asal
          } else {
            dateAsal.value = '';
            userAsal.value = '';
          }
        });

        // Handler untuk checkbox Dept Tujuan
        chkTujuan.addEventListener('change', function() {
          if (this.checked) {
            chkAsal.checked = false;
            setApprovalData(chkAsal, dateAsal, userAsal, ''); // clear asal
            setApprovalData(chkTujuan, dateTujuan, userTujuan, 'Siti Rahma'); // isi tujuan
          } else {
            dateTujuan.value = '';
            userTujuan.value = '';
          }
        });
      });
    </script> -->
    <script>
      function printTransaction() {
        // Tambahkan class sementara untuk isolasi print
        document.body.classList.add('printing-transaction');
        window.print();
        document.body.classList.remove('printing-transaction');
      }
    </script>
    <?= $this->endSection(); ?>