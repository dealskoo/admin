<!-- Left sidebar -->
<div class="page-aside-left">
    <div class="email-menu-list mt-3">
        <a href="{{ route('admin.notification.list') }}" class="text-danger fw-bold"><i
                class="dripicons-inbox me-2"></i>{{ __('All') }}<span
                class="badge badge-danger-lighten float-end ms-2">{{ Auth::user()->notifications()->count() }}</span></a>
        <a href="{{ route('admin.notification.unread') }}"><i class="dripicons-document me-2"></i>{{ __('Unread') }}
            <span
                class="badge badge-info-lighten float-end ms-2">{{ Auth::user()->unreadNotifications()->count() }}</span></a>
    </div>
</div>
<!-- End Left sidebar -->
