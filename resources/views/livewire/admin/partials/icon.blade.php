@php
    $icons = [
        'home' => 'M3 12l9-9 9 9M9 21V9h6v12',
        'information-circle' => 'M11.25 9h1.5M12 16.5h.008v.008H12V16.5ZM21 12a9 9 0 11-18 0 9 9 0 0118 0Z',
        'cube-transparent' => 'M7.5 2.25 3.75 4.5v15l3.75 2.25 9 0 3.75-2.25v-15l-3.75-2.25-9 0Z M21 7.5 12 12.75 3 7.5',
        'sparkles' => 'M11.25 3.25v3.5M11.25 17.25v3.5M6.75 6.75l2.475 2.475M14.025 14.025l2.475 2.475M12 8.25a3.75 3.75 0 1 1 0 7.5 3.75 3.75 0 0 1 0-7.5Z',
        'beaker' => 'M10.5 3h3l2.25 6.75v6.75a3.75 3.75 0 1 1-7.5 0V9.75L10.5 3Z',
    ];
@endphp

<svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icons[$name] ?? $icons['information-circle'] }}" />
</svg>
