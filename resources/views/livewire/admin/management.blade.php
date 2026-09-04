<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="space-y-6 text-slate-200">

    <div class="admin-card">
        <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#02B8BC]">Management Dashboard</p>
                <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">
                    Welcome back, <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">{{ auth()->user()->name }}</span>.
                </h1>
                <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">
                    This workspace gives you central access to core content sections, media updates, and the service catalog in a single Livewire SPA.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3 shrink-0">
                <a href="{{ route('admin.about.index') }}" class="group flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 px-5 py-3.5 text-xs font-mono font-bold uppercase tracking-wider text-slate-300 transition-all duration-200 hover:border-[#02B8BC]/40 hover:bg-[#02B8BC]/5 hover:text-[#02B8BC] active:scale-[0.98]">
                    <svg class="w-4 h-4 mr-2 text-slate-500 group-hover:text-[#02B8BC] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                    Edit About
                </a>
                <a href="{{ route('admin.services.index') }}" class="group flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 px-5 py-3.5 text-xs font-mono font-bold uppercase tracking-wider text-slate-300 transition-all duration-200 hover:border-[#02B8BC]/40 hover:bg-[#02B8BC]/5 hover:text-[#02B8BC] active:scale-[0.98]">
                    <svg class="w-4 h-4 mr-2 text-slate-500 group-hover:text-[#02B8BC] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zM3.75 12h.007v.008H3.75V12zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm-3.75 5.25h.007v.008H3.75v-.008zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    Services
                </a>
                <a href="{{ route('admin.services.create') }}" class="admin-btn-primary font-mono text-xs uppercase tracking-wider px-5 py-3.5">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    New Service
                </a>
            </div>
        </div>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <div class="admin-card flex flex-col justify-between space-y-4">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">About Section</p>
                <div class="mt-4 flex items-center gap-3">
                    @if ($about->exists)
                        <span class="flex items-center gap-2 rounded-lg bg-emerald-500/10 border border-emerald-500/20 px-3 py-1.5">
                            <span class="h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span class="font-mono text-xs font-bold uppercase text-emerald-400 tracking-wider">Configured</span>
                        </span>
                    @else
                        <span class="flex items-center gap-2 rounded-lg bg-amber-500/10 border border-amber-500/20 px-3 py-1.5">
                            <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                            <span class="font-mono text-xs font-bold uppercase text-amber-400 tracking-wider">Pending</span>
                        </span>
                    @endif
                </div>
            </div>
            <p class="text-xs leading-relaxed text-slate-400">
                Controls the landing page narrative, corporate philosophy, and core hero media for the public portal.
            </p>
        </div>

        <div class="admin-card flex flex-col justify-between space-y-4">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Service Count</p>
                <div class="mt-3 flex items-baseline gap-2">
                    <span class="text-4xl font-black text-white tracking-tight">{{ $totalServicesCount }}</span>
                    <span class="font-mono text-xs text-[#02B8BC] uppercase font-bold tracking-widest">Active Units</span>
                </div>
            </div>
            <p class="text-xs leading-relaxed text-slate-400">
                Active clinical and sports disciplines currently structuralized across all public system registries.
            </p>
        </div>

        <div class="admin-card flex flex-col justify-between space-y-4">
            <div>
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Package Count</p>
                <div class="mt-3 flex items-baseline gap-2">
                    <span class="text-4xl font-black text-white tracking-tight">{{ $totalPackagesCount }}</span>
                    <span class="font-mono text-xs text-[#02B8BC] uppercase font-bold tracking-widest">Active Plans</span>
                </div>
            </div>
            <p class="text-xs leading-relaxed text-slate-400">
                Therapeutic plans and bundle packages available for instant booking on the public user portal.
            </p>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3">

        <div class="admin-card lg:col-span-2 space-y-6"
             x-data="{
                chartInstance: null,
                init() {
                    const canvas = this.$refs.canvasVisitas;
                    if (!canvas) return;

                    // Leemos los valores limpios desde los data attributes del HTML
                    const labels = JSON.parse(canvas.getAttribute('data-chart-labels'));
                    const values = JSON.parse(canvas.getAttribute('data-chart-values'));

                    this.chartInstance = new Chart(canvas, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Visits',
                                data: values,
                                backgroundColor: 'rgba(14, 179, 185, 0.8)',
                                borderColor: 'rgba(14, 179, 185, 1)',
                                borderWidth: 1,
                                borderRadius: 6,
                            }],
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: { color: '#94a3b8', font: { size: 11 } },
                                    grid: { color: 'rgba(148, 163, 184, 0.1)' },
                                },
                                x: {
                                    ticks: { color: '#94a3b8', font: { size: 11 } },
                                    grid: { display: false },
                                },
                            },
                            plugins: {
                                legend: { display: false },
                            },
                        },
                    });
                }
             }">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div>
                    <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Landing Page Visits</p>
                    <div class="mt-3 flex items-baseline gap-2">
                        <span class="text-4xl font-black text-white tracking-tight">{{ $landingPageVisitStats['total'] }}</span>
                        <span class="font-mono text-xs text-[#02B8BC] uppercase font-bold tracking-widest">Visits in {{ $selectedYear }}</span>
                    </div>
                </div>

                <form method="GET" action="{{ route('admin.management.index') }}" class="flex items-center gap-2">
                    <label for="year" class="sr-only">Filter by year</label>
                    <select id="year" name="year"
                        class="rounded-xl border border-slate-800 bg-slate-950/60 px-3 py-2 text-sm text-slate-200 focus:border-[#02B8BC] focus:outline-none">
                        @foreach ($landingPageVisitStats['availableYears'] as $yearOption)
                            <option value="{{ $yearOption }}" @selected($selectedYear == $yearOption)>{{ $yearOption }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="rounded-xl border border-slate-800 bg-slate-950/60 px-3 py-2 text-sm font-semibold text-slate-300 transition hover:border-[#02B8BC]/40 hover:text-[#02B8BC]">
                        Apply
                    </button>
                </form>
            </div>

            <div class="relative h-64 w-full">
                <canvas
                    x-ref="canvasVisitas"
                    data-chart-labels='@json(collect($landingPageVisitStats['monthly'])->pluck('label')->all())'
                    data-chart-values='@json(collect($landingPageVisitStats['monthly'])->pluck('visits')->all())'
                ></canvas>
            </div>
        </div>

        <div class="admin-card flex flex-col justify-between space-y-4">
            <div class="space-y-4 w-full">
                <p class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Service Categories</p>

                <div class="max-h-[310px] overflow-y-auto pr-2 koru-scrollbar divide-y divide-slate-800/50">
                    @foreach ($categoryCounts as $categoryKey => $count)
                        <div class="group flex items-center justify-between py-2.5 text-sm">
                            <span class="font-medium text-slate-300 group-hover:text-white transition-colors">
                                {{ $categories[$categoryKey] ?? str()->title(str_replace('_', ' ', $categoryKey)) }}
                            </span>
                            <span class="font-mono font-bold text-white bg-slate-900 border border-slate-800/80 rounded-md px-2 py-0.5 text-xs">
                                {{ $count }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="text-[11px] text-slate-500 leading-tight">
                Distribution metrics based on current live taxonomy mappings.
            </p>
        </div>

    </div>
</div>
