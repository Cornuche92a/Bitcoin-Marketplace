<?php if(config('voyager.show_dev_tips')): ?>
    <div class="container-fluid">
        <div class="alert alert-info">
            <strong><?php echo e(__('voyager::generic.how_to_use')); ?>:</strong>
            <p><?php echo e(trans_choice('voyager::menu_builder.usage_hint', !empty($menu) ? 0 : 1)); ?> <code>menu('<?php echo e(!empty($menu) ? $menu->name : 'name'); ?>')</code></p>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/menus/partial/notice.blade.php ENDPATH**/ ?>