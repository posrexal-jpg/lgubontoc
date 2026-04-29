@extends('layouts.default')

@section('content')
    <div class="container">
      <form>
            <div class="card-body">
              @include('layouts.partials.message')
              <h5 class="card-title">
                News
                <a href="{{ route('admin.newsandupdates.news.add') }}" class="btn btn-success text-white" style="float: right; margin-top: 5px;">Add News</a>
              </h5><br><br>
              <table class="table table-light">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody> 
                  @php
                    $count = 1;
                  @endphp
                  @foreach($news as $value)
                  <tr>
                    <td>{{ $count++ }}</td>
                    <th scope="row"></th>
                    <td><img src="{{ url('uploads/'.$value->image_file) }}" style="height: 50px; width: 50px;"></td>
                    <td>{{ $value->title }}</td>
                    <td>{!! $value->description !!}</td>
                    <td>{{ $value->status }}</td>
                    <td>{{ $value->date_posted }}</td>
                    <td></td>
                    <td>
                      <a href="{{ url('admin/newsandupdates/news/edit/{$id}') }}" class="btn btn-success btn-sm text-white">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete records?');" href="{{ url('admin/newsandupdates/news/delete/'.$value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table><br><br>
              </div>
              </form>
            </div>
@endsection