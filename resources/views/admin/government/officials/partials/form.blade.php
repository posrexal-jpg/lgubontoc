<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Section</label>
        <select name="category" class="form-control" required>
            @foreach($categories as $value => $label)
                <option value="{{ $value }}" @selected(old('category', optional($official)->category ?? $selectedCategory) === $value)>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Position</label>
        <input type="text" name="position" class="form-control" value="{{ old('position', optional($official)->position) }}" required>
    </div>

    <div class="col-md-8">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', optional($official)->name) }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', optional($official)->sort_order ?? 0) }}" min="0">
    </div>

    <div class="col-md-8">
        <label class="form-label">Photo</label>
        <input type="file" name="photo" class="form-control" accept="image/*">
        @include('admin.partials.image-upload-guideline', ['type' => 'official'])
        @if($official && $official->photo)
            <img src="{{ $official->photo_url }}" class="mt-2" alt="{{ $official->name }}" style="width: 96px; height: 96px; object-fit: cover;">
        @endif
    </div>

    <div class="col-md-4">
        <label class="form-label">Is Published</label>
        <select name="is_published" class="form-control" required>
            <option value="1" @selected(old('is_published', optional($official)->is_published ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('is_published', optional($official)->is_published ?? 1) == 0)>No</option>
        </select>
    </div>

    <div class="col-md-12">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description', optional($official)->description) }}</textarea>
    </div>
</div>
