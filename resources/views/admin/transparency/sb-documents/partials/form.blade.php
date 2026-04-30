@php
    $document = $document ?? null;
@endphp

<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="{{ old('title', optional($document)->title) }}" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Document Number</label>
        <input type="text" name="document_number" value="{{ old('document_number', optional($document)->document_number) }}" class="form-control" placeholder="SB Resolution No. 2026-001">
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-3">
        <label class="form-label">Approved Date</label>
        <input type="date" name="approved_date" value="{{ old('approved_date', optional(optional($document)->approved_date)->format('Y-m-d')) }}" class="form-control">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Archive Year</label>
        <input type="number" name="year" value="{{ old('year', optional($document)->year) }}" class="form-control" min="1900" max="2100" placeholder="{{ date('Y') }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>
        <input type="text" name="status" value="{{ old('status', optional($document)->status ?? 'Approved') }}" class="form-control" placeholder="Approved">
    </div>
</div>

<div class="form-group mb-3">
    <label class="form-label">Summary / Description</label>
    <textarea name="description" class="form-control">{{ old('description', optional($document)->description) }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Upload File</label>
        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
        @if(optional($document)->file_url)
            <small class="text-muted d-block mt-1">Current file: <a href="{{ $document->file_url }}" target="_blank" rel="noopener">{{ $document->file_name ?? 'View file' }}</a></small>
        @endif
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', optional($document)->sort_order ?? 0) }}" class="form-control" min="0">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">Published</label>
        <select name="is_published" class="form-control" required>
            <option value="1" @selected(old('is_published', optional($document)->is_published ?? true) == 1)>Yes</option>
            <option value="0" @selected(old('is_published', optional($document)->is_published ?? true) == 0)>No</option>
        </select>
    </div>
</div>
