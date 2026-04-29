@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'History',
    'title' => 'Municipal History',
    'description' => 'Discover the story of Bontoc, its people, and the milestones that shaped the municipality through the years.'
])

<div class="container about-page-content">
  @if(isset($history->title))
        <h2><span>{{$history->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $history->description !!}
        </div>
    @endif
</div>

@endsection
