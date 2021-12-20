<?php if(isset($options->relationship)): ?>

    
    <?php if( !method_exists( $dataType->model_name, \Illuminate\Support\Str::camel($row->field) ) ): ?>
        <p class="label label-warning"><i class="voyager-warning"></i> <?php echo e(__('voyager::form.field_select_dd_relationship', ['method' => \Illuminate\Support\Str::camel($row->field).'()', 'class' => $dataType->model_name])); ?></p>
    <?php endif; ?>

    <?php if( method_exists( $dataType->model_name, \Illuminate\Support\Str::camel($row->field) ) ): ?>
        <?php if(isset($dataTypeContent->{$row->field}) && !is_null(old($row->field, $dataTypeContent->{$row->field}))): ?>
            <?php $selected_value = old($row->field, $dataTypeContent->{$row->field}); ?>
        <?php else: ?>
            <?php $selected_value = old($row->field); ?>
        <?php endif; ?>

        <select class="form-control select2" name="<?php echo e($row->field); ?>">
            <?php $default = (isset($options->default) && !isset($dataTypeContent->{$row->field})) ? $options->default : null; ?>

            <?php if(isset($options->options)): ?>
                <optgroup label="<?php echo e(__('voyager::generic.custom')); ?>">
                <?php $__currentLoopData = $options->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e(($key == '_empty_' ? '' : $key)); ?>" <?php if($default == $key && $selected_value === NULL): ?> selected="selected" <?php endif; ?> <?php if((string)$selected_value == (string)$key): ?> selected="selected" <?php endif; ?>><?php echo e($option); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </optgroup>
            <?php endif; ?>
            
            <?php
            $relationshipListMethod = \Illuminate\Support\Str::camel($row->field) . 'List';
            if (method_exists($dataTypeContent, $relationshipListMethod)) {
                $relationshipOptions = $dataTypeContent->$relationshipListMethod();
            } else {
                $relationshipClass = $dataTypeContent->{\Illuminate\Support\Str::camel($row->field)}()->getRelated();
                if (isset($options->relationship->where)) {
                    $relationshipOptions = $relationshipClass::where(
                        $options->relationship->where[0],
                        $options->relationship->where[1]
                    )->get();
                } else {
                    $relationshipOptions = $relationshipClass::all();
                }
            }

            // Try to get default value for the relationship
            // when default is a callable function (ClassName@methodName)
            if ($default != null) {
                $comps = explode('@', $default);
                if (count($comps) == 2 && method_exists($comps[0], $comps[1])) {
                    $default = call_user_func([$comps[0], $comps[1]]);
                }
            }
            ?>

            <optgroup label="<?php echo e(__('voyager::database.relationship.relationship')); ?>">
            <?php $__currentLoopData = $relationshipOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationshipOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($relationshipOption->{$options->relationship->key}); ?>" <?php if($default == $relationshipOption->{$options->relationship->key} && $selected_value === NULL): ?> selected="selected" <?php endif; ?> <?php if($selected_value == $relationshipOption->{$options->relationship->key}): ?> selected="selected" <?php endif; ?>><?php echo e($relationshipOption->{$options->relationship->label}); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </optgroup>
        </select>
    <?php else: ?>
        <select class="form-control select2" name="<?php echo e($row->field); ?>"></select>
    <?php endif; ?>
<?php else: ?>
    <?php $selected_value = (isset($dataTypeContent->{$row->field}) && !is_null(old($row->field, $dataTypeContent->{$row->field}))) ? old($row->field, $dataTypeContent->{$row->field}) : old($row->field); ?>
    <select class="form-control select2" name="<?php echo e($row->field); ?>">
        <?php $default = (isset($options->default) && !isset($dataTypeContent->{$row->field})) ? $options->default : null; ?>
        <?php if(isset($options->options)): ?>
            <?php $__currentLoopData = $options->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($key); ?>" <?php if($default == $key && $selected_value === NULL): ?> selected="selected" <?php endif; ?> <?php if($selected_value == $key): ?> selected="selected" <?php endif; ?>><?php echo e($option); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </select>
<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/formfields/select_dropdown.blade.php ENDPATH**/ ?>