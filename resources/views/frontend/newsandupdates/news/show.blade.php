@extends('layouts.frontend')

@section('content')
@php
    $heroImage = !empty($news->image_file) ? url('uploads/'.$news->image_file) : asset('resources/bontoclogonobg.png');
    $category = $news->category ?: 'Municipal News';
    $author = $news->author ?: 'Bontoc LGU';
    $postedOn = !empty($news->date_posted) ? \Carbon\Carbon::parse($news->date_posted)->format('F j, Y') : 'Not specified';
    $plainDescription = trim(strip_tags((string) $news->description));
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

    @media (max-width: 991.98px) {
        .article-layout {
            grid-template-columns: 1fr;
        }

        .article-sidebar {
            position: static;
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
        </aside>
    </div>
</section>
@endsection
