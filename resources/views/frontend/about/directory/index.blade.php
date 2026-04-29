@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Directory',
    'title' => 'Office Directory',
    'description' => 'Access the CAM directory for quick contact information, office locations, and public assistance channels within the Municipal Government of Bontoc.'
])

<div class="container about-page-content">
  @if(isset($directory->title))
        <h2><span>{{$directory->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $directory->description !!}
        </div>
    @endif
</div>

@endsection
