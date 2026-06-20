<section id="hero-carousel" class="relative bg-slate-950 text-white overflow-hidden" x-data="{ currentSlide: 0, totalSlides: 3, autoPlay: true }" x-init="autoPlayTimer = setInterval(() => { if(autoPlay) { currentSlide = (currentSlide + 1) % totalSlides } }, 6000)">
    <div class="relative h-screen max-h-[80vh] min-h-[700px]">
        
        <!-- Carousel Slides -->
        <div class="carousel-container relative h-full">
            
            <!-- Slide 1 - Masaje Relajante -->
            <div class="carousel-slide absolute inset-0 transition-all duration-1000 ease-out" :class="{ 'opacity-100 z-10': currentSlide === 0, 'opacity-0 z-0': currentSlide !== 0 }">
                <div class="relative h-full w-full">
                    <div class="absolute inset-0 bg-cover bg-center scale-105" style="background-image: url('{{ asset('img/carrucel/relaxing.jpg') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/40"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(14,180,137,0.15)_0%,_transparent_50%)]"></div>
                    
                    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center pt-24 pb-20">
                        <div class="max-w-2xl w-full" data-aos="fade-right" data-aos-duration="1200">
                            <span class="inline-flex items-center rounded-full bg-mint/20 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.3em] text-mint mb-6">
                                Wellness & Performance
                            </span>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                                <span class="block">Masaje Relajante</span>
                                <span class="block text-mint mt-2">Recuperación Total</span>
                            </h1>
                            <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-10 max-w-lg">
                                Técnicas terapéuticas avanzadas para aliviar tensión muscular, reducir estrés y mejorar la movilidad articular.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                                <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-full hover:bg-mint/90 transition-all transform hover:scale-105 shadow-2xl shadow-mint/25">
                                    Reservar una Sesión
                                </a>
                                <a href="#services" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/20 text-white font-semibold text-lg rounded-full hover:bg-white/10 backdrop-blur-sm transition-all">
                                    Ver Servicios
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 - Tecnología Normatec -->
            <div class="carousel-slide absolute inset-0 transition-all duration-1000 ease-out" :class="{ 'opacity-100 z-10': currentSlide === 1, 'opacity-0 z-0': currentSlide !== 1 }">
                <div class="relative h-full w-full">
                    <div class="absolute inset-0 bg-cover bg-center scale-105" style="background-image: url('{{ asset('img/carrucel/normatec.png') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/40"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(14,180,137,0.15)_0%,_transparent_50%)]"></div>
                    
                    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center pt-28 pb-32">
                        <div class="max-w-2xl w-full" data-aos="fade-right" data-aos-duration="1200">
                            <div class="inline-flex items-center gap-3 mb-6">
                                <span class="inline-flex items-center rounded-full bg-mint/20 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.3em] text-mint">
                                    Recuperación Avanzada
                                </span>
                                <span class="hidden sm:block h-px w-20 bg-gradient-to-r from-mint/50 to-transparent"></span>
                            </div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                                <span class="block">Tecnología</span>
                                <span class="block text-mint mt-2">Normatec</span>
                            </h1>
                            <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-10 max-w-lg">
                                Compresión secuencial para optimizar el flujo sanguíneo, acelerar la recuperación y reducir inflamación sin esfuerzo.
                            </p>
                            <div class="flex justify-center sm:justify-start">
                                <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-full hover:bg-mint/90 transition-all transform hover:scale-105 shadow-2xl shadow-mint/25">
                                    Reservar No Hands Session
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 - Super Recovery -->
            <div class="carousel-slide absolute inset-0 transition-all duration-1000 ease-out" :class="{ 'opacity-100 z-10': currentSlide === 2, 'opacity-0 z-0': currentSlide !== 2 }">
                <div class="relative h-full w-full">
                    <div class="absolute inset-0 bg-cover bg-center scale-105" style="background-image: url('{{ asset('img/carrucel/luzroja.webp') }}');"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/40"></div>
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_rgba(14,180,137,0.15)_0%,_transparent_50%)]"></div>
                    
                    <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center pt-28 pb-32">
                        <div class="max-w-2xl w-full" data-aos="fade-right" data-aos-duration="1200">
                            <div class="inline-flex items-center gap-3 mb-6">
                                <span class="inline-flex items-center rounded-full bg-mint/20 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.3em] text-mint">
                                    Regeneración Total
                                </span>
                                <span class="hidden sm:block h-px w-20 bg-gradient-to-r from-mint/50 to-transparent"></span>
                            </div>
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight mb-6">
                                <span class="block">Super</span>
                                <span class="block text-mint mt-2">Recovery</span>
                            </h1>
                            <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-10 max-w-lg">
                                Luz roja y cold plunge para recuperación profunda, regeneración celular y rendimiento óptimo.
                            </p>
                            <div class="flex justify-center sm:justify-start">
                                <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-full hover:bg-mint/90 transition-all transform hover:scale-105 shadow-2xl shadow-mint/25">
                                    Reservar Super Recovery
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <button @click="currentSlide = (currentSlide - 1 + totalSlides) % totalSlides; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                class="absolute left-4 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-mint hover:text-white transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>
        
        <button @click="currentSlide = (currentSlide + 1) % totalSlides; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                class="absolute right-4 top-1/2 -translate-y-1/2 z-20 flex items-center justify-center w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-mint hover:text-white transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3">
            <template x-for="i in totalSlides" :key="i">
                <button @click="currentSlide = i - 1; autoPlay = false; setTimeout(() => autoPlay = true, 10000)" 
                        class="w-10 h-2.5 rounded-full transition-all duration-300"
                        :class="{ 'bg-mint w-12': currentSlide === i - 1, 'bg-white/30 hover:bg-white/50': currentSlide !== i - 1 }"></button>
            </template>
        </div>

        <!-- Progress Bar -->
        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-white/10 z-20 overflow-hidden">
            <div class="h-full bg-mint transition-all duration-1000 ease-linear" :style="`width: ${((currentSlide + 1) / totalSlides) * 100}%`"></div>
        </div>
    </div>
</section>