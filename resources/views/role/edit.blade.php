@extends('admin::layouts.panel')

@section('title',__('admin::admin.edit_role'))
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
                        <li class="breadcrumb-item active">{{ __('admin::admin.edit_role') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.edit_role') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.roles.update',$role) }}" method="post">
                        @csrf
                        @method('PUT')
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
                                    <label for="name" class="form-label">{{ __('admin::admin.c_name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                           value="{{ old('name',$role->name) }}" autofocus tabindex="1"
                                           placeholder="{{ __('admin::admin.c_name_placeholder') }}">
                                </div>
                            </div>
                        </div> <!-- end row -->
                        <div class="row">
                            @foreach($permissions->all() as $key=>$permission)
                                <div class="col-6 col-md-2 mb-1">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="permission_{{$key}}"
                                               name="permissions[]" {{ $role->canDo($key)?'checked':'' }}
                                               value="{{$key}}">
                                        <label for="permission_{{$key}}"
                                               class="form-check-label">{{ __($permission['permission']->getName()) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2" tabindex="2"><i
                                    class="mdi mdi-content-save"></i> {{ __('admin::admin.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
