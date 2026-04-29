@extends('layouts.default')

@section('content')
    <div class="container">
        <form method="POST" action="{{route('admin.aboutus.mandate.add')}}">
            @csrf
            <div class="row card p-5">
                <div class="bg-light p-5 rounded">
                    <h2>mandate</h2>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Title</label>
                        @if(isset($mandate->title))
                            <input type="text" hidden="" name="id" value="{{$mandate->id}}" class="form-control">
                            <input type="text" name="title" value="{{$mandate->title}}" class="form-control" placeholder="Title">
                        @else
                         <input type="text" name="title" value="" class="form-control" placeholder="Title">
                        @endif
                    </div><br>
                     <div class="form-group">
                        <label>Description</label>
                         @if(isset($mandate->description))
                           <textarea id="myTextarea" name="description" value="{{$mandate->description}}" style="width: 100%;">{{$mandate->description}}</textarea>
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