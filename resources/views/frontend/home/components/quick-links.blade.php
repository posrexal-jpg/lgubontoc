{{-- Quick Links / Services Highlights Component --}}

<style>
    .quick-links-section {
        background: #f8f9fa;
        padding: 35px 0;
        border-top: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
    }
    .quick-links-section .section-heading {
        text-align: center;
        margin-bottom: 25px;
    }
    .quick-links-section .section-heading h4 {
        font-family: Helvetica;
        color: #155724;
        font-weight: bold;
        margin-bottom: 5px;
    }
    .quick-links-section .section-heading p {
        color: #6c757d;
        font-size: 0.9rem;
    }
    .quick-link-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        padding: 25px 15px;
        text-align: center;
        text-decoration: none;
        display: block;
        color: #212529;
        transition: all 0.25s;
        margin-bottom: 20px;
        border-bottom: 4px solid transparent;
    }
    .quick-link-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        border-bottom-color: #28a745;
        color: #155724;
        text-decoration: none;
    }
    .quick-link-card .icon-circle {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        background: #e8f5e9;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        font-size: 1.6rem;
        color: #28a745;
        transition: background 0.25s;
    }
    .quick-link-card:hover .icon-circle {
        background: #28a745;
        color: white;
    }
    .quick-link-card h6 {
        font-family: Helvetica;
        font-weight: bold;
        font-size: 0.88rem;
        margin-bottom: 5px;
    }
    .quick-link-card p {
        font-size: 0.78rem;
        color: #6c757d;
        margin: 0;
        line-height: 1.4;
    }
</style>

<div class="quick-links-section">
    <div class="container">
        <div class="section-heading">
            <h4><i class="fa fa-th mr-2"></i>Quick Links</h4>
            <p>Access municipal services and information quickly</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('government.officials') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-user-tie"></i></div>
                    <h6>Officials</h6>
                    <p>Elected &amp; appointed officials</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('barangays.index') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-map-marker-alt"></i></div>
                    <h6>Barangays</h6>
                    <p>List of all barangays</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('announcements.index') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-bullhorn"></i></div>
                    <h6>Announcements</h6>
                    <p>Advisories &amp; notices</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('services.citizenscharter') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-file-alt"></i></div>
                    <h6>Citizen's Charter</h6>
                    <p>Public service guide</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('transparency.budget') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-money-bill-wave"></i></div>
                    <h6>Budget</h6>
                    <p>Financial transparency</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('others.downloadableforms') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-download"></i></div>
                    <h6>Forms</h6>
                    <p>Downloadable forms</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('tourism.bontocattractions') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-mountain"></i></div>
                    <h6>Tourism</h6>
                    <p>Attractions &amp; destinations</p>
                </a>
            </div>
            <div class="col-6 col-md-3 col-lg-2">
                <a href="{{ route('contact.index') }}" class="quick-link-card">
                    <div class="icon-circle"><i class="fa fa-envelope"></i></div>
                    <h6>Contact Us</h6>
                    <p>Get in touch with us</p>
                </a>
            </div>
        </div>
    </div>
</div>
