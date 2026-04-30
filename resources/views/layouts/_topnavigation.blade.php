@php
    $user = auth()->user();
    $can = fn (string $permission) => $user && $user->hasPermission($permission);
@endphp

<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto d-xl-none">
                        <button id="sidepanel-toggler" class="admin-menu-btn" type="button" aria-label="Open admin navigation">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="app-search-box col">
                        <div class="admin-header-title">
                            <span class="admin-header-kicker">Municipality of Bontoc</span>
                            <strong>Admin Console</strong>
                        </div>
                    </div>
                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <img src="{{ $user?->profile_picture_url ?? asset('assets/images/user.png') }}" alt="user profile">
                                {{ $user->name ?? 'Account' }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li><a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('/logout') }}">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="{{ url('admin/dashboard') }}">
                    <img class="logo-icon me-2" src="{{ asset('assets/images/bontoclogo.png') }}" alt="logo">
                    <span class="logo-text">
                        <span class="logo-title">Bontoc LGU</span>
                        <span class="logo-subtitle">{{ $user?->isAdmin() ? 'Administrator' : 'Content Creator' }}</span>
                    </span>
                </a>
            </div>

            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <span class="nav-icon"><i class="fas fa-gauge"></i></span>
                    <span class="nav-link-text">Dashboard</span>
                </a>

                @if($can('home'))
                    <a class="nav-link" href="{{ route('admin.hero-images.index') }}">
                        <span class="nav-icon"><i class="fas fa-images"></i></span>
                        <span class="nav-link-text">Banners & Hero Images</span>
                    </a>

                    <a class="nav-link" href="{{ route('admin.carousel.index') }}">
                        <span class="nav-icon"><i class="fas fa-photo-film"></i></span>
                        <span class="nav-link-text">Homepage Carousel</span>
                    </a>

                    <a class="nav-link" href="{{ url('admin/home') }}">
                        <span class="nav-icon"><i class="fas fa-house"></i></span>
                        <span class="nav-link-text">Homepage Items</span>
                    </a>
                @endif

                @if($can('government'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-government" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-landmark"></i></span>
                        <span class="nav-link-text">Government</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-government" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.government.officials.index', ['category' => 'elected']) }}">Elected Officials</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.government.officials.index', ['category' => 'legislative']) }}">Legislative</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.government.officials.index') }}">All Officials</a></li>
                        </ul>
                    </div>
                @endif

                @if($can('about') || $can('careers'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-about" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-building-columns"></i></span>
                        <span class="nav-link-text">About Us</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-about" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            @if($can('about'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.history') }}">History</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.location') }}">Location</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.missionandvision') }}">Mission and Vision</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.municipalityseal') }}">Municipality Seal</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.servicepledge') }}">Service Pledge</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.mandate') }}">Mandate</a></li>
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.directory') }}">Directory</a></li>
                            @endif
                            @if($can('careers'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.careers.jobvacancies') }}">Careers</a></li>
                            @endif
                        </ul>
                    </div>
                @endif

                @if($can('news'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-news" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-newspaper"></i></span>
                        <span class="nav-link-text">News and Updates</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-news" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.newsandupdates.news.list') }}">News</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.newsandupdates.upcomingupdates.list') }}">Announcements</a></li>
                        </ul>
                    </div>
                @endif

                @if($can('transparency'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-transparency" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-scale-balanced"></i></span>
                        <span class="nav-link-text">Transparency</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-transparency" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transparency.fdp-reports.index') }}">FDP Reports</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transparency.resolutions') }}">SB Resolutions</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transparency.municipalordinances') }}">SB Ordinances</a></li>
                        </ul>
                    </div>
                @endif

                @if($can('services') || $can('transaction_links'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-services" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-handshake"></i></span>
                        <span class="nav-link-text">Services & Transactions</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-services" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            @if($can('services'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.services.mayorsoffice') }}">Mayor's Office</a></li>
                            @endif
                            @if($can('transaction_links'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transactions.links.index') }}">Transaction Links</a></li>
                            @endif
                        </ul>
                    </div>
                @endif

                @if($can('tourism'))
                    <a class="nav-link" href="{{ route('admin.tourism.bontocattractions') }}">
                        <span class="nav-icon"><i class="fas fa-map-location-dot"></i></span>
                        <span class="nav-link-text">Tourism</span>
                    </a>
                @endif

                @if($can('downloadable_forms') || $can('gallery') || $can('memorandum'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-others" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-folder-open"></i></span>
                        <span class="nav-link-text">Others</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-others" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            @if($can('downloadable_forms'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.downloadableforms') }}">Downloadable Forms</a></li>
                            @endif
                            @if($can('gallery'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.gallery') }}">Gallery</a></li>
                            @endif
                            @if($can('memorandum'))
                                <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.others.memorandom') }}">Memorandum</a></li>
                            @endif
                        </ul>
                    </div>
                @endif

                @if($user?->isAdmin())
                    <a class="nav-link" href="{{ route('admin.users.index') }}">
                        <span class="nav-icon"><i class="fas fa-users-gear"></i></span>
                        <span class="nav-link-text">User Accounts</span>
                    </a>
                @endif

                @if($can('activity_logs'))
                    <a class="nav-link" href="{{ route('admin.logs.index') }}">
                        <span class="nav-icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="nav-link-text">Activity Logs</span>
                    </a>
                @endif
            </nav>
        </div>
    </div>
</header>
