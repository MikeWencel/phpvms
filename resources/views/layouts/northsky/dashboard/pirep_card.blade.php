<div class="card-body text-light">
    <div class="row g-3 align-items-center">
        <div class="col-lg-9">
            <p class="mb-1">
                <a class="text-warning text-decoration-none fw-semibold" href="{{ route('frontend.pireps.show', [$pirep->id]) }}">
                    {{ $pirep->ident }}
                </a>
                <span class="text-muted">·</span>
                {{ $pirep->dpt_airport->name }}
                (<a class="text-decoration-none text-light" href="{{ route('frontend.airports.show', ['id' => $pirep->dpt_airport->icao]) }}">
                    {{ $pirep->dpt_airport->icao }}
                </a>)
                <span class="mx-1 text-muted">&rarr;</span>
                {{ $pirep->arr_airport->name }}
                (<a class="text-decoration-none text-light" href="{{ route('frontend.airports.show', ['id' => $pirep->arr_airport->icao]) }}">
                    {{ $pirep->arr_airport->icao }}
                </a>)
            </p>
            <p class="mb-0 small text-muted">
                {{ optional($pirep->aircraft)->ident }} · @minutestotime($pirep->flight_time)
            </p>
        </div>
        <div class="col-lg-3 text-lg-end text-start">
            @if($pirep->state === PirepState::PENDING)
                <span class="badge bg-warning text-dark">
            @elseif($pirep->state === PirepState::ACCEPTED)
                <span class="badge bg-success">
            @elseif($pirep->state === PirepState::REJECTED)
                <span class="badge bg-danger">
            @else
                <span class="badge bg-info">
            @endif
                {{ PirepState::label($pirep->state) }}
            </span>
            <a href="{{ route('frontend.pireps.edit', [$pirep->id]) }}" class="btn btn-outline-light btn-sm ms-lg-2 mt-2 mt-lg-0">
                @lang('common.edit')
            </a>
        </div>
    </div>
</div>
