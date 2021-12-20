<?php $__env->startSection('database-table-editor-template'); ?>

<div class="panel panel-bordered">
    <div class="panel-body">
        <div class="row">
        <?php if($db->action == 'update'): ?>
            <div class="col-md-12">
        <?php else: ?>
            <div class="col-md-6">
        <?php endif; ?>
                <label for="name"><?php echo e(__('voyager::database.table_name')); ?></label><br>
                <input v-model.trim="table.name" type="text" class="form-control" placeholder="<?php echo e(__('voyager::database.table_name')); ?>" required pattern="<?php echo e($db->identifierRegex); ?>">
            </div>

        <?php if($db->action == 'create'): ?>
            <div class="col-md-3 col-sm-4 col-xs-6">
                <label for="create_model"><?php echo e(__('voyager::database.create_model_table')); ?></label><br>
                <input type="checkbox" name="create_model" data-toggle="toggle"
                       data-on="<?php echo e(__('voyager::generic.yes_please')); ?>" data-off="<?php echo e(__('voyager::generic.no_thanks')); ?>">
            </div>
            
        <?php endif; ?>
        </div><!-- .panel-body .row -->

        <div v-if="compositeIndexes.length" v-once class="alert alert-danger">
            <p><?php echo e(__('voyager::database.no_composites_warning')); ?></p>
        </div>

        <div id="alertsContainer"></div>

        <template v-if="tableHasColumns">
            <p><?php echo e(__('voyager::database.table_columns')); ?></p>

            <table class="table table-bordered" style="width:100%;">
                <thead>
                <tr>
                    <th><?php echo e(__('voyager::generic.name')); ?></th>
                    <th><?php echo e(__('voyager::generic.type')); ?></th>
                    <th><?php echo e(__('voyager::generic.length')); ?></th>
                    <th><?php echo e(__('voyager::generic.not_null')); ?></th>
                    <th><?php echo e(__('voyager::generic.unsigned')); ?></th>
                    <th><?php echo e(__('voyager::generic.auto_increment')); ?></th>
                    <th><?php echo e(__('voyager::generic.index')); ?></th>
                    <th><?php echo e(__('voyager::generic.default')); ?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <database-column
                        v-for="(column, index) in table.columns"
                        :column="column"
                        :index="getColumnsIndex(column.name)"
                        :key="index"
                        @columnNameUpdated="renameColumn"
                        @columnDeleted="deleteColumn"
                        @indexAdded="addIndex"
                        @indexDeleted="deleteIndex"
                        @indexUpdated="updateIndex"
                        @indexChanged="onIndexChange"
                    ></database-column>
                </tbody>
            </table>
        </template>
        <div v-else>
          <p><?php echo e(__('voyager::database.table_no_columns')); ?></p>
        </div>

        <div style="text-align:center">
            <database-table-helper-buttons
                @columnAdded="addColumn"
            ></database-table-helper-buttons>
        </div>
    </div><!-- .panel-body -->

    <div class="panel-footer">
        <input type="submit" class="btn btn-primary pull-right"
               value="<?php if($db->action == 'update'): ?><?php echo e(__('voyager::database.update_table')); ?><?php else: ?><?php echo e(__('voyager::database.create_new_table')); ?><?php endif; ?>"
               :disabled="!tableHasColumns">
        <div style="clear:both"></div>
    </div>
