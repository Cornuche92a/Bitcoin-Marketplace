<?php $__env->startSection('loginform'); ?>
    <div id="page-container" class="dark-mode">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="hero-static d-flex align-items-center">
                <div class="content">

                    <div class="row justify-content-center push">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Sign In Block -->
                            <div class="block block-rounded mb-0">
                                <div class="block-header block-header-default">
                                    <img src="assets/media/logo.png" style="height: 50px">
                                    <div class="block-options">
                                        <?php if(Route::has('password.request')): ?>
                                        <a class="btn-block-option fs-sm" href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                                        <?php endif; ?>
                                        <a class="btn-block-option" href="op_auth_signup.html" data-bs-toggle="tooltip" data-bs-placement="left" title="New Account">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="block-content">

                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                        </span>
                                    </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <h1 class="h2 mb-1">Connexion</h1>
                                        <p class="fw-medium text-muted">
                                            Connectez-vous et découvrez les abonnements premium !
                                        </p>

                                        <!-- Sign In Form -->
                                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signin" method="POST" action="<?php echo e(route('login')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <div class="py-3">
                                                <div class="mb-4">

                                                    <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="login-username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__("Nom d'utilisateur")); ?>">
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="login-password" placeholder="<?php echo e(__('Mot de passe')); ?>">
                                                </div>
                                                <div class="mb-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                                                        <label class="form-check-label" for="login-remember">Se souvenir de moi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn w-120 btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Connexion
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

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/index.blade.php ENDPATH**/ ?>