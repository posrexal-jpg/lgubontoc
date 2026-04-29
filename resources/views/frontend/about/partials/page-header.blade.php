<style>
    .about-page-content {
        padding-bottom: 4rem;
    }
</style>

@include('frontend.partials.page-header', [
    'title' => $title,
    'description' => $description,
    'breadcrumbs' => [
        ['label' => 'About'],
        ['label' => $current],
    ],
])
