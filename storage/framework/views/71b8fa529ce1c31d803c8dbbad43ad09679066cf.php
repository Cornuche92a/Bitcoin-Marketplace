<?php $pagename = 'Tout les abonnements' ?>

<?php $__env->startSection('content'); ?>
    <div class="content content-full content-boxed">

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Abonnements disponibles </h3>
        </div>
        <div class="block-content">
            <div class="row items-push">
                <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a class="block block-rounded block-bordered block-link-shadow h-100 mb-0" href="<?php echo e(route('products.show',['categoryname' => $category->catname,'name' => $category->name])); ?>">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <div class="fw-semibold mb-1"><?php echo e($category->name); ?></div>
                                <div class="fs-sm text-muted">(<?php echo e($category->logs()->where(['available'=>1])->count()); ?>)</div>
                            </div>
                            <div class="ms-3">
                                <img class="img-avatar" src="<?php echo e(asset('/assets/media/photos/')); ?>/<?php echo e($category->iconurl); ?>" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/shop_list.blade.php ENDPATH**/ ?>