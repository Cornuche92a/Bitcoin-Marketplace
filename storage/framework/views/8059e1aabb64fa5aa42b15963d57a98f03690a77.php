<?php $pagename = 'Abonnements' ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Content -->

        <div class="content content-full content-boxed"><!-- New Arrivals -->
            <h2 class="content-heading">Les disponibilités</h2>
            <div class="row items-push">

                <?php $__currentLoopData = $categorydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorysingle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-xl-4 block-rounded block-link-pop">

                    <div class="block block-rounded h-100 mb-0 block-link-pop">
                        <div class="block-content p-1">
                            <div class="options-container">
                                <a class="block-rounded block-link-pop" href="<?php echo e(route('products.show',['categoryname' => $categorysingle->catname,'name' => $categorysingle->name])); ?>">
                                <img class="img-fluid options-item" src="<?php echo e(asset('/assets/media/photos/')); ?>/<?php echo e($categorysingle->bannerurl); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="mb-1">
                                <a class="h6" href="<?php echo e(route('products.show',['categoryname' => $categorysingle->catname,'name' => $categorysingle->name])); ?>"><?php echo e($categorysingle->name); ?></a>
                            </div>
                            <p class="fs-sm text-muted"><?php echo e($categorysingle->catname); ?></p>

                        </div>
                    </div>
                    </a>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <!-- END New Arrivals -->


        </div>
        <!-- END Page Content -->

        <!-- Explore Store -->
        <div class="bg-body-dark">
            <div class="content content-full">
                <div class="my-5 text-center">
                    <h3 class="h4 mb-4">
                        Plus de <strong>10.000</strong> abonnements premium en vente !
                    </h3>
                    <a class="btn btn-primary px-4 py-2" href="<?php echo e(route('products.type','abonnements')); ?>">
                        Découvrir les ventes <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- END Explore Store -->
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/products.blade.php ENDPATH**/ ?>