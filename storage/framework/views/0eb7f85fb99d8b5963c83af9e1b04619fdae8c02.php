

<?php $__env->startSection('css_before'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('js/plugins/slick-carousel/slick.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('js/plugins/slick-carousel/slick-theme.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_after'); ?>
  <!-- jQuery (required for Slick Slider plugin) -->
  <script src="<?php echo e(asset('js/lib/jquery.min.js')); ?>"></script>

  <!-- Page JS Plugins -->
  <script src="<?php echo e(asset('js/plugins/slick-carousel/slick.min.js')); ?>"></script>

  <!-- Page JS Helpers (Slick Slider Plugin) -->
  <script>
    One.helpersOnLoad(['jq-slick']);
  </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Slick Slider Example
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Plugin Integration
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="javascript:void(0)">Examples</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Slick Slider
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <!-- Page Content -->
  <div class="content">
    <div class="row flex-md-row-reverse">
      <div class="col-md-6">
        <!-- Info -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Plugin Example</h3>
          </div>
          <div class="block-content fs-sm text-muted">
            <p>
              This page showcases how easily you can add a plugin’s JS/CSS assets and init it using a OneUI JS helper.
            </p>
          </div>
        </div>
        <!-- END Info -->
      </div>
      <div class="col-md-6">
        <!-- Slider with dots -->
        <div class="block block-rounded">
          <div class="block-header block-header-default">
            <h3 class="block-title">Dots</h3>
          </div>
          <div class="block-content">
            <div class="js-slider" data-dots="true">
              <div>
                <img class="img-fluid" src="<?php echo e(asset('media/photos/photo27@2x.jpg')); ?>" alt="photo">
              </div>
              <div>
                <img class="img-fluid" src="<?php echo e(asset('media/photos/photo28@2x.jpg')); ?>" alt="photo">
              </div>
              <div>
                <img class="img-fluid" src="<?php echo e(asset('media/photos/photo29@2x.jpg')); ?>" alt="photo">
              </div>
            </div>
          </div>
          <!-- END Slider with dots -->
        </div>
        <!-- END Dots -->
      </div>
    </div>
  </div>
  <!-- END Page Content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anas/PROJECT/resources/views/pages/slick.blade.php ENDPATH**/ ?>