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
              <li class="breadcrumb-item" aria-current="page">Buat Stock Opname</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Buat Stock Opname </h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Stock Opname</h5>
          </div>
          <div class="card-body tbl-card">
            <!-- <div class="col-12">
              <h2>Stock Opname Asset</h2>
              <p>Scan QR atau masukkan URL asset:</p>
              <form action="">
                <input type="text" id="qrInput" placeholder="https://domain/asset/detail/11" />
                <button class="btn btn-primary" id="cekBtn">Cek Asset</button>
              </form>

              <div class="col-12">
                <div id="result"></div>
                <button id="saveBtn" class="btn btn-light-success">Simpan ke Stock Opname</button>

              </div>
            </div> -->
            <!-- <div class="col-12">
              <form action="/stockopnamelalalla" method="get">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Masukkan URL Asset" aria-label="Recipient’s username" aria-describedby="button-addon2">
                  <small class="text-muted">Contoh: <code>/asset/detail/123</code></small>
                  <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                </div>
              </form>

              disini untuk table listnya lalu bisa disimpan
            </div> -->
            <!-- Form Input QR -->


            <!-- Tabel List Stock Opname -->
            <h5>Tanggal: <?= date('d-m-y'); ?></h5>
            <div class="table-responsive mt-4">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>No Asset</th>
                    <th>Nama Asset</th>
                    <th>Status Asset</th>
                  </tr>
                </thead>
                <tbody id="listTable">
                  <tr>
                    <td colspan="3" class="text-center text-muted">List data</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form id="formCekAsset">
              <div class="mb-3">
                <label for="qrInput" class="form-label">Masukkan No Asset atau URL</label>
                <div class="input-group">
                  <!-- <input type="text" id="no_asset" name="no_asset" class="form-control" required autofocus placeholder="Cari No Asset..."> -->

                  <input
                    type="text"
                    id="qrInput"
                    class="form-control"
                    autofocus
                    required
                    placeholder="Contoh: 61000000 atau /asset/detail/123"
                    aria-label="Masukkan No Asset atau URL">
                  <button class="btn btn-primary" type="submit" id="button-addon2">
                    Tambahkan
                  </button>
                </div>
                <p class="text-muted mt-1 d-block">
                  Contoh No/Nama Asset: <code>laptop</code> |<code>61000000</code> atau URL: <code>/asset/detail/123</code>
                </p>
              </div>
            </form>

            <!-- Tombol Simpan Semua -->
            <div class="mt-3 text-end">
              <button id="saveAllBtn" class="btn btn-success" disabled>
                <i class="fas fa-save"></i> Simpan Data
              </button>
            </div>
          </div>
          <div id="alertToast" class="alert alert-warning alert-fixed d-none"></div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>
<?= $this->endSection('page-content'); ?>

<?= $this->section('scripts-extra'); ?>

<script>
  jQuery(function($) {
    if (!$('#qrInput').length) return; // <— guard
    if (!$.ui || !$.ui.autocomplete) return; // UI must be loaded

    $("#qrInput").autocomplete({
      source: "<?= base_url('api/assets/suggest') ?>",
      minLength: 2,
      delay: 200,
      select: function(event, ui) {
        if (!ui.item) return false;
        $("#qrInput").val(ui.item.no_asset);
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
  const baseUrl = '<?= base_url() ?>';
  const qrInput = document.getElementById('qrInput');
  const form = document.getElementById('formCekAsset');
  const listTable = document.getElementById('listTable');
  const saveAllBtn = document.getElementById('saveAllBtn');
  const alertToast = document.getElementById('alertToast');

  // Simpan list sementara
  let opnameList = [];

  // Ekstrak ID dari URL: /asset/detail/11
  function extractId(url) {
    const match = url.toString().trim().match(/\/asset\/detail\/(\d+)$/);
    return match ? match[1] : null;
  }

  // Tampilkan Toast
  function showToast(message, type = 'warning') {
    alertToast.className = `alert alert-${type} alert-fixed d-block`;
    alertToast.textContent = message;
    setTimeout(() => {
      alertToast.classList.add('d-none');
    }, 3000);
  }

  // Cegah submit form reload, lalu proses tambah
  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const url = qrInput.value.trim();
    if (!url) {
      showToast("Masukkan URL terlebih dahulu!", "danger");
      return;
    }

    let noAsset, namaAsset, status;

    const assetId = extractId(url);
    // ==========================================/////////
    if (assetId) {
      // Input berupa URL → ambil via ID
      try {
        const response = await fetch(`${baseUrl}stock-opname/cekAsset?id=${assetId}`);
        const data = await response.json();
        if (data.status === 'success') {
          const asset = data.data;
          noAsset = asset.no_asset;
          namaAsset = asset.nama_asset;
          status = "Ada";
        } else {
          noAsset = assetId; // fallback
          namaAsset = "(Tidak Ditemukan)";
          status = "Tidak Ada";
        }
      } catch (err) {
        noAsset = assetId;
        namaAsset = "(Error)";
        status = "Tidak Ada";
      }
    } else {
      // Input dianggap sebagai No Asset → cek langsung via no_asset
      noAsset = url; // gunakan input langsung sebagai no_asset
      try {
        const response = await fetch(`${baseUrl}/stock-opname/cekAssetByNo?no_asset=${encodeURIComponent(noAsset)}`);
        const data = await response.json();
        if (data.status === 'success') {
          const asset = data.data;
          namaAsset = asset.nama_asset;
          status = "Ada";
        } else {
          namaAsset = "(Tidak Ditemukan)";
          status = "Tidak Ada";
        }
      } catch (err) {
        namaAsset = "(Error)";
        status = "Tidak Ada";
      }
    }

    // Cek duplikat
    if (opnameList.some(item => item.no_asset === noAsset)) {
      showToast(`No Asset ${noAsset} sudah ada di list!`, "warning");
      qrInput.value = '';
      qrInput.focus();
      return;
    }

    // Tambah ke list
    opnameList.push({
      no_asset: noAsset,
      nama_asset: namaAsset,
      status_asset: status,
      created_by: '<?= user()->username; ?>',
      // updated_at:

    });

    // Kosongkan pesan "belum ada data"
    if (listTable.rows.length === 1 && listTable.rows[0].cells[0].colSpan === "3") {
      listTable.innerHTML = '';
    }

    // Tambah baris ke tabel
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>${noAsset}</td>
        <td>${namaAsset}</td>
        <td>
            <span class="badge ${status === 'Ada' ? 'bg-success' : 'bg-danger'}">
                ${status}
            </span>
        </td>
    `;
    listTable.appendChild(row);

    // Aktifkan tombol simpan
    saveAllBtn.disabled = false;

    // Reset input
    qrInput.value = '';
    qrInput.focus();
    showToast("Berhasil ditambahkan!", "success");
  });

  // Simpan Semua ke Database
  saveAllBtn.addEventListener('click', async () => {
    if (opnameList.length === 0) return;

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    try {
      const response = await fetch(`${baseUrl}/stock-opname/saveAll`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(opnameList)
      });

      const result = await response.json();

      if (result.status === 'success') {
        showToast(`Berhasil simpan ${result.saved} item!`, 'success');
        opnameList = [];
        saveAllBtn.disabled = true;
        // Kosongkan input
        document.getElementById('formCekAsset').reset();
      } else {
        showToast('Gagal: ' + result.message, 'danger');
      }
    } catch (err) {
      showToast('Error: ' + err.message, 'danger');
    }
  });
</script>
<?= $this->endSection(); ?>
