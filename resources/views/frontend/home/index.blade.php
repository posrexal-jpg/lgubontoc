@extends('layouts.frontend')

@section('content')
<section class="home-hero">
    <div id="homepageHeroCarousel" class="carousel slide home-hero__carousel" data-ride="carousel" data-interval="6500">
        @if(!empty($carouselItems) && count($carouselItems) > 1)
            <ol class="carousel-indicators">
                @foreach($carouselItems as $index => $item)
                    <li data-target="#homepageHeroCarousel" data-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></li>
                @endforeach
            </ol>
        @endif

        <div class="carousel-inner">
            @forelse($carouselItems as $index => $item)
                <div class="carousel-item @if($index === 0) active @endif">
                    <div class="home-hero__media" style="background-image: url('{{ asset($item['image']) }}');"></div>
                </div>
            @empty
                <div class="carousel-item active">
                    <div class="home-hero__media" style="background-image: url('{{ $heroImageUrl }}');"></div>
                </div>
            @endforelse
        </div>

        @if(!empty($carouselItems) && count($carouselItems) > 1)
            <a class="carousel-control-prev" href="#homepageHeroCarousel" role="button" data-slide="prev" aria-label="Previous slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#homepageHeroCarousel" role="button" data-slide="next" aria-label="Next slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        @endif
    </div>
    <div class="container home-hero__content">
        <div class="home-hero__copy">
            <span class="eyebrow">{{ $heroSetting->eyebrow }}</span>
            <h1>{{ $heroSetting->title }}</h1>
            <p>{{ $heroSetting->description }}</p>
            <div class="home-hero__actions">
                @if($heroSetting->primary_button_label && $heroSetting->primary_button_url)
                    <a href="{{ url($heroSetting->primary_button_url) }}" class="btn btn-primary">{{ $heroSetting->primary_button_label }}</a>
                @endif
                @if($heroSetting->secondary_button_label && $heroSetting->secondary_button_url)
                    <a href="{{ url($heroSetting->secondary_button_url) }}" class="btn btn-outline-light">{{ $heroSetting->secondary_button_label }}</a>
                @endif
            </div>
        </div>
        <aside class="home-hero__panel" aria-label="Municipal quick facts">
            <div>
                <strong>{{ $heroSetting->fact_1_title }}</strong>
                <span>{{ $heroSetting->fact_1_text }}</span>
            </div>
            <div>
                <strong>{{ $heroSetting->fact_2_title }}</strong>
                <span>{{ $heroSetting->fact_2_text }}</span>
            </div>
            <div>
                <strong>{{ $heroSetting->fact_3_title }}</strong>
                <span>{{ $heroSetting->fact_3_text }}</span>
            </div>
        </aside>
    </div>
</section>

<section class="stats-band" aria-label="Municipality highlights">
    <div class="container stats-band__grid">
        <div><strong>40</strong><span>Barangays</span></div>
        <div><strong>24/7</strong><span>Disaster Response</span></div>
        <div><strong>100%</strong><span>Public Disclosure Focus</span></div>
        <div><strong>1</strong><span>Official Web Portal</span></div>
    </div>
</section>

<section class="section-block services-block" id="services">
    <div class="container">
        <div class="section-title">
            <span>e-Government</span>
            <h2>Online Government Services</h2>
            <p>Quick access to commonly requested LGU services and public documents.</p>
        </div>
        <div class="service-grid">
            <a href="{{ route('services.citizenscharter') }}" class="service-card">
                <i class="fa fa-list-alt"></i>
                <strong>Citizen's Charter</strong>
                <span>Frontline services, requirements, and processing guidance.</span>
            </a>
            <a href="{{ route('services.mayorsoffice') }}" class="service-card">
                <i class="fa fa-landmark"></i>
                <strong>Mayor's Office</strong>
                <span>Programs, requests, and municipal assistance services.</span>
            </a>
            <a href="https://bomwasa.bitsorg.info/billinquiry" target="_blank" rel="noopener" class="service-card">
                <i class="fa fa-tint"></i>
                <strong>BOMWASA Inquiry</strong>
                <span>Waterworks billing inquiry and account information.</span>
            </a>
            <a href="{{ route('others.downloadableforms') }}" class="service-card">
                <i class="fa fa-download"></i>
                <strong>Downloadable Forms</strong>
                <span>Forms, templates, and public transaction documents.</span>
            </a>
            <a href="{{ route('transparency.fdp-reports') }}" class="service-card">
                <i class="fa fa-balance-scale"></i>
                <strong>Transparency</strong>
                <span>FDP reports and public transparency records.</span>
            </a>
            <a href="{{ route('about.directory') }}" class="service-card">
                <i class="fa fa-address-book"></i>
                <strong>Office Directory</strong>
                <span>Departments, contacts, and service offices.</span>
            </a>
        </div>
    </div>
</section>

<section class="section-block news-advisory-block">
    <div class="container">
        <div class="content-grid">
            <div class="content-grid__main">
                @include('frontend.home.components.featured-section', [
                    'title' => 'Latest News & Announcements',
                    'viewAllLink' => route('newsandupdates.news'),
                    'items' => $featuredItems->toArray()
                ])

                @if($pagination && $pagination->hasPages())
                    <div class="pagination-wrapper">
                        {{ $pagination->links() }}
                    </div>
                @endif
            </div>
            <aside class="advisory-panel">
                <div class="panel-heading">
                    <span>Public Information</span>
                    <h2>Advisories</h2>
                </div>
                <article>
                    <time>Today</time>
                    <h3>Monitor official announcements</h3>
                    <p>Residents are encouraged to follow verified LGU channels for weather, disaster response, and public safety updates.</p>
                </article>
                <article>
                    <time>Services</time>
                    <h3>Prepare complete requirements</h3>
                    <p>Review the Citizen's Charter before visiting municipal offices for faster processing.</p>
                </article>
                <a href="{{ route('newsandupdates.upcomingupdates') }}" class="panel-link">View announcements</a>
            </aside>
        </div>
    </div>
</section>

<section class="section-block direction-block">
    <div class="container direction-grid">
        <div>
            <span class="eyebrow">Our Direction</span>
            <h2>Mission, Vision, and Core Public Service</h2>
            <p>The Municipal Government of Bontoc works to deliver transparent, accessible, and accountable services for every resident, visitor, and stakeholder.</p>
            <div class="direction-actions">
                <a href="{{ route('about.missionandvision') }}">Mission and Vision</a>
                <a href="{{ route('about.history') }}">About Bontoc</a>
            </div>
        </div>
        <blockquote>
            "A responsive local government that keeps people informed, connects services clearly, and strengthens trust through open governance."
        </blockquote>
    </div>
</section>

<section class="section-block explore-block">
    <div class="container">
        <div class="section-title section-title--left">
            <span>Discover Bontoc</span>
            <h2>Tourism, Culture, and Community</h2>
        </div>
        <div class="explore-grid">
            <a href="{{ route('tourism.bontocattractions') }}" class="explore-card">
                <i class="fa fa-map-marked-alt"></i>
                <strong>Bontoc Attractions</strong>
                <span>Explore local destinations and points of interest.</span>
            </a>
            <a href="{{ route('others.gallery') }}" class="explore-card">
                <i class="fa fa-images"></i>
                <strong>Gallery</strong>
                <span>View municipal activities and community photos.</span>
            </a>
            <a href="{{ route('careers.jobvacancies') }}" class="explore-card">
                <i class="fa fa-briefcase"></i>
                <strong>Careers</strong>
                <span>Check vacancy postings and public employment updates.</span>
            </a>
        </div>
    </div>
</section>
@endsection
