{{-- Municipality Stats Bar --}}
<style>
    .stats-section {
        background: linear-gradient(135deg, var(--ph-navy2) 0%, var(--ph-navy) 100%);
        padding: 40px 0;
        position: relative;
        overflow: hidden;
    }
    .stats-section::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .stat-card {
        text-align: center; padding: 20px 10px;
        position: relative;
    }
    .stat-card::after {
        content: '';
        position: absolute; right: 0; top: 20%; bottom: 20%;
        width: 1px; background: rgba(255,255,255,0.12);
    }
    .stat-card:last-child::after { display: none; }
    .stat-card .stat-num {
        font-family: 'Lato', sans-serif;
        font-size: 2.4rem; font-weight: 900;
        color: var(--ph-gold); line-height: 1;
        margin-bottom: 6px;
    }
    .stat-card .stat-label {
        font-size: 0.78rem; color: rgba(255,255,255,0.7);
        text-transform: uppercase; letter-spacing: 1px; font-weight: 600;
    }
    .stat-card .stat-icon {
        width: 50px; height: 50px; border-radius: 50%;
        background: rgba(240,165,0,0.15);
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 12px;
        font-size: 1.3rem; color: var(--ph-gold);
    }

    /* Services Section */
    .services-section { padding: 50px 0; background: var(--ph-light); }
    .services-section .section-heading {
        text-align: center; margin-bottom: 35px;
    }
    .services-section .section-heading .sub { color: var(--ph-gold); font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; }
    .services-section .section-heading h3 {
        font-family: 'Lato', sans-serif; font-size: 1.7rem; font-weight: 900;
        color: var(--ph-navy); margin: 4px 0 10px;
    }
    .services-section .section-heading p { color: #6c757d; font-size: 0.9rem; max-width: 520px; margin: 0 auto; }
    .service-card {
        background: #fff; border-radius: 10px;
        padding: 28px 20px; text-align: center;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        border: 1px solid #e9ecef;
        transition: all .25s; margin-bottom: 20px;
        display: block; color: #333; text-decoration: none;
        border-bottom: 4px solid transparent;
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.12);
        border-bottom-color: var(--ph-gold);
        text-decoration: none; color: #333;
    }
    .service-card .svc-icon {
        width: 60px; height: 60px; border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 14px; font-size: 1.4rem;
        background: #eef2ff; color: var(--ph-navy);
        transition: background .25s, color .25s;
    }
    .service-card:hover .svc-icon { background: var(--ph-navy); color: var(--ph-gold); }
    .service-card h6 {
        font-family: 'Lato', sans-serif; font-weight: 700;
        font-size: 0.92rem; color: var(--ph-navy); margin-bottom: 6px;
    }
    .service-card p { font-size: 0.78rem; color: #6c757d; margin: 0; line-height: 1.5; }

    /* Transparency Section */
    .transparency-section {
        background: var(--ph-navy);
        padding: 50px 0;
        position: relative;
    }
    .transparency-section .section-heading .sub { color: var(--ph-gold); font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; }
    .transparency-section .section-heading h3 {
        font-family: 'Lato', sans-serif; font-size: 1.7rem; font-weight: 900;
        color: #fff; margin: 4px 0 10px;
    }
    .transparency-section .section-heading p { color: rgba(255,255,255,0.65); font-size: 0.9rem; }
    .ts-seal-card {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: 10px; padding: 24px 20px;
        text-align: center; color: rgba(255,255,255,0.85);
        text-decoration: none; display: block;
        transition: all .25s; margin-bottom: 18px;
    }
    .ts-seal-card:hover { background: rgba(240,165,0,0.15); border-color: var(--ph-gold); color: #fff; text-decoration: none; }
    .ts-seal-card img { height: 70px; width: auto; margin-bottom: 10px; filter: brightness(1.1); }
    .ts-seal-card h6 { font-size: 0.88rem; font-weight: 700; color: #fff; margin: 0 0 4px; }
    .ts-seal-card p { font-size: 0.76rem; color: rgba(255,255,255,0.6); margin: 0; }
    .ts-link {
        display: flex; align-items: center;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 6px; padding: 12px 16px;
        color: rgba(255,255,255,0.8); text-decoration: none;
        margin-bottom: 10px; font-size: 0.85rem; font-weight: 600;
        transition: all .2s; gap: 12px;
    }
    .ts-link i { color: var(--ph-gold); width: 18px; text-align: center; }
    .ts-link:hover { background: rgba(240,165,0,0.2); border-color: var(--ph-gold); color: #fff; text-decoration: none; }
    .ts-link .ts-arrow { margin-left: auto; color: rgba(255,255,255,0.4); }
    .ts-link:hover .ts-arrow { color: var(--ph-gold); }
</style>

{{-- Stats Bar --}}
<div class="stats-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="row">
            <div class="col-6 col-md-3 stat-card">
                <div class="stat-icon"><i class="fa fa-map"></i></div>
                <div class="stat-num">23</div>
                <div class="stat-label">Barangays</div>
            </div>
            <div class="col-6 col-md-3 stat-card">
                <div class="stat-icon"><i class="fa fa-users"></i></div>
                <div class="stat-num">~25K</div>
                <div class="stat-label">Population</div>
            </div>
            <div class="col-6 col-md-3 stat-card">
                <div class="stat-icon"><i class="fa fa-ruler-combined"></i></div>
                <div class="stat-num">~170</div>
                <div class="stat-label">Total Area (km²)</div>
            </div>
            <div class="col-6 col-md-3 stat-card">
                <div class="stat-icon"><i class="fa fa-building"></i></div>
                <div class="stat-num">11</div>
                <div class="stat-label">Gov't Offices</div>
            </div>
        </div>
    </div>
</div>

{{-- Services Section --}}
<div class="services-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="section-heading">
            <div class="sub">What We Offer</div>
            <h3>Government Services</h3>
            <p>Access a wide range of municipal services conveniently and efficiently.</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="{{ route('services.citizenscharter') }}" class="service-card">
                    <div class="svc-icon"><i class="fa fa-file-alt"></i></div>
                    <h6>Citizen's Charter</h6>
                    <p>Public service guide &amp; standards</p>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="{{ route('services.mayorsoffice') }}" class="service-card">
                    <div class="svc-icon"><i class="fa fa-briefcase"></i></div>
                    <h6>Mayor's Office</h6>
                    <p>Office of the Municipal Mayor</p>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="https://bomwasa.bitsorg.info/billinquiry" target="_blank" class="service-card">
                    <div class="svc-icon"><i class="fa fa-tint"></i></div>
                    <h6>Water Bill</h6>
                    <p>BOMWASA water bill inquiry</p>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="{{ route('others.downloadableforms') }}" class="service-card">
                    <div class="svc-icon"><i class="fa fa-download"></i></div>
                    <h6>Forms</h6>
                    <p>Download official forms &amp; permits</p>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="https://brgyprofiling.bitsorg.info/login" target="_blank" class="service-card">
                    <div class="svc-icon"><i class="fa fa-id-card"></i></div>
                    <h6>Barangay Info</h6>
                    <p>Barangay inhabitant system</p>
                </a>
            </div>
            <div class="col-md-4 col-lg-2 col-sm-6">
                <a href="{{ route('careers.jobvacancies') }}" class="service-card">
                    <div class="svc-icon"><i class="fa fa-user-plus"></i></div>
                    <h6>Job Vacancies</h6>
                    <p>Career opportunities in LGU</p>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Transparency Section --}}
<div class="transparency-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="section-heading text-left">
                    <div class="sub">Open Government</div>
                    <h3>Transparency &amp; Accountability</h3>
                    <p>The Municipality of Bontoc is committed to full transparency and public accountability in all its operations.</p>
                </div>
                <div class="mt-3">
                    <a href="{{ route('transparency.budget') }}" class="ts-link">
                        <i class="fa fa-money-bill-wave"></i> Budget &amp; Financial Reports
                        <span class="ts-arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                    <a href="{{ route('transparency.municipalordinances') }}" class="ts-link">
                        <i class="fa fa-gavel"></i> Municipal Ordinances
                        <span class="ts-arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                    <a href="{{ route('transparency.resolutions') }}" class="ts-link">
                        <i class="fa fa-scroll"></i> Resolutions
                        <span class="ts-arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                    <a href="https://fdpp.dilg.gov.ph/" target="_blank" class="ts-link">
                        <i class="fa fa-external-link-alt"></i> Full Disclosure Portal (DILG)
                        <span class="ts-arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                    <a href="https://www.foi.gov.ph/" target="_blank" class="ts-link">
                        <i class="fa fa-info-circle"></i> Freedom of Information
                        <span class="ts-arrow"><i class="fa fa-angle-right"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <a href="https://fdpp.dilg.gov.ph/" target="_blank" class="ts-seal-card">
                            <img src="{{ asset('resources/img/transparencyseal.png') }}" alt="Transparency Seal">
                            <h6>Transparency Seal</h6>
                            <p>DILG certified</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="https://www.foi.gov.ph/" target="_blank" class="ts-seal-card">
                            <img src="{{ asset('resources/img/bontoclogonobg.png') }}" alt="Municipality Seal">
                            <h6>Bontoc Seal</h6>
                            <p>Official municipality seal</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="https://data.gov.ph/" target="_blank" class="ts-seal-card">
                            <div style="height:70px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa fa-database fa-3x" style="color:var(--ph-gold);"></i>
                            </div>
                            <h6>Open Data PH</h6>
                            <p>Public data portal</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-3">
                        <a href="https://www.gov.ph/" target="_blank" class="ts-seal-card">
                            <div style="height:70px;display:flex;align-items:center;justify-content:center;">
                                <i class="fa fa-globe fa-3x" style="color:var(--ph-gold);"></i>
                            </div>
                            <h6>GOV.PH</h6>
                            <p>Official Philippines portal</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
