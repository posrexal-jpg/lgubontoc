{{-- Featured Section Component --}}

<div class="featured-section">
    <div class="section-header">
        <h5>{{ $title ?? 'Featured Items' }}</h5>
        <a href="{{ $viewAllLink ?? '#' }}" class="text-secondary font-weight-medium">View All</a>
    </div>

    <div class="news-grid">
        @forelse($items as $item)
            <div class="news-card">
                <div class="news-card-image">
                    <img src="{{ url($item['image'] ?? 'resources/img/placeholder.jpg') }}"
                         alt="{{ $item['title'] }}" loading="lazy">
                    <div class="news-card-overlay"></div>
                </div>
                <div class="news-card-content">
                    <div class="news-card-meta">
                        <a href="#">{{ $item['category'] ?? 'News' }}</a>
                        <span class="px-1">/</span>
                        <span>{{ $item['date'] ?? now()->format('M d, Y') }}</span>
                    </div>
                    <h3 class="news-card-title">
                        <a href="{{ $item['link'] ?? '#' }}">{{ $item['title'] }}</a>
                    </h3>
                    <div class="news-card-description">
                        {!! Str::limit($item['description'] ?? '', 150) !!}
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">No items available</p>
            </div>
        @endforelse
    </div>
</div>
