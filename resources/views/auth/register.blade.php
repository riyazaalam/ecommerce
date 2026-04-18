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
    <title>Register Page - Rupam Precision Engineering</title>
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
                    <!--Registration Page Starts-->
                    <section id="regestration" class="auth-height">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row full-height-vh m-0">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card overflow-hidden">
                                        <div class="card-content">
                                            <div class="card-body auth-img">
                                                <div class="row m-0">
                                                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                                                        <img src="/theme/app-assets/img/gallery/register.png" alt="" class="img-fluid" width="350" height="230">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 px-4 py-3">
                                                        <h4 class="card-title mb-2">Create Account</h4>
                                                        <p>Fill the below form to create a new account.</p>
                                                        <div>
                                                            <input type="text" name="first_name"  value="{{old('first_name')}}" class="form-control " placeholder="First Name">
                                                            @error('first_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div><br>
                                                        <div>
                                                            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control " placeholder="Last Name">
                                                            @error('last_name')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div><br>
                                                        <div>
                                                            <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control " placeholder="Mobile" onKeyPress="if(this.value.length==10) return false;" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                                            @error('mobile')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div><br>
                                                        <div>
                                                            <input type="email" value="{{old('email')}}" name="email" class="form-control " placeholder="Email">
                                                            @error('email')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div><br>
                                                        <div>
                                                            <input type="password" value="{{old('password')}}" name="password" class="form-control " placeholder="Password">
                                                            @error('password')
                                                                <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div><br>
                                                        <div>
                                                            <input type="password" name="password_confirmation" class="form-control mb-2" placeholder="Confirm Password">
                                                        </div>
                                                        <div class="d-flex justify-content-between flex-sm-row flex-column">
                                                            <a href="{{route('login')}}" class="btn bg-light-primary mb-2 mb-sm-0">Back To Login</a>
                                                            <button type="submit" class="btn btn-primary">Register</button>
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
                    <!--Registration Page Ends-->
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
