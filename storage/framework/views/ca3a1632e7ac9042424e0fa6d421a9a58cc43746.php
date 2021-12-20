<?php $__env->startSection('content'); ?>
    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
        <h1 class="h2 mb-1">Inscription</h1>
    <!-- Sign In Form -->
    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
    <form class="js-validation-signin" method="POST" action="<?php echo e(route('register')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="py-3">
            <div class="mb-4">

                <input type="text" class="form-control form-control-alt form-control-lg <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-username" name="username" value="<?php echo e(old('username')); ?>" placeholder="<?php echo e(__("Nom d'utilisateur")); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('username')); ?></strong>
                                                        </span>
                <?php endif; ?>
            </div>
            <div class="mb-4">

                <input type="text" class="form-control form-control-alt form-control-lg <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-username" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__("E-mail")); ?>">
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-alt form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-password" name="password" placeholder="<?php echo e(__('Mot de passe')); ?>">
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                    </span>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-alt form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-password" name="password_confirmation" placeholder="<?php echo e(__('Confirmez le mot de passe')); ?>">
            </div>
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms" aria-describedby="signup-terms-error" required>
                    <label class="form-check-label" for="signup-terms">J'accorde les Conditions de vente et d'utilisation</label>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <button type="submit" class="btn w-120 btn-alt-success">
                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> S'inscrire
                </button>
            </div>
        </div>
    </form>
    <!-- END Sign In Form -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/auth/register.blade.php ENDPATH**/ ?>