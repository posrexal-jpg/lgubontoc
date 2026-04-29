{{-- Adapted from iGovPhil/gwt-static P2.0.0 top-bar navigation structure. --}}
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
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li class="divider"></li>

                    <li class="has-dropdown dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Government</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('about.directory') }}">Directory</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.mandate') }}">Mandate</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.missionandvision') }}">Mission and Vision</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.servicepledge') }}">Service Pledge</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li class="has-dropdown dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transactions</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('services.citizenscharter') }}">Citizen's Charter</a></li>
                            <li><a class="dropdown-item" href="{{ route('services.mayorsoffice') }}">Mayor's Office</a></li>
                            <li><a class="dropdown-item" target="_blank" rel="noopener" href="https://brgyprofiling.bitsorg.info/login">Barangay Information System</a></li>
                            <li><a class="dropdown-item" target="_blank" rel="noopener" href="https://bomwasa.bitsorg.info/billinquiry">BOMWASA Billing Inquiry</a></li>
                            <li><a class="dropdown-item" target="_blank" rel="noopener" href="https://hrmis.bitsorg.info/login">Document Tracking System</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li class="has-dropdown dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transparency</a>
                        <ul class="dropdown-menu dropdown">
                            <li><a class="dropdown-item" href="{{ route('transparency.municipalordinances') }}">Municipal Ordinances</a></li>
                            <li><a class="dropdown-item" href="{{ route('transparency.resolutions') }}">Resolutions</a></li>
                            <li><a class="dropdown-item" href="{{ route('others.downloadableforms') }}">Downloadable Forms</a></li>
                        </ul>
                    </li>
                    <li class="divider"></li>

                    <li><a href="{{ route('newsandupdates.news') }}">News</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('tourism.bontocattractions') }}">Tourism</a></li>
                    <li class="divider"></li>

                    <li class="has-dropdown dropdown">
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
                    <li class="search">
                        <a href="#site-search-input" aria-label="Search"><i class="fa fa-search"></i></a>
                    </li>
                    <li class="accessibility">
                        <a href="#main-content" aria-label="Accessibility"><i class="fa fa-universal-access"></i></a>
                    </li>
                </ul>
            </section>
        </nav>
    </div>
</div>
