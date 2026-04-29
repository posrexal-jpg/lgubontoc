@extends('layouts.frontend')

@section('content')

<style>
    .tourism-hero {
        position: relative;
        overflow: hidden;
        background: #0b3d2a;
        color: #fff;
    }

    .tourism-hero__media {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(90deg, rgba(5, 35, 23, .9), rgba(5, 35, 23, .6), rgba(5, 35, 23, .18)), url('{{ $heroImageUrl }}');
        background-position: center;
        background-size: cover;
        transform: scale(1.02);
    }

    .tourism-hero__content {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(0, 1.2fr) minmax(280px, .8fr);
        gap: 2rem;
        align-items: end;
        min-height: 440px;
        padding-top: 4rem;
        padding-bottom: 3.5rem;
    }

    .tourism-kicker {
        display: inline-flex;
        align-items: center;
        gap: .5rem;
        margin-bottom: .85rem;
        color: #f2b705;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .tourism-hero h1 {
        max-width: 760px;
        color: #fff;
        font-size: clamp(2.25rem, 5vw, 4.75rem);
        font-weight: 800;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .tourism-hero p {
        max-width: 680px;
        color: rgba(255,255,255,.88);
        font-size: 1.12rem;
        margin-bottom: 1.5rem;
    }

    .tourism-breadcrumb {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
        color: rgba(255,255,255,.78);
        font-weight: 700;
    }

    .tourism-breadcrumb a {
        color: #fff;
    }

    .tourism-stat-panel {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,.2);
        background: rgba(255,255,255,.16);
        backdrop-filter: blur(10px);
    }

    .tourism-stat-panel div {
        min-height: 118px;
        padding: 1.25rem;
        background: rgba(3, 28, 18, .45);
    }

    .tourism-stat-panel strong {
        display: block;
        color: #fff;
        font-size: 2rem;
        line-height: 1;
    }

    .tourism-stat-panel span {
        color: rgba(255,255,255,.8);
        font-weight: 700;
    }

    .tourism-section {
        padding: 4rem 0;
        background: #fff;
    }

    .tourism-section--soft {
        background: #f6faf7;
    }

    .tourism-section__header {
        display: flex;
        align-items: end;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .tourism-section__header span {
        display: block;
        color: #1f7a3f;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .tourism-section__header h2 {
        color: #143226;
        font-size: clamp(1.8rem, 3vw, 2.75rem);
        font-weight: 800;
        margin: 0;
    }

    .tourism-section__header p {
        max-width: 560px;
        color: #5f6b76;
        margin: .35rem 0 0;
    }

    .featured-spots-grid,
    .tourism-category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .tourism-card {
        display: flex;
        min-height: 100%;
        flex-direction: column;
        border: 1px solid #dce3ea;
        background: #fff;
        box-shadow: 0 12px 28px rgba(11, 61, 42, .08);
    }

    .tourism-card__media {
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: #edf8e7;
    }

    .tourism-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .tourism-card__placeholder {
        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        color: #1f7a3f;
        font-size: 2rem;
    }

    .tourism-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
        padding: 1.35rem;
    }

    .tourism-card h3 {
        color: #143226;
        font-size: 1.25rem;
        font-weight: 800;
        margin-bottom: .7rem;
    }

    .tourism-card p {
        color: #5f6b76;
        margin-bottom: 1rem;
    }

    .tourism-card .btn {
        margin-top: auto;
        align-self: flex-start;
    }

    .tourism-card__icon {
        display: inline-flex;
        width: 44px;
        height: 44px;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        background: #edf8e7;
        color: #1f7a3f;
        font-size: 1.1rem;
    }

    .tourism-card__category {
        display: inline-flex;
        width: fit-content;
        margin-bottom: .7rem;
        padding: .22rem .6rem;
        background: #edf8e7;
        color: #1f7a3f;
        font-size: .78rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .03em;
    }

    .tourism-empty {
        border: 1px dashed #b8c9bd;
        padding: 2rem;
        background: #fff;
        color: #5f6b76;
    }

    .tourism-directory-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .tourism-directory-item {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        padding: 1rem 1.1rem;
        border: 1px solid #dce3ea;
        background: #fff;
        color: #143226;
        font-weight: 800;
    }

    .tourism-directory-item span {
        color: #5f6b76;
        font-weight: 600;
    }

    @media (max-width: 991px) {
        .tourism-hero__content,
        .featured-spots-grid,
        .tourism-category-grid,
        .tourism-directory-list {
            grid-template-columns: 1fr;
        }

        .tourism-section__header {
            align-items: flex-start;
            flex-direction: column;
        }
    }

    @media (max-width: 575px) {
        .tourism-stat-panel {
            grid-template-columns: 1fr;
        }
    }
