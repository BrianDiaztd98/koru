<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Service — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior integrada -->
        @include('admin.partials.topbar', ['title' => 'Edit Service'])

        <!-- Contenedor Principal con Grid de dos columnas para optimizar UX -->
        <main class="mx-auto w-full max-w-6xl px-4 sm:px-6 py-10 flex-1">
            
            <form action="{{ route('admin.services.update', $service) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                    
                    <!-- COLUMNA PRINCIPAL (Formulario Base con Datos Existentes) -->
                    <div class="lg:col-span-2 rounded-[2rem] border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 space-y-6">
                        
                        <!-- Encabezado de la Sección Interna -->
                        <div class="flex items-center gap-3 pb-4 border-b border-slate-800/60">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-lg font-bold text-white">Modify Service</h2>
                                <p class="text-xs text-slate-400">You are currently altering the production properties of <span class="text-[#0EB3B9] font-semibold">{{ $service->name_en }}</span>.</p>
                            </div>
                        </div>

                        <!-- Parcial de inputs de Laravel -->
                        <div class="prose prose-invert max-w-none">
                            @include('admin.services._form')
                        </div>
                    </div>

                    <!-- COLUMNA LATERAL (Bloque de Control y Estado) -->
                    <div class="space-y-6">
                        <!-- Tarjeta de Guardado Rápido -->
                        <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-2xl shadow-black/40 space-y-4">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400 font-mono">Update State</h3>
                            
                            <!-- Información del recurso -->
                            <div class="p-3 rounded-xl bg-slate-950/60 border border-slate-800/80 space-y-1.5 text-xs text-slate-400">
                                <div class="flex justify-between">
                                    <span>Created:</span>
                                    <span class="text-slate-300 font-mono">{{ $service->created_at?->format('Y-m-d') ?? 'N/A' }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Last Update:</span>
                                    <span class="text-slate-300 font-mono">{{ $service->updated_at?->format('H:i') ?? 'N/A' }}</span>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182"/>
                                    </svg>
                                    Update Service
                                </button>
                                
                                <a href="{{ route('admin.services.index') }}" 
                                   class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3.5 text-sm font-bold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                                    Cancel Changes
                                </a>
                            </div>
                        </div>

                        <!-- Recordatorio Técnico -->
                        <div class="rounded-3xl border border-slate-800/50 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-6 text-xs text-slate-400 leading-relaxed">
                            <span class="block font-bold text-[#0EB3B9] uppercase font-mono mb-1">⚠️ Cache Warning</span>
                            Updating core service variables might take up to a few minutes to invalidate from CDN networks or public frontend view states.
                        </div>
                    </div>

                </div>
            </form>
            
        </main>
    </div>
</body>
</html>