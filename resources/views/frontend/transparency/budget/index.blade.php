@extends('layouts.frontend')

@section('content')

<style>
    .budget-hero {
        background: linear-gradient(135deg, #155724 0%, #28a745 100%);
        padding: 50px 0 30px;
        color: white;
        text-align: center;
    }
    .budget-hero h1 { font-family: Helvetica; font-size: 2.2rem; margin-bottom: 8px; }
    .breadcrumb-bar {
        background: #f8f9fa; padding: 10px 20px;
        border-bottom: 1px solid #dee2e6; font-size: 0.9rem;
    }
    .breadcrumb-bar a { color: #28a745; text-decoration: none; }
    .budget-section { padding: 40px 0; }
    .year-group { margin-bottom: 40px; }
    .year-header {
        background: #155724;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        font-family: Helvetica;
        font-size: 1.1rem;
        margin-bottom: 15px;
    }
    .doc-item {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 16px 20px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .doc-item .doc-info { flex: 1; }
    .doc-item .doc-info h6 { margin: 0 0 4px; font-family: Helvetica; color: #212529; }
    .doc-item .doc-info .meta { font-size: 0.82rem; color: #6c757d; }
    .doc-item .doc-info .badge-cat {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        background: #e8f5e9;
        color: #155724;
        margin-right: 6px;
    }
    .doc-item .btn-download {
        background: #28a745;
        color: white;
        border: none;
        border-radius: 6px;
        padding: 6px 16px;
        font-size: 0.85rem;
        text-decoration: none;
        white-space: nowrap;
    }
    .doc-item .btn-download:hover { background: #218838; color: white; }
    .no-file-tag { font-size: 0.8rem; color: #adb5bd; }
    .filter-bar {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 30px;
    }
    .filter-bar label { font-size: 0.9rem; color: #495057; font-weight: 600; }
</style>

<div class="budget-hero">
    <h1><i class="fa fa-file-alt mr-2"></i>Budget &amp; Financial Transparency</h1>
    <p>Annual budgets, financial reports, and disbursement documents</p>
</div>
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a> &rsaquo; Transparency &rsaquo; Budget Documents
    </div>
</div>

<div class="container budget-section">

    <div class="filter-bar">
        <div class="row align-items-center">
            <div class="col-md-6">
                <i class="fa fa-info-circle text-success mr-1"></i>
                Budget and financial documents for public transparency. All documents are official records of the Municipality of Bontoc.
            </div>
            <div class="col-md-6 text-md-right mt-2 mt-md-0">
                <a href="{{ route('transparency.municipalordinances') }}" class="btn btn-outline-success btn-sm mr-2">Municipal Ordinances</a>
                <a href="{{ route('transparency.resolutions') }}" class="btn btn-outline-success btn-sm">Resolutions</a>
            </div>
        </div>
    </div>

    @if($documents->isNotEmpty())
        @php $grouped = $documents->groupBy('year'); @endphp
        @foreach($grouped as $year => $docs)
        <div class="year-group">
            <div class="year-header"><i class="fa fa-folder-open mr-2"></i>Fiscal Year {{ $year }}</div>
            @foreach($docs as $doc)
            <div class="doc-item">
                <div class="doc-info">
                    <span class="badge-cat">{{ ucwords(str_replace('-', ' ', $doc->category)) }}</span>
                    <h6>{{ $doc->title }}</h6>
                    @if($doc->description)
                        <div class="meta">{{ $doc->description }}</div>
                    @endif
                </div>
                @if($doc->file_path)
                    <a href="{{ asset($doc->file_path) }}" target="_blank" class="btn-download ml-3">
                        <i class="fa fa-download mr-1"></i> Download
                    </a>
                @else
                    <span class="no-file-tag ml-3">File pending</span>
                @endif
            </div>
            @endforeach
        </div>
        @endforeach

        <div class="mt-4">{{ $documents->links() }}</div>
    @else
        <div class="text-center py-5">
            <i class="fa fa-file-alt fa-3x text-muted mb-3"></i>
            <p class="text-muted">No budget documents available yet. Please check back later.</p>
        </div>
    @endif
</div>

@endsection
