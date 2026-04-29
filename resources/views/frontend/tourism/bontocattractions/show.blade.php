@extends('layouts.frontend')

@section('content')
@php
    $heroImage = !empty($attraction->image_file)
        ? url('uploads/'.$attraction->image_file)
        : ($attraction->photos->isNotEmpty() ? url('uploads/'.$attraction->photos->first()->image_file) : asset('resources/bontoclogonobg.png'));
    $plainDescription = trim(strip_tags((string) $attraction->description));
@endphp

<style>
    .destination-hero {
        position: relative;
        min-height: 520px;
        display: flex;
        align-items: end;
        overflow: hidden;
        background: #0b3d2a;
        color: #fff;
    }

    .destination-hero__media {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(90deg, rgba(4, 34, 22, .92) 0%, rgba(4, 34, 22, .64) 45%, rgba(4, 34, 22, .18) 100%), url('{{ $heroImage }}');
        background-position: center;
        background-size: cover;
    }

    .destination-hero__content {
        position: relative;
        z-index: 1;
        width: 100%;
        padding-top: 5rem;
        padding-bottom: 3.25rem;
    }

    .destination-breadcrumb {
        display: flex;
        flex-wrap: wrap;
        gap: .5rem;
        margin-bottom: 1.2rem;
        color: rgba(255,255,255,.82);
        font-weight: 700;
    }

    .destination-breadcrumb a {
        color: #fff;
    }

    .destination-kicker {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        margin-bottom: .85rem;
        color: #f2b705;
        font-weight: 800;
        letter-spacing: .08em;
        text-transform: uppercase;
    }

    .destination-hero h1 {
        max-width: 840px;
        color: #fff;
        font-size: clamp(2.4rem, 5vw, 4.8rem);
        font-weight: 800;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .destination-hero p {
        max-width: 720px;
        color: rgba(255,255,255,.9);
        font-size: 1.12rem;
        margin-bottom: 1.4rem;
    }

    .destination-actions {
        display: flex;
        flex-wrap: wrap;
        gap: .75rem;
    }

    .destination-actions .btn-outline-light {
        border-color: rgba(255,255,255,.72);
        color: #fff;
    }

    .destination-body {
        background: #f5f7f2;
        padding: 3rem 0 4.5rem;
    }

    .destination-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 330px;
        gap: 2rem;
        align-items: start;
    }

    .destination-section {
        background: #fff;
        border: 1px solid #dce3ea;
        padding: 1.6rem;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .destination-section + .destination-section,
    .destination-side-panel + .destination-side-panel {
        margin-top: 1.25rem;
    }

    .destination-section h2,
    .destination-side-panel h2 {
        color: #143226;
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .destination-description {
        color: #405247;
        font-size: 1.05rem;
        line-height: 1.75;
    }

    .destination-description p:last-child {
        margin-bottom: 0;
    }

    .destination-gallery {
        display: grid;
        grid-template-columns: 1.25fr 1fr 1fr;
        gap: .8rem;
    }

    .destination-gallery a,
    .destination-gallery img {
        display: block;
        width: 100%;
        height: 100%;
    }

    .destination-gallery a {
        min-height: 190px;
        overflow: hidden;
        background: #edf8e7;
    }

    .destination-gallery a:first-child {
        grid-row: span 2;
        min-height: 390px;
    }

    .destination-gallery img {
        object-fit: cover;
        transition: transform .2s ease;
    }

    .destination-gallery a:hover img {
        transform: scale(1.04);
    }

    .destination-side {
        position: sticky;
        top: 1rem;
    }

    .destination-side-panel {
        background: #fff;
        border: 1px solid #dce3ea;
        padding: 1.35rem;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .destination-facts {
        display: grid;
        gap: .9rem;
        margin: 0;
    }

    .destination-fact {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        gap: .8rem;
        align-items: center;
    }

    .destination-fact i {
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #edf8e7;
        color: #1f7a3f;
    }

    .destination-fact span,
    .destination-tips li {
        color: #5f6b76;
    }

    .destination-fact strong {
        display: block;
        color: #143226;
        font-weight: 800;
    }

    .destination-tips {
        margin: 0;
        padding-left: 1.1rem;
    }

    .destination-tips li + li {
        margin-top: .5rem;
    }

    .destination-empty {
        border: 1px dashed #b8c9bd;
        padding: 1.5rem;
        background: #fff;
        color: #5f6b76;
    }

    @media (max-width: 991.98px) {
        .destination-layout {
            grid-template-columns: 1fr;
        }

        .destination-side {
            position: static;
        }
    }

    @media (max-width: 767.98px) {
        .destination-hero {
            min-height: 450px;
        }

        .destination-gallery {
            grid-template-columns: 1fr;
        }

        .destination-gallery a,
        .destination-gallery a:first-child {
            min-height: 240px;
            grid-row: auto;
        }
    }
</style>

<section class="destination-hero">
    <div class="destination-hero__media"></div>
    <div class="container destination-hero__content">
        <nav class="destination-breadcrumb" aria-label="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('tourism.index') }}">Tourism</a>
            <span>/</span>
            <span>{{ $attraction->title }}</span>
        </nav>

        <span class="destination-kicker">
            <i class="fa fa-map-marker-alt" aria-hidden="true"></i>
            {{ $attraction->category ?: 'Bontoc Destination' }}
        </span>
        <h1>{{ $attraction->title }}</h1>
        @if($plainDescription)
            <p>{{ \Illuminate\Support\Str::limit($plainDescription, 190) }}</p>
        @else
            <p>Discover this local destination in Bontoc, Southern Leyte.</p>
        @endif
        <div class="destination-actions">
            <a href="{{ route('tourism.index') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left mr-1" aria-hidden="true"></i> Back to Tourism
            </a>
            @if($attraction->photos->isNotEmpty())
                <a href="#destination-gallery" class="btn btn-outline-light">View Gallery</a>
            @endif
        </div>
    </div>
</section>

<section class="destination-body">
    <div class="container destination-layout">
        <main>
            <article class="destination-section">
                <h2>About This Destination</h2>
                @if(!empty($attraction->description))
                    <div class="destination-description siteorigin-widget-tinymce textwidget">
                        {!! $attraction->description !!}
                    </div>
                @else
                    <div class="destination-empty">Details for this destination will be added soon.</div>
                @endif
            </article>

            @if($attraction->photos->isNotEmpty())
                <section class="destination-section" id="destination-gallery">
                    <h2>Photo Gallery</h2>
                    <div class="destination-gallery" aria-label="Tourism photo gallery">
                        @foreach($attraction->photos->take(5) as $photo)
                            <a href="{{ url('uploads/'.$photo->image_file) }}" target="_blank" rel="noopener">
                                <img src="{{ url('uploads/'.$photo->image_file) }}" alt="{{ $attraction->title }} photo {{ $loop->iteration }}">
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </main>

        <aside class="destination-side" aria-label="Destination details">
            <section class="destination-side-panel">
                <h2>Destination Details</h2>
                <div class="destination-facts">
                    <div class="destination-fact">
                        <i class="fa fa-layer-group" aria-hidden="true"></i>
                        <div>
                            <strong>Category</strong>
                            <span>{{ $attraction->category ?: 'Destination' }}</span>
                        </div>
                    </div>
                    <div class="destination-fact">
                        <i class="fa fa-map" aria-hidden="true"></i>
                        <div>
                            <strong>Location</strong>
                            <span>Bontoc, Southern Leyte</span>
                        </div>
                    </div>
                    <div class="destination-fact">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        <div>
                            <strong>Photos</strong>
                            <span>{{ $attraction->photos->count() }} uploaded photo{{ $attraction->photos->count() === 1 ? '' : 's' }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="destination-side-panel">
                <h2>Visitor Notes</h2>
                <ul class="destination-tips">
                    <li>Check local advisories before travel.</li>
                    <li>Keep the area clean and respect community spaces.</li>
                    <li>Coordinate with local tourism or barangay offices for group visits.</li>
                </ul>
            </section>
        </aside>
    </div>
</section>
@endsection
