{{-- Quick Links / E-Services Section --}}
<style>
    .quick-links-section {
        background: var(--ph-navy);
        padding: 28px 0;
    }
    .quick-links-section .section-label {
        color: rgba(255,255,255,0.55);
        font-size: 0.7rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        margin-bottom: 4px;
    }
    .quick-links-section .section-title {
        color: #fff;
        font-family: 'Lato', sans-serif;
        font-size: 1.15rem;
        font-weight: 900;
        margin-bottom: 20px;
    }
    .quick-links-section .section-title span { color: var(--ph-gold); }
    .ql-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 8px;
        padding: 16px 8px 12px;
        text-decoration: none;
        color: rgba(255,255,255,0.85);
        transition: all .22s;
        margin-bottom: 12px;
        min-height: 96px;
    }
    .ql-card:hover {
        background: var(--ph-gold);
        border-color: var(--ph-gold);
        color: #1a1a1a;
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0,0,0,0.35);
        text-decoration: none;
    }
    .ql-card .ql-icon {
        width: 42px; height: 42px;
        border-radius: 50%;
        background: rgba(255,255,255,0.1);
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; color: var(--ph-gold);
        margin-bottom: 8px;
        transition: background .22s, color .22s;
    }
    .ql-card:hover .ql-icon { background: rgba(0,0,0,0.15); color: #1a1a1a; }
    .ql-card .ql-label {
        font-size: 0.77rem; font-weight: 700; line-height: 1.3;
        text-transform: uppercase; letter-spacing: 0.3px;
    }
</style>

<div class="quick-links-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="row align-items-center">
            <div class="col-lg-2 d-none d-lg-block">
                <div class="section-label">Quick Access</div>
                <div class="section-title">E-Services &amp; <span>Links</span></div>
            </div>
            <div class="col-lg-10">
                <div class="row">
                    @php
                        $links = [
                            ['icon'=>'fa-user-tie',          'label'=>'Elected Officials',    'href'=>route('government.officials')],
                            ['icon'=>'fa-map-marker-alt',    'label'=>'Barangays',            'href'=>route('barangays.index')],
                            ['icon'=>'fa-bullhorn',          'label'=>'Announcements',        'href'=>route('announcements.index')],
                            ['icon'=>'fa-file-alt',          'label'=>"Citizen's Charter",    'href'=>route('services.citizenscharter')],
                            ['icon'=>'fa-money-bill-wave',   'label'=>'Budget & Finance',     'href'=>route('transparency.budget')],
                            ['icon'=>'fa-download',          'label'=>'Forms',                'href'=>route('others.downloadableforms')],
                            ['icon'=>'fa-mountain',          'label'=>'Tourism',              'href'=>route('tourism.bontocattractions')],
                            ['icon'=>'fa-images',            'label'=>'Gallery',              'href'=>route('others.gallery')],
                            ['icon'=>'fa-gavel',             'label'=>'Ordinances',           'href'=>route('transparency.municipalordinances')],
                            ['icon'=>'fa-envelope',          'label'=>'Contact Us',           'href'=>route('contact.index')],
                        ];
                    @endphp
                    @foreach($links as $link)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-auto flex-lg-fill">
                        <a href="{{ $link['href'] }}" class="ql-card">
                            <div class="ql-icon"><i class="fa {{ $link['icon'] }}"></i></div>
                            <div class="ql-label">{{ $link['label'] }}</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
