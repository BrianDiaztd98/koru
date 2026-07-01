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
    x-data="{ sidebarOpen: false }"
    class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">

    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none">
    </div>
    <div class="absolute top-40 -left-20 w-80 h-80 bg-[#0EB3B9]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen" x-cloak @keydown.escape.window="sidebarOpen = false">
        <div class="fixed inset-0 z-40 transition-opacity bg-slate-950/70 lg:hidden"
             x-show="sidebarOpen"
             x-transition.opacity
             x-cloak
             @click="sidebarOpen = false"></div>

        <div class="fixed inset-y-0 left-0 z-50 w-full transform transition duration-300 lg:fixed lg:translate-x-0 lg:w-72 lg:max-w-none lg:top-0 lg:left-0 lg:h-screen"
             :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
             x-cloak>
            <livewire:admin.admin-sidebar />
        </div>

        <div class="lg:pl-72">
            <div class="lg:hidden border-b border-slate-800/70 bg-slate-950/90 px-4 py-3" x-show="!sidebarOpen" x-cloak>
                <button type="button"
                        @click="sidebarOpen = true"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-700 bg-slate-900/90 px-3 py-2 text-sm font-semibold text-white shadow-sm shadow-black/20 transition hover:bg-slate-800">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    Abrir menú
                </button>
            </div>

            <!-- Contenedor Principal -->
            <main class="min-h-screen w-full max-w-7xl px-3 sm:px-4 lg:px-6 py-6">
                <!-- CONTENEDOR DE PANELES -->
                <section class="space-y-6">
                    {{ $slot }}
                </section>
            </main>
        </div>
    </div>

    @livewireScripts

    

</body>

</html>
