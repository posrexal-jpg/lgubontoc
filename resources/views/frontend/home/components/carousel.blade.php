{{-- Hero Carousel --}}
<style>
    .hero-carousel { position: relative; overflow: hidden; }
    .hero-carousel .carousel-item { height: 520px; background: var(--ph-navy2); }
    .hero-carousel .carousel-item img {
        width: 100%; height: 100%; object-fit: cover;
        filter: brightness(0.6);
    }
    .hero-carousel .carousel-caption {
        bottom: auto; top: 50%; transform: translateY(-50%);
        left: 8%; right: 8%; text-align: left;
        padding: 0;
    }
    .hero-carousel .carousel-caption .badge-category {
        display: inline-block;
        background: var(--ph-gold);
        color: #1a1a1a;
        font-size: 0.72rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1px;
        padding: 4px 12px; border-radius: 2px;
        margin-bottom: 12px;
    }
    .hero-carousel .carousel-caption h3 {
        font-family: 'Lato', sans-serif;
        font-size: clamp(1.6rem, 4vw, 2.8rem);
        font-weight: 900; color: #fff;
        line-height: 1.2; margin-bottom: 14px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        max-width: 700px;
    }
    .hero-carousel .carousel-caption p {
        color: rgba(255,255,255,0.88); font-size: 1rem;
        max-width: 550px; line-height: 1.6; margin-bottom: 20px;
        text-shadow: 0 1px 4px rgba(0,0,0,0.5);
    }
    .hero-carousel .carousel-caption .btn-hero {
        background: var(--ph-gold); color: #1a1a1a;
        border: none; padding: 10px 26px; font-weight: 700;
        font-size: 0.88rem; border-radius: 3px;
        text-transform: uppercase; letter-spacing: 0.5px;
        transition: background .2s, transform .2s;
    }
    .hero-carousel .carousel-caption .btn-hero:hover { background: #fff; color: var(--ph-navy); transform: translateY(-1px); }
    .hero-carousel .carousel-indicators li {
        width: 10px; height: 10px; border-radius: 50%;
        background: rgba(255,255,255,0.5); border: none; margin: 0 4px;
    }
    .hero-carousel .carousel-indicators .active { background: var(--ph-gold); }
    .hero-carousel .carousel-control-prev,
    .hero-carousel .carousel-control-next {
        width: 46px; height: 46px; background: rgba(0,0,0,0.4);
        border-radius: 50%; top: 50%; transform: translateY(-50%);
        bottom: auto; opacity: 0.8;
    }
    .hero-carousel .carousel-control-prev { left: 16px; }
    .hero-carousel .carousel-control-next { right: 16px; }
    .hero-carousel .carousel-control-prev:hover,
    .hero-carousel .carousel-control-next:hover { background: var(--ph-navy); opacity: 1; }
    /* bottom gradient overlay */
    .hero-carousel::after {
        content: ''; position: absolute; bottom: 0; left: 0; right: 0;
        height: 120px; pointer-events: none;
        background: linear-gradient(to top, rgba(26,53,99,0.6), transparent);
    }
    @media (max-width: 767px) {
        .hero-carousel .carousel-item { height: 300px; }
        .hero-carousel .carousel-caption h3 { font-size: 1.3rem; }
        .hero-carousel .carousel-caption p { display: none; }
    }
</style>

<div class="hero-carousel carousel slide" id="heroSlider" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        @forelse($items as $index => $item)
            <li data-target="#heroSlider" data-slide-to="{{ $index }}" @if($index===0) class="active" @endif></li>
        @empty
            <li data-target="#heroSlider" data-slide-to="0" class="active"></li>
        @endforelse
    </ol>

    <div class="carousel-inner">
        @forelse($items as $index => $item)
            <div class="carousel-item @if($index===0) active @endif">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" loading="{{ $index===0 ? 'eager' : 'lazy' }}">
                <div class="carousel-caption">
                    <span class="badge-category">Official Announcement</span>
                    <h3>{{ $item['title'] }}</h3>
                    @if(!empty($item['description']))
                        <p>{{ Str::limit($item['description'], 120) }}</p>
                    @endif
                    <a href="#" class="btn-hero btn">Learn More</a>
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{ asset('resources/img/Pictureo.jpg') }}" alt="Welcome to Bontoc" loading="eager"
                     style="width:100%;height:100%;object-fit:cover;filter:brightness(0.55);">
                <div class="carousel-caption">
                    <span class="badge-category">Welcome</span>
                    <h3>Welcome to Bontoc,<br>Southern Leyte</h3>
                    <p>A progressive municipality dedicated to transparent governance, sustainable development, and empowered communities.</p>
                    <a href="{{ route('about.history') }}" class="btn-hero btn">Discover Bontoc</a>
                </div>
            </div>
        @endforelse
    </div>

    <a class="carousel-control-prev" href="#heroSlider" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#heroSlider" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
