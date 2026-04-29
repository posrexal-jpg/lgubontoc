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
  @if(isset($directory->title))
        <h1><span>{{$directory->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $directory->description !!}
        </div>
    @endif
</div>

@endsection