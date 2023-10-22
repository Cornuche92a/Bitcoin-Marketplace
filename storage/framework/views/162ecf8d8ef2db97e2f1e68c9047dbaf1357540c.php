<?php $pagename = 'Mes achats' ?>

<?php $__env->startSection('content'); ?>

    <div class="bg-image" style="background-image: url('<?php echo e(asset('/assets/media/photos/')); ?>/background_orders.jpeg')">


        <div class="bg-primary-dark-op">

            <div class="content content-full text-center py-6">
                <h1 class="h2 text-white mb-2">Mes abonnements</h1>

            </div>
            <?php if(session('sent')): ?>
                <div class="toast-container position-absolute top-0 end-0 p-3">
                    <!-- Toast Example 1 -->
                    <div id="messagesent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="si si-bubble text-primary me-2"></i>
                            <strong class="me-auto">Support</strong>
                            <small class="text-muted">à l'instant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?php echo e(session('sent')); ?>

                        </div>
                    </div>
                    <!-- END Toast Example 1 -->
                </div>
            <?php endif; ?>

            <?php if(session('unsent')): ?>
            <!-- Toast Example 1 -->
                <div class="toast-container position-absolute top-0 end-0 p-3">
                    <div id="messageunsent" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <i class="si si-bubble text-danger me-2"></i>
                            <strong class="me-auto">Erreur</strong>
                            <small class="text-muted">à l'instant</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            <?php echo e(session('unsent')); ?>                    </div>
                    </div>
                    <!-- END Toast Example 1 -->
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php if($orders->isEmpty()): ?>


        <!-- Explore Store -->
        <div class="bg-body-dark">
            <div class="content content-full">
                <div class="my-5 text-center">
                    <h5> Aucun abonnement actif :( mais ...</h5>
                    <h3 class="h4 mb-4">
                        Découvrez plus de <strong>10.000</strong> Abonnements en vente !
                    </h3>
                    <a class="btn btn-primary px-4 py-2" href="<?php echo e(route('products.type','abonnements')); ?>">
                        Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>

        <div class="content">
            <div class="row">

                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-3 text-center">
                        <!-- Developer Plan -->
                        <a class="block block-rounded text-center" >
                            <div class="block-header">
                                <h3 class="block-title"><?php echo e($order->log->category->name); ?></h3>
                            </div>
                            <div class="py-1">
                                <img class="img-fluid" src="<?php echo e(asset('assets/media/photos/')); ?>/<?php echo e($order->log->category->bannerurl); ?>" alt="" onclick="location.href = '/cart/<?php echo e($order->log->category->catname); ?>/<?php echo e($order->log->category->name); ?>'">
                            </div>
                            <div class="block-content">
                                <div class="fs-sm py-2">
                                    <p>
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?php echo e($order->state->style); ?>"><?php echo e($order->state->name); ?></span></p>
                                    </p>
                                    <p>
                                        <strong>Identifiant</strong>
                                    </p>
                                    <p class="fw-semibold fs-sm" style="font-family: monospace">
                                        <?php echo e($order->log->username_email_log); ?>

                                    </p>
                                    <p>
                                        <strong>Mot de passe</strong>
                                    </p>
                                    <p class="fw-semibold fs-sm" style="font-family: monospace">
                                        <?php echo e($order->log->password_pin_log); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="block-content block-content-full bg-body-light" >
                                <span class="btn rounded-0 btn-primary px-4" type="button" data-bs-toggle="modal" data-bs-target="#modal-block-small-<?php echo e($order->id); ?>"><i class="fa fa-fw fa-exclamation-triangle"></i> </span>
                            </div>
                                    <!--






                                     --><div class="modal" id="modal-block-small-<?php echo e($order->id); ?>" tabindex="-1" aria-labelledby="modal-block-small" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="block block-rounded block-transparent mb-0">
                                                    <div class="block-header block-header-default">
                                                        <h3 class="block-title">Signaler un problème</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>

                                                    </div>
                                                    <form action=" <?php echo e(action('Support@submit')); ?> " method="POST">
                                                        <?php echo e(csrf_field()); ?>

                                                        <div class="block-content fs-sm">
                                                            <a class="content-heading">Cencernant votre abonnement : <?php echo e($order->log->category->name); ?></a>
                                                        </div>
                                                        <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                                                        <div class="block-content fs-sm">
                                                            <textarea class="form-control" id="message" name="text" rows="4" placeholder="Décrivez votre problème"></textarea>
                                                        </div>

                                                        <div class="block block-rounded">
                                                        </div>

                                                        <div class="block-content block-content-full text-end bg-body">
                                                            <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Fermer</button>
                                                            <button type="submit" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Envoyer</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        </a>
                        <!-- END Developer Plan -->
                    </div>



                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- END Modern Design -->

        </div>

    <?php endif; ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/orders.blade.php ENDPATH**/ ?>