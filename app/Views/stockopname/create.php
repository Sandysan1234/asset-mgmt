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
            <h5>Stock Opname</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
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
                  <label for="qrInput" class="form-label">Scan QR atau Masukkan URL Asset</label>
                  <div class="input-group">
                    <input
                      type="text"
                      id="qrInput"
                      class="form-control"
                      placeholder="https://asset.jmiis.com/asset/detail/1"
                      aria-label="Masukkan URL asset"
                      required autofocus>
                    <button class="btn btn-primary" type="submit" id="button-addon2">
                      Tambahkan
                    </button>
                  </div>
                  <p class="text-muted mt-1 d-block">Contoh: <code>/asset/detail/123</code> </p>
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
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

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

    if (!assetId) {
      // Jika format salah, minta No Asset manual
      noAsset = prompt("URL tidak valid. Masukkan No Asset:", "");
      if (!noAsset) return;
      namaAsset = "(Tidak Dikenal)";
      status = "Tidak Ada";
    } else {
      try {
        const response = await fetch(`${baseUrl}/stock-opname/cekAsset?id=${assetId}`);
        const data = await response.json();

        if (data.status === 'success') {
          const asset = data.data;
          noAsset = asset.no_asset;
          namaAsset = asset.nama_asset;
          status = "Ada";
        } else {
          noAsset = prompt("Asset tidak ditemukan. No Asset?", assetId);
          if (!noAsset) return;
          namaAsset = "(Tidak Ditemukan)";
          status = "Tidak Ada";
        }
      } catch (err) {
        noAsset = prompt("Gagal koneksi. No Asset?", assetId);
        if (!noAsset) return;
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
    showToast("✅ Berhasil ditambahkan!", "success");
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
        showToast(`✅ Berhasil simpan ${result.saved} item!`, 'success');
        opnameList = [];
        saveAllBtn.disabled = true;
        // Kosongkan input
        document.getElementById('formCekAsset').reset();
      } else {
        showToast('❌ Gagal: ' + result.message, 'danger');
      }
    } catch (err) {
      showToast('❌ Error: ' + err.message, 'danger');
    }
  });
</script>
<!-- <script>
  const baseUrl = '<?= base_url() ?>';
  const qrInput = document.getElementById('qrInput');
  const cekBtn = document.getElementById('cekBtn');
  const saveBtn = document.getElementById('saveBtn');
  const listTable = document.querySelector('#listTable tbody');
  const messageDiv = document.getElementById('message');

  // Simpan list asset sementara
  let opnameList = [];

  // Ekstrak ID dari URL
  function extractId(url) {
    const match = url.toString().match(/\/asset\/detail\/(\d+)$/);
    return match ? match[1] : null;
  }

  // Tampilkan pesan
  function showMessage(text, type = 'error') {
    messageDiv.innerHTML = `<p class="${type}">${text}</p>`;
    setTimeout(() => {
      messageDiv.innerHTML = '';
    }, 3000);
  }

  // Cek Asset
  cekBtn.addEventListener('click', async () => {
    const url = qrInput.value.trim();
    if (!url) {
      showMessage('Masukkan URL terlebih dahulu!', 'error');
      return;
    }

    const assetId = extractId(url);
    if (!assetId) {
      showMessage('URL tidak valid. Pastikan mengandung /detail/{id}', 'error');
      return;
    }

    try {
      const response = await fetch(`${baseUrl}/stock-opname/cekAsset?id=${assetId}`);
      const data = await response.json();

      if (data.status === 'success') {
        const asset = data.data;

        // Cek duplikat
        if (opnameList.some(a => a.asset_id == asset.id)) {
          showMessage('Asset ini sudah ada di list!', 'error');
          qrInput.value = '';
          qrInput.focus();
          return;
        }

        // Tambah ke list
        opnameList.push({
          asset_id: asset.id,
          no_asset: asset.no_asset,
          nama_asset: asset.nama_asset
        });

        // Tambah ke tabel
        const row = document.createElement('tr');
        row.dataset.id = asset.id;
        row.innerHTML = `
                <td>${asset.no_asset}</td>
                <td>${asset.nama_asset}</td>
                <td><button class="hapus-btn" data-id="${asset.id}">Hapus</button></td>
            `;
        listTable.appendChild(row);

        // Aktifkan tombol simpan
        saveBtn.disabled = false;

        // Kosongkan input
        qrInput.value = '';
        qrInput.focus();
        showMessage('Asset berhasil ditambahkan!', 'success');

      } else {
        showMessage(data.message, 'error');
      }
    } catch (err) {
      showMessage('Gagal terhubung ke server.', 'error');
    }
  });

  // Hapus item dari list
  listTable.addEventListener('click', (e) => {
    if (e.target.classList.contains('hapus-btn')) {
      const assetId = e.target.dataset.id;
      opnameList = opnameList.filter(a => a.asset_id != assetId);
      e.target.closest('tr').remove();

      if (opnameList.length === 0) {
        saveBtn.disabled = true;
      }
    }
  });

  // Simpan Semua ke Database
  saveBtn.addEventListener('click', async () => {
    if (opnameList.length === 0) return;

    try {
      const response = await fetch(`${baseUrl}/stock-opname/saveAll`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(opnameList)
      });

      const result = await response.json();

      if (result.status === 'success') {
        showMessage(`Berhasil simpan ${result.saved} item!`, 'success');
        opnameList = [];
        listTable.innerHTML = '';
        saveBtn.disabled = true;
        qrInput.focus();
      } else {
        showMessage('Gagal menyimpan: ' + (result.message || ''), 'error');
      }
    } catch (err) {
      showMessage('Error koneksi: ' + err.message, 'error');
    }
  });
