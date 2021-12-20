<?php $__env->startSection('loginform'); ?>
    <div id="page-container" class="dark-mode">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="hero-static d-flex align-items-center">
                <div class="content">
                    <center><img src="assets/media/logo.png"></center>

                    <div class="row justify-content-center push">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Sign In Block -->
                            <div class="block block-rounded mb-0">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Sign In</h3>
                                    <div class="block-options">
                                        <a class="btn-block-option fs-sm" href="op_auth_reminder.html">Forgot Password?</a>
                                        <a class="btn-block-option" href="op_auth_signup.html" data-bs-toggle="tooltip" data-bs-placement="left" title="New Account">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <h1 class="h2 mb-1">OneUI</h1>
                                        <p class="fw-medium text-muted">
                                            Welcome, please login.
                                        </p>

                                        <!-- Sign In Form -->
                                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signin" action="be_pages_auth_all.html" method="POST">
                                            <?php echo e(csrf_field()); ?>

                                            <div class="py-3">
                                                <div class="mb-4">
                                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="login-username" placeholder="Username">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="login-password" placeholder="Password">
                                                </div>
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                                                        <label class="form-check-label" for="login-remember">Remember Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn w-100 btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Sign In
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Sign In Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign In Block -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/Index.blade.php ENDPATH**/ ?>