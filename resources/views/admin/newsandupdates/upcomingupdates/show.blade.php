@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Upcoming Update</h2>
                <a href="{{ route('admin.newsandupdates.upcomingupdates.list') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            @if($upcomingupdates->image_file)
                <img src="{{ url('uploads/'.$upcomingupdates->image_file) }}" class="mb-3" style="max-width: 240px;">
            @endif
            <h4>{{ $upcomingupdates->title }}</h4>
            <p><strong>Date Posted:</strong> {{ $upcomingupdates->date_posted }} | <strong>Status:</strong> {{ $upcomingupdates->status ? 'Yes' : 'No' }}</p>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $upcomingupdates->description !!}
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.newsandupdates.upcomingupdates.edit', $upcomingupdates->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/newsandupdates/upcomingupdates/delete/'.$upcomingupdates->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>
    </div>
@endsection
