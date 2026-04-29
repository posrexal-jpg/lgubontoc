@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => 'Bontoc Gallery',
    'description' => 'View photo stories, activities, and community highlights from Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Others'],
        ['label' => 'Gallery'],
    ],
])

<div class="container-fluid pb-4">
    <div class="container">
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
