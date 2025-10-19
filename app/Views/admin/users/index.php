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
              <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
              <li class="breadcrumb-item" aria-current="page">Manajemen User</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Manajemen User</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">

          <div class="card-header">
            <h5>Manajemen User</h5>
          </div>
          <div class="card-body tbl-card">
            <?php if (session()->getFlashdata('message')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>
            <div class="table-responsive">
              <table class="table table-hover table-borderless mb-0">
                <thead>
                  <tr class="bg-light-primary">
                    <th>Username</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Status Login</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?= esc($user->username) ?></td>
                      <td><?= esc($user->email) ?></td>
                      <td><?= esc($user->fullname ?? '-') ?></td>
                      <td>
                        <?php if ($user->active_login === 'aktif'): ?>
                          <span class="badge bg-success">Aktif</span>
                        <?php else: ?>
                          <span class="badge bg-secondary">Tidak Aktif</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?= base_url("admin/users/edit/{$user->id}") ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url("admin/users/delete/{$user->id}") ?>"
                          class="btn btn-sm btn-danger"
                          onclick="return confirm('Yakin hapus user ini?')">
                          Hapus
                        </a>
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
</div>

<?= $this->endSection() ?>