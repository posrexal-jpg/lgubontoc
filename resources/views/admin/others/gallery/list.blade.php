@extends('layouts.default')

@section('content')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          @include('layouts.partials.message')
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">
                Gallery List
                <a href="{{ url('/others/gallery/') }}" class="btn btn-success" style="float: right; margin-top: 5px;">Add New</a>
              </h5>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">1</td>
                    <td>title</td>
                    <td>image</td>
                    <td>
                      <a href="" class="btn btn-success btn-sm">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete records?');" href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  
                  <tr>
                    <td colspan="100%">Records not found.</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
   
@endsection