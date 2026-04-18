<!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Rupam Precision Engineering</title>
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/tcul-img/favicon.svg">
    <link rel="shortcut icon" type="image/png" href="/frontend/tcul-img/favicon.svg">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/switchery.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/themes/layout-dark.css">
    <link rel="stylesheet" href="/theme/app-assets/css/plugins/switchery.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" href="/theme/app-assets/css/pages/authentication.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/theme/assets/css/style.css">
    <!-- END: Custom CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    <section id="login" class="auth-height">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row full-height-vh m-0">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body auth-img">
                                                <div class="row m-0">
                                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                                                        <img src="/theme/app-assets/img/gallery/login.png" alt="" class="img-fluid" width="300" height="230">
                                                    </div>
                                                    <div class="col-lg-6 col-12 px-4 py-3">
                                                        <h4 class="mb-2 card-title">Login</h4>
                                                        <p>Welcome back, please login to your account.</p>
                                                        <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control mb-3" placeholder="Username">
                                                        <input type="password" name="password" id="password"  value="{{old('password')}}" class="form-control mb-2" placeholder="Password">
                                                        {{-- <div class="d-sm-flex justify-content-between mb-3 font-small-2">
                                                            <a href="{{route('password.request')}}">Forgot Password?</a>
                                                        </div> --}}
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a href="{{route('register')}}" class="btn bg-light-primary mb-2 mb-sm-0">Register</a>
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div><br>
                                                        <div class="text-center">
                                                            @if($errors->any())
                                                                <span style="color:red">{{$errors->first()}}</span><br/>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!--Login Page Ends-->
                </div>
            </div>
            <!-- END : End Main Content-->
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="/theme/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/theme/app-assets/vendors/js/switchery.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="/theme/app-assets/js/core/app-menu.js"></script>
    <script src="/theme/app-assets/js/core/app.js"></script>
    <script src="/theme/app-assets/js/notification-sidebar.js"></script>
    <script src="/theme/app-assets/js/customizer.js"></script>
    <script src="/theme/app-assets/js/scroll-top.js"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="/theme/assets/js/scripts.js"></script>
    <!-- END: Custom CSS-->
</body>
<!-- END : Body-->

</html>
