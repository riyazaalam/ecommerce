
<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Forgot Password Page - Rupam Precision Engineering</title>
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
                    <!--Forgot Password Starts-->
                    <section id="forgot-password" class="auth-height">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row full-height-vh m-0 d-flex align-items-center justify-content-center">
                                <div class="col-md-7 col-12">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body auth-img">
                                                <div class="row m-0">
                                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                                        <img src="/theme/app-assets/img/gallery/forgot.png" alt="" class="img-fluid" width="260" height="230">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 px-4 py-3">
                                                        <div>
                                                            <h4 class="mb-2 card-title">Recover Password</h4>
                                                            <p class="card-text mb-3" style="font-size:13px;">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                                            <p style="font-size:13px; color:#3CB371;" >{{session('status')}}</p>
                                                        </div>
                                                        <div>
                                                            <input type="email" name="email" value="{{old('email')}}" class="form-control " placeholder="Email">
                                                            @if($errors->any())
                                                                <span style="color:red">{{$errors->first()}}</span><br/>
                                                            @endif
                                                        </div><br>
                                                        <div class="d-flex flex-sm-row flex-column justify-content-between">
                                                            <button type="submit" class="btn btn-primary ml-sm-1">Email Password Reset Link</button>
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
                    <!--Forgot Password Ends-->

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
