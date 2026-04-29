<div class="row g-3">
    <div class="col-md-12">
        <label class="form-label">Title of Form</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', optional($form)->title) }}" required>
    </div>

    <div class="col-md-12">
        <label class="form-label">Short Description</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description', optional($form)->description) }}</textarea>
    </div>

    <div class="col-md-8">
        <label class="form-label">Upload Form</label>
        <input type="file" name="form_file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png">
        <small class="text-muted d-block mt-1">Accepted files: PDF, Word, Excel, JPG, or PNG. Max file size: 10MB.</small>
        @if($form && $form->file_url)
            <div class="small mt-2">
                Current file: <a href="{{ $form->file_url }}" target="_blank" rel="noopener">{{ $form->file_name ?? 'View file' }}</a>
            </div>
        @endif
    </div>

    <div class="col-md-2">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', optional($form)->sort_order ?? 0) }}" min="0">
    </div>

    <div class="col-md-2">
        <label class="form-label">Is Published</label>
        <select name="is_published" class="form-control" required>
            <option value="1" @selected(old('is_published', optional($form)->is_published ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('is_published', optional($form)->is_published ?? 1) == 0)>No</option>
        </select>
    </div>
</div>
