{{-- Featured News / Latest Updates --}}
<style>
    .featured-section .fs-header {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 18px; padding-bottom: 10px;
        border-bottom: 3px solid var(--ph-navy);
    }
    .featured-section .fs-header h5 {
        font-family: 'Lato', sans-serif;
        font-size: 1.1rem; font-weight: 900;
        color: var(--ph-navy); margin: 0;
        text-transform: uppercase; letter-spacing: 0.5px;
    }
    .featured-section .fs-header h5::before {
        content: '';
        display: inline-block;
        width: 4px; height: 18px;
        background: var(--ph-gold);
        margin-right: 10px;
        vertical-align: middle;
        border-radius: 2px;
    }
    .featured-section .fs-header a {
        font-size: 0.8rem; color: var(--ph-navy); font-weight: 600;
        border: 1px solid var(--ph-navy); padding: 4px 12px; border-radius: 3px;
        transition: background .2s;
    }
    .featured-section .fs-header a:hover { background: var(--ph-navy); color: #fff; }

    .news-card {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        margin-bottom: 20px;
        transition: transform .2s, box-shadow .2s;
        border: 1px solid #e9ecef;
    }
    .news-card:hover { transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.12); }
    .news-card-img {
        position: relative; overflow: hidden;
        height: 190px;
    }
    .news-card-img img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .35s;
    }
    .news-card:hover .news-card-img img { transform: scale(1.05); }
    .news-card-img .news-cat {
        position: absolute; top: 10px; left: 10px;
        background: var(--ph-navy);
        color: #fff; font-size: 0.68rem;
        font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px;
        padding: 3px 10px; border-radius: 2px;
    }
    .news-card-body { padding: 16px; }
    .news-card-meta {
        font-size: 0.75rem; color: #6c757d; margin-bottom: 7px;
        display: flex; align-items: center; gap: 10px;
    }
    .news-card-meta i { color: var(--ph-gold); }
    .news-card-body h6 {
        font-family: 'Lato', sans-serif;
        font-size: 0.95rem; font-weight: 700;
        color: #1a1a1a; line-height: 1.4;
        margin-bottom: 8px;
    }
    .news-card-body h6 a { color: inherit; }
    .news-card-body h6 a:hover { color: var(--ph-navy); }
    .news-card-body p { font-size: 0.82rem; color: #6c757d; line-height: 1.6; margin: 0; }
    .news-card-footer {
        padding: 10px 16px; border-top: 1px solid #f0f0f0;
        display: flex; justify-content: flex-end;
    }
    .news-card-footer a {
        font-size: 0.78rem; color: var(--ph-navy); font-weight: 600;
    }
    .news-card-footer a:hover { color: var(--ph-gold); }
</style>

<div class="featured-section">
    <div class="fs-header">
        <h5>{{ $title ?? 'Latest News & Updates' }}</h5>
        <a href="{{ $viewAllLink ?? '#' }}">View All <i class="fa fa-angle-right"></i></a>
    </div>

    <div class="row">
        @forelse($items as $item)
        <div class="col-md-6 col-lg-4">
            <div class="news-card">
                <div class="news-card-img">
                    <img src="{{ url($item['image'] ?? 'resources/img/placeholder.jpg') }}"
                         alt="{{ $item['title'] }}" loading="lazy">
                    <span class="news-cat">{{ $item['category'] ?? 'News' }}</span>
                </div>
                <div class="news-card-body">
                    <div class="news-card-meta">
                        <span><i class="far fa-calendar-alt"></i> {{ $item['date'] ?? now()->format('M d, Y') }}</span>
                    </div>
                    <h6><a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] }}</a></h6>
                    <p>{{ Str::limit(strip_tags($item['description'] ?? ''), 100) }}</p>
                </div>
                <div class="news-card-footer">
                    <a href="{{ $item['link'] ?? '#' }}">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">No news available at this time.</p>
            </div>
        @endforelse
    </div>
</div>
