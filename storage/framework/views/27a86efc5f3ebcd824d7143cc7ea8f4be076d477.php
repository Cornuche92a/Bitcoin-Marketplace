<?php $notifications = \App\Models\notification::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->limit('6')->get(); ?>
<?php
    if(\App\Models\Payment::where(['user_id' => auth()->user()->id, 'paid' => 0])->exists()){

        \App\Http\Controllers\PaymentController::check();
    }


?>

    <!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>TheSpot - <?php echo e($pagename); ?></title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Icons -->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/media/favicons/favicon.png')); ?>">
    <link rel="icon" sizes="192x192" type="image/png" href="<?php echo e(asset('assets/media/favicons/favicon-192x192.png')); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/media/favicons/apple-touch-icon-180x180.png')); ?>">

    <!-- Fonts and Styles -->
    <?php echo $__env->yieldContent('css_before'); ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="<?php echo e(asset('assets/css/oneui.css')); ?>">

    <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
<?php echo $__env->yieldContent('css_after'); ?>

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>;
    </script>
</head>

<body <?php if(session('status')): ?> onload="One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: '<?php echo e(session('status')); ?>'})"<?php endif; ?>  <?php if(session('success')): ?> onload="One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: '<?php echo e(session('success')); ?>'})"<?php endif; ?> <?php if(session('error')): ?> onload="One.helpers('jq-notify', {type: 'danger', icon: 'fa fa-times me-1', message: '<?php echo e(session('error')); ?>'})"<?php endif; ?> <?php if(session('sent')): ?> onload="new bootstrap.Toast(document.getElementById('messagesent')).show();" <?php endif; ?> <?php if(session('unsent')): ?> onload="new bootstrap.Toast(document.getElementById('messageunsent')).show();" <?php endif; ?> <?php if(session('paid')): ?> onload="new bootstrap.Toast(document.getElementById('paid')).show();" <?php endif; ?> <?php if(session('unpaid')): ?> onload="new bootstrap.Toast(document.getElementById('unpaid')).show();" <?php endif; ?>>

<div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-dark dark-mode main-content-narrow">
    <aside id="side-overlay" class="fs-sm">
        <div class="content-header border-bottom">
            <a class="img-link me-1" href="javascript:void(0)">

                <img class="img-avatar img-avatar32" src="<?php echo e(asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar)); ?>" alt="">
            </a>

            <!-- User Info -->
            <div class="ms-2">
                <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">John Smith</a>
            </div>
            <!-- END User Info -->

            <!-- Close Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Side Overlay -->
        </div>
        <!-- END Side Header -->

        <!-- Side Content -->
        <div class="content-side">
            <p>
                Content..
            </p>
        </div>
        <!-- END Side Content -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header">
            <!-- Logo -->

