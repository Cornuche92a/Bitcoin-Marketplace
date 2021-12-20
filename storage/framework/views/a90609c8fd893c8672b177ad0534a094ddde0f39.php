<?php $__env->startSection('content'); ?>

    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
        <h1 class="h2 mb-1">Réinitialisation</h1>
        <p class="fw-medium text-muted">
            Renseignez un mot de passe.
        </p>

        <!-- Reminder Form -->
        <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
        <form class="js-validation-reminder mt-4" action="<?php echo e(route('password.update')); ?>" method="POST" >
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="token" value="<?php echo e($token); ?>">
            <div class="mb-4">
                <input type="hidden" class="form-control form-control-lg form-control-alt <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="reminder-credential" name="email" value="<?php echo e($email ?? old('email')); ?>" placeholder="E-mail">
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                                        </span>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-lg form-control-alt <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="reminder-credential" name="password" placeholder="Mot de passe" autocomplete="new-password">
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                                            <strong><?php echo e($errors->first('password')); ?></strong>
                                                        </span>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <input type="password" class="form-control form-control-lg form-control-alt <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="reminder-credential" name="password_confirmation" placeholder="Confirmez le mot de passe" autocomplete="new-password">
            </div>
            <div class="row mb-4">
                <div class="col-md-6 ">
                    <button type="submit" class="btn w-100 btn-alt-primary">
                        <i class="fa fa-fw fa-lock me-1 opacity-50"></i> Confirmer
                    </button>
                </div>
            </div>
        </form>
        <!-- END Reminder Form -->
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>