<?= $this->extend('templates/index') ?>
<?= $this->section('page-content') ?>

<div class="pc-container">
    <div class="pc-content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 text-capitalize">Detail Sesi: <?= esc($sesi['nama_sesi']) ?></h1>
                <a href="<?= base_url('admin/sesi-audit') ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informasi Stockopname</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"><strong>Tanggal Mulai:</strong> <br> <?= $sesi['tanggal_mulai'] ?></div>
                        <div class="col-md-3"><strong>Tanggal Selesai:</strong> <br> <?= $sesi['tanggal_selesai'] ?? '-' ?></div>
                        <div class="col-md-3"><strong>Status:</strong> <br> 
                            <?php if($sesi['status'] == 'OPEN'): ?>
                                <span class="badge bg-success">OPEN</span>
                            <?php else: ?>
                                <span class="badge bg-secondary">CLOSED</span>
                            <?php endif; ?>
                        </div>
                        <?php if($sesi['status'] == 'OPEN'): ?>
                            <form action="<?= base_url('admin/sesi-audit/close/' . $sesi['id_sesi']) ?>" 
                                method="post"
                                class="mt-2" 
                                style="display:inline-block;"
                                onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin MENUTUP sesi ini?\n\nSetelah ditutup:\n1. PIC tidak bisa scan lagi.\n2. Data dianggap final.');">
                                
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-stop-circle"></i> Tutup Stockopname
                                </button>
                            </form>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-sm mt-2" disabled>
                                <i class="fas fa-lock"></i> Sesi Ditutup
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Progress Aset</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-hover table-borderless" id="myTable-client" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aset (No/Nama)</th>
                                    <th>PIC</th>
                                    <th>Lokasi</th>
                                    <th>Status Stockopname</th>
                                    <th>Waktu Cek</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($detail_list as $item): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <strong class="text-capitalize"><?= esc($item['nama_asset']) ?></strong><br>
                                        <small><?= esc($item['no_asset']) ?></small>
                                    </td>
                                    <td><?= esc($item['nama_pic']) ?></td>
                                    <td><?= esc($item['id_lokasi_area']) ?></td>
                                    <td class="">
                                        <?php if($item['status_audit'] == 'BELUM_AUDIT'): ?>
                                            <span class="badge rounded-pill bg-info fs-6">Belum Dicek</span>
                                        <?php elseif($item['status_audit'] == 'TERVERIFIKASI'): ?>
                                            <span class="badge rounded-pill bg-success fs-6">Terverifikasi</span>
                                        <?php elseif($item['status_audit'] == 'HILANG'): ?>
                                            <span class="badge rounded-pill bg-danger fs-6">Hilang</span>
                                        <?php else: ?>
                                            <span class="badge badge-warning"><?= $item['status_audit'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $item['last_audit_at'] ? date('d-m-Y H:i', strtotime($item['last_audit_at'])) : '-' ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>

<?= $this->endSection() ?>