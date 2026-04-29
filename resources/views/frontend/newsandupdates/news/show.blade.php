@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('newsandupdates.news') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to News
        </a>

        @if(!empty($news->image_file))
            <img class="img-fluid rounded mb-4 w-100" src="{{ url('uploads/'.$news->image_file) }}" alt="{{ $news->title }}">
        @endif

        <h1 class="mb-2">{{ $news->title }}</h1>
        @if(!empty($news->date_posted))
            <p class="text-muted mb-4"><i class="fa fa-calendar text-primary mr-1"></i>{{ $news->date_posted }}</p>
        @endif

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $news->description !!}
        </div>
    </article>
</div>
@endsection
