<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('img/favicon_bgvoid.png') }}">

    <title>{{ $title ?? 'Koru Center - Massage, Rehabilitation & Sport Performance' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @livewireStyles
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased">
    {{ $slot }}

    @livewireScripts
</body>
</html>
