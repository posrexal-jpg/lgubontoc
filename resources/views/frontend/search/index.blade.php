@extends('layouts.frontend')

@section('content')
<style>
    .search-results-header {
        background: #f6faf7;
        border-bottom: 1px solid #dbe8df;
        padding: 34px 0 30px;
    }

    .search-results-header .breadcrumb {
        background: transparent;
        padding: 0;
        margin-bottom: 14px;
        font-size: 0.95rem;
    }

    .search-results-header h1 {
        color: #046631;
        font-family: Helvetica, Arial, sans-serif;
        font-size: clamp(2rem, 4vw, 3rem);
        font-weight: 800;
        margin-bottom: 10px;
    }

    .search-results-header p {
        color: #455a4c;
        font-size: 1.05rem;
        margin-bottom: 0;
    }

    .search-results-page {
        padding: 3.5rem 0 4rem;
        background: #fff;
    }

    .search-results-form {
        display: flex;
        max-width: 760px;
        margin-bottom: 2rem;
        border: 1px solid #dce3ea;
        background: #fff;
    }

    .search-results-form input {
        flex: 1;
        border: 0;
        padding: .9rem 1rem;
        outline: 0;
    }

    .search-results-form button {
        border: 0;
        padding: 0 1.25rem;
        background: #1f7a3f;
        color: #fff;
        font-weight: 800;
    }

    .search-result-list {
        display: grid;
        gap: 1rem;
        max-width: 900px;
    }

    .search-result-card {
        display: block;
        border: 1px solid #dce3ea;
        padding: 1.25rem;
        background: #fff;
        color: #143226;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .search-result-card:hover {
        color: #143226;
        transform: translateY(-1px);
    }

    .search-result-card span {
        display: inline-block;
        margin-bottom: .45rem;
        color: #1f7a3f;
        font-size: .82rem;
        font-weight: 800;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .search-result-card h2 {
        color: #143226;
        font-size: 1.35rem;
        font-weight: 800;
        margin-bottom: .45rem;
    }

    .search-result-card p,
    .search-empty {
        color: #5f6b76;
        margin-bottom: 0;
    }

    .search-empty {
        max-width: 760px;
        border: 1px dashed #b8c9bd;
        padding: 1.5rem;
        background: #f9fcfa;
    }
</style>

<section class="search-results-header">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
            </ol>
        </nav>

        <h1>Search Website</h1>
        <p>Find news, announcements, tourism entries, services, careers, and public information across the Bontoc LGU website.</p>
    </div>
</section>

<section class="search-results-page">
    <div class="container">
        <form action="{{ route('search') }}" method="GET" class="search-results-form">
            <label class="sr-only" for="search-results-input">Search website</label>
            <input id="search-results-input" type="search" name="q" value="{{ $query }}" placeholder="Search website">
            <button type="submit"><i class="fa fa-search mr-1"></i> Search</button>
        </form>

        @if($query === '')
            <div class="search-empty">Enter a keyword to search the website.</div>
        @elseif($results->isEmpty())
            <div class="search-empty">No results found for "{{ $query }}". Try a different keyword.</div>
        @else
            <p class="mb-4 text-muted">{{ $results->count() }} result{{ $results->count() === 1 ? '' : 's' }} found for "{{ $query }}".</p>
            <div class="search-result-list">
                @foreach($results as $result)
                    <a href="{{ $result['url'] }}" class="search-result-card">
                        <span>{{ $result['type'] }}</span>
                        <h2>{{ $result['title'] }}</h2>
                        <p>{{ $result['excerpt'] }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
