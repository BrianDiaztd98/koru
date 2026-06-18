<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koru Center - Massage, Rehabilitation & Sport Performance</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white text-gray-900 font-sans antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-sm border-b border-gray-100 transition-all duration-300" data-aos="fade-down" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-navy">KORU<span class="text-mint">CENTER</span></span>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#services" class="text-gray-700 hover:text-mint transition-colors" data-i18n="nav.services">Servicios</a>
                    <a href="#videos" class="text-gray-700 hover:text-mint transition-colors" data-i18n="nav.videos">Videos</a>
                    <a href="#team" class="text-gray-700 hover:text-mint transition-colors" data-i18n="nav.team">Equipo</a>
                    <a href="#location" class="text-gray-700 hover:text-mint transition-colors" data-i18n="nav.location">Ubicación</a>
                    <div class="relative inline-flex items-center rounded-full border border-gray-200 bg-white/95 shadow-lg shadow-gray-200/80 transition hover:border-mint focus-within:ring-2 focus-within:ring-mint focus-within:ring-offset-2">
                        <label for="lang-select" class="sr-only">Language</label>
                        <select id="lang-select" class="block appearance-none bg-transparent px-5 py-2.5 pr-10 text-sm font-semibold text-gray-900 rounded-full outline-none transition focus:text-gray-900 focus:bg-white" aria-label="Language switcher">
                            <option value="en">EN</option>
                            <option value="es">ES</option>
                        </select>
                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 10.939l3.71-3.71a.75.75 0 1 1 1.06 1.06l-4.24 4.25a.75.75 0 0 1-1.06 0L5.21 8.27a.75.75 0 0 1 .02-1.06z" />
                            </svg>
                        </span>
                    </div>
                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center px-6 py-2.5 bg-mint text-navy font-bold rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-lg" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="700" data-i18n="nav.reserve">
                        Reservar Ahora
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Image Carousel -->
    <section class="pt-16 bg-navy text-white overflow-hidden">
        <div class="relative">
            <!-- Carousel -->
            <div class="carousel-container h-[600px] md:h-[700px]">
                <div class="carousel-slide active absolute inset-0">
                    <div class="h-full bg-cover bg-center bg-[url('https://placehold.co/1920x1080/0A192F/00BFA6?text=Cold+Plunge+Ice+Bath')] flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6" data-i18n="hero.title">
                                    Recupera. Rendir. 
                                    <span class="text-mint">Evolve.</span>
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 mb-8" data-i18n="hero.subtitle">
                                    Centro de excelencia en recuperacion y rendimiento deportivo. Tecnologia de vanguardia para resultados maximos.
                                </p>
                                <div class="flex flex-col sm:flex-row gap-4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900">
                                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-navy font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl" data-i18n="hero.cta_book">
                                        Reservar una Sesion
                                    </a>
                                    <a href="#services" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/30 text-white font-semibold text-lg rounded-lg hover:bg-white/10 transition-all" data-i18n="hero.cta_services">
                                        Ver Servicios
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                    <div class="h-full bg-cover bg-center bg-[url('https://placehold.co/1920x1080/0A192F/00BFA6?text=Normatec+Compression')] flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6" data-i18n="hero.slide2.title">
                                    Tecnologia <span class="text-mint">Normatec</span>
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 mb-8" data-i18n="hero.slide2.subtitle">
                                    Compresion secuencial para optimizar el flujo sanguineo y acelerar la recuperacion.
                                </p>
                                <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-navy font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900" data-i18n="hero.slide2.cta">
                                    Reservar No Hands Session
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                    <div class="h-full bg-cover bg-center bg-[url('https://placehold.co/1920x1080/0A192F/00BFA6?text=Red+Light+Therapy')] flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-6" data-i18n="hero.slide3.title">
                                    Super <span class="text-mint">Recovery</span>
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 mb-8" data-i18n="hero.slide3.subtitle">
                                    Luz roja y cold plunge para recuperacion profunda y regeneracion celular.
                                </p>
                                <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-navy font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900" data-i18n="hero.slide3.cta">
                                    Reservar Super Recovery
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel Indicators -->
                <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2" data-aos="fade-up" data-aos-delay="600" data-aos-duration="600">
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-mint active" data-slide="0"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-white/30 hover:bg-mint transition-colors" data-slide="1"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-white/30 hover:bg-mint transition-colors" data-slide="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid with Photos -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="services.title">Nuestros Servicios Premium</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="services.subtitle">Terapias especializadas con tecnologia de vanguardia</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Deep Tissue Massage -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <img src="{{ asset('img/services/deeptissuemassage.webp') }}" alt="Deep Tissue Massage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.deep">Deep Tissue Massage</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.deep.desc">Terapia profunda con tecnicas de cupping para liberar tension y contracturas musculares.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Relaxing Massage -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                    <img src="{{ asset('img/services/RelaxingMassage.jpg') }}" alt="Relaxing Massage" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.relax">Relaxing Massage</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.relax.desc">Piedras calientes y aromaterapia para una experiencia de relajacion profunda.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Sport Recovery Therapy -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <img src="{{ asset('img/services/SportRecoveryTherapy.webp') }}" alt="Sport Recovery Therapy" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.sport">Sport Recovery Therapy</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.sport.desc">Estiramientos y terapia miofascial especializada para atletas.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Super Recovery -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                    <img src="{{ asset('img/services/SuperRecovery.webp') }}" alt="Super Recovery" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.super">Super Recovery</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.super.desc">Combinacion de luz roja y cold plunge para recuperacion maxima.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- No Hands Session -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                    <img src="{{ asset('img/services/nohands.jpg') }}" alt="No Hands Session" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.nohands">No Hands Session</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.nohands.desc">Botas Normatec y tecnologia avanzada de compresion secuencial.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Therapeutic Rehab -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="350" data-aos-duration="700">
                    <img src="{{ asset('img/services/Therapeutic Rehab.webp') }}" alt="Therapeutic Rehab" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.rehab">Therapeutic Rehab</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.rehab.desc">Rehabilitacion personalizada para recuperacion de lesiones.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Mom-to-Be -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                    <img src="{{ asset('img/services/Mom-to-Be.jpg') }}" alt="Mom-to-Be" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.mom">Mom-to-Be</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.mom.desc">Terapia prenatal segura para aliviar tensiones y preparar el parto.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Couples -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="450" data-aos-duration="700">
                    <img src="{{ asset('img/services/Couples.webp') }}" alt="Couples" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.couples">Couples</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.couples.desc">Sesion de masaje para dos personas en suite privada.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Koru at Home -->
                <div class="service-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="500" data-aos-duration="700">
                    <img src="{{ asset('img/services/Koru at Home.jpg') }}" alt="Koru at Home" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-navy mb-2" data-i18n="service.home">Koru at Home</h3>
                        <p class="text-gray-600 mb-4" data-i18n="service.home.desc">Servicios de recuperacion en la comodidad de tu hogar.</p>
                        <a href="https://wa.me/17867528054" target="_blank" class="text-mint font-semibold hover:underline" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Showcase Section -->
    <section id="videos" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="videos.title">Testimonios y Demostraciones</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="videos.subtitle">Mira como nuestros clientes transforman su rendimiento y recuperacion</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Video 1 -->
                <div class="video-card group cursor-pointer" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-xl overflow-hidden shadow-lg">
                        <img src="https://placehold.co/600x400/0A192F/FFFFFF?text=Athlete+Testimonial" alt="Video thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-mint rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-navy ml-1" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial1">Testimonio de Atleta Profesional</h3>
                </div>

                <!-- Video 2 -->
                <div class="video-card group cursor-pointer" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-xl overflow-hidden shadow-lg">
                        <img src="https://placehold.co/600x400/0A192F/FFFFFF?text=Cold+Plunge+Demo" alt="Video thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-mint rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-navy ml-1" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial2">Cold Plunge en Accion</h3>
                </div>

                <!-- Video 3 -->
                <div class="video-card group cursor-pointer" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-xl overflow-hidden shadow-lg">
                        <img src="https://placehold.co/600x400/0A192F/FFFFFF?text=Normatec+Session" alt="Video thumbnail" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 bg-mint rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-8 h-8 text-navy ml-1" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial3">Sesion Normatec Completa</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical & Performance Section -->
    <section id="medical" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="medical.title">Medicina del Deporte y Rendimiento</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="medical.subtitle">Optimizacion integral mediante enfoques cientificos</p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Metabolic & Endocrine Consultations -->
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100" data-aos="fade-right" data-aos-delay="100" data-aos-duration="700">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-mint/10 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-mint" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 22C12 22 20 18 20 12V5L12 2L4 5V12C4 18 12 22 12 22Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 8V12L14 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy" data-i18n="medical.consult.title">Metabolic & Endocrine Consultations</h3>
                    </div>
                    <p class="text-gray-600 mb-4" data-i18n="medical.consult.desc">
                        Evaluacion y optimizacion de metabolismo y hormonas para mejorar rendimiento, recuperacion y bienestar general.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.consult.item1">Analisis de metabolismo basal</span></li>
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.consult.item2">Optimizacion hormonal</span></li>
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.consult.item3">Estrategias de nutricion de precision</span></li>
                    </ul>
                </div>

                <!-- Assessment Sessions -->
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100" data-aos="fade-left" data-aos-delay="200" data-aos-duration="700">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-mint/10 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-8 h-8 text-mint" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 11L12 14L22 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 12V19C21 19.5523 20.5523 20 20 20H4C3.44772 20 3 19.5523 3 19V5C3 4.44772 3.44772 4 4 4H14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-navy" data-i18n="medical.assessment.title">Assessment Sessions</h3>
                    </div>
                    <p class="text-gray-600 mb-4" data-i18n="medical.assessment.desc">
                        Evaluaciones completas de movimiento y biomecanica para identificar limitaciones.
                    </p>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.assessment.item1">Analisis de movimiento funcional</span></li>
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.assessment.item2">Identificacion de debilidades</span></li>
                        <li class="flex items-center"><span class="w-2 h-2 bg-mint rounded-full mr-2"></span><span data-i18n="medical.assessment.item3">Plan de entrenamiento optimizado</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Meet Our Team Section (Team Showcase: 9:16 vertical cards + mobile carousel) -->
    <section id="team" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="team.title">Conoce a Nuestro Equipo</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="team.subtitle">Especialistas certificados comprometidos con tu recuperacion y rendimiento</p>
            </div>

            <!-- Desktop / Tablet Grid (4 columns desktop) -->
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 py-6">
                @php
                    $instas = [
                        'https://www.instagram.com/lenysftto/',
                        'https://www.instagram.com/rauldiazfisio/',
                        'https://www.instagram.com/fisiopierre/',
                        'https://www.instagram.com/angietherapy/'
                    ];
                @endphp
                @foreach (['team1','team2','team3','team4'] as $i => $img)
                    <div class="team-card relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="{{ 100 + ($i * 100) }}" data-aos-duration="600">
                        <div class="aspect-[9/16] w-full bg-gray-100 relative">
                            <img src="{{ asset('img/team/'. $img .'.png') }}" alt="Team member {{ $i+1 }}" class="w-full h-full object-cover">

                            <a href="{{ $instas[$i] }}" target="_blank" rel="noopener noreferrer" aria-label="Ver perfil de Instagram del miembro {{ $i+1 }}" class="absolute bottom-4 left-4 bg-white/90 text-navy text-sm font-semibold rounded-full px-3 py-1.5 flex items-center gap-2 shadow-md backdrop-blur-sm hover:bg-white">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7z"/>
                                    <path d="M12 7.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 2a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"/>
                                </svg>
                                <span>Ver perfil</span>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

            <!-- Mobile Carousel / Horizontal Swipe -->
            <div class="md:hidden py-6">
                <div class="-mx-4 px-4 overflow-x-auto no-scrollbar snap-x snap-mandatory flex gap-4">
                    @foreach (['team1','team2','team3','team4'] as $i => $img)
                        <div class="snap-center shrink-0 w-64 sm:w-72 max-w-xs">
                                <div class="team-card relative bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="zoom-in" data-aos-delay="{{ 100 + ($i * 80) }}" data-aos-duration="600">
                                    <div class="aspect-[9/16] w-full bg-gray-100 relative">
                                        <img src="{{ asset('img/team/'. $img .'.png') }}" alt="Team member {{ $i+1 }}" class="w-full h-full object-cover">

                                        <a href="{{ $instas[$i] }}" target="_blank" rel="noopener noreferrer" aria-label="Ver perfil de Instagram del miembro {{ $i+1 }}" class="absolute bottom-3 left-3 bg-white/90 text-navy text-xs font-semibold rounded-full px-2.5 py-1 flex items-center gap-2 shadow-sm backdrop-blur-sm hover:bg-white">
                                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7z"/>
                                                <path d="M12 7.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9zm0 2a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5z"/>
                                            </svg>
                                            <span>Ver perfil</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Location & Booking Info -->
    <section id="location" class="py-20 bg-navy text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <div data-aos="fade-right" data-aos-duration="700">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Ubicacion y Horarios</h2>
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-xl font-semibold text-mint mb-2" data-i18n="location.address.title">Direccion</h3>
                            <p class="text-gray-300" data-i18n="location.address">6405 NW 36th St, #100<br>Virginia Gardens, FL 33166</p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-mint mb-2" data-i18n="location.hours.title">Horario de Operacion</h3>
                            <p class="text-gray-300" data-i18n="location.hours">
                                Jueves a Martes: 8:00 AM - 8:00 PM<br>
                                <span class="text-gray-400">Miercoles: Cerrado</span>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-mint mb-2" data-i18n="location.contact.title">Contacto Directo</h3>
                            <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center text-lg text-white hover:text-mint transition-colors" data-i18n="location.contact.number">
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 15C21 15.5523 20.5523 16 20 16H4C3.44772 16 3 15.5523 3 15V5C3 4.44772 3.44772 4 4 4H20C20.5523 4 21 4.44772 21 5V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M7 8H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M7 12H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                                +1 786-752-8054
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 rounded-2xl p-8 backdrop-blur-sm" data-aos="fade-left" data-aos-delay="200" data-aos-duration="700">
                    <h3 class="text-2xl font-bold mb-6">Reserva tu Sesion</h3>
                    <p class="text-gray-300 mb-6">
                        Contactanos directamente por WhatsApp para agendar tu cita. Atendemos tanto a atletas profesionales como a entusiastas del fitness.
                    </p>
                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center w-full px-8 py-4 bg-mint text-navy font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl">
                        <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 15C21 15.5523 20.5523 16 20 16H4C3.44772 16 3 15.5523 3 15V5C3 4.44772 3.44772 4 4 4H20C20.5523 4 21 4.44772 21 5V15Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7 8H17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M7 12H13" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                        Enviar Mensaje por WhatsApp
                    </a>
                    <p class="text-sm text-gray-400 mt-4" data-i18n="location.reserve.note">
                        Atendemos a la comunidad atletica estadounidense y latina. Hablamos su idioma.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-gray-900 text-gray-400" data-aos="fade-up" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p data-i18n="footer.copyright">&copy; {{ date('Y') }} Koru Center. Todos los derechos reservados.</p>
        </div>
    </footer>
    <script>
        (function(){
            const translations = {
                en: {
                    "meta.title": "Koru Center - Massage, Rehabilitation & Sport Performance",
                    "nav.services": "Services",
                    "nav.videos": "Videos",
                    "nav.team": "Team",
                    "nav.location": "Location",
                    "nav.reserve": "Book Now",
                    "nav.language": "English / Español",
                    "hero.title": "Recover. Perform. <span class=\"text-mint\">Evolve.</span>",
                    "hero.subtitle": "Center of excellence in recovery and sports performance. Cutting-edge technology for maximal results.",
                    "hero.cta_book": "Book a Session",
                    "hero.cta_services": "View Services",
                    "hero.slide2.title": "Normatec Technology",
                    "hero.slide2.cta": "Book No Hands Session",
                    "hero.slide3.title": "Super Recovery",
                    "hero.slide3.cta": "Book Super Recovery",
                    "services.title": "Our Premium Services",
                    "services.subtitle": "Specialized therapies with cutting-edge technology",
                    "service.deep": "Deep Tissue Massage",
                    "service.deep.desc": "Deep tissue therapy with cupping techniques to release tension and muscle knots.",
                    "service.relax": "Relaxing Massage",
                    "service.relax.desc": "Hot stones and aromatherapy for deep relaxation.",
                    "service.sport": "Sport Recovery Therapy",
                    "service.sport.desc": "Stretching and myofascial therapy specialized for athletes.",
                    "service.super": "Super Recovery",
                    "service.super.desc": "Combination of red light and cold plunge for deep recovery.",
                    "service.nohands": "No Hands Session",
                    "service.nohands.desc": "Normatec boots and advanced sequential compression technology.",
                    "service.rehab": "Therapeutic Rehab",
                    "service.rehab.desc": "Personalized rehabilitation for injury recovery.",
                    "service.mom": "Mom-to-Be",
                    "service.mom.desc": "Safe prenatal therapy to relieve tension and prepare for childbirth.",
                    "service.couples": "Couples",
                    "service.couples.desc": "Massage session for two in a private suite.",
                    "service.home": "Koru at Home",
                    "service.home.desc": "Recovery services in the comfort of your home.",
                    "service.reserve_cta": "Reserve now →",
                    "videos.title": "Testimonials & Demos",
                    "videos.subtitle": "See how our clients transform performance and recovery",
                    "videos.testimonial1": "Professional Athlete Testimonial",
                    "videos.testimonial2": "Cold Plunge in Action",
                    "videos.testimonial3": "Full Normatec Session",
                    "medical.title": "Sports Medicine & Performance",
                    "medical.subtitle": "Comprehensive optimization through scientific approaches",
                    "team.title": "Meet Our Team",
                    "team.subtitle": "Certified specialists committed to your recovery and performance",
                    "location.heading": "Location & Hours",
                    "location.address.title": "Address",
                    "location.address": "6405 NW 36th St, #100<br>Virginia Gardens, FL 33166",
                    "location.hours.title": "Hours",
                    "location.hours": "Thu–Tue: 8:00 AM - 8:00 PM<br><span class=\"text-gray-400\">Wed: Closed</span>",
                    "location.contact.title": "Direct Contact",
                    "location.contact.number": "+1 786-752-8054",
                    "location.reserve.title": "Book Your Session",
                    "location.reserve.subtitle": "Contact us via WhatsApp to schedule. We serve pro athletes and fitness enthusiasts.",
                    "location.reserve.cta": "Send WhatsApp Message",
                    "footer.copyright": "© {{ date('Y') }} Koru Center. All rights reserved."
                },
                es: {
                    "meta.title": "Koru Center - Masaje, Rehabilitación y Rendimiento Deportivo",
                    "nav.services": "Servicios",
                    "nav.videos": "Videos",
                    "nav.team": "Equipo",
                    "nav.location": "Ubicación",
                    "nav.reserve": "Reservar Ahora",
                    "nav.language": "English / Español",
                    "hero.title": "Recupera. Rinde. <span class=\"text-mint\">Evolve.</span>",
                    "hero.subtitle": "Centro de excelencia en recuperación y rendimiento deportivo. Tecnología de vanguardia para resultados máximos.",
                    "hero.cta_book": "Reservar una Sesión",
                    "hero.cta_services": "Ver Servicios",
                    "hero.slide2.title": "Tecnología Normatec",
                    "hero.slide2.cta": "Reservar Sesión Sin Manos",
                    "hero.slide3.title": "Recuperación Avanzada",
                    "hero.slide3.cta": "Reservar Super Recovery",
                    "services.title": "Nuestros Servicios Premium",
                    "services.subtitle": "Terapias especializadas con tecnología de vanguardia",
                    "service.deep": "Masaje de Tejido Profundo",
                    "service.deep.desc": "Terapia profunda con técnicas de cupping para liberar tensión y contracturas musculares.",
                    "service.relax": "Masaje Relajante",
                    "service.relax.desc": "Piedras calientes y aromaterapia para una experiencia de relajación profunda.",
                    "service.sport": "Terapia de Recuperación Deportiva",
                    "service.sport.desc": "Estiramientos y terapia miofascial especializada para atletas.",
                    "service.super": "Recuperación Avanzada",
                    "service.super.desc": "Combinación de luz roja y cold plunge para recuperación máxima.",
                    "service.nohands": "Sesión Sin Manos",
                    "service.nohands.desc": "Botas Normatec y tecnología avanzada de compresión secuencial.",
                    "service.rehab": "Rehabilitación Terapéutica",
                    "service.rehab.desc": "Rehabilitación personalizada para recuperación de lesiones.",
                    "service.mom": "Terapia Prenatal",
                    "service.mom.desc": "Terapia prenatal segura para aliviar tensiones y preparar el parto.",
                    "service.couples": "Sesión para Parejas",
                    "service.couples.desc": "Sesión de masaje para dos personas en suite privada.",
                    "service.home": "Koru en Casa",
                    "service.home.desc": "Servicios de recuperación en la comodidad de tu hogar.",
                    "service.reserve_cta": "Reservar ahora →",
                    "videos.title": "Testimonios y Demostraciones",
                    "videos.subtitle": "Mira cómo nuestros clientes transforman su rendimiento y recuperación",
                    "videos.testimonial1": "Testimonio de Atleta Profesional",
                    "videos.testimonial2": "Cold Plunge en Acción",
                    "videos.testimonial3": "Sesión Normatec Completa",
                    "medical.title": "Medicina del Deporte y Rendimiento",
                    "medical.subtitle": "Optimización integral mediante enfoques científicos",
                    "team.title": "Conoce a Nuestro Equipo",
                    "team.subtitle": "Especialistas certificados comprometidos con tu recuperación y rendimiento",
                    "location.heading": "Ubicación y Horarios",
                    "location.address.title": "Dirección",
                    "location.address": "6405 NW 36th St, #100<br>Virginia Gardens, FL 33166",
                    "location.hours.title": "Horario de Operación",
                    "location.hours": "Jueves a Martes: 8:00 AM - 8:00 PM<br><span class=\"text-gray-400\">Miércoles: Cerrado</span>",
                    "location.contact.title": "Contacto Directo",
                    "location.contact.number": "+1 786-752-8054",
                    "location.reserve.title": "Reserva tu Sesión",
                    "location.reserve.subtitle": "Contáctanos directamente por WhatsApp para agendar tu cita. Atendemos tanto a atletas profesionales como a entusiastas del fitness.",
                    "location.reserve.cta": "Enviar Mensaje por WhatsApp",
                    "footer.copyright": "© {{ date('Y') }} Koru Center. Todos los derechos reservados."
                }
            };

            function applyLang(lang){
                console.debug('applyLang called', lang);
                if(!translations[lang]) lang='es';
                // Title tag
                if(translations[lang]['meta.title']) document.title = translations[lang]['meta.title'];

                document.querySelectorAll('[data-i18n]').forEach(el=>{
                    const key = el.getAttribute('data-i18n');
                    const val = translations[lang] && translations[lang][key];
                    if(val !== undefined){
                        if(el.tagName.toLowerCase() === 'input' || el.tagName.toLowerCase() === 'textarea'){
                            el.placeholder = val;
                        } else if(el.tagName.toLowerCase() === 'img'){
                            // skip
                        } else {
                            el.innerHTML = val;
                        }
                    } else {
                        console.debug('Missing translation for', key);
                    }
                });

                const langSelect = document.getElementById('lang-select');
                if(langSelect){
                    langSelect.value = lang;
                }

                localStorage.setItem('koru_lang', lang);
                document.documentElement.lang = lang;
            }

            // Bind toggle button
            document.addEventListener('DOMContentLoaded', function(){
                const initial = localStorage.getItem('koru_lang') || 'es';
                applyLang(initial);

                const langSelect = document.getElementById('lang-select');
                if(langSelect){
                    langSelect.value = initial;
                    langSelect.addEventListener('change', () => {
                        applyLang(langSelect.value);
                    });
                }

                // Debug: list elements that look translatable but missing data-i18n (visible text nodes)
                setTimeout(()=>{
                    const candidates = [];
                    document.querySelectorAll('main, section, header, nav, footer, div, h1, h2, h3, p, a, span, li').forEach(el=>{
                        if(el.closest('script') || el.closest('style')) return;
                        if(el.getAttribute && el.getAttribute('data-i18n')) return;
                        const text = el.textContent && el.textContent.trim();
                        if(text && text.length>2 && text.length<200){
                            // ignore numbers, addresses, phone
                            if(/\d/.test(text) && text.length<10) return;
                            if(text.toLowerCase().includes('http') || text.includes('@')) return;
                            candidates.push({el, text});
                        }
                    });
                    console.info('Potential translatable elements without data-i18n (sample):', candidates.slice(0,30).map(c=>c.text));
                },500);
            });
        })();
    </script>
</body>
</html>