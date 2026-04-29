@php
    $description = $description ?? null;
    $breadcrumbs = $breadcrumbs ?? [];
@endphp

<style>
    .frontend-page-header {
        background: #f6faf7;
        border-bottom: 1px solid #dbe8df;
        padding: 32px 0 28px;
        margin-bottom: 32px;
    }

    .frontend-page-header .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 14px;
        font-size: 0.95rem;
    }

    .frontend-page-header h1 {
        color: #046631;
        font-family: Helvetica, Arial, sans-serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        margin-bottom: 10px;
    }

    .frontend-page-header p {
        color: #455a4c;
        font-size: 1.05rem;
        line-height: 1.65;
        max-width: 760px;
        margin-bottom: 0;
    }

    .frontend-page-content {
        padding-bottom: 4rem;
    }

    .frontend-page-content h2,
    .about-page-content h2 {
        color: #046631;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 18px;
    }
</style>

<section class="frontend-page-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                @foreach($breadcrumbs as $breadcrumb)
                    @if(!empty($breadcrumb['url']) && !$loop->last)
                        <li class="breadcrumb-item"><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a></li>
                    @else
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}" @if($loop->last) aria-current="page" @endif>{{ $breadcrumb['label'] }}</li>
                    @endif
                @endforeach
            </ol>
        </nav>

        <h1>{{ $title }}</h1>
        @if(!empty($description))
            <p>{{ $description }}</p>
        @endif
    </div>
</section>
