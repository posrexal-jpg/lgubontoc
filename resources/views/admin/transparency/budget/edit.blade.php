@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Edit Budget Document</h5><br>
        <form action="{{ url('admin/transparency/budget/edit/'.$document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8 form-group">
                    <label>Document Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ $document->title }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Year <span class="text-danger">*</span></label>
                    <input type="text" name="year" class="form-control" value="{{ $document->year }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                        <option value="annual-budget" {{ $document->category === 'annual-budget' ? 'selected' : '' }}>Annual Budget</option>
                        <option value="financial-report" {{ $document->category === 'financial-report' ? 'selected' : '' }}>Financial Report</option>
                        <option value="disbursement" {{ $document->category === 'disbursement' ? 'selected' : '' }}>Disbursement</option>
                        <option value="procurement" {{ $document->category === 'procurement' ? 'selected' : '' }}>Procurement</option>
                        <option value="audit-report" {{ $document->category === 'audit-report' ? 'selected' : '' }}>Audit Report</option>
                        <option value="other" {{ $document->category === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Upload New Document</label>
                    @if($document->file_path)
                        <div class="mb-1"><small class="text-muted">Current: <a href="{{ asset($document->file_path) }}" target="_blank">View file</a></small></div>
                    @endif
                    <input type="file" name="document_file" class="form-control-file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                </div>
                <div class="col-12 form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control">{{ $document->description }}</textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" {{ $document->active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Document</button>
            <a href="{{ url('admin/transparency/budget') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
