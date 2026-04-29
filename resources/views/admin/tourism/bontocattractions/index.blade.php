@extends('layouts.default')

@section('content')
    <div class="container">
        @include('layouts.partials.message')

        <div class="card p-4">
            <h5 class="card-title">
                Browse Bontoc Attractions
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addAttractionModal">
                    Add Bontoc Attraction
                </button>
            </h5>
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
                    @forelse($bontocattractions as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{!! $value->description !!}</td>
                            <td>
                                <a href="{{ route('admin.tourism.bontocattractions.show', $value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editAttractionModal{{ $value->id }}">Edit</button>
                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route('admin.tourism.bontocattractions.delete', $value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No attractions yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addAttractionModal" tabindex="-1" aria-labelledby="addAttractionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAttractionModalLabel">Add Bontoc Attraction</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
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

        @foreach($bontocattractions as $value)
            <div class="modal fade" id="editAttractionModal{{ $value->id }}" tabindex="-1" aria-labelledby="editAttractionModalLabel{{ $value->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('admin.tourism.bontocattractions.add') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAttractionModalLabel{{ $value->id }}">Edit Bontoc Attraction</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $value->title }}" class="form-control" placeholder="Title" required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $value->description }}</textarea>
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
        @endforeach
    </div>
@endsection
