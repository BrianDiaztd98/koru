<section id="testimonials" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera de la Sección (Aislada para animaciones estables con wire:ignore) -->
        <div class="mb-16 text-center" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Client Outcomes
            </div>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Real recovery stories from Koru Center members
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400">
                From pain relief to athletic comeback, every client story is designed to inspire next-level care.
            </p>
        </div>

        <!-- Grid Dinámico de Testimonios / Videos -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-stretch" wire:key="testimonials-video-grid">
            
            {{-- 
                Si la variable $testimonials viene vacía o no existe en el backend, 
                se genera un arreglo temporal con los 3 videos originales para que nunca se rompa la vista.
            --}}
            @php
                $activeTestimonials = (isset($testimonials) && count($testimonials) > 0) ? $testimonials : [
                    [
                        'id' => 1,
                        'category' => 'lounge',
                        'title' => 'Tour the recovery lounge',
                        'description' => 'View how our IV and recovery lounge creates a premium clinical environment.',
                        'video_path' => 'videos/testimonials/1.mp4'
                    ],
                    [
                        'id' => 2,
                        'category' => 'athlete',
                        'title' => 'Athlete recovery in action',
                        'description' => 'See how our protocols support athletes returning to training faster.',
                        'video_path' => 'videos/testimonials/2.mp4'
                    ],
                    [
                        'id' => 3,
                        'category' => 'clinical',
                        'title' => 'Clinical performance stories',
                        'description' => 'Discover the clinical outcomes behind our premium care services.',
                        'video_path' => 'videos/testimonials/3.mp4'
                    ]
                ];
            @endphp

            @foreach($activeTestimonials as $index => $testimonial)
                <article wire:key="testimonial-card-{{ $testimonial['id'] ?? $index }}"
                         data-aos="fade-up"
                         data-aos-delay="{{ 100 + ($loop->index * 50) }}"
                         data-aos-duration="600"
                         class="group relative flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm p-6 transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)] scroll-animate" data-speed="0.06">
                    
                    <!-- Contenedor Superior Flexible para Simetría de Altura -->
                    <div class="flex-1 flex flex-col">
                        <!-- Selector Temático de Iconos Clínicos en Base al Tipo de Contenido -->
                        <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 border border-slate-800 text-[#0EB3B9] shadow-sm group-hover:bg-[#0EB3B9]/10 group-hover:border-[#0EB3B9]/30 transition-all duration-300">
                            @if(($testimonial['category'] ?? '') === 'lounge')
                                <!-- Icono Reproductor / Lounge Tour -->
                                <svg class="h-5 w-5 fill-current transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M10 8.5v7.5l6-3.75-6-3.75Z" />
                                </svg>
                            @elseif(($testimonial['category'] ?? '') === 'athlete')
                                <!-- Icono Reporte / Rendimiento en Acción -->
                                <svg class="h-5 w-5 transition-transform duration-300 group-hover:scale-105" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 8h16M4 12h16M4 16h16" />
                                </svg>
                            @else
                                <!-- Icono Geolocalización / Ubicación e Impacto -->
                                <svg class="h-5 w-5 transition-transform duration-300 group-hover:scale-105" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                            {{ $testimonial['title'] }}
                        </h3>
                        <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-400 flex-1 line-clamp-4">
                            {{ $testimonial['description'] }}
                        </p>
                    </div>
                    
                    <!-- Bloque de Acción Inferior Fijo -->
                    <div class="mt-8 pt-4 border-t border-slate-800/60">
                        <button type="button" 
                                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-2.5 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98]" 
                                @click="$dispatch('open-video-modal', '{{ asset($testimonial['video_path']) }}')">
                            Watch preview
                        </button>
                    </div>
                </article>
            @endforeach

        </div>
    </div>
</section>
