@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Municipality Seal',
    'title' => 'Municipality Seal',
    'description' => 'Learn about the official seal of Bontoc and the symbols that represent the municipality\'s identity and heritage.'
])

<div class="container about-page-content">
  @if(isset($municipalityseal->title))
        <h2><span>{{$municipalityseal->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $municipalityseal->description !!}
        </div>
    @endif
</div>

@endsection
