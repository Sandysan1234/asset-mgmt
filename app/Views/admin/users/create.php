<?= $this->extend('templates/index') ?>
<?= $this->section('page-content') ?>

<div class="pc-container">
  <div class="pc-content">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Manajemen User</h3>
            <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">+ Tambah User</a>
          </div>
          <div class="card-body">
            <?php if (session()->getFlashdata('message')): ?>
              <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>

            <table class="table table-bordered">
              <thead>
                <tr>
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

<?= $this->endSection() ?>