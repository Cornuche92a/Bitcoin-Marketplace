<ol class="dd-list">

<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <li class="dd-item" data-id="<?php echo e($item->id); ?>">
        <div class="pull-right item_actions">
            <div class="btn btn-sm btn-danger pull-right delete" data-id="<?php echo e($item->id); ?>">
                <i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete')); ?>

            </div>
            <div class="btn btn-sm btn-primary pull-right edit"
                data-id="<?php echo e($item->id); ?>"
                data-title="<?php echo e($item->title); ?>"
                data-url="<?php echo e($item->url); ?>"
                data-target="<?php echo e($item->target); ?>"
                data-icon_class="<?php echo e($item->icon_class); ?>"
                data-color="<?php echo e($item->color); ?>"
                data-route="<?php echo e($item->route); ?>"
                data-parameters="<?php echo e(json_encode($item->parameters)); ?>"
            >
                <i class="voyager-edit"></i> <?php echo e(__('voyager::generic.edit')); ?>

            </div>
        </div>
        <div class="dd-handle">
            <?php if($options->isModelTranslatable): ?>
                <?php echo $__env->make('voyager::multilingual.input-hidden', [
                    'isModelTranslatable' => true,
                    '_field_name'         => 'title'.$item->id,
                    '_field_trans'        => json_encode($item->getTranslationsOf('title'))
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <span><?php echo e($item->title); ?></span> <small class="url"><?php echo e($item->link()); ?></small>
        </div>
        <?php if(!$item->children->isEmpty()): ?>
            <?php echo $__env->make('voyager::menu.admin', ['items' => $item->children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ol>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/menu/admin.blade.php ENDPATH**/ ?>