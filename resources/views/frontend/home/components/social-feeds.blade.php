{{-- Social Media Feeds Component --}}

<div class="social-feeds-section">
    <div class="section-header mb-4">
        <h5>{{ $title ?? 'Follow Us' }}</h5>
    </div>

    <div class="social-feed-grid">
        @if(($showFacebook ?? true) && ($facebookUrl ?? false))
            <div class="social-feed-item">
                <iframe src="{{ $facebookUrl }}"
                        width="100%" height="500"
                        style="border:none;overflow:hidden"
                        scrolling="no"
                        frameborder="0"
                        allowfullscreen="true"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
                </iframe>
            </div>
        @endif

        <div class="social-feed-item">
            <div class="text-center py-5 px-3" style="background: #f8f9fa; height: 500px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <i class="fa fa-facebook fa-3x mb-3" style="color: #1877F2;"></i>
                <h5>Follow on Facebook</h5>
                <p class="text-muted">Stay updated with our latest news</p>
                <a href="https://facebook.com" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-facebook"></i> Follow Us
                </a>
            </div>
        </div>

        <div class="social-feed-item">
            <div class="text-center py-5 px-3" style="background: #f8f9fa; height: 500px; display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <i class="fa fa-instagram fa-3x mb-3" style="color: #E4405F;"></i>
                <h5>Follow on Instagram</h5>
                <p class="text-muted">See our visual updates</p>
                <a href="https://instagram.com" target="_blank" class="btn btn-sm" style="background: #E4405F; color: white; border: none;">
                    <i class="fa fa-instagram"></i> Follow Us
                </a>
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <p class="text-muted">
            <small>Follow us on social media for the latest updates, announcements, and community news from Bontoc, Southern Leyte</small>
        </p>
    </div>
</div>
