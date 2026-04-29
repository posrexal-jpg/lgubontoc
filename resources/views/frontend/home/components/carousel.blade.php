{{-- Carousel Component --}}

<div class="carousel slide homepage-carousel" id="slides" data-ride="carousel">
    <ul class="carousel-indicators">
        @forelse($items as $index => $item)
            <li data-target="#slides" data-slide-to="{{ $index }}"
                @if($index === 0) class="active" @endif></li>
        @empty
            <li data-target="#slides" data-slide-to="0" class="active"></li>
        @endforelse
    </ul>

    <div class="carousel-inner">
        @forelse($items as $index => $item)
            <div class="carousel-item @if($index === 0) active @endif">
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}"
                     class="img-fluid" loading="lazy">
                <div class="carousel-caption">
                    <h3>{{ $item['title'] }}</h3>
                    <p>{{ $item['description'] ?? '' }}</p>
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{ asset('resources/img/Pictureo.jpg') }}"
                     alt="Bontoc Municipality" class="img-fluid" loading="lazy">
                <div class="carousel-caption">
                    <h3>Welcome to Bontoc</h3>
                    <p>Discover the beauty of Southern Leyte</p>
                </div>
            </div>
        @endforelse
    </div>

    <a class="carousel-control-prev" href="#slides" data-slide="prev" role="button">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#slides" data-slide="next" role="button">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
