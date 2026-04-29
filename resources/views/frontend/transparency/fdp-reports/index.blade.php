@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => 'Full Disclosure Policy Reports',
    'description' => 'Access published local government financial and project implementation reports from the Municipality of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Transparency'],
        ['label' => 'FDP Reports'],
    ],
])

<style>
    .fdp-report-list {
        display: grid;
        gap: 1rem;
    }

    .fdp-report {
        background: #fff;
        border: 1px solid #dce3ea;
        padding: 1.5rem;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .fdp-report h2 {
        color: #143226;
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: .35rem;
    }

    .fdp-report__period {
        color: #1f7a3f;
        font-weight: 800;
        margin-bottom: .75rem;
    }

    .fdp-report__description {
        color: #5f6b76;
        margin-bottom: 1rem;
    }

    .fdp-report__link {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        color: #fff;
        background: #14532d;
        padding: .65rem 1rem;
        font-weight: 800;
        text-decoration: none;
    }

    .fdp-report__link:hover {
        color: #fff;
        background: #0f3f22;
        text-decoration: none;
    }

    .fdp-empty {
        border: 1px dashed #b8c9bd;
        padding: 2rem;
        background: #fff;
        color: #5f6b76;
    }
</style>

<section class="container frontend-page-content">
    @if($reports->isNotEmpty())
        <div class="fdp-report-list">
            @foreach($reports as $report)
                <article class="fdp-report">
                    <h2>{{ $report->title }}</h2>
                    @if($report->period)
                        <div class="fdp-report__period">{{ $report->period }}</div>
                    @endif
                    @if($report->description)
                        <div class="fdp-report__description">{!! $report->description !!}</div>
                    @endif
                    @if($report->file_url)
                        <a class="fdp-report__link" href="{{ $report->file_url }}" target="_blank" rel="noopener">
                            <i class="fa fa-file-alt" aria-hidden="true"></i>
                            View File
                        </a>
                    @endif
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    @else
        <div class="fdp-empty">No published FDP reports have been added yet.</div>
    @endif
</section>
@endsection
