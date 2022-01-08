@extends('admin::layouts.panel')

@section('title',__('admin::admin.update_email'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.update_email') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.update_email') }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            @include('admin::includes.profile')
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h5 class="mb-4 text-uppercase"><i
                                class="mdi mdi-account-edit me-1"></i> {{ __('admin::admin.update_email') }}</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('admin::admin.email') }}</label>
                                    <input type="email" class="form-control" id="email"
                                           placeholder="{{ __('admin::admin.email_placeholder') }}">
                                </div>
                            </div>
                        </div> <!-- end row -->

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2"><i
                                    class="mdi mdi-content-save"></i> {{ __('admin::admin.save') }}
                            </button>
                        </div>
                    </form>
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>

@endsection
