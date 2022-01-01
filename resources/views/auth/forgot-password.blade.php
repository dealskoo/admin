@extends('admin::layouts.auth')

@if(!empty(session('status')))
    @section('title',__('admin::auth.confirm_email'))
@else
    @section('title',__('admin::auth.recover_password'))
@endif

@section('body')
    @if(!empty(session('status')))
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span><img src="{{ asset(config('admin.logo_dark')) }}" alt="" height="40"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">

                                <div class="text-center m-auto">
                                    <img src="{{ asset('/vendor/admin/images/mail_sent.svg') }}" alt="mail sent image"
                                         height="64">
                                    <h4 class="text-dark-50 text-center mt-4 fw-bold">{{ __('admin::auth.please_check_your_email') }}</h4>
                                    <p class="text-muted mb-4">
                                        {!! __('admin::auth.a_email_has_been_send_to',['email'=>old('email'),'company'=>config('app.name')]) !!}
                                    </p>
                                </div>

                                <form action="{{ route('admin.dashboard') }}">
                                    <div class="mb-0 text-center">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i>
                                            {{ __('admin::auth.back_to') }} {{ __('admin::auth.login') }}
                                        </button>
                                    </div>
                                </form>

                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    @else
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="{{ route('admin.dashboard') }}">
                                    <span><img src="{{ asset(config('admin.logo_dark')) }}" alt="" height="40"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 fw-bold">{{ __('admin::auth.reset_password') }}</h4>
                                    <div class="mb-4">
                                        @if(empty($errors->all()))
                                            <p class="text-muted mb-0">{{ __('admin::auth.reset_password_tip') }}</p>
                                        @else
                                            @foreach($errors->all() as $error)
                                                <p class="text-danger mb-0">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <form action="{{ route('admin.password.email') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email"
                                               class="form-label">{{ __('admin::auth.email_address') }}</label>
                                        <input class="form-control" type="email" id="email" name="email" required=""
                                               value="{{ old('email') }}" autofocus
                                               placeholder="{{ __('admin::auth.email_address_placeholder') }}">
                                    </div>

                                    <div class="mb-0 text-center">
                                        <button class="btn btn-primary"
                                                type="submit">{{ __('admin::auth.reset_password') }}</button>
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">{{ __('admin::auth.back_to') }} <a
                                        href="{{ route('admin.login') }}"
                                        class="text-muted ms-1"><b>{{ __('admin::auth.log_in') }}</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    @endif
@endsection
