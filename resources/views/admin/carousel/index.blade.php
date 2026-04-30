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

        <h5 class="card-title d-flex flex-wrap align-items-center justify-content-between gap-2">
            Homepage Carousel
            <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addCarouselModal">Add Slide</button>
        </h5>
        <p class="text-muted">Slides appear in the public homepage hero carousel. Use wide, clear landscape images with short text.</p>

        <div class="table-responsive">
            <table class="table table-light align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Sort</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" style="width: 120px; height: 68px; object-fit: cover;">
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 90) }}</td>
                            <td>{{ $item->sort_order }}</td>
                            <td>{{ $item->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editCarouselModal{{ $item->id }}">Edit</button>
                                <a onclick="return confirm('Delete this carousel slide?');" href="{{ route('admin.carousel.delete', $item->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No carousel slides have been added yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addCarouselModal" tabindex="-1" aria-labelledby="addCarouselModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('admin.carousel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addCarouselModalLabel">Add Carousel Slide</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('admin.carousel.partials.form', ['item' => null])
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($items as $item)
    <div class="modal fade" id="editCarouselModal{{ $item->id }}" tabindex="-1" aria-labelledby="editCarouselModalLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <form action="{{ route('admin.carousel.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCarouselModalLabel{{ $item->id }}">Edit Carousel Slide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @include('admin.carousel.partials.form', ['item' => $item])
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
@endsection
