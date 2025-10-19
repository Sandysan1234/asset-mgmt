<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="auth-header">
    <a href="#"><img width="30%" src="<?= base_url(); ?>/assets/images/logo-jmi.svg" alt="img"></a>
</div>
<div class="card my-5">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="mb-0"><b><?= lang('Auth.resetYourPassword') ?></b></h3>
            <a href="<?= url_to('login') ?>" class="link-primary">Back to Login</a>
        </div>
        <?= view('Myth\Auth\Views\_message_block') ?>
        <p><?= lang('Auth.enterEmailForInstructions') ?></p>

        <form action="<?= url_to('reset-password') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="token"><?= lang('Auth.token') ?></label>
                <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>"
                    name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.token') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="email"><?= lang('Auth.email') ?></label>
                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                    name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>


            <div class="form-group">
                <label for="password"><?= lang('Auth.newPassword') ?></label>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                    name="password">
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                    name="pass_confirm">
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>
            </div>
            <div class="d-grid mt-3">
                <button type="submit" class="btn btn-primary"><?= lang('Auth.resetPassword') ?></button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection('content'); ?>