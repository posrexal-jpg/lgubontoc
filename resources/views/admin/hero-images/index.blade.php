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

        <h5 class="card-title">Banners and Hero Images</h5>
        <p class="text-muted">Upload the public header banner and the main banner images used on the Homepage and Tourism pages.</p>

        <div class="row g-4">
            @foreach($pages as $pageKey => $label)
                @php($hero = $heroImages->get($pageKey))
                <div class="col-lg-6" id="{{ $pageKey }}">
                    <div class="app-card shadow-sm p-4 h-100">
                        <h2 class="mb-3">{{ $label }}</h2>

                        @if($hero)
                            <img src="{{ $hero->image_url }}" alt="{{ $hero->title }}" class="img-fluid mb-3" style="width: 100%; max-height: 260px; object-fit: cover;">
                        @else
                            <div class="text-muted mb-3 p-4 border">No hero image uploaded yet.</div>
                        @endif

                        <form action="{{ route('admin.hero-images.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="page_key" value="{{ $pageKey }}">

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $hero->title ?? $label.' Hero') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hero Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                                @if($pageKey === 'header_banner')
                                    @include('admin.partials.image-upload-guideline', ['type' => 'header_banner'])
                                @else
                                    @include('admin.partials.image-upload-guideline', ['type' => 'hero'])
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Is Active</label>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" @selected(old('is_active', $hero->is_active ?? true) == 1)>Yes</option>
                                    <option value="0" @selected(old('is_active', $hero->is_active ?? true) == 0)>No</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Save {{ $label }} Hero</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
