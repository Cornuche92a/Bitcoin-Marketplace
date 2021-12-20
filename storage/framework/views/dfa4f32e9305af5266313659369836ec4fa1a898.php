<?php if($db->action == 'update'): ?>
    <?php $__env->startSection('page_title', __('voyager::database.editing_table', ['table' => $db->table->name])); ?>
<?php else: ?>
    <?php $__env->startSection('page_title', __('voyager::database.create_new_table')); ?>
<?php endif; ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-data"></i>
        <?php if($db->action == 'update'): ?>
            <?php echo e(__('voyager::database.editing_table', ['table' => $db->table->name])); ?>

        <?php else: ?>
            <?php echo e(__('voyager::database.create_new_table')); ?>

        <?php endif; ?>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<ol class="breadcrumb hidden-xs">
    <li>
        <a href="<?php echo e(route('voyager.dashboard')); ?>"><i class="voyager-boat"></i> <?php echo e(__('voyager::generic.dashboard')); ?></a>
    </li>
    <li>
        <a href="<?php echo e(route('voyager.database.index')); ?>">
            <?php echo e(__('voyager::generic.database')); ?>

        </a>
    </li>

    <?php if($db->action == 'update'): ?>
    <li class="active"><?php echo e(__('voyager::generic.edit')); ?></li>
    <li class="active"><?php echo e($db->table->name); ?></li>
    <?php else: ?>
    <li class="active"><?php echo e(__('voyager::generic.add')); ?></li>
    <?php endif; ?>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="page-content container-fluid">
        <div class="row">
            <div id="dbManager" class="col-md-12">
                <form ref="form" @submit.prevent="stringifyTable" @keydown.enter.prevent action="<?php echo e($db->formAction); ?>" method="POST">
                    <?php if($db->action == 'update'): ?><?php echo e(method_field('PUT')); ?><?php endif; ?>

                    <database-table-editor :table="table"></database-table-editor>

                    <input type="hidden" :value="tableJson" name="table">

                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo $__env->make('voyager::tools.database.vue-components.database-table-editor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        new Vue({
            el: '#dbManager',
            data: {
                table: {},
                originalTable: <?php echo $db->table->toJson(); ?>, // to do comparison later?
                oldTable: <?php echo $db->oldTable; ?>,
                tableJson: ''
            },
            created() {
                // If old table is set, use it to repopulate the form
                if (this.oldTable) {
                    this.table = this.oldTable;
                } else {
                    this.table = JSON.parse(JSON.stringify(this.originalTable));
                }
            },
            methods: {
                stringifyTable() {
                    this.tableJson = JSON.stringify(this.table);

                    this.$nextTick(() => this.$refs.form.submit());
                }
            }
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/database/edit-add.blade.php ENDPATH**/ ?>