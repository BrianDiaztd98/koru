<section id="team" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_var(--tw-gradient-stops))] from-[#0E788D]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera de la Sección (Aislada para AOS con wire:ignore) -->
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center justify-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Team
            </div>
            <h2 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-white mb-4">
                Meet Our Specialists
            </h2>
            <p class="text-sm sm:text-base text-slate-400 max-w-2xl mx-auto leading-relaxed">
                Certified professionals committed to your recovery, performance, and long-term wellness.
            </p>
        </div>

        <!-- VISTA ESCRITORIO / TABLET: Grid de Especialistas -->
        <div class="hidden md:grid grid-cols-2 lg:grid-cols-4 gap-6 py-6" wire:key="team-desktop-grid">
            @foreach($teamMembers as $member)
                <div wire:key="team-member-desktop-{{ $member['id'] ?? $loop->index }}"
                     x-data="{ expanded: false }" 
                     class="group scroll-animate flex flex-col h-full overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)]" data-speed="0.06" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ 100 + ($loop->index * 50) }}" 
                     data-aos-duration="600">
                    
                    <!-- Contenedor de Imagen Estilizado -->
                    <div class="aspect-[3/4] w-full overflow-hidden bg-slate-950 relative border-b border-slate-800/60">
                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                    </div>
                    
                    <!-- Cuerpo de la Tarjeta con Distribución Vertical Fluida -->
                    <div class="flex flex-col flex-grow p-6">
                        <h3 class="text-lg font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                            {{ $member['name'] }}
                        </h3>
                        
                        <p class="text-[10px] uppercase tracking-widest font-bold text-[#0EB3B9]/90 mt-0.5 mb-4 font-mono">
                            {{ $member['instagram'] ? '@' . ltrim($member['instagram'], '@') : 'Clinical Staff' }}
                        </p>
                        
                        <!-- Bloque Explicativo Expandible Único -->
                        <div class="relative flex-grow flex flex-col justify-between">
                            <div>
                                <p class="text-xs sm:text-sm leading-relaxed text-slate-400 transition-all duration-300" 
                                   :class="{ 'line-clamp-3': !expanded }" 
                                   x-ref="teamDesc{{ $loop->index }}">{{ $member['specialty'] }}</p>
                                
                                <button @click="expanded = !expanded" 
                                        x-show="$refs['teamDesc' + {{ $loop->index }}].scrollHeight > 60" 
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
                        
                        <!-- CTA Red Social Fijo en el Fondo -->
                        @if($member['instagram'])
                            <div class="mt-6 pt-4 border-t border-slate-800/60">
                                <a href="https://www.instagram.com/{{ ltrim($member['instagram'], '@') }}/" 
                                   target="_blank" 
                                   rel="noopener noreferrer" 
                                   aria-label="View {{ $member['name'] }} on Instagram"
                                   class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-2.5 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98]">
                                    View Profile
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- VISTA MÓVIL: Carrusel de Especialistas con Snap Horizontal -->
        <div class="md:hidden py-4" wire:key="team-mobile-carousel">
            <!-- Contenedor scrollable con eliminación nativa de scrollbars de navegador -->
            <div class="-mx-4 px-4 overflow-x-auto snap-x snap-mandatory flex gap-5 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden pb-6">
                @foreach($teamMembers as $member)
                    <div wire:key="team-member-mobile-{{ $member['id'] ?? $loop->index }}" 
                         class="snap-center shrink-0 w-[280px] sm:w-[320px] flex flex-col h-full">
                        
                        <div x-data="{ expanded: false }" 
                             class="group scroll-animate flex flex-col h-full overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm transition-all duration-300" data-speed="0.06" data-aos="fade-up" data-aos-delay="{{ 50 + ($loop->index * 30) }}" data-aos-duration="600">
                            
                            <!-- Imagen Móvil -->
                            <div class="aspect-[3/4] w-full overflow-hidden bg-slate-950 relative border-b border-slate-800/60">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                            </div>
                            
                            <!-- Cuerpo Móvil Equilibrado -->
                            <div class="flex flex-col flex-grow p-5">
                                <h3 class="text-base font-bold text-white tracking-tight">
                                    {{ $member['name'] }}
                                </h3>
                                
                                <p class="text-[10px] uppercase tracking-widest font-bold text-[#0EB3B9] mt-0.5 mb-3 font-mono">
                                    {{ $member['instagram'] ? '@' . ltrim($member['instagram'], '@') : 'Clinical Staff' }}
                                </p>
                                
                                <div class="relative flex-grow flex flex-col justify-between">
                                    <div>
                                        <p class="text-xs leading-relaxed text-slate-400 transition-all duration-300" 
                                           :class="{ 'line-clamp-3': !expanded }" 
                                           x-ref="teamDescMob{{ $loop->index }}">{{ $member['specialty'] }}</p>
                                        
                                        <button @click="expanded = !expanded" 
                                                x-show="$refs['teamDescMob' + {{ $loop->index }}].scrollHeight > 54" 
                                                x-cloak
                                                type="button"
                                                class="mt-1.5 inline-flex items-center gap-1 text-xs font-bold text-[#0EB3B9] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded"
                                                :aria-expanded="expanded.toString()">
                                            <span x-text="expanded ? 'Show Less' : 'Read More'"></span>
                                            <svg class="h-3 w-3 transition-transform duration-300" :class="{ 'rotate-180': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                
                                @if($member['instagram'])
                                    <div class="mt-5 pt-4 border-t border-slate-800/60">
                                        <a href="https://www.instagram.com/{{ ltrim($member['instagram'], '@') }}/" 
                                           target="_blank" 
                                           rel="noopener noreferrer" 
                                           aria-label="View {{ $member['name'] }} on Instagram"
                                           class="inline-flex w-full items-center justify-center rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-2.5 text-xs font-bold text-slate-200 active:scale-[0.98] transition-transform duration-150">
                                            View Profile
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
