@extends('admin::layouts.panel')

@section('title',__('admin::admin.notification'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.notification.list') }}">{{ __('admin::admin.notifications') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.notification') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.notification') }}</h4>
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
                            <h5 class="font-18">Your elite author Graphic Optimization reward is ready!</h5>
                            <hr>
                            <div class="d-flex mb-3 mt-1">
                                <small>Dec 14, 2017, 5:17 AM</small>
                            </div>

                            <p>Hi Coderthemes!</p>
                            <p>Clicking ‘Order Service’ on the right-hand side of the above page will present you with
                                an order page. This service has the following Briefing Guidelines that will need to be
                                filled before placing your order:</p>
                            <ol>
                                <li>Your design preferences (Color, style, shapes, Fonts, others)</li>
                                <li>Tell me, why is your item different?</li>
                                <li>Do you want to bring up a specific feature of your item? If yes, please tell me</li>
                                <li>Do you have any preference or specific thing you would like to change or improve on
                                    your item page?
                                </li>
                                <li>Do you want to include your item's or your provider's logo on the page? if yes,
                                    please send it to me in vector format (Ai or EPS)
                                </li>
                                <li>Please provide me with the copy or text to display</li>
                            </ol>

                            <p>Filling in this form with the above information will ensure that they will be able to
                                start work quickly.</p>
                            <p>You can complete your order by putting your coupon code into the Promotional code box and
                                clicking ‘Apply Coupon’.</p>
                            <p><b>Best,</b> <br> Graphic Studio</p>

                        </div>
                        <!-- end .mt-4 -->

                    </div>
                    <!-- end inbox-rightbar-->
                </div>

                <div class="clearfix"></div>
            </div> <!-- end card-box -->

        </div> <!-- end Col -->
    </div>
@endsection
