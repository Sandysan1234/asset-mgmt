<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<div class="pc-container">
  <div class="pc-content">
    <!-- ... (breadcrumb tetap sama) ... -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Hitung Depresiasi (Metode Garis Lurus)</h5>
          </div>
          <div class="card-body">
            <!-- Dropdown Aset -->
            <div class="mb-3">
              <label for="assetSelect" class="form-label">Pilih Aset</label>
              <select id="assetSelect" placeholder="Pilih aset...">
                <option value="">-- Pilih aset --</option>
                <?php foreach ($assets as $a): ?>
                  <option value="<?= $a['id_asset'] ?>">
                    <?= esc($a['nama_asset'] . ' || (' . $a['no_asset'] . ')') ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Detail Aset (ditampilkan setelah pilih) -->
            <div id="assetDetail" style="display:none;">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Harga Perolehan</label>
                    <input type="number" id="harga" class="form-control" readonly>
                  </div>
                  <div class="mb-3">
                    <label>Tanggal Perolehan</label>
                    <input type="date" id="tgl_perolehan" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label>Masa Manfaat (Tahun) <span class="text-danger">*</span></label>
                    <input type="number" id="masa_manfaat" class="form-control" min="1" placeholder="Contoh: 5">
                  </div>
                  <div class="mb-3">
                    <label>Nilai Residu (Rp) <span class="text-danger">*</span></label>
                    <input type="number" id="nilai_residu" class="form-control" min="0" placeholder="Contoh: 1000000">
                  </div>
                </div>
              </div>

              <!-- Hasil Perhitungan -->
              <div class="mt-4 p-3 bg-light rounded">
                <h5>Hasil Perhitungan</h5>
                <p>Depresiasi Tahunan: 
                  <strong id="hasilDepresiasi" class="text-primary">-</strong>
                </p>
                <small class="text-muted">
                  Rumus: (Harga Perolehan - Nilai Residu) ÷ Masa Manfaat
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Choices.js -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi Choices.js
    new Choices('#assetSelect', {
        searchEnabled: true,
        placeholder: true,
        placeholderValue: 'Ketik nama aset...',
        removeItemButton: false,
        shouldSort: false
    });

    // Fungsi hitung depresiasi
    function hitungDepresiasi() {
        const harga = parseFloat(document.getElementById('harga').value) || 0;
        const residu = parseFloat(document.getElementById('nilai_residu').value) || 0;
        const masa = parseInt(document.getElementById('masa_manfaat').value) || 0;
        const hasilEl = document.getElementById('hasilDepresiasi');

        // Validasi dasar
        if (masa <= 0) {
            hasilEl.textContent = 'Masukkan masa manfaat > 0';
            hasilEl.className = 'text-danger';
            return;
        }

        if (residu >= harga) {
            hasilEl.textContent = 'Nilai residu harus < harga perolehan';
            hasilEl.className = 'text-danger';
            return;
        }

        // Hitung depresiasi
        const depresiasi = (harga - residu) / masa;
        hasilEl.textContent = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(depresiasi);
        hasilEl.className = 'text-success';
    }

    // Saat pilih aset
    document.getElementById('assetSelect').addEventListener('change', function(e) {
        const assetId = e.target.value;
        const detailBox = document.getElementById('assetDetail');

        if (!assetId) {
            detailBox.style.display = 'none';
            return;
        }

        // Reset input user
        document.getElementById('masa_manfaat').value = '';
        document.getElementById('nilai_residu').value = '';
        document.getElementById('hasilDepresiasi').textContent = '-';

        // Ambil data dari server
        fetch('<?= base_url('asset/getDetail/') ?>' + assetId)
            .then(response => {
                if (!response.ok) throw new Error('Server error ' + response.status);
                return response.json();
            })
            .then(data => {
                if (data.success && data.data) {
                    const a = data.data;
                    document.getElementById('harga').value = a.harga;
                    // document.getElementById('harga').value = parseInt(a.harga).toLocaleString('id-ID') || 0;
                    // document.getElementById('harga').value = a.harga || 0;
                    document.getElementById('tgl_perolehan').value = a.tgl_perolehan || '';
                    detailBox.style.display = 'block';
                } else {
                    alert('Data aset tidak ditemukan!');
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Gagal mengambil data: ' + err.message);
            });
    });

    // Event saat user ketik di input
    document.getElementById('masa_manfaat').addEventListener('input', hitungDepresiasi);
    document.getElementById('nilai_residu').addEventListener('input', hitungDepresiasi);
});
</script>

<?= $this->endSection(); ?>