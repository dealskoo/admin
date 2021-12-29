@extends('admin::layouts.auth')

@section('title','Log In')

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
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <form action="{{ route('admin.login') }}" method="post">

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input class="form-control" type="email" id="email" required=""
                                           placeholder="Enter your email">
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('admin.password.request') }}" class="text-muted float-end"><small>Forgot
                                            your password?</small></a>
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control"
                                               placeholder="Enter your password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-remember" checked>
                                        <label class="form-check-label" for="checkbox-remember">Remember me</label>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit">Log In</button>
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
