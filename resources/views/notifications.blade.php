@extends('admin::layouts.panel')
@section('title',__('admin::admin.notifications'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.notifications') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.notifications') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Right Sidebar -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin::includes.notification-sidebar')
                    <div class="page-aside-right">
                        @if(count($notifications)>0)
                            <div class="mt-3">
                                <ul class="email-list">
                                    @foreach($notifications as $notification)
                                        <li @if(!$notification->read_at)class="unread"@endif>
                                            <div class="row">
                                                <div class="col-lg-10 ps-4">
                                                    <a href="{{ route('admin.notification.show',$notification) }}">{{ __($notification->data['title']) }}</a>
                                                </div>
                                                <div class="col-lg-2">
                                                    <span>{{ $notification->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                    @else
                        @include('admin::nodata')
                    @endif
                    <!-- end .mt-4 -->

                        <div class="row">
                            {{ $notifications->withQueryString()->links('admin::pagination.simple') }}
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end inbox-rightbar-->
                </div>
                <!-- end card-body -->
                <div class="clearfix"></div>
            </div> <!-- end card-box -->

        </div> <!-- end Col -->
    </div>
@endsection
