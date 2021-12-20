<!-- !!! Add form action below -->
<form role="form" action="<?php echo e(route('voyager.bread.relationship')); ?>" method="POST">
	<div class="modal fade modal-danger modal-relationships" id="new_relationship_modal">
		<div class="modal-dialog relationship-panel">
		    <div class="model-content">
		        <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal"
	                        aria-hidden="true">&times;</button>
	                <h4 class="modal-title"><i class="voyager-heart"></i> <?php echo e(\Illuminate\Support\Str::singular(ucfirst($table))); ?>

					<?php echo e(__('voyager::database.relationship.relationships')); ?> </h4>
	            </div>

		        <div class="modal-body">
			        <div class="row">

			        	<?php if(isset($dataType->id)): ?>
				            <div class="col-md-12 relationship_details">
				                <p class="relationship_table_select"><?php echo e(\Illuminate\Support\Str::singular(ucfirst($table))); ?></p>
				                <select class="relationship_type select2" name="relationship_type">
				                    <option value="hasOne" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'hasOne'): ?> selected="selected" <?php endif; ?>><?php echo e(__('voyager::database.relationship.has_one')); ?></option>
				                    <option value="hasMany" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'hasMany'): ?> selected="selected" <?php endif; ?>><?php echo e(__('voyager::database.relationship.has_many')); ?></option>
				                    <option value="belongsTo" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'belongsTo'): ?> selected="selected" <?php endif; ?>><?php echo e(__('voyager::database.relationship.belongs_to')); ?></option>
				                    <option value="belongsToMany" <?php if(isset($relationshipDetails->type) && $relationshipDetails->type == 'belongsToMany'): ?> selected="selected" <?php endif; ?>><?php echo e(__('voyager::database.relationship.belongs_to_many')); ?></option>
				                </select>
				                <select class="relationship_table select2" name="relationship_table">
				                    <?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        <option value="<?php echo e($tbl); ?>" <?php if(isset($relationshipDetails->table) && $relationshipDetails->table == $tbl): ?> selected="selected" <?php endif; ?>><?php echo e(\Illuminate\Support\Str::singular(ucfirst($tbl))); ?></option>
				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                </select>
				                <span><input type="text" class="form-control" name="relationship_model" placeholder="<?php echo e(__('voyager::database.relationship.namespace')); ?>" value="<?php echo e($relationshipDetails->model ?? ''); ?>"></span>
				            </div>
				            <div class="col-md-12 relationship_details relationshipField">
				            	<div class="belongsTo">
				            		<label><?php echo e(__('voyager::database.relationship.which_column_from')); ?> <span><?php echo e(\Illuminate\Support\Str::singular(ucfirst($table))); ?></span> <?php echo e(__('voyager::database.relationship.is_used_to_reference')); ?> <span class="label_table_name"></span>?</label>
				            		<select name="relationship_column_belongs_to" class="new_relationship_field select2">
				                    	<?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        	<option value="<?php echo e($data['field']); ?>"><?php echo e($data['field']); ?></option>
				                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				               		</select>
				               	</div>
				               	<div class="hasOneMany flexed">
				            		<label><?php echo e(__('voyager::database.relationship.which_column_from')); ?> <span class="label_table_name"></span> <?php echo e(__('voyager::database.relationship.is_used_to_reference')); ?> <span><?php echo e(\Illuminate\Support\Str::singular(ucfirst($table))); ?></span>?</label>
					                <select name="relationship_column" class="new_relationship_field select2 rowDrop" data-table="<?php echo e($tables[0]); ?>" data-selected="">
					                </select>
					            </div>
				            </div>
				            <div class="col-md-12 relationship_details relationshipPivot">
				            	<label><?php echo e(__('voyager::database.relationship.pivot_table')); ?>:</label>
				            	<select name="relationship_pivot" class="select2">
		                        	<?php $__currentLoopData = $tables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                        <option value="<?php echo e($tbl); ?>" <?php if(isset($relationshipDetails->table) && $relationshipDetails->table == $tbl): ?> selected="selected" <?php endif; ?>><?php echo e(\Illuminate\Support\Str::singular(ucfirst($tbl))); ?></option>
				                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		                        </select>
				            </div>
				            <div class="col-md-12 relationship_details_more">
				                <div class="well">
				                    <label><?php echo e(__('voyager::database.relationship.selection_details')); ?></label>
				                    <p><strong><?php echo e(__('voyager::database.relationship.display_the')); ?> <span class="label_table_name"></span>: </strong>
				                        <select name="relationship_label" class="rowDrop select2" data-table="<?php echo e($tables[0]); ?>" data-selected="" style="width: 100%">
				                        </select>
				                    </p>
									<p class="relationship_key belongsToShow belongsToManyShow"><strong><?php echo e(__('voyager::database.relationship.store_the')); ?>

                                        <span class="label_table_name"></span>: </strong>
				                        <select name="relationship_key" class="rowDrop select2" data-table="<?php echo e($tables[0]); ?>" data-selected="" style="width: 100%">
				                        </select>
									</p>
                                    <p class="relationship_key hasOneShow hasManyShow"><strong><?php echo e(__('voyager::database.relationship.store_the')); ?>

                                        <span><?php echo e(\Illuminate\Support\Str::singular(ucfirst($table))); ?></span>: </strong>
                                        <select name="relationship_key" class="select2" style="width: 100%">
                                            <?php $__currentLoopData = $fieldOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($data['field']); ?>"><?php echo e($data['field']); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </p>
									<p class="relationship_taggable"><strong><?php echo e(__('voyager::database.relationship.allow_tagging')); ?>:</strong> <br>
										<input type="checkbox" name="relationship_taggable" class="toggleswitch" data-on="<?php echo e(__('voyager::generic.yes')); ?>" data-off="<?php echo e(__('voyager::generic.no')); ?>">
				                    </p>
				                </div>
							</div>
				        <?php else: ?>
				        	<div class="col-md-12">
				        		<h5><i class="voyager-rum-1"></i> <?php echo e(__('voyager::database.relationship.easy_there')); ?></h5>
				        		<p class="relationship-warn"><?php echo __('voyager::database.relationship.before_create'); ?></p>
				        	</div>
				        <?php endif; ?>

			        </div>
			    </div>
			    <div class="modal-footer">
			    	<div class="relationship-btn-container">
			    		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager::database.relationship.cancel')); ?></button>
	                    <?php if(isset($dataType->id)): ?>
	                    	<button class="btn btn-danger btn-relationship"><i class="voyager-plus"></i> <span><?php echo e(__('voyager::database.relationship.add_new')); ?></span></button>
	                	<?php endif; ?>
	                </div>
			    </div>
		    </div>
		</div>
	</div>
	<input type="hidden" value="<?php echo e($dataType->id ?? ''); ?>" name="data_type_id">
	<?php echo e(csrf_field()); ?>

</form>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/tools/bread/relationship-new-modal.blade.php ENDPATH**/ ?>