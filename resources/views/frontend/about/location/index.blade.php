@extends('layouts.frontend')

@section('content')

<style>
    h1{
        text-align: center;
        color: #046631;
        font-family: Helvetica; 
    }
</style>


<div class="container">
  @if(isset($location->title))
        <h1><span>{{$location->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $location->description !!}
        </div>
    @endif
</div>

@endsection