<?php if(isset($options->model) && isset($options->type)): ?>

    <?php if(class_exists($options->model)): ?>

        <?php $relationshipField = $row->field; ?>

        <?php if($options->type == 'belongsTo'): ?>

            <?php if(isset($view) && ($view == 'browse' || $view == 'read')): ?>

                <?php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);
                    $query = $model::where($options->key,$relationshipData->{$options->column})->first();
                ?>

                <?php if(isset($query)): ?>
                    <p><?php echo e($query->{$options->label}); ?></p>
                <?php else: ?>
                    <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                <?php endif; ?>

            <?php else: ?>

                <select
                    class="form-control select2-ajax" name="<?php echo e($options->column); ?>"
                    data-get-items-route="<?php echo e(route('voyager.' . $dataType->slug.'.relation')); ?>"
                    data-get-items-field="<?php echo e($row->field); ?>"
                    <?php if(!is_null($dataTypeContent->getKey())): ?> data-id="<?php echo e($dataTypeContent->getKey()); ?>" <?php endif; ?>
                    data-method="<?php echo e(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add'); ?>"
                    <?php if($row->required == 1): ?> required <?php endif; ?>
                >
                    <?php
                        $model = app($options->model);
                        $query = $model::where($options->key, old($options->column, $dataTypeContent->{$options->column}))->get();
                    ?>

                    <?php if(!$row->required): ?>
                        <option value=""><?php echo e(__('voyager::generic.none')); ?></option>
                    <?php endif; ?>

                    <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relationshipData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($relationshipData->{$options->key}); ?>" <?php if(old($options->column, $dataTypeContent->{$options->column}) == $relationshipData->{$options->key}): ?> selected="selected" <?php endif; ?>><?php echo e($relationshipData->{$options->label}); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            <?php endif; ?>

        <?php elseif($options->type == 'hasOne'): ?>

            <?php
                $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                $model = app($options->model);
                $query = $model::where($options->column, '=', $relationshipData->{$options->key})->first();

            ?>

            <?php if(isset($query)): ?>
                <p><?php echo e($query->{$options->label}); ?></p>
            <?php else: ?>
                <p><?php echo e(__('voyager::generic.no_results')); ?></p>
            <?php endif; ?>

        <?php elseif($options->type == 'hasMany'): ?>

            <?php if(isset($view) && ($view == 'browse' || $view == 'read')): ?>

                <?php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;
                    $model = app($options->model);

                    $selected_values = $model::where($options->column, '=', $relationshipData->{$options->key})->get()->map(function ($item, $key) use ($options) {
                        return $item->{$options->label};
                    })->all();
                ?>

                <?php if($view == 'browse'): ?>
                    <?php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    ?>
                    <?php if(empty($selected_values)): ?>
                        <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                    <?php else: ?>
                        <p><?php echo e($string_values); ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(empty($selected_values)): ?>
                        <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                    <?php else: ?>
                        <ul>
                            <?php $__currentLoopData = $selected_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($selected_value); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>

            <?php else: ?>

                <?php
                    $model = app($options->model);
                    $query = $model::where($options->column, '=', $dataTypeContent->{$options->key})->get();
                ?>

                <?php if(isset($query)): ?>
                    <ul>
                        <?php $__currentLoopData = $query; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $query_res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($query_res->{$options->label}); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>

                <?php else: ?>
                    <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                <?php endif; ?>

            <?php endif; ?>

        <?php elseif($options->type == 'belongsToMany'): ?>

            <?php if(isset($view) && ($view == 'browse' || $view == 'read')): ?>

                <?php
                    $relationshipData = (isset($data)) ? $data : $dataTypeContent;

                    $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table, $options->foreign_pivot_key ?? null, $options->related_pivot_key ?? null, $options->parent_key ?? null, $options->key)->get()->map(function ($item, $key) use ($options) {
            			return $item->{$options->label};
            		})->all() : array();
                ?>

                <?php if($view == 'browse'): ?>
                    <?php
                        $string_values = implode(", ", $selected_values);
                        if(mb_strlen($string_values) > 25){ $string_values = mb_substr($string_values, 0, 25) . '...'; }
                    ?>
                    <?php if(empty($selected_values)): ?>
                        <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                    <?php else: ?>
                        <p><?php echo e($string_values); ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(empty($selected_values)): ?>
                        <p><?php echo e(__('voyager::generic.no_results')); ?></p>
                    <?php else: ?>
                        <ul>
                            <?php $__currentLoopData = $selected_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($selected_value); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>

            <?php else: ?>
                <select
                    class="form-control select2-ajax <?php if(isset($options->taggable) && $options->taggable === 'on'): ?> taggable <?php endif; ?>"
                    name="<?php echo e($relationshipField); ?>[]" multiple
                    data-get-items-route="<?php echo e(route('voyager.' . $dataType->slug.'.relation')); ?>"
                    data-get-items-field="<?php echo e($row->field); ?>"
                    <?php if(!is_null($dataTypeContent->getKey())): ?> data-id="<?php echo e($dataTypeContent->getKey()); ?>" <?php endif; ?>
                    data-method="<?php echo e(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add'); ?>"
                    <?php if(isset($options->taggable) && $options->taggable === 'on'): ?>
                        data-route="<?php echo e(route('voyager.'.\Illuminate\Support\Str::slug($options->table).'.store')); ?>"
                        data-label="<?php echo e($options->label); ?>"
                        data-error-message="<?php echo e(__('voyager::bread.error_tagging')); ?>"
                    <?php endif; ?>
                    <?php if($row->required == 1): ?> required <?php endif; ?>
                >

                        <?php
                            $selected_keys = [];
                            
                            if (!is_null($dataTypeContent->getKey())) {
                                $selected_keys = $dataTypeContent->belongsToMany(
                                    $options->model,
                                    $options->pivot_table,
                                    $options->foreign_pivot_key ?? null,
                                    $options->related_pivot_key ?? null,
                                    $options->parent_key ?? null,
                                    $options->key
                                )->pluck($options->table.'.'.$options->key);
                            }
                            $selected_keys = old($relationshipField, $selected_keys);
                            $selected_values = app($options->model)->whereIn($options->key, $selected_keys)->pluck($options->label, $options->key);
                        ?>

                        <?php if(!$row->required): ?>
                            <option value=""><?php echo e(__('voyager::generic.none')); ?></option>
                        <?php endif; ?>

                        <?php $__currentLoopData = $selected_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" selected="selected"><?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

            <?php endif; ?>

        <?php endif; ?>

    <?php else: ?>

        cannot make relationship because <?php echo e($options->model); ?> does not exist.

    <?php endif; ?>

<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/formfields/relationship.blade.php ENDPATH**/ ?>