<?php
$dimmerGroups = Voyager::dimmers();
?>

<?php if(count($dimmerGroups)): ?>
<?php $__currentLoopData = $dimmerGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dimmerGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
    $count = $dimmerGroup->count();
    $classes = [
        'col-xs-12',
        'col-sm-'.($count >= 2 ? '6' : '12'),
        'col-md-'.($count >= 3 ? '4' : ($count >= 2 ? '6' : '12')),
    ];
    $class = implode(' ', $classes);
    $prefix = "<div class='{$class}'>";
    $surfix = '</div>';
    ?>
    <?php if($dimmerGroup->any()): ?>
    <div class="clearfix container-fluid row">
        <?php echo $prefix.$dimmerGroup->setSeparator($surfix.$prefix)->display().$surfix; ?>

    </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/dimmers.blade.php ENDPATH**/ ?>