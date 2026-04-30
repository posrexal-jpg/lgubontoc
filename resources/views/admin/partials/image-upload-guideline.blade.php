@php
    $guidelines = [
        'header_banner' => 'Recommended size: 1200 x 240 px. JPG, PNG, or WebP. Max file size: 4MB.',
        'carousel' => 'Recommended size: 1600 x 700 px. Use a wide landscape image. JPG, PNG, or WebP. Max file size: 4MB.',
        'hero' => 'Recommended size: 1600 x 700 px. Use a wide landscape image. JPG, PNG, or WebP. Max file size: 4MB.',
        'homepage' => 'Recommended size: 1200 x 675 px. Use a 16:9 landscape image.',
        'news' => 'Recommended size: 1200 x 675 px. Use a 16:9 landscape image.',
        'announcement' => 'Recommended size: 1200 x 675 px. Use a 16:9 landscape image.',
        'tourism_main' => 'Recommended size: 1400 x 900 px. Use a landscape destination photo. Max file size: 4MB.',
        'tourism_gallery' => 'Recommended size: 1400 x 900 px per photo. Landscape images work best. Max file size: 4MB each.',
        'official' => 'Recommended size: 800 x 1000 px. Use a clear portrait photo. Max file size: 4MB.',
        'profile' => 'Recommended size: 600 x 600 px. Use a square headshot. Max file size: 2MB.',
        'document_image' => 'Recommended image size: 1200 x 1600 px. PDF is preferred for official reports. Max file size: 10MB.',
    ];
@endphp

<small class="text-muted d-block mt-1">{{ $guidelines[$type] ?? 'Recommended image size: at least 1200 px wide.' }}</small>
