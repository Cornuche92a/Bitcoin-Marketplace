<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<?php $__env->startSection('add_product'); ?>
<form method="post" action="<?php echo e(route('store_product')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="text" name="log_name">
    <input type="text" name="username_email_log">
    <input type="text" name="password_pin_log">
    <input type="textarea" name="details_more">
    <input type="number" name="price" id="price" value=5>
    <button type="submit">Valider</button>
</form>

    <?php if($errors->any()): ?>

    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/add_product.blade.php ENDPATH**/ ?>