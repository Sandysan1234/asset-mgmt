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
                <form action="/transaksi/save" method="post" class="row g-3">
                  <?= csrf_field(); ?>

                  <!-- hidden ids untuk relasi -->
                  <input type="hidden" id="id_asset" name="id_asset">
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
                    <input type="text" id="no_asset" name="no_asset" class="form-control" placeholder="Cari No Asset..." required value="<?= old('no_asset'); ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="asset_class" class="form-label">Asset Class</label>
                    <input type="text" id="asset_class" name="asset_class" class="form-control" readonly value="<?= old('asset_class'); ?>">
                  </div>
                  <div class="col-md-4">
                    <label for="plant_asal" class="form-label">Plant</label>
                    <input type="text" id="plant_asal" name="plant_asal" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="cost_center_asal" class="form-label">Cost Center</label>
                    <input type="text" id="cost_center_asal" name="cost_center_asal" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="sub_asset" class="form-label">Sub Asset</label>
                    <input type="text" id="sub_asset" name="sub_asset" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="nama_asset" class="form-label">Nama Asset</label>
                    <input type="text" id="nama_asset" name="nama_asset" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_perolehan" class="form-label">Tanggal Perolehan</label>
                    <input type="date" id="tgl_perolehan" name="tgl_perolehan" class="form-control" readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="transaksi" class="form-label">Transaksi</label>
                    <select id="transaksi" name="transaksi" required class="form-select <?= (validation_show_error('transaksi')) ? 'is-invalid' : ''; ?>">
                      <option value="">Pilih Transaksi</option>
                      <option value="3">Mutasi</option>
                      <option value="0">Pelepasan</option>
                      <option value="1">Penghentian</option>
                      <option value="2">Penggabungan</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= validation_show_error('transaksi'); ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tgl_transaksi" class="form-label">Tanggal Transaksi</label>
                    <input type="datetime-local" id="tgl_transaksi" name="tgl_transaksi" class="form-control" required>
                  </div>
                  <div class="col-12">
                    <label for="alasan" class="form-label">Alasan Pemindahan</label>
                    <textarea id="alasan" name="alasan" class="form-control" required></textarea>
                  </div>

                  <hr class="mt-4">
                  <h5>Department Tujuan</h5>
                  <div class="col-md-3">
                    <label for="id_plant_baru" class="form-label">Plant Tujuan</label>
                    <select id="id_plant_baru" name="id_plant_baru" class="form-select">
                      <option value="">Pilih Plant</option>
                      <?php foreach ($plant as $p): ?>
                        <option value="<?= esc($p['id_plant']) ?>"><?= esc($p['nama_plant']) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="id_cost_center_baru" class="form-label">Cost Center Tujuan</label>
                    <select id="id_cost_center_baru" name="id_cost_center_baru" class="form-select">
                      <option value="">Pilih Cost Center</option>
                      <?php foreach ($cost_center as $cc): ?>
                        <option value="<?= esc($cc['id_cost_center']) ?>"><?= esc($cc['nama_cost_center']) ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="no_asset_tujuan" class="form-label">No Asset</label>
                    <input type="text" id="no_asset_tujuan" name="no_asset_tujuan" class="form-control" readonly>
                  </div>
                  <div class="col-md-3">
                    <label for="nama_asset_tujuan" class="form-label">Nama Asset</label>
                    <input type="text" id="nama_asset_tujuan" name="nama_asset_tujuan" class="form-control" readonly>
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
                              <label class="form-check-label ps-0" for="approve_kabag_asal"> Kepala Bagian </label>
                              <input class="form-check-input" type="checkbox" role="switch"
                                id="approve_kabag_asal" name="approve_kabag_asal" <?= has_permission('approve_kabag_asal') ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_asal" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control"
                              id="date_ttd_asal" name="date_ttd_asal" readonly>
                          </div>

                          <!-- opsional: pilih pejabat -->
                          <div class="col-12">
                            <label for="user_kabag_asal" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control"
                              id="user_kabag_asal" name="user_kabag_asal" placeholder="Mis. Budi Santoso" readonly>
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
                              <label class="form-check-label" for="approve_kabag_tujuan"> Kepala Bagian </label>
                              <input class="form-check-input" type="checkbox" role="switch"
                                id="approve_kabag_tujuan" name="approve_kabag_tujuan"
                                <?= has_permission('approve_kabag_tujuan') ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_ttd_tujuan" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control"
                              id="date_ttd_tujuan" name="date_ttd_tujuan" readonly>
                          </div>
                          <div class="col-12">
                            <label for="user_kabag_tujuan" class="form-label">Nama Kepala Bagian</label>
                            <input type="text" class="form-control"
                              id="user_kabag_tujuan" name="user_kabag_tujuan" placeholder="Mis. Siti Rahma" readonly>
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
                                id="approve_it" name="approve_it" required
                                <?= has_permission('approve_pic') ? '' : 'disabled' ?>>
                            </div>
                          </div>
                          <div class="col-12  ">
                            <label for="date_pic" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control no-click"
                              id="date_pic" name="date_pic" required readonly>
                          </div>
                          <div class="col-12">
                            <label for="nama_pic" class="form-label">Nama PIC</label>
                            <input type="text" class="form-control no-click"
                              id="nama_pic" name="nama_pic" placeholder="Mis. Admin IT" readonly>
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
                                id="approve_dir" name="approve_dir" <?= has_permission('approve_direksi') ? '' : 'disabled' ?> readonly>
                            </div>
                          </div>
                          <div class="col-12">
                            <label for="date_direksi" class="form-label">Tanggal</label>
                            <input type="datetime-local" class="form-control no-click"
                              id="date_direksi" name="date_direksi" readonly>
                          </div>
                          <div class="col-12">
                            <label for="nama_direksi" class="form-label">Nama <span class="penyetuju"></span> </label>
                            <input type="text" class="form-control no-click"
                              id="nama_direksi" name="nama_direksi" placeholder="Mis. Direktur Operasional" readonly>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Mengetahui: Manager Finance -->
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch"
                            id="ack_fin" name="ack_fin" <?= has_permission('ack_finance') ? '' : 'disabled' ?>>
                          <label class="form-check-label" for="ack_fin"> Manager Finance</label>
                        </div>
                        <input type="datetime-local" class="form-control"
                          id="date_ack_fin" name="date_ack_fin" readonly>
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
                            id="ack_acc" name="ack_acc" <?= has_permission('ack_accounting') ? '' : 'disabled' ?>>
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
                            id="ack_ctrl" name="ack_ctrl" <?= has_permission('ack_controlling') ? '' : 'disabled' ?>>
                          <label class="form-check-label" for="ack_ctrl"> Controlling </label>
                        </div>
                        <input type="datetime-local" class="form-control"
                          id="date_ack_ctrl" name="date_ack_ctrl" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 mt-0">
                    <label for="catatan" class="form-label">Catatan Pojok</label>
                    <textarea id="catatan" name="catatan" class="form-control"></textarea>
                  </div>

                  <div class="col-12">
                    <button type="submit" <?= has_permission('approve_pic') ? '' : ''; ?> class="btn btn-primary">Simpan Transaksi</button>
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
      document.getElementById('transaksi').addEventListener('change', function() {
        const val = this.value;
        const penyetuju = document.querySelectorAll('.penyetuju');

        let text = "Direksi"; // default
        if (val == '3') {
          text = "Plan Manager";
        }

        penyetuju.forEach(el => {
          el.textContent = text;
        });
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



        toggleDateName('#approve_it', '#date_pic', '#nama_pic');
        toggleDateName('#approve_dir', '#date_direksi', '#nama_direksi');
        toggleDateName('#approve_kabag_asal', '#date_ttd_asal', '#user_kabag_asal');
        toggleDateName('#approve_kabag_tujuan', '#date_ttd_tujuan', '#user_kabag_tujuan');
        toggleDateName('#ack_fin', '#date_ack_fin', null);
        toggleDateName('#ack_acc', '#date_ack_acc', null);
        toggleDateName('#ack_ctrl', '#date_ack_ctrl', null);

      });
    </script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        const transaksi = document.getElementById("transaksi");
        const plant = document.getElementById("id_plant_baru");
        const costCenter = document.getElementById("id_cost_center_baru");

        function toggleFields() {
          if (transaksi.value === "3") { // 3 = Mutasi
            plant.removeAttribute("disabled");
            costCenter.removeAttribute("disabled");
          } else {
            plant.setAttribute("disabled", "disabled");
            costCenter.setAttribute("disabled", "disabled");
            plant.value = "";
            costCenter.value = "";
          }
        }

        // cek saat halaman pertama kali load
        toggleFields();

        // cek setiap kali user ubah dropdown transaksi
        transaksi.addEventListener("change", toggleFields);
      });
    </script>
    <script>
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
    </script>

    <?= $this->endSection(); ?>