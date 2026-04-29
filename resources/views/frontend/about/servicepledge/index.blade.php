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
  @if(isset($servicepledge->title))
        <h1><span>{{$servicepledge->title}}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $servicepledge->description !!}
        </div>
    @endif
</div>

@endsection