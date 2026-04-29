@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Edit Barangay</h5><br>
        <form action="{{ url('admin/barangays/edit/'.$barangay->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Barangay Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ $barangay->name }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Barangay Captain</label>
                    <input type="text" name="captain" class="form-control" value="{{ $barangay->captain }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Area</label>
                    <input type="text" name="area" class="form-control" value="{{ $barangay->area }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Population</label>
                    <input type="text" name="population" class="form-control" value="{{ $barangay->population }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>Photo</label>
                    @if($barangay->photo)
                        <div class="mb-2"><img src="{{ url('uploads/'.$barangay->photo) }}" style="height:60px;border-radius:4px;"></div>
                    @endif
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
                <div class="col-12 form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" class="form-control">{{ $barangay->description }}</textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" {{ $barangay->active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Barangay</button>
            <a href="{{ url('admin/barangays') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
