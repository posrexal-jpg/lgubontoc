@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => $title,
    'description' => $description,
    'breadcrumbs' => [
        ['label' => 'Government'],
        ['label' => $title],
    ],
])

<style>
    .officials-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.25rem;
    }

    .official-card {
        display: flex;
        min-height: 100%;
        flex-direction: column;
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .official-card__photo {
        width: 100%;
        aspect-ratio: 4 / 3;
        object-fit: cover;
        background: #eef2ea;
    }

    .official-card__body {
        padding: 1.25rem;
    }

    .official-card h2 {
        color: #143226;
        font-size: 1.25rem;
        font-weight: 800;
        margin-bottom: .35rem;
    }

    .official-position {
        color: #1f7a3f;
        font-weight: 800;
        margin-bottom: .8rem;
    }

    .official-card p {
        color: #5f6b76;
        margin-bottom: 0;
    }

    .officials-empty {
        border: 1px dashed #b8c9bd;
        padding: 2rem;
        background: #fff;
        color: #5f6b76;
    }

    @media (max-width: 991.98px) {
        .officials-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 575.98px) {
        .officials-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="container frontend-page-content">
    @if($officials->isNotEmpty())
        <div class="officials-grid">
            @foreach($officials as $official)
                <article class="official-card">
                    <img class="official-card__photo" src="{{ $official->photo_url }}" alt="{{ $official->name }}">
                    <div class="official-card__body">
                        <h2>{{ $official->name }}</h2>
                        <div class="official-position">{{ $official->position }}</div>
                        @if(!empty($official->description))
                            <p>{{ $official->description }}</p>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="officials-empty">
            No published officials have been added yet.
        </div>
    @endif
</section>
@endsection
