<!DOCTYPE html>
<html lang="en">
<head>
    <title>Municipality of Bontoc | Official Website</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Official website of the Municipal Government of Bontoc, Southern Leyte.">

    <link rel="icon" href="{{ asset('resources/bontoclogonobg.png') }}" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('resources/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/homepage.css') }}" rel="stylesheet">
</head>
<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>

    <div class="govph-bar">
        <div class="container govph-bar__inner">
            <div>
                <span class="govph-bar__label">GOV.PH</span>
                <span class="govph-bar__text">A Philippine Government Website</span>
            </div>
            <div class="govph-bar__links">
                <a href="https://www.gov.ph/" target="_blank" rel="noopener">National Portal</a>
                <a href="{{ route('services.citizenscharter') }}">Citizen's Charter</a>
                <a href="{{ route('about.directory') }}">Contact</a>
            </div>
        </div>
    </div>

    <header class="site-header">
        <div class="container site-header__inner">
            <a href="{{ route('home') }}" class="site-brand" aria-label="Municipality of Bontoc homepage">
                <img src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                <span>
                    <small>Republic of the Philippines</small>
                    <strong>Municipality of Bontoc</strong>
                    <em>Province of Southern Leyte</em>
                </span>
            </a>
            <div class="site-header__actions">
                <img src="{{ asset('resources/BagongPilipinas.png') }}" alt="Bagong Pilipinas" class="bagong-logo">
                <form action="{{ route('home') }}" method="GET" class="site-search">
                    <label class="sr-only" for="site-search-input">Search</label>
                    <input id="site-search-input" type="search" name="q" placeholder="Search website">
                    <button type="submit" aria-label="Search"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </header>

    @include('layouts._mainnav')

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="site-footer__top">
                <div>
                    <div class="footer-brand">
                        <img src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                        <span>
                            <strong>Municipal Government of Bontoc</strong>
                            <small>Official Website</small>
                        </span>
                    </div>
                    <p>Serving Bontoc with accessible information, transparent governance, and responsive public service.</p>
                    <div class="footer-socials">
                        <a target="_blank" rel="noopener" href="https://www.facebook.com/BontocPIO" aria-label="Bontoc PIO Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" rel="noopener" href="https://www.facebook.com/BontocTourismOffice" aria-label="Bontoc Tourism Facebook"><i class="fab fa-facebook-f"></i></a>
                    </div>
                </div>

                <div>
                    <h5>Government Links</h5>
                    <ul>
                        <li><a target="_blank" rel="noopener" href="https://www.gov.ph/">GOV.PH</a></li>
                        <li><a target="_blank" rel="noopener" href="https://www.officialgazette.gov.ph/">Official Gazette</a></li>
                        <li><a target="_blank" rel="noopener" href="https://dilg.gov.ph/">DILG</a></li>
                        <li><a target="_blank" rel="noopener" href="https://data.gov.ph/">Open Data Philippines</a></li>
                        <li><a target="_blank" rel="noopener" href="https://fdpp.dilg.gov.ph/">Full Disclosure Portal</a></li>
                    </ul>
                </div>

                <div>
                    <h5>Transparency</h5>
                    <ul>
                        <li><a href="{{ route('transparency.municipalordinances') }}">Municipal Ordinances</a></li>
                        <li><a href="{{ route('transparency.resolutions') }}">Resolutions</a></li>
                        <li><a href="{{ route('others.downloadableforms') }}">Downloadable Forms</a></li>
                        <li><a href="{{ route('services.citizenscharter') }}">Citizen's Charter</a></li>
                    </ul>
                    <img src="{{ asset('images/transparencyseal.png') }}" alt="Transparency Seal" class="footer-seal">
                </div>

                <div>
                    <h5>Contact</h5>
                    <address>
                        Municipal Hall, Bontoc, Southern Leyte<br>
                        Phone: +63-956-648-3040<br>
                        Email: bontoclgu@gmail.com
                    </address>
                    <a class="footer-button" href="{{ route('about.directory') }}">Office Directory</a>
                </div>
            </div>

            <div class="site-footer__bottom">
                <p>&copy; {{ date('Y') }} Municipality Government of Bontoc. All rights reserved.</p>
                <p>Developed by Southern Leyte State University - Bontoc Campus.</p>
            </div>
        </div>
    </footer>

    <a href="#" class="btn btn-info back-to-top" aria-label="Back to top"><i class="fa fa-angle-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('resources/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('resources/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('resources/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('resources/mail/contact.js') }}"></script>
    <script src="{{ asset('resources/js/main.js') }}"></script>
</body>
</html>
