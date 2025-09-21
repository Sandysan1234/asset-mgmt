<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<!-- <div class="auth-header">
  <a href="#"><img src="../assets/images/logo-dark.svg" alt="img"></a>
</div> -->
<div class="card my-5">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-end mb-4">
      <h3 class="mb-0"><b><?= lang('Auth.forgotPassword') ?></b></h3>
      <a href="<?= url_to('login') ?>" class="link-primary">Back to Login</a>
    </div>
    <?= view('Myth\Auth\Views\_message_block') ?>
    <p><?= lang('Auth.enterEmailForInstructions') ?></p>

    <form action="<?= url_to('forgot') ?>" method="post">
      <?= csrf_field() ?>
      <div class="form-group mb-3">
        <label for="email"><?= lang('Auth.emailAddress') ?></label>
        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
          name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
        <div class="invalid-feedback">
          <?= session('errors.email') ?>
        </div>
      </div>
      <p class="mt-4 text-sm text-muted">Do not forgot to check SPAM box.</p>
      <div class="d-grid mt-3">
        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection('content'); ?>

<!--  -->