</div><!-- .panel -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::tools.database.vue-components.database-column', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('voyager::tools.database.vue-components.database-table-helper-buttons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    Vue.component('database-table-editor', {
        props: {
            table: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                emptyIndex: {
                    type: '',
                    name: ''
                },
                compositeIndexes: []
            };
        },
        template: `<?php echo $__env->yieldContent('database-table-editor-template'); ?>`,
        mounted() {
            // Add warning to columns that are part of a composite index
            this.compositeIndexes = this.getCompositeIndexes();
            let compositeColumns = this.getIndexesColumns(this.compositeIndexes);

            for (col in compositeColumns) {
                this.getColumn(compositeColumns[col]).composite = true;
            }

            // Display errors
            <?php if(Session::has('alerts')): ?>
                helpers.displayAlerts(alerts, helpers.bootstrapAlerter({dismissible: true}), 'error');
            <?php endif; ?>
        },
        computed: {
            tableHasColumns() {
                return this.table.columns.length;
            }
        },
        methods: {
            addColumn(column) {
                column.name = column.name.trim();

                if (column.name && this.hasColumn(column.name)) {
                    return toastr.error("<?php echo e(__('voyager::database.column')); ?> " + column.name + " <?php echo e(__('voyager::database.already_exists')); ?>");
                }

                this.table.columns.push(
                    JSON.parse(JSON.stringify(column))
                );
            },
            getColumn(name) {
                name = name.toLowerCase().trim();

                return this.table.columns.find(function (column) {
                    return name == column.name.toLowerCase();
                });
            },
            hasColumn(name) {
                return !!this.getColumn(name);
            },
            renameColumn(column) {
                let newName = column.newName.trim();
                column = column.column;

                let existingColumn;
                if ((existingColumn = this.getColumn(newName)) && (existingColumn !== column)) {
                    return toastr.error("<?php echo e(__('voyager::database.column')); ?> " + newName + " <?php echo e(__('voyager::database.already_exists')); ?>");
                }

                let index = this.getColumnsIndex(column.name);
                if (index !== this.emptyIndex) {
                    index.columns = [newName];
                }

                column.name = newName;
            },
            deleteColumn(column) {
                var columnPos = this.table.columns.indexOf(column);

                if (columnPos !== -1) {
                    this.table.columns.splice(columnPos, 1);

                    // Delete associated index
                    this.deleteIndex(this.getColumnsIndex(column.name));
                }
            },
            getColumnsIndex(columns) {
                // todo: detect if a column has a composite index
                //  if so, maybe disable its Index input, and tell the user to go to special Index form (advanced view)?
                if (!Array.isArray(columns)) {
                    columns = [columns];
                }

                let index = null;

                for (i in this.table.indexes) {
                    // if there is no difference between columns
                    if (!($(this.table.indexes[i].columns).not(columns).get().length)) {
                        index = this.table.indexes[i];
                        break;
                    }
                }

                if (!index) {
                    index = this.emptyIndex;
                }

                index.table = this.table.name;
                return index;
            },
            onIndexChange(index) {
                if (index.old === this.emptyIndex) {
                    return this.addIndex({
                        columns: index.columns,
                        type: index.newType
                    });
                }

                if (index.newType == '') {
                    return this.deleteIndex(index.old);
                }

                return this.updateIndex(index.old, index.newType);
            },
            addIndex(index) {
                if (index.type == 'PRIMARY') {
                    if (this.table.primaryKeyName) {
                        return toastr.error("<?php echo e(__('voyager::database.table_has_index')); ?>");
                    }

                    this.table.primaryKeyName = 'primary';
                }

                this.setIndexName(index);
                this.table.indexes.push(index);
            },
            deleteIndex(index) {
                var indexPos = this.table.indexes.indexOf(index);

                if (indexPos !== -1) {
                    if (index.type == 'PRIMARY') {
                        this.table.primaryKeyName = false;
                    }

                    this.table.indexes.splice(indexPos, 1);
                }
            },
            updateIndex(index, newType) {
                if (index.type == 'PRIMARY') {
                    this.table.primaryKeyName = false;
                } else if (newType == 'PRIMARY') {
                    if (this.table.primaryKeyName) {
                        return toastr.error("<?php echo e(__('voyager::database.table_has_index')); ?>");
                    }

                    this.table.primaryKeyName = 'primary';
                }

                index.type = newType;
                this.setIndexName(index);
            },
            setIndexName(index) {
                if (index.type == 'PRIMARY') {
                    index.name = 'primary';
                } else {
                    // the name will be set on the server by PHP
                    index.name = '';
                }
            },
            getCompositeIndexes() {
                let composite = [];

                for (i in this.table.indexes) {
                    if (this.table.indexes[i].isComposite) {
                        composite.push(this.table.indexes[i]);
                    }
                }

                return composite;
            },
            getIndexesColumns(indexes) {
                let columns = [];

                for (i in indexes) {
                    for (col in indexes[i].columns) {
                        columns.push(indexes[i].columns[col]);
                    }
                }

                return [...new Set(columns)];
            }
        }
    });
</script>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/database/vue-components/database-table-editor.blade.php ENDPATH**/ ?>