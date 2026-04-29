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
                <a href="{{ route('admin.tourism.bontocattractions.edit', $bontocattraction->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.tourism.bontocattractions.delete', $bontocattraction->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>
    </div>
@endsection
