@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read News</h2>
                <a href="{{ route('admin.newsandupdates.news.list') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            @if($news->image_file)
                <img src="{{ url('uploads/'.$news->image_file) }}" class="mb-3" style="max-width: 240px;">
            @endif
            <h4>{{ $news->title }}</h4>
            <p>
                <strong>Category:</strong> {{ $news->category ?? 'Municipal News' }} |
                <strong>Author:</strong> {{ $news->author ?? 'Bontoc LGU' }} |
                <strong>Date Posted:</strong> {{ $news->date_posted }} |
                <strong>Is Published:</strong> {{ $news->status ? 'Yes' : 'No' }}
            </p>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $news->description !!}
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editNewsModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/newsandupdates/news/delete/'.$news->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ route('admin.newsandupdates.news.edit.update', $news->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="editNewsModalLabel">Edit News</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">News Category</label>
                                    <input type="text" class="form-control" name="category" value="{{ $news->category ?? 'Municipal News' }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Author</label>
                                    <input type="text" class="form-control" name="author" value="{{ $news->author ?? 'Bontoc LGU' }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image_file">
                                @include('admin.partials.image-upload-guideline', ['type' => 'news'])
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description">{{ $news->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date Posted</label>
                                <input type="date" name="date_posted" value="{{ $news->date_posted }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Is Published</label>
                                <select class="form-control" name="status" required>
                                    <option value="1" @selected($news->status == 1)>Yes</option>
                                    <option value="0" @selected($news->status == 0)>No</option>
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
