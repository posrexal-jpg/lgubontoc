@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Announcement</h2>
                <a href="{{ route('admin.newsandupdates.upcomingupdates.list') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            @if($upcomingupdates->image_file)
                <img src="{{ url('uploads/'.$upcomingupdates->image_file) }}" class="mb-3" style="max-width: 240px;">
            @endif
            <h4>{{ $upcomingupdates->title }}</h4>
            <p>
                <strong>Category:</strong> {{ $upcomingupdates->category ?? 'Announcement' }} |
                <strong>Author:</strong> {{ $upcomingupdates->author ?? 'Bontoc LGU' }} |
                <strong>Date Posted:</strong> {{ $upcomingupdates->date_posted }} |
                <strong>Is Published:</strong> {{ $upcomingupdates->status ? 'Yes' : 'No' }}
            </p>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $upcomingupdates->description !!}
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editUpcomingModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/newsandupdates/upcomingupdates/delete/'.$upcomingupdates->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editUpcomingModal" tabindex="-1" aria-labelledby="editUpcomingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ route('admin.newsandupdates.upcomingupdates.edit.update', $upcomingupdates->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUpcomingModalLabel">Edit Announcement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $upcomingupdates->title }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Announcement Category</label>
                                    <input type="text" class="form-control" name="category" value="{{ $upcomingupdates->category ?? 'Announcement' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Author</label>
                                    <input type="text" class="form-control" name="author" value="{{ $upcomingupdates->author ?? 'Bontoc LGU' }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image_file">
                                @include('admin.partials.image-upload-guideline', ['type' => 'announcement'])
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $upcomingupdates->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date Posted</label>
                                <input type="date" name="date_posted" value="{{ $upcomingupdates->date_posted }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Is Published</label>
                                <select class="form-control" name="status" required>
                                    <option value="1" @selected($upcomingupdates->status == 1)>Yes</option>
                                    <option value="0" @selected($upcomingupdates->status == 0)>No</option>
                                </select>
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
