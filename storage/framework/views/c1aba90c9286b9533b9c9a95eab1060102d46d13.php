<?php $__env->startSection('content'); ?>

    <h1 class="h2 mb-1">Connexion</h1>
    <p class="fw-medium text-muted">
        Découvrez les abonnements premium !
    </p>

    <form class="js-validation-signin" method="POST" action="<?php echo e(route('login')); ?> ">
        <?php echo e(csrf_field()); ?>

        <div class="py-3">
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
                    </span>
                <?php endif; ?>
            </div>
            <div class="input-group">
                <input type="password" class="form-control form-control-alt form-control-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="login-password" name="password" placeholder="<?php echo e(__('Mot de passe')); ?>"><button type="button" onclick="location.href='/password/reset';" class="btn btn-dark">Oublié</button></input>
            <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                    </span>
                <?php endif; ?>
            </div>
            <br>
            <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="login-remember" name="login-remember">
                    <label class="form-check-label" for="login-remember">Se souvenir de moi</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <button type="submit" class="btn w-120 btn-alt-primary">
                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Connexion
                </button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/auth/login.blade.php ENDPATH**/ ?>