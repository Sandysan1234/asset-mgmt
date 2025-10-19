<?= $this->extend('templates/index') ?>
<?= $this->section('page-content') ?>

<div class="pc-container">
    <div class="pc-content">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                <li class="breadcrumb-item" aria-current="page">Edit User</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="page-header-title">
                <h3 class="m-b-10 text-capitalize">Edit User : <?= esc($users->username) ?></h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('admin/users') ?>" class="btn btn-secondary mb-3">← Kembali</a>

                        <?= validation_list_errors() ?>

                        <form action="<?= base_url("admin/users/update/{$users->id}") ?>" method="post">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required value="<?= old('username', $users->username) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required value="<?= old('email', $users->email) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fullname</label>
                                <input type="text" name="fullname" class="form-control" value="<?= old('fullname', $users->fullname) ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status Login</label>
                                <select name="active_login" class="form-select">
                                    <option value="tidak" <?= $users->active_login === 'tidak' ? 'selected' : '' ?>>Tidak Aktif</option>
                                    <option value="aktif" <?= $users->active_login === 'aktif' ? 'selected' : '' ?>>Aktif</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>