@extends('layouts.frontend')

@section('content')

<div class="container-fluid p-0">

    {{-- Hero Carousel --}}
    @include('frontend.home.components.carousel', ['items' => $carouselItems])

    {{-- Announcements Ticker --}}
    @include('frontend.home.components.announcements-ticker', ['announcements' => $announcements])

    {{-- Quick Links Section --}}
    @include('frontend.home.components.quick-links')

    {{-- Featured News Section --}}
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-8">
                @include('frontend.home.components.featured-section', [
                    'title' => 'Latest News & Updates',
                    'viewAllLink' => route('newsandupdates.news'),
                    'items' => $featuredItems->toArray()
                ])

                {{-- Pagination --}}
                @if($pagination->hasPages())
                    <div class="pagination-wrapper mt-3">
                        {{ $pagination->links() }}
                    </div>
                @endif
            </div>

            {{-- Sidebar: Announcements + Facebook --}}
            <div class="col-lg-4">
                {{-- Latest Announcements Sidebar --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white" style="font-family:Helvetica;font-weight:bold;">
                        <i class="fa fa-bullhorn mr-2"></i>Announcements
                    </div>
                    <div class="card-body p-0">
                        @if(isset($announcements) && $announcements->isNotEmpty())
                            @foreach($announcements->take(5) as $ann)
                            <div class="border-bottom p-3">
                                <div class="d-flex align-items-start">
                                    <div style="min-width:8px;height:8px;border-radius:50%;background:#28a745;margin-top:6px;margin-right:10px;"></div>
                                    <div>
                                        <p class="mb-1" style="font-size:0.87rem;font-weight:600;color:#212529;line-height:1.4;">{{ $ann->title }}</p>
                                        <small class="text-muted">
                                            <i class="fa fa-calendar mr-1"></i>
                                            {{ \Carbon\Carbon::parse($ann->date_posted)->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="p-2 text-center">
                                <a href="{{ route('announcements.index') }}" class="btn btn-sm btn-outline-success">View All Announcements</a>
                            </div>
                        @else
                            <div class="p-3 text-center text-muted">No announcements at this time.</div>
                        @endif
                    </div>
                </div>

                {{-- Facebook Video --}}
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-success text-white" style="font-family:Helvetica;font-weight:bold;">
                        <i class="fab fa-facebook mr-2"></i>Facebook
                    </div>
                    <div class="card-body p-2">
                        <div class="video-container">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FTeamJameLeenOfficial%2Fvideos%2F906123544379328%2F&show_text=false&width=560&t=0"
                                    width="100%" height="250"
                                    style="border:none;overflow:hidden"
                                    scrolling="no" frameborder="0"
                                    allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    loading="lazy">
                            </iframe>
                        </div>
                        <div class="text-center mt-2">
                            <a href="https://www.facebook.com/BontocPIO" target="_blank" class="btn btn-sm btn-primary w-100">
                                <i class="fab fa-facebook mr-1"></i> Follow Bontoc PIO
                            </a>
                        </div>
                    </div>
                </div>
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

@endsection
