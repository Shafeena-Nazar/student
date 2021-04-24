<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <!-- Meta data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
        <link rel="icon" href="{{ asset('assets/images/brand/favicon.png') }}" type="image/x-icon"/>
        <link rel="shortcut icon" href="{{ asset('assets/images/brand/favicon.png') }}" type="image/x-icon"/>

        <!-- TITLE -->
        <title>Students management</title>

        <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet"/>
        <link href="{{ asset('assets/css/style-modes.css') }}" rel="stylesheet"/>
        <meta  name="csrf-token" content ="{{ csrf_token() }}">
       

        <!-- Skin css-->
        <link href="{{ asset('assets/skins/skins-modes/color1.css') }}"  id="theme" rel="stylesheet" type="text/css" media="all" />

        <!-- SELECT2 CSS -->
        <link href="{{ asset('assets/plugins/select2.min.css') }}" rel="stylesheet"/>
        
         <!-- Data table css -->
        <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}">
        <link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />

        <!--Sweat Alert Css-->
        <link href="{{ asset('assets/plugins/sweetalert.css') }}" rel="stylesheet" />

        <!-- side bar -->
        <link href="{{ asset('assets/plugins/sidemenu-toggle.css') }}" />
    </head>
    <style>
        .hidden {
            display: none!important;
        }
        .select2-container--default {
            width: 100%!important;
        }
    </style>
    <body class="app sidebar-mini default-header dark-leftmenu">
        <div class="page">
            <div class="page-main">
                <div class="header app-header">
                <div class="container-fluid">
                    <div class="d-flex">
                        <a class="header-brand" href="{{ route('home') }}">
                            
                        </a>
                        <!-- <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a> -->
                        <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
                            
                            <div class="">
                                @if(session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                                        <span class="alert-inner--text"><strong>Success!</strong> {{ session()->get('success') }}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                
                            </div>
                            <div class="dropdown d-md-flex header-settings">
                                <a href="#" class="nav-link " data-toggle="dropdown">
                                    <span><img src="{{ asset('assets/images/admin.jpg') }}" alt="profile-user" class="avatar brround cover-image mb-0 ml-0"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <div class="drop-heading  text-center border-bottom pb-3">
                                        <h5 class="text-dark mb-1">{{ Auth::user()->name }}</h5>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- HEADER END -->
                  <!-- Sidebar menu-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar left-menu2">
                    <div class="app-sidebar__user clearfix">
                        <div class="dropdown user-pro-body text-center">
                            <div class="user-pic">
                                <img src="{{ asset('assets/images/admin.jpg') }}" alt="user-img" class="avatar avatar-lg brround">
                            </div>
                            <div class="user-info">
                                <h2>{{ Auth::user()->name }}</h2>
                            </div>
                            
                        </div>
                    </div>
                    <ul class="side-menu">
                       
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">Students</span></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item" href="{{ route('home') }}">All students</a></li>
                                <li><a class="slide-item" href="{{ route('studentMarks') }}">Student marks</a></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </aside>
