<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="pc-container">
    <div class="pc-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Stockopname Aset: Scan & Verifikasi</h5>
                    </div>
                    <div class="card-body">
                        
                        <div id="alertArea"></div>

                        <div class="text-center mb-3">
                            <div id="reader" style="width: 100%; min-height: 300px; background: #f0f0f0;"></div>
                            <p class="text-muted mt-2"><small>Arahkan kamera ke QR Code</small></p>
                        </div>

                        <hr>

                        <form id="formManualCheck">
                            <label for="qrInput" class="form-label fw-bold">Input Manual (Jika kamera gagal)</label>
                            <div class="input-group mb-3">
                                <input 
                                    type="text" 
                                    id="qrInput" 
                                    class="form-control form-control-lg" 
                                    placeholder="Contoh: 61000000 atau /asset/detail/123" 
                                    autocomplete="off"
                                >
                                <button class="btn btn-primary" type="submit" id="btnCheck">
                                    <i class="fas fa-check"></i> Cek
                                </button>
                            </div>
                        </form>

                        <div class="d-grid">
                            <a href="<?= base_url('/pic/audit') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts-extra') ?>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script>
    // === KONFIGURASI GLOBAL ===
    const baseUrl = '<?= base_url() ?>';
    const csrfName = '<?= csrf_token() ?>';
    const csrfHash = '<?= csrf_hash() ?>';
    
    // Element Referensi
    const alertArea = document.getElementById('alertArea');
    const qrInput = document.getElementById('qrInput');
    const formManual = document.getElementById('formManualCheck');
    const btnCheck = document.getElementById('btnCheck');

    // --- FUNGSI BANTUAN: TAMPILKAN ALERT ---
    function showAlert(type, title, message) {
        const icon = type === 'success' ? '✅' : (type === 'danger' ? '❌' : 'ℹ️');
        alertArea.innerHTML = `
            <div class="alert alert-${type} alert-dismissible fade show shadow-sm" role="alert">
                <h4 class="alert-heading">${icon} ${title}</h4>
                <p class="mb-0">${message}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;
        // Scroll ke atas agar notifikasi terlihat
        alertArea.scrollIntoView({ behavior: 'smooth' });
    }

    // --- BAGIAN 1: LOGIKA INPUT MANUAL ---
    formManual.addEventListener('submit', async (e) => {
        e.preventDefault();
        const inputVal = qrInput.value.trim();
        if (!inputVal) {
            showAlert('warning', 'Input Kosong', 'Silakan masukkan No Aset atau URL.');
            return;
        }

        // UI Loading
        const originalBtnText = btnCheck.innerHTML;
        btnCheck.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
        btnCheck.disabled = true;

        try {
            const response = await fetch(`${baseUrl}/api/audit/manual-verify`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest',
                    [csrfName]: csrfHash // Menggunakan token CSRF
                },
                body: new URLSearchParams({ 'input_data': inputVal })
            });

            const res = await response.json();

            if (res.status === 'success') {
                showAlert('success', 'Berhasil!', `Aset <b>${res.data.nama_asset}</b> (${res.data.no_asset}) telah diverifikasi.`);
                qrInput.value = ''; // Reset input
            } else if (res.status === 'info') {
                showAlert('info', 'Info', res.message);
            } else {
                // Handle Error 404, 403, dll
                showAlert('danger', 'Gagal', res.messages?.error || res.message || 'Aset tidak ditemukan.');
            }

        } catch (err) {
            console.error(err);
            showAlert('danger', 'Error Sistem', 'Terjadi kesalahan koneksi server.');
        } finally {
            // Reset UI Button
            btnCheck.innerHTML = originalBtnText;
            btnCheck.disabled = false;
            qrInput.focus();
        }
    });

    // --- BAGIAN 2: LOGIKA KAMERA SCANNER ---
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Scan result: ${decodedText}`);
        
        // Pause scanner biar gak scan berkali-kali
        html5QrcodeScanner.pause(); 

        // UI Loading di Alert Area
        showAlert('info', 'Memproses...', 'Sedang memverifikasi QR Code...');

        fetch(`${baseUrl}/api/audit/check`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-Requested-With': 'XMLHttpRequest',
                [csrfName]: csrfHash
            },
            body: new URLSearchParams({ 'qr_data': decodedText })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                showAlert('success', 'QR Terverifikasi', `<b>${data.data.nama_asset}</b> (${data.data.no_asset})`);
            } else {
                showAlert('danger', 'Gagal', data.messages?.error || data.message || 'QR Tidak Valid');
            }
        })
        .catch(error => {
            console.error(error);
            showAlert('danger', 'Error', 'Gagal menghubungi server.');
        })
        .finally(() => {
            // Resume scanner setelah 2 detik
            setTimeout(() => {
                html5QrcodeScanner.resume();
            }, 2000);
        });
    }

    function onScanError(errorMessage) {
        // Biarkan kosong agar console tidak penuh spam error saat mencari QR
    }

    // Inisialisasi Scanner
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", 
        { fps: 10, qrbox: { width: 250, height: 250 } }, 
        false
    );
    html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>
<?= $this->endSection() ?>