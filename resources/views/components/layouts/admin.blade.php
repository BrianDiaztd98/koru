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

                <livewire:admin.admin-sidebar />

                <!-- CONTENEDOR DE PANELES -->
                <section class="lg:col-span-3 space-y-6">
                    {{ $slot }}
                </section>

            </div>
        </main>
    </div>

    @livewireScripts

    <script>
        (function() {
            const routeNameMap = {
                'admin.management.index': 'inicio',
                'admin.about.index': 'about',
                'admin.about.edit': 'about',
                'admin.about.create': 'about',
                'admin.services.index': 'services',
                'admin.services.create': 'services',
                'admin.services.edit': 'services',
                'admin.packages.index': 'packages',
                'admin.packages.create': 'packages',
                'admin.packages.edit': 'packages',
            };

            function updateSidebar() {
                const routeName = @json(Route::currentRouteName());
                const activeTarget = routeNameMap[routeName] ?? 'inicio';

                document.querySelectorAll('.sidebar-link').forEach(link => {
                    const section = link.getAttribute('data-section');
                    const isActive = section === activeTarget;
                    const dot = link.querySelector('.rounded-full');

                    if (isActive) {
                        link.classList.add('translate-x-1');
                        if (dot) {
                            dot.classList.remove('bg-slate-600', 'scale-0');
                            dot.classList.add('bg-[#0EB3B9]', 'scale-100');
                        }
                    } else {
                        link.classList.remove('translate-x-1');
                        if (dot) {
                            dot.classList.remove('bg-[#0EB3B9]', 'scale-100');
                            dot.classList.add('bg-slate-600', 'scale-0');
                        }
                    }
                });
            }

            if (typeof Livewire !== 'undefined') {
                Livewire.hook('request.finished', () => {
                    updateSidebar();
                });
            }

            document.addEventListener('DOMContentLoaded', updateSidebar);
        })();
    </script>
</body>

</html>
