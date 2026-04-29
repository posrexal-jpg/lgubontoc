@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center pb-2">
        <p class="section-title px-5"><span class="px-2">Downloads</span></p>
        <h1 class="mb-4">Downloadable Forms</h1>
    </div>

    <div class="row">
        @forelse($downloadableforms as $form)
            <div class="col-lg-6 mb-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body bg-light p-4">
                        <h4>{{ $form->title }}</h4>
                        <div class="siteorigin-widget-tinymce textwidget">
                            {!! $form->description !!}
                        </div>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No downloadable forms have been published yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
