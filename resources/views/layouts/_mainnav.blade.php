{{-- Adapted from iGovPhil/gwt-static P2.0.0 top-bar navigation structure. --}}
@php
    $transactionLinks = \Illuminate\Support\Facades\Schema::hasTable('transaction_links')
        ? \App\Models\TransactionLink::where('is_active', true)->orderBy('sort_order')->orderBy('title')->get()
        : collect();

    $isRoute = fn (...$patterns) => request()->routeIs(...$patterns);
@endphp

<div id="main-nav" class="gwt-main-nav">
    <div class="gwt-nav-row">
        <nav class="top-bar navbar navbar-expand-lg" aria-label="Primary navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="{{ route('home') }}">BONTOCLGU</a></h1>
                </li>
                <li class="toggle-topbar menu-icon">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#gwtNavbar" aria-controls="gwtNavbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>
            </ul>

            <section class="top-bar-section collapse navbar-collapse" id="gwtNavbar">
                <ul class="left">
                    <li class="divider"></li>
                    <li @class(['active' => $isRoute('home')])><a href="{{ route('home') }}">Home</a></li>
                    <li class="divider"></li>

                    <li @class(['has-dropdown dropdown', 'active' => $isRoute('government.*', 'about.directory', 'about.mandate', 'about.missionandvision', 'about.servicepledge')])>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Government</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('government.elected-officials') }}">Elected Officials</a></li>
                            <li><a class="dropdown-item" href="{{ route('government.legislative') }}">Legislative</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.directory') }}">Directory</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.mandate') }}">Mandate</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.missionandvision') }}">Mission and Vision</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.servicepledge') }}">Service Pledge</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li @class(['has-dropdown dropdown', 'active' => $isRoute('services.*')])>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transactions</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('services.citizenscharter') }}">Citizen's Charter</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.mayorsoffice') }}">Mayor's Office</a></li>
                            @foreach($transactionLinks as $transactionLink)
                                <li>
                                    <a class="dropdown-item" href="{{ $transactionLink->url }}" @if($transactionLink->opens_new_tab) target="_blank" rel="noopener" @endif>
                                        {{ $transactionLink->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li @class(['has-dropdown dropdown', 'active' => $isRoute('transparency.*', 'others.downloadableforms')])>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transparency</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('transparency.fdp-reports') }}">Full Disclosure Policy Reports</a></li>
                            <li><a class="dropdown-item" href="{{ route('others.downloadableforms') }}">Downloadable Forms</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li @class(['active' => $isRoute('newsandupdates.news', 'newsandupdates.news.show')])><a href="{{ route('newsandupdates.news') }}">News</a></li>
                    <li class="divider"></li>
                    <li @class(['active' => $isRoute('newsandupdates.upcomingupdates', 'newsandupdates.upcomingupdates.show')])><a href="{{ route('newsandupdates.upcomingupdates') }}">Announcements</a></li>
                    <li class="divider"></li>
                    <li @class(['active' => $isRoute('tourism.*')])><a href="{{ route('tourism.index') }}">Tourism</a></li>
                    <li class="divider"></li>

                    <li @class(['has-dropdown dropdown', 'active' => $isRoute('about.history', 'about.location', 'about.municipalityseal', 'others.gallery', 'others.gallery.show', 'careers.*')])>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About us</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('about.history') }}">History</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.location') }}">Location</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.municipalityseal') }}">Municipality Seal</a></li>
                            <li><a class="dropdown-item" href="{{ route('others.gallery') }}">Gallery</a></li>
                            <li><a class="dropdown-item" href="{{ route('careers.jobvacancies') }}">Careers</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                </ul>

                <ul class="right">
                    <li class="accessibility">
                        <button type="button" id="accessibility-toggle" aria-label="Open accessibility tools" aria-expanded="false">
                            <i class="fa fa-universal-access"></i>
                        </button>
                    </li>
                </ul>
            </section>
        </nav>
    </div>
</div>