</style>

@php
    $attractionCount = $bontocattractions->count();
    $featuredAttractions = $bontocattractions->take(6);
    $groupedAttractions = $bontocattractions->groupBy(fn ($item) => $item->category ?: 'Uncategorized');
@endphp

<section class="tourism-hero">
    <div class="tourism-hero__media"></div>
    <div class="container tourism-hero__content">
        <div>
            <span class="tourism-kicker"><i class="fa fa-map-marker-alt"></i> Bontoc, Southern Leyte</span>
            <h1>Places to Visit</h1>
            <p>Discover Bontoc's natural attractions, waterfront views, local heritage, and community destinations in one tourism guide.</p>
            <div class="tourism-breadcrumb" aria-label="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <span>Tourism</span>
            </div>
        </div>

        <aside class="tourism-stat-panel" aria-label="Tourism highlights">
            <div>
                <strong>{{ $attractionCount }}</strong>
                <span>Places to Visit</span>
            </div>
            <div>
                <strong>{{ $groupedAttractions->count() }}</strong>
                <span>Categories</span>
            </div>
            <div>
                <strong>Year</strong>
                <span>Round</span>
            </div>
            <div>
                <strong>Bontoc</strong>
                <span>Southern Leyte</span>
            </div>
        </aside>
    </div>
</section>

<section class="tourism-section">
    <div class="container">
        <div class="tourism-section__header">
            <div>
                <span>Featured Spots</span>
                <h2>Explore the beauty of Bontoc</h2>
            </div>
            <p>Browse destinations maintained through the tourism content records in the admin panel.</p>
        </div>

        @if($featuredAttractions->isNotEmpty())
            <div class="featured-spots-grid">
                @foreach($featuredAttractions as $attraction)
                    <article class="tourism-card">
                        <div class="tourism-card__media">
                            @if(!empty($attraction->image_file))
                                <img src="{{ url('uploads/'.$attraction->image_file) }}" alt="{{ $attraction->title }}">
                            @elseif($attraction->photos->isNotEmpty())
                                <img src="{{ url('uploads/'.$attraction->photos->first()->image_file) }}" alt="{{ $attraction->title }}">
                            @else
                                <div class="tourism-card__placeholder"><i class="fa fa-map-marked-alt"></i></div>
                            @endif
                        </div>
                        <div class="tourism-card__body">
                            <span class="tourism-card__category">{{ $attraction->category ?: 'Destination' }}</span>
                            <h3>{{ $attraction->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($attraction->description), 170) }}</p>
                            <a href="{{ route('tourism.bontocattractions.show', $attraction->id) }}" class="btn btn-primary">View Destination</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="tourism-empty">
                Tourism destinations will appear here once they are added in the admin panel.
            </div>
        @endif
    </div>
</section>

<section class="tourism-section tourism-section--soft">
    <div class="container">
        <div class="tourism-section__header">
            <div>
                <span>Categories</span>
                <h2>Browse by travel theme</h2>
            </div>
            <p>Use these themes as a quick way to plan visits across Bontoc's nature, culture, and waterfront destinations.</p>
        </div>

        @if($groupedAttractions->isNotEmpty())
            <div class="tourism-category-grid">
                @foreach($groupedAttractions as $category => $items)
                    <article class="tourism-card">
                        <div class="tourism-card__body">
                            <span class="tourism-card__icon"><i class="fa fa-layer-group"></i></span>
                            <h3>{{ $category }}</h3>
                            <p>{{ $items->count() }} destination{{ $items->count() === 1 ? '' : 's' }} listed in this category.</p>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="tourism-empty">
                Categories will appear here once tourism destinations are added in the admin panel.
            </div>
        @endif
    </div>
</section>

<section class="tourism-section">
    <div class="container">
        <div class="tourism-section__header">
            <div>
                <span>Destination Directory</span>
                <h2>All places to visit</h2>
            </div>
            <p>Open a destination page to read the full tourism description.</p>
        </div>

        @if($bontocattractions->isNotEmpty())
            <div class="tourism-directory-list">
                @foreach($bontocattractions as $attraction)
                    <a href="{{ route('tourism.bontocattractions.show', $attraction->id) }}" class="tourism-directory-item">
                        {{ $attraction->title }}
                        <span>{{ $attraction->category ?: 'View' }}</span>
                    </a>
                @endforeach
            </div>
        @else
            <div class="tourism-empty">
                No tourism destinations are published yet.
            </div>
        @endif
    </div>
</section>
@endsection
