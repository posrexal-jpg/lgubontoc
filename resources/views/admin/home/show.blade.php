@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Home</h2>
                <a href="{{ url('admin/home') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            @if(!empty($getrecord->image))
                <img src="{{ url('public/home/'.$getrecord->image) }}" class="mb-3" style="max-width: 240px;">
            @endif
            <h4>{{ $getrecord->title }}</h4>
            <p><strong>Date Posted:</strong> {{ $getrecord->date_posted }}</p>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $getrecord->description !!}
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editHomeModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/home/delete/'.$getrecord->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editHomeModal" tabindex="-1" aria-labelledby="editHomeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ url('admin/home/edit/'.$getrecord->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="editHomeModalLabel">Edit Home</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $getrecord->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image">
                                @include('admin.partials.image-upload-guideline', ['type' => 'homepage'])
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $getrecord->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date Posted</label>
                                <input type="date" name="date_posted" value="{{ $getrecord->date_posted }}" class="form-control">
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
