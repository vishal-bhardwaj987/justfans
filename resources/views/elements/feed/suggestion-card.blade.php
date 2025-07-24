<div class="suggestion-box {{ isset($classes) ? $classes : '' }} card text-white border-0 rounded mb-3" data-memberuserid="{{ $profile->id }}">
    <!-- Background Cover -->
    <div style="background: url('{{ $profile->cover ?? asset('img/default-cover.jpg') }}'); background-size: cover; background-position: center;" class="card-img suggestion-header-bg"></div>

    <!-- Overlay -->
    <div class="card-img-overlay p-0">
        <div class="h-100 w-100 p-0 m-0 position-absolute z-index-0">
            <div class="h-50"></div>
            <div class="h-50 w-100 half-bg d-flex rounded"></div>
        </div>

        <div class="card-text w-100 h-100 d-flex align-items-center">

            <!-- Avatar -->
            <div class="d-flex align-items-center justify-content-center pl-3 pr-2 z-index-3">
                <img src="{{ $profile->avatar ?? asset('img/default-avatar.png') }}"
                     alt="Avatar"
                     class="rounded-circle"
                     style="width: 60px; height: 60px; object-fit: cover;" />
            </div>

            <!-- User Info -->
            <div class="w-100 z-index-3 text-truncate">
                <!-- Trash Icon if list mode -->
                <div class="h-50 d-flex flex-row-reverse pr-1">
                    @if(isset($isListMode) && ($isListManageable))
                        <span class="h-pill h-pill-accent rounded mt-1 suggestion-card-btn"
                              data-toggle="tooltip"
                              data-placement="bottom"
                              title="{{ __('Delete') }}"
                              onclick="Lists.showListMemberRemoveModal({{ $profile->id }})">
                            @include('elements.icon', ['icon' => 'trash-outline', 'variant' => 'medium'])
                        </span>
                    @endif
                </div>

                <!-- Name & Username -->
                <div class="h-50 w-100 z-index-3 d-flex flex-column mt-1 text-truncate pr-2">
                    <div class="m-0 h6 text-truncate">
                        <a href="{{ route('profile', ['username' => $profile->username]) }}" class="text-white d-flex align-items-center">
                            {{ $profile->name }}
                            @if($profile->email_verified_at && $profile->birthdate && ($profile->verification && $profile->verification->status == 'verified'))
                                <span data-toggle="tooltip" data-placement="top" title="{{ __('Verified user') }}">
                                    @include('elements.icon', ['icon' => 'checkmark-circle-outline', 'centered' => true, 'classes' => 'ml-1'])
                                </span>
                            @endif
                        </a>
                    </div>
                    <div class="m-0 text-truncate small">
                        <span>@</span>
                        <a href="{{ route('profile', ['username' => $profile->username]) }}" class="text-white">
                            {{ $profile->username }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
