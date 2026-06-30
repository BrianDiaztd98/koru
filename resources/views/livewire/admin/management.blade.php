<div class="lg:col-span-3 space-y-8">
        <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 p-8 shadow-xl shadow-black/20">
            <div class="flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.24em] text-slate-400">Management Dashboard</p>
                    <h1 class="mt-2 text-3xl font-semibold text-white">Welcome back, {{ auth()->user()->name }}.</h1>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-400">This workspace gives you central access to core content sections, media updates, and the service catalog in a single Livewire SPA.</p>
                </div>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                    <a href="{{ route('admin.about.index') }}" class="rounded-2xl border border-slate-800/90 bg-slate-950/70 px-5 py-4 text-sm font-semibold text-slate-100 transition hover:border-[#0EB3B9]/40 hover:bg-slate-900/90">Edit About</a>
                    <a href="{{ route('admin.services.index') }}" class="rounded-2xl border border-slate-800/90 bg-slate-950/70 px-5 py-4 text-sm font-semibold text-slate-100 transition hover:border-[#0EB3B9]/40 hover:bg-slate-900/90">Manage Services</a>
                    <a href="{{ route('admin.services.create') }}" class="rounded-2xl border border-slate-800/90 bg-slate-950/70 px-5 py-4 text-sm font-semibold text-slate-100 transition hover:border-[#0EB3B9]/40 hover:bg-slate-900/90">New Service</a>
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl shadow-black/20">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-400">About Section</p>
                <div class="mt-4 text-3xl font-semibold text-white">{{ $about->exists ? 'Configured' : 'Not configured' }}</div>
                <p class="mt-3 text-sm text-slate-400">The About section is the landing page narrative and hero content for the public site.</p>
            </div>

            <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl shadow-black/20">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-400">Service Count</p>
                <div class="mt-4 text-3xl font-semibold text-white">{{ $totalServicesCount }}</div>
                <p class="mt-3 text-sm text-slate-400">Active services across all categories are available here for updates, deletions, or new entries.</p>
            </div>

            <div class="rounded-3xl border border-slate-800/80 bg-slate-900/40 p-6 shadow-xl shadow-black/20">
                <p class="text-sm uppercase tracking-[0.24em] text-slate-400">Service Categories</p>
                <div class="mt-4 space-y-3">
                    @foreach($categoryCounts as $categoryKey => $count)
                        <div class="flex items-center justify-between rounded-2xl bg-slate-950/70 px-4 py-3 text-sm text-slate-300">
                            <span>{{ $categories[$categoryKey] ?? str()->title(str_replace('_', ' ', $categoryKey)) }}</span>
                            <span class="font-semibold text-white">{{ $count }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
