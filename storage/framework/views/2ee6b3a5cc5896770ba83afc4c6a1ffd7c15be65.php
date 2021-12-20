<?php $__env->startSection('css'); ?>

    <?php echo $__env->make('voyager::compass.includes.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="voyager-compass"></i>
        <p> <?php echo e(__('voyager::generic.compass')); ?></p>
        <span class="page-description"><?php echo e(__('voyager::compass.welcome')); ?></span>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div id="gradient_bg"></div>

    <div class="container-fluid">
        <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="page-content compass container-fluid">
        <ul class="nav nav-tabs">
          <li <?php if(empty($active_tab) || (isset($active_tab) && $active_tab == 'resources')): ?><?php echo 'class="active"'; ?><?php endif; ?>><a data-toggle="tab" href="#resources"><i class="voyager-book"></i> <?php echo e(__('voyager::compass.resources.title')); ?></a></li>
          <li <?php if($active_tab == 'commands'): ?><?php echo 'class="active"'; ?><?php endif; ?>><a data-toggle="tab" href="#commands"><i class="voyager-terminal"></i> <?php echo e(__('voyager::compass.commands.title')); ?></a></li>
          <li <?php if($active_tab == 'logs'): ?><?php echo 'class="active"'; ?><?php endif; ?>><a data-toggle="tab" href="#logs"><i class="voyager-logbook"></i> <?php echo e(__('voyager::compass.logs.title')); ?></a></li>
        </ul>

        <div class="tab-content">
            <div id="resources" class="tab-pane fade in <?php if(empty($active_tab) || (isset($active_tab) && $active_tab == 'resources')): ?><?php echo 'active'; ?><?php endif; ?>">
                <h3><i class="voyager-book"></i> <?php echo e(__('voyager::compass.resources.title')); ?> <small><?php echo e(__('voyager::compass.resources.text')); ?></small></h3>

                <div class="collapsible">
                    <div class="collapse-head" data-toggle="collapse" data-target="#links" aria-expanded="true" aria-controls="links">
                        <h4><?php echo e(__('voyager::compass.links.title')); ?></h4>
                        <i class="voyager-angle-down"></i>
                        <i class="voyager-angle-up"></i>
                    </div>
                    <div class="collapse-content collapse in" id="links">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="https://voyager-docs.devdojo.com/" target="_blank" class="voyager-link" style="background-image:url('<?php echo e(voyager_asset('images/compass/documentation.jpg')); ?>')">
                                    <span class="resource_label"><i class="voyager-documentation"></i> <span class="copy"><?php echo e(__('voyager::compass.links.documentation')); ?></span></span>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://voyager.devdojo.com/" target="_blank" class="voyager-link" style="background-image:url('<?php echo e(voyager_asset('images/compass/voyager-home.jpg')); ?>')">
                                    <span class="resource_label"><i class="voyager-browser"></i> <span class="copy"><?php echo e(__('voyager::compass.links.voyager_homepage')); ?></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
              </div>

              <div class="collapsible">

                <div class="collapse-head" data-toggle="collapse" data-target="#fonts" aria-expanded="true" aria-controls="fonts">
                    <h4><?php echo e(__('voyager::compass.fonts.title')); ?></h4>
                    <i class="voyager-angle-down"></i>
                    <i class="voyager-angle-up"></i>
                </div>

                <div class="collapse-content collapse in" id="fonts">

                    <?php echo $__env->make('voyager::compass.includes.fonts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </div>

              </div>
            </div>

          <div id="commands" class="tab-pane fade in <?php if($active_tab == 'commands'): ?><?php echo 'active'; ?><?php endif; ?>">
            <h3><i class="voyager-terminal"></i> <?php echo e(__('voyager::compass.commands.title')); ?> <small><?php echo e(__('voyager::compass.commands.text')); ?></small></h3>
            <div id="command_lists">
                <?php echo $__env->make('voyager::compass.includes.commands', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

          </div>
          <div id="logs" class="tab-pane fade in <?php if($active_tab == 'logs'): ?><?php echo 'active'; ?><?php endif; ?>">
            <div class="row">

                <?php echo $__env->make('voyager::compass.includes.logs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            </div>
          </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
    <script>
        $('document').ready(function(){
            $('.collapse-head').click(function(){
                var collapseContainer = $(this).parent();
                if(collapseContainer.find('.collapse-content').hasClass('in')){
                    collapseContainer.find('.voyager-angle-up').fadeOut('fast');
                    collapseContainer.find('.voyager-angle-down').fadeIn('slow');
                } else {
                    collapseContainer.find('.voyager-angle-down').fadeOut('fast');
                    collapseContainer.find('.voyager-angle-up').fadeIn('slow');
                }
            });
        });
    </script>
    <!-- JS for commands -->
    <script>

        $(document).ready(function(){
            $('.command').click(function(){
                $(this).find('.cmd_form').slideDown();
                $(this).addClass('more_args');
                $(this).find('input[type="text"]').focus();
            });

            $('.close-output').click(function(){
                $('#commands pre').slideUp();
            });
        });

    </script>

    <!-- JS for logs -->
    <script>
      $(document).ready(function () {
        $('.table-container tr').on('click', function () {
          $('#' + $(this).data('display')).toggle();
        });
        $('#table-log').DataTable({
          "order": [1, 'desc'],
          "stateSave": true,
          "language": <?php echo json_encode(__('voyager::datatable')); ?>,
          "stateSaveCallback": function (settings, data) {
            window.localStorage.setItem("datatable", JSON.stringify(data));
          },
          "stateLoadCallback": function (settings) {
            var data = JSON.parse(window.localStorage.getItem("datatable"));
            if (data) data.start = 0;
            return data;
          }
        });

        $('#delete-log, #delete-all-log').click(function () {
          return confirm('<?php echo e(__('voyager::generic.are_you_sure')); ?>');
        });
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/vendor/tcg/voyager/src/../resources/views/compass/index.blade.php ENDPATH**/ ?>