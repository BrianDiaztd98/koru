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
