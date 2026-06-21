<section id="iv-lounge" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_20%,_var(--tw-gradient-stops))] from-[#0E788D]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-start mb-16" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div>
                <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                    IV Lounge
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Advanced IV therapy for hydration, recovery and wellness.
                </h2>
                <p class="mt-4 max-w-2xl text-base text-slate-400">
                    Each lounge drip is formulated for targeted recovery, energy, and immune support with strict medical guidance and evidence-based nutrient dosing.
                </p>
            </div>
            
            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-5 backdrop-blur-sm">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-3 flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9]"></span>
                    IV Lounge Highlights
                </h3>
                <ul class="space-y-2.5 text-xs text-slate-400">
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#0EB3B9] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Premium hydration with physician-led protocols.
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#0EB3B9] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Custom blends for fatigue, performance and immunity.
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#0EB3B9] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Fast absorption & maximum cellular bioavailability.
                    </li>
                </ul>
            </div>
        </div>

        <div class="grid gap-8 lg:grid-cols-12 items-stretch" 
             x-data="{ 
                activeDrip: 0,
                currentPage: 1,
                perPage: 4,
                totalDrips: {{ count($ivDrips) }},
                get totalPages() { return Math.ceil(this.totalDrips / this.perPage) },
                isInPage(index) {
                    return index >= (this.currentPage - 1) * this.perPage && index < this.currentPage * this.perPage;
                },
                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },
                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },
                goToPage(page) {
                    this.currentPage = page;
                },
                setFirstActiveInPage() {
                    this.activeDrip = (this.currentPage - 1) * this.perPage;
                    this.$nextTick(() => { if(typeof AOS !== 'undefined') AOS.refresh(); });
                }
             }"
             x-init="$watch('currentPage', value => setFirstActiveInPage())">
            
            <div class="lg:col-span-5 flex flex-col justify-between rounded-3xl border border-slate-800 bg-slate-950/60 p-8 backdrop-blur-md relative overflow-hidden" data-aos="fade-right" data-aos-duration="800">
                <div class="absolute -left-10 -bottom-10 h-40 w-40 rounded-full bg-[#0EB3B9]/10 blur-3xl"></div>
                
                <div class="relative z-10 flex-1 flex flex-col justify-between min-h-[380px] sm:min-h-[340px]">
                    @foreach($ivDrips as $index => $drip)
                        <div x-show="activeDrip === {{ $index }}" 
                             x-cloak
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="space-y-6 h-full flex flex-col justify-between">
                            
                            <div class="space-y-4">
                                <div class="flex flex-wrap items-center gap-2">
                                    <div class="inline-flex items-baseline gap-0.5 rounded-xl bg-[#0EB3B9]/10 px-3.5 py-1.5 text-[#0EB3B9]">
                                        <span class="text-xs font-bold">$</span>
                                        <span class="text-2xl font-extrabold tracking-tight">{{ $drip['price'] }}</span>
                                        <span class="text-[10px] font-medium text-slate-400 uppercase tracking-wider ml-1">/ session</span>
                                    </div>
                                    <span class="inline-flex items-center gap-1.5 rounded-xl border border-slate-800 bg-slate-900/60 px-3 py-1.5 text-xs font-medium text-slate-300">
                                        <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $drip['duration'] }}
                                    </span>
                                </div>

                                <h3 class="text-2xl font-bold text-white tracking-tight">
                                    {{ $drip['title'] }}
                                </h3>

                                <p class="text-sm leading-relaxed text-slate-400">
                                    {{ $drip['description'] }}
                                </p>
                            </div>

                            <div class="space-y-2.5 pt-6 border-t border-slate-800/80 mt-auto">
                                <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300">
                                    <div class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9]"></div>
                                    Intravenous (IV) Infusion
                                </div>
                                <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300">
                                    <div class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9]"></div>
                                    Medical-grade sterile environment
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8 relative z-10">
                    <a href="https://wa.me/17867528054" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl bg-[#0EB3B9] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-xl active:scale-[0.99]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Reserve IV Therapy
                    </a>
                </div>
            </div>

            <div class="lg:col-span-7 flex flex-col justify-between" data-aos="fade-left" data-aos-duration="800">
                
                <div class="flex flex-col gap-3 min-h-[340px]">
                    @foreach($ivDrips as $index => $drip)
                        <button @click="activeDrip = {{ $index }}" 
                                x-show="isInPage({{ $index }})"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                type="button"
                                class="text-left w-full relative flex items-center justify-between rounded-2xl border p-5 transition-all duration-300 focus:outline-none"
                                :class="activeDrip === {{ $index }} 
                                        ? 'bg-slate-800/60 border-[#0EB3B9] shadow-md shadow-[#0EB3B9]/5' 
                                        : 'bg-slate-950/20 border-slate-800/80 hover:bg-slate-800/30 hover:border-slate-700'">
                            
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition-colors duration-300"
                                     :class="activeDrip === {{ $index }} ? 'bg-[#0EB3B9] text-white' : 'bg-slate-800 text-slate-400'">
                                    
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        @if(($drip['icon'] ?? '') === 'hydration')
                                            <path d="M12 22a7 7 0 0 0 7-7c0-4.3-7-13-7-13S5 10.7 5 15a7 7 0 0 0 7 7z"/>
                                        @elseif(($drip['icon'] ?? '') === 'performance')
                                            <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                                        @elseif(($drip['icon'] ?? '') === 'wellness')
                                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                                            <path d="M12 6v12M6 12h12" />
                                        @else
                                            <path d="M10 2h4M12 2v3M7 5h10v12a3 3 0 0 1-3 3h-4a3 3 0 0 1-3-3V5zM12 10v4M10 12h4" />
                                        @endif
                                    </svg>
                                </div>
                                
                                <div>
                                    <h4 class="text-sm font-bold tracking-tight transition-colors"
                                        :class="activeDrip === {{ $index }} ? 'text-white' : 'text-slate-300'">
                                        {{ $drip['title'] }}
                                    </h4>
                                    <span class="text-[11px] text-slate-500 font-medium tracking-wide block mt-0.5">IV Infusion Therapy</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <span class="text-sm font-bold font-mono transition-colors"
                                      :class="activeDrip === {{ $index }} ? 'text-[#0EB3B9]' : 'text-slate-400'">
                                    ${{ $drip['price'] }}
                                </span>
                                <div class="transition-transform duration-300"
                                     :class="activeDrip === {{ $index }} ? 'translate-x-0 text-[#0EB3B9]' : '-translate-x-1 text-slate-600'">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>

                <div x-show="totalPages > 1" x-cloak class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t border-slate-800/60 pt-4">
                    <span class="text-xs text-slate-500 font-medium">
                        Showing IV menu <span class="text-slate-300" x-text="currentPage"></span> of <span class="text-slate-300" x-text="totalPages"></span>
                    </span>
                    
                    <div class="flex items-center gap-1.5">
                        <button @click="prevPage()" 
                                :disabled="currentPage === 1"
                                type="button"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-20 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-1">
                            <template x-for="page in totalPages" :key="page">
                                <button @click="goToPage(page)"
                                        type="button"
                                        x-text="page"
                                        class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-xs font-bold transition-all duration-200 focus:outline-none"
                                        :class="currentPage === page 
                                                ? 'bg-[#0EB3B9] text-white shadow-md shadow-[#0EB3B9]/10' 
                                                : 'border border-slate-800 bg-slate-950/20 text-slate-400 hover:bg-slate-800 hover:text-slate-200'">
                                </button>
                            </template>
                        </div>

                        <button @click="nextPage()" 
                                :disabled="currentPage === totalPages"
                                type="button"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-20 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>