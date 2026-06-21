<!-- CAMBIO: Se cambió py-24 por pt-20 pb-24 para reducir el espacio de transición superior -->
<section id="education" class="relative pt-20 pb-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas con gradiente ascendente inverso -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera de la Sección (Protegida con wire:ignore si usas AOS en el sitio) -->
        <!-- CAMBIO: Reducido el mb-16 a mb-12 para compactar el espacio entre el título y las tarjetas -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Professional CE
            </div>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Continuing education built for clinicians and performance specialists
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400">
                Browse upcoming workshops, credits, and clinical training designed for high-performing professionals.
            </p>
        </div>

        <!-- Grid de Cursos / Workshops -->
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-stretch" wire:key="education-courses-grid">
            @forelse($activeCourses as $index => $course)
                <article wire:key="course-card-{{ $course['id'] ?? $index }}"
                         data-aos="fade-up"
                         data-aos-delay="{{ 100 + ($loop->index * 50) }}"
                         data-aos-duration="600"
                         class="group flex flex-col justify-between overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm p-6 transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)]">
                    
                    <!-- Bloque de Contenido Superior Proporcional -->
                    <div class="flex-1 flex flex-col">
                        <!-- Meta e Información Superior -->
                        <div class="flex items-center justify-between border-b border-slate-800/60 pb-4">
                            <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider text-[#0EB3B9]">
                                CE Credits: {{ $course['ce_credits'] }}
                            </span>
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 font-mono">
                                <svg class="h-3.5 w-3.5 text-slate-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $course['date'] }}
                            </span>
                        </div>
                        
                        <!-- Cuerpo de la Tarjeta -->
                        <h3 class="mt-5 text-lg font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                            {{ $course['title'] }}
                        </h3>
                        
                        <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-400 line-clamp-4 flex-1">
                            {{ $course['description'] }}
                        </p>
                    </div>

                    <!-- Footer de la Tarjeta con Precio y CTA Unificado Fijo -->
                    <div class="mt-8 pt-4 border-t border-slate-800/60">
                        <div class="flex items-center justify-between gap-4">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Investment</span>
                                <span class="text-xl font-bold text-white font-mono tracking-tight">${{ number_format($course['price']) }}</span>
                            </div>
                            
                            <a href="https://wa.me/17867528054" 
                               target="_blank" 
                               rel="noopener noreferrer" 
                               class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-2.5 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98]">
                                Register Now
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <!-- Estado Vacío Semántico y Controlado con Estética de Alta Gama -->
                <div class="col-span-full rounded-3xl border border-dashed border-slate-800/80 bg-slate-950/20 p-12 text-center" 
                     wire:key="education-empty-state"
                     data-aos="fade-up"
                     data-aos-duration="600">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-950 text-slate-500 border border-slate-800/60 mb-4">
                        <svg class="h-5 w-5 text-[#0EB3B9]/80" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h4 class="text-sm font-bold text-slate-300 uppercase tracking-wider">No upcoming workshops scheduled</h4>
                    <p class="mt-2 text-xs text-slate-500 max-w-sm mx-auto leading-relaxed">
                        We are currently preparing new professional CE programs. Add courses via the admin panel to populate this section.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>