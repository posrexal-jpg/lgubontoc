@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Add Government Official</h5><br>
        <form action="{{ url('admin/government/officials/add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Position <span class="text-danger">*</span></label>
                    <input type="text" name="position" class="form-control" placeholder="e.g. Mayor, Vice Mayor, Councilor" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Office/Department</label>
                    <input type="text" name="office" class="form-control" placeholder="e.g. Elected Officials, Department Heads">
                </div>
                <div class="col-md-6 form-group">
                    <label>Contact Number</label>
                    <input type="text" name="contact" class="form-control">
                </div>
                <div class="col-md-6 form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="0">
                </div>
                <div class="col-md-6 form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control-file" accept="image/*">
                </div>
                <div class="col-12 form-group">
                    <label>Biography / Description</label>
                    <textarea name="bio" rows="4" class="form-control"></textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" checked>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save Official</button>
            <a href="{{ url('admin/government/officials') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
