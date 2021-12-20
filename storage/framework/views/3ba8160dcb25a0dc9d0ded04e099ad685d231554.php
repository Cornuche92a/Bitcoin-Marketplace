<?php if($paginator->hasPages()): ?>
    <nav role="navigatione" aria-label="<?php echo e(__('Pagination Navigation')); ?>">
        <ul class="pagination pagination-sm justify-content-end mb-0">


                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <span aria-disabled="true">
                                <span class="text-black"><?php echo e($element); ?></span>
                            </span>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item active">
                                        <a class="page-link"><?php echo e($page); ?></a>
                                    </li>
                            <?php else: ?>
                                <li class="page-item">
                                <a href="<?php echo e($url); ?>" class="page-link" aria-label="<?php echo e(__('Go to page :page', ['page' => $page])); ?>">
                                    <?php echo e($page); ?>

                                </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <br>
                <p class="text-sm text-gray-700 leading-5">
                    <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    <?php echo __('résultats sur'); ?>

                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    <?php echo __('au total'); ?>

                </p>
            </div>


        </div>
    </nav>
<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/resources/views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>