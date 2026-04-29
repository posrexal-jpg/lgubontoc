@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="text-center pb-2">
        <p class="section-title px-5"><span class="px-2">Careers</span></p>
        <h1 class="mb-4">Job Vacancies</h1>
    </div>

    <div class="row">
        @forelse($careers as $jobvacancy)
            <div class="col-lg-6 mb-4">
                <article class="card border-0 shadow-sm h-100">
                    <div class="card-body bg-light p-4 d-flex flex-column">
                        <h4>{{ $jobvacancy->title }}</h4>
                        <div class="flex-grow-1">
                            {!! \Illuminate\Support\Str::limit(strip_tags($jobvacancy->description), 220) !!}
                        </div>
                        <a href="{{ route('careers.jobvacancies.show', $jobvacancy->id) }}" class="btn btn-primary align-self-start mt-3">Read More</a>
                    </div>
                </article>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>No job vacancies have been published yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
