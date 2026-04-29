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
  @if(isset($municipalityseal->title))
        <h1><span>{{$municipalityseal->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $municipalityseal->description !!}
        </div>
    @endif
</div>

@endsection