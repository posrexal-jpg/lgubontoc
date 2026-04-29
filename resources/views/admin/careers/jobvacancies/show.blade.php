@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Job Vacancy</h2>
                <a href="{{ route('admin.careers.jobvacancies') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            <h4>{{ $jobvacancy->title }}</h4>
            <div class="siteorigin-widget-tinymce textwidget">
                {!! $jobvacancy->description !!}
            </div>

            <div class="mt-4">
                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editJobVacancyModal">Edit</button>
                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.careers.jobvacancies.delete', $jobvacancy->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
            </div>
        </div>

        <div class="modal fade" id="editJobVacancyModal" tabindex="-1" aria-labelledby="editJobVacancyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.careers.jobvacancies.add') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $jobvacancy->id }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editJobVacancyModalLabel">Edit Job Vacancy</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $jobvacancy->title }}" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ $jobvacancy->description }}</textarea>
                            </div>
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
