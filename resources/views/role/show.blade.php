@extends('admin::layouts.panel')

@section('title',__('admin::admin.role_information'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('admin::admin.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.role_information') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.role_information') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('admin::admin.c_name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                       value="{{ $role->name }}" readonly autofocus tabindex="1"
                                       placeholder="{{ __('admin::admin.c_name_placeholder') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
