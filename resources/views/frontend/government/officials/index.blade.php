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
    .officials-directory-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.25rem;
        padding-bottom: .8rem;
        border-bottom: 1px solid #dce3ea;
    }

    .officials-directory-head h2 {
        color: #143226;
        font-size: 1.35rem;
        font-weight: 800;
        line-height: 1.25;
        margin: 0;
    }

    .officials-directory-head span {
        color: #66737f;
        font-size: .9rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .officials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(255px, 1fr));
        gap: .9rem;
    }

    .official-card {
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: .9rem;
        min-height: 100%;
        padding: .7rem;
        background: #fff;
        border: 1px solid #dce3ea;
        border-left: 4px solid #1f7a3f;
        border-radius: 6px;
        box-shadow: 0 8px 18px rgba(11, 61, 42, .055);
        transition: border-color .2s ease, box-shadow .2s ease, transform .2s ease;
    }

    .official-card:hover {
        transform: translateY(-2px);
        border-color: #bfd3c5;
        border-left-color: #d4af37;
        box-shadow: 0 12px 22px rgba(11, 61, 42, .09);
    }

    .official-card__photo-wrap {
        flex: 0 0 76px;
        position: relative;
        width: 76px;
        height: 92px;
        margin: 0;
        overflow: hidden;
        background: #eef2ea;
        border: 1px solid #d6dfd8;
        border-radius: 5px;
    }

    .official-card__photo {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
    }

    .official-card__body {
        min-width: 0;
        padding: 0;
    }

    .official-card h2 {
        color: #143226;
        font-size: .98rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: .22rem;
        overflow-wrap: anywhere;
    }

    .official-position {
        display: block;
        color: #1f7a3f;
        font-size: .78rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: .45rem;
        text-transform: uppercase;
        letter-spacing: 0;
        overflow-wrap: anywhere;
    }

    .official-card p {
        color: #5f6b76;
        display: -webkit-box;
        overflow: hidden;
        font-size: .85rem;
        line-height: 1.45;
        margin-bottom: 0;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
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

        .officials-directory-head {
            display: block;
        }

        .officials-directory-head span {
            display: block;
            margin-top: .25rem;
            white-space: normal;
        }
    }
</style>

<section class="container frontend-page-content">
    @if($officials->isNotEmpty())
        <div class="officials-directory-head">
            <h2>Official Directory</h2>
            <span>{{ $officials->count() }} officials currently serving</span>
        </div>

        <div class="officials-grid">
            @foreach($officials as $official)
                <article class="official-card">
                    <div class="official-card__photo-wrap">
                        <img class="official-card__photo" src="{{ $official->photo_url }}" alt="{{ $official->name }}">
                    </div>
                    <div class="official-card__body">
                        <h2>{{ $official->name }}</h2>
                        <div class="official-position">{{ $official->position }}</div>
                        @if(!empty($official->description))
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($official->description), 95) }}</p>
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
