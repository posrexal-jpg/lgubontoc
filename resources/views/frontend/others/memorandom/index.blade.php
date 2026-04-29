@extends('layouts.frontend')

@section('content')

@include('frontend.partials.page-header', [
    'title' => isset($memorandom->title) ? $memorandom->title : 'Memorandum',
    'description' => 'Read memoranda and public notices issued for the Municipality of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Others'],
        ['label' => 'Memorandum'],
    ],
])

<div class="container frontend-page-content">
  @if(isset($memorandom->title))
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $memorandom->description !!}
        </div>
    @endif
</div>

@endsection
