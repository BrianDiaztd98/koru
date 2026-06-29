<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon_bgvoid.png') }}">

    <title>{{ $title ?? 'Koru Center - Massage, Rehabilitation & Sport Performance' }}</title>

    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body class="bg-[#0b1329] text-slate-100 font-sans antialiased overflow-x-hidden min-h-screen">
    
    {{ $slot }}

    @vite(['resources/js/app.js'])
    @livewireScripts
</body>
</html>