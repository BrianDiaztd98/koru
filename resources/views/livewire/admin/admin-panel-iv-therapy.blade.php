<div id="iv_therapy" class="panel transition-all duration-300 transform hidden">
    <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-5 border-b border-slate-800/60 gap-4">
            <div class="flex items-center gap-4">
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white tracking-tight">{{ $categories['iv_therapy'] ?? 'IV Therapy' }}</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Manage IV Therapy services.</p>
                </div>
            </div>
            <div>
                <a href="{{ route('admin.services.create', ['category' => 'iv_therapy']) }}" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-3 py-2 text-xs font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98]">Add {{ $categories['iv_therapy'] ?? 'IV Therapy' }}</a>
            </div>
        </div>

        <div class="space-y-6">
            <div class="rounded-2xl border border-slate-800/80 bg-slate-950/20 p-5">
                <div class="flex items-center justify-between gap-4 mb-5">
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.24em] text-slate-400">{{ $categories['iv_therapy'] ?? 'IV Therapy' }}</h3>
                    </div>
                </div>

                <div class="overflow-hidden rounded-xl border border-slate-800/60 bg-slate-900/40 shadow-inner">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-slate-800/60 text-left text-sm">
                            <thead class="bg-slate-950/60 font-mono text-xs uppercase tracking-wider text-slate-400">
                                <tr>
                                    <th class="px-5 py-3.5 font-bold">Service Info</th>
                                    <th class="px-5 py-3.5 font-bold">Duration</th>
                                    <th class="px-5 py-3.5 font-bold">Rate</th>
                                    <th class="px-5 py-3.5 font-bold">Status</th>
                                    <th class="px-5 py-3.5 font-bold text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-800/40">
                                @forelse($services as $service)
                                    <tr class="hover:bg-slate-900/30 transition-colors duration-150 group">
                                        <td class="px-5 py-4">
                                            <div class="font-bold text-white group-hover:text-[#0EB3B9] transition-colors duration-150">{{ $service->name_en }}</div>
                                            <div class="text-xs text-slate-500 font-mono mt-0.5">{{ $service->slug }}</div>
                                        </td>
                                        <td class="px-5 py-4"><span class="inline-flex items-center gap-1.5 font-mono text-xs text-slate-300 bg-slate-900 px-2 py-1 rounded-md border border-slate-800/60">{{ $service->duration ?? '-' }}</span></td>
                                        <td class="px-5 py-4 font-mono text-white font-medium">${{ number_format($service->price, 2) }}</td>
                                        <td class="px-5 py-4">
                                            @if ($service->active_status)
                                                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wide text-emerald-400 bg-emerald-500/5 border border-emerald-500/20 px-2.5 py-0.5 rounded-full">Active</span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 text-[11px] font-bold uppercase tracking-wide text-slate-400 bg-slate-800/30 border border-slate-800/60 px-2.5 py-0.5 rounded-full">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-4 text-right">
                                            <a href="{{ route('admin.services.edit', $service) }}" class="inline-flex items-center justify-center rounded-lg border border-slate-800 bg-slate-950/40 px-3 py-1.5 text-xs font-semibold text-slate-300 hover:bg-slate-900 hover:text-white transition-all duration-150">Edit</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-16 text-center text-slate-500 font-medium">
                                            <div class="flex flex-col items-center justify-center gap-2">
                                                <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                                </svg>
                                                <span>No services exist for this category yet.</span>
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
    </div>
</div>
