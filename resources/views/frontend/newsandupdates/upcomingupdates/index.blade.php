@extends('layouts.frontend')

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Upcoming Updates</span></p>
            <h1 class="mb-4">Announcements and Updates</h1>
        </div>

        <div class="row pb-3">
            @forelse($upcomingupdates as $update)
                <div class="col-lg-4 col-md-6 mb-4">
                    <article class="card border-0 shadow-sm h-100">
                        @if(!empty($update->image_file))
                            <img class="card-img-top" src="{{ url('uploads/'.$update->image_file) }}" alt="{{ $update->title }}">
                        @else
                            <img class="card-img-top" src="{{ asset('resources/bontoclogonobg.png') }}" alt="Municipality of Bontoc seal">
                        @endif
                        <div class="card-body bg-light text-center p-4 d-flex flex-column">
                            <h4>{{ $update->title }}</h4>
                            @if(!empty($update->date_posted))
                                <small class="mb-3 text-muted"><i class="fa fa-calendar text-primary mr-1"></i>{{ $update->date_posted }}</small>
                            @endif
                            <div class="text-left flex-grow-1">
                                {!! \Illuminate\Support\Str::limit(strip_tags($update->description), 180) !!}
                            </div>
                            <a href="{{ route('newsandupdates.upcomingupdates.show', $update->id) }}" class="btn btn-primary px-4 mx-auto mt-3">Read More</a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No upcoming updates have been published yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
