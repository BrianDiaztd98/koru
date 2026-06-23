<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <title>Content Management — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        @include('admin.partials.topbar', ['title' => 'Content Management'])

        <!-- Contenedor Principal -->
        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

                @include('admin.partials.sidebar', ['dashboard' => true])

                <!-- CONTENEDOR DE PANELES -->
                <section class="lg:col-span-3 space-y-6">
                    @include('admin.partials.panels.inicio')
                    @include('admin.partials.panels.about')
                    @include('admin.partials.panels.service-pillars')
                    @include('admin.partials.panels.booster_shots')
                    @include('admin.partials.panels.iv_therapy')
                </section>

            </div>
        </main>
    </div>

    <!-- Script Optimizado con Transiciones Clínicas -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.sidebar-link');
            const panels = document.querySelectorAll('.panel');

            function switchContext(target) {
                panels.forEach(panel => {
                    if (panel.id === target) {
                        panel.classList.remove('hidden');
                        // Micro-retraso para disparar la animación de entrada de forma fluida
                        setTimeout(() => {
                            panel.classList.remove('opacity-0', 'scale-[0.99]');
                            panel.classList.add('opacity-100', 'scale-100');
                        }, 20);
                    } else {
                        panel.classList.add('hidden', 'opacity-0', 'scale-[0.99]');
                        panel.classList.remove('opacity-100', 'scale-100');
                    }
                });

                links.forEach(link => {
                    const dot = link.querySelector('.opaque-dot');
                    if (link.dataset.target === target) {
                        link.setAttribute('aria-current', 'true');
                        link.className =
                            "w-full text-left px-3.5 py-2.5 rounded-xl font-semibold text-sm flex items-center justify-between border border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] transition-all duration-200 cursor-pointer sidebar-link";
                        if (dot) dot.classList.remove('opacity-0');
                    } else {
                        link.setAttribute('aria-current', 'false');
                        link.className =
                            "w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 transition-all duration-200 cursor-pointer sidebar-link";
                        if (dot) dot.classList.add('opacity-0');
                    }
                });
            }

            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    // Only intercept hash/dashboard links; let real navigation proceed when present
                    if (link.getAttribute('href') && link.getAttribute('href').startsWith('#')) {
                        e.preventDefault();
                        switchContext(link.dataset.target);
                    }
                });
            });

            // Forzar el estado inicial exacto
            switchContext('inicio');
        });
    </script>
</body>

</html>
