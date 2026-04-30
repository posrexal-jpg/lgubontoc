@extends('layouts.frontend')

@section('content')
@php
    $heroImage = !empty($upcomingupdate->image_file) ? url('uploads/'.$upcomingupdate->image_file) : asset('resources/bontoclogonobg.png');
    $category = $upcomingupdate->category ?: 'Announcement';
    $author = $upcomingupdate->author ?: 'Bontoc LGU';
    $postedOn = !empty($upcomingupdate->date_posted) ? \Carbon\Carbon::parse($upcomingupdate->date_posted)->format('F j, Y') : 'Not specified';
    $plainDescription = trim(strip_tags((string) $upcomingupdate->description));
    $shareUrl = route('newsandupdates.upcomingupdates.show', $upcomingupdate->id);
    $shareTitle = $upcomingupdate->title;
@endphp

<style>
    .announcement-hero {
        position: relative;
        overflow: hidden;
        background: #0b3d2a;
        color: #fff;
    }

    .announcement-hero__media {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(90deg, rgba(5, 35, 23, .94), rgba(5, 35, 23, .7), rgba(5, 35, 23, .22)), url('{{ $heroImage }}');
        background-position: center;
        background-size: cover;
    }

    .announcement-hero__content {
        position: relative;
        z-index: 1;
        min-height: 500px;
        display: flex;
        align-items: end;
        padding-top: 5rem;
        padding-bottom: 3.25rem;
    }

    .announcement-hero__inner {
        max-width: 880px;
    }

    .announcement-breadcrumb {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
        color: rgba(255,255,255,.82);
        font-weight: 700;
    }

    .announcement-breadcrumb a {
        color: #fff;
    }

    .announcement-category {
        display: inline-flex;
        align-items: center;
        gap: .45rem;
        margin-bottom: .85rem;
        padding: .35rem .75rem;
        background: rgba(242, 183, 5, .95);
        color: #151515;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .06em;
    }

    .announcement-hero h1 {
        color: #fff;
        font-size: clamp(2.25rem, 5vw, 4.6rem);
        font-weight: 800;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .announcement-summary {
        max-width: 720px;
        color: rgba(255,255,255,.9);
        font-size: 1.12rem;
        margin-bottom: 1.35rem;
    }

    .announcement-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .8rem 1rem;
        color: rgba(255,255,255,.9);
        font-weight: 700;
    }

    .announcement-page {
        background: #f5f7f2;
        padding: 3rem 0 4.5rem;
    }

    .announcement-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 2rem;
        align-items: start;
    }

    .announcement-card,
    .announcement-panel {
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .announcement-card__image {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        display: block;
        background: #edf8e7;
    }

    .announcement-card__body {
        padding: clamp(1.35rem, 3vw, 2.25rem);
    }

    .announcement-card__body h2,
    .announcement-panel h2 {
        color: #143226;
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .announcement-content {
        color: #405247;
        font-size: 1.06rem;
        line-height: 1.78;
    }

    .announcement-sidebar {
        position: sticky;
        top: 1rem;
    }

    .announcement-panel {
        padding: 1.35rem;
    }

    .announcement-panel + .announcement-panel {
        margin-top: 1.25rem;
    }

    .announcement-info {
        display: grid;
        gap: .9rem;
    }

    .announcement-info div {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        gap: .8rem;
        align-items: center;
    }

    .announcement-info i {
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #edf8e7;
        color: #1f7a3f;
    }

    .announcement-info strong {
        display: block;
        color: #143226;
        font-weight: 800;
    }

    .announcement-info span {
        color: #5f6b76;
    }

    .announcement-actions {
        display: grid;
        gap: .65rem;
    }

    .share-buttons,
    .related-articles {
        display: grid;
        gap: .7rem;
    }

    .share-button,
    .copy-share-link {
        display: flex;
        align-items: center;
        gap: .6rem;
        width: 100%;
        border: 1px solid #dce3ea;
        padding: .7rem .85rem;
        background: #fff;
        color: #143226;
        font-weight: 800;
        text-align: left;
    }

    .share-button i,
    .copy-share-link i {
        width: 22px;
        color: #1f7a3f;
        text-align: center;
    }

    .related-article-card {
        display: grid;
        grid-template-columns: 86px minmax(0, 1fr);
        gap: .8rem;
        align-items: center;
        color: #143226;
    }

    .related-article-card__media {
        width: 86px;
        height: 72px;
        overflow: hidden;
        background: #edf8e7;
    }

    .related-article-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .related-article-card strong {
        display: block;
        color: #143226;
        font-size: .98rem;
        line-height: 1.25;
    }

    .related-article-card span {
        color: #5f6b76;
        font-size: .88rem;
        font-weight: 700;
    }

    @media (max-width: 991.98px) {
        .announcement-layout {
            grid-template-columns: 1fr;
        }

        .announcement-sidebar {
            position: static;
        }
    }
</style>

<section class="announcement-hero">
    <div class="announcement-hero__media"></div>
    <div class="container announcement-hero__content">
        <div class="announcement-hero__inner">
            <nav class="announcement-breadcrumb" aria-label="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('newsandupdates.upcomingupdates') }}">Announcements</a>
                <span>/</span>
                <span>{{ $upcomingupdate->title }}</span>
            </nav>
            <span class="announcement-category"><i class="fa fa-bullhorn" aria-hidden="true"></i>{{ $category }}</span>
            <h1>{{ $upcomingupdate->title }}</h1>
            @if($plainDescription)
                <p class="announcement-summary">{{ \Illuminate\Support\Str::limit($plainDescription, 190) }}</p>
            @endif
            <div class="announcement-meta">
                <span><i class="fa fa-user mr-1" aria-hidden="true"></i>By {{ $author }}</span>
                <span><i class="fa fa-calendar mr-1" aria-hidden="true"></i>Posted on {{ $postedOn }}</span>
            </div>
        </div>
    </div>
</section>

<section class="announcement-page">
    <div class="container announcement-layout">
        <main>
            <article class="announcement-card">
                @if(!empty($upcomingupdate->image_file))
                    <img class="announcement-card__image" src="{{ url('uploads/'.$upcomingupdate->image_file) }}" alt="{{ $upcomingupdate->title }}">
                @endif
                <div class="announcement-card__body">
                    <h2>Announcement Details</h2>
                    <div class="announcement-content siteorigin-widget-tinymce textwidget">
                        {!! $upcomingupdate->description !!}
                    </div>
                </div>
            </article>
        </main>

        <aside class="announcement-sidebar" aria-label="Announcement information">
            <section class="announcement-panel">
                <h2>Announcement Information</h2>
                <div class="announcement-info">
                    <div>
                        <i class="fa fa-tag" aria-hidden="true"></i>
                        <p><strong>Category</strong><span>{{ $category }}</span></p>
                    </div>
                    <div>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p><strong>Author</strong><span>{{ $author }}</span></p>
                    </div>
                    <div>
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <p><strong>Posted on</strong><span>{{ $postedOn }}</span></p>
                    </div>
                </div>
            </section>
            <section class="announcement-panel">
                <h2>More Actions</h2>
                <div class="announcement-actions">
                    <a href="{{ route('newsandupdates.upcomingupdates') }}" class="btn btn-primary">Back to Announcements</a>
                    <a href="{{ route('newsandupdates.news') }}" class="btn btn-outline-secondary">View News</a>
                </div>
            </section>
            <section class="announcement-panel">
                <h2>Share This Announcement</h2>
                <div class="share-buttons">
                    <a class="share-button" target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i> Facebook
                    </a>
                    <a class="share-button" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url={{ urlencode($shareUrl) }}&text={{ urlencode($shareTitle) }}">
                        <i class="fab fa-twitter" aria-hidden="true"></i> X / Twitter
                    </a>
                    <a class="share-button" target="_blank" rel="noopener" href="https://api.whatsapp.com/send?text={{ urlencode($shareTitle.' '.$shareUrl) }}">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i> WhatsApp
                    </a>
                    <a class="share-button" href="mailto:?subject={{ rawurlencode($shareTitle) }}&body={{ rawurlencode($shareUrl) }}">
                        <i class="fa fa-envelope" aria-hidden="true"></i> Email
                    </a>
                    <button class="copy-share-link" type="button" data-copy-share-link="{{ $shareUrl }}">
                        <i class="fa fa-link" aria-hidden="true"></i> Copy Link
                    </button>
                </div>
            </section>
            @if($relatedUpdates->isNotEmpty())
                <section class="announcement-panel">
                    <h2>Related Articles</h2>
                    <div class="related-articles">
                        @foreach($relatedUpdates as $related)
                            <a class="related-article-card" href="{{ route('newsandupdates.upcomingupdates.show', $related->id) }}">
                                <span class="related-article-card__media">
                                    @if(!empty($related->image_file))
                                        <img src="{{ url('uploads/'.$related->image_file) }}" alt="{{ $related->title }}">
                                    @else
                                        <img src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                                    @endif
                                </span>
                                <span>
                                    <strong>{{ $related->title }}</strong>
                                    <span>{{ !empty($related->date_posted) ? \Carbon\Carbon::parse($related->date_posted)->format('M d, Y') : 'Announcement' }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </aside>
    </div>
</section>
@endsection
