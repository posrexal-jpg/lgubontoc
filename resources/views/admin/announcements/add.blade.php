@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Add Announcement</h5><br>
        <form action="{{ url('admin/announcements/add') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-control" required>
                        <option value="announcement">Announcement</option>
                        <option value="advisory">Advisory</option>
                        <option value="notice">Notice</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Date Posted <span class="text-danger">*</span></label>
                    <input type="date" name="date_posted" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="col-12 form-group">
                    <label>Content <span class="text-danger">*</span></label>
                    <textarea name="content" rows="6" class="form-control" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save Announcement</button>
            <a href="{{ url('admin/announcements') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
