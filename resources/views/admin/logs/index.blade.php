@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-4 mb-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div>
                    <h5 class="card-title mb-1">Activity Log Reports</h5>
                    <p class="text-muted mb-0">Track administrator and content creator actions in the admin console.</p>
                </div>
            </div>

            <form method="GET" action="{{ route('admin.logs.index') }}" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="search" name="q" class="form-control" value="{{ $filters['q'] ?? '' }}" placeholder="Search user, email, action, URL">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" @selected(($filters['category'] ?? '') === $category)>{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="">All Roles</option>
                        @foreach($roles as $role)
                            <option value="{{ $role }}" @selected(($filters['role'] ?? '') === $role)>{{ $role === 'admin' ? 'Administrator' : 'Content Creator' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Action</label>
                    <select name="action" class="form-control">
                        <option value="">All Actions</option>
                        @foreach($actions as $action)
                            <option value="{{ $action }}" @selected(($filters['action'] ?? '') === $action)>{{ $action }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">From</label>
                    <input type="date" name="date_from" class="form-control" value="{{ $filters['date_from'] ?? '' }}">
                </div>

                <div class="col-md-2">
                    <label class="form-label">To</label>
                    <input type="date" name="date_to" class="form-control" value="{{ $filters['date_to'] ?? '' }}">
                </div>

                <div class="col-md-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <a href="{{ route('admin.logs.index') }}" class="btn btn-light">
                        <i class="fas fa-rotate-left"></i> Reset
                    </a>
                </div>
            </form>
        </div>

        <div class="row g-3 mb-4">
            @forelse($categoryCounts as $category => $total)
                <div class="col-md-3">
                    <a class="card p-3 h-100 text-decoration-none" href="{{ route('admin.logs.index', ['category' => $category]) }}">
                        <span class="text-muted small">Category</span>
                        <strong class="text-dark">{{ $category }}</strong>
                        <span class="text-success fw-bold">{{ $total }} log{{ $total == 1 ? '' : 's' }}</span>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="card p-3 text-muted">No log categories yet.</div>
                </div>
            @endforelse
        </div>

        <div class="card p-4">
            <div class="table-responsive">
                <table class="table table-light align-middle">
                    <thead>
                        <tr>
                            <th>Date/Time</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Category</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>IP Address</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logs as $log)
                            <tr>
                                <td>{{ $log->created_at?->format('M d, Y h:i A') }}</td>
                                <td>
                                    <strong>{{ $log->user_name ?? 'System' }}</strong>
                                    @if($log->user_email)
                                        <div class="text-muted small">{{ $log->user_email }}</div>
                                    @endif
                                </td>
                                <td>{{ $log->user_role === 'admin' ? 'Administrator' : ($log->user_role ? 'Content Creator' : 'Guest') }}</td>
                                <td>{{ $log->category }}</td>
                                <td><span class="badge bg-secondary">{{ $log->action }}</span></td>
                                <td>
                                    {{ $log->description }}
                                    @if($log->route_name)
                                        <div class="text-muted small">{{ $log->method }} {{ $log->route_name }}</div>
                                    @endif
                                </td>
                                <td>{{ $log->ip_address }}</td>
                                <td>{{ $log->status_code ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No activity logs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $logs->links() }}
        </div>
    </div>
@endsection
