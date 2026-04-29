@extends('layouts.default')

@section('content')
      <section class="section">
      <div class="row">
        <div class="col-lg-12">
          @include('layouts.partials.message')
          <div class="card">
            <div class="card-body">
              <a href="{{ url('admin/home') }}" class="btn bg-success text-white" style="float: right;">Back to List</a>
              <h5 class="card-title">Add</h5>
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-12">
                  <label class="form-label">Title <span style="color: red"> *</span></label>
                  <input type="text" class="form-control" name="title" value="">
                  </div>
                <div class="col-12">
                  <label class="form-label">Image <span style="color: red"> *</span></label>
                    <input type="file" class="form-control" name="image"><br>                  
                </div>
                <div class="col-12">
                  <label class="form-label">Description <span style="color: red"> *</span></label>
                    <textarea class="form-control" name="description" value=""></textarea>
                </div><hr>
                <div class="col-md-3" style="margin-bottom: 10px;">
                  <label class="form-label text-black">Date Posted <span style="color: red"> *</span></label>
                  <input type="date" name="date_posted" value="" class="form-control">
                </div>
                <div class="col-12" style="margin-top: 30px;" >
                  <button type="submit" class="btn bg-success text-white">Submit</button>
                  <button type="submit" class="btn bg-success text-white">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection