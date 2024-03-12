<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description"
        content="Welcome to 'thatsWE' - this platform specifically for travel agencies to offer their customers an unforgettable travel expe- rience! Exclusively for travel agencies, our app offers unique functions - from information about the start of your vacation to many situations during your vacation to saving your vacation experiences Experience what 'thatsWE' exclusivity, customer friendliness and increased sales mean for your travel agency. Winning customers and using the power of customer greed - 'I want that too!' ">
    <meta name="keywords"
        content="Welcome to 'thatsWE' - this platform specifically for travel agencies to offer their customers an unforgettable travel expe- rience! Exclusively for travel agencies, our app offers unique functions - from information about the start of your vacation to many situations during your vacation to saving your vacation experiences Experience what 'thatsWE' exclusivity, customer friendliness and increased sales mean for your travel agency. Winning customers and using the power of customer greed - 'I want that too!' ">
    <meta name="author" content="ThatsWE">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ strtoupper(config('app.name')) }} - @yield('title') </title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/vendors.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/extensions/toastr.min.css') }}">
    @yield('vendor-css')
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css/pages/ui-feather.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/forms/form-validation.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/shepherd.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css/plugins/extensions/ext-component-tour.css') }}">
    @yield('page-css')
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/style.css') }}">
    <!-- END: Custom CSS-->
    <style>
        .flag-icon {
            margin-right: 5px;
        }

        .dataTables_info {
            display: inline-block;
        }

        .dataTables_paginate.paging_simple_numbers {
            display: inline-block;
            float: right;
            margin: .5rem !important;
        }

        div.dataTables_wrapper div.dataTables_paginate ul.pagination {
            margin-top: 0;
        }

        .data-list-page-item.dl-active {
            background-color: #7367f0;
        }

        .main-menu .navbar-header .navbar-brand {
            margin: 0;
        }

        .main-menu.menu-light .navigation>li.open:not(.menu-item-closing)>a,
        .main-menu.menu-light .navigation>li.sidebar-group-active>a {
            color: #565360;
            background: #161d31;
            border-radius: 6px;
        }

        .al_ajax_loder {
            height: 100%;
            text-align: center;
            width: 100$;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .al_ajax_loder img {
            width: 50px;
            height: auto;
        }
    </style>
    @yield('custom-css')
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav
        class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav bookmark-icons">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ route('dashboard') }}"
                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home"><i class="ficon"
                                data-feather="home"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">




                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name fw-bolder">{{ auth()->user()->name }}</span>
                            <span class="user-status">{{ auth()->user()->role }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round bg-gradient-primary"
                                src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                alt="avatar" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#">
                            <i class="me-50" data-feather="user"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="me-50" data-feather="settings"></i>
                            Settings
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="me-50" data-feather="power"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('admin-assets/app-assets/images/icons/xls.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small
                            class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('admin-assets/app-assets/images/icons/jpg.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('admin-assets/app-assets/images/icons/pdf.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100"
                href="app-file-manager.html">
                <div class="d-flex">
                    <div class="me-75"><img src="{{ asset('admin-assets/app-assets/images/icons/doc.png') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div><small class="search-data-size me-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a href="#">
                <h6 class="section-label mt-75 mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI
                            designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                            Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-14.jpg') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital
                            Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100"
                href="app-user-view-account.html">
                <div class="d-flex align-items-center">
                    <div class="avatar me-75"><img
                            src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-6.jpg') }}"
                            alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web
                            Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion justify-content-between"><a
                class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="me-75"
                        data-feather="alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto" style="width:76%">
                    <a class="navbar-brand" href="#">
                        <span class="brand-logo">
                            <img class="img img-fluid" src="{{ asset('logo3.png') }}"
                                alt="{{ config('app.name') }}" style="max-width:100%">
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0"
                        data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4"
                            data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}" id="mainMenuLi">
                    <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="menu-item text-truncate">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <!-- END: Dashboard -->
                <li class=" navigation-header">
                    <span>{{ __('Content Menagements') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>
                <!-- START: content management -->
                <li class="nav-item {{ Request::is('content/*') ? 'open' : '' }}">
                    <a class="d-flex align-items-center" href="#">
                        <i data-feather='columns'></i>
                        <span class="menu-title text-truncate">
                            {{ __('Manage Content') }}
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('content.success-info') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('content.success-info') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">
                                    {{ __('Success Info') }} </span>
                            </a>
                        </li>
                        <li class="{{ Route::is('content.app-images') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('content.app-images') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">
                                    {{ __('App Images') }} </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END: content management -->
                <!-- START: Agency management -->
                <li class=" nav-item  {{ Request::is('agency/*') ? 'open' : '' }}"><a
                        class="d-flex align-items-center" href="#">
                        <i data-feather='activity'></i>
                        <span class="menu-title text-truncate">
                            {{ __('Manage Agency ') }}
                        </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{ Route::is('agency.show') ? 'active' : '' }}">
                            <a class="d-flex align-items-center" href="{{ route('agency.show') }}">
                                <i data-feather="circle"></i>
                                <span class="menu-item text-truncate">
                                    {{ __('Agencies') }} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" navigation-header">
                    <span>{{ __('Order Menagements') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

                <li class=" navigation-header">
                    <span>{{ __('Email Menagements') }}</span>
                    <i data-feather="more-horizontal"></i>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
    <!-- Basic tour -->
    <section id="basic-tour" class="d-none">
        <div class="row">
            <div class="col-sm-4 offset-md-4 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tour</h4>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-outline-primary" id="tour">Start Tour</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Basic tour -->

    <!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">
                Copyright &copy; 2024 <a href="https://thatswe.de" target="_blank">ThatsWE</a>. All rights
                reserved.</span>
            <span class="float-md-end d-none d-md-block">Develop By : <a href="https://makersstack.com"
                    target="_blank">makersstack</a><i data-feather="heart"></i></span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->

    <script src="{{ asset('admin-assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    @yield('vendor-js')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/submit-wait.js') }}"></script>
    @yield('page-vendor-js')
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('admin-assets/src/js/core/confirm-alert.js') }}"></script>
    <!--confirm alert || mail send with notify-->


    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/app-assets/js/scripts/ui/ui-feather.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/table-color.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/common-ajax.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/server-side-button-action.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/lang-change.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/datatable-functions.js') }}"></script>
    <!-- BEGIN: Page tour JS-->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/extensions/ext-component-tour.js') }}"></script>
    <script src="{{ asset('/common-js/custom-from-validation.js') }}"></script>
    {{-- <!-- <script src="{{asset('admin-assets/app-assets/js/scripts/forms/form-select2.js')}}"></script> --> --}}

    @yield('page-js')
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });


        if ($('.shepherd-cancel-icon').click()) {
            $('#dashMainMenuID').addClass('open');
            $('#dashboard_first').addClass('active');
            $(".left-setting-menu").closest('li').removeClass('open sidebar-group-active');
        }


        $(document).ready(function() {
            $("button").each(function() {
                $(this).removeClass("waves-effect");
            });
        })
    </script>
</body>
<!-- END: Body-->

</html>
