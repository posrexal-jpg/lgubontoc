@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read {{ $heading }}</h2>
                <a href="{{ route($routes['index']) }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            <h4>{{ $item->title }}</h4>
            @if($supportsMissionVision ?? false)
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <h5>Mission</h5>
                            <div class="siteorigin-widget-tinymce textwidget">
                                {!! $item->mission ?: $item->description !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border rounded p-3 h-100">
                            <h5>Vision</h5>
                            <div class="siteorigin-widget-tinymce textwidget">
                                {!! $item->vision ?: $item->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="siteorigin-widget-tinymce textwidget">
                    {!! $item->description !!}
                </div>
            @endif

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editContentModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route($routes['delete'], $item->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editContentModal" tabindex="-1" aria-labelledby="editContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route($routes['save']) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editContentModalLabel">Edit {{ $heading }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $item->title }}" class="form-control" placeholder="Title">
                            </div>
                            @if($supportsMissionVision ?? false)
                                <div class="form-group mb-3">
                                    <label>Mission</label>
                                    <textarea name="mission" class="form-control">{{ old('mission', $item->mission ?: $item->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Vision</label>
                                    <textarea name="vision" class="form-control">{{ old('vision', $item->vision ?: $item->description) }}</textarea>
                                </div>
                            @else
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $item->description }}</textarea>
                                </div>
                            @endif
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
