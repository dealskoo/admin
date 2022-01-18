@extends('admin::layouts.auth')

@section('title',__('admin::admin.your_account_has_been_banned'))

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

                            <div class="text-center m-auto">
                                <i class=" uil-multiply text-danger" style="font-size: 80px"></i>
                                <h4 class="text-dark-50 text-center mt-4 fw-bold">{{ __('admin::admin.your_account_has_been_banned') }}</h4>
                                <p class="text-muted mb-4">
                                    {{ __('admin::admin.if_you_have_any_questions') }}
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
@endsection
