<section id="iv-therapy" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_20%,_var(--tw-gradient-stops))] from-[#037E93]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.2fr_0.8fr] items-start mb-16" data-sal="fade" data-sal-duration="800" wire:ignore>
            <div>
                <div class="inline-flex items-center gap-2.5 rounded-md bg-[#02B8BC]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#02B8BC]">
                    Wellness Infusions
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Advanced hydration, recovery and wellness.
                </h2>
                <p class="mt-4 max-w-2xl text-base text-slate-400 text-justify">
                    Each lounge drip is formulated for targeted recovery, energy, and immune support with strict medical guidance and evidence-based nutrient dosing.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-800 bg-slate-950/40 p-5 backdrop-blur-sm">
                <h3 class="text-xs font-bold text-white uppercase tracking-wider mb-3 flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#02B8BC]"></span>
                    Treatment Highlights
                </h3>
                <ul class="space-y-2.5 text-xs text-slate-400">
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#02B8BC] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Premium hydration with physician-led protocols.
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#02B8BC] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Custom blends for fatigue, performance and immunity.
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-3.5 w-3.5 text-[#02B8BC] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Fast absorption & maximum cellular bioavailability.
                    </li>
                </ul>
            </div>
        </div>

        @if(empty($ivDrips) && empty($boosterShots))
            <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10">
            <h3 class="text-xl font-semibold text-white">No IV therapy content available yet</h3>
                <p class="mt-3 max-w-sm mx-auto text-sm leading-relaxed text-slate-400">
                    This section is waiting for IV treatment content.
                </p>
            </div>
        @else
            <div class="grid items-start gap-8 lg:grid-cols-12"
                 x-data="{
                    activeCategory: 'iv_therapy',
                    activeDrip: 0,
                    currentPage: 1,
                    get categoryLabel() { return this.activeCategory === 'iv_therapy' ? 'IV Therapy' : 'Booster Shots'; },
                    get perPage() { return this.activeCategory === 'iv_therapy' ? 4 : 6; },
                    get totalDrips() { return this.activeCategory === 'iv_therapy' ? {{ count($ivDrips) }} : {{ count($boosterShots) }}; },
                    get totalPages() { return Math.ceil(this.totalDrips / this.perPage) },
                    get activeDripData() { return this.activeCategory === 'iv_therapy' ? @js($ivDrips)[this.activeDrip] : @js($boosterShots)[this.activeDrip]; },
                    isInPage(index) { return index >= (this.currentPage - 1) * this.perPage && index < this.currentPage * this.perPage; },
                    nextPage() { if (this.currentPage < this.totalPages) this.currentPage++; },
                    prevPage() { if (this.currentPage > 1) this.currentPage--; },
                    goToPage(page) { this.currentPage = page; },
                    setCategory(category) { this.activeCategory = category; this.activeDrip = 0; this.currentPage = 1; },
                    setFirstActiveInPage() { this.activeDrip = (this.currentPage - 1) * this.perPage; $nextTick(() => { if (typeof AOS !== 'undefined') AOS.refresh(); }); }
                 }"
                 x-init="$watch('currentPage', value => setFirstActiveInPage())">

                <div class="lg:col-span-12 flex gap-2 border-b border-slate-800 pb-4" role="tablist" aria-label="IV service category">
                    <button @click="setCategory('iv_therapy')"
                            type="button"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wider transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                            :class="activeCategory === 'iv_therapy' ? 'border-b-2 border-[#02B8BC] text-[#02B8BC]' : 'text-slate-400 hover:text-white'"
                            :aria-selected="activeCategory === 'iv_therapy'"
                            role="tab">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22a7 7 0 0 0 7-7c0-4.3-7-13-7-13S5 10.7 5 15a7 7 0 0 0 7 7z" />
                        </svg>
                        IV Therapy
                    </button>
                    <button @click="setCategory('booster_shots')"
                            type="button"
                            class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold uppercase tracking-wider transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                            :class="activeCategory === 'booster_shots' ? 'border-b-2 border-[#02B8BC] text-[#02B8BC]' : 'text-slate-400 hover:text-white'"
                            :aria-selected="activeCategory === 'booster_shots'"
                            role="tab">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M10 2h4M12 2v3M7 5h10v12a3 3 0 0 1-3 3h-4a3 3 0 0 1-3-3V5zM12 10v4M10 12h4" />
                        </svg>
                        Booster Shots
                    </button>
                </div>

                <div class="lg:order-2 lg:col-span-5 flex flex-col justify-between rounded-3xl border border-slate-800 bg-slate-950/60 p-8 backdrop-blur-md relative overflow-hidden scroll-animate" data-speed="0.08" data-sal="slide-left" data-sal-duration="800">
                    <div class="absolute -left-10 -bottom-10 h-40 w-40 rounded-full bg-[#02B8BC]/10 blur-3xl"></div>

                    <div class="relative z-10 flex-1 flex flex-col justify-between min-h-[380px] sm:min-h-[340px]">
                        @foreach($ivDrips as $index => $drip)
                            <div x-show="activeCategory === 'iv_therapy' && activeDrip === {{ $index }}"
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="space-y-6 h-full flex flex-col justify-between">

                                <div class="space-y-4">
                                    <h3 class="text-2xl font-bold text-white tracking-tight">
                                        {{ $drip['title'] }}
                                    </h3>

                                    <p class="text-sm leading-relaxed text-slate-400 text-justify">
                                        {{ $drip['description'] }}
                                    </p>
                                </div>

                                <div class="space-y-2.5 pt-6 border-t border-slate-800/80 mt-auto">
                                    <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300">
                                        <div class="h-1.5 w-1.5 rounded-full bg-[#02B8BC]"></div>
                                        {{ $drip['type'] === 'booster' ? 'Targeted booster shot' : 'Intravenous (IV) infusion' }}
                                    </div>
                                    <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300">
                                        <div class="h-1.5 w-1.5 rounded-full bg-[#02B8BC]"></div>
                                        Medical-grade sterile environment
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach($boosterShots as $index => $drip)
                            <div x-show="activeCategory === 'booster_shots' && activeDrip === {{ $index }}"
                                 x-cloak
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 translate-y-4"
                                 x-transition:enter-end="opacity-100 translate-y-0"
                                 class="space-y-6 h-full flex flex-col justify-between">

                                <div class="space-y-4">
                                    <h3 class="text-2xl font-bold text-white tracking-tight">{{ $drip['title'] }}</h3>
                                    <p class="text-sm leading-relaxed text-slate-400 text-justify">{{ $drip['description'] }}</p>
                                </div>
                                <div class="space-y-2.5 pt-6 border-t border-slate-800/80 mt-auto">
                                    <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300"><div class="h-1.5 w-1.5 rounded-full bg-[#02B8BC]"></div>Targeted booster shot</div>
                                    <div class="flex items-center gap-2.5 text-xs font-medium text-slate-300"><div class="h-1.5 w-1.5 rounded-full bg-[#02B8BC]"></div>Medical-grade sterile environment</div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 relative z-10">
                        <a :href="activeDripData?.whatsapp_url || 'https://wa.me/17867528054'"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl bg-[#02B8BC] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#02B8BC]/10 transition-all duration-200 hover:bg-[#037E93] hover:shadow-xl active:scale-[0.99]">
                            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 2v4m8-4v4M3 10h18M5 4h14a2 2 0 012 2v13a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 16 2 2 4-4" />
                            </svg>
                            <span x-text="'Reserve ' + categoryLabel"></span>
                        </a>
                    </div>
                </div>

                <div class="lg:order-1 lg:col-span-7 flex flex-col justify-between scroll-animate" data-speed="0.06" data-sal="slide-right" data-sal-duration="800">
                    <div class="grid gap-3" :class="activeCategory === 'booster_shots' ? 'md:grid-cols-2' : 'grid-cols-1'">
                        @foreach($ivDrips as $index => $drip)
                            <button @click="activeDrip = {{ $index }}"
                                    x-show="activeCategory === 'iv_therapy' && isInPage({{ $index }})"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    type="button"
                                    class="text-left w-full relative flex items-center justify-between rounded-2xl border p-5 transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                                    :class="activeDrip === {{ $index }} 
                                            ? 'bg-slate-800/60 border-[#02B8BC] shadow-md shadow-[#02B8BC]/5' 
                                            : 'bg-slate-950/20 border-slate-800/80 hover:bg-slate-800/30 hover:border-slate-700'"
                                    :aria-pressed="activeDrip === {{ $index }} ? 'true' : 'false'">

                                <div class="flex items-center gap-4">
                                    <div>
                                        <h4 class="text-sm font-bold tracking-tight transition-colors"
                                            :class="activeDrip === {{ $index }} ? 'text-white' : 'text-slate-300'">
                                            {{ $drip['title'] }}
                                        </h4>
                                        <span class="text-[11px] text-slate-500 font-medium tracking-wide block mt-0.5">{{ $drip['type_label'] === 'IV Infusion Therapy' ? 'Infusion' : $drip['type_label'] }}</span>
                                    </div>
                                </div>

                                                                <div class="flex items-center gap-4">
                                    <div class="transition-transform duration-300"
                                         :class="activeDrip === {{ $index }} ? 'translate-x-0 text-[#02B8BC]' : '-translate-x-1 text-slate-600'">
                                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                        @endforeach
                        @foreach($boosterShots as $index => $drip)
                            <button @click="activeDrip = {{ $index }}"
                                    x-show="activeCategory === 'booster_shots' && isInPage({{ $index }})"
                                    x-cloak
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    type="button"
                                    class="text-left w-full relative flex items-center justify-between rounded-2xl border p-5 transition-all duration-300 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                                    :class="activeDrip === {{ $index }} ? 'bg-slate-800/60 border-[#02B8BC] shadow-md shadow-[#02B8BC]/5' : 'bg-slate-950/20 border-slate-800/80 hover:bg-slate-800/30 hover:border-slate-700'"
                                    :aria-pressed="activeDrip === {{ $index }} ? 'true' : 'false'">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <h4 class="text-sm font-bold tracking-tight transition-colors" :class="activeDrip === {{ $index }} ? 'text-white' : 'text-slate-300'">{{ $drip['title'] }}</h4>
                                        <span class="text-[11px] text-slate-500 font-medium tracking-wide block mt-0.5">{{ $drip['type_label'] }}</span>
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
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-20 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                                    aria-label="Previous page">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>

                            <div class="flex items-center gap-1">
                                <template x-for="page in totalPages" :key="page">
                                    <button @click="goToPage(page)"
                                            type="button"
                                            x-text="page"
                                            class="inline-flex h-9 w-9 items-center justify-center rounded-xl text-xs font-bold transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                                            :class="currentPage === page 
                                                    ? 'bg-[#02B8BC] text-white shadow-md shadow-[#02B8BC]/10' 
                                                    : 'border border-slate-800 bg-slate-950/20 text-slate-400 hover:bg-slate-800 hover:text-slate-200'"
                                            :aria-label="'Page ' + page"
                                            :aria-current="currentPage === page ? 'page' : 'false'">
                                    </button>
                                </template>
                            </div>

                            <button @click="nextPage()"
                                    :disabled="currentPage === totalPages"
                                    type="button"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-20 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]"
                                    aria-label="Next page">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
