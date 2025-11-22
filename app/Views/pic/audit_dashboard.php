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
                        <h5 class="card-title">Sudah Diaudit</h5>
                        <p class="card-text fs-1"><?= $sudah ?? 0 ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Belum Diaudit</h5>
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
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No. Aset / Nama</th>
                                        <th>Lokasi</th>
                                        <th>Status</th>
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
function laporHilang(idEventAsset, namaAset) {
    if(confirm('Apakah Anda yakin menandai aset "' + namaAset + '" sebagai HILANG?')) {
        // Kirim request ke server (Buat route baru nanti untuk ini)
        // window.location.href = '/pic/audit/report-missing/' + idEventAsset;
        alert('Fitur tandai hilang akan diproses untuk ID: ' + idEventAsset);
    }
}
</script>

<?= $this->endSection() ?>