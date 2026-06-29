<div id="inicio" class="panel transition-all duration-300 transform">
    <div class="rounded-2xl border border-[#0EB3B9]/20 bg-gradient-to-br from-[#0EB3B9]/10 via-slate-900/40 to-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/20">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/15 text-[#0EB3B9] border border-[#0EB3B9]/25 shadow-inner">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.5 8.287 8.287 0 0 1 9 5.625a8.25 8.25 0 0 1 6.362-1.411Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 5.974 5.974 0 0 1-2.133-1A3.75 3.75 0 0 0 12 18Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5M3.75 12h16.5m-16.5 3h16.5" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight">
                        Welcome back, {{ auth()->user()->name }}
                    </h2>
                    <p class="text-sm text-slate-300 mt-1">
                        You are now in the <span class="font-semibold text-[#0EB3B9]">Core Sections</span> control panel. Manage your content, services, and site configuration from here.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
