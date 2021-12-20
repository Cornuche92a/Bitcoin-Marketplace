<?php if($artisan_output): ?>
    <pre>
        <i class="close-output voyager-x"><?php echo e(__('voyager::compass.commands.clear_output')); ?></i><span class="art_out"><?php echo e(__('voyager::compass.commands.command_output')); ?>:</span><?php echo e(trim(trim($artisan_output,'"'))); ?>

    </pre>
<?php endif; ?>

<?php $__currentLoopData = $commands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $command): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="command" data-command="<?php echo e($command->name); ?>">
        <code>php artisan <?php echo e($command->name); ?></code>
        <small><?php echo e($command->description); ?></small><i class="voyager-terminal"></i>
        <form action="<?php echo e(route('voyager.compass.post')); ?>" class="cmd_form" method="POST">
            <?php echo e(csrf_field()); ?>

            <input type="text" name="args" autofocus class="form-control" placeholder="<?php echo e(__('voyager::compass.commands.additional_args')); ?>">
            <input type="submit" class="btn btn-primary pull-right delete-confirm"
                    value="<?php echo e(__('voyager::compass.commands.run_command')); ?>">
            <input type="hidden" name="command" id="hidden_cmd" value="<?php echo e($command->name); ?>">
        </form>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/compass/includes/commands.blade.php ENDPATH**/ ?>