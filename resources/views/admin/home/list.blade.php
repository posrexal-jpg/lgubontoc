@extends('layouts.default')

@section('content')
    <div class="container">
      @include('layouts.partials.message')

      <div class="card p-4 mb-4">
        <h5 class="card-title">Homepage Hero Content</h5>
        <p class="text-muted">Edit the main homepage title, description, buttons, and quick facts shown over the hero banner.</p>
        <form action="{{ route('admin.home.hero.update') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-4 mb-3">
              <label class="form-label">Eyebrow</label>
              <input type="text" name="eyebrow" class="form-control" value="{{ old('eyebrow', $heroSetting->eyebrow) }}">
            </div>
            <div class="col-md-8 mb-3">
              <label class="form-label">Main Title</label>
              <input type="text" name="title" class="form-control" value="{{ old('title', $heroSetting->title) }}" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $heroSetting->description) }}</textarea>
          </div>
          <div class="row">
            <div class="col-md-3 mb-3">
              <label class="form-label">Primary Button Label</label>
              <input type="text" name="primary_button_label" class="form-control" value="{{ old('primary_button_label', $heroSetting->primary_button_label) }}">
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Primary Button URL</label>
              <input type="text" name="primary_button_url" class="form-control" value="{{ old('primary_button_url', $heroSetting->primary_button_url) }}">
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Secondary Button Label</label>
              <input type="text" name="secondary_button_label" class="form-control" value="{{ old('secondary_button_label', $heroSetting->secondary_button_label) }}">
            </div>
            <div class="col-md-3 mb-3">
              <label class="form-label">Secondary Button URL</label>
              <input type="text" name="secondary_button_url" class="form-control" value="{{ old('secondary_button_url', $heroSetting->secondary_button_url) }}">
            </div>
          </div>
          <div class="row">
            @for($i = 1; $i <= 3; $i++)
              <div class="col-md-4 mb-3">
                <label class="form-label">Quick Fact {{ $i }} Title</label>
                <input type="text" name="fact_{{ $i }}_title" class="form-control" value="{{ old('fact_'.$i.'_title', $heroSetting->{'fact_'.$i.'_title'}) }}">
                <label class="form-label mt-2">Quick Fact {{ $i }} Text</label>
                <input type="text" name="fact_{{ $i }}_text" class="form-control" value="{{ old('fact_'.$i.'_text', $heroSetting->{'fact_'.$i.'_text'}) }}">
              </div>
            @endfor
          </div>
          <button type="submit" class="btn btn-primary">Save Hero Content</button>
        </form>
      </div>

      <form>
            <div class="card-body">
              <h5 class="card-title">
                Homepage News & Featured Items
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addHomeModal">Add Homepage Item</button>
              </h5>
              <p class="text-muted">These records appear on the public homepage under Latest News & Announcements. This page does not control the homepage hero banner.</p><br>
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
              <h5 class="modal-title" id="addHomeModalLabel">Add Homepage Item</h5>
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
                @include('admin.partials.image-upload-guideline', ['type' => 'homepage'])
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
                <h5 class="modal-title" id="editHomeModalLabel{{ $value->id }}">Edit Homepage Item</h5>
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
                  @include('admin.partials.image-upload-guideline', ['type' => 'homepage'])
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
