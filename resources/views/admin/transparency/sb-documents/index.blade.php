@extends('layouts.default')

@section('content')
<div class="container">
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

    <div class="card p-4">
        <h5 class="card-title">
            Browse {{ $heading }}
            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addSbDocumentModal">
                Add {{ $heading }}
            </button>
        </h5>

        <table class="table table-light align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Document</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $document)
                    <tr>
                        <td>{{ $documents->firstItem() + $loop->index }}</td>
                        <td>
                            <strong>{{ $document->title }}</strong>
                            @if($document->document_number)
                                <div class="text-muted small">{{ $document->document_number }}</div>
                            @endif
                            @if($document->description)
                                <div class="text-muted small">{{ \Illuminate\Support\Str::limit(strip_tags($document->description), 120) }}</div>
                            @endif
                        </td>
                        <td>{{ $document->year ?: 'Not set' }}</td>
                        <td>{{ $document->status ?: 'Approved' }}</td>
                        <td>
                            @if($document->file_url)
                                <a href="{{ $document->file_url }}" target="_blank" rel="noopener">{{ $document->file_name ?? 'View file' }}</a>
                            @else
                                <span class="text-muted">No file</span>
                            @endif
                        </td>
                        <td>{{ $document->is_published ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route($routes['show'], $document->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editSbDocumentModal{{ $document->id }}">Edit</button>
                            <a onclick="return confirm('Delete this SB document?');" href="{{ route($routes['delete'], $document->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No records have been added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $documents->links() }}
    </div>
</div>

<div class="modal fade" id="addSbDocumentModal" tabindex="-1" aria-labelledby="addSbDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route($routes['save']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addSbDocumentModalLabel">Add {{ $heading }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.transparency.sb-documents.partials.form', ['document' => null])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($documents as $document)
    <div class="modal fade" id="editSbDocumentModal{{ $document->id }}" tabindex="-1" aria-labelledby="editSbDocumentModalLabel{{ $document->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route($routes['save']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $document->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSbDocumentModalLabel{{ $document->id }}">Edit {{ $heading }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.transparency.sb-documents.partials.form', ['document' => $document])
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
