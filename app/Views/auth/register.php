<?= $this->extend('auth/templates/index');?>

<?= $this->section('content');?>
<div class="auth-main">
	<div class="auth-wrapper v3">
		<div class="auth-form">
			<div class="card my-5">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-end mb-4">
						<h3 class="mb-0"><b>Sign up</b></h3>
						<a href="#" class="link-primary">Already have an account?</a>
					</div>
					<div class="form-group mb-3">
						<label class="form-label">Name</label>
						<input type="text" class="form-control" placeholder="Name" required>
					</div>
					<div class="form-group mb-3">
						<label class="form-label">Email Address*</label>
						<input type="email" class="form-control" placeholder="Email Address" required>
					</div>
					<div class="form-group mb-3">
						<label class="form-label">Divisi</label>
						<select class="form-select mb-3" aria-label="Default select example">
							<option selected>Open this select menu</option>
							<option value="1">One</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
					</select>
					</div>
					<div class="form-group mb-3">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" placeholder="Password">
					</div>
					<div class="d-grid mt-3">
						<button type="button" class="btn btn-primary">Create Account</button>
					</div>
				</div>
			</div>
			<div class="auth-footer row">
				<!-- <div class=""> -->
					<div class="col my-1">
						<p class="m-0">Copyright © <a href="#"> PT Jayamas Medica Industri Tbk.</a></p>
					</div>
					<div class="col-auto my-1">
						<ul class="list-inline footer-link mb-0">
							<li class="list-inline-item"><a href="#">Department Information Technology</a></li> 
						</ul>
					</div>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>
<?= $this->endSection();?>