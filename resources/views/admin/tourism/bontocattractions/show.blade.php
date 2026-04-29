@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Bontoc Attraction</h2>
                <a href="{{ route('admin.tourism.bontocattractions') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            <h4>{{ $bontocattraction->title }}</h4>
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
                    <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $bontocattraction->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editAttractionModalLabel">Edit Bontoc Attraction</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $bontocattraction->title }}" class="form-control" placeholder="Title" required>
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
