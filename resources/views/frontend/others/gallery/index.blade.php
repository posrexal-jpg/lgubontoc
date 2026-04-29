@extends('layouts.frontend')

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Gallery</span></p>
            <h1 class="mb-4">Bontoc Gallery</h1>
        </div>

        <div class="row pb-3">
            @forelse($gallery as $item)
                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="card border-0 shadow-sm h-100">
                        <div class="card-body bg-light text-center p-4 d-flex flex-column">
                            <h4>{{ $item->title }}</h4>
                            <div class="text-left flex-grow-1">
                                {!! \Illuminate\Support\Str::limit(strip_tags($item->description), 180) !!}
                            </div>
                            <a href="{{ route('others.gallery.show', $item->id) }}" class="btn btn-primary px-4 mx-auto mt-3">Read More</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No gallery entries have been published yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
