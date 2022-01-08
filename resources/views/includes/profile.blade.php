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
