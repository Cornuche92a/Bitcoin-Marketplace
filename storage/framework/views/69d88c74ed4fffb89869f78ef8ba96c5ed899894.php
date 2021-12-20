<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.bread')); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-bread"></i> <?php echo e(__('voyager::generic.bread')); ?>

    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-content container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">

                <table class="table table-striped database-tables">
                    <thead>
                        <tr>
                            <th><?php echo e(__('voyager::database.table_name')); ?></th>
                            <th style="text-align:right"><?php echo e(__('voyager::bread.bread_crud_actions')); ?></th>
                        </tr>
                    </thead>

                <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $table): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(in_array($table->name, config('voyager.database.tables.hidden', []))) continue; ?>
                    <tr>
                        <td>
                            <p class="name">
                                <a href="<?php echo e(route('voyager.database.show', $table->prefix.$table->name)); ?>"
                                   data-name="<?php echo e($table->prefix.$table->name); ?>" class="desctable">
                                   <?php echo e($table->name); ?>

                                </a>
                                <i class="voyager-data"
                                   style="font-size:25px; position:absolute; margin-left:10px; margin-top:-3px;"></i>
                            </p>
                        </td>

                        <td class="actions text-right">
                            <?php if($table->dataTypeId): ?>
                                <a href="<?php echo e(route('voyager.' . $table->slug . '.index')); ?>"
                                   class="btn btn-warning btn-sm browse_bread" style="margin-right: 0;">
                                    <i class="voyager-plus"></i> <?php echo e(__('voyager::generic.browse')); ?>

                                </a>
                                <a href="<?php echo e(route('voyager.bread.edit', $table->name)); ?>"
                                   class="btn btn-primary btn-sm edit">
                                    <i class="voyager-edit"></i> <?php echo e(__('voyager::generic.edit')); ?>

                                </a>
                                <a href="#delete-bread" data-id="<?php echo e($table->dataTypeId); ?>" data-name="<?php echo e($table->name); ?>"
                                     class="btn btn-danger btn-sm delete">
                                    <i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete')); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('voyager.bread.create', $table->name)); ?>"
                                   class="_btn btn-default btn-sm pull-right">
                                    <i class="voyager-plus"></i> <?php echo e(__('voyager::bread.add_bread')); ?>

                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
    
    <div class="modal modal-danger fade" tabindex="-1" id="delete_builder_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i>  <?php echo __('voyager::bread.delete_bread_quest', ['table' => '<span id="delete_builder_name"></span>']); ?></h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_builder_form" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="btn btn-danger" value="<?php echo e(__('voyager::bread.delete_bread_conf')); ?>">
                    </form>
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal modal-info fade" tabindex="-1" id="table_info" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-data"></i> {{ table.name }}</h4>
                </div>
                <div class="modal-body" style="overflow:scroll">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th><?php echo e(__('voyager::database.field')); ?></th>
                            <th><?php echo e(__('voyager::database.type')); ?></th>
                            <th><?php echo e(__('voyager::database.null')); ?></th>
                            <th><?php echo e(__('voyager::database.key')); ?></th>
                            <th><?php echo e(__('voyager::database.default')); ?></th>
                            <th><?php echo e(__('voyager::database.extra')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="row in table.rows">
                            <td><strong>{{ row.Field }}</strong></td>
                            <td>{{ row.Type }}</td>
                            <td>{{ row.Null }}</td>
                            <td>{{ row.Key }}</td>
                            <td>{{ row.Default }}</td>
                            <td>{{ row.Extra }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.close')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script>

        var table = {
            name: '',
            rows: []
        };

        new Vue({
            el: '#table_info',
            data: {
                table: table,
            },
        });

        $(function () {

            // Setup Delete BREAD
            //
            $('table .actions').on('click', '.delete', function (e) {
                id = $(this).data('id');
                name = $(this).data('name');

                $('#delete_builder_name').text(name);
                $('#delete_builder_form')[0].action = '<?php echo e(route('voyager.bread.delete', ['__id'])); ?>'.replace('__id', id);
                $('#delete_builder_modal').modal('show');
            });

            // Setup Show Table Info
            //
            $('.database-tables').on('click', '.desctable', function (e) {
                e.preventDefault();
                href = $(this).attr('href');
                table.name = $(this).data('name');
                table.rows = [];
                $.get(href, function (data) {
                    $.each(data, function (key, val) {
                        table.rows.push({
                            Field: val.field,
                            Type: val.type,
                            Null: val.null,
                            Key: val.key,
                            Default: val.default,
                            Extra: val.extra
                        });
                        $('#table_info').modal('show');
                    });
                });
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/bread/index.blade.php ENDPATH**/ ?>