@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Mission and Vision',
    'title' => 'Mission and Vision',
    'description' => 'Read the guiding mission and vision that direct Bontoc\'s public service, governance, and community development.'
])

<style>
    .mv-page {
        padding-bottom: 4.5rem;
    }

    .mv-content-card {
        background: #fff;
        border: 1px solid #dce8df;
        border-radius: 8px;
        box-shadow: 0 14px 30px rgba(11, 61, 42, .08);
    }

    .mv-content-card h2 {
        color: #0b3d2a;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 800;
    }

    .mv-card-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .mv-content-card {
        padding: 1.5rem;
    }

    .mv-content-card h2 {
        display: flex;
        align-items: center;
        gap: .65rem;
        font-size: 1.35rem;
        margin-bottom: .85rem;
    }

    .mv-content-card h2 i {
        width: 40px;
        height: 40px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: rgba(31, 122, 63, .1);
        color: #1f7a3f;
        font-size: 1rem;
    }

    .mv-content-card .textwidget,
    .mv-content-card .textwidget p,
    .mv-content-card .textwidget li {
        color: #4f5f55;
        line-height: 1.75;
    }

    .mv-content-card .textwidget p:last-child {
        margin-bottom: 0;
    }

    .mv-content-card--official {
        border-top: 4px solid #1f7a3f;
    }

    @media (max-width: 991.98px) {
        .mv-card-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="container mv-page">
    @if(isset($missionandvision->title))
        <div class="mv-card-grid">
            <article class="mv-content-card">
                <h2><i class="fa fa-bullseye"></i> Mission</h2>
                <div class="siteorigin-widget-tinymce textwidget">
                    {!! $missionandvision->mission ?: $missionandvision->description !!}
                </div>
            </article>

            <article class="mv-content-card">
                <h2><i class="fa fa-eye"></i> Vision</h2>
                <div class="siteorigin-widget-tinymce textwidget">
                    {!! $missionandvision->vision ?: $missionandvision->description !!}
                </div>
            </article>
        </div>
    @endif
</section>

@endsection
