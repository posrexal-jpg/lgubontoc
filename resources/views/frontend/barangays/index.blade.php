@extends('layouts.frontend')

@section('content')

<style>
    .barangays-hero {
        background: linear-gradient(135deg, #155724 0%, #28a745 100%);
        padding: 50px 0 30px;
        color: white;
        text-align: center;
    }
    .barangays-hero h1 { font-family: Helvetica; font-size: 2.2rem; margin-bottom: 8px; }
    .barangays-hero p { opacity: 0.9; }
    .breadcrumb-bar {
        background: #f8f9fa;
        padding: 10px 20px;
        border-bottom: 1px solid #dee2e6;
        font-size: 0.9rem;
    }
    .breadcrumb-bar a { color: #28a745; text-decoration: none; }
    .barangays-section { padding: 40px 0; }
    .barangay-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        overflow: hidden;
        margin-bottom: 25px;
        transition: transform 0.2s;
    }
    .barangay-card:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
    .barangay-card img { width: 100%; height: 180px; object-fit: cover; }
    .barangay-card .no-photo {
        width: 100%; height: 180px;
        background: linear-gradient(135deg, #e8f5e9, #a5d6a7);
        display: flex; align-items: center; justify-content: center;
    }
    .barangay-card .no-photo i { font-size: 55px; color: #66bb6a; }
    .barangay-card .card-body { padding: 16px; }
    .barangay-card h5 { font-family: Helvetica; color: #155724; font-weight: bold; margin-bottom: 6px; }
    .barangay-meta { font-size: 0.85rem; color: #6c757d; }
    .barangay-meta span { margin-right: 12px; }
    .barangay-meta i { color: #28a745; margin-right: 3px; }
    .captain-badge {
        display: inline-block;
        background: #e8f5e9;
        color: #155724;
        border-radius: 20px;
        padding: 2px 10px;
        font-size: 0.8rem;
        font-weight: 600;
        margin-top: 6px;
    }
    .section-title-bar {
        background: #155724;
        color: white;
        padding: 12px 20px;
        border-radius: 6px;
        margin-bottom: 25px;
        font-family: Helvetica;
    }
    .stats-bar {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 30px;
        text-align: center;
    }
    .stats-bar .stat-item h3 { color: #28a745; font-weight: bold; font-size: 2rem; margin: 0; }
    .stats-bar .stat-item p { color: #6c757d; font-size: 0.85rem; margin: 0; }
</style>

<div class="barangays-hero">
    <h1><i class="fa fa-map-marker mr-2"></i>Barangays</h1>
    <p>The {{ $barangays->count() }} Barangays of the Municipality of Bontoc, Southern Leyte</p>
</div>
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a> &rsaquo; Barangays
    </div>
</div>

<div class="container barangays-section">

    @if($barangays->isNotEmpty())
        <div class="stats-bar row">
            <div class="col-md-4 stat-item">
                <h3>{{ $barangays->count() }}</h3>
                <p>Total Barangays</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>{{ $barangays->whereNotNull('captain')->count() }}</h3>
                <p>With Listed Captains</p>
            </div>
            <div class="col-md-4 stat-item">
                <h3>Bontoc</h3>
                <p>Municipality, Southern Leyte</p>
            </div>
        </div>

        <div class="section-title-bar">
            <i class="fa fa-list mr-2"></i> List of Barangays
        </div>

        <div class="row">
            @foreach($barangays as $barangay)
            <div class="col-lg-4 col-md-6">
                <div class="barangay-card">
                    @if($barangay->photo)
                        <img src="{{ asset('uploads/' . $barangay->photo) }}" alt="{{ $barangay->name }}">
                    @else
                        <div class="no-photo"><i class="fa fa-home"></i></div>
                    @endif
                    <div class="card-body">
                        <h5>Brgy. {{ $barangay->name }}</h5>
                        @if($barangay->captain)
                            <span class="captain-badge"><i class="fa fa-user"></i> {{ $barangay->captain }}</span>
                        @endif
                        <div class="barangay-meta mt-2">
                            @if($barangay->area)
                                <span><i class="fa fa-map"></i>{{ $barangay->area }}</span>
                            @endif
                            @if($barangay->population)
                                <span><i class="fa fa-users"></i>Pop: {{ $barangay->population }}</span>
                            @endif
                        </div>
                        @if($barangay->description)
                            <p class="mt-2 mb-0" style="font-size:0.83rem;color:#495057;">{{ Str::limit($barangay->description, 100) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa fa-map fa-3x text-muted mb-3"></i>
            <p class="text-muted">No barangays listed yet. Please check back later.</p>
        </div>
    @endif

</div>

@endsection
