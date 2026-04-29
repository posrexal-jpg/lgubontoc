@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('tourism.bontocattractions') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to Tourism
        </a>

        <h1 class="mb-4">{{ $attraction->title }}</h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $attraction->description !!}
        </div>
    </article>
</div>
@endsection
