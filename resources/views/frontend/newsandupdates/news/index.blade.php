@extends('layouts.frontend')

@section('content')
@php
    $featuredNews = $allNews->first();
    $moreNews = $allNews->skip(1);
@endphp

<style>
    .news-page {
        background: #f5f7f2;
        /* padding: 4rem 0; */
    }

    .news-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 320px;
        gap: 2rem;
        align-items: start;
    }

    .news-featured,
    .news-list-item,
    .news-sidebar-box {
        background: #fff;
        border: 1px solid #e4e9df;
        border-radius: 4px;
        box-shadow: 0 10px 24px rgba(18, 57, 36, 0.08);
    }

    .news-featured__image {
        width: 100%;
        height: 360px;
        object-fit: cover;
        background: #eef2ea;
    }

    .news-featured__body,
    .news-list-item__body,
    .news-sidebar-box {
        padding: 1.25rem;
    }

    .news-meta {
        color: #6d766b;
        font-size: .92rem;
        margin-bottom: .75rem;
    }

    .news-featured h2,
    .news-list-item h3,
    .news-sidebar-box h4 {
        color: #1f4f2f;
        font-family: Helvetica, Arial, sans-serif;
    }

    .news-list {
        display: grid;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .news-list-item {
        display: grid;
        grid-template-columns: 180px minmax(0, 1fr);
        overflow: hidden;
    }

    .news-list-item__image {
        width: 100%;
        height: 100%;
        min-height: 150px;
        object-fit: cover;
        background: #eef2ea;
    }

    .news-sidebar {
        display: grid;
        gap: 1rem;
        position: sticky;
        top: 1rem;
    }

    .advisory-list {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .advisory-list li + li {
        border-top: 1px solid #e6ebe2;
        margin-top: .75rem;
        padding-top: .75rem;
    }

    .advisory-list a {
        color: #1f4f2f;
        font-weight: 700;
    }

    @media (max-width: 991.98px) {
        .news-layout {
            grid-template-columns: 1fr;
        }

        .news-sidebar {
            position: static;
        }
    }

    @media (max-width: 575.98px) {
        .news-featured__image {
            height: 230px;
        }

        .news-list-item {
            grid-template-columns: 1fr;
        }

        .news-list-item__image {
            height: 210px;
        }
    }
</style>

@include('frontend.partials.page-header', [
    'title' => 'Municipality of Bontoc News',
    'description' => 'Read the latest news, programs, announcements, and public information from the Municipal Government of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'News and Updates'],
        ['label' => 'News'],
    ],
])

<div class="news-page">
    <div class="container">
        @if($featuredNews)
            <div class="news-layout">
                <main>
                    <article class="news-featured">
                        @if(!empty($featuredNews->image_file))
                            <img class="news-featured__image" src="{{ url('uploads/'.$featuredNews->image_file) }}" alt="{{ $featuredNews->title }}">
                        @else
                            <img class="news-featured__image" src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                        @endif

                        <div class="news-featured__body">
                            <h2>{{ $featuredNews->title }}</h2>
                            <div class="news-meta">
                                News | Posted by Admin
                                @if(!empty($featuredNews->date_posted))
                                    | {{ $featuredNews->date_posted }}
                                @endif
                            </div>
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($featuredNews->description), 260) }}</p>
                            <a href="{{ route('newsandupdates.news.show', $featuredNews->id) }}" class="btn btn-primary">Read more &rarr;</a>
                        </div>
                    </article>

                    <div class="news-list">
                        @foreach($moreNews as $news)
                            <article class="news-list-item">
                                @if(!empty($news->image_file))
                                    <img class="news-list-item__image" src="{{ url('uploads/'.$news->image_file) }}" alt="{{ $news->title }}">
                                @else
                                    <img class="news-list-item__image" src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                                @endif
                                <div class="news-list-item__body">
                                    <h3><a href="{{ route('newsandupdates.news.show', $news->id) }}">{{ $news->title }}</a></h3>
                                    <div class="news-meta">
                                        News | Posted by Admin
                                        @if(!empty($news->date_posted))
                                            | {{ $news->date_posted }}
                                        @endif
                                    </div>
                                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($news->description), 160) }}</p>
                                    <a href="{{ route('newsandupdates.news.show', $news->id) }}">Read more &rarr;</a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </main>

                <aside class="news-sidebar">
                    <section class="news-sidebar-box">
                        <h4>Weather Updates</h4>
                        @if($weather)
                            <p class="mb-2"><strong>Bontoc, Southern Leyte</strong></p>
                            <p class="mb-1">{{ $weather['condition'] }} · {{ $weather['temperature'] }}&deg;C</p>
                            <p class="mb-1">Humidity: {{ $weather['humidity'] }}%</p>
                            <p class="mb-0">Wind: {{ $weather['wind_speed'] }} km/h</p>
                            <small class="text-muted">Source: Open-Meteo</small>
                        @else
                            <p class="mb-0">Weather updates for Bontoc, Southern Leyte are temporarily unavailable. Monitor official advisories for urgent bulletins.</p>
                        @endif
                    </section>

                    <section class="news-sidebar-box">
                        <h4>Announcements</h4>
                        @if($advisories->isNotEmpty())
                            <ul class="advisory-list">
                                @foreach($advisories as $advisory)
                                    <li>
                                        <a href="{{ route('newsandupdates.upcomingupdates.show', $advisory->id) }}">{{ $advisory->title }}</a>
                                        @if(!empty($advisory->date_posted))
                                            <div class="news-meta mb-0">on {{ $advisory->date_posted }}</div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mb-0">No advisories have been published yet.</p>
                        @endif
                    </section>
                </aside>
            </div>
        @else
            <div class="text-center">
                <p>No news has been published yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection
