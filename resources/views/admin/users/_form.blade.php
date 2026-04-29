@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Role</label>
        <select name="role" class="form-select" required>
            @php($selectedRole = old('role', $user->role ?? 'content_creator'))
            <option value="content_creator" @selected($selectedRole === 'content_creator')>Content Creator</option>
            <option value="admin" @selected($selectedRole === 'admin')>Administrator</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Password {{ isset($user) ? '(leave blank to keep current)' : '' }}</label>
        <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
    </div>

    <div class="col-md-6">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
    </div>
</div>

<div class="mt-4">
    <h5>Content Creator Access</h5>
    <p class="text-muted mb-3">Administrators automatically receive access to all modules. For content creators, select only the modules they can manage.</p>

    @php($selectedPermissions = old('permissions', $user->permissions ?? []))
    <div class="row">
        @foreach($permissions as $key => $label)
            <div class="col-md-4 mb-2">
                <label class="form-check">
                    <input type="checkbox" name="permissions[]" value="{{ $key }}" class="form-check-input" @checked(in_array($key, $selectedPermissions, true) || in_array('*', $selectedPermissions, true))>
                    <span class="form-check-label">{{ $label }}</span>
                </label>
            </div>
        @endforeach
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger mt-4">
        <strong>Please fix the following:</strong>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mt-4">
    <button type="submit" class="btn btn-primary">Save Account</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-light">Cancel</a>
</div>
