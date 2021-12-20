<?php $__env->startSection('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.database')); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-data"></i> <?php echo e(__('voyager::generic.database')); ?>

        <a href="<?php echo e(route('voyager.database.create')); ?>" class="btn btn-success"><i class="voyager-plus"></i>
            <?php echo e(__('voyager::database.create_new_table')); ?></a>
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
                            <th style="text-align:right" colspan="2"><?php echo e(__('voyager::database.table_actions')); ?></th>
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
                            </p>
                        </td>

                        <td>
                            <div class="bread_actions">
                            <?php if($table->dataTypeId): ?>
                                <a href="<?php echo e(route('voyager.' . $table->slug . '.index')); ?>"
                                   class="btn-sm btn-warning browse_bread">
                                    <i class="voyager-plus"></i> <?php echo e(__('voyager::database.browse_bread')); ?>

                                </a>
                                <a href="<?php echo e(route('voyager.bread.edit', $table->name)); ?>"
                                   class="btn-sm btn-default edit">
                                   <?php echo e(__('voyager::bread.edit_bread')); ?>

                                </a>
                                <a data-id="<?php echo e($table->dataTypeId); ?>" data-name="<?php echo e($table->name); ?>"
                                     class="btn-sm btn-danger delete">
                                     <?php echo e(__('voyager::bread.delete_bread')); ?>

                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('voyager.bread.create', $table->name)); ?>"
                                   class="btn-sm btn-default">
                                    <i class="voyager-plus"></i> <?php echo e(__('voyager::bread.add_bread')); ?>

                                </a>
                            <?php endif; ?>
                            </div>
                        </td>

                        <td class="actions">
                            <a class="btn btn-danger btn-sm pull-right delete_table <?php if($table->dataTypeId): ?> remove-bread-warning <?php endif; ?>"
                               data-table="<?php echo e($table->prefix.$table->name); ?>">
                               <i class="voyager-trash"></i> <?php echo e(__('voyager::generic.delete')); ?>

                            </a>
                            <a href="<?php echo e(route('voyager.database.edit', $table->prefix.$table->name)); ?>"
                               class="btn btn-sm btn-primary pull-right" style="display:inline; margin-right:10px;">
                               <i class="voyager-edit"></i> <?php echo e(__('voyager::generic.edit')); ?>

                            </a>
                            <a href="<?php echo e(route('voyager.database.show', $table->prefix.$table->name)); ?>"
                               data-name="<?php echo e($table->name); ?>"
                               class="btn btn-sm btn-warning pull-right desctable" style="display:inline; margin-right:10px;">
                               <i class="voyager-eye"></i> <?php echo e(__('voyager::generic.view')); ?>

                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>

    
    <div class="modal modal-danger fade" tabindex="-1" id="delete_bread_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i>  <?php echo __('voyager::bread.delete_bread_quest', ['table' => '<span id="delete_bread_name"></span>']); ?></h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_bread_form" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="btn btn-danger" value="<?php echo e(__('voyager::bread.delete_bread_conf')); ?>">
                    </form>
                    <button type="button" class="btn btn-outline pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> <?php echo __('voyager::database.delete_table_question', ['table' => '<span id="delete_table_name"></span>']); ?></h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_table_form" method="POST">
                        <?php echo e(method_field('DELETE')); ?>

                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="submit" class="btn btn-danger pull-right" value="<?php echo e(__('voyager::database.delete_table_confirm')); ?>">
                        <button type="button" class="btn btn-outline pull-right" style="margin-right:10px;"
                                data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?>

                        </button>
                    </form>

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

            // Setup Delete Table
            //
            $('td.actions').on('click', '.delete_table', function (e) {
                table = $(this).data('table');
                if ($(this).hasClass('remove-bread-warning')) {
                    toastr.warning('<?php echo e(__('voyager::database.delete_bread_before_table')); ?>');
                } else {
                    $('#delete_table_name').text(table);

                    $('#delete_table_form')[0].action = '<?php echo e(route('voyager.database.destroy', ['database' => '__database'])); ?>'.replace('__database', table)
                    $('#delete_modal').modal('show');
                }
            });

            // Setup Delete BREAD
            //
            $('table .bread_actions').on('click', '.delete', function (e) {
                id = $(this).data('id');
                name = $(this).data('name');

                $('#delete_bread_name').text(name);
                $('#delete_bread_form')[0].action = '<?php echo e(route('voyager.bread.delete', '__id')); ?>'.replace('__id', id);
                $('#delete_bread_modal').modal('show');
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/database/index.blade.php ENDPATH**/ ?>