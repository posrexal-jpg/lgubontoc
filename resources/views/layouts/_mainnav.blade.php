<nav class="main-navbar navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-3 px-md-4">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="mainNavbar">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i> Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">About Us</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('about.history') }}" class="dropdown-item">History</a>
                        <a href="{{ route('about.missionandvision') }}" class="dropdown-item">Mission &amp; Vision</a>
                        <a href="{{ route('about.mandate') }}" class="dropdown-item">Mandate</a>
                        <a href="{{ route('about.municipalityseal') }}" class="dropdown-item">Municipality Seal</a>
                        <a href="{{ route('about.servicepledge') }}" class="dropdown-item">Service Pledge</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('about.directory') }}" class="dropdown-item">Office Directory</a>
                        <a href="{{ route('about.location') }}" class="dropdown-item">Location Map</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Government</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('government.officials') }}" class="dropdown-item">Elected Officials</a>
                        <a href="{{ route('barangays.index') }}" class="dropdown-item">Barangays</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('about.directory') }}" class="dropdown-item">Offices &amp; Departments</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News &amp; Updates</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('announcements.index') }}" class="dropdown-item">Announcements &amp; Advisories</a>
                        <a href="{{ route('newsandupdates.news') }}" class="dropdown-item">News</a>
                        <a href="{{ route('newsandupdates.upcomingupdates') }}" class="dropdown-item">Upcoming Events</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('services.citizenscharter') }}" class="dropdown-item">Citizen's Charter</a>
                        <a href="{{ route('services.mayorsoffice') }}" class="dropdown-item">Mayor's Office</a>
                        <div class="dropdown-divider"></div>
                        <a href="https://brgyprofiling.bitsorg.info/login" target="_blank" class="dropdown-item">Barangay Info System</a>
                        <a href="https://bomwasa.bitsorg.info/billinquiry" target="_blank" class="dropdown-item">BOMWASA Water Bill</a>
                        <a href="https://hrmis.bitsorg.info/login" target="_blank" class="dropdown-item">Document Tracking</a>
                        <a href="https://hrmis.bitsorg.info/login" target="_blank" class="dropdown-item">Employee Info System</a>
                        <a href="https://lgusupply.bitsorg.info/login" target="_blank" class="dropdown-item">Supply Management</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Transparency</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('transparency.budget') }}" class="dropdown-item">Budget &amp; Financial Reports</a>
                        <a href="{{ route('transparency.municipalordinances') }}" class="dropdown-item">Municipal Ordinances</a>
                        <a href="{{ route('transparency.resolutions') }}" class="dropdown-item">Resolutions</a>
                        <div class="dropdown-divider"></div>
                        <a href="https://fdpp.dilg.gov.ph/" target="_blank" class="dropdown-item">Full Disclosure Portal</a>
                        <a href="https://www.foi.gov.ph/" target="_blank" class="dropdown-item">Freedom of Information</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tourism</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('tourism.bontocattractions') }}" class="dropdown-item">Bontoc Attractions</a>
                        <a href="https://www.facebook.com/BontocTourismOffice" target="_blank" class="dropdown-item">Tourism Facebook Page</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('others.downloadableforms') }}" class="dropdown-item">Downloadable Forms</a>
                        <a href="{{ route('others.gallery') }}" class="dropdown-item">Photo Gallery</a>
                        <a href="{{ route('others.memorandom') }}" class="dropdown-item">Memoranda</a>
                        <div class="dropdown-divider"></div>
                        <a href="https://cscro8.weebly.com/december-2021-bulletin-of-vacant-position.html" target="_blank" class="dropdown-item">Job Vacancies</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
                </li>

            </ul>

            {{-- Search --}}
            <form class="nav-search d-none d-lg-flex align-items-center ml-2" action="javascript:void(0);">
                <input type="text" placeholder="Search…" aria-label="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</nav>
