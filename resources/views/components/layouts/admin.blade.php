<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>{{ $title ?? 'Content Management — Koru CMS' }}</title>
    @vite(['resources/css/app.css'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data="{ sidebarOpen: false }"
    class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">

    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none">
    </div>
    <div class="absolute top-40 -left-20 w-80 h-80 bg-[#0EB3B9]/5 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Overlay (Mobile) -->
    <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false" class="fixed inset-0 bg-black/60 z-30 lg:hidden">
    </div>

    <!-- Sidebar -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed left-0 top-0 z-40 w-full lg:w-72 h-screen transform lg:translate-x-0 transition-transform duration-300 ease-in-out border-r border-slate-800/80 bg-slate-950/95 backdrop-blur-xl shadow-xl shadow-black/20 overflow-hidden">
        <div class="flex flex-col h-full p-5">
            <livewire:admin.admin-sidebar />
        </div>
    </aside>

    <!-- Contenedor Principal -->
    <main class="min-h-screen lg:ml-72 relative z-10">
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10">
            <!-- Botón Hamburguesa (Mobile) -->
            <button @click="sidebarOpen = true" type="button"
                class="lg:hidden inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/80 p-2.5 text-slate-400 shadow-lg backdrop-blur-md transition-all hover:border-[#0EB3B9]/40 hover:text-white mb-6 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]"
                aria-label="Abrir menú" :aria-expanded="sidebarOpen.toString()">
                <span class="sr-only">Abrir menú</span>
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{ $slot }}
        </div>
    </main>

    @livewireScripts
</body>

</html>
