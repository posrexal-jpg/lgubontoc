@extends('layouts.default')

@section('content')
    <div class="container">
       <form method="POST" action="{{route('admin.aboutus.directory.add')}}">
            @csrf
            <div class="row card p-5">
                <div class="bg-light p-5 rounded">
                    <h2>directory</h2>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        @if(isset($directory->title))
                            <input type="text" hidden="" name="id" value="{{$directory->id}}" class="form-control">
                            <input type="text" name="title" value="{{$directory->title}}" class="form-control" placeholder="Title">
                        @else
                         <input type="text" name="title" value="" class="form-control" placeholder="Title">
                        @endif
                    </div><br>
                     <div class="form-group">
                        <label>Description</label>
                         @if(isset($directory->description))
                           <textarea id="myTextarea" name="description" value="{{$directory->description}}" style="width: 100%;">{{$directory->description}}</textarea>
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