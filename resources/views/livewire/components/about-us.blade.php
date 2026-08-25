<!-- CAMBIO: Se mantiene la estructura exacta de espaciado pt-20 pb-24 para consistencia de transiciones -->
<section id="about-us" class="relative pt-20 pb-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas con gradiente ascendente inverso idéntico al sitio -->
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900">
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        @if (!($aboutData['has_real_data'] ?? false))
            <div
                class="rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10">
                <div
                    class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                    {{ $aboutData['title'] ?? 'About KORU' }}
                </div>
                <h2 class="mt-6 text-xl font-semibold text-white">
                    No about content available yet
                </h2>
                <p class="mt-3 max-w-sm mx-auto text-sm leading-relaxed text-slate-400">
                    This section is waiting for About KORU content.
                </p>
            </div>
        @else
            <!-- Cabecera de la Sección (Integrada con Sal.js y control de Livewire) -->
            <div class="mb-12 text-center" data-sal="fade" data-sal-duration="800" data-sal-delay="0"
                data-sal-easing="ease-out-cubic">
                <div
                    class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                    {{ $aboutData['title'] ?? 'About KORU' }}
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    {{ $aboutData['subtitle'] ?? 'Bridging the gap between recovery, movement, and education' }}
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400 text-justify">
                    {{ $aboutData['description'] ?? 'Discover the philosophy and technical framework behind our specialized wellness and learning ecosystem.' }}
                </p>
                <p class="mt-6 text-sm font-bold uppercase tracking-[0.24em] text-[#0EB3B9]">
                    PAIN FREE, BETTER LIFE.
                </p>
            </div>

            <!-- Bloque de Contenido Principal Asimétrico de Alta Gama -->
            <div class="grid gap-12 lg:grid-cols-12 items-center" wire:key="about-content-wrapper">

                <!-- Columna Izquierda: Texto Dinámico consumido desde Base de Datos -->
                <div class="lg:col-span-6 space-y-6" data-sal="slide-right" data-sal-duration="1000"
                    data-sal-delay="200" data-sal-easing="ease-out-cubic">
                    <h3 class="text-xl font-bold text-white tracking-tight sm:text-2xl">
                        {{ $aboutData['title'] ?? 'About KORU' }}
                    </h3>

                    <!-- El texto principal renderizado dinámicamente desde tu modelo de Laravel -->
                    <p class="text-sm leading-relaxed text-slate-400 text-justify">
                        {{ $aboutData['philosophy'] ?? 'Named after the Māori symbol for a new unfurling fern frond, KORU represents new life, growth, strength, and peace. We provide a clean, structured environment where movement and teaching are treated with clinical excellence.' }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-400 text-justify">
                        {{ $aboutData['vision'] ?? 'Our mission is to deliver elite-level specialized support, ensuring every professional and individual can scale their performance and knowledge without traditional constraints.' }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-400 text-justify">
                        {{ $aboutData['mission'] ?? 'At KORU, we specialize in clinical massage therapy, advanced recovery technologies, IV infusion services, and professional continuing education. Every service is delivered in a clean, structured environment by certified specialists focused on measurable results and long-term wellness.' }}
                    </p>

                    <div class="border-t border-slate-800/80 pt-6" wire:key="about-koru-at-a-glance">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#0EB3B9]">KORU at a glance</p>
                        <div class="mt-4 grid gap-x-6 gap-y-5 sm:grid-cols-2">
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">Who we are</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">A wellness, recovery, therapy, and professional education center built around practical support and clinical standards.</p>
                            </article>
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">What we do</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">Clinical massage, recovery technologies, IV Therapy, Booster Shots, KORU at Home, and continuing education.</p>
                            </article>
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">Who we serve</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">Individuals seeking relief and wellness, active people focused on recovery, and professionals seeking education.</p>
                            </article>
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">How we work</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">Attentive service, structured protocols, specialized techniques, and clear communication.</p>
                            </article>
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">What sets us apart</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">We bring wellness, recovery, clinical care, and education together in one organized environment.</p>
                            </article>
                            <article class="border-l border-[#0EB3B9]/50 pl-3">
                                <h4 class="text-xs font-bold uppercase tracking-wider text-white">What KORU represents</h4>
                                <p class="mt-1.5 text-xs leading-relaxed text-slate-400 text-justify">New life, growth, strength, peace, and the possibility of moving forward with purpose.</p>
                            </article>
                        </div>
                    </div>

                </div>

                <!-- Columna Derecha: Grid 2x2 de Galería -->
                <div class="lg:col-span-6 relative" data-sal="slide-left" data-sal-duration="1000" data-sal-delay="400"
                    data-sal-easing="ease-out-cubic">
                    <!-- Efecto Glow Destello Detrás del Mosaico -->
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#0E788D]/15 blur-[100px] rounded-full -z-10">
                    </div>

                    <div class="grid grid-cols-2 gap-4" wire:key="about-gallery-grid">
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_1'] ?? asset('img/about/therapy.webp') }}"
                                 alt="KORU Center interior" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_2'] ?? asset('img/about/massage.webp') }}"
                                 alt="Treatment room" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_3'] ?? asset('img/about/team.webp') }}"
                                 alt="Our team" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#0EB3B9]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_4'] ?? asset('img/services/relaxingMen.webp') }}"
                                 alt="Clinical massage therapy" width="400" height="280" decoding="async">
                        </div>
                    </div>
                </div>

            </div>
        @endif

    </div>
</section>

