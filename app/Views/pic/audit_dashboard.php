<?= $this->extend('templates/index') ?>
<?= $this->section('page-content') ?>
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
                        <li class="breadcrumb-item" aria-current="page">PIC Stockopname</li>
                    </ul>
                    </div>
                    <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="m-b-10">PIC Stockopname</h5>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Aset Anda</h5>
                        <p class="card-text fs-1"><?= $total ?? 0 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sudah Stockopname</h5>
                        <p class="card-text fs-1"><?= $sudah ?? 0 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Belum Stockopname</h5>
                        <p class="card-text fs-1"><?= $belum ?? 0 ?></p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-grid gap-2">
                <a href="<?= base_url('/pic/audit/scan') ?>" class="btn btn-success btn-lg mb-2">
                    MULAI PINDAI SEKARANG
                </a>

            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mt-3" id="alert-container"></div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No. Aset / Nama</th>
                                        <th>Lokasi</th>
                                        <th>Status Stockopname</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(empty($list_aset)): ?>
                                        <tr>
                                            <td colspan="4" class="text-center">Tidak ada aset dalam daftar tugas Anda.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach($list_aset as $item): ?>
                                            <tr>
                                                <td>
                                                    <strong><?= esc($item['nama_asset']) ?></strong><br>
                                                    <small class="text-muted"><?= esc($item['no_asset']) ?></small>
                                                </td>
                                                <td><?= esc($item['nama_lokasi'] ?? '-') ?></td> <td>
                                                    <?php if($item['status_audit'] == 'BELUM_AUDIT'): ?>
                                                        <span class="badge bg-secondary fs-6">Belum Cek</span>
                                                    <?php elseif($item['status_audit'] == 'TERVERIFIKASI'): ?>
                                                        <span class="badge bg-success fs-6"> Terverifikasi</span>
                                                    <?php elseif($item['status_audit'] == 'HILANG'): ?>
                                                        <span class="badge bg-danger fs-6"> Hilang</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning text-dark"><?= esc($item['status_audit']) ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                
                                                <td>
                                                    <?php if($item['status_audit'] == 'BELUM_AUDIT'): ?>
                                                        <button onclick="laporHilang('<?= $item['id'] ?>', '<?= $item['nama_asset'] ?>')" 
                                                                class="btn btn-sm btn-outline-danger">
                                                            Tidak Ditemukan
                                                        </button>
                                                    <?php else: ?>
                                                        <strong class="text-muted">Selesai</strong>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
const baseUrl = '<?= base_url() ?>';
const csrfName = '<?= csrf_token() ?>'; 
const csrfHash = '<?= csrf_hash() ?>';
function showAlert(type, title, message) {
    const container = document.getElementById('alert-container');
    if (!container) {
        console.warn('Alert container not found. Using console only.');
        console.log(`[${type.toUpperCase()}] ${title}: ${message}`);
        return;
    }
    
    // Hapus alert sebelumnya
    container.innerHTML = ''; 

    const alertHtml = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <strong>${title}!</strong> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    container.innerHTML = alertHtml;

    // Opsional: Hilangkan alert setelah beberapa detik
    if (type !== 'danger') {
        setTimeout(() => {
            const alertElement = container.querySelector('.alert');
            if (alertElement) {
                alertElement.classList.add('hide'); // Asumsi ada CSS untuk 'hide'
                alertElement.remove(); // Hapus dari DOM
            }
        }, 5000); // 5 detik
    }
}
function laporHilang(idEventAsset, namaAset) {
    
    // Konfirmasi User
    if(!confirm(`⚠️ PERINGATAN:\n\nApakah Anda yakin aset "${namaAset}" HILANG?\n\nStatus akan berubah merah dan dicatat di laporan.`)) {
        return;
    }

    // Tampilkan loading sederhana (opsional)
    // showAlert('info', 'Memproses', 'Sedang mengupdate status...');

    fetch(`${baseUrl}/api/audit/report-missing`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
            [csrfName]: csrfHash // Menggunakan token CSRF global
        },
        body: new URLSearchParams({ 'id_event_asset': idEventAsset })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            showAlert('success', 'Berhasil', `Aset <b>${namaAset}</b> ditandai HILANG.`);
            // Reload halaman otomatis agar tabel berubah warna
            setTimeout(() => location.reload(), 1000);
        } else {
            showAlert('danger', 'Gagal', data.messages?.error || data.message || 'Gagal update status.');
        }
    })
    .catch(error => {
        console.error(error);
        showAlert('danger', 'Error', 'Terjadi kesalahan koneksi.');
    });
}
</script>

<?= $this->endSection() ?>