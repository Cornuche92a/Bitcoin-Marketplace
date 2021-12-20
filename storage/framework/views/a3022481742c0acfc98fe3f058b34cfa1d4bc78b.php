<?php $pagename = 'Mon profil' ?>

<?php $__env->startSection('content'); ?>
        <!-- Hero -->
        <div class="bg-image" style="background-image: url('<?php echo e(asset('assets/media/photos/background_profile.jpeg')); ?>');">
            <div class="bg-primary-dark-op">
                <div class="content content-full text-center">
                    <div class="my-3">
                        <img class="img-avatar img-avatar-thumb" src="<?php echo e(asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar)); ?>" alt="">
                    </div>
                    <h1 class="h2 text-white mb-0">Modifier mon profil</h1>
                    <h2 class="h4 fw-normal text-white-75">
                        <?php echo e($getuserinfo->username); ?>

                    </h2>
                    <a class="btn btn-alt-secondary" href="<?php echo e(route('dashboard')); ?>">
                        <i class="fa fa-fw fa-arrow-left text-danger"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content content-boxed">
            <!-- User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">éditer mon profil</h3>
                </div>
                <div class="block-content">
                    <form action="<?php echo e(action('ProfileController@general')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Informations générales
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-email">Adresse e-mail</label>
                                    <input type="email" class="form-control" id="one-profile-edit-email" name="email" placeholder="Un nouveau mail ?" value="<?php echo e($getuserinfo->email); ?>">
                                </div>

                                <div class="col-lg-8 col-xl-5">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END User Profile -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">changer d'avatar</h3>
                </div>
                <div class="block-content">
                        <div class="row push">

                            <div class="mb-4">
                                <label class="form-label">Choisissez-vous ...</label>
                            </div>
                            <div class="row text-center">
                                <?php $__currentLoopData = \App\Models\avatar::get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $avatar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3">
                                    <form action="<?php echo e(action('ProfileController@general')); ?>" method="POST" name="avatar<?php echo e($avatar->id); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <input type="hidden" name="avatar" value="<?php echo e($avatar->id); ?>" >
                                        <a class="item item-link-pop item-circle bg-default text-white-75 mx-auto mb-3" data-toggle="theme" data-theme="default" onclick="window.document.avatar<?php echo e($avatar->id); ?>.submit()">
                                            <img class="img-avatar img-avatar-thumb" src="<?php echo e(asset('assets/media/avatars/'.$avatar->avatar)); ?>">
                                        </a>
                                        </form>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>
                        </div>
                </div>
            </div>

            <!-- Change Password -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Changement de mot de passe</h3>
                </div>
                <div class="block-content">
                    <form action="<?php echo e(action('ProfileController@password')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <div class="row push">
                            <div class="col-lg-4">
                                <p class="fs-sm text-muted">
                                    Un bon moyen de garder son compte en sécurité
                                </p>
                            </div>
                            <div class="col-lg-8 col-xl-5">
                                <div class="mb-4">
                                    <label class="form-label" for="one-profile-edit-password">Mot de passe actuel</label>
                                    <input type="password" class="form-control" id="one-profile-edit-password" name="current_password">
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new">Nouveau mot de passe</label>
                                        <input type="password" class="form-control" id="one-profile-edit-password-new" name="new_password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-12">
                                        <label class="form-label" for="one-profile-edit-password-new-confirm">Confirmation</label>
                                        <input type="password" class="form-control" id="one-profile-edit-password-new-confirm" name="new_confirm_password">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn btn-alt-primary">
                                        Mettre à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Change Password -->

        </div>
        <!-- END Page Content -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/profile.blade.php ENDPATH**/ ?>