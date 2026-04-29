@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to Home
        </a>

        @if(!empty($item->image))
            <img class="img-fluid rounded mb-4 w-100" src="{{ url('public/home/'.$item->image) }}" alt="{{ $item->title }}">
        @endif

        <h1 class="mb-2">{{ $item->title }}</h1>
        @if(!empty($item->date_posted))
            <p class="text-muted mb-4"><i class="fa fa-calendar text-primary mr-1"></i>{{ $item->date_posted }}</p>
        @endif

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $item->description !!}
        </div>
    </article>
</div>
@endsection
