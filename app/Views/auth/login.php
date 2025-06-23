<?= $this->extend('auth/templates/index');?>

<?= $this->section('content');?>
  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="auth-header">
          <!-- <a href="#"><img src="<?= base_url();?>/assets/images/logo-dark.svg" alt="img"></a> -->
        </div>
        <div class="card my-5">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end mb-4">
              <h3 class="mb-0"><b>Login</b></h3>
              <a href="#" class="link-primary">Don't have an account?</a>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="d-flex mt-1 justify-content-between">
              <!-- <div class="form-check">
                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                <label class="form-check-label text-muted" for="customCheckc1">Keep me sign in</label>
              </div> -->
            </div>
            <div class="d-grid mt-4">
              <button type="button" class="btn btn-primary">Login</button>
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
