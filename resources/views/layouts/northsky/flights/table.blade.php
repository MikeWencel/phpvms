<div class="row">
    <div class="col">
        <div class="table-responsive mb-3 northsky-flight-table">
            <table class="table table-sm table-dark table-borderless align-middle text-uppercase small mb-0">
                <thead class="text-warning">
                    <tr>
                        <th>@sortablelink('airline_id', __('common.airline'))</th>
                        <th>@sortablelink('flight_number', __('flights.flightnumber'))</th>
                        <th>@sortablelink('dpt_airport_id', __('airports.departure'))</th>
                        <th>@sortablelink('arr_airport_id', __('airports.arrival'))</th>
                        <th>@sortablelink('dpt_time', 'STD')</th>
                        <th>@sortablelink('arr_time', 'STA')</th>
                        <th>@sortablelink('distance', 'Distance')</th>
                        <th>@sortablelink('flight_time', 'Flight Time')</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@foreach ($flights as $flight)
    @php
        $isSaved = isset($saved[$flight->id]);
    @endphp
    <div class="card bg-black border border-secondary-subtle text-light shadow-lg mb-4">
        <div class="card-body">
            <div class="d-flex flex-column flex-lg-row justify-content-between gap-3">
                <div class="d-flex align-items-center gap-3">
                    @if (optional($flight->airline)->logo)
                        <img src="{{ $flight->airline->logo }}" alt="{{ $flight->airline->name }}" class="rounded"
                            style="max-width: 80px; width: 100%; height: auto;">
                    @else
                        <span class="text-warning fw-semibold">{{ $flight->airline->name }}:</span>
                    @endif
                    <div>
                        <div class="fs-4 fw-semibold">
                            @if ($flight->airline->iata)
                                {{ $flight->airline->icao }}{{ $flight->flight_number }} |
                            @endif
                            {{ $flight->ident }}
                            @if (filled($flight->callsign) && !setting('simbrief.callsign', true))
                                {{ '| ' . $flight->atc }}
                            @endif
                        </div>
                        <p class="text-muted mb-0 small text-uppercase">
                            {{ $flight->flight_type }}
                            <span class="text-secondary">
                                ({{ \App\Models\Enums\FlightType::label($flight->flight_type) }})
                            </span>
                        </p>
                    </div>
                </div>
                <div class="text-lg-end">
                    <span class="badge text-bg-warning text-dark px-3 py-2">
                        {{ $flight->flight_type }}
                    </span>
                </div>
            </div>

            <div class="row text-center text-lg-start mt-4">
                <div class="col-md-5">
                    <div class="fs-1 fw-bold">
                        <a class="text-decoration-none text-light" href="{{ route('frontend.airports.show', [$flight->dpt_airport_id]) }}">
                            {{ $flight->dpt_airport_id }}
                        </a>
                    </div>
                    <div class="text-muted small">{{ $flight->dpt_airport->name }}</div>
                    <div class="text-warning fw-semibold fs-5">{{ $flight->dpt_time }}</div>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <div class="text-muted text-uppercase small">→</div>
                </div>
                <div class="col-md-5 text-lg-end">
                    <div class="fs-1 fw-bold">
                        <a class="text-decoration-none text-light" href="{{ route('frontend.airports.show', [$flight->arr_airport_id]) }}">
                            {{ $flight->arr_airport_id }}
                        </a>
                    </div>
                    <div class="text-muted small">{{ $flight->arr_airport->name }}</div>
                    <div class="text-warning fw-semibold fs-5">{{ $flight->arr_time }}</div>
                </div>
            </div>

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mt-4 gap-3">
                <div class="text-muted">
                    @if ($flight->flight_time)
                        <span class="fw-semibold text-light">@minutestotime($flight->flight_time)</span>
                    @endif
                    @if ($flight->flight_time && $flight->distance)
                        <span class="mx-1">/</span>
                    @endif
                    @if ($flight->distance)
                        <span class="fw-semibold text-light">{{ $flight->distance }} nm</span>
                    @endif
                </div>
                <div class="text-light">
                    @if (count($flight->subfleets) !== 0)
                        @php
                            $arr = [];
                            foreach ($flight->subfleets as $sf) {
                                $arr[] = "{$sf->type}";
                            }
                            $display = count($arr) > 2 ? implode(', ', array_slice($arr, 0, 2)) . '…' : implode(', ', $arr);
                            $allSubfleets = implode(', ', $arr);
                        @endphp
                        <span data-bs-toggle="popover" data-bs-trigger="hover" data-bs-placement="bottom"
                            data-bs-content="{{ $allSubfleets }}">
                            {{ $display }}
                        </span>
                    @else
                        <span class="text-muted">Any Subfleet</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-top border-secondary-subtle d-flex flex-wrap gap-2">
            <a class="btn btn-sm btn-warning text-dark fw-semibold" href="{{ route('frontend.flights.show', [$flight->id]) }}">
                {{ __('flights.viewflight') }}
            </a>
            @if (!setting('pilots.only_flights_from_current') || $flight->dpt_airport_id === $user->current_airport->icao)
                @if ($acars_plugin)
                    @if (isset($saved[$flight->id]))
                        <a href="vmsacars:bid/{{ $saved[$flight->id] }}" class="btn btn-sm btn-outline-light">
                            Load in vmsACARS
                        </a>
                    @else
                        <a href="vmsacars:flight/{{ $flight->id }}" class="btn btn-sm btn-outline-light">
                            Load in vmsACARS
                        </a>
                    @endif
                @endif
                @if ($simbrief !== false)
                    @if ($flight->simbrief && $flight->simbrief->user_id === $user->id)
                        <a href="{{ route('frontend.simbrief.briefing', $flight->simbrief->id) }}"
                            class="btn btn-sm btn-outline-light">
                            {{ __('flights.viewsimbrief') }}
                        </a>
                    @else
                        @if ($simbrief_bids === false || ($simbrief_bids === true && isset($saved[$flight->id])))
                            @php
                                $aircraft_id = isset($saved[$flight->id]) ? App\Models\Bid::find($saved[$flight->id])->aircraft_id : null;
                            @endphp
                            <a href="{{ route('frontend.simbrief.generate') }}?flight_id={{ $flight->id }}@if ($aircraft_id) &aircraft_id={{ $aircraft_id }} @endif"
                                class="btn btn-sm btn-outline-light">
                                {{ __('flights.createsimbrief') }}
                            </a>
                        @endif
                    @endif
                @endif
                <a href="{{ route('frontend.pireps.create') }}?flight_id={{ $flight->id }}" class="btn btn-sm btn-outline-light">
                    {{ __('pireps.newpirep') }}
                </a>
                <button
                    class="btn btn-sm save_flight {{ $isSaved ? 'btn-outline-danger text-danger border-danger' : 'btn-outline-warning text-warning border-warning' }}"
                    x-id="{{ $flight->id }}" x-saved-class="btn-outline-danger" type="button"
                    title="@lang('flights.addremovebid')">
                    {{ $isSaved ? __('flights.removebid') : __('flights.addbid') }}
                </button>
            @endif
        </div>
    </div>
@endforeach
