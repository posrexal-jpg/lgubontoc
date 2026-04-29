@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Location',
    'title' => 'Location',
    'description' => 'Find information about Bontoc\'s location, accessibility, and geographic context within Southern Leyte.'
])

<style>
    .location-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) minmax(320px, 480px);
        gap: 2rem;
        align-items: start;
    }

    .location-map-card {
        border: 1px solid #dce3ea;
        background: #fff;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .location-map-card iframe {
        width: 100%;
        aspect-ratio: 4 / 3;
        display: block;
        border: 0;
    }

    .location-map-card__body {
        padding: 1rem;
    }

    .location-map-card__body strong {
        display: block;
        color: #143226;
        margin-bottom: .35rem;
    }

    .location-map-card__body p {
        color: #5f6b76;
        margin-bottom: 0;
    }

    @media (max-width: 991.98px) {
        .location-layout {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="container about-page-content">
  @if(isset($location->title))
        @php
            $latitude = $location->latitude ?: '10.3556';
            $longitude = $location->longitude ?: '124.9697';
            $mapUrl = $location->map_embed_url ?: 'https://www.openstreetmap.org/export/embed.html?bbox='.($longitude - 0.02).'%2C'.($latitude - 0.02).'%2C'.($longitude + 0.02).'%2C'.($latitude + 0.02).'&layer=mapnik&marker='.$latitude.'%2C'.$longitude;
        @endphp

        <div class="location-layout">
            <div>
                <h2><span>{{$location->title}}</span></h2>
                <div class="siteorigin-widget-tinymce textwidget">
                    {!! $location->description !!}
                </div>
            </div>

            <aside class="location-map-card">
                <iframe src="{{ $mapUrl }}" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Map of Bontoc, Southern Leyte"></iframe>
                <div class="location-map-card__body">
                    <strong>Municipality of Bontoc</strong>
                    <p>{{ $location->address ?: 'Bontoc, Southern Leyte, Philippines' }}</p>
                </div>
            </aside>
        </div>
    @endif
</div>

@endsection