<a class="font-semibold text-dual" href="/">
                          <img src="<?php echo e(asset('assets/media/logo.png')); ?>" style="width: 230px; position: static;">

                    </a>


            <!-- END Logo -->

            <!-- Extra -->
            <div>


                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side">

                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link<?php echo e(request()->is('dashboard') ? ' active' : ''); ?>" href="/dashboard">
                            <i class="nav-main-link-icon si si-speedometer"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">ABONNEMENTS</li>
                    <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon si si-layers"></i>
                            <span class="nav-main-link-name">Streaming</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('shop/Vidéo') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Vidéo'])); ?>">
                                    <i class="nav-main-link-icon fa fa-video"></i><span class="nav-main-link-name">Vidéo</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('shop/Audio') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Audio'])); ?>">
                                    <i class="nav-main-link-icon si si-music-tone-alt"></i><span class="nav-main-link-name">Musique</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item<?php echo e(request()->is('pages/*') ? ' open' : ''); ?>">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                            <i class="nav-main-link-icon si si-lock"></i>
                            <span class="nav-main-link-name">Sécurité</span>
                        </a>
                        <ul class="nav-main-submenu">
                            <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('shop/VPN') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'VPN'])); ?>">
                                    <i class="nav-main-link-icon fa fa-user-secret"></i><span class="nav-main-link-name">VPN</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link<?php echo e(request()->is('shop/Antivirus') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Antivirus'])); ?>">
                                    <i class="nav-main-link-icon fa fa-bug"></i><span class="nav-main-link-name">Antivirus</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Gaming') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Gaming'])); ?>">
                            <i class="nav-main-link-icon si si-game-controller"></i>
                            <span class="nav-main-link-name">Gaming</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Cloud') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Cloud'])); ?>">
                            <i class="nav-main-link-icon fa fa-cloud"></i>
                            <span class="nav-main-link-name">Cloud</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Presse') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Presse'])); ?>">
                            <i class="nav-main-link-icon far fa-newspaper"></i>
                            <span class="nav-main-link-name">Presse</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Bibliothèque') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Bibliothèque'])); ?>">
                            <i class="nav-main-link-icon si si-book-open"></i>
                            <span class="nav-main-link-name">Bibliothèque</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Magazine') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Magazine'])); ?>">
                            <i class="nav-main-link-icon fa fa-pager"></i>
                            <span class="nav-main-link-name">Magazine</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Apprentissage') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Apprentissage'])); ?>">
                            <i class="nav-main-link-icon si si-graduation"></i>
                            <span class="nav-main-link-name">Apprentissage</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('Autres') ? ' active' : ''); ?>" href="<?php echo e(route('products.index',['categoryname' => 'Autres'])); ?>">
                            <i class="nav-main-link-icon fa fa-minus-square"></i>
                            <span class="nav-main-link-name">Autres</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">SUPPORT</li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('support') ? ' active' : ''); ?>" href="<?php if(auth()->user()->admin == 1): ?><?php echo e(route('supportadmin.index')); ?><?php else: ?><?php echo e(route('support')); ?><?php endif; ?>">
                            <i class="nav-main-link-icon si si-bubbles"></i>
                            <span class="nav-main-link-name">Contact</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Une question ?</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link <?php echo e(request()->is('faq') ? ' active' : ''); ?>" href="/faq">
                            <i class="nav-main-link-icon fa fa-question-circle"></i>
                            <span class="nav-main-link-name">FAQ</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">MON COMPTE</li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('orders') ? ' active' : ''); ?>"  href="<?php echo e(route('orders')); ?>">
                            <i class="nav-main-link-icon fa fa-shopping-bag"></i>
                            <span class="nav-main-link-name">Mes achats</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link <?php echo e(request()->is('add_funds') ? ' active' : ''); ?>"  href="<?php echo e(route('payment.addfunds')); ?>">
                            <i class="nav-main-link-icon si si-wallet"></i>
                            <span class="nav-main-link-name">Ajouter des fonds</span>
                        </a>
                    </li>
                    <li class="nav-main-item open">
                        <a class="nav-main-link" href="<?php echo e(route('logout')); ?>">
                            <i class="nav-main-link-icon si si-logout"></i>
                            <span class="nav-main-link-name">Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">

        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->


            <div class="d-flex align-items-center">



                <!-- Open Search Section (visible on smaller screens) -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- END Open Search Section -->

                <!-- Search Form (visible on larger screens) -->

            </div>
            <!-- END Left Section -->


            <!-- Right Section -->
            <div class="d-flex align-items-center">
                <!-- Wallet Side -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

                <a class="btn btn-sm btn-alt-secondary ms-2" href="<?php echo e(route('payment.addfunds')); ?>">
                    <i class="si si-wallet"></i> <?php echo e(auth()->user()->amount); ?> €
                </a>
                <!-- END Wallet Side Overlay -->
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block ms-2">
                    <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle" src="<?php echo e(asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar)); ?>" alt="Header Avatar" style="width: 21px;">
                        <span class="d-none d-sm-inline-block ms-2"><?php echo e(auth()->user()->username); ?></span>
                        <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                        <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?php echo e(asset('assets/media/avatars/'.auth()->user()->avatar()->select('avatar')->first()->avatar)); ?>" alt="">
                            <p class="mt-2 mb-0 fw-medium"><?php echo e(auth()->user()->username); ?></p>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo e(route('profile')); ?>">
                                <span class="fs-sm fw-medium">Profil</span>
                            </a>

                        </div>
                        <div role="separator" class="dropdown-divider m-0"></div>
                        <div class="p-2">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?php echo e(route('logout')); ?>">
                                <span class="fs-sm fw-medium">Déconnexion</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->

                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block ms-2">
                    <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                       <?php if($notifications->count() != 0): ?> <span class="text-primary">•</span><?php endif; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                            <h5 class="dropdown-header text-uppercase">Notifications</h5>
                        </div>
                        <ul class="nav-items mb-0">
                            <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a class="text-dark d-flex py-2" href="<?php echo e(route('notifications',['id' => $notification->id])); ?>">
                                    <div class="flex-shrink-0 me-2 ms-3">
                                        <i class="<?php echo e($notification->type->notif_class); ?>"></i>
                                    </div>
                                    <div class="flex-grow-1 pe-2">
                                        <div class="fw-semibold"><?php echo e($notification->type->description); ?></div>
                                        <span class="fw-medium text-muted"> <?php echo e(\Carbon\Carbon::parse($notification->created_at)->diffForHumans()); ?></span>
                                    </div>
                                </a>
                            </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->

            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <form class="w-100" action="/dashboard" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-fw fa-times-circle"></i>
                        </button>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        <div id="page-header-loader" class="overlay-header bg-body-extra-light">
            <div class="content-header">
                <div class="w-100 text-center">
                    <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                </div>
            </div>
        </div>
        <!-- END Header Loader -->
    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <?php echo $__env->yieldContent('content'); ?>

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-3">
            <div class="row fs-sm">
                <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                    <a class="fw-semibold" href="<?php echo e(route('dashboard')); ?>" target="_blank">The Spot</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- OneUI Core JS -->
<script src="<?php echo e(asset('assets/js/oneui.app.js')); ?>"></script>

<!-- Laravel Scaffolding JS -->
<script src="<?php echo e(asset('assets/js/lib/jquery.min.js')); ?>"></script>

<!-- <script src="<?php echo e(mix('/js/laravel.app.js')); ?>"></script> -->

<!-- Notificaation -->
<script src="<?php echo e(asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>

<!-- Conversation -->
<script src="<?php echo e(asset('assets/js/plugins/ckeditor5-classic/build/ckeditor.js')); ?>"></script>

<?php echo $__env->yieldContent('js_after'); ?>
</body>

</html>
<?php /**PATH /Users/anas/PROJECT/resources/views/layouts/backend.blade.php ENDPATH**/ ?>