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
        @include('layouts.partials.message')

        <div class="card p-4 mb-4">
            <h5 class="card-title">Tourism Hero</h5>
            <p class="text-muted mb-3">Upload the wide banner image used at the top of the public Tourism page.</p>

            <div class="row g-4 align-items-start">
                <div class="col-lg-6">
                    @if($tourismHero)
                        <img src="{{ $tourismHero->image_url }}" alt="{{ $tourismHero->title }}" class="img-fluid border" style="width: 100%; max-height: 260px; object-fit: cover;">
                    @else
                        <div class="text-muted p-4 border">No hero image uploaded yet.</div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('admin.tourism.hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $tourismHero->title ?? 'Tourism Hero') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hero Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @include('admin.partials.image-upload-guideline', ['type' => 'hero'])
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Is Active</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1" @selected(old('is_active', $tourismHero->is_active ?? true) == 1)>Yes</option>
                                <option value="0" @selected(old('is_active', $tourismHero->is_active ?? true) == 0)>No</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Tourism Hero</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card p-4">
            <h5 class="card-title">
                Manage Tourism Destinations
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addAttractionModal">
                    Add Destination
                </button>
            </h5>
            <p class="text-muted mb-3">Add tourism destinations with a category, image, and description. These records appear on the public Tourism page.</p>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bontocattractions as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if(!empty($value->image_file))
                                    <img src="{{ url('uploads/'.$value->image_file) }}" alt="{{ $value->title }}" style="width: 64px; height: 48px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->category ?? 'Uncategorized' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($value->description), 120) }}</td>
                            <td>
                                <a href="{{ route('admin.tourism.bontocattractions.show', $value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editAttractionModal{{ $value->id }}">Edit</button>
                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.tourism.bontocattractions.delete', $value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No tourism destinations yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addAttractionModal" tabindex="-1" aria-labelledby="addAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAttractionModalLabel">Add Tourism Destination</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="">Select category</option>
                                    @foreach($tourismCategories as $category)
                                        <option value="{{ $category }}" @selected(old('category') === $category)>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Main Photo</label>
                                <input type="file" name="image_file" class="form-control" accept="image/*">
                                @include('admin.partials.image-upload-guideline', ['type' => 'tourism_main'])
                            </div>
                            <div class="form-group mb-3">
                                <label>Additional Photos</label>
                                <input type="file" name="photos[]" class="form-control" accept="image/*" multiple>
                                @include('admin.partials.image-upload-guideline', ['type' => 'tourism_gallery'])
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
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

        @foreach($bontocattractions as $value)
            <div class="modal fade" id="editAttractionModal{{ $value->id }}" tabindex="-1" aria-labelledby="editAttractionModalLabel{{ $value->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAttractionModalLabel{{ $value->id }}">Edit Tourism Destination</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $value->title }}" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Select category</option>
                                        @foreach($tourismCategories as $category)
                                            <option value="{{ $category }}" @selected($value->category === $category)>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Main Photo</label>
                                    <input type="file" name="image_file" class="form-control" accept="image/*">
                                    @include('admin.partials.image-upload-guideline', ['type' => 'tourism_main'])
                                    @if(!empty($value->image_file))
                                        <img src="{{ url('uploads/'.$value->image_file) }}" class="mt-2" alt="{{ $value->title }}" style="width: 96px; height: 72px; object-fit: cover;">
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label>Additional Photos</label>
                                    <input type="file" name="photos[]" class="form-control" accept="image/*" multiple>
                                    @include('admin.partials.image-upload-guideline', ['type' => 'tourism_gallery'])

                                    @if($value->photos->isNotEmpty())
                                        <div class="d-flex flex-wrap gap-2 mt-2">
                                            @foreach($value->photos as $photo)
                                                <div class="position-relative">
                                                    <img src="{{ url('uploads/'.$photo->image_file) }}" alt="{{ $value->title }}" style="width: 96px; height: 72px; object-fit: cover;">
                                                    <a onclick="return confirm('Delete this photo?');" href="{{ route('admin.tourism.bontocattractions.photo.delete', $photo->id) }}" class="btn btn-danger btn-sm text-white mt-1 d-block">Delete</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $value->description }}</textarea>
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
        @endforeach
    </div>
@endsection
