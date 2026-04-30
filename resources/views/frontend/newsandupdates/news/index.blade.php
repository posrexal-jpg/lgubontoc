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

    .news-sidebar-card {
        overflow: hidden;
        padding: 0;
    }

    .news-sidebar-card__header {
        display: flex;
        align-items: center;
        gap: .75rem;
        padding: 1rem 1.15rem;
        background: #0b3d2a;
        color: #fff;
    }

    .news-sidebar-card__header i {
        width: 38px;
        height: 38px;
        display: grid;
        place-items: center;
        background: rgba(255, 255, 255, .14);
        border: 1px solid rgba(255, 255, 255, .22);
        border-radius: 50%;
        color: #f2b705;
    }

    .news-sidebar-card__header h4 {
        margin: 0;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 800;
    }

    .news-sidebar-card__header span {
        color: rgba(255, 255, 255, .78);
        font-size: .86rem;
        font-weight: 700;
    }

    .news-sidebar-card__body {
        padding: 1.15rem;
    }

    .weather-current {
        display: grid;
        gap: .25rem;
        margin-bottom: 1rem;
        padding: 1rem;
        background: linear-gradient(135deg, #edf8e7, #ffffff);
        border: 1px solid #dcebd6;
        border-radius: 8px;
    }

    .weather-current strong {
        color: #143226;
        font-size: 1.45rem;
        font-weight: 900;
        line-height: 1;
    }

    .weather-current span {
        color: #4f6258;
        font-weight: 800;
    }

    .weather-metrics {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: .7rem;
        margin-bottom: .85rem;
    }

    .weather-metric {
        padding: .8rem;
        background: #f8fbf6;
        border: 1px solid #e2eadf;
        border-radius: 8px;
    }

    .weather-metric span {
        display: block;
        color: #6a776f;
        font-size: .78rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .05em;
    }

    .weather-metric strong {
        display: block;
        color: #143226;
        font-size: 1.05rem;
        font-weight: 900;
    }

    .weather-source {
        display: flex;
        align-items: center;
        gap: .4rem;
        color: #6a776f;
        font-size: .86rem;
        font-weight: 700;
    }

    .advisory-list--cards {
        display: grid;
        gap: .75rem;
    }

    .advisory-list--cards li {
        margin: 0;
        padding: 0;
        border: 0;
    }

    .advisory-list--cards li + li {
        margin-top: 0;
        padding-top: 0;
        border-top: 0;
    }

    .advisory-card {
        display: grid;
        grid-template-columns: 42px minmax(0, 1fr);
        gap: .75rem;
        align-items: center;
        padding: .85rem;
        background: #f8fbf6;
        border: 1px solid #e2eadf;
        border-radius: 8px;
        color: #143226;
    }

    .advisory-card:hover {
        border-color: #1f7a3f;
        color: #143226;
        text-decoration: none;
    }

    .advisory-card__date {
        display: grid;
        place-items: center;
        width: 42px;
        height: 42px;
        background: #fff;
        border: 1px solid #dcebd6;
        border-radius: 8px;
        color: #1f7a3f;
        font-size: .78rem;
        font-weight: 900;
        line-height: 1.05;
        text-align: center;
        text-transform: uppercase;
    }

    .advisory-card strong {
        display: block;
        color: #143226;
        font-size: .98rem;
        font-weight: 900;
        line-height: 1.25;
    }

    .advisory-card span {
        display: block;
        margin-top: .2rem;
        color: #6a776f;
        font-size: .86rem;
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
                    <section class="news-sidebar-box news-sidebar-card">
                        <div class="news-sidebar-card__header">
                            <i class="fa fa-cloud-sun" aria-hidden="true"></i>
                            <div>
                                <h4>Weather Updates</h4>
                                <span>Bontoc, Southern Leyte</span>
                            </div>
                        </div>
                        <div class="news-sidebar-card__body">
                        @if($weather)
                            <div class="weather-current">
                                <strong>{{ $weather['temperature'] }}&deg;C</strong>
                                <span>{{ $weather['condition'] }}</span>
                            </div>
                            <div class="weather-metrics">
                                <div class="weather-metric">
                                    <span>Humidity</span>
                                    <strong>{{ $weather['humidity'] }}%</strong>
                                </div>
                                <div class="weather-metric">
                                    <span>Wind</span>
                                    <strong>{{ $weather['wind_speed'] }} km/h</strong>
                                </div>
                            </div>
                            <div class="weather-source">
                                <i class="fa fa-database" aria-hidden="true"></i>
                                Source: Open-Meteo
                            </div>
                        @else
                            <p class="mb-0">Weather updates for Bontoc, Southern Leyte are temporarily unavailable. Monitor official advisories for urgent bulletins.</p>
                        @endif
                        </div>
                    </section>

                    <section class="news-sidebar-box news-sidebar-card">
                        <div class="news-sidebar-card__header">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i>
                            <div>
                                <h4>Announcements</h4>
                                <span>Latest municipal advisories</span>
                            </div>
                        </div>
                        <div class="news-sidebar-card__body">
                        @if($advisories->isNotEmpty())
                            <ul class="advisory-list advisory-list--cards">
                                @foreach($advisories as $advisory)
                                    <li>
                                        @php
                                            $advisoryDate = !empty($advisory->date_posted) ? \Carbon\Carbon::parse($advisory->date_posted) : null;
                                        @endphp
                                        <a class="advisory-card" href="{{ route('newsandupdates.upcomingupdates.show', $advisory->id) }}">
                                            <span class="advisory-card__date">
                                                {{ $advisoryDate ? $advisoryDate->format('M') : 'LGU' }}
                                                <br>
                                                {{ $advisoryDate ? $advisoryDate->format('d') : 'Info' }}
                                            </span>
                                            <span>
                                                <strong>{{ $advisory->title }}</strong>
                                                @if($advisoryDate)
                                                    <span>on {{ $advisoryDate->format('Y-m-d') }}</span>
                                                @endif
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mb-0">No advisories have been published yet.</p>
                        @endif
                        </div>
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
