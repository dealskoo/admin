@extends('admin::layouts.panel')

@section('title',__('admin::admin.my_account'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.my_account') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.my_account') }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ Auth::user()->avatar_url }}" class="rounded-circle avatar-lg img-thumbnail"
                         alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ Auth::user()->name }}</h4>
                    <p class="text-muted font-14">Owner</p>

                    <div class="text-start mt-3">
                        @isset(Auth::user()->bio)
                            <h4 class="font-13 text-uppercase">{{ __('admin::admin.about_me') }} :</h4>
                            <p class="text-muted font-13 mb-3">
                                {{ Auth::user()->bio }}
                            </p>
                        @endisset
                        <p class="text-muted mb-2 font-13"><strong>{{ __('admin::admin.name') }} :</strong><span
                                class="ms-2">{{ Auth::user()->name }}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>{{ __('admin::admin.email') }} :</strong><span
                                class="ms-2">{{ Auth::user()->email }}</span>
                        </p>

                        <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.role') }} :</strong><span
                                class="ms-2">Owner</span></p>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h5 class="mb-4 text-uppercase"><i
                                class="mdi mdi-account-circle me-1"></i> {{ __('admin::admin.personal_info') }}</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('admin::admin.name') }}</label>
                                    <input type="text" class="form-control" id="name"
                                           placeholder="{{ __('admin::admin.name_placeholder') }}">
                                </div>
                            </div>
                        </div> <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="bio" class="form-label">{{ __('admin::admin.bio') }}</label>
                                    <textarea class="form-control" id="bio" rows="4"
                                              placeholder="{{ __('admin::admin.bio_placeholder') }}"></textarea>
                                </div>
                            </div> <!-- end col -->
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
