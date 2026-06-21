<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Service — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior -->
        @include('admin.partials.topbar', ['title' => 'Create Service'])

        <!-- Contenedor Principal con Grid de dos columnas para mejorar UX -->
        <main class="mx-auto w-full max-w-6xl px-4 sm:px-6 py-10 flex-1">
            
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                    
                    <!-- COLUMNA PRINCIPAL (Formulario Base) -->
                    <div class="lg:col-span-2 rounded-[2rem] border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 space-y-6">
                        
                        <!-- Encabezado de la Sección -->
                        <div class="flex items-center gap-3 pb-4 border-b border-slate-800/60">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Service Information</h2>
                                <p class="text-xs text-slate-400">Fill out the primary core details and descriptions of the service.</p>
                            </div>
                        </div>

                        <!-- Parcial de inputs de Laravel -->
                        <div class="prose prose-invert max-w-none">
                            @include('admin.services._form')
                        </div>
                    </div>

                    <!-- COLUMNA LATERAL (Ajustes Rápidos / Sidebar de Control) -->
                    <div class="space-y-6">
                        <!-- Bloque de Publicación -->
                        <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-2xl shadow-black/40 space-y-4">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 font-mono">Publish Settings</h3>
                            
                            <!-- Ejemplo de toggle estético o info de control -->
                            <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800/80 text-xs text-slate-400 leading-relaxed">
                                Make sure all multi-language descriptions are completed before saving this asset to production.
                            </div>

                            <!-- Botones de Acción integrados en el Sidebar -->
                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                    </svg>
                                    Publish Service
                                </button>
                                
                                <a href="{{ route('admin.services.index') }}" 
                                   class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3.5 text-sm font-bold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                                    Cancel & Exit
                                </a>
                            </div>
                        </div>

                        <!-- Bloque de Soporte / Tip -->
                        <div class="rounded-3xl border border-slate-800/50 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-6 text-xs text-slate-400 leading-relaxed">
                            <span class="block font-bold text-[#0EB3B9] uppercase font-mono mb-1">💡 Design Tip</span>
                            Images should ideally be 16:9 ratio with dark or transparent overlays to match the homepage carousel slider structure.
                        </div>
                    </div>

                </div>
            </form>
            
        </main>
    </div>
</body>
</html>