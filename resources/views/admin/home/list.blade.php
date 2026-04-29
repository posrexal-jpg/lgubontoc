@extends('layouts.default')

@section('content')
    <div class="container">
      <form>
            <div class="card-body">
              @include('layouts.partials.message')
              <h5 class="card-title">
                Browse Home
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addHomeModal">Add Home</button>
              </h5>
              <p>Description</p><br>
              <table class="table table-light">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                    <th scope="col">Date Posted</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                    $count = 1;
                  @endphp
                  @foreach($getrecord as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <th scope="row"></th>
                    <td>
                      @if(!empty($value->image))
                        <img src="{{ url('public/home/'.$value->image) }}" style="height: 50px; width: 50px;">
                       @endif
                    </td>
                    <td>{{ $value->title }}</td>
                    <td>{!! $value->description !!}</td>
                    <td></td>
                    <td>{{ $value->date_posted }}</td>
                    <td></td>
                    <td>
                      <a href="{{ url('admin/home/read/'.$value->id) }}" class="btn btn-info btn-sm text-white">Read</a>
                      <button type="button" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editHomeModal{{ $value->id }}">Edit</button>
                      <a onclick="return confirm('Are you sure you want to delete records?');" href="{{ url('admin/home/delete/'.$value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table><br><br>
              </div>
              </form>
            </div>

    <div class="modal fade" id="addHomeModal" tabindex="-1" aria-labelledby="addHomeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <form action="{{ url('admin/home/add') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="addHomeModalLabel">Add Home</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description"></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Date Posted</label>
                <input type="date" name="date_posted" class="form-control">
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

    @foreach($getrecord as $value)
      <div class="modal fade" id="editHomeModal{{ $value->id }}" tabindex="-1" aria-labelledby="editHomeModalLabel{{ $value->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
          <div class="modal-content">
            <form action="{{ url('admin/home/edit/'.$value->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-header">
                <h5 class="modal-title" id="editHomeModalLabel{{ $value->id }}">Edit Home</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" value="{{ $value->title }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Image</label>
                  <input type="file" class="form-control" name="image">
                  @if(!empty($value->image))
                    <img src="{{ url('public/home/'.$value->image) }}" class="mt-2" style="height: 56px; width: 56px;">
                  @endif
                </div>
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea class="form-control" name="description">{{ $value->description }}</textarea>
                </div>
                <div class="mb-3">
                  <label class="form-label">Date Posted</label>
                  <input type="date" name="date_posted" value="{{ $value->date_posted }}" class="form-control">
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
@endsection
