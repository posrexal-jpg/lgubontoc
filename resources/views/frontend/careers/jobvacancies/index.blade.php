@extends('layouts.frontend')

@section('content')

<style>
    h1{
        text-align: center;
        color: #046631;
        font-family: Helvetica; 
    }
</style>


<div class="container">
  @forelse($careers as $jobvacancy)
        <h1><span>{{ $jobvacancy->title }}</span></h1>
        <div class="siteorigin-widget-tinymce textwidget">
            {!! $jobvacancy->description !!}
        </div>
    @empty
        <h1><span>Job Vacancies</span></h1>
    @endforelse
</div>

@endsection
