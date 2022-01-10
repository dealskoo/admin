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
                        <div class="mt-3">
                            <ul class="email-list">
                                <li class="unread">
                                    <div>
                                        <a href="javascript: void(0);" class="email-title">Lucas Kriebel (via
                                            Twitter)</a>
                                    </div>
                                    <div class="email-content">
                                        <div class="email-date">11:49 am</div>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <a href="javascript: void(0);" class="email-title">Randy, me (5)</a>
                                    </div>
                                    <div class="email-content">
                                        <div class="email-date">5:01 am</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- end .mt-4 -->

                        <div class="row">
                            <div class="col-7 mt-1">
                                Showing 1 - 20 of 289
                            </div> <!-- end col-->
                            <div class="col-5">
                                <div class="btn-group float-end">
                                    <button type="button" class="btn btn-light btn-sm"><i
                                            class="mdi mdi-chevron-left"></i></button>
                                    <button type="button" class="btn btn-info btn-sm"><i
                                            class="mdi mdi-chevron-right"></i></button>
                                </div>
                            </div> <!-- end col-->
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
