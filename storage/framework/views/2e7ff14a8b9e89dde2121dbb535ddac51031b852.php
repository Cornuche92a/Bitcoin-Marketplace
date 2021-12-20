<?php $__env->startSection('page_title', __('voyager::generic.menu_builder')); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-list"></i><?php echo e(__('voyager::generic.menu_builder')); ?> (<?php echo e($menu->name); ?>)
        <div class="btn btn-success add_item"><i class="voyager-plus"></i> <?php echo e(__('voyager::menu_builder.new_menu_item')); ?></div>
    </h1>
    <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('voyager::menus.partial.notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-heading">
                        <p class="panel-title" style="color:#777"><?php echo e(__('voyager::menu_builder.drag_drop_info')); ?></p>
                    </div>

                    <div class="panel-body" style="padding:30px;">
                        <div class="dd">
                            <?php echo menu($menu->name, 'admin', ['isModelTranslatable' => $isModelTranslatable]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> <?php echo e(__('voyager::menu_builder.delete_item_question')); ?></h4>
                </div>
                <div class="modal-footer">
                    <form action="<?php echo e(route('voyager.menus.item.destroy', ['menu' => $menu->id, 'id' => '__id'])); ?>"
                          id="delete_form"
                          method="POST">
                        <?php echo e(method_field("DELETE")); ?>

                        <?php echo e(csrf_field()); ?>

                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="<?php echo e(__('voyager::menu_builder.delete_item_confirm')); ?>">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal modal-info fade" tabindex="-1" id="menu_item_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo e(__('voyager::generic.close')); ?>"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 id="m_hd_add" class="modal-title hidden"><i class="voyager-plus"></i> <?php echo e(__('voyager::menu_builder.create_new_item')); ?></h4>
                    <h4 id="m_hd_edit" class="modal-title hidden"><i class="voyager-edit"></i> <?php echo e(__('voyager::menu_builder.edit_item')); ?></h4>
                </div>
                <form action="" id="m_form" method="POST"
                      data-action-add="<?php echo e(route('voyager.menus.item.add', ['menu' => $menu->id])); ?>"
                      data-action-update="<?php echo e(route('voyager.menus.item.update', ['menu' => $menu->id])); ?>">

                    <input id="m_form_method" type="hidden" name="_method" value="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="modal-body">
                        <div>
                            <?php echo $__env->make('voyager::multilingual.language-selector', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <label for="name"><?php echo e(__('voyager::menu_builder.item_title')); ?></label>
                            <?php echo $__env->make('voyager::multilingual.input-hidden', ['_field_name' => 'title', '_field_trans' => ''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <input type="text" class="form-control" id="m_title" name="title" placeholder="<?php echo e(__('voyager::generic.title')); ?>"><br>
                        </div>
                        <label for="type"><?php echo e(__('voyager::menu_builder.link_type')); ?></label>
                        <select id="m_link_type" class="form-control" name="type">
                            <option value="url" selected="selected"><?php echo e(__('voyager::menu_builder.static_url')); ?></option>
                            <option value="route"><?php echo e(__('voyager::menu_builder.dynamic_route')); ?></option>
                        </select><br>
                        <div id="m_url_type">
                            <label for="url"><?php echo e(__('voyager::menu_builder.url')); ?></label>
                            <input type="text" class="form-control" id="m_url" name="url" placeholder="<?php echo e(__('voyager::generic.url')); ?>"><br>
                        </div>
                        <div id="m_route_type">
                            <label for="route"><?php echo e(__('voyager::menu_builder.item_route')); ?></label>
                            <input type="text" class="form-control" id="m_route" name="route" placeholder="<?php echo e(__('voyager::generic.route')); ?>"><br>
                            <label for="parameters"><?php echo e(__('voyager::menu_builder.route_parameter')); ?></label>
                            <textarea rows="3" class="form-control" id="m_parameters" name="parameters" placeholder="<?php echo e(json_encode(['key' => 'value'], JSON_PRETTY_PRINT)); ?>"></textarea><br>
                        </div>
                        <label for="icon_class"><?php echo e(__('voyager::menu_builder.icon_class')); ?> <a
                                    href="<?php echo e(route('voyager.compass.index')); ?>#fonts"
                                    target="_blank"><?php echo __('voyager::menu_builder.icon_class2'); ?></label>
                        <input type="text" class="form-control" id="m_icon_class" name="icon_class"
                               placeholder="<?php echo e(__('voyager::menu_builder.icon_class_ph')); ?>"><br>
                        <label for="color"><?php echo e(__('voyager::menu_builder.color')); ?></label>
                        <input type="color" class="form-control" id="m_color" name="color"
                               placeholder="<?php echo e(__('voyager::menu_builder.color_ph')); ?>"><br>
                        <label for="target"><?php echo e(__('voyager::menu_builder.open_in')); ?></label>
                        <select id="m_target" class="form-control" name="target">
                            <option value="_self" selected="selected"><?php echo e(__('voyager::menu_builder.open_same')); ?></option>
                            <option value="_blank"><?php echo e(__('voyager::menu_builder.open_new')); ?></option>
                        </select>
                        <input type="hidden" name="menu_id" value="<?php echo e($menu->id); ?>">
                        <input type="hidden" name="id" id="m_id" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-success pull-right delete-confirm__" value="<?php echo e(__('voyager::generic.update')); ?>">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal"><?php echo e(__('voyager::generic.cancel')); ?></button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->




<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

    <script>
        $(document).ready(function () {
            <?php if($isModelTranslatable): ?>
                /**
                 * Multilingual setup for main page
                 */
                $('.side-body').multilingual({
                    "transInputs": '.dd-list input[data-i18n=true]'
                });

                /**
                 * Multilingual for Add/Edit Menu
                 */
                $('#menu_item_modal').multilingual({
                    "form":          'form',
                    "transInputs":   '#menu_item_modal input[data-i18n=true]',
                    "langSelectors": '.language-selector input',
                    "editing":       true
                });
            <?php endif; ?>


            $('.dd').nestable({
                expandBtnHTML: '',
                collapseBtnHTML: ''
            });


            /**
             * Set Variables
             */
            var $m_modal       = $('#menu_item_modal'),
                $m_hd_add      = $('#m_hd_add').hide().removeClass('hidden'),
                $m_hd_edit     = $('#m_hd_edit').hide().removeClass('hidden'),
                $m_form        = $('#m_form'),
                $m_form_method = $('#m_form_method'),
                $m_title       = $('#m_title'),
                $m_title_i18n  = $('#title_i18n'),
                $m_url_type    = $('#m_url_type'),
                $m_url         = $('#m_url'),
                $m_link_type   = $('#m_link_type'),
                $m_route_type  = $('#m_route_type'),
                $m_route       = $('#m_route'),
                $m_parameters  = $('#m_parameters'),
                $m_icon_class  = $('#m_icon_class'),
                $m_color       = $('#m_color'),
                $m_target      = $('#m_target'),
                $m_id          = $('#m_id');

            /**
             * Add Menu
             */
            $('.add_item').click(function() {
                $m_form.trigger('reset');
                $m_form.find("input[type=submit]").val('<?php echo e(__('voyager::generic.add')); ?>');
                $m_modal.modal('show', {data: null});
            });

            /**
             * Edit Menu
             */
            $('.item_actions').on('click', '.edit', function (e) {
                $m_form.find("input[type=submit]").val('<?php echo e(__('voyager::generic.update')); ?>');
                $m_modal.modal('show', {data: $(e.currentTarget)});
            });

            /**
             * Menu Modal is Open
             */
            $m_modal.on('show.bs.modal', function(e, data) {
                var _adding      = e.relatedTarget.data ? false : true,
                    translatable = $m_modal.data('multilingual'),
                    $_str_i18n   = '';

                if (_adding) {
                    $m_form.attr('action', $m_form.data('action-add'));
                    $m_form_method.val('POST');
                    $m_hd_add.show();
                    $m_hd_edit.hide();
                    $m_target.val('_self').change();
                    $m_link_type.val('url').change();
                    $m_url.val('');
                    $m_icon_class.val('');

                } else {
                    $m_form.attr('action', $m_form.data('action-update'));
                    $m_form_method.val('PUT');
                    $m_hd_add.hide();
                    $m_hd_edit.show();

                    var _src = e.relatedTarget.data, // the source
                        id   = _src.data('id');

                    $m_title.val(_src.data('title'));
                    $m_url.val(_src.data('url'));
                    $m_route.val(_src.data('route'));
                    $m_parameters.val(JSON.stringify(_src.data('parameters')));
                    $m_icon_class.val(_src.data('icon_class'));
                    $m_color.val(_src.data('color'));
                    $m_id.val(id);

                    if(translatable){
                        $_str_i18n = $("#title" + id + "_i18n").val();
                    }

                    if (_src.data('target') == '_self') {
                        $m_target.val('_self').change();
                    } else if (_src.data('target') == '_blank') {
                        $m_target.find("option[value='_self']").removeAttr('selected');
                        $m_target.find("option[value='_blank']").attr('selected', 'selected');
                        $m_target.val('_blank');
                    }
                    if (_src.data('route') != "") {
                        $m_link_type.val('route').change();
                        $m_url_type.hide();
                    } else {
                        $m_link_type.val('url').change();
                        $m_route_type.hide();
                    }
                    if ($m_link_type.val() == 'route') {
                        $m_url_type.hide();
                        $m_route_type.show();
                    } else {
                        $m_route_type.hide();
                        $m_url_type.show();
                    }
                }

                if (translatable) {
                    $m_title_i18n.val($_str_i18n);
                    translatable.refresh();
                }
            });


            /**
             * Toggle Form Menu Type
             */
            $m_link_type.on('change', function (e) {
                if ($m_link_type.val() == 'route') {
                    $m_url_type.hide();
                    $m_route_type.show();
                } else {
                    $m_url_type.show();
                    $m_route_type.hide();
                }
            });


            /**
             * Delete menu item
             */
            $('.item_actions').on('click', '.delete', function (e) {
                id = $(e.currentTarget).data('id');
                $('#delete_form')[0].action = '<?php echo e(route('voyager.menus.item.destroy', ['menu' => $menu->id, 'id' => '__id'])); ?>'.replace('__id', id);
                $('#delete_modal').modal('show');
            });


            /**
             * Reorder items
             */
            $('.dd').on('change', function (e) {
                $.post('<?php echo e(route('voyager.menus.order_item',['menu' => $menu->id])); ?>', {
                    order: JSON.stringify($('.dd').nestable('serialize')),
                    _token: '<?php echo e(csrf_token()); ?>'
                }, function (data) {
                    toastr.success("<?php echo e(__('voyager::menu_builder.updated_order')); ?>");
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/menus/builder.blade.php ENDPATH**/ ?>