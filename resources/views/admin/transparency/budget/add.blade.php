@extends('layouts.default')

@section('content')
<div class="container">
    <div class="card p-4">
        @include('layouts.partials.message')
        <h5 class="card-title">Add Budget Document</h5><br>
        <form action="{{ url('admin/transparency/budget/add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8 form-group">
                    <label>Document Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="col-md-4 form-group">
                    <label>Year <span class="text-danger">*</span></label>
                    <input type="text" name="year" class="form-control" value="{{ date('Y') }}" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Category <span class="text-danger">*</span></label>
                    <select name="category" class="form-control" required>
                        <option value="annual-budget">Annual Budget</option>
                        <option value="financial-report">Financial Report</option>
                        <option value="disbursement">Disbursement</option>
                        <option value="procurement">Procurement</option>
                        <option value="audit-report">Audit Report</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label>Upload Document (PDF)</label>
                    <input type="file" name="document_file" class="form-control-file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                </div>
                <div class="col-12 form-group">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-12 form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="active" name="active" checked>
                        <label class="custom-control-label" for="active">Active (visible on public site)</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save Document</button>
            <a href="{{ url('admin/transparency/budget') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
