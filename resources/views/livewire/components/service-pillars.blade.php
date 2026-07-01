<section id="services" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_var(--tw-gradient-stops))] from-[#0E788D]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Cabecera de la Sección y Selector de Pilares -->
        <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between mb-16" wire:key="services-header-container">
            
            <!-- Bloque de Título con protección de renderizado -->
            <div class="max-w-xl" data-aos="fade-right" data-aos-duration="800" data-aos-anchor-placement="top-bottom" wire:ignore>
                <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                    Service Pillars
                </div>
                <h2 id="koru-services-heading" class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    Clinical services built for recovery, performance and wellness.
                </h2>
                <p class="mt-4 text-base text-slate-400">
                    Explore Koru's clinical massage, recovery technology, medical services, and at-home concierge care.
                </p>
            </div>

            <!-- Tabs de Pilares Estilizados Tipo Consola -->
            <div class="inline-flex flex-wrap gap-2 rounded-2xl border border-slate-800 bg-slate-950/40 p-1.5 backdrop-blur-md animate-fade-in" wire:key="services-tabs-row" role="tablist" aria-label="Service categories">
                @foreach ($pillarLabels as $key => $pillar)
                    <button wire:click="setPillar('{{ $key }}')"
                            wire:key="pillar-tab-button-{{ $key }}" 
                            type="button"
                            role="tab"
                            :aria-selected="'{{ $activePillar }}' === '{{ $key }}'"
                            class="rounded-xl px-4 py-2.5 text-xs font-bold tracking-wide transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] 
                            @if ($activePillar === $key) bg-[#0EB3B9] text-white shadow-md shadow-[#0EB3B9]/20 
                            @else text-slate-400 hover:text-white hover:bg-slate-800/50 @endif">
                        {{ $pillar['title'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Contenedor Dinámico con Paginación Reactiva (Alpine.js) -->
        <div x-data="{
                currentPage: 1,
                perPage: 3,
                totalServices: {{ count($servicesByPillar[$activePillar] ?? []) }},
                get totalPages() { return Math.ceil(this.totalServices / this.perPage) },
                isInPage(index) {
                    return index >= (this.currentPage - 1) * this.perPage && index < this.currentPage * this.perPage;
                },
                nextPage() { 
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                        $nextTick(() => { if(typeof AOS !== 'undefined') AOS.refresh(); });
                    }
                },
                prevPage() { 
                    if (this.currentPage > 1) {
                        this.currentPage--;
                        $nextTick(() => { if(typeof AOS !== 'undefined') AOS.refresh(); });
                    }
                }
             }" 
             x-init="$nextTick(() => { if(typeof AOS !== 'undefined') AOS.refresh(); })"
             class="flex flex-col gap-10"
             wire:key="services-dynamic-content-{{ $activePillar }}">

            <!-- Grid de Tarjetas de Servicios -->
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-stretch" wire:key="services-grid-{{ $activePillar }}">
                @forelse($servicesByPillar[$activePillar] ?? [] as $index => $service)
                    <article wire:key="service-card-{{ $activePillar }}-{{ $index }}-{{ $service['id'] ?? $loop->index }}"
                             x-data="{ expanded: false }" 
                             x-show="isInPage({{ $index }})"
                             x-cloak
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]"
                             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                             data-aos="fade-up"
                             data-aos-delay="{{ ($index % 3) * 100 }}"
                             data-aos-anchor-placement="top-bottom"
                             class="group scroll-animate flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.12)]" data-speed="0.06">

                        <div>
                            <!-- Contenedor de la Imagen Cinematográfica -->
                            <div class="relative aspect-[16/10] overflow-hidden bg-slate-950 border-b border-slate-800/60">
                                <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" loading="lazy" />
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-transparent opacity-80"></div>

                                <!-- Badge de Precio Flotante Moderno -->
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center justify-center rounded-xl bg-slate-900/90 border border-slate-800 px-3 py-1 text-xs font-bold text-white shadow-sm font-mono backdrop-blur-sm">
                                        ${{ $service['price'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Contenido del Servicio -->
                            <div class="p-6 space-y-4">
                                <span class="inline-flex rounded-md bg-[#0EB3B9]/10 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-widest text-[#0EB3B9]">
                                    {{ str($service['title'])->headline() }}
                                </span>

                                <h3 class="text-lg font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                                    {{ $service['title'] }}
                                </h3>

                                <div class="relative">
                                    <p class="text-xs sm:text-sm leading-relaxed text-slate-400 transition-all duration-300" :class="{ 'line-clamp-3': !expanded }" x-ref="svcDesc">
                                        {{ $service['description'] }}
                                    </p>

                                    <button @click="expanded = !expanded" 
                                            x-show="true" 
                                            x-cloak
                                            type="button"
                                            class="mt-2 inline-flex items-center gap-1 text-xs font-bold text-[#0EB3B9] hover:text-[#0E788D] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded"
                                            :aria-expanded="expanded.toString()">
                                        <span x-text="expanded ? 'Show Less' : 'Read More'"></span>
                                        <svg class="h-3 w-3 transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Footer de la Tarjeta con Duración y CTA Unificado -->
                        <div class="p-6 pt-0 mt-auto">
                            <div class="flex items-center justify-between mb-4 pt-4 border-t border-slate-800/60">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Duration</span>
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-slate-300">
                                    <svg class="h-3.5 w-3.5 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    {{ $service['duration'] }}
                                </span>
                            </div>

                            <a href="https://wa.me/17867528054" target="_blank" rel="noopener noreferrer" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800 px-4 py-3 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98]">
                                Book Appointment
                            </a>
                        </div>
                    </article>
                @empty
                    <!-- Estado Vacío / Backup del CMS -->
                    <div class="col-span-full rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10" wire:key="empty-state-{{ $activePillar }}">
                        <h4 class="text-xl font-semibold text-white">No service pillars available yet</h4>
                        <p class="mt-3 max-w-sm mx-auto text-sm leading-relaxed text-slate-400">This section is waiting for service pillar content.</p>
                    </div>
                @endforelse
            </div>

            <!-- CONTROLES DE PAGINACIÓN INTERNA -->
            <div x-show="totalPages > 1" x-cloak class="flex items-center justify-between border-t border-slate-800/60 pt-6" wire:key="pagination-controls-{{ $activePillar }}">
                <span class="text-xs text-slate-500 font-medium">
                    Viewing <span class="text-slate-300" x-text="currentPage"></span> of <span class="text-slate-300" x-text="totalPages"></span> service pages
                </span>

                <div class="flex items-center gap-2">
                    <button @click="prevPage()" :disabled="currentPage === 1" type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-30 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]" aria-label="Previous page">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <button @click="nextPage()" :disabled="currentPage === totalPages" type="button" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 text-slate-400 transition hover:bg-slate-800 hover:text-white disabled:opacity-30 disabled:hover:bg-transparent disabled:hover:text-slate-400 focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]" aria-label="Next page">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>
