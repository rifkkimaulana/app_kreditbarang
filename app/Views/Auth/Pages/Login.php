<?= $this->extend('Auth/Layout/Template'); ?>
<?= $this->section('content'); ?>
<span class="mask bg-gradient-dark opacity-6"></span>
<div class="container my-auto">
    <div class="row">
        <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                        <div class="row mt-3">
                            <div class="col-12 text-center me-auto">
                                <a class="btn btn-link px-3" href="javascript:;">
                                    <i class="fa fa-google text-white text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" class="text-start" method="POST" action="/auth">
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email / Username</label>
                            <input type="text" class="form-control" name="usernameoremail">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-check form-switch d-flex align-items-center mb-3">
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                        </div>
                        <p class="mt-4 text-sm text-center">
                            Lupa Password?
                            <a href="/forgot_password" class="text-primary text-gradient font-weight-bold">klik disini</a>
                        </p>
                        <p class="text-sm text-center">
                            Don't have an account?
                            <a href="/daftar" class="text-primary text-gradient font-weight-bold">Sign up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>