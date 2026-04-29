@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => isset($municipalordinances->title) ? $municipalordinances->title : 'Municipal Ordinances',
    'description' => 'Review published municipal ordinances and local legislative information for Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Transparency'],
        ['label' => 'Municipal Ordinances'],
    ],
])

<div class="container frontend-page-content">
  @if(isset($municipalordinances->title))
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $municipalordinances->description !!}
        </div>
    @endif
</div>

@endsection
