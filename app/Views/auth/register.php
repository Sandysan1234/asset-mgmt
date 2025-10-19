<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>

<div class="auth-header">
	<a href="#"><img width="30%" src="../assets/images/logo-jmi.svg" alt="img"></a>
</div>
<div class="card my-5">
	<div class="card-body">
		<div class="d-flex justify-content-between align-items-end mb-4">
			<h3 class="mb-0"><b><?= lang('Auth.register') ?></b></h3>
			<a class="link-primary" href="<?= url_to('login') ?>"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
		</div>
		<?= view('Myth\Auth\Views\_message_block') ?>

		<form action="<?= url_to('register') ?>" method="post">
			<?= csrf_field() ?>
			<div class="form-group mb-3">
				<label class="form-label" for="username"><?= lang('Auth.username') ?></label>
				<input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
			</div>
			<div class="form-group mb-3">
				<label class="form-label" for="email"><?= lang('Auth.email') ?></label>
				<input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
				<small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
			</div>
			<div class="form-group mb-3">
				<label class="form-label" for="password"><?= lang('Auth.password') ?></label>
				<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
			</div>
			<div class="form-group mb-3">
				<label class="form-label" for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
				<input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
			</div>
			<div class="d-grid mt-3">
				<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>

			</div>
		</form>
	</div>
</div>
<?= $this->endSection(); ?>