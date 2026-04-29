@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Add Barangay</h5><br>
        <form action="{{ url('admin/barangays/add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Barangay Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Barangay Captain</label>
                    <input type="text" name="captain" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label>Area (hectares or sq km)</label>
                    <input type="text" name="area" class="form-control" placeholder="e.g. 12.5 ha">
                </div>
                <div class="col-md-6 form-group">
                    <label>Population</label>
                    <input type="text" name="population" class="form-control" placeholder="e.g. 1,234">
                </div>
                <div class="col-md-6 form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
                <div class="col-12 form-group">
                    <label>Description</label>
                    <textarea name="description" rows="4" class="form-control"></textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" checked>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save Barangay</button>
            <a href="{{ url('admin/barangays') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
