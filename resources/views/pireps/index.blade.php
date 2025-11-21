@extends('app')
@section('title', trans_choice('common.pirep', 2))

@section('content')
    <div class="northsky-section page-pireps-index mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <div>
                <p class="text-warning text-uppercase small mb-1">{{ trans_choice('pireps.pilotreport', 2) }}</p>
                <h2 class="h4 mb-0 text-white">{{ __('Your Filed Reports') }}</h2>
            </div>
            <a class="btn btn-warning fw-semibold"
               href="{{ route('frontend.pireps.create') }}">@lang('pireps.filenewpirep')</a>
        </div>

        @include('pireps.table')
    </div>
@endsection
