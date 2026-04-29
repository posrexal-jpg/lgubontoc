@extends('layouts.default')

@section('content')
    <div class="container">
      <form>
            <div class="card-body">
              @include('layouts.partials.message')
              <h5 class="card-title">
                News
                <a href="{{ url('admin/home/add') }}" class="btn btn-success text-white" style="float: right; margin-top: 5px;">Add News</a>
              </h5><br><br>
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
                      <a href="{{ url('admin/home/edit/'.$value->id) }}" class="btn btn-success btn-sm text-white">Edit</a>
                      <a onclick="return confirm('Are you sure you want to delete records?');" href="{{ url('admin/home/delete/'.$value->id) }}" class="btn btn-danger btn-sm text-white">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table><br><br>
              </div>
              </form>
            </div>
@endsection