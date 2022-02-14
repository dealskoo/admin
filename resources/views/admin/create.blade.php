@extends('admin::layouts.panel')

@section('title',__('admin::admin.add_admin'))
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
                        <li class="breadcrumb-item active">{{ __('admin::admin.add_admin') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.add_admin') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.admins.store') }}" method="post">
                        @csrf
                        @if(!empty(session('success')))
                            <div class="alert alert-success">
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        @endif
                        @if(!empty($errors->all()))
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p class="mb-0">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('admin::admin.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           value="{{ old('name') }}" autofocus tabindex="1"
                                           placeholder="{{ __('admin::admin.name_placeholder') }}">
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('admin::admin.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                           value="{{ old('email') }}" autofocus tabindex="2"
                                           placeholder="{{ __('admin::admin.email_placeholder') }}">
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-6 col-md-2 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="role_checkbox_{{$role->id}}"
                                               name="roles[]"
                                               value="{{$role->id}}">
                                        <label for="role_checkbox_{{$role->id}}"
                                               class="form-check-label">{{ $role->name  }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="bio" class="form-label">{{ __('admin::admin.bio') }}</label>
                                    <textarea class="form-control" id="bio" rows="4" name="bio" tabindex="3"
                                              placeholder="{{ __('admin::admin.bio_placeholder') }}">{{ old('bio') }}</textarea>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="status_box" name="status"
                                               tabindex="4"
                                               value="1" checked>
                                        <label for="status_box"
                                               class="form-check-label">{{ __('admin::admin.active') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2" tabindex="5"><i
                                    class="mdi mdi-content-save"></i> {{ __('admin::admin.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
