<?= $this->extend('templates/index') // Asumsi Anda punya layout utama ?>
<?= $this->section('page-content') ?>
<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                    <li class="breadcrumb-item" aria-current="page">Sesi Audit Baru</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                    <h2 class="m-b-10">Sesi Audit Baru</h5>
                    </div>
                </div>  
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Mulai Sesi Audit Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/admin/sesi-audit/create') ?>" method="post">
                            <?= csrf_field() // Keamanan CSRF ?>
                            <div class="mb-3">
                                <label for="nama_sesi" class="form-label">Nama Sesi Audit</label>
                                <input type="text" class="form-control" id="nama_sesi" name="nama_sesi" placeholder="Contoh: Audit Semester 2 2025" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Mulai Sesi Audit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("tanggal_mulai").min = new Date().toISOString().split("T")[0];
</script>
<?= $this->endSection() ?>