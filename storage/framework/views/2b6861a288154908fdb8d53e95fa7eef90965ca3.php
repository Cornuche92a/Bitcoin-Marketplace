<?php if(isset($dataType->id)): ?>
    <?php $__env->startSection('page_title', __('voyager::bread.edit_bread_for_table', ['table' => $dataType->name])); ?>
    <?php
        $display_name = $dataType->getTranslatedAttribute('display_name_singular');
        $display_name_plural = $dataType->getTranslatedAttribute('display_name_plural');
    ?>
<?php else: ?>
    <?php $__env->startSection('page_title', __('voyager::bread.create_bread_for_table', ['table' => $table])); ?>
<?php endif; ?>

<?php $__env->startSection('page_header'); ?>
    <div class="page-title">
        <i class="voyager-data"></i>
        <?php if(isset($dataType->id)): ?>
            <?php echo e(__('voyager::bread.edit_bread_for_table', ['table' => $dataType->name])); ?>

        <?php else: ?>
            <?php echo e(__('voyager::bread.create_bread_for_table', ['table' => $table])); ?>

        <?php endif; ?>
    </div>
    <?php
        $isModelTranslatable = (!isset($isModelTranslatable) || !isset($dataType)) ? false : $isModelTranslatable;
        if (isset($dataType->name)) {
            $table = $dataType->name;
        }
    ?>
    <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumbs'); ?>
