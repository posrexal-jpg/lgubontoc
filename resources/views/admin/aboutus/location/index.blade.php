@extends('layouts.default')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('admin.aboutus.location.add')}}">
            @csrf
            <div class="row card p-5">
                <div class="bg-light p-5 rounded">
                    <h2>location</h2>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        @if(isset($location->title))
                            <input type="text" hidden="" name="id" value="{{$location->id}}" class="form-control">
                            <input type="text" name="title" value="{{$location->title}}" class="form-control" placeholder="Title">
                        @else
                         <input type="text" name="title" value="" class="form-control" placeholder="Title">
                        @endif
                    </div><br>
                     <div class="form-group">
                        <label>Description</label>
                         @if(isset($location->description))
                           <textarea id="myTextarea" name="description" value="{{$location->description}}" style="width: 100%;">{{$location->description}}</textarea>
                        @else
                         <textarea id="myTextarea" name="description" style="width: 100%;"></textarea>
                        @endif
                        
                    </div><br>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </div>
            </div> 
        </form>
    </div>
@endsection