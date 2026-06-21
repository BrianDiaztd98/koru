<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services Directory — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <!-- Luces ambientales de fondo consistentes -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Barra superior integrada -->
        @include('admin.partials.topbar', ['title' => 'Services'])

        <!-- Barra de Herramientas / Acciones Superiores -->
        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 pt-10">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-6 border-b border-slate-900">
                <div>
                    <h2 class="text-lg font-bold text-white">Services Directory</h2>
                    <p class="text-xs text-slate-400">Manage, edit, or configure live platform treatments and therapy structures.</p>
                </div>
                <div>
                    <a href="{{ route('admin.services.create') }}" 
                       class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.98]">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Create Service
                    </a>
                </div>
            </div>
        </div>

        <!-- Contenido de Tabla Principal -->
        <main class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8 py-8 flex-1">
            
            <!-- Notificaciones Flash Estilizadas -->
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-sm text-emerald-400">
                    <div class="flex gap-2.5">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Contenedor de Tabla con efecto Cristal Oscuro -->
            <div class="overflow-x-auto rounded-[2rem] border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl shadow-2xl shadow-black/50">
                <table class="min-w-full divide-y divide-slate-800/60 text-left">
                    <thead class="bg-slate-950/40">
                        <tr>
                            <th scope="col" class="px-6 py-4.5 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Service Details</th>
                            <th scope="col" class="px-6 py-4.5 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Category</th>
                            <th scope="col" class="px-6 py-4.5 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Duration</th>
                            <th scope="col" class="px-6 py-4.5 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Price</th>
                            <th scope="col" class="px-6 py-4.5 text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Status</th>
                            <th scope="col" class="px-6 py-4.5 text-right text-xs font-bold uppercase tracking-[0.2em] text-slate-400 font-mono">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/40">
                        @forelse ($services as $service)
                            <tr class="transition-colors duration-150 hover:bg-slate-900/30">
                                
                                <!-- Detalle / Info Principal -->
                                <td class="px-6 py-4.5">
                                    <div class="font-bold text-white tracking-wide">{{ $service->name_en }}</div>
                                    <div class="mt-1 text-xs font-mono text-slate-500 tracking-tight">{{ $service->slug }}</div>
                                </td>
                                
                                <!-- Categoría -->
                                <td class="px-6 py-4.5 whitespace-nowrap">
                                    <span class="inline-flex items-center rounded-lg bg-slate-950 border border-slate-800 px-2.5 py-1 text-xs font-semibold text-slate-300">
                                        {{ $service->category }}
                                    </span>
                                </td>
                                
                                <!-- Duración -->
                                <td class="px-6 py-4.5 text-sm text-slate-300 whitespace-nowrap">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <span>{{ $service->duration ?? '—' }}</span>
                                    </div>
                                </td>
                                
                                <!-- Precio -->
                                <td class="px-6 py-4.5 whitespace-nowrap">
                                    <span class="inline-flex items-center rounded-lg bg-[#0EB3B9]/10 px-2.5 py-1 text-sm font-bold text-[#0EB3B9] font-mono">
                                        ${{ number_format($service->price, 2) }}
                                    </span>
                                </td>
                                
                                <!-- Estado Activo / Inactivo -->
                                <td class="px-6 py-4.5 whitespace-nowrap">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-bold tracking-wide {{ $service->active_status ? 'bg-emerald-500/10 text-emerald-400 border border-emerald-500/20' : 'bg-slate-800/40 text-slate-500 border border-slate-800' }}">
                                        <span class="mr-1.5 h-1.5 w-1.5 rounded-full {{ $service->active_status ? 'bg-emerald-400' : 'bg-slate-600' }}"></span>
                                        {{ $service->active_status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                
                                <!-- Botones de Control Remoto -->
                                <td class="px-6 py-4.5 whitespace-nowrap text-right">
                                    <div class="flex justify-end items-center gap-2">
                                        
                                        <!-- Editar -->
                                        <a href="{{ route('admin.services.edit', $service) }}" 
                                           class="inline-flex h-9 px-3 items-center justify-center rounded-lg border border-slate-800 bg-slate-950/40 text-xs font-bold text-slate-300 transition-colors hover:bg-slate-800 hover:text-white">
                                            Edit
                                        </a>
                                        
                                        <!-- Eliminar -->
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?');" class="inline-flex">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex h-9 px-3 items-center justify-center rounded-lg border border-transparent text-xs font-bold text-slate-500 transition-colors hover:border-red-500/20 hover:bg-red-500/10 hover:text-red-400">
                                                Delete
                                            </button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <svg class="mx-auto h-8 w-8 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.008 1.24l.885 1.77a2.25 2.25 0 0 0 2.007 1.24h1.98a2.25 2.25 0 0 0 2.007-1.24l.885-1.77a2.25 2.25 0 0 1 2.007-1.24h3.86m-18 0h18M2.25 13.5l-1.054 6.33a2.25 2.25 0 0 0 2.253 2.62h15.1a2.25 2.25 0 0 0 2.253-2.62l-1.054-6.33m-16.5 0h16.5m-16.5 0z"/>
                                    </svg>
                                    <p class="mt-3 text-sm font-medium text-slate-500">No services cataloged yet.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación con margen consistente -->
            <div class="mt-8 dark-pagination">
                {{ $services->links() }}
            </div>
        </main>
    </div>
</body>
</html>