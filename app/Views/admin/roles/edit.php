<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Role: <?= esc($role->name) ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <?php if (session()->getFlashdata('errors')): ?>
                                <div class="alert alert-danger">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <div><?= esc($error) ?></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url("admin/roles/update/{$role->id}") ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="id" value="<?= esc($role->id) ?>">

                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Role</label>
                                    <input type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        value="<?= old('name', $role->name) ?>"
                                        required>
                                </div>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="<?= base_url('admin/roles') ?>" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>