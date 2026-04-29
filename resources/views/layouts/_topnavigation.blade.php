@php
    $user = auth()->user();
    $can = fn (string $permission) => $user && $user->hasPermission($permission);
@endphp

<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="app-search-box col"></div>
                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <img src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="user profile">
                                {{ $user->name ?? 'Account' }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
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
                    <img class="logo-icon me-2" src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="logo">
                    <span class="logo-text">{{ $user?->isAdmin() ? 'Administrator' : 'Content Creator' }}</span>
                </a>
            </div>

            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <span class="nav-icon"><i class="fas fa-gauge"></i></span>
                    <span class="nav-link-text">Dashboard</span>
                </a>

                @if($can('home'))
                    <a class="nav-link" href="{{ url('admin/home') }}">
                        <span class="nav-icon"><i class="fas fa-house"></i></span>
                        <span class="nav-link-text">Homepage</span>
                    </a>
                @endif

                @if($can('about'))
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-about" aria-expanded="false">
                        <span class="nav-icon"><i class="fas fa-building-columns"></i></span>
                        <span class="nav-link-text">About Us</span>
                        <span class="submenu-arrow"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="submenu-about" class="collapse submenu" data-bs-parent="#app-nav-main">
                        <ul class="submenu-list list-unstyled">
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.history') }}">History</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.location') }}">Location</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.missionandvision') }}">Mission and Vision</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.municipalityseal') }}">Municipality Seal</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.servicepledge') }}">Service Pledge</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.mandate') }}">Mandate</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.aboutus.directory') }}">Directory</a></li>
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
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.newsandupdates.upcomingupdates.list') }}">Upcoming Updates</a></li>
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
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transparency.municipalordinances') }}">Municipal Ordinances</a></li>
                            <li class="submenu-item"><a class="submenu-link" href="{{ route('admin.transparency.resolutions') }}">Resolutions</a></li>
                        </ul>
                    </div>
                @endif

                @if($can('services'))
                    <a class="nav-link" href="{{ route('admin.services.mayorsoffice') }}">
                        <span class="nav-icon"><i class="fas fa-handshake"></i></span>
                        <span class="nav-link-text">Services</span>
                    </a>
                @endif

                @if($can('tourism'))
                    <a class="nav-link" href="{{ route('admin.tourism.bontocattractions') }}">
                        <span class="nav-icon"><i class="fas fa-map-location-dot"></i></span>
                        <span class="nav-link-text">Tourism</span>
                    </a>
                @endif

                @if($can('careers'))
                    <a class="nav-link" href="{{ route('admin.careers.jobvacancies') }}">
                        <span class="nav-icon"><i class="fas fa-briefcase"></i></span>
                        <span class="nav-link-text">Careers</span>
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
            </nav>
        </div>
    </div>
</header>
