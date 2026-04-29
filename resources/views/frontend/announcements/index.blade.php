@extends('layouts.frontend')

@section('content')

<style>
    .announcements-hero {
        background: linear-gradient(135deg, #155724 0%, #28a745 100%);
        padding: 50px 0 30px;
        color: white;
        text-align: center;
    }
    .announcements-hero h1 { font-family: Helvetica; font-size: 2.2rem; margin-bottom: 8px; }
    .breadcrumb-bar {
        background: #f8f9fa; padding: 10px 20px;
        border-bottom: 1px solid #dee2e6; font-size: 0.9rem;
    }
    .breadcrumb-bar a { color: #28a745; text-decoration: none; }
    .announcements-section { padding: 40px 0; }
    .announcement-item {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        padding: 20px 24px;
        margin-bottom: 18px;
        border-left: 5px solid #28a745;
    }
    .announcement-item.advisory { border-left-color: #ffc107; }
    .announcement-item.notice { border-left-color: #17a2b8; }
    .announcement-item h5 { font-family: Helvetica; color: #212529; margin-bottom: 6px; }
    .announcement-item .meta { font-size: 0.82rem; color: #6c757d; margin-bottom: 10px; }
    .announcement-item .meta .badge-type {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-right: 8px;
        text-transform: uppercase;
    }
    .badge-announcement { background: #e8f5e9; color: #155724; }
    .badge-advisory { background: #fff3cd; color: #856404; }
    .badge-notice { background: #d1ecf1; color: #0c5460; }
    .announcement-item .content { color: #495057; font-size: 0.92rem; line-height: 1.6; }
</style>

<div class="announcements-hero">
    <h1><i class="fa fa-bullhorn mr-2"></i>Announcements & Advisories</h1>
    <p>Official announcements from the Municipality of Bontoc</p>
</div>
<div class="breadcrumb-bar">
    <div class="container">
        <a href="{{ route('home') }}">Home</a> &rsaquo; Announcements
    </div>
</div>

<div class="container announcements-section">
    @if($announcements->isNotEmpty())
        @foreach($announcements as $item)
        <div class="announcement-item {{ $item->type }}">
            <div class="meta">
                <span class="badge-type badge-{{ $item->type }}">{{ ucfirst($item->type) }}</span>
                <i class="fa fa-calendar mr-1"></i>{{ \Carbon\Carbon::parse($item->date_posted)->format('F d, Y') }}
            </div>
            <h5>{{ $item->title }}</h5>
            <div class="content">{!! nl2br(e($item->content)) !!}</div>
        </div>
        @endforeach

        <div class="mt-4">
            {{ $announcements->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="fa fa-bullhorn fa-3x text-muted mb-3"></i>
            <p class="text-muted">No announcements at this time. Please check back later.</p>
        </div>
    @endif
</div>

@endsection
