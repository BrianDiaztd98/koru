<div class="lg:col-span-3 space-y-8 animate-fadeIn text-slate-200">

    <div class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#0EB3B9]/40 to-transparent"></div>

        <div class="relative z-10">
            <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">Deposit Settings</p>
            <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">
                Deposits by <span class="text-transparent bg-clip-text bg-gradient-to-r from-white via-slate-200 to-slate-400">day of the week</span>
            </h1>
            <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">
                Define the deposit percentage (initial payment) applied automatically to services and packages based on the service day. By default, Sundays apply a 50% deposit: the client pays half when booking and the rest at the appointment.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="rounded-2xl border border-emerald-500/30 bg-emerald-500/10 px-5 py-4 text-sm font-medium text-emerald-300 flex items-center gap-3">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="rounded-3xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/20 space-y-6">
        <div class="flex items-center justify-between">
            <h2 class="font-mono text-xs font-bold uppercase tracking-wider text-slate-500">Deposit by day</h2>
            <span class="text-[11px] text-slate-500">Allowed range: 0% – 100%</span>
        </div>

        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($days as $dayOfWeek => $dayKey)
                <div class="rounded-2xl border border-slate-800/60 bg-slate-950/40 p-4 flex flex-col gap-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-semibold text-slate-200">{{ $dayLabels[$dayOfWeek] ?? $dayKey }}</span>
                        <label class="inline-flex items-center gap-2 cursor-pointer text-xs text-slate-400">
                            <input type="checkbox" wire:model="activeStatuses.{{ $dayOfWeek }}"
                                   class="rounded border-slate-700 bg-slate-900 text-[#0EB3B9] focus:ring-[#0EB3B9]" />
                            Active
                        </label>
                    </div>

                    <div class="relative">
                        <input type="number" min="0" max="100" step="0.01"
                               wire:model="percentages.{{ $dayOfWeek }}"
                               placeholder="0"
                               class="w-full rounded-xl border border-slate-800 bg-slate-950/60 px-3 py-2.5 pr-9 text-sm text-slate-200 focus:border-[#0EB3B9] focus:outline-none focus:ring-1 focus:ring-[#0EB3B9]" />
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-sm font-mono text-slate-500">%</span>
                    </div>

                    @error("percentages.{$dayOfWeek}")
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        </div>

        <div class="flex items-center justify-end gap-3 pt-2">
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-800/80 bg-[#0EB3B9] px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
                Save settings
            </button>
        </div>
    </form>
</div>



