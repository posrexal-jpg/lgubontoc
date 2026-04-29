@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('newsandupdates.upcomingupdates') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to Updates
        </a>

        @if(!empty($upcomingupdate->image_file))
            <img class="img-fluid rounded mb-4 w-100" src="{{ url('uploads/'.$upcomingupdate->image_file) }}" alt="{{ $upcomingupdate->title }}">
        @endif

        <h1 class="mb-2">{{ $upcomingupdate->title }}</h1>
        @if(!empty($upcomingupdate->date_posted))
            <p class="text-muted mb-4"><i class="fa fa-calendar text-primary mr-1"></i>{{ $upcomingupdate->date_posted }}</p>
        @endif

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $upcomingupdate->description !!}
        </div>
    </article>
</div>
@endsection
