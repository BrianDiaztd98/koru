<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO: Meta Descripción Obligatoria -->
    <meta name="description"
        content="{{ $metaDescription ?? 'Advanced medical center management platform for specialized care, clinical history records, and healthcare supply inventory.' }}">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- El título por defecto ahora es más corporativo y claro para el mercado de salud en USA -->
    <meta name="title" content="{{ $title ?? 'Koru Center | Clinical Management & Medical Supply Platform' }}">
    <title>{{ $title ?? 'Koru Center | Clinical Management & Medical Supply Platform' }}</title>

    <!-- Rendimiento: Cargar scripts juntos para optimizar HTTP/2 en Vite -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>

<body
    class="bg-[#0b1329] text-slate-100 antialiased overflow-x-hidden min-h-screen flex flex-col selection:bg-[#0EB3B9]/30 selection:text-[#0EB3B9]">

    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    @livewireScripts
</body>

</html>
