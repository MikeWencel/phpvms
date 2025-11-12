@once
    <style>
        .northsky-inline-nav .nav-link,
        .northsky-inline-nav .nav-link:visited {
            color: #ffffff !important;
        }

        .northsky-inline-nav .nav-link:hover,
        .northsky-inline-nav .nav-link:focus {
            color: #c9a646 !important;
        }
    </style>
@endonce
<nav class="navbar navbar-dark northsky-nav shadow-sm" data-bs-theme="dark">
    <div class="container d-flex align-items-center justify-content-between gap-3">
        <a class="navbar-brand text-uppercase fw-semibold mb-0" href="{{ url('/') }}">
            NorthSky <span class="text-warning">VA</span>
        </a>
        <div class="d-none d-lg-flex flex-grow-1 justify-content-center">
            <ul class="nav nav-pills northsky-inline-nav">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('frontend.dashboard.index') }}">@lang('common.dashboard')</a>
                    </li>
                @endauth
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.livemap.index') }}">@lang('common.livemap')</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.pilots.index') }}">{{ trans_choice('common.pilot', 2) }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.flightschool.index') }}">Flight School</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.flights.index') }}">{{ trans_choice('common.flight', 2) }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.fleet.index') }}">Fleet</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.pireps.index') }}">{{ trans_choice('common.pirep', 2) }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('frontend.downloads.index') }}">{{ trans_choice('common.download', 2) }}</a></li>
            </ul>
        </div>

        <div class="d-flex align-items-center gap-2">
            <div class="dropdown">
                <button class="btn btn-link nav-link dropdown-toggle p-0 text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="fi fi-{{ $languages[$locale]['flag-icon'] }}"></span> {{ $languages[$locale]['display'] }}
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    @foreach ($languages as $lang => $language)
                        @if ($lang != $locale)
                            <a class="dropdown-item" href="{{ route('frontend.lang.switch', $lang) }}">
                                <span class="fi fi-{{ $language['flag-icon'] }}"></span> {{ $language['display'] }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            @auth
                <div class="dropdown">
                    <button class="btn btn-link nav-link dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar?->url ?? Auth::user()->gravatar(32) }}" class="rounded-circle" width="32" height="32" alt="Avatar">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">
                            <i class="far fa-user"></i>&nbsp;&nbsp;@lang('common.profile')
                        </a>
                        @if (Auth::user()->hasAdminAccess())
                            <a class="dropdown-item" href="{{ url('/admin') }}">
                                <i class="fas fa-circle-notch"></i>&nbsp;&nbsp;@lang('common.administration')
                            </a>
                        @endif
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">
                            <i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;@lang('common.logout')
                        </a>
                    </div>
                </div>
            @else
                <a class="nav-link px-2" href="{{ url('/login') }}">@lang('common.login')</a>
            @endauth
        </div>
    </div>
</nav>
