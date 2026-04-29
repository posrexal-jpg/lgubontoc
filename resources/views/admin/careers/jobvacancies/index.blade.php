@extends('layouts.default')

@section('content')
    <div class="container">
        @include('layouts.partials.message')

        <form method="POST" action="{{ route('admin.careers.jobvacancies.add') }}">
            @csrf
            <input type="hidden" name="id" value="{{ optional($jobvacancy)->id }}">

            <div class="row card p-5">
                <div class="bg-light p-5 rounded">
                    <h2>{{ $jobvacancy ? 'Edit Job Vacancy' : 'Add Job Vacancy' }}</h2>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" value="{{ old('title', optional($jobvacancy)->title) }}" class="form-control" placeholder="Title" required>
                    </div><br>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="myTextarea" name="description" style="width: 100%;">{{ old('description', optional($jobvacancy)->description) }}</textarea>
                    </div><br>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        @if($jobvacancy)
                            <a href="{{ route('admin.careers.jobvacancies') }}" class="btn btn-secondary btn-sm">Cancel</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>

        <div class="card p-4 mt-4">
            <h5>Job Vacancies</h5>
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobvacancies as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{!! $value->description !!}</td>
                            <td>
                                <a href="{{ route('admin.careers.jobvacancies.edit', $value->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.careers.jobvacancies.delete', $value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No job vacancies yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
