@extends('admin::layouts.auth')

@section('title',__('admin::auth.log_in'))

@section('body')
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
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">{{ __('admin::auth.sign_in') }}</h4>
                                <div class="mb-4">
                                    @if(!empty(session('status')))
                                        <p class="text-success mb-0">{{ session('status') }}</p>
                                    @else
                                        @if(empty($errors->all()))
                                            <p class="text-muted mb-0">{{ __('admin::auth.sign_in_tip') }}</p>
                                        @else
                                            @foreach($errors->all() as $error)
                                                <p class="text-danger mb-0">{{ $error }}</p>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <form action="{{ route('admin.login') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="email"
                                           class="form-label">{{ __('admin::auth.email_address') }}</label>
                                    <input class="form-control" type="email" id="email" name="email"
                                           value="{{ old('email') }}" required=""
                                           placeholder="{{ __('admin::auth.email_address_placeholder') }}">
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('admin.password.request') }}"
                                       class="text-muted float-end"><small>{{ __('admin::auth.forgot_your_password') }}</small></a>
                                    <label for="password" class="form-label">{{ __('admin::auth.password') }}</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password"
                                               min="{{ config('admin.password_length') }}" class="form-control"
                                               placeholder="{{ __('admin::auth.password_placeholder') }}">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-remember"
                                               name="remember" checked>
                                        <label class="form-check-label"
                                               for="checkbox-remember">{{ __('admin::auth.remember_me') }}</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary"
                                            type="submit">{{ __('admin::auth.log_in') }}</button>
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
    <!-- end page -->
@endsection
