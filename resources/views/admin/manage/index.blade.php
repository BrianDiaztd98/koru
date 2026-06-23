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

                <!-- SIDEBAR: Navegación de Entornos de Contenido -->
                <aside
                    class="lg:col-span-1 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-5 shadow-xl shadow-black/20 space-y-6 sticky top-6">
                    <div>
                        <h3
                            class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
                            Core Sections</h3>
                        <nav class="space-y-4 mt-4">
                            <button data-target="about"
                                class="w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 cursor-pointer sidebar-link"
                                aria-current="false">
                                <span class="flex items-center gap-2.5">
                                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                    About Section
                                </span>
                                <span class="w-1.5 h-1.5 rounded-full bg-current opaque-dot"></span>
                            </button>

                            <div class="space-y-3">
                                <button data-target="service-pillars"
                                    class="w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border border-slate-800/70 bg-slate-900/80 transition-all duration-200 cursor-pointer sidebar-link"
                                    aria-current="false">
                                    <span class="flex items-center gap-2.5">
                                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        Service Pillars
                                    </span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-current opaque-dot"></span>
                                </button>
                                <button data-target="other-services"
                                    class="w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border border-slate-800/70 bg-slate-900/80 transition-all duration-200 cursor-pointer sidebar-link"
                                    aria-current="false">
                                    <span class="flex items-center gap-2.5">
                                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Other Services
                                    </span>
                                    <span class="w-1.5 h-1.5 rounded-full bg-current opaque-dot"></span>
                                </button>
                            </div>
                        </nav>
                    </div>

                    <div
                        class="pt-4 border-t border-slate-800/50 flex gap-2.5 items-start text-[11px] text-slate-400 leading-relaxed">
                        <svg class="w-4 h-4 text-[#0EB3B9] shrink-0 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <span>Switch dynamic contexts smoothly without triggering global page mutations or losing
                            ongoing uncommitted state matrices.</span>
                    </div>
                </aside>

                <!-- CONTENEDOR DE PANELES -->
                <section class="lg:col-span-3">

                    <!-- PANEL 1: About Form Section -->
                    <div id="about" class="panel transition-all duration-300 transform">
                        <div
                            class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/20 space-y-8">

                            <div class="flex items-center gap-4 pb-5 border-b border-slate-800/60">
                                <div
                                    class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-white tracking-tight">About Section</h2>
                                    <p class="text-xs text-slate-400 mt-0.5">Edit the singleton copywriting fields and
                                        media assets for the main landing block.</p>
                                </div>
                            </div>

                            <!-- About preview: reuse index layout (read-only) -->

                            <!-- Alert System -->
                            @if (session('success'))
                                <div
                                    class="mb-6 rounded-xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-sm text-emerald-400 backdrop-blur-md flex items-center gap-3">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div
                                    class="mb-6 rounded-xl border border-rose-500/30 bg-rose-500/10 px-5 py-4 text-sm text-rose-400 backdrop-blur-md flex items-center gap-3">
                                    <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="space-y-6">
                                <div
                                    class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-3 bg-[#0EB3B9] rounded-full"></span>
                                            <h2 class="text-xl font-bold text-white tracking-tight">About Us Section
                                            </h2>
                                        </div>
                                        <p class="text-sm text-slate-400 mt-1">Manage the core philosophical, vision
                                            statements and dynamic assets for Koru.</p>
                                    </div>

                                    <a href="{{ route('admin.about.edit') }}"
                                        class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 shrink-0">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                        Edit Information
                                    </a>
                                </div>

                                <div class="grid gap-6 lg:grid-cols-3 items-start">

                                    <div class="lg:col-span-2 space-y-4">
                                        <div
                                            class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20">
                                            <h3
                                                class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono mb-6 pb-2 border-b border-slate-800/50">
                                                Core Copywriting</h3>

                                            <div class="space-y-6">
                                                <div class="bg-slate-950/40 border border-slate-800/60 rounded-xl p-4">
                                                    <span
                                                        class="block text-xs font-mono uppercase tracking-wider text-slate-500 mb-1">Section
                                                        Main Title</span>
                                                    <span
                                                        class="text-base font-medium text-slate-100">{{ $about->title ?? 'Not initialized' }}</span>
                                                </div>

                                                <div class="bg-slate-950/40 border border-slate-800/60 rounded-xl p-4">
                                                    <span
                                                        class="block text-xs font-mono uppercase tracking-wider text-slate-500 mb-1.5">Philosophy
                                                        Statement</span>
                                                    <p class="text-sm text-slate-300 leading-relaxed">
                                                        {{ $about->philosophy ?? 'No philosophy content has been populated yet.' }}
                                                    </p>
                                                </div>

                                                <div class="bg-slate-950/40 border border-slate-800/60 rounded-xl p-4">
                                                    <span
                                                        class="block text-xs font-mono uppercase tracking-wider text-slate-500 mb-1.5">Corporate
                                                        Vision</span>
                                                    <p class="text-sm text-slate-300 leading-relaxed">
                                                        {{ $about->vision ?? 'No vision statement has been populated yet.' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-y-4">
                                        <div
                                            class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20">
                                            <h3
                                                class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono mb-6 pb-2 border-b border-slate-800/50">
                                                Global Graphics (3)</h3>

                                            <div class="space-y-4">
                                                @for ($i = 1; $i <= 3; $i++)
                                                    <div
                                                        class="bg-slate-950/40 border border-slate-800/60 rounded-xl p-3 flex items-center gap-4">
                                                        <div
                                                            class="w-16 h-16 shrink-0 rounded-lg overflow-hidden border border-slate-700 bg-slate-900 flex items-center justify-center">
                                                            @if ($about->{'image_' . $i})
                                                                <img src="{{ str_starts_with($about->{'image_' . $i}, 'img/') ? asset($about->{'image_' . $i}) : asset('storage/' . $about->{'image_' . $i}) }}"
                                                                    alt="Image {{ $i }}"
                                                                    class="h-full w-full object-cover">
                                                            @else
                                                                <svg class="w-5 h-5 text-slate-600" fill="none"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375 0 1 1-.75 0 .375 0 0 1 .75 0Z" />
                                                                </svg>
                                                            @endif
                                                        </div>
                                                        <div class="overflow-hidden">
                                                            <span
                                                                class="block text-xs font-mono font-bold text-slate-400">Slot-0{{ $i }}</span>
                                                            <span
                                                                class="text-xs text-slate-500 block truncate max-w-[150px]">{{ $about->{'image_' . $i} ? basename($about->{'image_' . $i}) : 'No file linked' }}</span>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="service-pillars" class="panel transition-all duration-300 transform hidden">
                        <div
                            class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-5 border-b border-slate-800/60 gap-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-xl font-bold text-white tracking-tight">Service Pillars</h2>
                                        <p class="text-xs text-slate-400 mt-0.5">All Massage, Therapy, Medical and Koru
                                            At Home services in one index.</p>
                                    </div>
                                </div>
                                <a href="{{ route('admin.services.create') }}"
                                    class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 shrink-0">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Add Service
                                </a>
                            </div>

                            @php
                                $pillarServices = collect();
                                foreach ($serviceGroups['Service Pillars'] as $key) {
                                    foreach ($services[$key] ?? [] as $service) {
                                        $pillarServices->push([
                                            'service' => $service,
                                            'category_key' => $key,
                                            'category_label' => $categories[$key] ?? ucfirst(str_replace('_', ' ', $key)),
                                        ]);
                                    }
                                }
                            @endphp

                            <div class="rounded-2xl border border-slate-800/80 bg-slate-950/20 p-5">
                                <div
                                    class="overflow-hidden rounded-xl border border-slate-800/60 bg-slate-900/40 shadow-inner">
                                    <div class="overflow-x-auto">
                                        <table
                                            class="min-w-full divide-y divide-slate-800/60 text-left text-sm">
                                            <thead
                                                class="bg-slate-950/60 font-mono text-xs uppercase tracking-wider text-slate-400">
                                                <tr>
                                                    <th class="px-5 py-3.5 font-bold">Category</th>
                                                    <th class="px-5 py-3.5 font-bold">Service Info</th>
                                                    <th class="px-5 py-3.5 font-bold">Duration</th>
                                                    <th class="px-5 py-3.5 font-bold">Rate</th>
                                                    <th class="px-5 py-3.5 font-bold">Status</th>
                                                    <th class="px-5 py-3.5 font-bold text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-slate-800/40">
                                                @forelse($pillarServices as $item)
                                                    @php
                                                        $service = $item['service'];
                                                        $categoryLabel = $item['category_label'];
                                                    @endphp
                                                    <tr
                                                        class="hover:bg-slate-900/30 transition-colors duration-150 group">
                                                        <td class="px-5 py-4">
                                                            <span
                                                                class="inline-flex items-center text-xs font-semibold text-slate-300 bg-slate-900 px-2.5 py-1 rounded-md border border-slate-800/60">
                                                                {{ $categoryLabel }}
                                                            </span>
                                                        </td>
                                                        <td class="px-5 py-4">
                                                            <div
                                                                class="font-bold text-white group-hover:text-[#0EB3B9] transition-colors duration-150">
                                                                {{ $service->name_en }}</div>
                                                            <div
                                                                class="text-xs text-slate-500 font-mono mt-0.5">
                                                                {{ $service->slug }}</div>
                                                        </td>
                                                        <td class="px-5 py-4">
                                                            <span
                                                                class="inline-flex items-center gap-1.5 font-mono text-xs text-slate-300 bg-slate-900 px-2 py-1 rounded-md border border-slate-800/60">
                                                                <svg class="w-3 h-3 text-slate-500"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="2" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                {{ $service->duration ?? '—' }}
                                                            </span>
                                                        </td>
                                                        <td class="px-5 py-4 font-mono text-white font-medium">
                                                            ${{ number_format($service->price, 2) }}</td>
                                                        <td class="px-5 py-4">
                                                            @if ($service->active_status)
                                                                <span
                                                                    class="inline-flex items-center gap-1.5 text-[11px] font-bold font-mono tracking-wide uppercase text-emerald-400 bg-emerald-500/5 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                                    Active
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="inline-flex items-center gap-1.5 text-[11px] font-bold font-mono tracking-wide uppercase text-slate-400 bg-slate-800/30 border border-slate-800/60 px-2.5 py-0.5 rounded-full">
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                                                    Inactive
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="px-5 py-4 text-right">
                                                            <a href="{{ route('admin.services.edit', $service) }}"
                                                                class="inline-flex items-center justify-center rounded-lg border border-slate-800 bg-slate-950/40 px-3 py-1.5 text-xs font-semibold text-slate-300 backdrop-blur-sm transition-all duration-150 hover:bg-slate-900 hover:border-slate-700 hover:text-white">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6"
                                                            class="px-6 py-16 text-center text-slate-500 font-medium">
                                                            <div
                                                                class="flex flex-col items-center justify-center gap-2">
                                                                <svg class="w-8 h-8 text-slate-700"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                                </svg>
                                                                <span>No services exist yet.</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="other-services" class="panel transition-all duration-300 transform hidden">
                            <div
                                class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-6">
                                <div
                                    class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-5 border-b border-slate-800/60 gap-4">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-xl font-bold text-white tracking-tight">Other Services</h2>
                                            <p class="text-xs text-slate-400 mt-0.5">Manage Booster Shots and IV
                                                Therapy services.</p>
                                        </div>
                                    </div>
                                    <div class="grid gap-2 sm:grid-cols-2 lg:grid-cols-2">
                                        @foreach ($serviceGroups['Other Services'] as $key)
                                            <a href="{{ route('admin.services.create', ['category' => $key]) }}"
                                                class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-3 py-2 text-xs font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">
                                                Add {{ $categories[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="space-y-6">
                                    @foreach ($serviceGroups['Other Services'] as $key)
                                        <div class="rounded-2xl border border-slate-800/80 bg-slate-950/20 p-5">
                                            <div class="flex items-center justify-between gap-4 mb-5">
                                                <div>
                                                    <h3
                                                        class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">
                                                        {{ $categories[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}
                                                    </h3>
                                                </div>
                                            </div>

                                            <div
                                                class="overflow-hidden rounded-xl border border-slate-800/60 bg-slate-900/40 shadow-inner">
                                                <div class="overflow-x-auto">
                                                    <table
                                                        class="min-w-full divide-y divide-slate-800/60 text-left text-sm">
                                                        <thead
                                                            class="bg-slate-950/60 font-mono text-xs uppercase tracking-wider text-slate-400">
                                                            <tr>
                                                                <th class="px-5 py-3.5 font-bold">Service Info</th>
                                                                <th class="px-5 py-3.5 font-bold">Duration</th>
                                                                <th class="px-5 py-3.5 font-bold">Rate</th>
                                                                <th class="px-5 py-3.5 font-bold">Status</th>
                                                                <th class="px-5 py-3.5 font-bold text-right">Actions
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="divide-y divide-slate-800/40">
                                                            @forelse($services[$key] ?? [] as $service)
                                                                <tr
                                                                    class="hover:bg-slate-900/30 transition-colors duration-150 group">
                                                                    <td class="px-5 py-4">
                                                                        <div
                                                                            class="font-bold text-white group-hover:text-[#0EB3B9] transition-colors duration-150">
                                                                            {{ $service->name_en }}</div>
                                                                        <div
                                                                            class="text-xs text-slate-500 font-mono mt-0.5">
                                                                            {{ $service->slug }}</div>
                                                                    </td>
                                                                    <td class="px-5 py-4">
                                                                        <span
                                                                            class="inline-flex items-center gap-1.5 font-mono text-xs text-slate-300 bg-slate-900 px-2 py-1 rounded-md border border-slate-800/60">
                                                                            <svg class="w-3 h-3 text-slate-500"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="2" viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                            </svg>
                                                                            {{ $service->duration ?? '—' }}
                                                                        </span>
                                                                    </td>
                                                                    <td
                                                                        class="px-5 py-4 font-mono text-white font-medium">
                                                                        ${{ number_format($service->price, 2) }}</td>
                                                                    <td class="px-5 py-4">
                                                                        @if ($service->active_status)
                                                                            <span
                                                                                class="inline-flex items-center gap-1.5 text-[11px] font-bold font-mono tracking-wide uppercase text-emerald-400 bg-emerald-500/5 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">
                                                                                <span
                                                                                    class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                                                                                Active
                                                                            </span>
                                                                        @else
                                                                            <span
                                                                                class="inline-flex items-center gap-1.5 text-[11px] font-bold font-mono tracking-wide uppercase text-slate-400 bg-slate-800/30 border border-slate-800/60 px-2.5 py-0.5 rounded-full">
                                                                                <span
                                                                                    class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                                                                                Inactive
                                                                            </span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="px-5 py-4 text-right">
                                                                        <a href="{{ route('admin.services.edit', $service) }}"
                                                                            class="inline-flex items-center justify-center rounded-lg border border-slate-800 bg-slate-950/40 px-3 py-1.5 text-xs font-semibold text-slate-300 backdrop-blur-sm transition-all duration-150 hover:bg-slate-900 hover:border-slate-700 hover:text-white">
                                                                            Edit
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="5"
                                                                        class="px-6 py-16 text-center text-slate-500 font-medium">
                                                                        <div
                                                                            class="flex flex-col items-center justify-center gap-2">
                                                                            <svg class="w-8 h-8 text-slate-700"
                                                                                fill="none" stroke="currentColor"
                                                                                stroke-width="1.5"
                                                                                viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                                            </svg>
                                                                            <span>No services exist for this category
                                                                                yet.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
                    e.preventDefault();
                    switchContext(link.dataset.target);
                });
            });

            // Forzar el estado inicial exacto
            switchContext('about');
        });
    </script>
</body>

</html>
