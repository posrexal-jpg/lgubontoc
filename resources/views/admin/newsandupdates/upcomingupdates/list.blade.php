@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card-body">
            @include('layouts.partials.message')
            <h5 class="card-title">
                Browse Announcements
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addUpcomingModal">Add Announcement</button>
            </h5>
            <p>Description</p><br>
            <table class="table table-light">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Description</th>
                    <th scope="col">Is Published</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($upcomingupdates as $value)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <th scope="row"></th>
                    <td>
                        @if($value->image_file)
                            <img src="{{ url('uploads/'.$value->image_file) }}" style="height: 50px; width: 50px;">
                        @endif
                    </td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->category ?? 'Announcement' }}</td>
                    <td>{{ $value->author ?? 'Bontoc LGU' }}</td>
                    <td>{!! $value->description !!}</td>
                    <td>{{ $value->status ? 'Yes' : 'No' }}</td>
                    <td>{{ $value->date_posted }}</td>
                    <td></td>
                    <td>
                      <a href="{{ route('admin.newsandupdates.upcomingupdates.show', $value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                      <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editUpcomingModal{{ $value->id }}">Edit</button>
                      <a onclick="return confirm('Are you sure you want to delete records?');" href="{{ url('admin/newsandupdates/upcomingupdates/delete/'.$value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $upcomingupdates->links() }}
            <br><br>
        </div>

        <div class="modal fade" id="addUpcomingModal" tabindex="-1" aria-labelledby="addUpcomingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ route('admin.newsandupdates.upcomingupdates.insert') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h5 class="modal-title" id="addUpcomingModalLabel">Add Announcement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Announcement Category</label>
                                    <input type="text" class="form-control" name="category" value="Announcement" placeholder="Announcement">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Author</label>
                                    <input type="text" class="form-control" name="author" value="Bontoc LGU" placeholder="Bontoc LGU">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image_file">
                                @include('admin.partials.image-upload-guideline', ['type' => 'announcement'])
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date Posted</label>
                                <input type="date" name="date_posted" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Is Published</label>
                                <select class="form-control" name="status" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
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

        @foreach($upcomingupdates as $value)
            <div class="modal fade" id="editUpcomingModal{{ $value->id }}" tabindex="-1" aria-labelledby="editUpcomingModalLabel{{ $value->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <form action="{{ route('admin.newsandupdates.upcomingupdates.edit.update', $value->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-header">
                                <h5 class="modal-title" id="editUpcomingModalLabel{{ $value->id }}">Edit Announcement</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $value->title }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Announcement Category</label>
                                        <input type="text" class="form-control" name="category" value="{{ $value->category ?? 'Announcement' }}" placeholder="Announcement">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Author</label>
                                        <input type="text" class="form-control" name="author" value="{{ $value->author ?? 'Bontoc LGU' }}" placeholder="Bontoc LGU">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image_file">
                                    @include('admin.partials.image-upload-guideline', ['type' => 'announcement'])
                                    @if($value->image_file)
                                        <img src="{{ url('uploads/'.$value->image_file) }}" class="mt-2" style="height: 56px; width: 56px;">
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description">{{ $value->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date Posted</label>
                                    <input type="date" name="date_posted" value="{{ $value->date_posted }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Is Published</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" @selected($value->status == 1)>Yes</option>
                                        <option value="0" @selected($value->status == 0)>No</option>
                                    </select>
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
