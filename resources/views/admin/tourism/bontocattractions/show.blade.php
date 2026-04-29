@extends('layouts.default')

@section('content')
    @php
        $tourismCategories = [
            'Tourist Attraction',
            'Culture and Heritage',
            'Food and Dining',
            'Accommodation',
            'Local Experience',
        ];
    @endphp

    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Tourism Destination</h2>
                <a href="{{ route('admin.tourism.bontocattractions') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            @if(!empty($bontocattraction->image_file))
                <img src="{{ url('uploads/'.$bontocattraction->image_file) }}" class="mb-3" alt="{{ $bontocattraction->title }}" style="max-width: 360px; width: 100%; height: auto;">
            @endif
            <h4>{{ $bontocattraction->title }}</h4>
            <p class="text-muted"><strong>Category:</strong> {{ $bontocattraction->category ?? 'Uncategorized' }}</p>

            @if($bontocattraction->photos->isNotEmpty())
                <div class="d-flex flex-wrap gap-2 mb-3">
                    @foreach($bontocattraction->photos as $photo)
                        <img src="{{ url('uploads/'.$photo->image_file) }}" alt="{{ $bontocattraction->title }}" style="width: 128px; height: 96px; object-fit: cover;">
                    @endforeach
                </div>
            @endif

            <div class="siteorigin-widget-tinymce textwidget">
                {!! $bontocattraction->description !!}
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editAttractionModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.tourism.bontocattractions.delete', $bontocattraction->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editAttractionModal" tabindex="-1" aria-labelledby="editAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $bontocattraction->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAttractionModalLabel">Edit Tourism Destination</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $bontocattraction->title }}" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="">Select category</option>
                                    @foreach($tourismCategories as $category)
                                        <option value="{{ $category }}" @selected($bontocattraction->category === $category)>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Main Photo</label>
                                <input type="file" name="image_file" class="form-control" accept="image/*">
                                @include('admin.partials.image-upload-guideline', ['type' => 'tourism_main'])
                                @if(!empty($bontocattraction->image_file))
                                    <img src="{{ url('uploads/'.$bontocattraction->image_file) }}" class="mt-2" alt="{{ $bontocattraction->title }}" style="width: 96px; height: 72px; object-fit: cover;">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label>Additional Photos</label>
                                <input type="file" name="photos[]" class="form-control" accept="image/*" multiple>
                                @include('admin.partials.image-upload-guideline', ['type' => 'tourism_gallery'])

                                @if($bontocattraction->photos->isNotEmpty())
                                    <div class="d-flex flex-wrap gap-2 mt-2">
                                        @foreach($bontocattraction->photos as $photo)
                                            <div>
                                                <img src="{{ url('uploads/'.$photo->image_file) }}" alt="{{ $bontocattraction->title }}" style="width: 96px; height: 72px; object-fit: cover;">
                                                <a onclick="return confirm('Delete this photo?');" href="{{ route('admin.tourism.bontocattractions.photo.delete', $photo->id) }}" class="btn btn-danger btn-sm text-white mt-1 d-block">Delete</a>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $bontocattraction->description }}</textarea>
                            </div>
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
