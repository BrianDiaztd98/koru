<section id="hero-carousel" 
         class="relative bg-slate-950 text-white overflow-hidden" 
         wire:ignore
         x-data="{ currentSlide: 0, totalSlides: 3, autoPlay: true, autoPlayTimer: null }" 
         x-init="autoPlayTimer = setInterval(() => { if(autoPlay) { currentSlide = (currentSlide + 1) % totalSlides } }, 6000)">
    
    @php
        $slides = [
            [
                'id' => 0,
                'badge' => 'Wellness & Performance',
                'title_line_1' => 'Relaxing Massage',
                'title_line_2' => 'Total Recovery',
                'description' => 'Advanced therapeutic techniques designed to relieve muscle tension, reduce stress levels, and significantly improve joint mobility.',
                'btn_primary_text' => 'Book a Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/relaxing.jpg')
            ],
            [
                'id' => 1,
                'badge' => 'Advanced Recovery',
                'title_line_1' => 'Normatec',
                'title_line_2' => 'Technology',
                'description' => 'Dynamic sequential compression bio-mechanisms to optimize blood flow, accelerate muscle clearance, and reduce inflammation effortlessly.',
                'btn_primary_text' => 'Book No Hands Session',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/normatec.png')
            ],
            [
                'id' => 2,
                'badge' => 'Total Regeneration',
                'title_line_1' => 'Super',
                'title_line_2' => 'Recovery Protocol',
                'description' => 'Synergistic red light therapy and cold plunge contrast routines engineered for deep cellular regeneration and elite performance.',
                'btn_primary_text' => 'Book Super Recovery',
                'btn_primary_url' => 'https://wa.me/17867528054',
                'btn_secondary_text' => 'View Services',
                'btn_secondary_url' => '#services',
                'image' => asset('img/carrucel/luzroja.webp')
            ]
        ];
    @endphp

    <div class="relative h-screen max-h-[85vh] min-h-[680px] sm:min-h-[750px]">
        
        <!-- CAROUSEL SLIDES -->
        <div class="carousel-container relative h-full" wire:key="hero-slides-wrapper">
            
            @foreach($slides as $slide)
                <div class="carousel-slide absolute inset-0 transition-all duration-1000 ease-out" 
                     :class="{ 'opacity-100 z-10': currentSlide === {{ $slide['id'] }}, 'opacity-0 z-0': currentSlide !== {{ $slide['id'] }} }"
                     wire:key="slide-{{ $slide['id'] }}">
                    <div class="relative h-full w-full">
                        
                        <!-- Imagen de Fondo con efecto de escala fluido -->
                        <div class="absolute inset-0 bg-cover bg-center transition-transform duration-[6000ms] ease-out" 
                             :class="currentSlide === {{ $slide['id'] }} ? 'scale-100' : 'scale-105'"
                             style="background-image: url('{{ $slide['image'] }}');"></div>
                        
                        <!-- Degradados Cinematográficos Médicos -->
                        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/70 to-transparent"></div>
                        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(14,120,141,0.15)_0%,_transparent_60%)]"></div>
                        
                        <!-- Contenido Interno del Slide -->
                        <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center pt-20">
                            <div class="max-w-2xl w-full" data-aos="fade-right" data-aos-duration="1200">
                                
                                <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9] mb-6 font-mono">
                                    {{ $slide['badge'] }}
                                </span>
                                
                                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                                    <span class="block text-white">{{ $slide['title_line_1'] }}</span>
                                    <span class="block text-[#0EB3B9] mt-2">{{ $slide['title_line_2'] }}</span>
                                </h1>
                                
                                <p class="text-base sm:text-lg text-slate-300 leading-relaxed mb-10 max-w-lg">
                                    {{ $slide['description'] }}
                                </p>
                                
                                <div class="flex flex-wrap gap-4">
                                    <a href="{{ $slide['btn_primary_url'] }}" target="_blank" class="inline-flex items-center justify-center px-6 py-3.5 bg-[#0EB3B9] text-white font-bold text-sm rounded-xl hover:bg-[#0E788D] transition-all duration-200 shadow-lg shadow-[#0EB3B9]/20 active:scale-[0.98]">
                                        {{ $slide['btn_primary_text'] }}
                                    </a>
                                    @if(isset($slide['btn_secondary_text']))
                                        <a href="{{ $slide['btn_secondary_url'] }}" class="inline-flex items-center justify-center px-6 py-3.5 border border-slate-700 text-slate-200 font-bold text-sm rounded-xl hover:bg-slate-900/60 backdrop-blur-sm transition-all duration-200">
                                            {{ $slide['btn_secondary_text'] }}
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        <!-- FLECHAS DE NAVEGACIÓN -->
        <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                type="button"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 hidden sm:flex items-center justify-center w-11 h-11 rounded-xl bg-slate-900/40 backdrop-blur-md border border-slate-800 text-slate-400 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white transition-all duration-200 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"/>
            </svg>
        </button>
        
        <button @click="currentSlide = (currentSlide + 1) % totalSlides; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 hidden sm:flex items-center justify-center w-11 h-11 rounded-xl bg-slate-900/40 backdrop-blur-md border border-slate-800 text-slate-400 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white transition-all duration-200 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
            </svg>
        </button>

        <!-- INDICADORES INFERIORES -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2">
            <template x-for="i in totalSlides" :key="i">
                <button @click="currentSlide = i - 1; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                        type="button"
                        class="h-1 rounded-full transition-all duration-300 focus:outline-none"
                        :class="{ 'bg-[#0EB3B9] w-8': currentSlide === i - 1, 'bg-slate-700 w-3 hover:bg-slate-500': currentSlide !== i - 1 }"></button>
            </template>
        </div>

        <!-- BARRA DE PROGRESO -->
        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-slate-900 z-20 overflow-hidden">
            <div class="h-full bg-gradient-to-r from-[#0E788D] to-[#0EB3B9] transition-all duration-1000 ease-linear" 
                 :style="`width: ${((currentSlide + 1) / totalSlides) * 100}%`"></div>
        </div>
    </div>
</section>