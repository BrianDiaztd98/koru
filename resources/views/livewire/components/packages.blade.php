<section id="packages" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Fondo premium con gradiente radial de enfoque superior -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_var(--tw-gradient-stops))] from-[#0E788D]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera Centralizada -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center justify-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Packages
            </div>
            <h2 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-white mb-4">
                Flexible Packages Designed for Your Recovery and Performance
            </h2>
            <p class="text-sm sm:text-base text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Our therapeutic packages are designed to promote consistent progress, optimize recovery, and deliver long-term results. Choose the option that best suits your goals and schedule.
            </p>
        </div>

        <!-- Rejilla de Precios / Tarjetas de Paquetes -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4 items-stretch" wire:key="packages-pricing-grid">
            @foreach($packages as $package)
                <div wire:key="package-card-{{ $package['id'] ?? $loop->index }}"
                     x-data="{ expanded: false }" 
                     class="group scroll-animate flex flex-col justify-between h-full rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm p-6 transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)]" data-speed="0.06" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ 100 + ($loop->index * 50) }}" 
                     data-aos-duration="600">
                    
                    <!-- Contenido Superior de la Tarjeta -->
                    <div class="flex-1 flex flex-col">
                        <h3 class="text-lg font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                            {{ $package['name'] }}
                        </h3>
                        
                        <!-- Contenedor de Precio Metódico -->
                        <div class="mt-4 flex items-baseline gap-1.5">
                            <span class="text-3xl font-extrabold text-white font-mono tracking-tight">
                                ${{ number_format($package['price']) }}
                            </span>
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Total</span>
                        </div>
                        
                        <!-- Badges Informativos -->
                        <div class="mt-2.5 flex flex-wrap items-center gap-2">
                            <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-[#0EB3B9]">
                                {{ $package['sessions'] }} Session{{ $package['sessions'] > 1 ? 's' : '' }}
                            </span>
                            @if($package['validity'])
                                <span class="text-[11px] font-medium text-slate-500 font-mono flex items-center gap-1">
                                    <span class="inline-block h-1 w-1 rounded-full bg-slate-700"></span>
                                    {{ $package['validity'] }}
                                </span>
                            @endif
                        </div>
                        
                        <!-- Bloque de Descripción Expandible Interactivo -->
                        <div class="relative mt-4 flex-1 flex flex-col justify-between">
                            <div>
                                <p class="text-xs sm:text-sm leading-relaxed text-slate-400 transition-all duration-300" 
                                   :class="{ 'line-clamp-3': !expanded }" 
                                   x-ref="pkgDesc">{{ $package['description'] }}</p>
                                
                                <button @click="expanded = !expanded" 
                                        x-show="$refs.pkgDesc.scrollHeight > 60" 
                                        x-cloak
                                        type="button"
                                        class="mt-1.5 inline-flex items-center gap-1 text-xs font-bold text-[#0EB3B9] hover:text-[#0E788D] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded"
                                        :aria-expanded="expanded.toString()">
                                    <span x-text="expanded ? 'Show Less' : 'Read More'"></span>
                                    <svg class="h-3 w-3 transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Acción Inferior Fijo -->
                    <div class="mt-8 pt-4 border-t border-slate-800/60">
                        <a href="https://wa.me/17867528054" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-3 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98]">
                            Book Package Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Contenedor Legal / Políticas de los Paquetes -->
        <div class="mt-12 rounded-3xl border border-slate-800/80 bg-slate-950/30 p-6 sm:p-8 backdrop-blur-sm" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800" wire:ignore>
            <div class="flex items-center gap-2.5 mb-6 border-b border-slate-800/50 pb-3">
                <svg class="h-4 w-4 text-[#0EB3B9]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white">Package Terms & Policies</h3>
            </div>
            
            <ul class="space-y-4 text-xs sm:text-sm text-slate-400 leading-relaxed">
                @forelse($terms as $term)
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>{!! $term['content'] !!}</span>
                    </li>
                @empty
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>Packages are engineered for structured, continuous use to ensure optimal therapeutic outcomes. Sessions may be requested and scheduled based on calendar availability within the active validity period.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>Packages are non-cumulative across separate promotional periods and must be utilized fully within the specified timeframe.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>Any unused sessions will automatically expire at the conclusion of the stated package validity period.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>Packages are fully transferable to another individual with formal prior authorization written or sent by the original purchaser.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="mt-1.5 flex h-1.5 w-1.5 shrink-0 rounded-full bg-[#0EB3B9]"></span>
                        <span>All active packages are bound to a usage agreement. To safeguard the consistency of our professional therapies, packages and completed services are strictly <strong class="text-white font-semibold underline decoration-[#0EB3B9]/40 underline-offset-2">non-refundable</strong>.</span>
                    </li>
                @endforelse
            </ul>
        </div>

    </div>
</section>
