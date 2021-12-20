<?php if(is_field_translatable($dataTypeContent, $row)): ?>
    <span class="language-label js-language-label"></span>
    <input type="hidden"
           data-i18n="true"
           name="<?php echo e($row->field); ?>_i18n"
           id="<?php echo e($row->field); ?>_i18n"
           <?php if(!empty(session()->getOldInput($row->field.'_i18n') && is_null($dataTypeContent->id))): ?>
             value="<?php echo e(session()->getOldInput($row->field.'_i18n')); ?>"
           <?php else: ?>
             value="<?php echo e(get_field_translations($dataTypeContent, $row->field)); ?>"
           <?php endif; ?>>
<?php endif; ?>
<?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/multilingual/input-hidden-bread-edit-add.blade.php ENDPATH**/ ?>