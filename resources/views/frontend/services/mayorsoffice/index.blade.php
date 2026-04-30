@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => isset($mayorsoffice->title) ? $mayorsoffice->title : "Mayor's Office",
    'description' => "Find information, services, and updates from the Office of the Municipal Mayor.",
    'breadcrumbs' => [
        ['label' => 'Services'],
        ['label' => "Mayor's Office"],
    ],
])

<style>
    .mayor-office-page {
        padding-bottom: 4.5rem;
    }

    .mayor-office-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 1.5rem;
        align-items: start;
    }

    .mayor-office-card,
    .mayor-office-panel,
    .mayor-office-quick-links a {
        background: #fff;
        border: 1px solid #dce8df;
        border-radius: 8px;
        box-shadow: 0 12px 28px rgba(11, 61, 42, .08);
    }

    .mayor-office-card {
        overflow: hidden;
    }

    .mayor-office-card__heading {
        padding: 1.5rem;
        background: linear-gradient(135deg, #0b3d2a, #1f7a3f);
        color: #fff;
    }

    .mayor-office-card__heading span {
        display: inline-block;
        margin-bottom: .5rem;
        color: #f2b705;
        font-size: .78rem;
        font-weight: 800;
        letter-spacing: .12em;
        text-transform: uppercase;
    }

    .mayor-office-card__heading h2 {
        margin: 0;
        color: #fff;
        font-family: Helvetica, Arial, sans-serif;
        font-size: clamp(1.8rem, 3vw, 2.45rem);
        font-weight: 800;
    }

    .mayor-office-card__body {
        padding: 1.5rem;
    }

    .mayor-office-card__body .textwidget,
    .mayor-office-card__body .textwidget p,
    .mayor-office-card__body .textwidget li {
        color: #4f5f55;
        line-height: 1.75;
    }

    .mayor-office-card__body .textwidget h2,
    .mayor-office-card__body .textwidget h3,
    .mayor-office-card__body .textwidget h4 {
        color: #0b3d2a;
        font-family: Helvetica, Arial, sans-serif;
        font-weight: 800;
        margin-top: 1.3rem;
    }

    .mayor-office-card__body .textwidget ul {
        padding-left: 1.2rem;
    }

    .mayor-office-sidebar {
        display: grid;
        gap: 1rem;
        position: sticky;
        top: 1rem;
    }

    .mayor-office-panel {
        padding: 1.25rem;
    }

    .mayor-office-panel h3 {
        color: #0b3d2a;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 1.15rem;
        font-weight: 800;
        margin-bottom: .85rem;
    }

    .mayor-office-info {
        display: grid;
        gap: .8rem;
        margin: 0;
    }

    .mayor-office-info div {
        display: grid;
        grid-template-columns: 38px minmax(0, 1fr);
        gap: .75rem;
        align-items: start;
    }

    .mayor-office-info i,
    .mayor-office-quick-links i {
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: rgba(31, 122, 63, .1);
        color: #1f7a3f;
    }

    .mayor-office-info strong,
    .mayor-office-info span {
        display: block;
    }

    .mayor-office-info strong {
        color: #143226;
        line-height: 1.25;
    }

    .mayor-office-info span {
        color: #5f6b76;
        font-size: .92rem;
    }

    .mayor-office-quick-links {
        display: grid;
        gap: .65rem;
    }

    .mayor-office-quick-links a {
        display: flex;
        align-items: center;
        gap: .75rem;
        padding: .85rem;
        color: #143226;
        font-weight: 800;
    }

    .mayor-office-quick-links a:hover {
        border-color: #1f7a3f;
        color: #1f7a3f;
    }

    @media (max-width: 991.98px) {
        .mayor-office-layout {
            grid-template-columns: 1fr;
        }

        .mayor-office-sidebar {
            position: static;
        }
    }
</style>

<section class="container mayor-office-page">
    @if(isset($mayorsoffice->title))
        <div class="mayor-office-layout">
            <article class="mayor-office-card">
                <div class="mayor-office-card__heading">
                    <span>Executive Office</span>
                    <h2>{{ $mayorsoffice->title }}</h2>
                </div>
                <div class="mayor-office-card__body">
                    <div class="siteorigin-widget-tinymce textwidget">
                        {!! $mayorsoffice->description !!}
                    </div>
                </div>
            </article>

            <aside class="mayor-office-sidebar" aria-label="Mayor's Office information">
                <section class="mayor-office-panel">
                    <h3>Office Information</h3>
                    <div class="mayor-office-info">
                        <div>
                            <i class="fa fa-clock"></i>
                            <span>
                                <strong>Office Hours</strong>
                                <span>Monday to Friday, 8:00 AM - 5:00 PM</span>
                            </span>
                        </div>
                        <div>
                            <i class="fa fa-map-marker-alt"></i>
                            <span>
                                <strong>Location</strong>
                                <span>Municipal Hall, Bontoc, Southern Leyte</span>
                            </span>
                        </div>
                        <div>
                            <i class="fa fa-file-signature"></i>
                            <span>
                                <strong>Requests</strong>
                                <span>Bring a valid ID and complete supporting documents.</span>
                            </span>
                        </div>
                    </div>
                </section>

                <section class="mayor-office-panel">
                    <h3>Related Services</h3>
                    <div class="mayor-office-quick-links">
                        <a href="{{ route('services.citizenscharter') }}"><i class="fa fa-list-alt"></i> Citizen's Charter</a>
                        <a href="{{ route('about.directory') }}"><i class="fa fa-address-book"></i> Office Directory</a>
                        <a href="{{ route('newsandupdates.upcomingupdates') }}"><i class="fa fa-bullhorn"></i> Announcements</a>
                    </div>
                </section>
            </aside>
        </div>
    @endif
</section>

@endsection
