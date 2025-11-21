@extends('app')
@section('title', __('pireps.fileflightreport'))

@section('css')
    <style>
        .page-pireps-create .card-header {
            background: linear-gradient(135deg, #c9a646, #5c4520) !important;
            color: #0d0d0d !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        }
        .page-pireps-create .card-header.bg-primary,
        .page-pireps-create .card-header.text-white {
            background: linear-gradient(135deg, #c9a646, #5c4520) !important;
            color: #0d0d0d !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05) !important;
        }
    </style>
@endsection

@section('content')
    <div class="northsky-section page-pireps-create">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
            <div>
                <p class="text-warning text-uppercase small mb-1">@lang('pireps.fileflightreport')</p>
                <h2 class="h4 mb-0 text-white">@lang('pireps.newflightreport')</h2>
            </div>
        </div>

        <form method="post" action="{{ route('frontend.pireps.store') }}">
            @csrf
            @include('pireps.fields')
        </form>
    </div>
@endsection

@include('pireps.scripts')
