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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon_icon.png">
    <link rel="shortcut icon" type="image/png" href="/favicon_icon.png">
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
    <!-- <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/chartist.min.css"> -->
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/themes/layout-dark.css">
    <link rel="stylesheet" href="/theme/app-assets/css/plugins/switchery.css">
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/pickadate/pickadate.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/css/pages/dashboard1.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/theme/assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="/theme/app-assets/vendors/css/select2.min.css">

    <!-- END: Custom CSS-->
    {{-- Main Js --}}
    <script src="/theme/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/theme/app-assets/vendors/js/switchery.min.js"></script>

    {{--Yajara Datatable --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

     {{-- Date picker js / time picker js --}}
     <script src="/theme/app-assets/vendors/js/pickadate/picker.js"></script>
     <script src="/theme/app-assets/vendors/js/pickadate/picker.date.js"></script>
     <script src="/theme/app-assets/vendors/js/pickadate/picker.time.js"></script>
     <script src="/theme/app-assets/vendors/js/pickadate/picker.time.js"></script>

    

    <!-- Date Range Picker -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css" href="/theme/assets/css/tcul.css">

    <link rel="stylesheet" type="text/css" href="/theme/assets/css/toastr.css"></link>
    <script type="text/javascript" src="/theme/assets/js/toastr.js"></script>
    
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    <script  type="text/javascript"src="/ckeditor/adapters/jquery.js"></script>
    <script  type="text/javascript" src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <style>
        table.dataTable thead th, table.dataTable thead td {
            padding: 1px 15px !important;
            border-bottom: 1px solid #111 !important;
        }
        table.dataTable tbody, table.dataTable tbody button, table.dataTable tbody a {
            font-size: 12px !important;
        }
        table.dataTable.table-striped tbody tr td {
            border-top: 0;
            font-weight: 500;
        }
        .app-sidebar .navigation li > a {
            padding: 0px 30px 10px 14px !important;
        }
    </style>
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body class="vertical-layout vertical-menu 2-columns  navbar-sticky {{getNavBarToggle(\Auth::user())}}" data-menu="vertical-menu" data-col="2-columns">
   @can('isAdmin')
    <nav class="navbar navbar-expand-lg navbar-light header-navbar navbar-fixed header-color">
        <div class="container-fluid navbar-wrapper">
            <div class="navbar-header d-flex">
                <div class="navbar-toggle menu-toggle d-xl-none d-block float-left align-items-center justify-content-center" data-toggle="collapse"><i class="ft-menu font-medium-3"></i></div>
                <ul class="navbar-nav">
                    <li class="nav-item mr-2 d-none d-lg-block"><a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a></li>
                </ul>
            </div>
            <div class="navbar-container">
                <div class="collapse navbar-collapse d-block" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="dropdown nav-item mr-1"><a class="nav-link dropdown-toggle user-dropdown d-flex align-items-end" id="dropdownBasic2" href="javascript:;" data-toggle="dropdown">
                                <div class="user d-md-flex d-none mr-2"><span class="text-right">{{\Auth::user()->first_name}} {{\Auth::user()->last_name}}</span></div>
                            </a>
                            <div class="dropdown-menu text-left dropdown-menu-right m-0 pb-0" aria-labelledby="dropdownBasic2">
                                {{-- <a class="dropdown-item" href="#">
                                    <div class="d-flex align-items-center"><i class="ft-edit mr-2"></i><span>Edit Profile</span></div>
                                </a> --}}
                                <a class="dropdown-item" href="#" onclick="$('#logout-form').submit();">
                                    <div class="d-flex align-items-center"><i class="ft-power mr-2"></i><span>Logout</span></div>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <!-- main menu-->
        <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
        <div class="app-sidebar menu-fixed" data-background-color="man-of-steel" data-image="/theme/app-assets/img/sidebar-bg/01.jpg" data-scroll-to-active="true">
            <!-- main menu header-->
            <!-- Sidebar Header starts-->
            <div class="sidebar-header text-center">
                <div class="logo clearfix">
                    <a class="logo-text text-center" href="/admin/dashboard" style="text-transform:capitalize;">
                        <span class="text">ADMIN</span>
                    </a>
                    <a class="nav-toggle d-none d-lg-none d-xl-block" id="sidebarToggle" href="javascript:;"><i class="toggle-icon ft-toggle-right" data-toggle="expanded"></i></a>
                    <!-- <a class="nav-link apptogglefullscreen" id="navbar-fullscreen" href="javascript:;"><i class="ft-maximize font-medium-3"></i></a>     -->
                </div>
            </div>
            <!-- Sidebar Header Ends-->
            <!-- / main menu header-->
            <!-- main menu content-->
            <div class="sidebar-content main-menu-content">

                 {{-- <hr style="margin-top: 0.5rem; margin-bottom: 0.5rem">
                    <h6 class="text-center text-white p-1">E-Commerce</h6> --}}
                <hr  style="margin-top: 0.5rem; margin-bottom: 0.5rem"> 

                <div class="nav-container">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="nav-item @if(Route::is('admin.dashboard.*')) active @endif" ><a href="/admin/dashboard"><i class="fa fa-tachometer"></i><span class="menu-title" data-i18n="Email">Dashboard</span></a>
                        </li>
                    
                       
                                <li class="has-sub nav-item"><a href="#"><i class="fa fa-boxes"></i><span class="menu-title" data-i18n="Tables">Master Products</span></a>
                                    <ul class="menu-content">
                                        <li class="nav-item @if(Route::is('admin.products.*') && request()->input('type') === null) active @endif">
                                            <a href="/admin/products">
                                                <i class="fa fa-box"></i><span class="menu-title" data-i18n="Email">Products</span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                            
                                {{-- <li class="has-sub nav-item"><a href="#"><i class="fa fa-building"></i><span class="menu-title" data-i18n="Tables">Organisations</span></a>
                                    <ul class="menu-content">
                                        <li class="nav-item @if(Route::is('admin.organisations.*')) active @endif" ><a href="/admin/organisations"><i class="fa fa-building"></i><span class="menu-title" data-i18n="Email">List</span></a>
                                        </li>
    
                                        @can('location-view')
                                        <li class="nav-item @if(Route::is('admin.locations.*')) active @endif" ><a href="/admin/locations"><i class="fa fa-map-marker"></i><span class="menu-title" data-i18n="Email">Locations</span></a>
                                        </li>
                                        @endcan
    
                                        @can('contact-view')
                                        <li class="nav-item @if(Route::is('admin.contacts.*')) active @endif" ><a href="/admin/contacts"><i class="fa fa-user"></i><span class="menu-title" data-i18n="Email">Contacts</span></a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li> --}}
                       
                       

                       

                       

                    </ul>
                </div>
            </div>
            <div class="sidebar-background"></div>
        </div>

        <div class="main-panel">
            <div class="main-content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
            <footer class="footer undefined undefined">
                <p class="clearfix text-muted m-0"><span>Copyright &copy; {{date('M Y')}} &nbsp;</span><a href="https://E-commerce.com/" id="pixinventLink" target="_blank">E-commerce</a><span class="d-none d-sm-inline-block">, All rights reserved.</span></p>
            </footer>
            <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>
        </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- model for add nuw on form reltime data start-->
    <div class="modal fade text-left" id="new-form-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="task-view-modal-label">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close-view" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body" id="new-form-modal-body"> </div>
                </div>
            </div>
        </div>
    </div>
     <!-- model for add nuw on form reltime data end-->

    <!-- model for view enquiry start-->
    <div class="modal fade text-left" id="view-modal" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="view-modal-label">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div id="view-modal-label"></div>
                    <button type="button" class="close close-view" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="view-modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- model for view enquiry end-->
    {{-- Workorder staus change Start --}}

    @endcan

    <input type="hidden" id="entity" value=""/>
    <input type="hidden" id="entity_field_name" value=""/>
    <input type="hidden" id="entity_field_value" value=""/>
    <input type="hidden" id="entity_field_label" value=""/>

    <script src="/theme/app-assets/js/core/app-menu.js"></script>
    <script src="/theme/app-assets/js/core/app.js"></script>
    <script src="/theme/app-assets/js/notification-sidebar.js"></script>
    <script src="/theme/app-assets/js/customizer.js"></script>
    <script src="/theme/app-assets/js/scroll-top.js"></script>
    <script src="/theme/app-assets/vendors/js/select2.full.min.js"></script>
    <script src="/theme/app-assets/js/components-modal.min.js"></script>
    {{-- <script src="/theme/app-assets/js/dashboard1.js"></script> --}}
    <script src="/theme/assets/js/scripts.js"></script>
    <script src="/theme/assets/js/tcul-add-new.js"></script>
    <script>
        $(".select2").select2({
            dropdownAutoWidth: true,
            width: '100%'
        });

        $('.pickadate').pickadate({
            format: 'dd/mm/yyyy',
        });

        $('.pickadate-selectors').pickadate({
            format: 'dd/mm/yyyy',
            selectMonths: true,
            selectYears: 2,
            max: true,

        });

        $('.daterange').daterangepicker({
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month'),
            locale: {
                format: 'DD/MM/YYYY'
            }
        });


        $('#Tcul-Toggle').click(function(){
            var toggle = '';
            if ( $('.vertical-layout').hasClass("menu-expanded") ) {
                var toggle = true;
            }
            if ( $('.vertical-layout').hasClass("nav-collapsed") ) {
                var toggle = false;
            }
            $.ajax({
                    type:'POST',
                    url:'/dashboard/toggle',
                    data:{
                    _token:$('meta[name=csrf-token]').attr('content'),
                    sidebar_toggle:toggle,
                },
                success:function(response){
                    // console.log(toggle+'--DONE');
                }
            });
        });

        $('#sidebarToggle').click(function(){
            var toggle = '';
            if ( $('.vertical-layout').hasClass("menu-expanded") ) {
                var toggle = '0';
            }
            if ( $('.vertical-layout').hasClass("nav-collapsed") ) {
                var toggle = '1';
            }

            $.ajax({
                type:'POST',
                url:'/admin/dashboard/toggle',
                data:{
                _token:$('meta[name=csrf-token]').attr('content'),
                toggle_status:toggle,
            },
                success:function(response){
                    console.log(toggle+'--DONE');
                }
            });
        });

         $(document).on('click','.view-entity-btn',function(e){
            var entity = $(this).data('entity');
            var entity_id = $(this).data('entity-id');
            var label = $(this).data('label');
            if(entity == 'products'){
                label = '<span class="badge badge-warning mr-2">Product </span><b>' +label+'</b>';
            }
            $('#view-modal-label').html(label);
            url = '/admin/'+entity+'/'+entity_id+'/view/modal';
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response){
                    $('#view-modal-body').html(response);
                    $('#view-modal').modal('show');
                },
            });
        });
    </script>
</body>
<!-- END : Body-->
</html>
