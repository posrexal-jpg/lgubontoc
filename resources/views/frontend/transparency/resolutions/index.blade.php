@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => isset($resolutions->title) ? $resolutions->title : 'Resolutions',
    'description' => 'Review published resolutions and public legislative records from the Municipality of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Transparency'],
        ['label' => 'Resolutions'],
    ],
])

<div class="container frontend-page-content">
  @if(isset($resolutions->title))
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $resolutions->description !!}
        </div>
    @endif
</div>

@endsection
