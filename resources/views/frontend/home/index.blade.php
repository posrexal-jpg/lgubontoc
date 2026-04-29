@extends('layouts.frontend')

@push('styles')
<style>
    /* ── NEWS + SIDEBAR ────────────────────────── */
    .home-main-section { padding: 45px 0; background: var(--ph-light); }

    .sidebar-widget {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        overflow: hidden;
        margin-bottom: 22px;
        border: 1px solid #e9ecef;
    }
    .widget-header {
        background: var(--ph-navy);
        color: #fff; padding: 11px 16px;
        display: flex; align-items: center; gap: 8px;
        font-family: 'Lato', sans-serif;
        font-size: 0.85rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.6px;
    }
    .widget-header i { color: var(--ph-gold); }
    .widget-header a { color: var(--ph-gold); margin-left: auto; font-size: 0.75rem; font-weight: 600; }
    .widget-header a:hover { color: #fff; }

    /* Announcement list widget */
    .ann-widget-item {
        padding: 12px 14px; border-bottom: 1px solid #f0f0f0;
        display: flex; gap: 10px; align-items: flex-start;
    }
    .ann-widget-item:last-child { border-bottom: none; }
    .ann-dot {
        width: 8px; height: 8px; border-radius: 50%;
        background: var(--ph-gold); flex-shrink: 0; margin-top: 5px;
    }
    .ann-widget-item .ann-title {
        font-size: 0.83rem; font-weight: 600; color: #1a1a1a;
        line-height: 1.4; margin-bottom: 3px;
    }
    .ann-widget-item .ann-title a { color: inherit; }
    .ann-widget-item .ann-title a:hover { color: var(--ph-navy); }
    .ann-widget-item .ann-date { font-size: 0.73rem; color: #adb5bd; }
    .ann-widget-item .ann-badge {
        display: inline-block; font-size: 0.65rem;
        padding: 1px 7px; border-radius: 10px;
        font-weight: 700; text-transform: uppercase;
        margin-right: 4px; vertical-align: middle;
    }
    .badge-announcement { background: #e8f5e9; color: #155724; }
    .badge-advisory { background: #fff3cd; color: #856404; }
    .badge-notice { background: #d1ecf1; color: #0c5460; }

    /* Tourism teaser widget */
    .tourism-teaser { position: relative; overflow: hidden; border-radius: 0 0 8px 8px; }
    .tourism-teaser img { width: 100%; height: 160px; object-fit: cover; filter: brightness(.65); }
    .tourism-teaser .tt-overlay {
        position: absolute; inset: 0;
        display: flex; flex-direction: column;
        justify-content: flex-end; padding: 14px;
    }
    .tourism-teaser .tt-overlay h6 { color: #fff; font-weight: 700; font-size: 0.9rem; margin: 0 0 6px; }
    .tourism-teaser .tt-overlay a {
        display: inline-block;
        background: var(--ph-gold); color: #1a1a1a;
        font-size: 0.75rem; font-weight: 700;
        padding: 5px 14px; border-radius: 3px;
        text-decoration: none;
    }
</style>
@endpush

@section('content')

{{-- Hero Carousel --}}
@include('frontend.home.components.carousel', ['items' => $carouselItems])

{{-- Announcements Ticker --}}
@include('frontend.home.components.announcements-ticker', ['announcements' => $announcements])

{{-- Quick Links / E-Services --}}
@include('frontend.home.components.quick-links')

{{-- ── NEWS + SIDEBAR ── --}}
<section class="home-main-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="row">

            {{-- News Column --}}
            <div class="col-lg-8 mb-4">
                @include('frontend.home.components.featured-section', [
                    'title'       => 'Latest News & Updates',
                    'viewAllLink' => route('newsandupdates.news'),
                    'items'       => $featuredItems->toArray()
                ])
                @if($pagination->hasPages())
                    <div class="mt-2">{{ $pagination->links() }}</div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- Announcements Widget --}}
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <i class="fa fa-bullhorn"></i> Announcements
                        <a href="{{ route('announcements.index') }}">View All</a>
                    </div>
                    @if(isset($announcements) && $announcements->isNotEmpty())
                        @foreach($announcements->take(6) as $ann)
                        <div class="ann-widget-item">
                            <div class="ann-dot"></div>
                            <div>
                                <div class="ann-title">
                                    <span class="ann-badge badge-{{ $ann->type }}">{{ ucfirst($ann->type) }}</span>
                                    <a href="{{ route('announcements.index') }}">{{ $ann->title }}</a>
                                </div>
                                <div class="ann-date">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ \Carbon\Carbon::parse($ann->date_posted)->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="p-3 text-center text-muted" style="font-size:.83rem;">No announcements at this time.</div>
                    @endif
                </div>

                {{-- Facebook Widget --}}
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <i class="fab fa-facebook-f"></i> Facebook Page
                        <a href="https://www.facebook.com/BontocPIO" target="_blank">Follow</a>
                    </div>
                    <div class="p-2">
                        <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:4px;">
                            <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FTeamJameLeenOfficial%2Fvideos%2F906123544379328%2F&show_text=false&width=560&t=0"
                                    style="position:absolute;top:0;left:0;width:100%;height:100%;border:none;"
                                    scrolling="no" frameborder="0" allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    loading="lazy"></iframe>
                        </div>
                    </div>
                </div>

                {{-- Tourism Teaser --}}
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <i class="fa fa-mountain"></i> Visit Bontoc
                    </div>
                    <div class="tourism-teaser">
                        <img src="{{ asset('resources/img/Pictureo.jpg') }}" alt="Bontoc Tourism" loading="lazy">
                        <div class="tt-overlay">
                            <h6>Discover the beauty of Bontoc, Southern Leyte</h6>
                            <a href="{{ route('tourism.bontocattractions') }}">Explore Attractions <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                {{-- Quick Gov Links Widget --}}
                <div class="sidebar-widget">
                    <div class="widget-header">
                        <i class="fa fa-link"></i> Government Links
                    </div>
                    <div class="p-2">
                        @php $govLinks = [
                            ['GOV.PH','https://www.gov.ph/'],
                            ['Freedom of Information','https://www.foi.gov.ph/'],
                            ['Full Disclosure Portal','https://fdpp.dilg.gov.ph/'],
                            ['DILG','https://dilg.gov.ph/'],
                            ['Open Data Philippines','https://data.gov.ph/'],
                            ['DICT','https://dict.gov.ph/'],
                        ]; @endphp
                        @foreach($govLinks as [$label,$url])
                        <a href="{{ $url }}" target="_blank" style="display:flex;align-items:center;padding:8px 10px;font-size:.82rem;color:#333;border-bottom:1px solid #f5f5f5;gap:8px;text-decoration:none;">
                            <i class="fa fa-external-link-alt" style="color:var(--ph-gold);font-size:.75rem;width:14px;"></i>
                            {{ $label }}
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- Stats + Services + Transparency --}}
@include('frontend.home.components.call-to-action')

{{-- Social / Connect Section --}}
@include('frontend.home.components.social-feeds', [
    'title'       => 'Connect With Us',
    'showFacebook'=> true,
    'facebookUrl' => 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FTeamJameLeenOfficial%2Fvideos%2F906123544379328%2F&show_text=false&width=560&t=0'
])

@endsection
