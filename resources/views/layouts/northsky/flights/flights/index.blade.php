@extends('app')
@section('title', trans_choice('common.flight', 2))

@section('content')
    @php
        $flightCount = method_exists($flights, 'total') ? $flights->total() : $flights->count();
    @endphp
    <section class="py-5 bg-dark text-light">
        @once
            <style>
                .northsky-flight-table th a {
                    color: #f3c55b;
                    text-decoration: none;
                    font-weight: 600;
                }

                .northsky-flight-table th a:hover {
                    color: #ffd875;
                }
            </style>
        @endonce
        <div class="container">
            @include('flash::message')

            <div class="row g-4">
                <div class="col-xl-9">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-3">
                        <div>
                            <h1 class="display-5 text-warning mb-1">{{ trans_choice('common.flight', 2) }}</h1>
                            <p class="text-muted mb-0">
                                {{ trans_choice('common.flight', $flightCount) }} · {{ number_format($flightCount) }}
                            </p>
                        </div>
                        <span class="badge text-bg-warning text-dark px-3 py-2">
                            {{ number_format($flightCount) }} {{ trans_choice('common.flight', $flightCount) }}
                        </span>
                    </div>

                    <div class="d-xl-none mb-4">
                        <button class="btn btn-outline-warning w-100" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mobileFlightSearch" aria-expanded="false" aria-controls="mobileFlightSearch">
                            @lang('flights.search')
                        </button>
                        <div class="collapse mt-3" id="mobileFlightSearch">
                            <div class="card bg-black border border-warning-subtle shadow">
                                <div class="card-body">
                                    @include('flights.search')
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('flights.table')
                </div>

                <div class="col-xl-3 d-none d-xl-block">
                    <div class="card bg-black border border-warning-subtle shadow-lg sticky-top" style="top: 90px;">
                        <div class="card-header bg-transparent border-bottom border-warning-subtle text-warning text-uppercase small">
                            @lang('flights.search')
                        </div>
                        <div class="card-body">
                            @include('flights.search')
                        </div>
                    </div>
                </div>
            </div>

            @if (method_exists($flights, 'hasPages') ? $flights->hasPages() : $flightCount > 0)
                <div class="row mt-4">
                    <div class="col-xl-9 col-lg-12">
                        <div class="bg-black border border-secondary-subtle rounded-3 p-3 text-center shadow-sm">
                            {{ $flights->withQueryString()->links('pagination.bootstrap-5') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    @if (setting('bids.block_aircraft', false))
        @include('flights.bids_aircraft')
    @endif
@endsection

@include('flights.scripts')
