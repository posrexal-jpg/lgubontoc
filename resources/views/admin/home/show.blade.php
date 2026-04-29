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
                <a href="{{ url('admin/home/edit/'.$getrecord->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ url('admin/home/delete/'.$getrecord->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>
    </div>
@endsection
