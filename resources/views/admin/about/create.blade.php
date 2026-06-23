<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create About — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior integrada -->
        @include('admin.partials.topbar', ['title' => 'Create About'])

        <!-- Contenedor Principal con Grid de dos columnas para optimizar UX -->
        <main class="mx-auto w-full max-w-6xl px-4 sm:px-6 py-10 flex-1">
            
            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                    
                    <!-- COLUMNA PRINCIPAL (Formulario Base con Datos Existentes) -->
                    <div class="lg:col-span-2 rounded-[2rem] border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 space-y-6">
                        
                        <!-- Encabezado de la Sección Interna -->
                        <div class="flex items-center gap-3 pb-4 border-b border-slate-800/60">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Create About Section</h2>
                                <p class="text-xs text-slate-400">Create the content for the About Us section of the landing page.</p>
                            </div>
                        </div>

                        <!-- Parcial de inputs de Laravel -->
                        <div class="prose prose-invert max-w-none">
                            @include('admin.about._form')
                        </div>
                    </div>

                    <!-- COLUMNA LATERAL (Bloque de Control y Estado) -->
                    <div class="space-y-6">
                        <!-- Tarjeta de Guardado Rápido -->
                        <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-2xl shadow-black/40 space-y-4">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 font-mono">Create State</h3>

                            <!-- Botones de Acción -->
                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                    </svg>
                                    Create About
                                </button>
                                
                                <a href="{{ route('admin.about.index') }}" 
                                   class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3.5 text-sm font-bold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                                    Cancel
                                </a>
                            </div>
                        </div>

                        <!-- Recordatorio Técnico -->
                        <div class="rounded-3xl border border-slate-800/50 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-6 text-xs text-slate-400 leading-relaxed">
                            <span class="block font-bold text-[#0EB3B9] uppercase font-mono mb-1">Note</span>
                            The About section is a singleton - only one record can exist. If a record already exists, you will be redirected to edit it.
                        </div>
                    </div>

                </div>
            </form>
            
        </main>
    </div>
</body>
</html>