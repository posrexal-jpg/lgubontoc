@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card-body">
        @include('layouts.partials.message')

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

        <h5 class="card-title">
            Government Officials
            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addOfficialModal">Add Official</button>
        </h5>

        <form method="GET" action="{{ route('admin.government.officials.index') }}" class="mb-3" style="max-width: 320px;">
            <label class="form-label">Filter by Section</label>
            <select name="category" class="form-control" onchange="this.form.submit()">
                <option value="">All Sections</option>
                @foreach($categories as $value => $label)
                    <option value="{{ $value }}" @selected($selectedCategory === $value)>{{ $label }}</option>
                @endforeach
            </select>
        </form>

        <table class="table table-light">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Section</th>
                    <th>Order</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($officials as $official)
                    <tr>
                        <td>{{ $officials->firstItem() + $loop->index }}</td>
                        <td><img src="{{ $official->photo_url }}" alt="{{ $official->name }}" style="width: 56px; height: 56px;"></td>
                        <td>{{ $official->name }}</td>
                        <td>{{ $official->position }}</td>
                        <td>{{ $categories[$official->category] ?? $official->category }}</td>
                        <td>{{ $official->sort_order }}</td>
                        <td>{{ $official->is_published ? 'Yes' : 'No' }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editOfficialModal{{ $official->id }}">Edit</button>
                            <a onclick="return confirm('Delete this official?');" href="{{ route('admin.government.officials.delete', $official->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No government officials have been added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $officials->links() }}
    </div>
</div>

<div class="modal fade" id="addOfficialModal" tabindex="-1" aria-labelledby="addOfficialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('admin.government.officials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addOfficialModalLabel">Add Government Official</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.government.officials.partials.form', ['official' => null])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($officials as $official)
    <div class="modal fade" id="editOfficialModal{{ $official->id }}" tabindex="-1" aria-labelledby="editOfficialModalLabel{{ $official->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.government.officials.update', $official->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editOfficialModalLabel{{ $official->id }}">Edit Government Official</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.government.officials.partials.form', ['official' => $official])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
