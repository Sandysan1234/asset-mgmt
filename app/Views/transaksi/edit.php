    <?= $this->extend('templates/index'); ?>
    <?= $this->section('page-content'); ?>

    <!-- jQuery UI (kalau belum ada di layout) -->
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> -->

    <div class="pc-container">
      <div class="pc-content">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h5>Form Pemindahan Asset</h5>
              </div>

              <div class="card-body">

                <form action="/transaksi/update/<?= $transaksi['id_transaksi']; ?>" method="post" class="row g-3">
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

                  <h5>Department Asal</h5>

                  <div class="col-md-4">
                    <label for="no_asset" class="form-label">No Asset</label>
                    <input type="text" id="no_asset" name="no_asset" class="form-control" placeholder="Cari No Asset..." disabled required value="<?= old('no_asset', $transaksi['no_asset']); ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="asset_class" class="form-label">Asset Class</label>
                    <input type="text" id="asset_class" name="asset_class" class="form-control" disabled value="<?= old('nama_assetclass', $transaksi['nama_assetclass']); ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="plant_asal" class="form-label">Plant</label>
                    <input type="text" id="plant_asal" name="plant_asal" class="form-control" value="<?= old('plant_asal', $transaksi['plant_asal']); ?>" disabled readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="cost_center_asal" class="form-label">Cost Center</label>
                    <input type="text" id="cost_center_asal" name="cost_center_asal" class="form-control" value="<?= old('cost_center_asal', $transaksi['cost_center_asal']); ?>" disabled readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="sub_asset" class="form-label">Sub Asset</label>
                    <input type="text" id="sub_asset" name="sub_asset" class="form-control" disabled value="<?= old('no_asset', $transaksi['no_asset']); ?>" readonly>
                  </div>

                  <div class="col-md-4">
                    <label for="nama_asset" class="form-label">Nama Asset</label>
                    <input type="text" id="nama_asset" name="nama_asset" class="form-control" disabled value="<?= old('nama_asset', $transaksi['nama_asset']); ?>" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
                    <input type="date" id="tgl_perolehan" name="tgl_perolehan" class="form-control" disabled value="<?= old('tgl_perolehan', $transaksi['tgl_perolehan']); ?>" readonly>
                  </div>
                  
                  <div class="col-md-4">
                    <label for="transaksi" class="form-label">Transaksi</label>
                    <select id="transaksi" name="transaksi" class="form-select  <?= (validation_show_error('transaksi')) ? 'is-invalid' : ''; ?>" disabled>
                      <option value="">Pilih Transaksi</option>
                      <option value="3" <?= old('transaksi', $transaksi['transaksi']) == 3 ? 'selected' : ''; ?>>Mutasi</option>
                      <option value="0" <?= old('transaksi', $transaksi['transaksi']) == 0 ? 'selected' : ''; ?>>Pelepasan</option>
                      <option value="1" <?= old('transaksi', $transaksi['transaksi']) == 1 ? 'selected' : ''; ?>>Penghentian</option>
                      <option value="2" <?= old('transaksi', $transaksi['transaksi']) == 2 ? 'selected' : ''; ?>>Penggabungan</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= validation_show_error('transaksi'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="datetime-local" id="tgl_transaksi" name="tgl_transaksi" class="form-control" value="<?= old('tgl_transaksi', $transaksi['tgl_transaksi']); ?>" disabled required>
                  </div>
                  <div class="col-12">
                    <label for="alasan" class="form-label">Alasan Pemindahan</label>
                    <textarea id="alasan" name="alasan" class="form-control" disabled required><?= old('alasan', $transaksi['alasan']); ?></textarea>
                  </div>

                  <hr class="mt-4">
                  <h5>Department Tujuan</h5>
                  <div class="col-md-3">
                    <label for="id_plant_baru" class="form-label">Plant Tujuan</label>
                    <select id="id_plant_baru" name="id_plant_baru" class="form-select" disabled>
                      <option selected disabled>Pilih Plant</option>
                      <?php foreach ($plants as $p): ?>
                        <option value="<?= esc($p['id_plant']) ?>" <?= old('id_plant_baru', $transaksi['id_plant_baru']) == $p['id_plant'] ? 'selected' : ''; ?>><?= esc($p['nama_plant']) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="id_cost_center_baru" class="form-label">Cost Center Tujuan</label>
                    <select id="id_cost_center_baru" name="id_cost_center_baru" class="form-select" disabled>
                      <option value="">Pilih Cost Center</option>
                      <?php foreach ($cost_center as $cc): ?>
                        <option value="<?= esc($cc['id_cost_center']) ?>" <?= old('id_cost_center_baru', $transaksi['id_cost_center_baru']) == $cc['id_cost_center'] ? 'selected' : ''; ?>><?= esc($cc['nama_cost_center']) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="no_asset_tujuan" class="form-label">No Asset</label>
                    <input type="text" id="no_asset_tujuan" name="no_asset_tujuan" class="form-control" value="<?= old('no_asset', $transaksi['no_asset']); ?>" disabled readonly>
                  </div>
                  <div class="col-md-3">
                    <label for="nama_asset_tujuan" class="form-label">Nama Asset</label>
                    <input type="text" id="nama_asset_tujuan" name="nama_asset_tujuan" class="form-control" value="<?= old('nama_asset', $transaksi['nama_asset']); ?>" disabled readonly>
                  </div>
                  <hr class="mt-4">
                  <h3 class="text-center">Signature</h3>

                  <!-- Dept. Asal -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Dept. Asal</h6>
                        <p>Menyetujui,</p>
                        <div class="row g-3 align-items-end">
                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch  form-check-reverse custom-switch-v1">
                              <label class="form-check-label ps-0" for="approve_kabag_asal"> Kepala Bagian</label>
                              <input class="form-check-input" type="radio" role="switch"
                                id="approve_kabag_asal" name="approve_kabag_asal" <?= $transaksi['date_ttd_asal'] ? 'checked' : '' ?> <?= has_permission('approve_kabag_asal') ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_asal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control"
                              id="date_ttd_asal" name="date_ttd_asal" value="<?= old('date_ttd_asal', $transaksi['date_ttd_asal']); ?>" readonly>
                          </div>

                          <!-- opsional: pilih pejabat -->
                          <div class="col-12">
                            <label for="user_kabag_asal" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control"
                              id="user_kabag_asal" name="user_kabag_asal" placeholder="Mis. Budi Santoso" value="<?= old('user_kabag_asal', $transaksi['user_kabag_asal']); ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Dept. Tujuan -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Dept. Tujuan</h6>
                        <p>Menyetujui,</p>
                        <div class="row g-3 align-items-end">

                          <div class="col-12">
                            <div class="d-flex justify-content-between form-check form-switch form-check-reverse custom-switch-v1">
                              <label class="form-check-label" for="approve_kabag_tujuan"> Kepala Bagian</label>
                              <input class="form-check-input" type="radio" role="switch"
                                id="approve_kabag_tujuan" name="approve_kabag_tujuan" <?= $transaksi['date_ttd_tujuan'] ? 'checked' : ''; ?> <?= has_permission('approve_kabag_tujuan') ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_tujuan" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control"
                              id="date_ttd_tujuan" name="date_ttd_tujuan" value="<?= $transaksi['date_ttd_tujuan']; ?>" readonly>
                          </div>
                          <div class="col-12">
                            <label for="user_kabag_tujuan" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control"
                              id="user_kabag_tujuan" name="user_kabag_tujuan" placeholder="Mis. Siti Rahma" value="<?= old('user_kabag_tujuan', $transaksi['user_kabag_tujuan']); ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Menyetujui: IT -->
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Menyetujui: </h6>

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
                            <input type="datetime-local" class="form-control no-click"
                              id="date_pic" name="date_pic" value="<?= old('date_pic', $transaksi['date_pic']); ?>" readonly>
                          </div>
                          <div class="col-12">
                            <label for="nama_pic" class="form-label">Nama PIC</label>
                            <input type="text" class="form-control no-click"
                              id="nama_pic" name="nama_pic" placeholder="Mis. Admin IT" value="<?= old('nama_pic', $transaksi['nama_pic']); ?>" readonly>
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
                              <input class="form-check-input no-click" type="checkbox" role="switch"
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
                            <input type="datetime-local" class="form-control no-click"
                              id="date_direksi" name="date_direksi" value="<?= old('date_direksi', $transaksi['date_direksi']); ?>" readonly>
                          </div>
                          <div class="col-12">
                            <label for="nama_direksi" class="form-label">Nama <span class="penyetuju"></span> </label>
                            <input type="text" class="form-control no-click"
                              id="nama_direksi" name="nama_direksi" placeholder="Mis. Direktur Operasional" value="<?= old('nama_direksi', $transaksi['nama_direksi']); ?>" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Mengetahui: Manager Finance -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body border ">
                        <h6>Mengetahui</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_fin" name="ack_fin" <?= $transaksi['date_ack_fin'] ? 'checked' : '' ;?> <?= has_permission('ack_finance') ? '' : 'disabled' ?>>
                          <label class="form-check-label" for="ack_fin"> Manager Finance</label>
                        </div>
                        <input type="datetime-local" class="form-control"
                          id="date_ack_fin" name="date_ack_fin" value="<?= old('date_ack_fin', $transaksi['date_ack_fin']); ?>" readonly>
                      </div>
                    </div>
                  </div>

                  <!-- Mengetahui: Accounting -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_acc" name="ack_acc" <?= $transaksi['date_ack_acc'] ? 'checked' : '';?> <?= has_permission('ack_accounting') ? '' :'disabled';?>>
                          <label class="form-check-label" for="ack_acc"> Accounting </label>
                        </div>
                        <input type="datetime-local" class="form-control"
                          id="date_ack_acc" name="date_ack_acc" readonly>
                      </div>
                    </div>
                  </div>

                  <!-- Mengetahui: Controlling -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_ctrl" name="ack_ctrl" <?= $transaksi['date_ack_ctrl'] ? 'checked' : '';?> <?= has_permission('ack_controlling') ? '' : 'disabled';?>>
                          <label class="form-check-label" for="ack_ctrl"> Controlling </label>
                        </div>
                        <input type="datetime-local" class="form-control"
                          id="date_ack_ctrl" name="date_ack_ctrl" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-0">
                    <label for="catatan" class="form-label">Catatan Pojok</label>
                    <textarea id="catatan" name="catatan" class="form-control" disabled></textarea>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                  </div>
                </form>
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
          text = "Plan Manager";
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


    <!-- <script>
     jQuery(function($) {

      // Fungsi helper: isi atau hapus tanggal + jam
      function toggleDate(checkboxSelector, dateInputSelector) {
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
        } else {
         $(dateInputSelector).val('');
        }
       });
      }

      // Panggil untuk semua pasangan switch & tanggal
      toggleDate('#approve_kabag_asal', '#date_ttd_asal');
      toggleDate('#approve_kabag_tujuan', '#date_ttd_tujuan');
      toggleDate('#approve_it', '#date_pic');
      toggleDate('#approve_dir', '#date_direksi');
      toggleDate('#ack_fin', '#date_ack_fin');
      toggleDate('#ack_acc', '#date_ack_acc');
      toggleDate('#ack_ctrl', '#date_ack_ctrl');

     });
    </script> -->
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
        toggleDateName('#approve_kabag_asal', '#date_ttd_asal', '#user_kabag_asal');
        toggleDateName('#approve_kabag_tujuan', '#date_ttd_tujuan', '#user_kabag_tujuan');
        toggleDateName('#approve_it', '#date_pic', '#nama_pic');
        toggleDateName('#approve_dir', '#date_direksi', '#nama_direksi');
        toggleDateName('#ack_fin', '#date_ack_fin', '#nama_fin');
        toggleDateName('#ack_acc', '#date_ack_acc', '#nama_acc');
        toggleDateName('#ack_ctrl', '#date_ack_ctrl', '#nama_ctrl');
        toggleDateName('#approve_it', '#date_pic', '#nama_pic');
      });
    </script>


    </script>
    <?= $this->endSection(); ?>