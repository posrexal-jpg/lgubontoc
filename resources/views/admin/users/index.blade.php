@extends('layouts.default')

@section('content')
<div class="app-card app-card-settings shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="app-page-title mb-1">User Accounts</h1>
            <p class="text-muted mb-0">Create admin and content creator accounts with module-level access.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add Account</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Access</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role === 'admin' ? 'success' : 'secondary' }}">
                                {{ $user->role === 'admin' ? 'Administrator' : 'Content Creator' }}
                            </span>
                        </td>
                        <td>
                            @if($user->role === 'admin' || in_array('*', $user->permissions ?? [], true))
                                All modules
                            @else
                                {{ collect($user->permissions ?? [])->map(fn($key) => $permissions[$key] ?? $key)->implode(', ') ?: 'No access assigned' }}
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            @if(! auth()->user()->is($user))
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this account?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
