<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Service — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Intercepción de Estilos Globales para Inputs y Selects del Parcial _form -->
    <style>
        .prose-invert select,
        .prose-invert input[type="text"],
        .prose-invert input[type="number"],
        .prose-invert textarea {
            width: 100%;
            background-color: rgba(2, 6, 23, 0.6) !important; /* bg-slate-950/60 */
            border: 1px solid rgba(51, 65, 85, 0.5) !important; /* border-slate-700/50 */
            border-radius: 0.75rem !important; /* rounded-xl */
            padding: 0.75rem 1rem !important;
            color: #f8fafc !important; /* text-slate-50 */
            font-size: 0.875rem !important; /* text-sm */
            transition: all 0.2s ease-in-out !important;
            outline: none !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.4) !important;
        }

        .prose-invert select:focus,
        .prose-invert input[type="text"]:focus,
        .prose-invert input[type="number"]:focus,
        .prose-invert textarea:focus {
            border-color: #0EB3B9 !important;
            box-shadow: 0 0 0 2px rgba(14, 179, 185, 0.15), inset 0 2px 4px 0 rgba(0, 0, 0, 0.4) !important;
        }

        /* Estilizado e Inyección de Icono para el SELECT */
        .prose-invert select {
            appearance: none !important;
            -webkit-appearance: none !important;
            -moz-appearance: none !important;
            padding-right: 2.5rem !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='%230EB3B9'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m19.5 8.25-7.5 7.5-7.5-7.5'/%3E%3C/svg%3E") !important;
            background-repeat: no-repeat !important;
            background-position: right 1rem center !important;
            background-size: 1.25rem !important;
            cursor: pointer;
        }

        /* Estilos para las opciones nativas desplegables del Select */
        .prose-invert select option {
            background-color: #020617 !important; /* bg-slate-950 */
            color: #94a3b8 !important; /* text-slate-400 */
            padding: 0.5rem !important;
        }

        /* Manejo estético de los Labels de Laravel */
        .prose-invert label {
            display: block !important;
            font-size: 0.75rem !important; /* text-xs */
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            color: #94a3b8 !important; /* text-slate-400 */
            margin-bottom: 0.5rem !important;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
        }
    </style>
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.05)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior -->
        @include('admin.partials.topbar', ['title' => 'Create Service'])

        <!-- Contenedor Principal -->
        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

                @include('admin.partials.sidebar', ['activeTarget' => $defaultCategory ?? 'service-pillars'])

                <div class="lg:col-span-3">
            
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3 items-start">
                    
                    <!-- COLUMNA PRINCIPAL (Formulario Base) -->
                    <div class="lg:col-span-2 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/30 space-y-6">
                        
                        <!-- Encabezado de la Sección -->
                        <div class="flex items-center gap-4 pb-5 border-b border-slate-800/60">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white tracking-tight">{{ $categories[$defaultCategory] ?? 'Service Information' }}</h2>
                                <p class="text-xs text-slate-400 mt-0.5">Fill out the primary core details and descriptions of the service.</p>
                            </div>
                        </div>

                        <!-- Inyección del Formulario de Laravel -->
                        <div class="prose prose-invert max-w-none space-y-4">
                            @if(($defaultCategory ?? null) === 'booster_shots')
                                @include('admin.services._form_booster_shots')
                            @elseif(($defaultCategory ?? null) === 'iv_therapy')
                                @include('admin.services._form_iv_therapy')
                            @else
                                @include('admin.services._form')
                            @endif
                        </div>
                    </div>

                    <!-- COLUMNA LATERAL (Ajustes Rápidos / Sidebar de Control) -->
                    <div class="space-y-6">
                        <!-- Bloque de Publicación -->
                        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/30 space-y-4">
                            <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 font-mono">Publish Settings</h3>
                            
                            <div class="p-3.5 rounded-xl bg-slate-950/60 border border-slate-800/80 text-xs text-slate-400 leading-relaxed shadow-inner">
                                Make sure all multi-language descriptions are completed before saving this asset to production.
                            </div>

                            <!-- Botones de Acción -->
                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit" 
                                        class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-xs font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                    </svg>
                                    Publish Service
                                </button>
                                
                                <a href="{{ isset($defaultCategory) ? route('admin.services.index', ['category' => $defaultCategory]) : route('admin.services.index') }}" 
                                   class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3 text-xs font-semibold text-slate-400 backdrop-blur-sm transition-all duration-150 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                                    Cancel & Exit
                                </a>
                            </div>
                        </div>

                        <!-- Bloque de Soporte / Tip -->
                        <div class="rounded-2xl border border-slate-800/50 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-5 text-xs text-slate-400 leading-relaxed">
                            <span class="block font-bold text-[#0EB3B9] uppercase font-mono mb-1.5">💡 Design Tip</span>
                            Images should ideally be 16:9 ratio with dark or transparent overlays to match the homepage carousel slider structure.
                        </div>
                    </div>

                </div>
            </form>

                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>