</script> -->
<!-- <script>
  const baseUrl = '<?= base_url() ?>';
  const qrInput = document.getElementById('qrInput');
  const cekBtn = document.getElementById('cekBtn');
  const saveBtn = document.getElementById('saveBtn');
  const resultDiv = document.getElementById('result');

  let currentAsset = null;

  // Ekstrak ID dari URL
  function extractId(url) {
    const match = url.match(/\/asset\/detail\/(\d+)$/);
    return match ? match[1] : null;
  }

  // Cek Asset
  cekBtn.addEventListener('click', async () => {
    const url = qrInput.value.trim();
    if (!url) {
      resultDiv.innerHTML = '<p class="error">Masukkan URL terlebih dahulu!</p>';
      return;
    }

    const assetId = extractId(url);
    if (!assetId) {
      resultDiv.innerHTML = '<p class="error">URL tidak valid atau ID tidak ditemukan.</p>';
      return;
    }

    try {
      const response = await fetch(`${baseUrl}/stock-opname/cekAsset?id=${assetId}`);
      const data = await response.json();

      if (data.status === 'success') {
        currentAsset = data.data;
        resultDiv.innerHTML = `
          <p><strong>Asset Ditemukan:</strong></p>
          <div class="asset-item">
            <strong>No Asset:</strong> ${data.data.no_asset} <br>
            <strong>Nama Asset:</strong> ${data.data.nama_asset}
          </div>
        `;
        saveBtn.style.display = 'block';
      } else {
        resultDiv.innerHTML = `<p class="error">${data.message}</p>`;
        saveBtn.style.display = 'none';
        currentAsset = null;
      }
    } catch (err) {
      resultDiv.innerHTML = `<p class="error">Error: ${err.message}</p>`;
      saveBtn.style.display = 'none';
    }
  });

  // Simpan Stock Opname
  saveBtn.addEventListener('click', async () => {
    if (!currentAsset) return;

    const payload = {
      asset_id: currentAsset.id,
      no_asset: currentAsset.no_asset,
      nama_asset: currentAsset.nama_asset
    };

    try {
      const response = await fetch(`${baseUrl}/stock-opname/saveOpname`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });

      const result = await response.json();
      if (result.status === 'success') {
        alert('Berhasil disimpan!');
        saveBtn.style.display = 'none';
        resultDiv.innerHTML += '<p class="success">✓ Data telah disimpan ke stock opname.</p>';
      } else {
        alert('Gagal menyimpan: ' + (result.message || 'Unknown error'));
      }
    } catch (err) {
      alert('Error: ' + err.message);
    }
  });
</script> -->
<!-- [ Main Content ] end -->
<?= $this->endSection('page-content'); ?>