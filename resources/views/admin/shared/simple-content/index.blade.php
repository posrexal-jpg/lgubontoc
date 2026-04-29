@extends('layouts.default')

@section('content')
    <div class="container">
        @include('layouts.partials.message')

        <div class="card p-4">
            <h5 class="card-title">
                Browse {{ $heading }}
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addContentModal">
                    Add {{ $heading }}
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
                    @forelse($items as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{!! $value->description !!}</td>
                            <td>
                                <a href="{{ route($routes['show'], $value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                                <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editContentModal{{ $value->id }}">Edit</button>
                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="{{ route($routes['delete'], $value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No records yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="addContentModal" tabindex="-1" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form method="POST" action="{{ route($routes['save']) }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContentModalLabel">Add {{ $heading }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                            @if($supportsMap ?? false)
                                <div class="form-group mt-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Municipal Hall, Bontoc, Southern Leyte">
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label>Latitude</label>
                                        <input type="number" step="0.0000001" name="latitude" value="{{ old('latitude') }}" class="form-control" placeholder="10.3556">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Longitude</label>
                                        <input type="number" step="0.0000001" name="longitude" value="{{ old('longitude') }}" class="form-control" placeholder="124.9697">
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Map Embed URL</label>
                                    <input type="url" name="map_embed_url" value="{{ old('map_embed_url') }}" class="form-control" placeholder="https://www.openstreetmap.org/export/embed.html?...">
                                    <small class="text-muted">Optional. If blank, the map will use the latitude and longitude above.</small>
                                </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach($items as $value)
            <div class="modal fade" id="editContentModal{{ $value->id }}" tabindex="-1" aria-labelledby="editContentModalLabel{{ $value->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="{{ route($routes['save']) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editContentModalLabel{{ $value->id }}">Edit {{ $heading }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title" value="{{ $value->title }}" class="form-control" placeholder="Title">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control">{{ $value->description }}</textarea>
                                </div>
                                @if($supportsMap ?? false)
                                    <div class="form-group mt-3">
                                        <label>Address</label>
                                        <input type="text" name="address" value="{{ old('address', $value->address) }}" class="form-control" placeholder="Municipal Hall, Bontoc, Southern Leyte">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <label>Latitude</label>
                                            <input type="number" step="0.0000001" name="latitude" value="{{ old('latitude', $value->latitude) }}" class="form-control" placeholder="10.3556">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Longitude</label>
                                            <input type="number" step="0.0000001" name="longitude" value="{{ old('longitude', $value->longitude) }}" class="form-control" placeholder="124.9697">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Map Embed URL</label>
                                        <input type="url" name="map_embed_url" value="{{ old('map_embed_url', $value->map_embed_url) }}" class="form-control" placeholder="https://www.openstreetmap.org/export/embed.html?...">
                                        <small class="text-muted">Optional. If blank, the map will use the latitude and longitude above.</small>
                                    </div>
                                @endif
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
