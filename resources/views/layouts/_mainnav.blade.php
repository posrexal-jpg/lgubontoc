<nav class="site-nav navbar navbar-expand-lg" aria-label="Primary navigation">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand d-lg-none">Bontoc LGU</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-item nav-link">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Government</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('about.directory') }}" class="dropdown-item">Directory</a>
                        <a href="{{ route('about.history') }}" class="dropdown-item">History</a>
                        <a href="{{ route('about.missionandvision') }}" class="dropdown-item">Mission and Vision</a>
                        <a href="{{ route('about.mandate') }}" class="dropdown-item">Mandate</a>
                        <a href="{{ route('about.municipalityseal') }}" class="dropdown-item">Municipality Seal</a>
                        <a href="{{ route('about.servicepledge') }}" class="dropdown-item">Service Pledge</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('services.citizenscharter') }}" class="dropdown-item">Citizen's Charter</a>
                        <a href="{{ route('services.mayorsoffice') }}" class="dropdown-item">Mayor's Office</a>
                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://brgyprofiling.bitsorg.info/login">Barangay Information System</a>
                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://bomwasa.bitsorg.info/billinquiry">BOMWASA Billing Inquiry</a>
                        <a class="dropdown-item" target="_blank" rel="noopener" href="https://hrmis.bitsorg.info/login">Document Tracking System</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Transparency</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('transparency.municipalordinances') }}" class="dropdown-item">Municipal Ordinances</a>
                        <a href="{{ route('transparency.resolutions') }}" class="dropdown-item">Resolutions</a>
                        <a href="{{ route('others.downloadableforms') }}" class="dropdown-item">Downloadable Forms</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">News</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('newsandupdates.news') }}" class="dropdown-item">News and Announcements</a>
                        <a href="{{ route('newsandupdates.upcomingupdates') }}" class="dropdown-item">Upcoming Events</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tourism</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('tourism.bontocattractions') }}" class="dropdown-item">Bontoc Attractions</a>
                        <a target="_blank" rel="noopener" href="https://www.facebook.com/BontocTourismOffice" class="dropdown-item">Tourism Facebook Page</a>
                    </div>
                </div>
                <a href="{{ route('careers.jobvacancies') }}" class="nav-item nav-link">Careers</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Resources</a>
                    <div class="dropdown-menu">
                        <a href="{{ route('others.gallery') }}" class="dropdown-item">Gallery</a>
                        <a href="{{ route('others.memorandom') }}" class="dropdown-item">Memorandum</a>
                        <a href="{{ route('about.location') }}" class="dropdown-item">Location</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
