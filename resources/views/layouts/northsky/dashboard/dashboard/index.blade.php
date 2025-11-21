@extends('app')
@section('title', __('common.dashboard'))

@section('content')
    <section class="py-5 bg-dark text-light">
        <div class="container">
            @if (Auth::user()->state === \App\Models\Enums\UserState::ON_LEAVE)
                <div class="alert alert-warning border border-warning-subtle text-dark shadow-sm mb-4">
                    <strong>@lang('common.notice'):</strong>
                    @lang('dashboard.onleave'): <span class="text-uppercase fw-semibold">@lang('dashboard.fileonenow')</span>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3">
                            <div class="card h-100 bg-black border border-warning-subtle shadow-sm text-center">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="text-uppercase small text-warning mb-1">{{ trans_choice('common.flight', 2) }}</p>
                                    <h3 class="display-6 fw-bold text-light mb-0">{{ $user->flights }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card h-100 bg-black border border-warning-subtle shadow-sm text-center">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="text-uppercase small text-warning mb-1">@lang('dashboard.totalhours')</p>
                                    <h3 class="display-6 fw-bold text-light mb-0">@minutestotime($user->flight_time)</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card h-100 bg-black border border-warning-subtle shadow-sm text-center">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="text-uppercase small text-warning mb-1">@lang('dashboard.yourbalance')</p>
                                    <h3 class="display-6 fw-bold text-light mb-0">{{ optional($user->journal)->balance ?? 0 }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="card h-100 bg-black border border-warning-subtle shadow-sm text-center">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="text-uppercase small text-warning mb-1">@lang('airports.current')</p>
                                    <h3 class="display-6 fw-bold text-light mb-0">{{ $current_airport }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-black border border-secondary-subtle shadow-lg mb-4">
                        <div class="card-header bg-transparent border-secondary d-flex justify-content-between align-items-center text-warning">
                            <span>@lang('dashboard.yourlastreport')</span>
                            @if ($last_pirep !== null)
                                <a href="{{ route('frontend.pireps.index') }}" class="small text-decoration-none text-light">
                                    @lang('dashboard.recentreports')
                                </a>
                            @endif
                        </div>
                        @if ($last_pirep === null)
                            <div class="card-body text-center">
                                <p class="mb-0 text-muted">
                                    @lang('dashboard.noreportsyet')
                                </p>
                                <a href="{{ route('frontend.pireps.create') }}" class="btn btn-outline-warning btn-sm mt-3">
                                    @lang('dashboard.fileonenow')
                                </a>
                            </div>
                        @else
                            @include('dashboard.pirep_card', ['pirep' => $last_pirep])
                        @endif
                    </div>

                    <div class="card bg-black border border-secondary-subtle shadow-lg">
                        <div class="card-header bg-transparent border-secondary text-warning">
                            @lang('widgets.latestnews.news')
                        </div>
                        <div class="card-body">
                            {!! Widget::latestNews(['count' => 5]) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card bg-black border border-secondary-subtle shadow-lg">
                        <div class="card-header bg-transparent border-secondary text-warning">
                            @lang('dashboard.weatherat', ['ICAO' => $current_airport])
                        </div>
                        <div class="card-body">
                            {{ Widget::Weather(['icao' => $current_airport]) }}
                        </div>
                    </div>

                    <div class="card bg-black border border-secondary-subtle shadow-lg mt-4">
                        <div class="card-header bg-transparent border-secondary text-warning">
                            @lang('dashboard.recentreports')
                        </div>
                        <div class="card-body">
                            {{ Widget::latestPireps(['count' => 5]) }}
                        </div>
                    </div>

                    <div class="card bg-black border border-secondary-subtle shadow-lg mt-4">
                        <div class="card-header bg-transparent border-secondary text-warning">
                            @lang('common.newestpilots')
                        </div>
                        <div class="card-body">
                            {{ Widget::latestPilots(['count' => 5]) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
