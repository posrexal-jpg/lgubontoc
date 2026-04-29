@extends('layouts.frontend')

@section('content')

<style>
    .officials-hero {
        background: linear-gradient(135deg, #155724 0%, #28a745 100%);
        padding: 50px 0 30px;
        color: white;
        text-align: center;
    }
    .officials-hero h1 { font-family: Helvetica; font-size: 2.2rem; margin-bottom: 8px; }
    .officials-hero p { opacity: 0.9; font-size: 1rem; }
    .breadcrumb-bar {
        background: #f8f9fa;
        padding: 10px 20px;
        border-bottom: 1px solid #dee2e6;
        font-size: 0.9rem;
    }
    .breadcrumb-bar a { color: #28a745; text-decoration: none; }
    .officials-section { padding: 40px 0; }
    .officials-section h2 {
        font-family: Helvetica;
        color: #155724;
        border-bottom: 3px solid #28a745;
        padding-bottom: 8px;
        margin-bottom: 25px;
    }
    .official-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        overflow: hidden;
        text-align: center;
        transition: transform 0.2s;
        margin-bottom: 25px;
    }
    .official-card:hover { transform: translateY(-4px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
    .official-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }
    .official-card .no-photo {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #e8f5e9, #c8e6c9);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .official-card .no-photo i { font-size: 70px; color: #81c784; }
    .official-card .card-body { padding: 18px; }
    .official-card .card-body h5 { font-family: Helvetica; font-weight: bold; color: #212529; margin-bottom: 4px; }
    .official-card .position { color: #28a745; font-weight: 600; font-size: 0.9rem; }
    .official-card .office { color: #6c757d; font-size: 0.85rem; }
    .official-card .contact { color: #6c757d; font-size: 0.82rem; margin-top: 8px; }
    .official-card .bio { font-size: 0.85rem; color: #495057; margin-top: 8px; }
</style>

<div class="officials-hero">
    <h1><i class="fa fa-users mr-2"></i>Government Officials</h1>
    <p>Elected and Appointed Officials of the Municipality of Bontoc</p>
</div>
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a> &rsaquo; Government &rsaquo; Elected Officials
    </div>
</div>

<div class="container officials-section">

    @if($officials->isNotEmpty())
        @php
            $grouped = $officials->groupBy('office');
        @endphp

        @forelse($grouped as $office => $group)
            <h2>{{ $office ?: 'Municipal Officials' }}</h2>
            <div class="row">
                @foreach($group as $official)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="official-card">
                        @if($official->photo)
                            <img src="{{ asset('uploads/' . $official->photo) }}" alt="{{ $official->name }}">
                        @else
                            <div class="no-photo"><i class="fa fa-user"></i></div>
                        @endif
                        <div class="card-body">
                            <h5>{{ $official->name }}</h5>
                            <div class="position">{{ $official->position }}</div>
                            @if($official->contact)
                                <div class="contact"><i class="fa fa-phone mr-1"></i>{{ $official->contact }}</div>
                            @endif
                            @if($official->bio)
                                <div class="bio">{{ Str::limit($official->bio, 100) }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @empty
        @endforelse
    @else
        <div class="text-center py-5">
            <i class="fa fa-users fa-3x text-muted mb-3"></i>
            <p class="text-muted">No government officials listed yet. Please check back later.</p>
        </div>
    @endif

</div>

@endsection
