@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Read {{ $heading }}</h2>
            <a href="{{ route($routes['index']) }}" class="btn btn-secondary btn-sm">Back to Browse</a>
        </div>

        <h4>{{ $document->title }}</h4>
        <dl class="row">
            <dt class="col-md-3">Document Number</dt>
            <dd class="col-md-9">{{ $document->document_number ?: 'Not set' }}</dd>
            <dt class="col-md-3">Approved Date</dt>
            <dd class="col-md-9">{{ $document->approved_date ? $document->approved_date->format('F j, Y') : 'Not set' }}</dd>
            <dt class="col-md-3">Year</dt>
            <dd class="col-md-9">{{ $document->year ?: 'Not set' }}</dd>
            <dt class="col-md-3">Status</dt>
            <dd class="col-md-9">{{ $document->status ?: 'Approved' }}</dd>
            <dt class="col-md-3">File</dt>
            <dd class="col-md-9">
                @if($document->file_url)
                    <a href="{{ $document->file_url }}" target="_blank" rel="noopener">{{ $document->file_name ?? 'View file' }}</a>
                @else
                    No file uploaded
                @endif
            </dd>
        </dl>

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $document->description !!}
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editSbDocumentModal">Edit</button>
            <a onclick="return confirm('Delete this SB document?');" href="{{ route($routes['delete'], $document->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
        </div>
    </div>

    <div class="modal fade" id="editSbDocumentModal" tabindex="-1" aria-labelledby="editSbDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route($routes['save']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $document->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSbDocumentModalLabel">Edit {{ $heading }}</h5>
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
</div>
@endsection
