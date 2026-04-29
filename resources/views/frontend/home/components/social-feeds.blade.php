{{-- Social / Connect Section --}}
<style>
    .connect-section { background: var(--ph-light); padding: 50px 0; }
    .connect-section .section-heading { margin-bottom: 30px; }
    .connect-section .section-heading .sub { color: var(--ph-gold); font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1.5px; }
    .connect-section .section-heading h3 {
        font-family: 'Lato', sans-serif; font-size: 1.7rem; font-weight: 900;
        color: var(--ph-navy); margin: 4px 0 8px;
    }
    .connect-section .section-heading p { color: #6c757d; font-size: 0.9rem; }
    .social-platform-card {
        background: #fff; border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden; margin-bottom: 20px;
        border: 1px solid #e9ecef;
    }
    .social-platform-card .spc-header {
        padding: 12px 16px; display: flex; align-items: center; gap: 10px;
    }
    .social-platform-card .spc-header.fb { background: #1877F2; color: #fff; }
    .social-platform-card .spc-header.yt { background: #FF0000; color: #fff; }
    .social-platform-card .spc-header i { font-size: 1.2rem; }
    .social-platform-card .spc-header span { font-weight: 700; font-size: 0.9rem; }
    .social-platform-card .spc-body { padding: 14px; }
    .social-platform-card .spc-body p { font-size: 0.83rem; color: #6c757d; margin-bottom: 12px; }
    .social-platform-card iframe { border-radius: 6px; }
    .spc-follow-btn {
        display: flex; align-items: center; justify-content: center;
        width: 100%; padding: 9px; border-radius: 6px;
        font-size: 0.85rem; font-weight: 700; color: #fff;
        text-decoration: none; gap: 8px; margin-top: 10px;
        transition: opacity .2s;
    }
    .spc-follow-btn:hover { opacity: 0.9; color: #fff; text-decoration: none; }
    .spc-follow-btn.fb { background: #1877F2; }
    .spc-follow-btn.yt { background: #FF0000; }

    .cta-banner {
        background: linear-gradient(135deg, var(--ph-red) 0%, #8b0000 100%);
        border-radius: 10px; padding: 32px 30px;
        color: #fff; margin-bottom: 20px;
    }
    .cta-banner h4 {
        font-family: 'Lato', sans-serif; font-weight: 900;
        font-size: 1.3rem; margin-bottom: 8px;
    }
    .cta-banner p { font-size: 0.88rem; opacity: .85; margin-bottom: 16px; }
    .cta-banner .btn-cta {
        background: var(--ph-gold); color: #1a1a1a;
        border: none; padding: 9px 22px; border-radius: 4px;
        font-weight: 700; font-size: 0.85rem; display: inline-block;
        transition: background .2s;
    }
    .cta-banner .btn-cta:hover { background: #fff; color: var(--ph-navy); text-decoration: none; }

    .info-card {
        background: #fff; border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        padding: 20px; margin-bottom: 18px;
        border-left: 4px solid var(--ph-navy);
    }
    .info-card h6 { font-weight: 700; color: var(--ph-navy); margin-bottom: 10px; font-size: 0.88rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .info-row { display: flex; gap: 10px; align-items: flex-start; margin-bottom: 8px; }
    .info-row i { color: var(--ph-gold); width: 16px; flex-shrink: 0; margin-top: 2px; }
    .info-row span { font-size: 0.82rem; color: #6c757d; }
</style>

<div class="connect-section">
    <div class="container-fluid px-3 px-md-4">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="section-heading">
                    <div class="sub">Stay Connected</div>
                    <h3>{{ $title ?? 'Connect With Us' }}</h3>
                    <p>Follow us on social media for the latest news, events, and announcements from Bontoc, Southern Leyte.</p>
                </div>

                <div class="cta-banner">
                    <h4><i class="fa fa-envelope mr-2"></i>Have a Concern?</h4>
                    <p>Send us your feedback, inquiries, or suggestions. We're here to serve you.</p>
                    <a href="{{ route('contact.index') }}" class="btn-cta">Contact Us Now</a>
                </div>

                <div class="info-card">
                    <h6><i class="fa fa-clock mr-2" style="color:var(--ph-gold);"></i>Office Hours</h6>
                    <div class="info-row"><i class="far fa-calendar-check"></i><span><strong>Monday – Friday</strong>: 8:00 AM – 5:00 PM</span></div>
                    <div class="info-row"><i class="fa fa-phone"></i><span>+63-9566483040</span></div>
                    <div class="info-row"><i class="fa fa-envelope"></i><span>bontoclgu@gmail.com</span></div>
                    <div class="info-row"><i class="fa fa-map-marker-alt"></i><span>Municipal Hall, Bontoc, Southern Leyte 6538</span></div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="social-platform-card">
                    <div class="spc-header fb">
                        <i class="fab fa-facebook-f"></i>
                        <span>Bontoc PIO – Facebook</span>
                    </div>
                    <div class="spc-body">
                        <p>Watch our latest video updates and announcements on Facebook.</p>
                        @if(($showFacebook ?? true) && ($facebookUrl ?? false))
                            <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:6px;">
                                <iframe src="{{ $facebookUrl }}"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;border:none;"
                                        scrolling="no" frameborder="0" allowfullscreen="true"
                                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                        loading="lazy"></iframe>
                            </div>
                        @endif
                        <a href="https://www.facebook.com/BontocPIO" target="_blank" class="spc-follow-btn fb">
                            <i class="fab fa-facebook-f"></i> Follow Bontoc PIO
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="social-platform-card mb-3">
                    <div class="spc-header yt">
                        <i class="fab fa-youtube"></i>
                        <span>YouTube Channel</span>
                    </div>
                    <div class="spc-body">
                        <p>Subscribe to our YouTube channel for video reports, ceremonies, and public events.</p>
                        <div style="background:#f8f9fa;border-radius:6px;height:160px;display:flex;align-items:center;justify-content:center;flex-direction:column;">
                            <i class="fab fa-youtube fa-3x mb-2" style="color:#FF0000;"></i>
                            <span style="font-size:0.8rem;color:#6c757d;">Bontoc LGU YouTube</span>
                        </div>
                        <a href="https://www.youtube.com" target="_blank" class="spc-follow-btn yt">
                            <i class="fab fa-youtube"></i> Subscribe on YouTube
                        </a>
                    </div>
                </div>

                <div class="social-platform-card">
                    <div class="spc-header" style="background:#E4405F;color:#fff;">
                        <i class="fab fa-instagram"></i>
                        <span>Instagram</span>
                    </div>
                    <div class="spc-body" style="display:flex;flex-direction:column;align-items:center;">
                        <p class="w-100">Follow us on Instagram for photos and updates.</p>
                        <a href="https://www.instagram.com" target="_blank" class="spc-follow-btn w-100" style="background:#E4405F;">
                            <i class="fab fa-instagram"></i> Follow on Instagram
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
