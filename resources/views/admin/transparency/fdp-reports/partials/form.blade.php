<div class="row g-3">
    <div class="col-md-12">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', optional($report)->title) }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Quarter</label>
        <select name="quarter" class="form-control">
            <option value="">Select period</option>
            @foreach($quarters as $value => $label)
                <option value="{{ $value }}" @selected(old('quarter', optional($report)->quarter) === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">Year</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', optional($report)->year ?? date('Y')) }}" min="1900" max="2100">
    </div>

    <div class="col-md-4">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', optional($report)->sort_order ?? 0) }}" min="0">
    </div>

    <div class="col-md-8">
        <label class="form-label">Report File</label>
        <input type="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
        @include('admin.partials.image-upload-guideline', ['type' => 'document_image'])
        @if($report && $report->file_url)
            <div class="small mt-2">
                Current file: <a href="{{ $report->file_url }}" target="_blank" rel="noopener">{{ $report->file_name ?? 'View file' }}</a>
            </div>
        @endif
    </div>

    <div class="col-md-4">
        <label class="form-label">Is Published</label>
        <select name="is_published" class="form-control" required>
            <option value="1" @selected(old('is_published', optional($report)->is_published ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('is_published', optional($report)->is_published ?? 1) == 0)>No</option>
        </select>
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', optional($report)->description) }}</textarea>
    </div>
</div>
