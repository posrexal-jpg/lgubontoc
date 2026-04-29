@extends('layouts.frontend')

@section('content')
<section class="home-hero">
    <div class="home-hero__media" style="background-image: url('{{ asset('uploads/m1KQTRPgOCyDRFpmPxdKqjcs5rYeBN.jfif') }}');"></div>
    <div class="container home-hero__content">
        <div class="home-hero__copy">
            <span class="eyebrow">Official LGU Portal</span>
            <h1>Municipality of Bontoc, Southern Leyte</h1>
            <p>Access public services, announcements, transparency documents, tourism information, and municipal resources from one official source.</p>
            <div class="home-hero__actions">
                <a href="{{ route('services.citizenscharter') }}" class="btn btn-primary">Citizen's Charter</a>
                <a href="{{ route('transparency.resolutions') }}" class="btn btn-outline-light">Transparency</a>
            </div>
        </div>
        <aside class="home-hero__panel" aria-label="Municipal quick facts">
            <div>
                <strong>Public Service Desk</strong>
                <span>Municipal Hall, Bontoc</span>
            </div>
            <div>
                <strong>Emergency Hotline</strong>
                <span>911 and local response offices</span>
            </div>
            <div>
                <strong>Office Hours</strong>
                <span>Monday to Friday, 8:00 AM - 5:00 PM</span>
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
            <a href="{{ route('transparency.municipalordinances') }}" class="service-card">
                <i class="fa fa-balance-scale"></i>
                <strong>Ordinances</strong>
                <span>Municipal ordinances and legislative records.</span>
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

                @if($pagination->hasPages())
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
                <a href="{{ route('newsandupdates.upcomingupdates') }}" class="panel-link">View upcoming events</a>
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
