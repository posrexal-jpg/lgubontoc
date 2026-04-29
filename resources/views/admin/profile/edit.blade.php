@extends('layouts.default')

@section('content')
<div class="row g-4">
    <div class="col-lg-4">
        <div class="app-card shadow-sm p-4 text-center h-100">
            <img class="admin-profile-avatar mb-3" src="{{ $user->profile_picture_url }}" alt="{{ $user->name }} profile picture">
            <h1 class="app-page-title mb-1">{{ $user->name }}</h1>
            <p class="text-muted mb-2">{{ $user->email }}</p>
            <span class="badge bg-{{ $user->role === 'admin' ? 'success' : 'secondary' }}">
                {{ $user->role === 'admin' ? 'Administrator' : 'Content Creator' }}
            </span>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="app-card shadow-sm p-4 mb-4">
            <h2 class="mb-3">Profile Information</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*">
                        @include('admin.partials.image-upload-guideline', ['type' => 'profile'])
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Save Profile</button>
            </form>
        </div>

        <div class="app-card shadow-sm p-4">
            <h2 class="mb-3">Change Password</h2>
            <form action="{{ route('admin.profile.password') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Change Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
