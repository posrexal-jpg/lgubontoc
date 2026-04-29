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
  @if(isset($memorandom->title))
        <h1><span>{{$memorandom->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $memorandom->description !!}
        </div>
    @endif
</div>

@endsection