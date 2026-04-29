@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => $career->title,
    'description' => 'Review the details, qualifications, and instructions for this job vacancy.',
    'breadcrumbs' => [
        ['label' => 'Careers'],
        ['label' => 'Job Vacancies', 'url' => route('careers.jobvacancies')],
        ['label' => $career->title],
    ],
])

<div class="container frontend-page-content">
    <article class="mx-auto" style="max-width: 900px;">
        <a href="{{ route('careers.jobvacancies') }}" class="btn btn-outline-secondary mb-4">
            <i class="fa fa-arrow-left mr-1"></i> Back to Careers
        </a>

        <div class="siteorigin-widget-tinymce textwidget">
            {!! $career->description !!}
        </div>
    </article>
</div>
@endsection
