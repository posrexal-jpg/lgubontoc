{{-- Announcements Ticker Component --}}

@if(isset($announcements) && $announcements->isNotEmpty())
<style>
    .announcements-ticker {
        background: #155724;
        color: white;
        padding: 8px 0;
        overflow: hidden;
        position: relative;
    }
    .announcements-ticker .ticker-label {
        background: #ffc107;
        color: #212529;
        font-weight: bold;
        font-size: 0.82rem;
        padding: 3px 12px;
        white-space: nowrap;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        z-index: 2;
    }
    .announcements-ticker .ticker-wrap {
        padding-left: 140px;
        overflow: hidden;
        white-space: nowrap;
    }
    .ticker-move {
        display: inline-block;
        animation: ticker-scroll 40s linear infinite;
        white-space: nowrap;
    }
    .ticker-move:hover { animation-play-state: paused; cursor: pointer; }
    .ticker-move .ticker-item {
        display: inline-block;
        margin-right: 50px;
        font-size: 0.87rem;
    }
    .ticker-move .ticker-item a {
        color: #fff;
        text-decoration: none;
    }
    .ticker-move .ticker-item a:hover { text-decoration: underline; }
    .ticker-move .ticker-sep { color: #ffc107; margin-right: 50px; }
    @keyframes ticker-scroll {
        0%   { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
<div class="announcements-ticker">
    <span class="ticker-label"><i class="fa fa-bullhorn mr-1"></i> ANNOUNCEMENTS</span>
    <div class="ticker-wrap">
        <div class="ticker-move">
            @foreach($announcements as $item)
                <span class="ticker-item">
                    <a href="{{ route('announcements.index') }}">{{ $item->title }}</a>
                </span>
                @if(!$loop->last)<span class="ticker-sep">|</span>@endif
            @endforeach
        </div>
    </div>
</div>
@endif
