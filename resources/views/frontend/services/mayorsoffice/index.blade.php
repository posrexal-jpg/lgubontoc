@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => isset($mayorsoffice->title) ? $mayorsoffice->title : "Mayor's Office",
    'description' => "Find information, services, and updates from the Office of the Municipal Mayor.",
    'breadcrumbs' => [
        ['label' => 'Services'],
        ['label' => "Mayor's Office"],
    ],
])

<div class="container frontend-page-content">
  @if(isset($mayorsoffice->title))
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $mayorsoffice->description !!}
        </div>
    @endif
</div>

@endsection
