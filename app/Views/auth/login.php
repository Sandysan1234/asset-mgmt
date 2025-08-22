<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="auth-header">
  <!-- <a href="#"><img src="<?= base_url(); ?>/assets/images/logo-dark.svg" alt="img"></a> -->
</div>
<div class="card my-5">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-end mb-4">
      <h3 class="mb-0"><b><?= lang('Auth.loginTitle') ?></b></h3>
      <?php if ($config->allowRegistration) : ?>
        <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
      <?php endif; ?>
    </div>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <form action="<?= url_to('login') ?>" method="post">
      <?= csrf_field() ?>

      <?php if ($config->validFields === ['email']): ?>
        <div class="form-group mb-3">
          <label class="form-label" for="login"><?= lang('Auth.email') ?></label>
          <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
          <div class="invalid-feedback">
            <?= session('errors.login') ?>
          </div>
        </div>
      <?php else: ?>
        <div class="form-group mb-3">
          <label class="form-label" for="login"><?= lang('Auth.emailOrUsername') ?></label>
          <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
          <div class="invalid-feedback">
            <?= session('errors.login') ?>
          </div>
        </div>
      <?php endif; ?>
      <div class="form-group mb-3">
        <label for="password"><?= lang('Auth.password') ?></label>
        <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
        <div class="invalid-feedback">
          <?= session('errors.password') ?>
        </div>
      </div>
      <?php if ($config->allowRemembering): ?>
        <div class="d-flex mt-1 justify-content-between">
          <div class="form-check">
            <label class="form-check-label text-muted">
              <input type="checkbox" name="remember" class="form-check-input input-primary" <?php if (old('remember')) : ?> checked <?php endif ?>>
              <?= lang('Auth.rememberMe') ?>
            </label>
          </div>
        </div>
      <?php endif; ?>
      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary"><?= lang('Auth.loginAction') ?></button>
      </div>
    </form>
    <div class="d-flex mt-2 justify-content-between">
      <?php if ($config->activeResetter): ?>
        <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
      <?php endif; ?>
    </div>
    <hr>
    <div class="d-grid mt-4">
      <button type="submit" class="btn btn-success"><a href="https://www.jmiis.com/" class="text-white">Kembali ke JMIIS Home</a></button>
    </div>

  </div>
</div>
<?= $this->endSection(); ?>