<ol class="breadcrumb hidden-xs">
    <li class="active">
        <a href="<?php echo e(route('voyager.dashboard')); ?>"><i class="voyager-boat"></i> <?php echo e(__('voyager::generic.dashboard')); ?></a>
    </li>
    <li class="active">
        <a href="<?php echo e(route('voyager.bread.index')); ?>">
            <?php echo e(__('voyager::generic.bread')); ?>

        </a>
    </li>
    <li class="active">
        <?php if(isset($dataType->id)): ?>
        <a href="<?php echo e(route('voyager.bread.edit', $table)); ?>">
            <?php echo e($display_name); ?>

        </a>
        <?php else: ?>
        <a href="<?php echo e(route('voyager.bread.create', $table)); ?>">
            <?php echo e($display_name); ?>

        </a>
        <?php endif; ?>
    </li>
    <li>
        <?php echo e(isset($dataType->id) ? __('voyager::generic.edit') : __('voyager::generic.add')); ?>

    </li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content container-fluid" id="voyagerBreadEditAdd">
        <div class="row">
            <div class="col-md-12">

                <form action="<?php if(isset($dataType->id)): ?><?php echo e(route('voyager.bread.update', $dataType->id)); ?><?php else: ?><?php echo e(route('voyager.bread.store')); ?><?php endif; ?>"
                      method="POST" role="form">
                <?php if(isset($dataType->id)): ?>
                    <input type="hidden" value="<?php echo e($dataType->id); ?>" name="id">
                    <?php echo e(method_field("PUT")); ?>

                <?php endif; ?>
                    <!-- CSRF TOKEN -->
                    <?php echo e(csrf_field()); ?>


                    <div class="panel panel-primary panel-bordered">

                        <div class="panel-heading">
                            <h3 class="panel-title panel-icon"><i class="voyager-bread"></i> <?php echo e(ucfirst($table)); ?> <?php echo e(__('voyager::bread.bread_info')); ?></h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-up" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row clearfix">
                                <div class="col-md-6 form-group">
                                    <label for="name"><?php echo e(__('voyager::database.table_name')); ?></label>
                                    <input type="text" class="form-control" readonly name="name" placeholder="<?php echo e(__('generic_name')); ?>"
                                           value="<?php echo e($dataType->name ?? $table); ?>">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 form-group">
                                    <label for="display_name_singular"><?php echo e(__('voyager::bread.display_name_singular')); ?></label>
                                    <?php if($isModelTranslatable): ?>
                                        <?php echo $__env->make('voyager::multilingual.input-hidden', [
                                            'isModelTranslatable' => true,
                                            '_field_name'         => 'display_name_singular',
                                            '_field_trans' => get_field_translations($dataType, 'display_name_singular')
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <input type="text" class="form-control"
                                           name="display_name_singular"
                                           id="display_name_singular"
                                           placeholder="<?php echo e(__('voyager::bread.display_name_singular')); ?>"
                                           value="<?php echo e($display_name); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="display_name_plural"><?php echo e(__('voyager::bread.display_name_plural')); ?></label>
                                    <?php if($isModelTranslatable): ?>
                                        <?php echo $__env->make('voyager::multilingual.input-hidden', [
                                            'isModelTranslatable' => true,
                                            '_field_name'         => 'display_name_plural',
                                            '_field_trans' => get_field_translations($dataType, 'display_name_plural')
                                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                    <input type="text" class="form-control"
                                           name="display_name_plural"
                                           id="display_name_plural"
                                           placeholder="<?php echo e(__('voyager::bread.display_name_plural')); ?>"
                                           value="<?php echo e($display_name_plural); ?>">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 form-group">
                                    <label for="slug"><?php echo e(__('voyager::bread.url_slug')); ?></label>
                                    <input type="text" class="form-control" name="slug" placeholder="<?php echo e(__('voyager::bread.url_slug_ph')); ?>"
                                           value="<?php echo e($dataType->slug ?? $slug); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="icon"><?php echo e(__('voyager::bread.icon_hint')); ?> <a
                                                href="<?php echo e(route('voyager.compass.index')); ?>#fonts"
                                                target="_blank"><?php echo e(__('voyager::bread.icon_hint2')); ?></a></label>
                                    <input type="text" class="form-control" name="icon"
                                           placeholder="<?php echo e(__('voyager::bread.icon_class')); ?>"
                                           value="<?php echo e($dataType->icon ?? ''); ?>">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 form-group">
                                    <label for="model_name"><?php echo e(__('voyager::bread.model_name')); ?></label>
                                    <span class="voyager-question"
                                        aria-hidden="true"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                        title="<?php echo e(__('voyager::bread.model_name_ph')); ?>"></span>
                                    <input type="text" class="form-control" name="model_name" placeholder="<?php echo e(__('voyager::bread.model_class')); ?>"
                                           value="<?php echo e($dataType->model_name ?? $model_name); ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="controller"><?php echo e(__('voyager::bread.controller_name')); ?></label>
                                    <span class="voyager-question"
                                        aria-hidden="true"
                                        data-toggle="tooltip"
                                        data-placement="right"
                                        title="<?php echo e(__('voyager::bread.controller_name_hint')); ?>"></span>
                                    <input type="text" class="form-control" name="controller" placeholder="<?php echo e(__('voyager::bread.controller_name')); ?>"
                                           value="<?php echo e($dataType->controller ?? ''); ?>">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6 form-group">
                                    <label for="policy_name"><?php echo e(__('voyager::bread.policy_name')); ?></label>
                                    <span class="voyager-question"
                                          aria-hidden="true"
                                          data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(__('voyager::bread.policy_name_ph')); ?>"></span>
                                    <input type="text" class="form-control" name="policy_name" placeholder="<?php echo e(__('voyager::bread.policy_class')); ?>"
                                           value="<?php echo e($dataType->policy_name ?? ''); ?>">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="generate_permissions"><?php echo e(__('voyager::bread.generate_permissions')); ?></label><br>
                                    <?php $checked = (isset($dataType->generate_permissions) && $dataType->generate_permissions == 1) || (isset($generate_permissions) && $generate_permissions); ?>
                                    <input type="checkbox"
                                           name="generate_permissions"
                                           class="toggleswitch"
                                           data-on="<?php echo e(__('voyager::generic.yes')); ?>"
                                           data-off="<?php echo e(__('voyager::generic.no')); ?>"
                                           <?php if($checked): ?> checked <?php endif; ?> >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="server_side"><?php echo e(__('voyager::bread.server_pagination')); ?></label><br>
                                    <?php $checked = (isset($dataType->server_side) && $dataType->server_side == 1) || (isset($server_side) && $server_side); ?>
                                    <input type="checkbox"
                                           name="server_side"
                                           class="toggleswitch"
                                           data-on="<?php echo e(__('voyager::generic.yes')); ?>"
                                           data-off="<?php echo e(__('voyager::generic.no')); ?>"
                                           <?php if($checked): ?> checked <?php endif; ?> >
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3 form-group">
                                    <label for="order_column"><?php echo e(__('voyager::bread.order_column')); ?></label>
                                    <span class="voyager-question"
                                          aria-hidden="true"
                                          data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(__('voyager::bread.order_column_ph')); ?>"></span>
                                    <select name="order_column" class="select2 form-control">
                                        <option value="">-- <?php echo e(__('voyager::generic.none')); ?> --</option>
                                        <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tbl['field']); ?>"
                                                <?php if(isset($dataType) && $dataType->order_column == $tbl['field']): ?> selected <?php endif; ?>
                                        ><?php echo e($tbl['field']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="order_display_column"><?php echo e(__('voyager::bread.order_ident_column')); ?></label>
                                    <span class="voyager-question"
                                          aria-hidden="true"
                                          data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(__('voyager::bread.order_ident_column_ph')); ?>"></span>
                                    <select name="order_display_column" class="select2 form-control">
                                        <option value="">-- <?php echo e(__('voyager::generic.none')); ?> --</option>
                                        <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tbl['field']); ?>"
                                                <?php if(isset($dataType) && $dataType->order_display_column == $tbl['field']): ?> selected <?php endif; ?>
                                        ><?php echo e($tbl['field']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="order_direction"><?php echo e(__('voyager::bread.order_direction')); ?></label>
                                    <select name="order_direction" class="select2 form-control">
                                        <option value="asc" <?php if(isset($dataType) && $dataType->order_direction == 'asc'): ?> selected <?php endif; ?>>
                                            <?php echo e(__('voyager::generic.ascending')); ?>

                                        </option>
                                        <option value="desc" <?php if(isset($dataType) && $dataType->order_direction == 'desc'): ?> selected <?php endif; ?>>
                                            <?php echo e(__('voyager::generic.descending')); ?>

                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="default_search_key"><?php echo e(__('voyager::bread.default_search_key')); ?></label>
                                    <span class="voyager-question"
                                          aria-hidden="true"
                                          data-toggle="tooltip"
                                          data-placement="right"
                                          title="<?php echo e(__('voyager::bread.default_search_key_ph')); ?>"></span>
                                    <select name="default_search_key" class="select2 form-control">
                                        <option value="">-- <?php echo e(__('voyager::generic.none')); ?> --</option>
                                        <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tbl['field']); ?>"
                                                <?php if(isset($dataType) && $dataType->default_search_key == $tbl['field']): ?> selected <?php endif; ?>
                                        ><?php echo e($tbl['field']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <?php if(isset($scopes) && isset($dataType)): ?>
                                    <div class="col-md-3 form-group">
                                        <label for="scope"><?php echo e(__('voyager::bread.scope')); ?></label>
                                        <select name="scope" class="select2 form-control">
                                            <option value="">-- <?php echo e(__('voyager::generic.none')); ?> --</option>
                                            <?php $__currentLoopData = $scopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($scope); ?>"
                                                    <?php if($dataType->scope == $scope): ?> selected <?php endif; ?>
                                            ><?php echo e($scope); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-9 form-group">
                                    <label for="description"><?php echo e(__('voyager::bread.description')); ?></label>
                                    <textarea class="form-control"
                                              name="description"
                                              placeholder="<?php echo e(__('voyager::bread.description')); ?>"
                                    ><?php echo e($dataType->description ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div><!-- .panel-body -->
                    </div><!-- .panel -->


                    <div class="panel panel-primary panel-bordered">
                        <div class="panel-heading">
                            <h3 class="panel-title panel-icon"><i class="voyager-window-list"></i> <?php echo e(__('voyager::bread.edit_rows', ['table' => $table])); ?>:</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-up" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="row fake-table-hd">
                                <div class="col-xs-2"><?php echo e(__('voyager::database.field')); ?></div>
                                <div class="col-xs-2"><?php echo e(__('voyager::database.visibility')); ?></div>
                                <div class="col-xs-2"><?php echo e(__('voyager::database.input_type')); ?></div>
                                <div class="col-xs-2"><?php echo e(__('voyager::bread.display_name')); ?></div>
                                <div class="col-xs-4"><?php echo e(__('voyager::database.optional_details')); ?></div>
                            </div>

                            <div id="bread-items">
                            <?php
                                $r_order = 0;
                            ?>
                            <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $r_order += 1;
                                ?>

                                <?php if(isset($dataType->id)): ?>
                                    <?php $dataRow = Voyager::model('DataRow')->where('data_type_id', '=', $dataType->id)->where('field', '=', $data['field'])->first(); ?>
                                <?php endif; ?>

                                <div class="row row-dd">
                                    <div class="col-xs-2">
                                        <h4><strong><?php echo e($data['field']); ?></strong></h4>
                                        <strong><?php echo e(__('voyager::database.type')); ?>:</strong> <span><?php echo e($data['type']); ?></span><br/>
                                        <strong><?php echo e(__('voyager::database.key')); ?>:</strong> <span><?php echo e($data['key']); ?></span><br/>
                                        <strong><?php echo e(__('voyager::generic.required')); ?>:</strong>
                                        <?php if($data['null'] == "NO"): ?>
                                            <span><?php echo e(__('voyager::generic.yes')); ?></span>
                                            <input type="hidden" value="1" name="field_required_<?php echo e($data['field']); ?>" checked="checked">
                                        <?php else: ?>
                                            <span><?php echo e(__('voyager::generic.no')); ?></span>
                                            <input type="hidden" value="0" name="field_required_<?php echo e($data['field']); ?>">
                                        <?php endif; ?>
                                        <div class="handler voyager-handle"></div>
                                        <input class="row_order" type="hidden" value="<?php echo e($dataRow->order ?? $r_order); ?>" name="field_order_<?php echo e($data['field']); ?>">
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="checkbox"
                                               id="field_browse_<?php echo e($data['field']); ?>"
                                               name="field_browse_<?php echo e($data['field']); ?>"
                                               <?php if(isset($dataRow->browse) && $dataRow->browse): ?>
                                                   checked="checked"
                                               <?php elseif($data['key'] == 'PRI'): ?>
                                               <?php elseif($data['type'] == 'timestamp' && $data['field'] == 'updated_at'): ?>
                                               <?php elseif(!isset($dataRow->browse)): ?>
                                                   checked="checked"
                                               <?php endif; ?>>
                                        <label for="field_browse_<?php echo e($data['field']); ?>"><?php echo e(__('voyager::generic.browse')); ?></label><br/>
                                        <input type="checkbox"
                                               id="field_read_<?php echo e($data['field']); ?>"
                                               name="field_read_<?php echo e($data['field']); ?>" <?php if(isset($dataRow->read) && $dataRow->read): ?> checked="checked" <?php elseif($data['key'] == 'PRI'): ?><?php elseif($data['type'] == 'timestamp' && $data['field'] == 'updated_at'): ?><?php elseif(!isset($dataRow->read)): ?> checked="checked" <?php endif; ?>>
                                        <label for="field_read_<?php echo e($data['field']); ?>"><?php echo e(__('voyager::generic.read')); ?></label><br/>
                                        <input type="checkbox"
                                               id="field_edit_<?php echo e($data['field']); ?>"
                                               name="field_edit_<?php echo e($data['field']); ?>" <?php if(isset($dataRow->edit) && $dataRow->edit): ?> checked="checked" <?php elseif($data['key'] == 'PRI'): ?><?php elseif($data['type'] == 'timestamp' && $data['field'] == 'updated_at'): ?><?php elseif(!isset($dataRow->edit)): ?> checked="checked" <?php endif; ?>>
                                        <label for="field_edit_<?php echo e($data['field']); ?>"><?php echo e(__('voyager::generic.edit')); ?></label><br/>
                                        <input type="checkbox"
                                               id="field_add_<?php echo e($data['field']); ?>"
                                               name="field_add_<?php echo e($data['field']); ?>" <?php if(isset($dataRow->add) && $dataRow->add): ?> checked="checked" <?php elseif($data['key'] == 'PRI'): ?><?php elseif($data['type'] == 'timestamp' && $data['field'] == 'created_at'): ?><?php elseif($data['type'] == 'timestamp' && $data['field'] == 'updated_at'): ?><?php elseif(!isset($dataRow->add)): ?> checked="checked" <?php endif; ?>>
                                            <label for="field_add_<?php echo e($data['field']); ?>"><?php echo e(__('voyager::generic.add')); ?></label><br/>
                                        <input type="checkbox"
                                               id="field_delete_<?php echo e($data['field']); ?>"
                                               name="field_delete_<?php echo e($data['field']); ?>" <?php if(isset($dataRow->delete) && $dataRow->delete): ?> checked="checked" <?php elseif($data['key'] == 'PRI'): ?><?php elseif($data['type'] == 'timestamp' && $data['field'] == 'updated_at'): ?><?php elseif(!isset($dataRow->delete)): ?> checked="checked" <?php endif; ?>>
                                                <label for="field_delete_<?php echo e($data['field']); ?>"><?php echo e(__('voyager::generic.delete')); ?></label><br/>
                                    </div>
                                    <div class="col-xs-2">
                                        <input type="hidden" name="field_<?php echo e($data['field']); ?>" value="<?php echo e($data['field']); ?>">
                                        <?php if($data['type'] == 'timestamp'): ?>
                                            <p><?php echo e(__('voyager::generic.timestamp')); ?></p>
                                            <input type="hidden" value="timestamp"
                                                   name="field_input_type_<?php echo e($data['field']); ?>">
                                        <?php else: ?>
                                            <select name="field_input_type_<?php echo e($data['field']); ?>">
                                                <?php $__currentLoopData = Voyager::formFields(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                    $selected = (isset($dataRow->type) && $formField->getCodename() == $dataRow->type) || (!isset($dataRow->type) && $formField->getCodename() == 'text');
                                                    ?>
                                                    <option value="<?php echo e($formField->getCodename()); ?>" <?php echo e($selected ? 'selected' : ''); ?>>
                                                        <?php echo e($formField->getName()); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xs-2">
                                        <?php if($isModelTranslatable): ?>
                                            <?php echo $__env->make('voyager::multilingual.input-hidden', [
                                                'isModelTranslatable' => true,
                                                '_field_name'         => 'field_display_name_' . $data['field'],
                                                '_field_trans' => $dataRow ? get_field_translations($dataRow, 'display_name') : json_encode([config('voyager.multilingual.default') => ucwords(str_replace('_', ' ', $data['field']))]),
                                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>
                                        <input type="text" class="form-control"
                                               value="<?php echo e($dataRow->display_name ?? ucwords(str_replace('_', ' ', $data['field']))); ?>"
                                               name="field_display_name_<?php echo e($data['field']); ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="alert alert-danger validation-error">
                                            <?php echo e(__('voyager::json.invalid')); ?>

                                        </div>
                                        <textarea id="json-input-<?php echo e(json_encode($data['field'])); ?>"
                                                  class="resizable-editor"
                                                  data-editor="json"
                                                  name="field_details_<?php echo e($data['field']); ?>">
                                            <?php echo e(json_encode(isset($dataRow->details) ? $dataRow->details : new class{})); ?>

                                        </textarea>
                                    </div>
                                </div>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(isset($dataTypeRelationships)): ?>
                                <?php $__currentLoopData = $dataTypeRelationships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('voyager::tools.bread.relationship-partial', $relationship, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            </div>

                        </div><!-- .panel-body -->
                        <div class="panel-footer">
                             <div class="btn btn-new-relationship"><i class="voyager-heart"></i> <span>
                             <?php echo e(__('voyager::database.relationship.create')); ?></span></div>
                        </div>
                    </div><!-- .panel -->

                    <button type="submit" class="btn pull-right btn-primary"><?php echo e(__('voyager::generic.submit')); ?></button>

                </form>
            </div><!-- .col-md-12 -->
        </div><!-- .row -->
    </div><!-- .page-content -->

<?php echo $__env->make('voyager::tools.bread.relationship-new-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <script>
        window.invalidEditors = [];
        var validationAlerts = $('.validation-error');
        validationAlerts.hide();
        $(function () {
            <?php if($isModelTranslatable): ?>
                /**
                 * Multilingual setup
                 */
                $('.side-body').multilingual({
                    "form":    'form',
                    "editing": true
                });
            <?php endif; ?>
            /**
             * Reorder items
             */
            reOrderItems();

            $('#bread-items').disableSelection();

            $('[data-toggle="tooltip"]').tooltip();

            $('.toggleswitch').bootstrapToggle();

            $('textarea[data-editor]').each(function () {
                var textarea = $(this),
                mode = textarea.data('editor'),
                editDiv = $('<div>').insertBefore(textarea),
                editor = ace.edit(editDiv[0]),
                _session = editor.getSession(),
                valid = false;
                textarea.hide();

                // Validate JSON
                _session.on("changeAnnotation", function(){
                    valid = _session.getAnnotations().length ? false : true;
                    if (!valid) {
                        if (window.invalidEditors.indexOf(textarea.attr('id')) < 0) {
                            window.invalidEditors.push(textarea.attr('id'));
                        }
                    } else {
                        for(var i = window.invalidEditors.length - 1; i >= 0; i--) {
                            if(window.invalidEditors[i] == textarea.attr('id')) {
                               window.invalidEditors.splice(i, 1);
                            }
                        }
                    }
                });

                // Use workers only when needed
                editor.on('focus', function () {
                    _session.setUseWorker(true);
                });
                editor.on('blur', function () {
                    if (valid) {
                        textarea.siblings('.validation-error').hide();
                        _session.setUseWorker(false);
                    } else {
                        textarea.siblings('.validation-error').show();
                    }
                });

                _session.setUseWorker(false);

                editor.setAutoScrollEditorIntoView(true);
                editor.$blockScrolling = Infinity;
                editor.setOption("maxLines", 30);
                editor.setOption("minLines", 4);
                editor.setOption("showLineNumbers", false);
                editor.setTheme("ace/theme/github");
                _session.setMode("ace/mode/json");
                if (textarea.val()) {
                    _session.setValue(JSON.stringify(JSON.parse(textarea.val()), null, 4));
                }

                _session.setMode("ace/mode/" + mode);

                // copy back to textarea on form submit...
                textarea.closest('form').on('submit', function (ev) {
                    if (window.invalidEditors.length) {
                        ev.preventDefault();
                        ev.stopPropagation();
                        validationAlerts.hide();
                        for (var i = window.invalidEditors.length - 1; i >= 0; i--) {
                            $('#'+window.invalidEditors[i]).siblings('.validation-error').show();
                        }
                        toastr.error('<?php echo e(__('voyager::json.invalid_message')); ?>', '<?php echo e(__('voyager::json.validation_errors')); ?>', {"preventDuplicates": true, "preventOpenDuplicates": true});
                    } else {
                        if (_session.getValue()) {
                            // uglify JSON object and update textarea for submit purposes
                            textarea.val(JSON.stringify(JSON.parse(_session.getValue())));
                        }else{
                            textarea.val('');
                        }
                    }
                });
            });

        });

        function reOrderItems(){
            $('#bread-items').sortable({
                handle: '.handler',
                update: function (e, ui) {
                    var _rows = $('#bread-items').find('.row_order'),
                        _size = _rows.length;

                    for (var i = 0; i < _size; i++) {
                        $(_rows[i]).val(i+1);
                    }
                },
                create: function (event, ui) {
                    sort();
                }
            });
        }

        function sort() {
            var sortableList = $('#bread-items');
            var listitems = $('div.row.row-dd', sortableList);

            listitems.sort(function (a, b) {
                return (parseInt($(a).find('.row_order').val()) > parseInt($(b).find('.row_order').val()))  ? 1 : -1;
            });
            sortableList.append(listitems);

        }

        /********** Relationship functionality **********/

        $(function () {
            $('.relationship_type').change(function(){
                $(this).parent().parent().find('.belongsToManyShow, .belongsToShow, .hasOneShow, .hasManyShow').hide();
                $(this).parent().parent().find('.' + $(this).val() + 'Show').show();
                // hasOneShow has a prepopulated select, only one between the following should be enabled
                $(this).parent().parent().find('.hasOneShow select').attr('disabled', true);
                $(this).parent().parent().find('.belongsToShow select').attr('disabled', false);

                if($(this).val() == 'belongsTo'){
                    $(this).parent().parent().find('.relationshipField').show();
                    $(this).parent().parent().find('.relationshipPivot').hide();
                    $(this).parent().parent().find('.relationship_taggable').hide();
                    $(this).parent().parent().find('.hasOneMany').removeClass('flexed');
                    $(this).parent().parent().find('.belongsTo').addClass('flexed');
                } else if($(this).val() == 'hasOne' || $(this).val() == 'hasMany'){
                    $(this).parent().parent().find('.relationshipField').show();
                    $(this).parent().parent().find('.relationshipPivot').hide();
                    $(this).parent().parent().find('.relationship_taggable').hide();
                    $(this).parent().parent().find('.hasOneMany').addClass('flexed');
                    $(this).parent().parent().find('.belongsTo').removeClass('flexed');
                    $(this).parent().parent().find('.hasOneShow select').attr('disabled', false);
                    $(this).parent().parent().find('.belongsToShow select').attr('disabled', true);
                } else {
                    $(this).parent().parent().find('.relationshipField').hide();
                    $(this).parent().parent().find('.relationshipPivot').css('display', 'flex');
                    $(this).parent().parent().find('.relationship_taggable').show();
                }
            }).trigger('change');

            $('.btn-new-relationship').click(function(){
                // Update table data
                $('#new_relationship_modal .relationship_table').trigger('change');

                $('#new_relationship_modal').modal('show');
            });

            relationshipTextDataBinding();

            $('.relationship_table').on('change', function(){
                populateRowsFromTable($(this));
            });

            $('.voyager-relationship-details-btn').click(function(){
                $(this).toggleClass('open');
                if($(this).hasClass('open')){
                    $(this).parent().parent().find('.voyager-relationship-details').slideDown();
                    populateRowsFromTable($(this).parent().parent().find('select.relationship_table'));
                } else {
                    $(this).parent().parent().find('.voyager-relationship-details').slideUp();
                }
            });

        });

        function populateRowsFromTable(dropdown){
            var tbl = dropdown.val();

            $.get('<?php echo e(route('voyager.database.index')); ?>/' + tbl, function(data){
                var tbl_selected = $(dropdown).val();

                $(dropdown).parent().parent().find('.rowDrop').each(function(){
                    var selected_value = $(this).data('selected');

                    var options = $.map(data, function (obj, key) {
                        return {id: key, text: key};
                    });

                    $(this).empty().select2({
                        data: options
                    });

                    if (selected_value == '' || !$(this).find("option[value='"+selected_value+"']").length) {
                        selected_value = $(this).find("option:first-child").val();
                    }

                    $(this).val(selected_value).trigger('change');
                });
            });
        }

        function relationshipTextDataBinding(){
            $('.relationship_display_name').bind('input', function() {
                $(this).parent().parent().parent().find('.label_relationship p').text($(this).val());
            });
            $('.relationship_table').on('change', function(){
                var tbl_selected_text = $(this).find('option:selected').text();
                $(this).parent().parent().find('.label_table_name').text(tbl_selected_text);
            });
            $('.relationship_table').each(function(){
                var tbl_selected_text = $(this).find('option:selected').text();
                $(this).parent().parent().find('.label_table_name').text(tbl_selected_text);
            });
        }

        /********** End Relationship Functionality **********/
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/bread/edit-add.blade.php ENDPATH**/ ?>