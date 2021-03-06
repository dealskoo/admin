<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | {{ __('admin::auth.title') }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('/vendor/admin/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/admin/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/admin/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/vendor/admin/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css"/>
    <!-- third party css end -->

    <!-- App css -->
    <link href="{{ asset('/vendor/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="light-style"/>
    <link href="{{ asset('/vendor/admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style"/>
    @yield('css')
</head>

<body class="loading">
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

            {!! \Nwidart\Menus\Facades\Menu::render('admin_navbar') !!}

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
                            <form class="p-3" method="get" action="{{ route('admin.search') }}">
                                <input type="text" class="form-control"
                                       placeholder="{{ __('admin::admin.search_placeholder') }}" name="q">
                            </form>
                        </div>
                    </li>
                    @php
                        $locale_code = session('admin_locale',config('app.locale'));
                        $locale = config('admin.languages')[$locale_code];
                    @endphp
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset($locale['icon']) }}" alt="user-image"
                                 class="me-0 me-sm-1" height="12">
                            <span class="align-middle d-none d-sm-inline-block">{{ $locale['name'] }}</span> <i
                                class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                            @foreach(config('admin.languages') as $code => $language)
                                @if($locale_code!=$code)
                                    <a href="{{ route('admin.locale',['locale'=>$code]) }}"
                                       class="dropdown-item notify-item">
                                        <img src="{{ asset($language['icon']) }}" alt="user-image"
                                             class="me-1" height="12">
                                        <span class="align-middle">{{ $language['name'] }}</span>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </li>

                    @php
                        $notifications = Auth::user()->unreadNotifications()->paginate(10);
                    @endphp
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            @if($notifications->total()>0)
                                <span class="noti-icon-badge"></span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                            <!-- item-->
                            <div class="dropdown-item noti-title">
                                <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="{{ route('admin.notification.all_read') }}" class="text-dark">
                                                    <small>{{ __('admin::admin.clear_all') }}</small>
                                                </a>
                                            </span>{{ __('admin::admin.notification') }}
                                </h5>
                            </div>

                            <div style="max-height: 230px;" data-simplebar>
                                @foreach($notifications as $notification)
                                    <a href="{{ route('admin.notification.show',$notification) }}"
                                       class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="{{ $notification->data['icon'] }}"></i>
                                        </div>
                                        <p class="notify-details">{{ $notification->data['title'] }}
                                            @if(empty($notification->data['message']))
                                                <small
                                                    class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                            @else
                                                <small class="text-muted">{{ $notification->data['message'] }}</small>
                                            @endif
                                        </p>
                                    </a>
                                @endforeach
                            </div>

                            <!-- All-->
                            <a href="{{ route('admin.notification.list') }}"
                               class="dropdown-item text-center text-primary notify-item notify-all">
                                {{ __('admin::admin.view_all') }}
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
                                        <span class="account-position">{{ Auth::user()->email }}</span>
                                    </span>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('admin::admin.welcome') }} !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{ route('admin.account.profile') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-circle me-1"></i>
                                <span>{{ __('admin::admin.my_account') }}</span>
                            </a>

                            <a href="{{ route('admin.account.email') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-account-edit me-1"></i>
                                <span>{{ __('admin::admin.update_email') }}</span>
                            </a>

                            <a href="{{ route('admin.account.password') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-lock-outline me-1"></i>
                                <span>{{ __('admin::admin.update_password') }}</span>
                            </a>
                            <!-- item-->
                            <a href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="dropdown-item notify-item">
                                <i class="mdi mdi-logout me-1"></i>
                                <span>{{ __('admin::admin.logout') }}</span>
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                  class="d-none">@csrf</form>
                        </div>
                    </li>

                </ul>
                <button class="button-menu-mobile open-left">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="app-search d-none d-lg-block">
                    <form method="get" action="{{ route('admin.search') }}">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" required
                                   placeholder="{{ __('admin::admin.search_placeholder') }}"
                                   id="top-search">
                            <span class="mdi mdi-magnify search-icon"></span>
                            <button class="input-group-text btn-primary"
                                    type="submit">{{ __('admin::admin.search') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="container-fluid">
                @yield('body')
            </div>
            <!-- container -->
        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {!! config('admin.copyright') !!}
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            @foreach(config('admin.footer_menus') as $menu)
                                <a target="_blank" href="{{ route($menu['url']) }}">
                                    {{ __($menu['name']) }}
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
        <h5 class="m-0">{{ __('admin::admin.settings') }}</h5>
    </div>

    <div class="rightbar-content h-100" data-simplebar>

        <div class="p-3">
            <!-- Settings -->
            <h5>{{ __('admin::admin.color_scheme') }}</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light"
                       id="light-mode-check" checked>
                <label class="form-check-label" for="light-mode-check">{{ __('admin::admin.light_mode') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark"
                       id="dark-mode-check">
                <label class="form-check-label" for="dark-mode-check">{{ __('admin::admin.dark_mode') }}</label>
            </div>


            <!-- Width -->
            <h5 class="mt-4">{{ __('admin::admin.width') }}</h5>
            <hr class="mt-1"/>
            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                <label class="form-check-label" for="fluid-check">{{ __('admin::admin.fluid') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                <label class="form-check-label" for="boxed-check">{{ __('admin::admin.boxed') }}</label>
            </div>


            <!-- Left Sidebar-->
            <h5 class="mt-4">{{ __('admin::admin.left_sidebar') }}</h5>
            <hr class="mt-1"/>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                <label class="form-check-label" for="light-check">{{ __('admin::admin.light') }}</label>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                <label class="form-check-label" for="dark-check">{{ __('admin::admin.dark') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                <label class="form-check-label" for="fixed-check">{{ __('admin::admin.fixed') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                <label class="form-check-label" for="condensed-check">{{ __('admin::admin.condensed') }}</label>
            </div>

            <div class="form-check form-switch mb-1">
                <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                <label class="form-check-label" for="scrollable-check">{{ __('admin::admin.scrollable') }}</label>
            </div>

            <div class="d-grid mt-4">
                <button class="btn btn-primary" id="resetBtn">{{ __('admin::admin.reset_to_default') }}</button>
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
<script src="{{ asset('/vendor/admin/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/vendor/dataTables.select.min.js') }}"></script>
<script type="text/javascript">
    let language = {
        "aria": "",
        "paginate": {
            "previous": "<i class='mdi mdi-chevron-left'>",
            "next": "<i class='mdi mdi-chevron-right'>"
        },
        "processing": "<div class=\"spinner-border text-danger\" role=\"status\"></div>",
        "zeroRecords": "{{ __('admin::admin.nothing_found') }}",
        "info": "{{ __('admin::admin.datatable_pagination') }}",
        "infoEmpty": "{{ __('admin::admin.datatable_info_empty') }}",
        "infoFiltered": "{{ __('admin::admin.datatable_filtered') }}",
        "search": "{{ __('admin::admin.search') }}",
        "lengthMenu": "{{ __('admin::admin.display') }} <select class='form-select form-select-sm ms-1 me-1'><option value='10'>10</option><option value='20'>20</option></select> {{ __('admin::admin.entries') }}",
    };
    let pageLength = 10;
</script>
@yield('script')
<!-- third party js ends -->

</body>

</html>
