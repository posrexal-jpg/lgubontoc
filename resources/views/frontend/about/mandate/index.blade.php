@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Mandate',
    'title' => 'Mandate',
    'description' => 'Review the mandate that defines the duties, responsibilities, and service commitments of the Municipal Government of Bontoc.'
])

<div class="container about-page-content">
  @if(isset($mandate->title))
        <h2><span>{{$mandate->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $mandate->description !!}
        </div>
    @endif
</div>

@endsection
