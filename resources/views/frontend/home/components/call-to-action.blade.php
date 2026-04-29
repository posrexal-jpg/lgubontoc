{{-- Call-to-Action Component --}}

<div class="cta-section">
    <div class="container-fluid">
        <div class="row">
            @forelse($items ?? [] as $item)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="cta-item">
                        <div class="cta-icon">
                            <i class="fa {{ $item['icon'] ?? 'fa-star' }}"></i>
                        </div>
                        <h5>{{ $item['title'] ?? 'Learn More' }}</h5>
                        <p>{{ $item['description'] ?? '' }}</p>
                        @if(isset($item['link']))
                            <a href="{{ $item['link'] }}">Explore →</a>
                        @endif
                    </div>
                </div>
            @empty
                {{-- Default CTA items if none provided --}}
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="cta-item">
                        <div class="cta-icon">
                            <i class="fa fa-building"></i>
                        </div>
                        <h5>About Bontoc</h5>
                        <p>Learn about our municipality's rich history</p>
                        <a href="{{ route('about.history') }}">Explore →</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="cta-item">
                        <div class="cta-icon">
                            <i class="fa fa-mountain"></i>
                        </div>
                        <h5>Tourism</h5>
                        <p>Discover beautiful attractions and destinations</p>
                        <a href="{{ route('tourism.bontocattractions') }}">Explore →</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="cta-item">
                        <div class="cta-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h5>Services</h5>
                        <p>Access municipal services and information</p>
                        <a href="{{ route('services.mayorsoffice') }}">Explore →</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="cta-item">
                        <div class="cta-icon">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <h5>Careers</h5>
                        <p>Join our team and make a difference</p>
                        <a href="{{ route('careers.jobvacancies') }}">Explore →</a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

