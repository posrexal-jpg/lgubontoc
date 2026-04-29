@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => "Citizen's Charter",
    'description' => 'View service standards, requirements, processing times, and public service commitments of the Municipal Government of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Services'],
        ['label' => "Citizen's Charter"],
    ],
])

<style>
    .citizen-charter-viewer {
        width: 100%;
        min-height: 820px;
        border: 1px solid #dce3ea;
        background: #fff;
    }

    @media (max-width: 575.98px) {
        .citizen-charter-viewer {
            min-height: 620px;
        }
    }
</style>

<div class="container frontend-page-content">
    <div class="mb-3 text-right">
        <a class="btn btn-primary" href="{{ asset('file/ct.pdf') }}" target="_blank" rel="noopener">
            Open PDF
        </a>
    </div>

    <iframe class="citizen-charter-viewer" src="{{ asset('file/ct.pdf') }}" title="Citizen's Charter PDF"></iframe>
</div>
@endsection
