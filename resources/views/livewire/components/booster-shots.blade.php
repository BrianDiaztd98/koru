<section id="booster-shots" class="relative pt-24 pb-12 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Fondo premium con sutil gradiente corporativo para Koru -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,_var(--tw-gradient-stops))] from-[#0E788D]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera Minimalista -->
        <div class="mb-16 max-w-3xl" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Quick Therapy
            </div>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Booster Shots & Vitality Injections
            </h2>
            <p class="mt-4 text-base text-slate-400">
                Fast-acting intramuscular formulas designed by professionals to restore cellular energy, optimize immune response, and accelerate recovery in minutes.
            </p>
        </div>

        <!-- Módulo Principal: Consola Interactiva con Paginación Reactiva en Alpine -->
        <div class="grid gap-8 lg:grid-cols-12 items-stretch" 
             x-data="{ 
                activeShot: 0,
                currentPage: 1,
                perPage: 4,
                totalShots: {{ count($boosterShots) }},
                get totalPages() { return Math.ceil(this.totalShots / this.perPage) },
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
                    this.activeShot = (this.currentPage - 1) * this.perPage;
                    $nextTick(() => { if(typeof AOS !== 'undefined') AOS.refresh(); });
                }
             }"
             x-init="$watch('currentPage', value => setFirstActiveInPage())">
            
            <!-- PANEL IZQUIERDO: Tarjeta de Enfoque Clínico Dinámica -->
            <div class="lg:col-span-5 flex flex-col justify-between rounded-3xl border border-slate-800 bg-slate-950/60 p-8 backdrop-blur-md relative overflow-hidden scroll-animate" data-speed="0.08"
                 data-aos="fade-right" 
                 data-aos-duration="800"
                 data-aos-anchor-placement="top-bottom">
                <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-[#0EB3B9]/10 blur-3xl"></div>
                
                <div class="relative z-10 flex-1 flex flex-col justify-between min-h-[340px] sm:min-h-[290px]">
                    @foreach($boosterShots as $index => $shot)
                        <div x-show="activeShot === {{ $index }}" 
                             x-cloak
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="space-y-6 h-full flex flex-col justify-between">
                            
                            <div class="space-y-4">
                                <!-- Badge de Precio de Lujo -->
                                <div class="inline-flex items-baseline gap-1 rounded-xl bg-[#0EB3B9]/10 px-4 py-2 text-[#0EB3B9]">
                                    <span class="text-xs font-medium">$</span>
                                    <span class="text-2xl font-extrabold tracking-tight">{{ $shot['price'] }}</span>
                                    <span class="text-[10px] uppercase tracking-wider text-slate-400 ml-1">/ Per Shot</span>
                                </div>

                                <!-- Título Grande Destacado -->
                                <h3 class="text-2xl font-bold text-white tracking-tight">
                                    {{ $shot['title'] }}
                                </h3>

                                <!-- Descripción Completa -->
                                <p class="text-sm leading-relaxed text-slate-400">
                                    {{ $shot['description'] }}
                                </p>
                            </div>

                            <!-- Beneficios Clínicos Estables -->
                            <div class="space-y-3 pt-6 border-t border-slate-800/80 mt-auto">
                                <div class="flex items-center gap-3 text-xs font-medium text-slate-300">
                                    <svg class="h-4 w-4 text-[#0EB3B9] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    100% Bioavailable Intramuscular Absorption
                                </div>
                                <div class="flex items-center gap-3 text-xs font-medium text-slate-300">
                                    <svg class="h-4 w-4 text-[#0EB3B9] shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Administered in under 10 minutes
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Botón de Acción Principal -->
                <div class="mt-8 relative z-10">
                    <a href="https://wa.me/17867528054" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="inline-flex w-full items-center justify-center gap-2.5 rounded-xl bg-[#0EB3B9] px-5 py-4 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-xl active:scale-[0.99]">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Schedule This Injection
                    </a>
                </div>
            </div>

            <!-- PANEL DERECHO: Selector de Menú con Listado Paginado -->
            <div class="lg:col-span-7 flex flex-col justify-between scroll-animate" data-speed="0.06"
                 data-aos="fade-left" 
                 data-aos-duration="800"
                 data-aos-anchor-placement="top-bottom">
                
                <!-- Lista de Contenido -->
                <div class="flex flex-col gap-3 min-h-[340px]">
                    @foreach($boosterShots as $index => $shot)
                        <button @click="activeShot = {{ $index }}" 
                                x-show="isInPage({{ $index }})"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                type="button"
                                class="text-left w-full relative flex items-center justify-between rounded-2xl border p-5 transition-all duration-300 focus:outline-none"
                                :class="activeShot === {{ $index }} 
                                        ? 'bg-slate-800/60 border-[#0EB3B9] shadow-md shadow-[#0EB3B9]/5' 
                                        : 'bg-slate-950/20 border-slate-800/80 hover:bg-slate-800/30 hover:border-slate-700'">
                            
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl transition-colors duration-300"
                                     :class="activeShot === {{ $index }} ? 'bg-[#0EB3B9] text-white' : 'bg-slate-800 text-slate-400'">
                                    
                                    @if(str_contains(strtolower($shot['title']), 'energy') || str_contains(strtolower($shot['title']), 'b12'))
                                        <svg class="h-4 w-4 fill-none stroke-current" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                        </svg>
                                    @elseif(str_contains(strtolower($shot['title']), 'immun') || str_contains(strtolower($shot['title']), 'defen'))
                                        <svg class="h-4 w-4 fill-none stroke-current" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751A11.956 11.956 0 0112 2.714z" />
                                        </svg>
                                    @else
                                        <svg class="h-4 w-4 fill-none stroke-current" stroke-width="2.2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 4.5l-15 15M6.75 6.75l.75-.75m.75 3.75l.75-.75m.75 3.75l.75-.75m3.75-3.75l.75-.75m-.75 5.25l3 3m-9-9l3 3M18 3l3 3" />
                                        </svg>
                                    @endif
                                </div>
                                
                                <div>
                                    <h4 class="text-sm font-bold tracking-tight transition-colors"
                                        :class="activeShot === {{ $index }} ? 'text-white' : 'text-slate-300'">
                                        {{ $shot['title'] }}
                                    </h4>
                                    <span class="text-[11px] text-slate-500 font-medium tracking-wide block mt-0.5">Intramuscular Boost</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-4">
                                <span class="text-sm font-bold font-mono transition-colors"
                                      :class="activeShot === {{ $index }} ? 'text-[#0EB3B9]' : 'text-slate-400'">
                                    ${{ $shot['price'] }}
                                </span>
                                <div class="transition-transform duration-300"
                                     :class="activeShot === {{ $index }} ? 'translate-x-0 text-[#0EB3B9]' : '-translate-x-1 text-slate-600'">
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    @endforeach
                </div>

                <!-- CONTROLES DE PAGINACIÓN PREMIUM -->
                <div x-show="totalPages > 1" x-cloak class="mt-6 flex flex-wrap items-center justify-between gap-4 border-t border-slate-800/60 pt-4">
                    <span class="text-xs text-slate-500 font-medium">
                        Showing menu <span class="text-slate-300" x-text="currentPage"></span> of <span class="text-slate-300" x-text="totalPages"></span>
                    </span>
                    
                    <div class="flex items-center gap-1.5">
                        <!-- Botón Anterior -->
                        <button @click="prevPage()" 
                                :disabled="currentPage === 1"
                                type="button"
                                class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-20 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <!-- Paginación Numérica Central -->
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

                        <!-- Botón Siguiente -->
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
