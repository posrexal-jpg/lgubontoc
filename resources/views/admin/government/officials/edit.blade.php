@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Edit Government Official</h5><br>
        <form action="{{ url('admin/government/officials/edit/'.$official->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ $official->name }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Position <span class="text-danger">*</span></label>
                    <input type="text" name="position" class="form-control" value="{{ $official->position }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Office/Department</label>
                    <input type="text" name="office" class="form-control" value="{{ $official->office }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control" value="{{ $official->contact }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ $official->sort_order }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Photo</label>
                    @if($official->photo)
                        <div class="mb-2"><img src="{{ url('uploads/'.$official->photo) }}" style="height:80px;width:80px;object-fit:cover;border-radius:50%;"></div>
                    @endif
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
                <div class="col-12 form-group">
                    <label>Biography / Description</label>
                    <textarea name="bio" rows="4" class="form-control">{{ $official->bio }}</textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" {{ $official->active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Official</button>
            <a href="{{ url('admin/government/officials') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
