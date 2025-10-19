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
    <div class="col-md-12">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
        <li class="breadcrumb-item" aria-current="page">Manajemen Role</li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="page-header-title">
        <h2 class="m-b-10">Manajemen Role</h5>
      </div>
    </div>
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">

          <div class="card-body tbl-card">
            <div class="col-md-12 mt-4">

              <?php if (session()->getFlashdata('message')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
              <?php endif; ?>
              <?= validation_list_errors(); ?>

              <!-- Form Tambah Role -->
              <div class="card mb-4">
                <div class="card-body">
                  <form action="<?= base_url('admin/roles/create') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="input-group">
                      <input type="text" name="roles" class="form-control" required>
                      <button class="btn btn-primary" type="submit">Buat Role</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Daftar Role -->
              <div class="row">
                <?php foreach ($groups as $group): ?>

                  <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-capitalize"><?= esc($group->name) ?></h5>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                          <a href="<?= base_url("admin/roles/manage/{$group->id}") ?>" class="btn btn-sm btn-outline-primary">Kelola</a>
                          <a href="<?= base_url("admin/roles/edit/{$group->id}") ?>" class="btn btn-sm btn-outline-warning">Edit</a> <!-- 👈 TAMBAHKAN INI -->
                          <a href="<?= base_url("admin/roles/delete/{$group->id}") ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin hapus role ini?')">
                            Hapus
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>
<?= $this->endSection('page-content'); ?>