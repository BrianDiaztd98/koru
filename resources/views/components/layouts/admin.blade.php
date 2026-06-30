<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>{{ $title ?? 'Content Management — Koru CMS' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body
    class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">

    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none">
    </div>
    <div class="absolute top-40 -left-20 w-80 h-80 bg-[#0EB3B9]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior integrada -->
        <livewire:admin.admin-topbar :title="$title ?? 'Content Management'" />

        <!-- Contenedor Principal -->
        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

                <livewire:admin.admin-sidebar :activeTarget="$activeTarget ?? 'inicio'" />

                <!-- CONTENEDOR DE PANELES -->
                <section class="lg:col-span-3 space-y-6">
                    {{ $slot }}
                </section>

            </div>
        </main>
    </div>

    @livewireScripts
</body>

</html>
