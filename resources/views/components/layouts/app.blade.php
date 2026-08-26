<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Preconnect para fuentes críticas -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>

    <!-- SEO: Meta Descripcin Obligatoria -->
    <meta name="description"
        content="{{ $metaDescription ?? 'Advanced medical center management platform for specialized care, clinical history records, and healthcare supply inventory.' }}">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    <!-- El ttulo por defecto ahora es ms corporativo y claro para el mercado de salud en USA -->
    <meta name="title" content="{{ $title ?? 'KORU Center | Clinical Management & Medical Supply Platform' }}">
    <title>{{ $title ?? 'KORU Center | Clinical Management & Medical Supply Platform' }}</title>

    <!-- Rendimiento: Cargar scripts juntos para optimizar HTTP/2 en Vite -->
    @livewireStyles
    @if (app()->environment('production'))
        <style>{!! Vite::content('resources/css/app.css') !!}</style>
        @vite(['resources/js/app.js'])
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @stack('head')
</head>

<body
    class="bg-[#0b1329] text-slate-100 antialiased overflow-x-hidden min-h-screen flex flex-col selection:bg-[#0EB3B9]/30 selection:text-[#0EB3B9]">

    <main class="flex-grow w-full">
        {{ $slot }}
    </main>

    @livewireScripts(['defer' => true])

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/17867528054"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Chat with us on WhatsApp"
       class="whatsapp-float fixed bottom-6 right-6 z-50 inline-flex items-center gap-2 sm:gap-3 rounded-full bg-mint px-3 py-2.5 pr-5 text-white shadow-lg shadow-mint/25 transition-all duration-200 hover:bg-navy hover:shadow-xl hover:shadow-mint/35 hover:-translate-y-0.5 active:scale-[0.97] active:translate-y-0 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#0b1329]">
        <span class="flex items-center justify-center w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-white/15">
            <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.454 5.709 1.455h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
        </span>
        <span class="hidden sm:inline-flex items-center text-sm font-semibold tracking-wide">Chat with us</span>
    </a>
</body>

</html>
