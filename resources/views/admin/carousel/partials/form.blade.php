<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', optional($item)->title) }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Carousel Image</label>
    <input type="file" name="image" class="form-control" accept="image/*" @if(! $item) required @endif>
    @include('admin.partials.image-upload-guideline', ['type' => 'carousel'])
    @if($item && $item->image)
        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="mt-2" style="width: 180px; height: 100px; object-fit: cover;">
    @endif
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control" rows="4">{{ old('description', optional($item)->description) }}</textarea>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', optional($item)->sort_order ?? 0) }}" min="0">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Active</label>
        <select name="active" class="form-control" required>
            <option value="1" @selected(old('active', optional($item)->active ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('active', optional($item)->active ?? 1) == 0)>No</option>
        </select>
    </div>
</div>
