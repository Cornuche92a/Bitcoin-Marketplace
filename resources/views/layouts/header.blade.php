<!doctype html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>TheSpot - Bienvenue</title>


    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" src="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">-->
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/oneui.min.css')}}">
    <style>
        body {
            background-image:url("{{asset('assets/media/photos/background_1.jpg')}}");
            background-color: #cccccc;
        }

    </style>
    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
</head>
<body style="background-image: url('{{asset('assets/media/photos/background_test1.png')}}'); background-size: cover; display: block; opacity: 0.9" @if(session('status')) onload="One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: '{{session('status')}}'})"@endif>


<div id="page-container" class="dark-mode">

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">

            <div class="content">

                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <center> <img src="{{asset('assets/media/logo-home.png')}}" style="height: 150px" ></center>

                        <!-- Sign In Block -->
                        <div class="block block-rounded mb-0">
                            <div class="block-header block-header-default">
                                Bienvenue
                                <div class="block-options">
                                    @if(Route::is('login'))
                                    @if (Route::has('password.request'))
                                            <button type="button" onclick="location.href='{{route('register')}}';" class="btn btn-sm btn-primary">
                                                <i class="fa fa-user-plus"></i> Inscription
                                            </button>
                                    @endif
                                    @else
                                        <button type="button" onclick="location.href='{{route('login')}}';" class="btn btn-sm btn-primary">
                                            <i class="fa fa-sign-in-alt"></i> Connexion
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="block-content">


                                    @yield('content')
                                    @yield('registerform')

                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Block -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>

<!-- END Page Container -->

<!--
    OneUI JS

    Core libraries and functionality
    webpack is putting everything together at _js/main/app.js
-->
<script src="{{asset('assets/js/oneui.app.min.js')}}"></script>

<!-- jQuery (required for jQuery Validation plugin) -->
<script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>

<!-- Page JS Plugins -->
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- Notificaation -->
<script src="{{asset('assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<!-- Page JS Code -->
<script src="{{asset('assets/js/pages/op_auth_signin.min.js')}}"></script>
</body>
</html>
