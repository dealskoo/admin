@extends('admin::layouts.panel')

@section('title',__('admin::admin.admin_information'))
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
                        <li class="breadcrumb-item active">{{ __('admin::admin.admin_information') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.admin_information') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar-box">
                        <img src="{{ $admin->avatar_url }}" class="rounded-circle avatar-lg img-thumbnail"
                             alt="profile-image">
                    </div>

                    <h4 class="mb-0 mt-2">{{ $admin->name }}</h4>
                    <p class="text-muted font-14">{!! $admin->status?'<span class="badge bg-success">'.__('admin::admin.active').'</span>':'<span class="badge bg-danger">'.__('admin::admin.inactive').'</span>' !!}</p>

                    <div class="text-start mt-3">
                        @isset($admin->bio)
                            <h4 class="font-13 text-uppercase">{{ __('admin::admin.about_me') }} :</h4>
                            <p class="text-muted font-13 mb-3">
                                {{ $admin->bio }}
                            </p>
                        @endisset
                        <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.name') }} :</strong><span
                                class="ms-2">{{ $admin->name }}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>{{ __('admin::admin.email') }} :</strong><span
                                class="ms-2">{{ $admin->email }}</span>
                        </p>

                        <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.role') }} :</strong>
                            @foreach($admin->roles as $role)
                                <span class="ms-1 badge bg-success">{{ $role->name }}</span>
                            @endforeach
                        </p>

                        <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.created_at') }} :</strong><span
                                class="ms-2">{{ $admin->created_at }}</span>
                        </p>
                        <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.updated_at') }} :</strong><span
                                class="ms-2">{{ $admin->updated_at }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
