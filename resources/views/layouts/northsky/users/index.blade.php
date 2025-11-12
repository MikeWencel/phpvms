@extends('app')
@section('title', trans_choice('common.pilot', 2))

@section('content')
    <section class="py-5 bg-dark text-light rounded-4">
        <div class="container">
            <h2 class="text-warning text-center mb-4 display-5">Pilot Roster</h2>
            <div class="table-responsive">
                <table class="table table-dark table-borderless align-middle text-light">
                    <thead class="border-bottom border-warning text-uppercase small">
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Pilot</th>
                            <th>Rank</th>
                            <th class="text-center">Hours</th>
                            <th class="text-center">Flights</th>
                            <th class="text-center">Last Flight</th>
                            <th class="text-end">Progress</th>
                            <th class="text-end">Epaulette</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $pilot)
                            @php
                                $minutes = (int) ($pilot->flight_time ?? 0);
                                $rankRequirement = optional($pilot->rank)->hours_required
                                    ? optional($pilot->rank)->hours_required * 60
                                    : null;
                                $progressPercent = $rankRequirement
                                    ? min(100, ($minutes / max(1, $rankRequirement)) * 100)
                                    : null;
                                $lastFlightDate = optional($pilot->last_pirep)->created_at?->format('Y-m-d') ?? '—';
                                $epauletteFile = $pilot->rank
                                    ? strtolower(str_replace(' ', '_', $pilot->rank->name)).'.png'
                                    : null;
                            @endphp
                            <tr class="border-bottom border-secondary">
                                <td class="text-center fw-bold text-light">{{ $pilot->pilot_id ?? $pilot->id }}</td>
                                <td class="fw-semibold text-light">
                                    @if ($pilot->country)
                                        <img src="https://flagcdn.com/h20/{{ strtolower($pilot->country) }}.png"
                                            alt="{{ $pilot->country }}" class="me-2" style="height: 14px;">
                                    @endif
                                    <a href="{{ route('frontend.profile.show', [$pilot->id]) }}"
                                        class="text-warning text-decoration-none">
                                        {{ $pilot->name_private }}
                                    </a>
                                </td>
                                <td><span class="text-warning">{{ optional($pilot->rank)->name ?? '—' }}</span></td>
                                <td class="text-center">@minutestotime($pilot->flight_time ?? 0)</td>
                                <td class="text-center">{{ number_format($pilot->flights ?? 0) }}</td>
                                <td class="text-center">{{ $lastFlightDate }}</td>
                                <td class="text-end" style="min-width: 140px;">
                                    @if ($progressPercent !== null)
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: {{ number_format($progressPercent, 1) }}%;"
                                                aria-valuenow="{{ number_format($progressPercent, 1) }}" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if ($epauletteFile && file_exists(public_path('images/epaulets/'.$epauletteFile)))
                                        <img src="{{ asset('images/epaulets/'.$epauletteFile) }}" alt="Rank epaulette"
                                            title="{{ optional($pilot->rank)->name }}" style="height: 58px; transform: rotate(-90deg); opacity: .85;">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $users->withQueryString()->links('pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
