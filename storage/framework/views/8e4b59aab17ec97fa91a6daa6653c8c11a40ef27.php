<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural')); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-list-add"></i> <?php echo e($dataType->getTranslatedAttribute('display_name_plural')); ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add',app($dataType->model_name))): ?>
            <a href="<?php echo e(route('voyager.'.$dataType->slug.'.create')); ?>" class="btn btn-success">
                <i class="voyager-plus"></i> <?php echo e(__('voyager::generic.add_new')); ?>

            </a>
        <?php endif; ?>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('voyager::menus.partial.notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-content container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                            <tr>
                                <?php $__currentLoopData = $dataType->browseRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th><?php echo e($row->display_name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <th class="actions text-right"><?php echo e(__('voyager::generic.actions')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $dataTypeContent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php $__currentLoopData = $dataType->browseRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <td>
                                        <?php if($row->type == 'image'): ?>
                                            <img src="<?php if( strpos($data->{$row->field}, 'http://') === false && strpos($data->{$row->field}, 'https://') === false): ?><?php echo e(Voyager::image( $data->{$row->field} )); ?><?php else: ?><?php echo e($data->{$row->field}); ?><?php endif; ?>" style="width:100px">
                                        <?php else: ?>
                                            <?php echo e($data->{$row->field}); ?>

                                        <?php endif; ?>
                                    </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <td class="no-sort no-click bread-actions">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $data)): ?>
                                            <div class="btn btn-sm btn-danger pull-right delete" data-id="<?php echo e($data->{$data->getKeyName()}); ?>">
                                                <i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete')); ?>

                                            </div>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $data)): ?>
                                            <a href="<?php echo e(route('voyager.'.$dataType->slug.'.edit', $data->{$data->getKeyName()})); ?>" class="btn btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i> <?php echo e(__('voyager::generic.edit')); ?>

                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit', $data)): ?>
                                            <a href="<?php echo e(route('voyager.'.$dataType->slug.'.builder', $data->{$data->getKeyName()})); ?>" class="btn btn-sm btn-success pull-right">
                                                <i class="voyager-list"></i> <?php echo e(__('voyager::generic.builder')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete_question')); ?> <?php echo e($dataType->getTranslatedAttribute('display_name_singular')); ?>?
                    </h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        <?php echo e(method_field("DELETE")); ?>

                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="<?php echo e(__('voyager::generic.delete_this_confirm')); ?> <?php echo e($dataType->getTranslatedAttribute('display_name_singular')); ?>">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <!-- DataTables -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                "order": [],
                "language": <?php echo json_encode(__('voyager::datatable'), true); ?>,
                "columnDefs": [{"targets": -1, "searchable":  false, "orderable": false}]
                <?php if(config('dashboard.data_tables.responsive')): ?>, responsive: true <?php endif; ?>
            });
        });

        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '<?php echo e(route('voyager.'.$dataType->slug.'.destroy', ['id' => '__menu'])); ?>'.replace('__menu', $(this).data('id'));

            $('#delete_modal').modal('show');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/menus/browse.blade.php ENDPATH**/ ?>