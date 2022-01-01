<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Analytics Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('/vendor/admin/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('/vendor/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('/vendor/admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>

</head>

<body class="loading"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": false}'>
<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="leftside-menu">

        <!-- LOGO -->
        <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{ asset(config('admin.logo_dark')) }}" alt="" height="40">
                    </span>
            <span class="logo-sm">
                        <img src="{{ asset(config('admin.logo_sm_dark')) }}" alt="" height="30">
                    </span>
        </a>

        <!-- LOGO -->
        <a href="{{ route('admin.dashboard') }}" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{ asset(config('admin.logo')) }}" alt="" height="40">
                    </span>
            <span class="logo-sm">
                        <img src="{{ asset(config('admin.logo_sm')) }}" alt="" height="30">
                    </span>
        </a>

        <div class="h-100" id="leftside-menu-container" data-simplebar>

            <!--- Sidemenu -->
            <ul class="side-nav">

                <li class="side-nav-title side-nav-item">Navigation</li>

                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                       aria-controls="sidebarDashboards" class="side-nav-link">
                        <i class="uil-home-alt"></i>
                        <span class="badge bg-success float-end">4</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="dashboard-analytics.html">Analytics</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                       aria-controls="sidebarEcommerce" class="side-nav-link">
                        <i class="uil-store"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="side-nav-second-level">
                            <li>
                                <a href="apps-ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-products-details.html">Products Details</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-orders.html">Orders</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-orders-details.html">Order Details</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-customers.html">Customers</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-shopping-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-checkout.html">Checkout</a>
                            </li>
                            <li>
                                <a href="apps-ecommerce-sellers.html">Sellers</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="side-nav-item">
                    <a href="landing.html" target="_blank" class="side-nav-link">
                        <i class="uil-globe"></i>
                        <span class="badge bg-secondary text-light float-end">New</span>
                        <span> Landing </span>
                    </a>
                </li>
            </ul>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topbar-menu float-end mb-0">
                    <li class="dropdown notification-list d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-search noti-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('/vendor/admin/images/flags/us.svg') }}" alt="user-image"
                                 class="me-0 me-sm-1" height="12">
                            <span class="align-middle d-none d-sm-inline-block">English</span> <i
                                class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('/vendor/admin/images/flags/cn.svg') }}" alt="user-image"
                                     class="me-1" height="12">
                                <span class="align-middle">简体中文</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('/vendor/admin/images/flags/de.svg') }}" alt="user-image"
                                     class="me-1" height="12">
                                <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('/vendor/admin/images/flags/it.svg') }}" alt="user-image"
                                     class="me-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('/vendor/admin/images/flags/es.svg') }}" alt="user-image"
                                     class="me-1" height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('/vendor/admin/images/flags/ru.svg') }}" alt="user-image"
                                     class="me-1" height="12">
                                <span class="align-middle">Russian</span>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="noti-icon-badge"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                </h5>
                            </div>

                            <div style="max-height: 230px;" data-simplebar>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">1 min ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                    <p class="notify-details">New user registered.
                                        <small class="text-muted">5 hours ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="{{ asset('/vendor/admin/images/logo_sm.svg') }}"
                                             class="img-fluid rounded-circle"
                                             alt=""/></div>
                                    <p class="notify-details">Cristina Pride</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Hi, How are you? What about our next meeting</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                    <p class="notify-details">Caleb Flakelar commented on Admin
                                        <small class="text-muted">4 days ago</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon">
                                        <img src="{{ asset('/vendor/admin/images/logo_sm.svg') }}"
                                             class="img-fluid rounded-circle"
                                             alt=""/></div>
                                    <p class="notify-details">Karen Robinson</p>
                                    <p class="text-muted mb-0 user-msg">
                                        <small>Wow ! this admin looks good and awesome design</small>
                                    </p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-heart"></i>
                                    </div>
                                    <p class="notify-details">Carlos Crouch liked
                                        <b>Admin</b>
                                        <small class="text-muted">13 days ago</small>
                                    </p>
                                </a>
                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);"
                               class="dropdown-item text-center text-primary notify-item notify-all">
                                View All
                            </a>

                        </div>
                    </li>
                    <li class="notification-list">
                        <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                            <i class="dripicons-gear noti-icon"></i>
                        </a>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                           role="button" aria-haspopup="false"
                           aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="{{ Auth::user()->avatar_url }}" alt="user-image"
                                             class="rounded-circle">
                                    </span>
                            <span>
                                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                                        <span class="account-position">Owner</span>
                                    </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  class="d-none">@csrf</form>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="app-search dropdown d-none d-lg-block">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                   id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn-primary" type="submit">Search</button>
                        </div>
                    </form>

                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-notes font-16 me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-life-ring font-16 me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="uil-cog font-16 me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                         src="{{ asset('/vendor/admin/images/logo_sm.svg') }}"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex">
                                    <img class="d-flex me-2 rounded-circle"
                                         src="{{ asset('/vendor/admin/images/logo_sm.svg') }}"
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <form class="d-flex">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-light" id="dash-daterange">
                                        <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="mdi mdi-calendar-range font-13"></i>
                                                </span>
                                    </div>
                                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                        <i class="mdi mdi-autorenew"></i>
                                    </a>
                                </form>
                            </div>
                            <h4 class="page-title">Analytics</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="card tilebox-one">
                            <div class="card-body">
                                <i class='uil uil-users-alt float-end'></i>
                                <h6 class="text-uppercase mt-0">Active Users</h6>
                                <h2 class="my-2" id="active-users-count">121</h2>
                                <p class="mb-0 text-muted">
                                    <span class="text-success me-2"><span
                                            class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                                    <span class="text-nowrap">Since last month</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!--end card-->

                        <div class="card tilebox-one">
                            <div class="card-body">
                                <i class='uil uil-window-restore float-end'></i>
                                <h6 class="text-uppercase mt-0">Views per minute</h6>
                                <h2 class="my-2" id="active-views-count">560</h2>
                                <p class="mb-0 text-muted">
                                    <span class="text-danger me-2"><span
                                            class="mdi mdi-arrow-down-bold"></span> 1.08%</span>
                                    <span class="text-nowrap">Since previous week</span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!--end card-->

                        <div class="card cta-box overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h3 class="m-0 fw-normal cta-box-title">Enhance your <b>Campaign</b> for better
                                            outreach <i class="mdi mdi-arrow-right"></i></h3>
                                    </div>
                                    <img class="ms-3" src="assets/images/email-campaign.svg" width="92"
                                         alt="Generic placeholder image">
                                </div>
                            </div>
                            <!-- end card-body -->
                        </div>
                    </div> <!-- end col -->

                    <div class="col-xl-9 col-lg-8">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    Property HY1xx is not receiving hits. Either your site is not receiving any sessions
                                    or it is not tagged correctly.
                                </div>
                                <ul class="nav float-end d-none d-lg-flex">
                                    <li class="nav-item">
                                        <a class="nav-link text-muted" href="#">Today</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-muted" href="#">7d</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">15d</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-muted" href="#">1m</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-muted" href="#">1y</a>
                                    </li>
                                </ul>
                                <h4 class="header-title mb-3">Sessions Overview</h4>

                                <div dir="ltr">
                                    <div id="sessions-overview" class="apex-charts mt-3" data-colors="#0acf97"></div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    </div>
                                </div>
                                <h4 class="header-title">Sessions by country</h4>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div id="world-map-markers" class="mt-3 mb-3" style="height: 300px">
                                        </div>
                                    </div>
                                    <div class="col-lg-4" dir="ltr">
                                        <div id="country-chart" class="apex-charts" data-colors="#727cf5"></div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop p-0"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    </div>
                                </div>
                                <h4 class="header-title">Views Per Minute</h4>

                                <div id="views-min" class="apex-charts mt-2" data-colors="#0acf97"></div>

                                <div class="table-responsive mt-3">
                                    <table class="table table-sm mb-0 font-13">
                                        <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Views</th>
                                            <th>Bounce Rate</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);" class="text-muted">/hyper/dashboard-analytics</a>
                                            </td>
                                            <td>25</td>
                                            <td>87.5%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   class="text-muted">/hyper/dashboard-crm</a>
                                            </td>
                                            <td>15</td>
                                            <td>21.48%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);" class="text-muted">/ubold/dashboard</a>
                                            </td>
                                            <td>10</td>
                                            <td>63.59%</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="javascript:void(0);" class="text-muted">/minton/home</a>
                                            </td>
                                            <td>7</td>
                                            <td>56.12%</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop p-0"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    </div>
                                </div>
                                <h4 class="header-title">Sessions by Browser</h4>

                                <div id="sessions-browser" class="apex-charts mt-3" data-colors="#727cf5"></div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop p-0"
                                       data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">Refresh Report</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                    </div>
                                </div>
                                <h4 class="header-title">Sessions by Operating System</h4>

                                <div id="sessions-os" class="apex-charts mt-3"
                                     data-colors="#727cf5,#0acf97,#fa5c7c,#ffbc00"></div>

                                <div class="row text-center mt-2">
                                    <div class="col-6">
                                        <h4 class="fw-normal">
                                            <span>6,510</span>
                                        </h4>
                                        <p class="text-muted mb-0">Online System</p>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="fw-normal">
                                            <span>2,031</span>
                                        </h4>
                                        <p class="text-muted mb-0">Offline System</p>
                                    </div>
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="p-0 float-end">Export <i class="mdi mdi-download ms-1"></i></a>
                                <h4 class="header-title mt-1 mb-3">Channels</h4>

                                <div class="table-responsive">
                                    <table class="table table-sm table-centered mb-0 font-14">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Channel</th>
                                            <th>Visits</th>
                                            <th style="width: 40%;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Direct</td>
                                            <td>2,050</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 65%; height: 20px;" aria-valuenow="65"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Organic Search</td>
                                            <td>1,405</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-info" role="progressbar"
                                                         style="width: 45%; height: 20px;" aria-valuenow="45"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Refferal</td>
                                            <td>750</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                         style="width: 30%; height: 20px;" aria-valuenow="30"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Social</td>
                                            <td>540</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: 25%; height: 20px;" aria-valuenow="25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="p-0 float-end">Export <i class="mdi mdi-download ms-1"></i></a>
                                <h4 class="header-title mt-1 mb-3">Social Media Traffic</h4>

                                <div class="table-responsive">
                                    <table class="table table-sm table-centered mb-0 font-14">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Network</th>
                                            <th>Visits</th>
                                            <th style="width: 40%;"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Facebook</td>
                                            <td>2,250</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 65%; height: 20px;" aria-valuenow="65"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Instagram</td>
                                            <td>1,501</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 45%; height: 20px;" aria-valuenow="45"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Twitter</td>
                                            <td>750</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 30%; height: 20px;" aria-valuenow="30"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>LinkedIn</td>
                                            <td>540</td>
                                            <td>
                                                <div class="progress" style="height: 3px;">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: 25%; height: 20px;" aria-valuenow="25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-4 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="" class="p-0 float-end">Export <i class="mdi mdi-download ms-1"></i></a>
                                <h4 class="header-title mt-1 mb-3">Engagement Overview</h4>

                                <div class="table-responsive">
                                    <table class="table table-sm table-centered mb-0 font-14">
                                        <thead class="table-light">
                                        <tr>
                                            <th>Duration (Secs)</th>
                                            <th style="width: 30%;">Sessions</th>
                                            <th style="width: 30%;">Views</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>0-30</td>
                                            <td>2,250</td>
                                            <td>4,250</td>
                                        </tr>
                                        <tr>
                                            <td>31-60</td>
                                            <td>1,501</td>
                                            <td>2,050</td>
                                        </tr>
                                        <tr>
                                            <td>61-120</td>
                                            <td>750</td>
                                            <td>1,600</td>
                                        </tr>
                                        <tr>
                                            <td>121-240</td>
                                            <td>540</td>
                                            <td>1,040</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive-->
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                </div>
                <!-- end row -->

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ config('admin.copyright') }}
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            @foreach(config('admin.footer_menus') as $menu)
                                <a target="_blank" href="{{ route($menu['url']) }}">
                                    {{ __('admin::dashboard.'.$menu['name']) }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="end-bar">

    <div class="rightbar-title">
        <a href="javascript:void(0);" class="end-bar-toggle float-end">
            <i class="dripicons-cross noti-icon"></i>
        </a>
        <h5 class="m-0">Settings</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <!-- Settings -->
            <h5>Color Scheme</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                       id="light-mode-check" checked>
                <label class="form-check-label" for="light-mode-check">Light Mode</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                       id="dark-mode-check">
                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
            </div>


            <!-- Width -->
            <h5 class="mt-4">Width</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                <label class="form-check-label" for="fluid-check">Fluid</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                <label class="form-check-label" for="boxed-check">Boxed</label>
            </div>


            <!-- Left Sidebar-->
            <h5 class="mt-4">Left Sidebar</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                <label class="form-check-label" for="default-check">Default</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                <label class="form-check-label" for="light-check">Light</label>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                <label class="form-check-label" for="dark-check">Dark</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                <label class="form-check-label" for="fixed-check">Fixed</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                <label class="form-check-label" for="condensed-check">Condensed</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                <label class="form-check-label" for="scrollable-check">Scrollable</label>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            </div>
        </div> <!-- end padding-->

    </div>
</div>

<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<script src="{{ asset('/vendor/admin/js/vendor.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/app.min.js') }}"></script>

<!-- third party js -->
<!-- <script src="assets/js/vendor/Chart.bundle.min.js"></script> -->
<script src="{{ asset('/vendor/admin/js/vendor/apexcharts.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- third party js ends -->

</body>

</html>
