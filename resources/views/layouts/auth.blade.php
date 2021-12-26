<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | {{ config('admin.title') }} - {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/favicon.ico')}}">

    <!-- App css -->
    <link href="{{ asset('/vendor/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/vendor/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"
          id="light-style"/>
    <link href="{{ asset('/vendor/admin/css/app-dark.min.css') }}" rel="stylesheet" type="text/css"
          id="dark-style"/>

</head>

<body class="loading authentication-bg"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

@yield('body')

<footer class="footer footer-alt">
    2014 - {{ date('Y') }} © {{ config('app.name') }}
</footer>

<!-- bundle -->
<script src="{{ asset('/vendor/admin/js/vendor.min.js') }}"></script>
<script src="{{ asset('/vendor/admin/js/app.min.js') }}"></script>

</body>
</html>
