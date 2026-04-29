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
  @if(isset($history->title))
        <h1><span>{{$history->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $history->description !!}
        </div>
    @endif
</div>

@endsection