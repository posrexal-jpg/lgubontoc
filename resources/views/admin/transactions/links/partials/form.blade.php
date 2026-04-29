<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Submenu Title</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', optional($link)->title) }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Sort Order</label>
        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', optional($link)->sort_order ?? 0) }}" min="0">
    </div>

    <div class="col-md-12">
        <label class="form-label">URL</label>
        <input type="url" name="url" class="form-control" value="{{ old('url', optional($link)->url) }}" placeholder="https://example.com" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Open in New Tab</label>
        <select name="opens_new_tab" class="form-control" required>
            <option value="1" @selected(old('opens_new_tab', optional($link)->opens_new_tab ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('opens_new_tab', optional($link)->opens_new_tab ?? 1) == 0)>No</option>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Is Active</label>
        <select name="is_active" class="form-control" required>
            <option value="1" @selected(old('is_active', optional($link)->is_active ?? 1) == 1)>Yes</option>
            <option value="0" @selected(old('is_active', optional($link)->is_active ?? 1) == 0)>No</option>
        </select>
    </div>
</div>
