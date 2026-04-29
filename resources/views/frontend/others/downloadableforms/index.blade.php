@extends('layouts.frontend')

@section('content')
@include('frontend.partials.page-header', [
    'title' => 'Downloadable Forms',
    'description' => 'Access forms, documents, and public files provided by the Municipal Government of Bontoc.',
    'breadcrumbs' => [
        ['label' => 'Others'],
        ['label' => 'Downloadable Forms'],
    ],
])

<style>
    .downloadable-list {
        display: grid;
        gap: 1rem;
    }

    .downloadable-form {
        display: flex;
        justify-content: space-between;
        gap: 1.5rem;
        align-items: flex-start;
        background: #fff;
        border: 1px solid #dce3ea;
        padding: 1.5rem;
        box-shadow: 0 10px 22px rgba(11, 61, 42, .06);
    }

    .downloadable-form h2 {
        color: #143226;
        font-size: 1.2rem;
        font-weight: 800;
        margin-bottom: .4rem;
    }

    .downloadable-form p {
        color: #5f6b76;
        margin-bottom: 0;
    }

    .downloadable-form__button {
        white-space: nowrap;
    }

    @media (max-width: 575.98px) {
        .downloadable-form {
            display: block;
        }

        .downloadable-form__button {
            margin-top: 1rem;
        }
    }
</style>

<div class="container frontend-page-content">
    <div class="downloadable-list">
        @forelse($downloadableforms as $form)
                <article class="downloadable-form">
                    <div>
                        <h2>{{ $form->title }}</h2>
                        @if($form->description)
                            <p>{{ $form->description }}</p>
                        @endif
                    </div>

                    @if($form->file_url)
                        <a class="btn btn-primary downloadable-form__button" href="{{ $form->file_url }}" download>
                            <i class="fa fa-download" aria-hidden="true"></i> Download
                        </a>
                    @endif
                </article>
        @empty
            <div class="text-center">
                <p>No downloadable forms have been published yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
