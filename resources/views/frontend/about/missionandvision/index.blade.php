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

    .mv-hero-panel {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 1.5rem;
        align-items: stretch;
        margin-bottom: 1.5rem;
    }

    .mv-statement-card,
    .mv-focus-card,
    .mv-content-card {
        background: #fff;
        border: 1px solid #dce8df;
        border-radius: 8px;
        box-shadow: 0 14px 30px rgba(11, 61, 42, .08);
    }

    .mv-statement-card {
        position: relative;
        overflow: hidden;
        padding: 2rem;
        background: linear-gradient(135deg, #ffffff 0%, #f3faef 100%);
    }

    .mv-statement-card::before {
        content: "";
        position: absolute;
        inset: 0 auto 0 0;
        width: 6px;
        background: linear-gradient(180deg, #1f7a3f, #d4af37);
    }

    .mv-eyebrow,
    .service-eyebrow {
        display: inline-block;
        margin-bottom: .65rem;
        color: #1f7a3f;
        font-size: .78rem;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .mv-statement-card h2,
    .mv-content-card h2,
    .mv-focus-card h3 {
        color: #0b3d2a;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 800;
    }

    .mv-statement-card h2 {
        max-width: 760px;
        margin-bottom: .9rem;
        font-size: clamp(1.9rem, 3.5vw, 3rem);
        line-height: 1.05;
    }

    .mv-statement-card p {
        max-width: 760px;
        color: #455a4c;
        font-size: 1.05rem;
        line-height: 1.75;
        margin-bottom: 0;
    }

    .mv-focus-card {
        display: grid;
        gap: 1px;
        overflow: hidden;
        background: #dce8df;
    }

    .mv-focus-card div {
        padding: 1.15rem;
        background: #fff;
    }

    .mv-focus-card i {
        color: #1f7a3f;
        font-size: 1.3rem;
        margin-bottom: .55rem;
    }

    .mv-focus-card h3 {
        margin-bottom: .25rem;
        font-size: 1rem;
    }

    .mv-focus-card p {
        color: #5f6b76;
        margin-bottom: 0;
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
        .mv-hero-panel,
        .mv-card-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="container mv-page">
    @if(isset($missionandvision->title))
        <div class="mv-hero-panel">
            <article class="mv-statement-card">
                <span class="mv-eyebrow">Municipal Direction</span>
                <h2>{{ $missionandvision->title }}</h2>
                <p>These guiding statements shape how the municipal government plans, serves, and works with the people of Bontoc.</p>
            </article>

            <aside class="mv-focus-card" aria-label="Governance focus areas">
                <div>
                    <i class="fa fa-handshake"></i>
                    <h3>Responsive Service</h3>
                    <p>Accessible public support for residents and communities.</p>
                </div>
                <div>
                    <i class="fa fa-balance-scale"></i>
                    <h3>Transparent Governance</h3>
                    <p>Clear information, public accountability, and open records.</p>
                </div>
                <div>
                    <i class="fa fa-seedling"></i>
                    <h3>Sustainable Progress</h3>
                    <p>Programs that support resilient and inclusive development.</p>
                </div>
            </aside>
        </div>

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
