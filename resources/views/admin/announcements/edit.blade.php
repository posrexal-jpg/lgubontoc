@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Edit Announcement</h5><br>
        <form action="{{ url('admin/announcements/edit/'.$announcement->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ $announcement->title }}" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Type</label>
                    <select name="type" class="form-control">
                        <option value="announcement" {{ $announcement->type === 'announcement' ? 'selected' : '' }}>Announcement</option>
                        <option value="advisory" {{ $announcement->type === 'advisory' ? 'selected' : '' }}>Advisory</option>
                        <option value="notice" {{ $announcement->type === 'notice' ? 'selected' : '' }}>Notice</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Date Posted</label>
                    <input type="date" name="date_posted" class="form-control" value="{{ $announcement->date_posted }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ $announcement->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $announcement->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-12 form-group">
                    <label>Content</label>
                    <textarea name="content" rows="6" class="form-control">{{ $announcement->content }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Announcement</button>
            <a href="{{ url('admin/announcements') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
