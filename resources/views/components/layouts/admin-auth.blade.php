<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    
    <!-- 1. Seguridad: Evitar que indexen la página de login en buscadores -->
    <meta name="robots" content="noindex, nofollow">
    
    <title>{{ $title ?? 'Admin Login — KORU CMS' }}</title>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    
    @vite(['resources/css/admin.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#02B8BC]/30 selection:text-white">

    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="fixed inset-0 bg-[radial-gradient(circle_at_top,_rgba(2,184,188,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="fixed top-20 -right-40 w-96 h-96 bg-[#037E93]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>