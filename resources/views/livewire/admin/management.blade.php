<div class="lg:col-span-3 space-y-8 animate-fadeIn">

    <div
        class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 relative overflow-hidden">
        <div
            class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#0EB3B9]/40 to-transparent">
        </div>

        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between relative z-10">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Management Dashboard
                </p>
                <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">
                    Welcome back, <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">{{ auth()->user()->name }}</span>.
                </h1>
                <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">
                    This workspace gives you central access to core content sections, media updates, and the service
                    catalog in a single Livewire SPA.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3 shrink-0">
                <a href="{{ route('admin.about.index') }}"
                    class="group flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 px-5 py-3.5 text-xs font-mono font-bold uppercase tracking-wider text-slate-300 transition-all duration-200 hover:border-[#0EB3B9]/40 hover:bg-[#0EB3B9]/5 hover:text-[#0EB3B9] active:scale-[0.98]">
                    <svg class="w-4 h-4 mr-2 text-slate-500 group-hover:text-[#0EB3B9] transition-colors" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Edit About
                </a>
                <a href="{{ route('admin.services.index') }}"
                    class="group flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 px-5 py-3.5 text-xs font-mono font-bold uppercase tracking-wider text-slate-300 transition-all duration-200 hover:border-[#0EB3B9]/40 hover:bg-[#0EB3B9]/5 hover:text-[#0EB3B9] active:scale-[0.98]">
                    <svg class="w-4 h-4 mr-2 text-slate-500 group-hover:text-[#0EB3B9] transition-colors" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    Services
                </a>
                <a href="{{ route('admin.services.create') }}"
                    class="group flex items-center justify-center rounded-xl border border-slate-800/80 bg-[#0EB3B9] px-5 py-3.5 text-xs font-mono font-bold uppercase tracking-wider text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    New Service
                </a>
            </div>
        </div>
    </div>

    <div class="grid gap-6 xl:grid-cols-3">

        <div
            class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 shadow-xl shadow-black/20 flex flex-col justify-between space-y-6">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">About Section</p>

                <div class="mt-4 flex items-center gap-3">
                    @if ($about->exists)
                        <div
                            class="flex items-center gap-2 rounded-lg bg-emerald-500/10 border border-emerald-500/20 px-3 py-1.5">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span
                                class="font-mono text-xs font-bold uppercase text-emerald-400 tracking-wider">Configured</span>
                        </div>
                    @else
                        <div
                            class="flex items-center gap-2 rounded-lg bg-amber-500/10 border border-amber-500/20 px-3 py-1.5">
                            <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                            <span
                                class="font-mono text-xs font-bold uppercase text-amber-400 tracking-wider">Pending</span>
                        </div>
                    @endif
                </div>
            </div>
            <p class="text-sm leading-relaxed text-slate-400">
                The About section controls the landing page narrative, corporate philosophy, and core hero media for the
                public portal.
            </p>
        </div>

        <div
            class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 shadow-xl shadow-black/20 flex flex-col justify-between space-y-6">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Service Count</p>
                <div class="mt-4 flex items-baseline gap-2">
                    <span class="text-4xl font-black text-white tracking-tight">{{ $totalServicesCount }}</span>
                    <span class="font-mono text-xs text-[#0EB3B9] uppercase font-bold tracking-widest">Active
                        Units</span>
                </div>
            </div>
            <p class="text-sm leading-relaxed text-slate-400">
                Active clinical and sports disciplines currently structuralized across all public system registries.
            </p>
        </div>

        <div
            class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-4">
            <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Service Categories</p>

            <!-- Contenedor 100% dinámico utilizando tu nueva clase de CSS -->
            <div class="space-y-2.5 max-h-[180px] overflow-y-auto pr-2 koru-scrollbar">
                @foreach ($categoryCounts as $categoryKey => $count)
                    <div
                        class="group flex items-center justify-between rounded-xl bg-slate-950/40 border border-slate-800/50 px-4 py-3 text-sm text-slate-300 transition-colors hover:border-slate-800 hover:bg-slate-950/80 relative overflow-hidden">
                        <!-- Indicador izquierdo de acento -->
                        <div
                            class="absolute left-0 top-0 bottom-0 w-[2px] bg-slate-800 group-hover:bg-[#0EB3B9] transition-colors">
                        </div>

                        <span class="pl-1 font-medium text-slate-300 group-hover:text-white transition-colors">
                            {{ $categories[$categoryKey] ?? str()->title(str_replace('_', ' ', $categoryKey)) }}
                        </span>
                        <span
                            class="font-mono font-bold text-white bg-slate-900 border border-slate-800/80 rounded-md px-2 py-0.5 text-xs">
                            {{ $count }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
