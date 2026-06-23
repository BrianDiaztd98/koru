<!-- CAMBIO: Se mantiene la estructura exacta de espaciado pt-20 pb-24 para consistencia de transiciones -->
<section id="about-us" class="relative pt-20 pb-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas con gradiente ascendente inverso idéntico al sitio -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        
        <!-- Cabecera de la Sección (Integrada con AOS y control de Livewire) -->
        <div class="mb-12 text-center" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                About KORU
            </div>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Bridging the gap between recovery, movement, and education
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400">
                Discover the philosophy and technical framework behind our specialized wellness and learning ecosystem.
            </p>
        </div>

        <!-- Bloque de Contenido Principal Asimétrico de Alta Gama -->
        <div class="grid gap-12 lg:grid-cols-12 items-center" wire:key="about-content-wrapper">
            
            <!-- Columna Izquierda: Texto Dinámico consumido desde Base de Datos -->
            <div class="lg:col-span-6 space-y-6" data-aos="fade-right" data-aos-duration="800">
                <h3 class="text-xl font-bold text-white tracking-tight sm:text-2xl">
                    Our Philosophy
                </h3>
                
                <!-- El texto principal renderizado dinámicamente desde tu modelo de Laravel -->
                <p class="text-sm leading-relaxed text-slate-400">
                    {{ $aboutData['philosophy'] ?? 'Named after the Māori symbol for a new unfurling fern frond, Koru represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.' }}
                </p>
                
                <p class="text-sm leading-relaxed text-slate-400">
                    {{ $aboutData['vision'] ?? 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.' }}
                </p>

                <!-- Mini Grid de Pilares / Atributos con Estética de Tarjeta Unificada -->
                <div class="mt-8 grid gap-4 sm:grid-cols-2" wire:key="about-features-grid">
                    
                    <!-- Pilar 1 -->
                    <div class="group flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-800/60 bg-slate-950/30 backdrop-blur-sm p-5 transition-all duration-300 hover:border-[#0EB3B9]/20 hover:bg-slate-950/60">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#0EB3B9]/10 text-[#0EB3B9]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-white tracking-tight">Wellness & Therapy</h4>
                        </div>
                        <p class="mt-2.5 text-xs text-slate-400 leading-relaxed">
                            Tailored operational architectures built for fluid content management and clean UI stability.
                        </p>
                    </div>

                    <!-- Pilar 2 -->
                    <div class="group flex flex-col justify-between overflow-hidden rounded-2xl border border-slate-800/60 bg-slate-950/30 backdrop-blur-sm p-5 transition-all duration-300 hover:border-[#0EB3B9]/20 hover:bg-slate-950/60">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#0EB3B9]/10 text-[#0EB3B9]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-white tracking-tight">Advanced Education</h4>
                        </div>
                        <p class="mt-2.5 text-xs text-slate-400 leading-relaxed">
                            Empowering specialists through interactive workshops and fully scalable learning data tracks.
                        </p>
                    </div>

                </div>
            </div>

            <!-- Columna Derecha: Mosaico Asimétrico con Imágenes Limpias -->
            <div class="lg:col-span-6 relative" data-aos="fade-left" data-aos-duration="800">
                <!-- Efecto Glow Destello Detrás del Mosaico -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#0E788D]/15 blur-[100px] rounded-full -z-10"></div>
                
                <!-- Estructura de Mosaico Avanzado -->
                <div class="grid grid-cols-12 gap-4 items-center" wire:key="about-images-mosaic">
                    
                    <!-- Columna Izquierda del Mosaico (Contiene 2 Imágenes de soporte) -->
                    <div class="col-span-5 space-y-4">
                        <!-- Imagen 1: Superior Izquierda -->
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-36 sm:h-44 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105" 
                                 src="{{ asset('img/about/therapy.jpeg') }}" 
                                 alt="KORU Therapy Session">
                        </div>
                        
                        <!-- Imagen 2: Inferior Izquierda -->
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-36 sm:h-44 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105" 
                                 src="{{ asset('img/about/massage.jpeg') }}" 
                                 alt="KORU Team Collaboration">
                        </div>
                    </div>

                    <!-- Columna Derecha del Mosaico (Imagen Principal Destacada) -->
                    <div class="col-span-7">
                        <!-- Imagen 3: Principal Derecha -->
                        <div class="group relative overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 p-2 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30 shadow-[0_20px_50px_-20px_rgba(14,120,141,0.3)]">
                            <img class="object-cover w-full h-[304px] sm:h-[368px] rounded-2xl transition-all duration-500 scale-100 group-hover:scale-105" 
                                 src="{{ asset('img/about/team.jpeg') }}" 
                                 alt="KORU Wellness Environment">
                            
                            <!-- Badge flotante sutil sobre la imagen principal -->
                            <div class="absolute bottom-5 right-5 rounded-lg bg-slate-950/80 backdrop-blur-md border border-slate-800/80 px-2.5 py-1 text-[9px] font-mono font-bold tracking-widest text-[#0EB3B9] uppercase">
                                Live Clean UI
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>