
<div class="col-sm-3 col-md-3 sidebar">
  <h3><i class="voyager-logbook"></i> <?php echo e(__('voyager::compass.logs.title')); ?> <small><?php echo e(__('voyager::compass.logs.text')); ?>.</small></h3>
  <div class="list-group">
    <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="?log=<?php echo e(base64_encode($file)); ?>"
         class="list-group-item <?php if($current_file == $file): ?> llv-active <?php endif; ?>">
        <i class="voyager-file-text"></i> <?php echo e($file); ?>

      </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>
<div class="col-sm-9 col-md-9 table-container">
  <?php if($logs === null): ?>
    <div>
      <?php echo e(__('voyager::compass.logs.file_too_big')); ?>

    </div>
  <?php else: ?>
    <table id="table-log" class="table table-striped">
      <thead>
      <tr>
        <th><?php echo e(__('voyager::compass.logs.level')); ?></th>
        <th><?php echo e(__('voyager::compass.logs.context')); ?></th>
        <th><?php echo e(__('voyager::compass.logs.date')); ?></th>
        <th><?php echo e(__('voyager::compass.logs.content')); ?></th>
      </tr>
      </thead>
      <tbody>

      <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr data-display="stack<?php echo e($key); ?>">
          <td class="text-<?php echo e($log['level_class']); ?> level"><span class="glyphicon glyphicon-<?php echo e($log['level_img']); ?>-sign"
                                                           aria-hidden="true"></span> &nbsp;<?php echo e($log['level']); ?></td>
          <td class="text"><?php echo e($log['context']); ?></td>
          <td class="date"><?php echo e($log['date']); ?></td>
          <td class="text">
            <?php if($log['stack']): ?> <a class="pull-right expand btn btn-default btn-xs"
                                   data-display="stack<?php echo e($key); ?>"><span
                  class="glyphicon glyphicon-search"></span></a><?php endif; ?>
            <?php echo e($log['text']); ?>

            <?php if(isset($log['in_file'])): ?> <br/><?php echo e($log['in_file']); ?><?php endif; ?>
            <?php if($log['stack']): ?>
              <div class="stack" id="stack<?php echo e($key); ?>"
                   style="display: none; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?>

              </div><?php endif; ?>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  <?php endif; ?>
  <div>
    <?php if($current_file): ?>
      <a href="?download=<?php echo e(base64_encode($current_file)); ?>"><span class="glyphicon glyphicon-download-alt"></span>
        <?php echo e(__('voyager::compass.logs.download_file')); ?></a>
      -
      <a id="delete-log" href="?del=<?php echo e(base64_encode($current_file)); ?>"><span
            class="glyphicon glyphicon-trash"></span> <?php echo e(__('voyager::compass.logs.delete_file')); ?></a>
      <?php if(count($files) > 1): ?>
        -
        <a id="delete-all-log" href="?delall=true"><span class="glyphicon glyphicon-trash"></span> <?php echo e(__('voyager::compass.logs.delete_all_files')); ?></a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/compass/includes/logs.blade.php ENDPATH**/ ?>