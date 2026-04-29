@extends('layouts.frontend')

@section('content')

<div class="container-fluid">
    <div class="col-lg-12">
        {{-- Hero Carousel --}}
        @include('frontend.home.components.carousel', ['items' => $carouselItems])

        {{-- Facebook Video Embed --}}
        <div class="video-container mt-4 mb-4">
            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FTeamJameLeenOfficial%2Fvideos%2F906123544379328%2F&show_text=false&width=560&t=0"
                    width="560" height="314"
                    style="border:none;overflow:hidden"
                    scrolling="no" frameborder="0"
                    allowfullscreen="true"
                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                    loading="lazy">
            </iframe>
        </div>

        {{-- Featured News Section --}}
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-lg-12">
                    @include('frontend.home.components.featured-section', [
                        'title' => 'Latest News & Updates',
                        'viewAllLink' => '#',
                        'items' => $featuredItems->toArray()
                    ])

                    {{-- Pagination --}}
                    @if($pagination->hasPages())
                        <div class="pagination-wrapper">
                            {{ $pagination->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Call-to-Action Section --}}
        @include('frontend.home.components.call-to-action')

        {{-- Social Media Feeds --}}
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-lg-12">
                    @include('frontend.home.components.social-feeds', [
                        'title' => 'Connect With Us',
                        'showFacebook' => true,
                        'facebookUrl' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FTeamJameLeenOfficial%2Fvideos%2F906123544379328%2F&show_text=false&width=560&t=0'
                    ])
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
