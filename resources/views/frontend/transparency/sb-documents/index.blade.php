@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => $title,
    'description' => $description,
    'breadcrumbs' => [
        ['label' => 'Transparency'],
        ['label' => $breadcrumb],
    ],
])

<style>
    .sb-documents-page {
        background: #f5f7f2;
        padding: 3rem 0 4rem;
    }

    .sb-document-tools {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 180px auto;
        gap: .85rem;
        margin-bottom: 1.25rem;
        padding: 1rem;
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .sb-document-tools input,
    .sb-document-tools select {
        width: 100%;
        min-height: 44px;
        border: 1px solid #dce3ea;
        border-radius: 4px;
        padding: .6rem .75rem;
    }

    .sb-document-tools .btn {
        min-height: 44px;
        white-space: nowrap;
    }

    .sb-document-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 260px;
        gap: 1.5rem;
        align-items: start;
    }

    .sb-document-list {
        display: grid;
        gap: 1rem;
    }

    .sb-document-card,
    .sb-archive-card {
        background: #fff;
        border: 1px solid #dce3ea;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .sb-document-card {
        padding: 1.25rem;
        border-left: 5px solid #1f7a3f;
    }

    .sb-document-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: .55rem;
        margin-bottom: .7rem;
    }

    .sb-document-card__meta span {
        display: inline-flex;
        align-items: center;
        gap: .35rem;
        padding: .28rem .6rem;
        background: #edf8e7;
        color: #1f5f35;
        border-radius: 999px;
        font-size: .82rem;
        font-weight: 800;
    }

    .sb-document-card h2 {
        color: #143226;
        font-size: 1.28rem;
        font-weight: 900;
        margin-bottom: .5rem;
    }

    .sb-document-card p {
        color: #56645d;
        margin-bottom: 1rem;
    }

    .sb-document-card__actions {
        display: flex;
        flex-wrap: wrap;
        gap: .65rem;
    }

    .sb-archive-card {
        position: sticky;
        top: 1rem;
        padding: 1.1rem;
    }

    .sb-archive-card h2 {
        color: #143226;
        font-size: 1.05rem;
        font-weight: 900;
        margin-bottom: .8rem;
    }

    .sb-archive-years {
        display: grid;
        gap: .45rem;
    }

    .sb-archive-years a {
        display: flex;
        justify-content: space-between;
        padding: .55rem .7rem;
        background: #f8fbf6;
        border: 1px solid #e2eadf;
        border-radius: 4px;
        color: #143226;
        font-weight: 800;
    }

    .sb-archive-years a.active,
    .sb-archive-years a:hover {
        background: #1f7a3f;
        color: #fff;
    }

    @media (max-width: 991.98px) {
        .sb-document-layout,
        .sb-document-tools {
            grid-template-columns: 1fr;
        }

        .sb-archive-card {
            position: static;
        }
    }
</style>

<section class="sb-documents-page">
    <div class="container">
        <form class="sb-document-tools" method="GET" action="{{ url()->current() }}">
            <input type="search" name="q" value="{{ request('q') }}" placeholder="Search title, document number, or summary" aria-label="Search documents">
            <select name="year" aria-label="Archive year">
                <option value="">All years</option>
                @foreach($years as $year)
                    <option value="{{ $year }}" @selected((string) request('year') === (string) $year)>{{ $year }}</option>
                @endforeach
            </select>
            <div>
                <button type="submit" class="btn btn-primary">Search</button>
                @if(request('q') || request('year'))
                    <a href="{{ url()->current() }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </form>

        <div class="sb-document-layout">
            <main class="sb-document-list">
                @forelse($documents as $document)
                    <article class="sb-document-card">
                        <div class="sb-document-card__meta">
                            @if($document->document_number)
                                <span><i class="fa fa-hashtag" aria-hidden="true"></i>{{ $document->document_number }}</span>
                            @endif
                            @if($document->year)
                                <span><i class="fa fa-calendar" aria-hidden="true"></i>{{ $document->year }}</span>
                            @endif
                            @if($document->status)
                                <span><i class="fa fa-check-circle" aria-hidden="true"></i>{{ $document->status }}</span>
                            @endif
                        </div>
                        <h2>{{ $document->title }}</h2>
                        @if($document->approved_date)
                            <p class="mb-2"><strong>Approved:</strong> {{ $document->approved_date->format('F j, Y') }}</p>
                        @endif
                        @if($document->description)
                            <p>{{ \Illuminate\Support\Str::limit(strip_tags($document->description), 220) }}</p>
                        @endif
                        <div class="sb-document-card__actions">
                            @if($document->file_url)
                                <a href="{{ $document->file_url }}" target="_blank" rel="noopener" class="btn btn-primary">View Document</a>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="sb-document-card text-center">
                        <p class="mb-0">No documents matched your search.</p>
                    </div>
                @endforelse

                <div class="pagination-wrapper">
                    {{ $documents->links() }}
                </div>
            </main>

            <aside class="sb-archive-card" aria-label="Archive by year">
                <h2>Archive by Year</h2>
                <div class="sb-archive-years">
                    <a href="{{ url()->current() }}" @class(['active' => ! request('year')])>
                        <span>All Years</span>
                        <span>{{ $documents->total() }}</span>
                    </a>
                    @foreach($years as $year)
                        <a href="{{ request()->fullUrlWithQuery(['year' => $year, 'page' => null]) }}" @class(['active' => (string) request('year') === (string) $year])>
                            <span>{{ $year }}</span>
                            <span>&rarr;</span>
                        </a>
                    @endforeach
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection
