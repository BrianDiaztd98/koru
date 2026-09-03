<!-- CAMBIO: Se mantiene la estructura exacta de espaciado pt-20 pb-24 para consistencia de transiciones -->
<section id="about-us" class="relative pt-20 pb-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <!-- Luces ambientales de fondo clínicas con gradiente ascendente inverso idéntico al sitio -->
    <div
        class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#037E93]/10 via-slate-900 to-slate-900">
    </div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        @if (!($aboutData['has_real_data'] ?? false))
            <div
                class="rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10">
                <div
                    class="inline-flex items-center gap-2.5 rounded-md bg-[#02B8BC]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#02B8BC]">
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
                    class="inline-flex items-center gap-2.5 rounded-md bg-[#02B8BC]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#02B8BC]">
                    {{ $aboutData['title'] ?? 'About KORU' }}
                </div>
                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                    {{ $aboutData['subtitle'] ?? 'Bridging the gap between recovery, movement, and education' }}
                </h2>
                <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400">
                    {{ $aboutData['description'] ?? 'Therapy, recovery, and professional education in Miami, under one roof.' }}
                </p>
                <p class="mt-6 text-sm font-bold uppercase tracking-[0.24em] text-[#02B8BC]">
                    LESS PAIN, BETTER LIFE.
                </p>
            </div>

            <!-- Bloque de Contenido Principal Asimétrico de Alta Gama -->
            <div class="grid gap-12 lg:grid-cols-12 items-center" wire:key="about-content-wrapper">

                <!-- Columna Izquierda: Texto Dinámico consumido desde Base de Datos -->
                <div class="lg:col-span-6 space-y-6" data-sal="slide-right" data-sal-duration="1000"
                    data-sal-delay="200" data-sal-easing="ease-out-cubic">
                    <!-- El texto principal renderizado dinámicamente desde tu modelo de Laravel -->
                    <p class="text-sm leading-relaxed text-slate-400">
                        {{ $aboutData['philosophy'] ?? "Koru is the Māori symbol of the unfurling fern frond — new life, growth, and forward movement. It's the name we chose because it's what we want for every person who walks in." }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-400">
                        {{ $aboutData['vision'] ?? 'KORU is a therapy, recovery, and professional education center in Miami. We combine clinical massage therapy, advanced recovery technologies, IV therapy, and continuing education for practitioners — under one roof, with real clinical standards behind each service.' }}
                    </p>

                    <p class="text-sm leading-relaxed text-slate-400">
                        {{ $aboutData['mission'] ?? 'Care here is led by licensed professionals with backgrounds in physiotherapy and orthopedic manual therapy. Structured protocols, clear communication, and honest expectations about what each treatment can do.' }}
                    </p>

                    <div class="border-t border-slate-800/80 pt-6" wire:key="about-koru-at-a-glance">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#02B8BC]">KORU at a glance</p>
                        <div class="mt-4 grid gap-x-6 gap-y-5 sm:grid-cols-2">
                            @php
                                $glanceItems = array_slice($aboutData['glance_items'] ?? [], 0, 3);
                                if (empty($glanceItems)) {
                                    $glanceItems = [
                                        ['title' => 'What we offer', 'description' => 'Clinical massage therapy, recovery technologies, IV therapy and booster shots, KORU at Home, and continuing education for professionals.'],
                                        ['title' => 'Who we work with', 'description' => 'People living with pain or tension, active people focused on recovery, and practitioners looking to expand their clinical skills.'],
                                        ['title' => 'Why KORU', 'description' => 'Licensed Massage Therapist (Florida), Certified Cyriax Practitioner, and a physiotherapy background with published work in chronic pain and orthopedic rehabilitation.'],
                                    ];
                                }
                            @endphp

                            @foreach($glanceItems as $item)
                                <article class="border-l border-[#02B8BC]/50 pl-3">
                                    <h4 class="text-xs font-bold uppercase tracking-wider text-white">{{ $item['title'] }}</h4>
                                    <p class="mt-1.5 text-xs leading-relaxed text-slate-400">{{ $item['description'] }}</p>
                                </article>
                            @endforeach
                        </div>
                        <div class="mt-7 flex flex-wrap gap-3">
                            <a href="{{ $bookingUrl }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center rounded-xl bg-[#02B8BC] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-[#02B8BC]/15 transition hover:bg-[#037E93] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC] focus-visible:ring-offset-2 focus-visible:ring-offset-slate-900">
                                Book a session
                            </a>
                            <a href="#services"
                                class="inline-flex items-center rounded-xl border border-slate-600 px-5 py-3 text-sm font-bold text-slate-200 transition hover:border-[#02B8BC] hover:text-[#02B8BC] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]">
                                See our services
                            </a>
                        </div>
                    </div>

                </div>

                <!-- Columna Derecha: Grid 2x2 de Galería -->
                <div class="lg:col-span-6 relative" data-sal="slide-left" data-sal-duration="1000" data-sal-delay="400"
                    data-sal-easing="ease-out-cubic">
                    <!-- Efecto Glow Destello Detrás del Mosaico -->
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-[#037E93]/15 blur-[100px] rounded-full -z-10">
                    </div>

                    <div class="grid grid-cols-2 gap-4" wire:key="about-gallery-grid">
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#02B8BC]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_1'] ?? asset('img/about/therapy.webp') }}"
                                 alt="KORU Center interior" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#02B8BC]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_2'] ?? asset('img/about/massage.webp') }}"
                                 alt="Treatment room" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#02B8BC]/30">
                            <img class="object-cover w-full h-40 sm:h-52 rounded-xl transition-all duration-500 scale-100 group-hover:scale-105"
                                 src="{{ $aboutData['image_3'] ?? asset('img/about/team.webp') }}"
                                 alt="Our team" width="400" height="280" decoding="async">
                        </div>
                        <div class="group relative overflow-hidden rounded-2xl border border-slate-800/80 bg-slate-950/40 p-1.5 backdrop-blur-sm transition-all duration-300 hover:border-[#02B8BC]/30">
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

