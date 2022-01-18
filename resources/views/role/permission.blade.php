@extends('admin::layouts.panel')

@section('title',__('admin::admin.role_permission'))
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
                        <li class="breadcrumb-item active">{{ __('admin::admin.role_permission') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.role_permission') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
