@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => $gallery->title,
    'description' => 'Read this gallery entry from the Municipality of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Others'],
        ['label' => 'Gallery', 'url' => route('others.gallery')],
        ['label' => $gallery->title],
    ],
])

<div class="container frontend-page-content">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('others.gallery') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to Gallery
        </a>

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $gallery->description !!}
        </div>
    </article>
</div>
@endsection
