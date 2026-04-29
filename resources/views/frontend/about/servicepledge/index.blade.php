@extends('layouts.frontend')

@section('content')

@include('frontend.about.partials.page-header', [
    'current' => 'Service Pledge',
    'title' => 'Service Pledge',
    'description' => 'Know the municipality\'s pledge to deliver courteous, transparent, and responsive service to every citizen.'
])

<div class="container about-page-content">
  @if(isset($servicepledge->title))
        <h2><span>{{$servicepledge->title}}</span></h2>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $servicepledge->description !!}
        </div>
    @endif
</div>

@endsection
