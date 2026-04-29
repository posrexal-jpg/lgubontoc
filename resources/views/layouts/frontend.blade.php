<!DOCTYPE html>
<html lang="en">
<head>
    <title>Municipality of Bontoc | Official Website</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="Official Website of the Municipality of Bontoc, Southern Leyte, Philippines.">

    <link rel="icon" href="{{ asset('resources/bontoclogonobg.png')}}" sizes="32x32" />

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Lato:wght@400;700;900&display=swap" rel="stylesheet">

    {{-- Font Awesome 5 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    {{-- Bootstrap 4 --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    {{-- Owl Carousel --}}
    <link href="{{ asset('resources/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    {{-- Site CSS --}}
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/css/homepage.css') }}" rel="stylesheet">

    <style>
        :root {
            --ph-navy:   #1a3563;
            --ph-navy2:  #122548;
            --ph-red:    #c0272d;
            --ph-gold:   #f0a500;
            --ph-gold2:  #e09200;
            --ph-light:  #f5f7fa;
            --ph-white:  #ffffff;
            --ph-border: #dee2e6;
        }

        * { box-sizing: border-box; }
        body { font-family: 'Open Sans', sans-serif; color: #333; background: #f5f7fa; }
        a { text-decoration: none; }
        a:hover { text-decoration: none; }

        /* ── TOP UTILITY BAR ─────────────────────────── */
        .top-utility-bar {
            background: var(--ph-navy2);
            color: #b0bec5;
            font-size: 0.78rem;
            padding: 5px 0;
            border-bottom: 2px solid var(--ph-red);
        }
        .top-utility-bar a { color: #b0bec5; }
        .top-utility-bar a:hover { color: #fff; }
        .top-utility-bar .gov-text { font-weight: 600; color: #cfd8dc; letter-spacing: 0.4px; }
        .top-utility-bar .time-widget { color: #cfd8dc; }
        .top-social a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 26px; height: 26px; border-radius: 50%;
            background: rgba(255,255,255,0.1); color: #b0bec5;
            margin-left: 4px; font-size: 0.75rem; transition: background .2s;
        }
        .top-social a:hover { background: var(--ph-red); color: #fff; }
        .top-utility-bar .divider { color: rgba(255,255,255,0.2); margin: 0 8px; }

        /* ── OFFICIAL HEADER ──────────────────────────── */
        .official-header {
            background: #fff;
            padding: 14px 0;
            border-bottom: 3px solid var(--ph-gold);
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .header-logo { height: 70px; width: auto; }
        .header-title { line-height: 1.2; }
        .header-title .republic-label {
            font-size: 0.72rem; color: #6c757d; text-transform: uppercase;
            letter-spacing: 1px; font-weight: 600;
        }
        .header-title h1 {
            font-family: 'Lato', sans-serif; font-size: 1.45rem; font-weight: 900;
            color: var(--ph-navy); margin: 2px 0 1px; line-height: 1.1;
        }
        .header-title h2 {
            font-size: 0.88rem; color: var(--ph-red); font-weight: 600;
            margin: 0; letter-spacing: 0.3px;
        }
        .header-title .address {
            font-size: 0.75rem; color: #6c757d; margin-top: 3px;
        }
        .header-seals { display: flex; align-items: center; gap: 12px; }
        .header-seals img { height: 60px; width: auto; }
        .header-time-box {
            background: var(--ph-navy); color: #fff;
            border-radius: 8px; padding: 8px 14px; text-align: center;
            font-size: 0.75rem;
        }
        .header-time-box .time-label { color: #90caf9; font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.5px; }
        .header-time-box iframe { display: block; width: 100%; }

        /* ── BAGONG PILIPINAS STRIP ───────────────────── */
        .bagong-strip {
            background: linear-gradient(90deg, #c0272d 0%, #1a3563 50%, #c0272d 100%);
            padding: 4px 0;
            text-align: center;
            font-size: 0.72rem;
            color: rgba(255,255,255,0.9);
            letter-spacing: 1px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .bagong-strip span { margin: 0 6px; }
        .bagong-strip .star { color: #f0a500; }

        /* ── MAIN NAVIGATION ─────────────────────────── */
        .main-navbar {
            background: var(--ph-navy);
            padding: 0;
            position: sticky; top: 0; z-index: 1030;
            box-shadow: 0 3px 10px rgba(0,0,0,0.25);
        }
        .main-navbar .navbar-toggler { border-color: rgba(255,255,255,0.3); padding: 6px 10px; }
        .main-navbar .navbar-toggler-icon { background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e"); }
        .main-navbar .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-size: 0.85rem; font-weight: 600; letter-spacing: 0.3px;
            padding: 14px 14px !important;
            transition: background .2s, color .2s;
            white-space: nowrap;
        }
        .main-navbar .nav-link:hover,
        .main-navbar .nav-item.active > .nav-link { background: rgba(255,255,255,0.12); color: #fff !important; }
        .main-navbar .dropdown-menu {
            background: #fff; border: none; border-top: 3px solid var(--ph-gold);
            border-radius: 0 0 6px 6px; box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            min-width: 210px; padding: 6px 0; margin-top: 0;
        }
        .main-navbar .dropdown-item {
            font-size: 0.83rem; color: #333; padding: 8px 18px;
            font-weight: 500; transition: background .15s, color .15s;
        }
        .main-navbar .dropdown-item:hover { background: #eef2ff; color: var(--ph-navy); }
        .main-navbar .dropdown-divider { margin: 4px 0; border-color: #f0f0f0; }
        .main-navbar .nav-item .nav-link i { margin-right: 4px; font-size: 0.8rem; }

        /* search box in nav */
        .nav-search { position: relative; }
        .nav-search input {
            background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.25);
            color: #fff; border-radius: 20px; padding: 5px 14px; font-size: 0.8rem;
            width: 150px; outline: none; transition: width .3s;
        }
        .nav-search input::placeholder { color: rgba(255,255,255,0.6); }
        .nav-search input:focus { width: 200px; background: rgba(255,255,255,0.2); }
        .nav-search button { background: none; border: none; color: rgba(255,255,255,0.7); position: absolute; right: 8px; top: 50%; transform: translateY(-50%); }

        /* ── CONTENT ─────────────────────────────────── */
        .page-content { background: var(--ph-light); min-height: 60vh; }

        /* ── FOOTER ──────────────────────────────────── */
        .site-footer {
            background: var(--ph-navy2);
            color: #b0bec5;
            font-size: 0.84rem;
        }
        .site-footer .footer-top { padding: 45px 0 30px; }
        .site-footer h6 {
            color: #fff; font-weight: 700; font-size: 0.88rem;
            text-transform: uppercase; letter-spacing: 0.8px;
            border-bottom: 2px solid var(--ph-gold); padding-bottom: 8px;
            margin-bottom: 14px;
        }
        .site-footer a { color: #90a4ae; }
        .site-footer a:hover { color: var(--ph-gold); }
        .site-footer ul { list-style: none; padding: 0; margin: 0; }
        .site-footer ul li { padding: 4px 0; }
        .site-footer ul li a::before { content: '› '; color: var(--ph-gold); }
        .site-footer .footer-contact-item { display: flex; gap: 10px; margin-bottom: 10px; }
        .site-footer .footer-contact-item .fc-icon {
            width: 32px; height: 32px; background: rgba(255,255,255,0.08);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            color: var(--ph-gold); flex-shrink: 0; font-size: 0.85rem;
        }
        .site-footer .footer-contact-item .fc-text { font-size: 0.81rem; color: #90a4ae; }
        .site-footer .footer-contact-item .fc-text strong { display: block; color: #cfd8dc; font-size: 0.83rem; }
        .site-footer .footer-seals { display: flex; gap: 14px; align-items: center; flex-wrap: wrap; margin-top: 10px; }
        .site-footer .footer-seals img { height: 70px; width: auto; filter: brightness(0.9); }
        .footer-social a {
            display: inline-flex; align-items: center; justify-content: center;
            width: 34px; height: 34px; border-radius: 50%;
            background: rgba(255,255,255,0.08); color: #90a4ae;
            margin-right: 6px; font-size: 0.9rem; transition: background .2s;
        }
        .footer-social a:hover { background: var(--ph-gold); color: #fff; }
        .site-footer .footer-bottom {
            background: rgba(0,0,0,0.25); padding: 14px 0;
            border-top: 1px solid rgba(255,255,255,0.06);
            text-align: center; font-size: 0.78rem; color: #78909c;
        }
        .site-footer .footer-bottom a { color: #90a4ae; }
        .site-footer .footer-bottom a:hover { color: var(--ph-gold); }

        /* ── BACK TO TOP ──────────────────────────────── */
        .back-to-top {
            position: fixed; bottom: 24px; right: 24px; z-index: 9999;
            width: 42px; height: 42px; border-radius: 50%;
            background: var(--ph-navy); color: #fff;
            display: none; align-items: center; justify-content: center;
            box-shadow: 0 4px 14px rgba(0,0,0,0.3); font-size: 1rem;
            transition: background .2s;
        }
        .back-to-top:hover { background: var(--ph-gold); color: #fff; }
        .back-to-top.show { display: flex; }
    </style>

    @stack('styles')
</head>
<body>

{{-- ── TOP UTILITY BAR ──────────────────────────── --}}
<div class="top-utility-bar">
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center flex-wrap">
                {{-- Philippine Seal SVG (inline, minimal) --}}
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 100 100" class="mr-2" style="flex-shrink:0;">
                    <circle cx="50" cy="50" r="48" fill="none" stroke="#f0a500" stroke-width="2"/>
                    <circle cx="50" cy="50" r="36" fill="none" stroke="#f0a500" stroke-width="1"/>
                    <text x="50" y="54" text-anchor="middle" fill="#f0a500" font-size="10" font-weight="bold">PH</text>
                </svg>
                <span class="gov-text mr-1">Republic of the Philippines</span>
                <span class="divider">|</span>
                <span>Local Government Unit of Bontoc, Southern Leyte</span>
                <span class="divider">|</span>
                <a href="https://www.gov.ph" target="_blank">GOV.PH</a>
            </div>
            <div class="d-flex align-items-center mt-1 mt-md-0">
                <span class="time-widget mr-2">
                    <i class="far fa-clock mr-1"></i>
                    <span id="ph-time">--:--:-- --</span>
                </span>
                <span class="divider d-none d-md-inline">|</span>
                <div class="top-social ml-2">
                    <a href="https://www.facebook.com/BontocPIO" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ── OFFICIAL HEADER ───────────────────────────── --}}
<header class="official-header">
    <div class="container-fluid px-3 px-md-4">
        <div class="d-flex align-items-center">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="mr-3 flex-shrink-0">
                <img src="{{ asset('resources/img/websitelogo.png') }}" alt="Bontoc LGU Logo" class="header-logo">
            </a>
            {{-- Title --}}
            <div class="header-title flex-grow-1">
                <div class="republic-label">Official Website</div>
                <h1>Municipality of Bontoc</h1>
                <h2>Southern Leyte, Philippines</h2>
                <div class="address"><i class="fa fa-map-marker-alt mr-1" style="color:var(--ph-red);"></i>Municipal Hall, Bontoc, Southern Leyte 6538</div>
            </div>
            {{-- Seals + Time --}}
            <div class="d-none d-lg-flex align-items-center ml-auto" style="gap:16px;">
                <div class="header-time-box">
                    <div class="time-label">Philippine Standard Time</div>
                    <iframe src="https://oras.pagasa.dost.gov.ph/time_display/time/" allowtransparency="true" scrolling="no" frameborder="0" height="24px" width="130px"></iframe>
                </div>
                <div class="header-seals">
                    <a href="https://fdpp.dilg.gov.ph/" target="_blank" title="Full Disclosure Portal">
                        <img src="{{ asset('resources/img/transparencyseal.png') }}" alt="Transparency Seal">
                    </a>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="Bontoc Seal">
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- ── BAGONG PILIPINAS STRIP ────────────────────── --}}
<div class="bagong-strip">
    <span class="star">★</span>
    <span>Bagong Pilipinas</span>
    <span class="star">★</span>
    <span style="margin:0 16px;opacity:.4;">|</span>
    <span>Masaganang Buhay para sa Lahat</span>
    <span class="star" style="margin-left:16px;">★</span>
</div>

{{-- ── NAVIGATION ────────────────────────────────── --}}
@include('layouts._mainnav')

{{-- ── PAGE CONTENT ──────────────────────────────── --}}
<main class="page-content">
    @yield('content')
</main>

{{-- ── FOOTER ───────────────────────────────────── --}}
<footer class="site-footer">
    <div class="footer-top">
        <div class="container-fluid px-3 px-md-4">
            <div class="row">

                {{-- Column 1: About --}}
                <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="Bontoc" height="55" class="mr-3">
                        <div>
                            <div style="color:#fff;font-weight:700;font-size:0.95rem;line-height:1.2;">Municipality of</div>
                            <div style="color:var(--ph-gold);font-weight:900;font-size:1.1rem;line-height:1.2;">BONTOC</div>
                            <div style="font-size:0.72rem;color:#78909c;">Southern Leyte, Philippines</div>
                        </div>
                    </div>
                    <p style="font-size:0.8rem;line-height:1.6;color:#90a4ae;">A progressive municipality with empowered citizens living in a peaceful, healthy, and sustainable community under a transparent and responsive local government.</p>
                    <div class="footer-seals">
                        <a href="https://fdpp.dilg.gov.ph/" target="_blank">
                            <img src="{{ asset('resources/img/transparencyseal.png') }}" alt="Transparency Seal">
                        </a>
                        <a href="https://www.foi.gov.ph/" target="_blank">
                            <img src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="Bontoc Seal">
                        </a>
                    </div>
                </div>

                {{-- Column 2: Quick Links --}}
                <div class="col-sm-6 col-md-6 col-lg-2 mb-4">
                    <h6>Quick Links</h6>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about.history') }}">About Bontoc</a></li>
                        <li><a href="{{ route('government.officials') }}">Elected Officials</a></li>
                        <li><a href="{{ route('barangays.index') }}">Barangays</a></li>
                        <li><a href="{{ route('announcements.index') }}">Announcements</a></li>
                        <li><a href="{{ route('newsandupdates.news') }}">News &amp; Updates</a></li>
                        <li><a href="{{ route('tourism.bontocattractions') }}">Tourism</a></li>
                        <li><a href="{{ route('others.gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                    </ul>
                </div>

                {{-- Column 3: Gov Links --}}
                <div class="col-sm-6 col-md-6 col-lg-3 mb-4">
                    <h6>Government Links</h6>
                    <ul>
                        <li><a href="https://www.gov.ph/" target="_blank">GOV.PH</a></li>
                        <li><a href="https://www.officialgazette.gov.ph/" target="_blank">Official Gazette</a></li>
                        <li><a href="https://op-proper.gov.ph/" target="_blank">Office of the President</a></li>
                        <li><a href="https://dilg.gov.ph/" target="_blank">DILG</a></li>
                        <li><a href="https://www.foi.gov.ph/" target="_blank">Freedom of Information</a></li>
                        <li><a href="https://fdpp.dilg.gov.ph/" target="_blank">Full Disclosure Portal</a></li>
                        <li><a href="https://data.gov.ph/" target="_blank">Open Data Philippines</a></li>
                        <li><a href="https://dict.gov.ph/" target="_blank">DICT</a></li>
                        <li><a href="https://pia.gov.ph/" target="_blank">Philippine Information Agency</a></li>
                    </ul>
                </div>

                {{-- Column 4: Contact --}}
                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                    <h6>Contact Information</h6>
                    <div class="footer-contact-item">
                        <div class="fc-icon"><i class="fa fa-map-marker-alt"></i></div>
                        <div class="fc-text"><strong>Address</strong>Municipal Hall, Bontoc, Southern Leyte 6538</div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fc-icon"><i class="fa fa-phone"></i></div>
                        <div class="fc-text"><strong>Phone</strong>+63-9566483040</div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fc-icon"><i class="fa fa-envelope"></i></div>
                        <div class="fc-text"><strong>Email</strong>bontoclgu@gmail.com</div>
                    </div>
                    <div class="footer-contact-item">
                        <div class="fc-icon"><i class="fa fa-clock"></i></div>
                        <div class="fc-text"><strong>Office Hours</strong>Mon–Fri: 8:00 AM – 5:00 PM</div>
                    </div>
                    <div class="mt-3">
                        <div style="color:#cfd8dc;font-size:0.8rem;font-weight:600;margin-bottom:8px;">Follow Us</div>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/BontocPIO" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.youtube.com" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.instagram.com" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com" target="_blank" title="Twitter/X"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container-fluid px-3 px-md-4">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-left mb-1 mb-md-0">
                    &copy; {{ date('Y') }} Official Website of the Municipality of Bontoc, Southern Leyte. All Rights Reserved.
                </div>
                <div class="col-md-6 text-md-right">
                    Developed by <a href="https://www.facebook.com/guillermogaviola.s" target="_blank">BITS – Southern Leyte State University, Bontoc Campus</a>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Back to Top --}}
<a href="#" class="back-to-top" id="backToTop" title="Back to top"><i class="fa fa-chevron-up"></i></a>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('resources/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('resources/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('resources/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('resources/mail/contact.js') }}"></script>
<script src="{{ asset('resources/js/main.js') }}"></script>

<script>
// Philippine Standard Time clock
function updatePHTime() {
    var now = new Date();
    var ph  = new Date(now.toLocaleString('en-US', { timeZone: 'Asia/Manila' }));
    var h   = ph.getHours();
    var m   = ph.getMinutes().toString().padStart(2,'0');
    var s   = ph.getSeconds().toString().padStart(2,'0');
    var ap  = h >= 12 ? 'PM' : 'AM';
    h = h % 12 || 12;
    var el = document.getElementById('ph-time');
    if (el) el.textContent = h + ':' + m + ':' + s + ' ' + ap;
}
updatePHTime();
setInterval(updatePHTime, 1000);

// Back to top
$(window).scroll(function() {
    if ($(this).scrollTop() > 200) {
        $('#backToTop').addClass('show');
    } else {
        $('#backToTop').removeClass('show');
    }
});
$('#backToTop').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 600, 'easeInOutExpo');
});
</script>

@stack('scripts')
</body>
</html>
