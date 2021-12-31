@extends('admin::layouts.auth')

@section('title',__('admin::auth.create_new_password'))

@section('body')
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="{{ route('admin.dashboard') }}">
                                <span><img src="{{ asset(config('admin.logo_dark')) }}" alt="" height="40"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">{{ __('admin::auth.create_new_password') }}</h4>
                                <p class="text-muted mb-4">{{ __('admin::auth.create_new_password_tip',['length'=>config('admin.password_length')]) }}</p>
                            </div>

                            <form action="{{ route('admin.password.update') }}" method="post">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('admin::auth.email_address') }}</label>
                                    <input class="form-control" type="email" id="email" required=""
                                           placeholder="{{ __('admin::auth.email_address_placeholder') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('admin::auth.password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                               placeholder="{{ __('admin::auth.password_placeholder') }}">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="password"
                                           class="form-label">{{ __('admin::auth.confirm_password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                               placeholder="{{ __('admin::auth.confirm_password_placeholder') }}">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <button class="btn btn-primary"
                                            type="submit">{{ __('admin::auth.create_new_password') }}</button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
@endsection
