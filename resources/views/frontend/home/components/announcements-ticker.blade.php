{{-- Announcements Ticker --}}
@if(isset($announcements) && $announcements->isNotEmpty())
<style>
    .announcements-ticker {
        background: var(--ph-gold);
        display: flex;
        align-items: stretch;
        overflow: hidden;
        height: 38px;
        border-bottom: 2px solid var(--ph-gold2);
    }
    .ticker-label {
        background: var(--ph-navy);
        color: #fff;
        font-size: 0.72rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        padding: 0 16px;
        display: flex;
        align-items: center;
        white-space: nowrap;
        flex-shrink: 0;
        gap: 6px;
    }
    .ticker-label i { color: var(--ph-gold); font-size: 0.8rem; }
    .ticker-wrap {
        overflow: hidden;
        flex: 1;
        display: flex;
        align-items: center;
    }
    .ticker-move {
        display: inline-flex;
        align-items: center;
        animation: ticker-scroll 45s linear infinite;
        white-space: nowrap;
        gap: 0;
    }
    .ticker-move:hover { animation-play-state: paused; }
    .ticker-item {
        font-size: 0.82rem;
        font-weight: 600;
        color: #1a1a1a;
        padding: 0 10px;
    }
    .ticker-item a { color: #1a1a1a; }
    .ticker-item a:hover { color: var(--ph-navy); text-decoration: underline; }
    .ticker-sep { color: var(--ph-navy); opacity: 0.5; padding: 0 6px; }
    @keyframes ticker-scroll {
        0%   { transform: translateX(60vw); }
        100% { transform: translateX(-100%); }
    }
    .ticker-view-all {
        background: var(--ph-navy);
        color: #fff;
        font-size: 0.72rem;
        font-weight: 600;
        padding: 0 14px;
        display: flex;
        align-items: center;
        white-space: nowrap;
        flex-shrink: 0;
        text-decoration: none;
        transition: background .2s;
    }
    .ticker-view-all:hover { background: var(--ph-red); color: #fff; }
</style>
<div class="announcements-ticker">
    <div class="ticker-label">
        <i class="fa fa-bullhorn"></i> ANNOUNCEMENTS
    </div>
    <div class="ticker-wrap">
        <div class="ticker-move">
            @foreach($announcements as $item)
                <span class="ticker-item">
                    <a href="{{ route('announcements.index') }}">{{ $item->title }}</a>
                </span>
                <span class="ticker-sep">&#9679;</span>
            @endforeach
        </div>
    </div>
    <a href="{{ route('announcements.index') }}" class="ticker-view-all">
        View All <i class="fa fa-angle-right ml-1"></i>
    </a>
</div>
@endif
