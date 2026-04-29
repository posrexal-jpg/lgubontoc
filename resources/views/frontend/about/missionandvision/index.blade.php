@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Mission and Vision',
    'title' => 'Mission and Vision',
    'description' => 'Read the guiding mission and vision that direct Bontoc\'s public service, governance, and community development.'
])

<div class="container about-page-content">
  @if(isset($missionandvision->title))
        <h2><span>{{$missionandvision->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $missionandvision->description !!}
        </div>
    @endif
</div>

@endsection
