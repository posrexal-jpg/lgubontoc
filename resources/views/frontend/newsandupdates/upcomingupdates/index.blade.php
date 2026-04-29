@extends('layouts.frontend')

@section('content')
<style>
    .updates-hero {
        background: #f6faf7;
        border-bottom: 1px solid #dbe8df;
        padding: 36px 0 32px;
        margin-bottom: 0;
    }

    .updates-hero .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 16px;
        font-size: 0.95rem;
    }

    .updates-hero__grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(280px, 360px);
        gap: 2rem;
        align-items: end;
    }

    .updates-hero h1 {
        color: #046631;
        font-family: Helvetica, Arial, sans-serif;
        font-size: clamp(2rem, 4vw, 3.25rem);
        font-weight: 800;
        margin-bottom: .75rem;
    }

    .updates-hero p {
        max-width: 760px;
        color: #455a4c;
        font-size: 1.06rem;
        line-height: 1.65;
        margin-bottom: 0;
    }

    .updates-summary {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1px;
        overflow: hidden;
        border: 1px solid #dbe8df;
        background: #dbe8df;
    }

    .updates-summary div {
        padding: 1.2rem;
        background: #fff;
    }

    .updates-summary strong {
        display: block;
        color: #143226;
        font-size: 1.9rem;
        line-height: 1;
    }

    .updates-summary span {
        color: #5f6b76;
        font-weight: 700;
    }

    .updates-page {
        padding: 4rem 0;
        background: #fff;
    }

    .updates-layout {
        display: grid;
        grid-template-columns: minmax(0, .95fr) minmax(0, 1.45fr);
        gap: 2rem;
        align-items: start;
    }

    .featured-update {
        position: sticky;
        top: 1rem;
        border: 1px solid #dce3ea;
        background: #fff;
        box-shadow: 0 12px 28px rgba(11, 61, 42, .08);
    }

    .featured-update__media,
    .update-card__media {
        background: #edf8e7;
        overflow: hidden;
    }

    .featured-update__media {
        aspect-ratio: 16 / 10;
    }

    .featured-update__media img,
    .update-card__media img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .featured-update__body,
    .update-card__body {
        padding: 1.35rem;
    }

    .updates-label {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        margin-bottom: .8rem;
        color: #1f7a3f;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
        font-size: .84rem;
    }

    .featured-update h2,
    .update-card h3 {
        color: #143226;
        font-weight: 800;
        line-height: 1.15;
    }

    .featured-update h2 {
        font-size: 1.8rem;
        margin-bottom: .65rem;
    }

    .update-card h3 {
        font-size: 1.2rem;
        margin-bottom: .55rem;
    }

    .update-meta {
        display: flex;
        align-items: center;
        gap: .45rem;
        color: #5f6b76;
        font-weight: 700;
        margin-bottom: .8rem;
    }

    .featured-update p,
    .update-card p {
        color: #5f6b76;
    }

    .updates-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .update-card {
        display: flex;
        min-height: 100%;
        flex-direction: column;
        border: 1px solid #dce3ea;
        background: #fff;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .update-card__media {
        aspect-ratio: 16 / 9;
    }

    .update-card__body {
        display: flex;
        flex: 1;
        flex-direction: column;
    }

    .update-card .btn {
        margin-top: auto;
        align-self: flex-start;
    }

    .update-placeholder {
        display: flex;
        height: 100%;
        min-height: 180px;
        align-items: center;
        justify-content: center;
        color: #1f7a3f;
        font-size: 2rem;
    }

    .updates-empty {
        border: 1px dashed #b8c9bd;
        padding: 2rem;
        background: #fff;
        color: #5f6b76;
    }

    @media (max-width: 991px) {
        .updates-hero__grid,
        .updates-layout,
        .updates-grid {
            grid-template-columns: 1fr;
        }

        .featured-update {
            position: static;
        }
    }

    @media (max-width: 575px) {
        .updates-summary {
            grid-template-columns: 1fr;
        }
    }
</style>

@php
    $updatesCount = $upcomingupdates->count();
    $latestUpdate = $upcomingupdates->first();
    $otherUpdates = $upcomingupdates->skip(1);
@endphp

<section class="updates-hero">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">News and Updates</li>
                <li class="breadcrumb-item active" aria-current="page">Announcements</li>
            </ol>
        </nav>

        <div class="updates-hero__grid">
            <div>
                <h1>Announcements</h1>
                <p>Stay informed about public advisories, schedules, posters, infographics, and announcements from the Municipal Government of Bontoc.</p>
            </div>
            <aside class="updates-summary" aria-label="Announcements summary">
                <div>
                    <strong>{{ $updatesCount }}</strong>
                    <span>Published Announcements</span>
                </div>
                <div>
                    <strong>{{ $latestUpdate && !empty($latestUpdate->date_posted) ? \Carbon\Carbon::parse($latestUpdate->date_posted)->format('M d') : 'Now' }}</strong>
                    <span>Latest Posted</span>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="updates-page">
    <div class="container">
        @if($latestUpdate)
            <div class="updates-layout">
                <article class="featured-update">
                    <div class="featured-update__media">
                        @if(!empty($latestUpdate->image_file))
                            <img src="{{ url('uploads/'.$latestUpdate->image_file) }}" alt="{{ $latestUpdate->title }}">
                        @else
                            <div class="update-placeholder"><i class="fa fa-bullhorn"></i></div>
                        @endif
                    </div>
                    <div class="featured-update__body">
                        <span class="updates-label"><i class="fa fa-star"></i> Latest Announcement</span>
                        <h2>{{ $latestUpdate->title }}</h2>
                        @if(!empty($latestUpdate->date_posted))
                            <div class="update-meta"><i class="fa fa-calendar text-primary"></i>{{ \Carbon\Carbon::parse($latestUpdate->date_posted)->format('F d, Y') }}</div>
                        @endif
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($latestUpdate->description), 220) }}</p>
                        <a href="{{ route('newsandupdates.upcomingupdates.show', $latestUpdate->id) }}" class="btn btn-primary">Read Full Announcement</a>
                    </div>
                </article>

                <div class="updates-grid">
                    @forelse($otherUpdates as $update)
                        <article class="update-card">
                            <div class="update-card__media">
                                @if(!empty($update->image_file))
                                    <img src="{{ url('uploads/'.$update->image_file) }}" alt="{{ $update->title }}">
                                @else
                                    <div class="update-placeholder"><i class="fa fa-calendar-alt"></i></div>
                                @endif
                            </div>
                            <div class="update-card__body">
                                <span class="updates-label">Public Announcement</span>
                                <h3>{{ $update->title }}</h3>
                                @if(!empty($update->date_posted))
                                    <div class="update-meta"><i class="fa fa-calendar text-primary"></i>{{ \Carbon\Carbon::parse($update->date_posted)->format('F d, Y') }}</div>
                                @endif
                                <p>{{ \Illuminate\Support\Str::limit(strip_tags($update->description), 150) }}</p>
                                <a href="{{ route('newsandupdates.upcomingupdates.show', $update->id) }}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    @empty
                        <div class="updates-empty">
                            More announcements will appear here once published.
                        </div>
                    @endforelse
                </div>
            </div>
        @else
            <div class="updates-empty">
                No announcements have been published yet.
            </div>
        @endif
    </div>
</section>
@endsection
