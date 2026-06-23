<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit About — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos Premium Interceptores para el contenedor .admin-form-inputs -->
    <style>
        /* Corrección Base para Inputs, Selects y Textareas dentro de los formularios del Admin */
        .admin-form-inputs select,
        .admin-form-inputs input[type="text"],
        .admin-form-inputs input[type="number"],
        .admin-form-inputs textarea {
            width: 100%;
            background-color: #020617 !important; /* bg-slate-950 */
            border: 1px solid rgba(51, 65, 85, 0.8) !important; /* border-slate-700 */
            border-radius: 0.75rem !important; /* rounded-xl */
            padding: 0.75rem 1rem !important;
            color: #f8fafc !important; /* text-slate-50 */
            font-size: 0.875rem !important; /* text-sm */
            transition: all 0.2s ease-in-out !important;
            outline: none !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.4) !important;
        }

        .admin-form-inputs select:focus,
        .admin-form-inputs input[type="text"]:focus,
        .admin-form-inputs input[type="number"]:focus,
        .admin-form-inputs textarea:focus {
            border-color: #0EB3B9 !important;
            box-shadow: 0 0 0 2px rgba(14, 179, 185, 0.15), inset 0 2px 4px 0 rgba(0, 0, 0, 0.4) !important;
        }

        /* Estilizado de Labels Tradicionales a Mono-industrial */
        .admin-form-inputs label {
            display: block !important;
            font-size: 0.75rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
            color: #94a3b8 !important; /* text-slate-400 */
            margin-bottom: 0.5rem !important;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
        }

        /* Input File Customizer */
        .admin-form-inputs input[type="file"] {
            width: 100%;
            font-size: 0.75rem !important;
            color: #94a3b8 !important;
            background-color: #020617 !important;
            border: 1px solid rgba(51, 65, 85, 0.8) !important;
            border-radius: 0.75rem !important;
            padding: 0.375rem !important;
            box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.4) !important;
        }

        .admin-form-inputs input[type="file"]::file-selector-button {
            margin-right: 1rem;
            border-radius: 0.5rem;
            border: 0;
            background-color: rgba(14, 179, 185, 0.1) !important;
            padding: 0.625rem 1rem;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            color: #0EB3B9 !important;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
        }

        .admin-form-inputs input[type="file"]::file-selector-button:hover {
            background-color: rgba(14, 179, 185, 0.2) !important;
        }

        /* Manejo de switches o checkboxes nativos alternativos */
        .admin-form-inputs input[type="checkbox"] {
            cursor: pointer;
        }
    </style>
</head>

<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">

    <!-- Luces ambientales de fondo estilo consola clínica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior integrada -->
        @include('admin.partials.topbar', ['title' => 'Edit About'])

        <!-- Contenedor Principal -->
        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-10 flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">

                @include('admin.partials.sidebar', ['activeTarget' => 'about'])

                <div class="lg:col-span-3">

            <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if ($about->id)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 items-start">

                    <!-- COLUMNA PRINCIPAL (Formulario Base con Datos Existentes) -->
                    <div class="lg:col-span-2 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/20 space-y-6">

                        <!-- Encabezado de la Sección Interna -->
                        <div class="flex items-center gap-4 pb-4 border-b border-slate-800/60">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-white tracking-tight">Edit About Section</h2>
                                <p class="text-sm text-slate-400 mt-0.5">Modify the core copywriting and media structures for the landing page.</p>
                            </div>
                        </div>

                        <!-- Contenedor del Formulario sin colisiones de clases .prose -->
                        <div class="admin-form-inputs text-slate-200">
                            @include('admin.about._form')
                        </div>
                    </div>

                    <!-- COLUMNA LATERAL (Bloque de Control y Estado) -->
                    <div class="space-y-4">

                        <!-- Tarjeta de Guardado Rápido -->
                        <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-4">
                            <h3 class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2 border-b border-slate-800/50">
                                Update State
                            </h3>

                            <!-- Información del recurso -->
                            <div class="p-3.5 rounded-xl bg-slate-950/50 border border-slate-800/60 space-y-2 text-xs text-slate-400">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Created:</span>
                                    <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">
                                        {{ $about->created_at?->format('Y-m-d') ?? 'Unsaved' }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium">Last Update:</span>
                                    <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">
                                        {{ $about->updated_at?->format('H:i') ?? 'N/A' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Botones de Acción -->
                            <div class="pt-2 flex flex-col gap-3">
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182" />
                                    </svg>
                                    {{ $about->id ? 'Update Changes' : 'Create Record' }}
                                </button>

                                <a href="{{ route('admin.about.index') }}"
                                    class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3 text-sm font-semibold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                                    Cancel Changes
                                </a>
                            </div>
                        </div>

                        <!-- Recordatorio Técnico Singleton -->
                        <div class="rounded-2xl border border-slate-800/60 bg-gradient-to-br from-[#0EB3B9]/5 to-transparent p-5 text-xs text-slate-400 leading-relaxed shadow-lg">
                            <div class="flex items-center gap-2 text-[#0EB3B9] font-bold uppercase font-mono mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#0EB3B9] animate-pulse"></span>
                                Architecture Rule
                            </div>
                            The <span class="text-slate-200 font-medium">About Us</span> structure is compiled as a singleton core element. Modifying these constraints maps direct structural mutations across the global public web layout.
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