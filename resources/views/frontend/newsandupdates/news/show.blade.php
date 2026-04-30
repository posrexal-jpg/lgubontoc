@extends('layouts.frontend')

@section('content')
@php
    $heroImage = !empty($news->image_file) ? url('uploads/'.$news->image_file) : asset('resources/bontoclogonobg.png');
    $category = $news->category ?: 'Municipal News';
    $author = $news->author ?: 'Bontoc LGU';
    $postedOn = !empty($news->date_posted) ? \Carbon\Carbon::parse($news->date_posted)->format('F j, Y') : 'Not specified';
    $plainDescription = trim(strip_tags((string) $news->description));
    $shareUrl = route('newsandupdates.news.show', $news->id);
    $shareTitle = $news->title;
@endphp

<style>
    .article-hero {
        position: relative;
        overflow: hidden;
        background: #0b3d2a;
        color: #fff;
    }

    .article-hero__media {
        position: absolute;
        inset: 0;
        background-image: linear-gradient(90deg, rgba(5, 35, 23, .94), rgba(5, 35, 23, .7), rgba(5, 35, 23, .22)), url('{{ $heroImage }}');
        background-position: center;
        background-size: cover;
    }

    .article-hero__content {
        position: relative;
        z-index: 1;
        min-height: 500px;
        display: flex;
        align-items: end;
        padding-top: 5rem;
        padding-bottom: 3.25rem;
    }

    .article-hero__inner {
        max-width: 880px;
    }

    .article-breadcrumb {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
        margin-bottom: 1rem;
        color: rgba(255,255,255,.82);
        font-weight: 700;
    }

    .article-breadcrumb a {
        color: #fff;
    }

    .article-category {
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

    .article-hero h1 {
        color: #fff;
        font-size: clamp(2.25rem, 5vw, 4.6rem);
        font-weight: 800;
        line-height: 1;
        margin-bottom: 1rem;
    }

    .article-summary {
        max-width: 720px;
        color: rgba(255,255,255,.9);
        font-size: 1.12rem;
        margin-bottom: 1.35rem;
    }

    .article-meta {
        display: flex;
        flex-wrap: wrap;
        gap: .8rem 1rem;
        color: rgba(255,255,255,.9);
        font-weight: 700;
    }

    .article-page {
        background: #f5f7f2;
        padding: 3rem 0 4.5rem;
    }

    .article-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 2rem;
        align-items: start;
    }

    .article-card,
    .article-panel {
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .article-card__image {
        width: 100%;
        max-height: 520px;
        object-fit: cover;
        display: block;
        background: #edf8e7;
    }

    .article-card__body {
        padding: clamp(1.35rem, 3vw, 2.25rem);
    }

    .article-card__body h2,
    .article-panel h2 {
        color: #143226;
        font-size: 1.45rem;
        font-weight: 800;
        margin-bottom: 1rem;
    }

    .article-content {
        color: #405247;
        font-size: 1.06rem;
        line-height: 1.78;
    }

    .article-sidebar {
        position: sticky;
        top: 1rem;
    }

    .article-panel {
        padding: 1.35rem;
    }

    .article-panel + .article-panel {
        margin-top: 1.25rem;
    }

    .article-info {
        display: grid;
        gap: .9rem;
    }

    .article-info div {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        gap: .8rem;
        align-items: center;
    }

    .article-info i {
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #edf8e7;
        color: #1f7a3f;
    }

    .article-info strong {
        display: block;
        color: #143226;
        font-weight: 800;
    }

    .article-info span {
        color: #5f6b76;
    }

    .article-actions {
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

    .article-navigation {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 1rem;
        margin-top: 1.25rem;
    }

    .article-navigation__item {
        display: flex;
        align-items: center;
        gap: .85rem;
        min-height: 112px;
        padding: 1rem;
        background: #fff;
        border: 1px solid #dce3ea;
        color: #143226;
        box-shadow: 0 10px 24px rgba(11, 61, 42, .07);
    }

    .article-navigation__item:hover {
        color: #143226;
        border-color: #1f7a3f;
        text-decoration: none;
    }

    .article-navigation__item--next {
        justify-content: flex-end;
        text-align: right;
    }

    .article-navigation__icon {
        flex: 0 0 42px;
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        background: #edf8e7;
        color: #1f7a3f;
    }

    .article-navigation__label {
        display: block;
        margin-bottom: .25rem;
        color: #60726a;
        font-size: .78rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .06em;
    }

    .article-navigation__title {
        display: block;
        color: #143226;
        font-size: 1rem;
        font-weight: 900;
        line-height: 1.25;
    }

    @media (max-width: 991.98px) {
        .article-layout {
            grid-template-columns: 1fr;
        }

        .article-sidebar {
            position: static;
        }
    }

    @media (max-width: 575.98px) {
        .article-navigation {
            grid-template-columns: 1fr;
        }

        .article-navigation__item--next {
            text-align: left;
            justify-content: flex-start;
        }

        .article-navigation__item--next .article-navigation__icon {
            order: -1;
        }
    }
</style>

<section class="article-hero">
    <div class="article-hero__media"></div>
    <div class="container article-hero__content">
        <div class="article-hero__inner">
            <nav class="article-breadcrumb" aria-label="breadcrumb">
                <a href="{{ route('home') }}">Home</a>
                <span>/</span>
                <a href="{{ route('newsandupdates.news') }}">News</a>
                <span>/</span>
                <span>{{ $news->title }}</span>
            </nav>
            <span class="article-category"><i class="fa fa-tag" aria-hidden="true"></i>{{ $category }}</span>
            <h1>{{ $news->title }}</h1>
            @if($plainDescription)
                <p class="article-summary">{{ \Illuminate\Support\Str::limit($plainDescription, 190) }}</p>
            @endif
            <div class="article-meta">
                <span><i class="fa fa-user mr-1" aria-hidden="true"></i>By {{ $author }}</span>
                <span><i class="fa fa-calendar mr-1" aria-hidden="true"></i>Posted on {{ $postedOn }}</span>
            </div>
        </div>
    </div>
</section>

<section class="article-page">
    <div class="container article-layout">
        <main>
            <article class="article-card">
                @if(!empty($news->image_file))
                    <img class="article-card__image" src="{{ url('uploads/'.$news->image_file) }}" alt="{{ $news->title }}">
                @endif
                <div class="article-card__body">
                    <h2>News Details</h2>
                    <div class="article-content siteorigin-widget-tinymce textwidget">
                        {!! $news->description !!}
                    </div>
                </div>
            </article>

            @if($previousNews || $nextNews)
                <nav class="article-navigation" aria-label="News article navigation">
                    @if($previousNews)
                        <a class="article-navigation__item" href="{{ route('newsandupdates.news.show', $previousNews->id) }}">
                            <span class="article-navigation__icon"><i class="fa fa-arrow-left" aria-hidden="true"></i></span>
                            <span>
                                <span class="article-navigation__label">Previous News</span>
                                <span class="article-navigation__title">{{ \Illuminate\Support\Str::limit($previousNews->title, 82) }}</span>
                            </span>
                        </a>
                    @endif

                    @if($nextNews)
                        <a class="article-navigation__item article-navigation__item--next" href="{{ route('newsandupdates.news.show', $nextNews->id) }}">
                            <span>
                                <span class="article-navigation__label">Next News</span>
                                <span class="article-navigation__title">{{ \Illuminate\Support\Str::limit($nextNews->title, 82) }}</span>
                            </span>
                            <span class="article-navigation__icon"><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                        </a>
                    @endif
                </nav>
            @endif
        </main>

        <aside class="article-sidebar" aria-label="News information">
            <section class="article-panel">
                <h2>News Information</h2>
                <div class="article-info">
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
            <section class="article-panel">
                <h2>More Actions</h2>
                <div class="article-actions">
                    <a href="{{ route('newsandupdates.news') }}" class="btn btn-primary">Back to News</a>
                    <a href="{{ route('newsandupdates.upcomingupdates') }}" class="btn btn-outline-secondary">View Announcements</a>
                </div>
            </section>
            <section class="article-panel">
                <h2>Share This News</h2>
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
            @if($relatedNews->isNotEmpty())
                <section class="article-panel">
                    <h2>Related Articles</h2>
                    <div class="related-articles">
                        @foreach($relatedNews as $related)
                            <a class="related-article-card" href="{{ route('newsandupdates.news.show', $related->id) }}">
                                <span class="related-article-card__media">
                                    @if(!empty($related->image_file))
                                        <img src="{{ url('uploads/'.$related->image_file) }}" alt="{{ $related->title }}">
                                    @else
                                        <img src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                                    @endif
                                </span>
                                <span>
                                    <strong>{{ $related->title }}</strong>
                                    <span>{{ !empty($related->date_posted) ? \Carbon\Carbon::parse($related->date_posted)->format('M d, Y') : 'News' }}</span>
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
