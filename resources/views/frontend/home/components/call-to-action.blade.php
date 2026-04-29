{{-- GOV-style Quick Links / Services Tile Section --}}

<div class="cta-section py-4" id="services">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h4 style="font-weight:700;">Quick Links</h4>
                <p class="text-muted">Common services and resources — access the most requested services quickly.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ route('services.mayorsoffice') }}" class="d-block text-center p-3" style="background:#f1f5f9;border-radius:8px;color:#003366;text-decoration:none;">
                    <div style="font-size:28px; margin-bottom:8px;"><i class="fa fa-file-alt"></i></div>
                    <div style="font-weight:700;">Apply for Documents</div>
                    <div class="text-muted" style="font-size:0.9rem;">Birth, Marriage, Barangay permits</div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ route('transparency.fdp-reports') }}" class="d-block text-center p-3" style="background:#f1f5f9;border-radius:8px;color:#003366;text-decoration:none;">
                    <div style="font-size:28px; margin-bottom:8px;"><i class="fa fa-gavel"></i></div>
                    <div style="font-weight:700;">Transparency & Documents</div>
                    <div class="text-muted" style="font-size:0.9rem;">FDP Reports and public records</div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ route('newsandupdates.news') }}" class="d-block text-center p-3" style="background:#f1f5f9;border-radius:8px;color:#003366;text-decoration:none;">
                    <div style="font-size:28px; margin-bottom:8px;"><i class="fa fa-newspaper"></i></div>
                    <div style="font-weight:700;">News & Announcements</div>
                    <div class="text-muted" style="font-size:0.9rem;">Latest updates from the LGU</div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <a href="{{ route('about.directory') }}" class="d-block text-center p-3" style="background:#f1f5f9;border-radius:8px;color:#003366;text-decoration:none;">
                    <div style="font-size:28px; margin-bottom:8px;"><i class="fa fa-phone"></i></div>
                    <div style="font-weight:700;">Contact Directory</div>
                    <div class="text-muted" style="font-size:0.9rem;">Offices and telephone numbers</div>
                </a>
            </div>
        </div>

    </div>
</div>
