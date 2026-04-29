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
            <p><strong>Date Posted:</strong> {{ $news->date_posted }} | <strong>Status:</strong> {{ $news->status ? 'Yes' : 'No' }}</p>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $news->description !!}
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.newsandupdates.news.edit', $news->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/newsandupdates/news/delete/'.$news->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>
    </div>
@endsection
