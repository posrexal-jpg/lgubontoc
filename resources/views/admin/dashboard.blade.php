@extends('layouts.default')

@section('content')
    <div class="admin-dashboard">
        <div class="card admin-hero-card mb-4">
            <div class="card-body">
                <div class="row align-items-center g-3">
                    <div class="col-lg-8">
                        <span class="admin-eyebrow">Administrator</span>
                        <h1 class="admin-page-heading">Dashboard</h1>
                        <p class="admin-page-copy mb-0">
                            Manage website content, public updates, tourism entries, transparency pages, and user accounts from one console.
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <div class="admin-user-card">
                            <span>Signed in as</span>
                            <strong>{{ auth()->user()->name ?? 'Account' }}</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            @php
                $quickLinks = [
                    ['label' => 'Homepage Items', 'icon' => 'fa-house', 'url' => url('admin/home'), 'permission' => 'home'],
                    ['label' => 'News', 'icon' => 'fa-newspaper', 'url' => route('admin.newsandupdates.news.list'), 'permission' => 'news'],
                    ['label' => 'Tourism', 'icon' => 'fa-map-location-dot', 'url' => route('admin.tourism.bontocattractions'), 'permission' => 'tourism'],
                    ['label' => 'Careers', 'icon' => 'fa-briefcase', 'url' => route('admin.careers.jobvacancies'), 'permission' => 'careers'],
                    ['label' => 'Transparency', 'icon' => 'fa-scale-balanced', 'url' => route('admin.transparency.fdp-reports.index'), 'permission' => 'transparency'],
                    ['label' => 'Government', 'icon' => 'fa-landmark', 'url' => route('admin.government.officials.index'), 'permission' => 'government'],
                    ['label' => 'Users', 'icon' => 'fa-users-gear', 'url' => route('admin.users.index'), 'permission' => null],
                    ['label' => 'Activity Logs', 'icon' => 'fa-clipboard-list', 'url' => route('admin.logs.index'), 'permission' => 'activity_logs'],
                ];
            @endphp

            @foreach($quickLinks as $link)
                @if($link['permission'] ? auth()->user()?->hasPermission($link['permission']) : auth()->user()?->isAdmin())
                    <div class="col-12 col-sm-6 col-xl-4">
                        <a class="card admin-shortcut-card" href="{{ $link['url'] }}">
                            <span class="admin-shortcut-icon"><i class="fas {{ $link['icon'] }}"></i></span>
                            <span class="admin-shortcut-label">{{ $link['label'] }}</span>
                            <span class="admin-shortcut-action">Open</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
