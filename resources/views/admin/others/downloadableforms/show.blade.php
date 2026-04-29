@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="card p-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Read Downloadable Form</h2>
                <a href="{{ route('admin.others.downloadableforms') }}" class="btn btn-secondary btn-sm">Back to Browse</a>
            </div>

            <h4>{{ $form->title }}</h4>
            <p><strong>Is Published:</strong> {{ $form->is_published ? 'Yes' : 'No' }}</p>

            @if($form->description)
                <div class="siteorigin-widget-tinymce textwidget">
                    {!! nl2br(e($form->description)) !!}
                </div>
            @endif

            @if($form->file_url)
                <div class="mt-4">
                    <a class="btn btn-primary" href="{{ $form->file_url }}" download>Download Form</a>
                </div>
            @endif
        </div>
    </div>
@endsection
