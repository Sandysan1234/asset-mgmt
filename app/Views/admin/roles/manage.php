<?= $this->extend('templates/index') ?>

<?= $this->section('page-content') ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- [ breadcrumb ] end -->
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                <li class="breadcrumb-item" aria-current="page">Kelola Role</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="page-header-title">
                <h2 class="m-b-10">Kelola Role <bold class="text-capitalize"><?= esc($group->name) ?></bold></h5>
            </div>
        </div>
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body tbl-card">

                        <div class="col-md-12">
                            <a href="<?= base_url('admin/roles') ?>" class="btn btn-sm btn-secondary mb-3">← Kembali ke Daftar Role</a>

                            <?php if (session()->getFlashdata('message')): ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
                            <?php endif; ?>

                            <div class="row">
                                <!-- Bagian Permission -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">Permission untuk Role Ini</div>
                                        <div class="card-body">
                                            <?php if (empty($assignedPermIds)): ?>
                                                <p class="text-muted">Belum ada permission.</p>
                                            <?php else: ?>
                                                <ul class="list-group mb-3">
                                                    <?php foreach ($allPermissions as $perm): ?>
                                                        <?php if (in_array($perm->id, $assignedPermIds)): ?>
                                                            <li class="list-group-item d-flex justify-content-between">
                                                                <?= esc($perm->name) ?>
                                                                <a href="<?= base_url("admin/roles/remove-permission/{$group->id}/{$perm->id}") ?>"
                                                                    class="text-danger fs-4" title="Hapus"
                                                                    onclick="return confirm('Hapus permission ini?')">×</a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                            <form action="<?= base_url('admin/roles/add-permission') ?>" method="post">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="group_id" value="<?= $group->id ?>">
                                                <div class="input-group">
                                                    <select name="permission_id" class="form-select" required>
                                                        <option value="">-- Tambah permission --</option>
                                                        <?php foreach ($allPermissions as $perm): ?>
                                                            <?php if (!in_array($perm->id, $assignedPermIds)): ?>
                                                                <option value="<?= $perm->id ?>"><?= esc($perm->name) ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <button class="btn btn-outline-success" type="submit">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Bagian User -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">User dalam Role Ini</div>
                                        <div class="card-body">
                                            <?php if (empty($userIdsInGroup)): ?>
                                                <p class="text-muted">Belum ada user.</p>
                                            <?php else: ?>
                                                <ul class="list-group mb-3">
                                                    <?php foreach ($allUsers as $user): ?>
                                                        <?php if (in_array($user->id, $userIdsInGroup)): ?>
                                                            <li class="list-group-item d-flex justify-content-between">
                                                                <?= esc($user->username) ?> (<?= esc($user->email) ?>)
                                                                <a href="<?= base_url("admin/roles/remove-user/{$group->id}/{$user->id}") ?>"
                                                                    class="text-danger fs-4" title="Hapus"
                                                                    onclick="return confirm('Hapus user ini dari role?')">×</a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>

                                            <form action="<?= base_url('admin/roles/add-user') ?>" method="post">
                                                <?= csrf_field() ?> <!-- 👈 WAJIB! -->
                                                <input type="hidden" name="group_id" value="<?= $group->id ?>">
                                                <div class="input-group">
                                                    <select name="user_id" class="form-select" required>
                                                        <option value="">-- Tambah user --</option>
                                                        <?php foreach ($allUsers as $user): ?>
                                                            <?php if (!in_array($user->id, $userIdsInGroup)): ?>
                                                                <option value="<?= $user->id ?>"><?= esc($user->username) ?> (<?= esc($user->email) ?>)</option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <button class="btn btn-outline-primary" type="submit">Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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