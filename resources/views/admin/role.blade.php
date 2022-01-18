@extends('admin::layouts.panel')

@section('title',__('admin::admin.admin_role'))
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
                        <li class="breadcrumb-item active">{{ __('admin::admin.admin_role') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.admin_role') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-4 text-uppercase"><i
                            class="mdi mdi-account-multiple-plus me-1"></i> {{ $admin->name }}</h5>
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
                    <form action="{{ route('admin.admins.role',$admin) }}" method="post">
                        @csrf
                        <div class="row">
                            @foreach($roles as $role)
                                <div class="col-6 col-md-2 mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="role_checkbox_{{$role->id}}"
                                               name="roles[]"
                                               value="{{$role->id}}" {{ $admin->roles->contains($role->id)?'checked':'' }}>
                                        <label for="role_checkbox_{{$role->id}}"
                                               class="form-check-label">{{ $role->name  }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
