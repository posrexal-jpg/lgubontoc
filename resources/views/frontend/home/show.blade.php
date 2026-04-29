@extends('layouts.frontend')

@section('content')
@php
    $heroImage = !empty($item->image) ? url('public/home/'.$item->image) : asset('resources/bontoclogonobg.png');
    $plainDescription = trim(strip_tags((string) $item->description));
@endphp

<style>
    .update-hero {
        position: relative;
        overflow: hidden;
        background: #0b3d2a;
        color: #fff;
    }

    .update-hero__media {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(90deg, rgba(5, 35, 23, .94), rgba(5, 35, 23, .7), rgba(5, 35, 23, .22)), url('{{ $heroImage }}');
        background-position: center;
        background-size: cover;
    }

    .update-hero__content {
        position: relative;
        z-index: 1;
        min-height: 480px;
        display: flex;
        align-items: end;
        padding-top: 5rem;
        padding-bottom: 3.25rem;
    }

    .update-hero__inner {
        max-width: 860px;
    }

    .update-breadcrumb {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
        color: rgba(255,255,255,.8);
        font-weight: 700;
    }

    .update-breadcrumb a {
        color: #fff;
    }

    .update-kicker {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        margin-bottom: .85rem;
        color: #f2b705;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .update-hero h1 {
        color: #fff;
        font-size: clamp(2.25rem, 5vw, 4.75rem);
        font-weight: 800;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .update-summary {
        max-width: 720px;
        color: rgba(255,255,255,.9);
        font-size: 1.12rem;
        margin-bottom: 1.35rem;
    }

    .update-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem;
        color: rgba(255,255,255,.88);
        font-weight: 700;
    }

    .update-body {
        background: #f5f7f2;
        padding: 3rem 0 4.5rem;
    }

    .update-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 2rem;
        align-items: start;
    }

    .update-article,
    .update-panel {
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .update-article {
        overflow: hidden;
    }

    .update-article__image {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        display: block;
        background: #edf8e7;
    }

    .update-article__content {
        padding: clamp(1.35rem, 3vw, 2.25rem);
    }

    .update-article__content h2,
    .update-panel h2 {
        color: #143226;
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .update-text {
        color: #405247;
        font-size: 1.06rem;
        line-height: 1.78;
    }

    .update-text p:last-child {
        margin-bottom: 0;
    }

    .update-sidebar {
        position: sticky;
        top: 1rem;
    }

    .update-panel {
        padding: 1.35rem;
    }

    .update-panel + .update-panel {
        margin-top: 1.25rem;
    }

    .update-info-list {
        display: grid;
        gap: .9rem;
        margin: 0;
    }

    .update-info-item {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        gap: .8rem;
        align-items: center;
    }

    .update-info-item i {
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #edf8e7;
        color: #1f7a3f;
    }

    .update-info-item strong {
        display: block;
        color: #143226;
        font-weight: 800;
    }

    .update-info-item span,
    .update-panel p {
        color: #5f6b76;
        margin-bottom: 0;
    }

    .update-actions {
        display: grid;
        gap: .65rem;
    }

    @media (max-width: 991.98px) {
        .update-layout {
            grid-template-columns: 1fr;
        }

        .update-sidebar {
            position: static;
        }
    }

    @media (max-width: 575.98px) {
        .update-hero__content {
            min-height: 410px;
            padding-top: 3rem;
        }
    }
</style>

<section class="update-hero">
    <div class="update-hero__media"></div>
    <div class="container update-hero__content">
        <div class="update-hero__inner">
            <nav class="update-breadcrumb" aria-label="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Municipal Update</span>
            </nav>
            <span class="update-kicker"><i class="fa fa-newspaper" aria-hidden="true"></i> Municipal Update</span>
            <h1>{{ $item->title }}</h1>
            @if($plainDescription)
                <p class="update-summary">{{ \Illuminate\Support\Str::limit($plainDescription, 190) }}</p>
            @endif
            <div class="update-meta">
                @if(!empty($item->date_posted))
                    <span><i class="fa fa-calendar mr-1" aria-hidden="true"></i>{{ \Carbon\Carbon::parse($item->date_posted)->format('F j, Y') }}</span>
                @endif
                <span><i class="fa fa-map-marker-alt mr-1" aria-hidden="true"></i>Municipality of Bontoc</span>
            </div>
        </div>
    </div>
</section>

<section class="update-body">
    <div class="container update-layout">
        <main>
            <article class="update-article">
                @if(!empty($item->image))
                    <img class="update-article__image" src="{{ url('public/home/'.$item->image) }}" alt="{{ $item->title }}">
                @endif

                <div class="update-article__content">
                    <h2>Details</h2>
                    <div class="update-text siteorigin-widget-tinymce textwidget">
                        {!! $item->description ?: '<p>Details for this update will be posted soon.</p>' !!}
                    </div>
                </div>
            </article>
        </main>

        <aside class="update-sidebar" aria-label="Update details">
            <section class="update-panel">
                <h2>Update Information</h2>
                <div class="update-info-list">
                    <div class="update-info-item">
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        <div>
                            <strong>Category</strong>
                            <span>Homepage Item</span>
                        </div>
                    </div>
                    <div class="update-info-item">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <div>
                            <strong>Date Posted</strong>
                            <span>{{ !empty($item->date_posted) ? \Carbon\Carbon::parse($item->date_posted)->format('F j, Y') : 'Not specified' }}</span>
                        </div>
                    </div>
                    <div class="update-info-item">
                        <i class="fa fa-building" aria-hidden="true"></i>
                        <div>
                            <strong>Source</strong>
                            <span>Municipal Government of Bontoc</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="update-panel">
                <h2>More Actions</h2>
                <div class="update-actions">
                    <a href="{{ route('home') }}" class="btn btn-primary">Back to Homepage</a>
                    <a href="{{ route('newsandupdates.news') }}" class="btn btn-outline-secondary">View News</a>
                </div>
            </section>
        </aside>
    </div>
</section>
@endsection
