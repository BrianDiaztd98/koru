<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO: Meta Descripción Obligatoria -->
    <meta name="description"
        content="{{ $metaDescription ?? 'Medical center management platform for specialized care, supply inventory, and medical history.' }}">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon_bgvoid.png') }}">

    <title>{{ $title ?? 'Koru Center - Massage, Rehabilitation & Sport Performance' }}</title>

    <!-- Rendimiento: Cargar scripts juntos para optimizar HTTP/2 en Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
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
