@extends('layouts.default')

@section('content')
      <section class="section">
      <div class="row">
        <div class="col-lg-12">
          @include('layouts.partials.message')
          <div class="card">
            <div class="card-body">
              <a href="{{ route('admin.newsandupdates.news.list') }}" class="btn bg-success text-white" style="float: right;">Back to List</a>
              <h5 class="card-title">Edit News</h5>
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-12">
                  <label class="form-label">Title *</label>
                  <input type="text" class="form-control" name="title" value="{{ old('title', optional($news)->title) }}" required="">
                  </div>
                <div class="col-12">
                  <label class="form-label">Image *</label>
                    <input type="file" class="form-control" name="image_file"><br>
                    @if(optional($news)->image_file)
                    <img src="{{ url('uploads/'.$news->image_file) }}" width="100" height="100" />
                    @endif
                </div>
                <div class="col-12">
                  <label class="form-label">Description *</label>
                    <textarea class="form-control" name="description">{{ old('description', optional($news)->description) }}</textarea>
                </div><hr>
                <div class="col-md-3" style="margin-bottom: 10px;">
                  <label class="form-label text-black">Date Posted *</label>
                  <input type="date" name="date_posted" value="{{ old('date_posted', optional($news)->date_posted) }}" class="form-control" required="">
                </div>
                <div class="col-12" style="margin-top: 30px;">
                  <label for="inputPassword4" class="form-label">Status *</label>
                  <select class="form-control" name="status" required="">
                    <option value="1" @selected(old('status', optional($news)->status) == 1)>Yes</option>
                    <option value="0" @selected(old('status', optional($news)->status) == 0)>No</option>
                  </select>
                </div>
                <div class="col-12" style="margin-top: 30px;" >
                  <button type="submit" class="btn bg-success text-white">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
