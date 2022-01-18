<div class="card text-center">
    <div class="card-body">
        <div class="avatar-box">
            <img src="{{ Auth::user()->avatar_url }}" class="rounded-circle avatar-lg img-thumbnail avatar-pic"
                 alt="profile-image">
            <div class="upload-image">
                <i class="mdi mdi-camera upload-button"></i>
                <input class="file-upload" type="file" accept="image/*"
                       data-action="{{ route('admin.account.avatar') }}"/>
            </div>
        </div>

        <h4 class="mb-0 mt-2">{{ Auth::user()->name }}</h4>
        <p class="text-muted font-14">{!! Auth::user()->status?'<span class="badge bg-success">'.__('admin::admin.active').'</span>':'<span class="badge bg-danger">'.__('admin::admin.inactive').'</span>' !!}</p>

        <div class="text-start mt-3">
            @isset(Auth::user()->bio)
                <h4 class="font-13 text-uppercase">{{ __('admin::admin.about_me') }} :</h4>
                <p class="text-muted font-13 mb-3">
                    {{ Auth::user()->bio }}
                </p>
            @endisset
            <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.name') }} :</strong><span
                    class="ms-2">{{ Auth::user()->name }}</span></p>

            <p class="text-muted mb-2 font-13"><strong>{{ __('admin::admin.email') }} :</strong><span
                    class="ms-2">{{ Auth::user()->email }}</span>
            </p>

            <p class="text-muted mb-1 font-13"><strong>{{ __('admin::admin.role') }} :</strong>
                @if(Auth::user()->owner)
                    <span class="ms-1 badge bg-success">{{ __('admin::admin.owner') }}</span>
                @else
                    @foreach(Auth::user()->roles as $role)
                        <span class="ms-1 badge bg-success">{{ $role->name }}</span>
                    @endforeach
                @endif
            </p>
        </div>

    </div> <!-- end card-body -->
</div> <!-- end card -->
