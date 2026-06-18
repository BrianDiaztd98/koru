<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon_bgvoid.png') }}">
    <title>Koru Center - Massage, Rehabilitation & Sport Performance</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-white text-gray-900 font-sans antialiased">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/95 backdrop-blur-xl border-b border-white/10 shadow-2xl shadow-black/5 transition-all duration-300" data-aos="fade-down" data-aos-duration="600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center">
                    <img src="{{ asset('img/logo.png') }}" alt="Koru Center" class="h-20 w-auto object-contain" />
                </div>
                <div class="hidden md:flex items-center space-x-4 flex-1 justify-end">
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
                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center px-6 py-2.5 bg-mint text-white font-bold rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-lg" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="700" data-i18n="nav.reserve">
                        Reservar Ahora
                    </a>
                </div>
                <button id="mobile-menu-button" class="md:hidden inline-flex items-center justify-center p-2 rounded-full border border-gray-200 bg-white/95 text-gray-700 hover:text-mint hover:border-mint transition" aria-expanded="false" aria-label="Abrir menú">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div id="mobile-menu" class="md:hidden hidden border-t border-white/10 bg-white/95 backdrop-blur-xl">
            <div class="px-4 py-4 space-y-3">
                <a href="#services" class="block text-gray-700 hover:text-mint font-semibold">Servicios</a>
                <a href="#videos" class="block text-gray-700 hover:text-mint font-semibold">Videos</a>
                <a href="#team" class="block text-gray-700 hover:text-mint font-semibold">Equipo</a>
                <a href="#location" class="block text-gray-700 hover:text-mint font-semibold">Ubicación</a>
                <a href="https://wa.me/17867528054" target="_blank" class="block w-full text-center px-4 py-3 bg-mint text-white font-bold rounded-xl hover:bg-mint/90">Reservar Ahora</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section with Image Carousel -->
    <section class="pt-16 bg-slate-950 text-white overflow-hidden">
        <div class="relative">
            <!-- Carousel -->
            <div class="carousel-container h-auto min-h-[68vh] md:min-h-[72vh] lg:min-h-[70vh]">
                <div class="carousel-slide active absolute inset-0 h-full">
                    <div class="relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center blur-[2px]" style="background-image: url('{{ asset('img/carrucel/relaxing.jpg') }}');"></div>
                        <div class="absolute inset-0 hero-gradient-overlay"></div>
                        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full min-h-[68vh] md:min-h-[72vh] lg:min-h-[70vh] flex items-center py-8 sm:py-10 lg:py-12">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <div class="inline-flex items-center gap-3 mb-6">
                                    <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-gray-200">
                                        Wellness & Performance
                                    </span>
                                    <span class="hidden sm:block h-px w-16 bg-white/30"></span>
                                </div>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight tracking-tight mb-6" data-i18n="hero.slide1.title">
                                    Masaje Relajante
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8" data-i18n="hero.slide1.subtitle">
                                    Técnicas terapéuticas para aliviar tensión muscular y mejorar la movilidad.
                                </p>
                                <ul class="grid gap-3 sm:grid-cols-2 text-gray-300 mb-10">
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Ambiente premium y atención personalizada.</li>
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Resultados rápidos con técnicas certificadas.</li>
                                </ul>
                                <div class="flex flex-col sm:flex-row gap-4 mb-8" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900">
                                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl" data-i18n="hero.cta_book">
                                        Reservar una Sesion
                                    </a>
                                    <a href="#services" class="inline-flex items-center justify-center px-8 py-4 border-2 border-white/30 text-white font-semibold text-lg rounded-lg hover:bg-white/10 transition-all" data-i18n="hero.cta_services">
                                        Ver Servicios
                                    </a>
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-slate-200">
                                    <div class="rounded-3xl bg-slate-950/80 border border-white/15 p-5 shadow-2xl shadow-black/30 backdrop-blur-xl min-h-[140px] flex flex-col justify-between">
                                        <p class="text-mint font-semibold text-base">+95%</p>
                                        <p class="mt-3 text-lg font-semibold text-white">Satisfacción de clientes</p>
                                    </div>
                                    <div class="rounded-3xl bg-slate-950/80 border border-white/15 p-5 shadow-2xl shadow-black/30 backdrop-blur-xl min-h-[140px] flex flex-col justify-between">
                                        <p class="text-mint font-semibold text-base">20+ años</p>
                                        <p class="mt-3 text-lg font-semibold text-white">Experiencia en recuperación</p>
                                    </div>
                                    <div class="rounded-3xl bg-slate-950/80 border border-white/15 p-5 shadow-2xl shadow-black/30 backdrop-blur-xl min-h-[140px] flex flex-col justify-between">
                                        <p class="text-mint font-semibold text-base">Atención</p>
                                        <p class="mt-3 text-lg font-semibold text-white">Atletas y equipos profesionales</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 h-full">
                    <div class="h-full relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center blur-[2px]" style="background-image: url('{{ asset('img/carrucel/normatec.png') }}');"></div>
                        <div class="absolute inset-0 hero-gradient-overlay"></div>
                        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-8 sm:py-10 lg:py-12">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <div class="inline-flex items-center gap-3 mb-6">
                                    <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-gray-200">
                                        Recuperación avanzada
                                    </span>
                                    <span class="hidden sm:block h-px w-16 bg-white/30"></span>
                                </div>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight tracking-tight mb-6" data-i18n="hero.slide2.title">
                                    Tecnologia <span class="text-mint">Normatec</span>
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8" data-i18n="hero.slide2.subtitle">
                                    Compresion secuencial para optimizar el flujo sanguineo y acelerar la recuperacion.
                                </p>
                                <ul class="grid gap-3 sm:grid-cols-2 text-gray-300 mb-10">
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Recuperación profunda sin dolor adicional.</li>
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Soporte ideal para entrenamientos intensos.</li>
                                </ul>
                                <div class="flex justify-center sm:justify-start">
                                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex w-full max-w-md items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl sm:w-auto" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900" data-i18n="hero.slide2.cta">
                                        Reservar No Hands Session
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000 h-full">
                    <div class="h-full relative overflow-hidden">
                        <div class="absolute inset-0 bg-cover bg-center blur-[2px]" style="background-image: url('{{ asset('img/carrucel/luzroja.webp') }}');"></div>
                        <div class="absolute inset-0 hero-gradient-overlay"></div>
                        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full h-full flex items-center py-8 sm:py-10 lg:py-12">
                            <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-out-cubic">
                                <div class="inline-flex items-center gap-3 mb-6">
                                    <span class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-sm font-semibold uppercase tracking-[0.3em] text-gray-200">
                                        Regeneración total
                                    </span>
                                    <span class="hidden sm:block h-px w-16 bg-white/30"></span>
                                </div>
                                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight tracking-tight mb-6" data-i18n="hero.slide3.title">
                                    Super <span class="text-mint">Recovery</span>
                                </h1>
                                <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8" data-i18n="hero.slide3.subtitle">
                                    Luz roja y cold plunge para recuperacion profunda y regeneracion celular.
                                </p>
                                <ul class="grid gap-3 sm:grid-cols-2 text-gray-300 mb-10">
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Recupera más rápido con tecnología de punta.</li>
                                    <li class="flex items-center gap-3"><span class="inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Ideal para atletas y rehabilitación médica.</li>
                                </ul>
                                <div class="flex justify-center sm:justify-start">
                                    <a href="https://wa.me/17867528054" target="_blank" class="inline-flex w-full max-w-md items-center justify-center px-8 py-4 bg-mint text-white font-bold text-lg rounded-lg hover:bg-mint/90 transition-all transform hover:scale-105 shadow-xl sm:w-auto" data-aos="fade-up" data-aos-delay="400" data-aos-duration="900" data-i18n="hero.slide3.cta">
                                        Reservar Super Recovery
                                    </a>
                                </div>
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

    <!-- Why Choose Us -->
    <section class="py-14 bg-slate-950 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glass-panel border-white/10 p-8 md:p-10">
                <div class="grid gap-10 lg:grid-cols-[1.4fr_1fr] items-center">
                    <div>
                        <span class="section-tag">Por qué elegirnos</span>
                        <h2 class="mt-6 text-3xl md:text-4xl font-bold tracking-tight">Resultados que se sienten, experiencia que genera confianza.</h2>
                        <p class="mt-4 text-gray-300 max-w-2xl leading-relaxed">
                            Combinamos técnicas deportivas avanzadas y atención clínica para acelerar tu recuperación, mejorar tu rendimiento y ofrecer una experiencia de primer nivel.
                        </p>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                            <p class="text-mint font-semibold mb-2">Enfoque individualizado</p>
                            <p class="text-gray-300 text-sm leading-relaxed">Protocolos adaptados a cada lesión, condición y objetivo de rendimiento.</p>
                        </div>
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                            <p class="text-mint font-semibold mb-2">Tecnología de punta</p>
                            <p class="text-gray-300 text-sm leading-relaxed">Normatec, red light therapy y protocolos validados por especialistas.</p>
                        </div>
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                            <p class="text-mint font-semibold mb-2">Trato premium</p>
                            <p class="text-gray-300 text-sm leading-relaxed">Ambiente de alto nivel pensado para comodidad, privacidad y bienestar.</p>
                        </div>
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                            <p class="text-mint font-semibold mb-2">Resultados comprobados</p>
                            <p class="text-gray-300 text-sm leading-relaxed">Clientes regulares, atletas y equipos confían en nuestra capacidad de recuperación.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid with Photos -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <div class="inline-flex items-center justify-center gap-3 mb-4">
                    <span class="h-1.5 w-16 rounded-full bg-mint"></span>
                    <span class="text-sm uppercase tracking-[0.3em] text-mint">Servicios Premium</span>
                </div>
                <div class="relative mx-auto max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="services.title">Nuestros Servicios Premium</h2>
                    <p class="text-lg text-gray-600 mb-8" data-i18n="services.subtitle">Terapias especializadas con tecnologia de vanguardia</p>
                    <div class="grid gap-3 sm:grid-cols-3">
                        <div class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700">Atención personalizada</div>
                        <div class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700">Protocolos clínicos</div>
                        <div class="rounded-full border border-gray-200 bg-white px-4 py-2 text-sm font-semibold text-gray-700">Seguimiento premium</div>
                    </div>
                </div>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Deep Tissue Massage -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/deeptissuemassage.webp') }}" alt="Deep Tissue Massage" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/80 via-slate-950/10 to-transparent"></div>
                        <span class="absolute top-4 left-4 inline-flex items-center rounded-full bg-mint/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.35em] text-mint">Popular</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.deep">Deep Tissue Massage</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.deep.desc">Terapia profunda con tecnicas de cupping para liberar tension y contracturas musculares.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Atención focalizada en puntos de tensión.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Mejora de movilidad y alivio duradero.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Relaxing Massage -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/RelaxingMassage.jpg') }}" alt="Relaxing Massage" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.relax">Relaxing Massage</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.relax.desc">Piedras calientes y aromaterapia para una experiencia de relajacion profunda.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Ambiente calmado con música premium.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Relajación integral del cuerpo y mente.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Sport Recovery Therapy -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/SportRecoveryTherapy.webp') }}" alt="Sport Recovery Therapy" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.sport">Sport Recovery Therapy</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.sport.desc">Estiramientos y terapia miofascial especializada para atletas.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Plan regenerativo para entrenamiento duro.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Enfoque deportivo y funcional.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Super Recovery -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/SuperRecovery.webp') }}" alt="Super Recovery" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.super">Super Recovery</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.super.desc">Combinacion de luz roja y cold plunge para recuperacion maxima.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Recuperación profunda con tecnología curativa.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Perfecto antes y después de competiciones.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- No Hands Session -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/nohands.jpg') }}" alt="No Hands Session" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.nohands">No Hands Session</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.nohands.desc">Botas Normatec y tecnologia avanzada de compresion secuencial.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Recuperación sin esfuerzo muscular adicional.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Compresión inteligente para circulación óptima.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Therapeutic Rehab -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="350" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/Therapeutic Rehab.webp') }}" alt="Therapeutic Rehab" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.rehab">Therapeutic Rehab</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.rehab.desc">Rehabilitacion personalizada para recuperacion de lesiones.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Planes adaptados a cada etapa de recuperación.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Entrenamiento médico y función recuperada.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Mom-to-Be -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/Mom-to-Be.jpg') }}" alt="Mom-to-Be" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.mom">Mom-to-Be</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.mom.desc">Terapia prenatal segura para aliviar tensiones y preparar el parto.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Protocolo seguro para embarazadas.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Bienestar total para madre y bebé.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Couples -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="450" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/Couples.webp') }}" alt="Couples" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.couples">Couples</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.couples.desc">Sesion de masaje para dos personas en suite privada.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Experiencia compartida en un ambiente exclusivo.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Privacidad y confort de alto nivel.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>

                <!-- Koru at Home -->
                <div class="service-card group relative overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white/95 shadow-xl transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="500" data-aos-duration="700">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('img/services/Koru at Home.jpg') }}" alt="Koru at Home" class="w-full h-56 object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-linear-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-navy mb-3" data-i18n="service.home">Koru at Home</h3>
                        <p class="text-slate-600 mb-4" data-i18n="service.home.desc">Servicios de recuperacion en la comodidad de tu hogar.</p>
                        <ul class="space-y-3 text-sm text-slate-500 mb-6">
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Atención premium directamente en tu casa.</li>
                            <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2.5 w-2.5 rounded-full bg-mint"></span>Equipos y protocolos profesionales móviles.</li>
                        </ul>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-full bg-mint px-6 py-3 text-sm font-bold text-white transition hover:bg-mint/90" data-i18n="service.reserve_cta">Reservar ahora →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Showcase Section -->
    <section id="videos" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <div class="inline-flex items-center justify-center gap-3 mb-4">
                    <span class="h-1.5 w-16 rounded-full bg-mint"></span>
                    <span class="text-sm uppercase tracking-[0.3em] text-mint">Casos reales</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="videos.title">Testimonials & Demos</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="videos.subtitle">Mira cómo nuestros clientes transforman su rendimiento y recuperacion con evidencia real.</p>
            </div>
            
            <div class="grid gap-6 lg:grid-cols-3 mb-12">
                <!-- Video 1 -->
                <div class="video-card glass-panel p-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-3xl overflow-hidden shadow-lg">
                        <video controls muted playsinline preload="metadata" class="w-full h-full object-cover">
                            <source src="{{ asset('videos/testimonials/1.mp4') }}" type="video/mp4">
                            Tu navegador no soporta videos HTML5.
                        </video>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial1">Testimonio de Atleta Profesional</h3>
                </div>

                <!-- Video 2 -->
                <div class="video-card glass-panel p-6" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-3xl overflow-hidden shadow-lg">
                        <video controls muted playsinline preload="metadata" class="w-full h-full object-cover">
                            <source src="{{ asset('videos/testimonials/2.mp4') }}" type="video/mp4">
                            Tu navegador no soporta videos HTML5.
                        </video>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial2">Alivio de Contracturas</h3>
                </div>

                <!-- Video 3 -->
                <div class="video-card glass-panel p-6" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="600">
                    <div class="relative aspect-video bg-navy rounded-3xl overflow-hidden shadow-lg">
                        <video controls muted playsinline preload="metadata" class="w-full h-full object-cover">
                            <source src="{{ asset('videos/testimonials/3.mp4') }}" type="video/mp4">
                            Tu navegador no soporta videos HTML5.
                        </video>
                    </div>
                    <h3 class="text-lg font-bold text-navy mt-4" data-i18n="videos.testimonial3">Rehabilitación Ligamentaria de Rodilla</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Medical & Performance Section -->
    <section id="medical" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
                <div class="inline-flex items-center justify-center gap-3 mb-4">
                    <span class="section-tag">Rendimiento científico</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="medical.title">Sports Medicine & Performance</h2>
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
                <div class="inline-flex items-center justify-center gap-3 mb-4">
                    <span class="section-tag">Expertos certificados</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4" data-i18n="team.title">Conoce a Nuestro Equipo</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto" data-i18n="team.subtitle">Especialistas certificados comprometidos con tu recuperacion y rendimiento</p>
            </div>

            <!-- Desktop / Tablet Grid (4 columns desktop) -->
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 py-6">
                @php
                    $teamMembers = [
                        ['img' => 'team1', 'name' => 'Lenys', 'role' => 'Fisioterapeuta', 'specialty' => 'Recuperación deportiva y masaje terapéutico', 'link' => 'https://www.instagram.com/lenysftto/'],
                        ['img' => 'team2', 'name' => 'Raúl', 'role' => 'Especialista en rendimiento', 'specialty' => 'Evaluación biomecánica y rehabilitación funcional', 'link' => 'https://www.instagram.com/rauldiazfisio/'],
                        ['img' => 'team3', 'name' => 'Pierre', 'role' => 'Terapeuta deportivo', 'specialty' => 'Planes de recuperación para atletas', 'link' => 'https://www.instagram.com/fisiopierre/'],
                        ['img' => 'team4', 'name' => 'Angie', 'role' => 'Coach de movilidad', 'specialty' => 'Movilidad avanzada y prevención de lesiones', 'link' => 'https://www.instagram.com/angietherapy/'],
                    ];
                @endphp
                @foreach ($teamMembers as $member)
                    <div class="team-card overflow-hidden rounded-3xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}" data-aos-duration="600">
                        <div class="aspect-9/16 w-full overflow-hidden bg-gray-100">
                            <img src="{{ asset('img/team/'. $member['img'] .'.png') }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-navy mb-1">{{ $member['name'] }}</h3>
                            <p class="text-sm uppercase tracking-[0.3em] font-semibold text-mint mb-4">{{ $member['role'] }}</p>
                            <p class="text-sm text-gray-600 mb-6">{{ $member['specialty'] }}</p>
                            <a href="{{ $member['link'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-navy hover:bg-mint hover:text-white transition">
                                Ver perfil
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Mobile Carousel / Horizontal Swipe -->
            <div class="md:hidden py-6">
                <div class="-mx-4 px-4 overflow-x-auto no-scrollbar snap-x snap-mandatory flex gap-4">
                    @foreach ($teamMembers as $member)
                        <div class="snap-center shrink-0 w-64 sm:w-72 max-w-xs">
                            <div class="team-card overflow-hidden rounded-3xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 80) }}" data-aos-duration="600">
                                <div class="aspect-9/16 w-full overflow-hidden bg-gray-100">
                                    <img src="{{ asset('img/team/'. $member['img'] .'.png') }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                                </div>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold text-navy mb-1">{{ $member['name'] }}</h3>
                                    <p class="text-xs uppercase tracking-[0.3em] font-semibold text-mint mb-3">{{ $member['role'] }}</p>
                                    <p class="text-sm text-gray-600 mb-5">{{ $member['specialty'] }}</p>
                                    <a href="{{ $member['link'] }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-navy hover:bg-mint hover:text-white transition">
                                        Ver perfil
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
    <section id="location" class="relative overflow-hidden py-24 bg-slate-950 text-white">
        <div class="absolute inset-x-0 top-0 h-64 bg-slate-900/70 blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14" data-aos="fade-up" data-aos-duration="700">
                <div class="inline-flex items-center justify-center gap-3 mb-4">
                    <span class="section-tag bg-slate-800/90 text-slate-200">Ubicación estratégica</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Ubicación y Horarios</h2>
                <p class="mx-auto max-w-2xl text-lg text-slate-300">Nuestro centro está ubicado a minutos del aeropuerto, con acceso directo y estacionamiento reservado para atletas y clientes premium.</p>
            </div>

            <div class="grid gap-10 lg:grid-cols-[0.95fr_1.05fr]">
                <div class="rounded-[2rem] border border-white/10 bg-slate-900/95 p-8 shadow-2xl" data-aos="fade-right" data-aos-duration="700">
                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between mb-8">
                        <div>
                            <p class="text-sm uppercase tracking-[0.4em] text-slate-400">Sede principal</p>
                            <h3 class="mt-3 text-3xl font-semibold text-white">Centro de Recuperación Koru</h3>
                        </div>
                        <span class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-200">
                            <svg class="w-5 h-5 text-slate-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.686 2 6 4.686 6 8c0 4.5 6 12 6 12s6-7.5 6-12c0-3.314-2.686-6-6-6zm0 8.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Virginia Gardens, FL
                        </span>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-800/90 text-slate-200">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17 10.5a5 5 0 1 0-10 0c0 3.5 5 9.5 5 9.5s5-6 5-9.5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 12a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-sm uppercase tracking-[0.35em] text-slate-400">Dirección</p>
                                    <p class="mt-2 text-base text-slate-200">6405 NW 36th St, #100<br>Virginia Gardens, FL 33166</p>
                                </div>
                            </div>
                            <p class="text-sm text-slate-400">A solo 8 minutos del aeropuerto y con acceso rápido a la autopista Palmetto.</p>
                        </div>

                        <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6">
                            <div class="flex items-center gap-3 mb-4">
                                <span class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-800/90 text-slate-200">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 7h12M6 12h9M6 17h6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <div>
                                    <p class="text-sm uppercase tracking-[0.35em] text-slate-400">Horario</p>
                                    <p class="mt-2 text-base text-slate-200">Jueves a Martes: 8:00 AM - 8:00 PM</p>
                                </div>
                            </div>
                            <p class="text-sm text-slate-400">Miércoles cerrado para mantenimiento interno y atención especializada.</p>
                        </div>
                    </div>

                    <div class="mt-6 rounded-3xl border border-white/10 bg-slate-900/80 p-6">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-flex h-12 w-12 items-center justify-center rounded-3xl bg-slate-800/90 text-slate-200">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 15.5a17.82 17.82 0 0 1-2.5 3.5c-1.4 1.4-3 2.7-4.5 3.2-1 .3-2.1.5-3.2.5a12.23 12.23 0 0 1-3.4-.5c-1.5-.5-3.2-1.7-4.5-3.1A17.81 17.81 0 0 1 2.5 15.5 2.61 2.61 0 0 1 2 13.5c0-.7.4-1.4 1.1-1.9.8-.6 2-.9 3.5-.9.7 0 1.4.1 2.1.2.9.2 1.8.5 2.7.8.8.3 1.5.5 2.2.5s1.4-.2 2.2-.5c.9-.3 1.8-.6 2.7-.8.7-.1 1.4-.2 2.1-.2 1.5 0 2.7.3 3.5.9.7.5 1.1 1.2 1.1 1.9 0 .5-.2 1-.5 1.4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm uppercase tracking-[0.35em] text-slate-400">Contacto</p>
                                <p class="mt-2 text-base text-slate-200">+1 786-752-8054</p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-400">Atendemos a atletas profesionales y clientes premium, siempre con atención personalizada.</p>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl" data-aos="fade-left" data-aos-duration="700">
                        <iframe
                            class="w-full h-[420px]"
                            src="https://maps.google.com/maps?q=6405%20NW%2036th%20St%20Virginia%20Gardens%20FL%2033166&output=embed"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            aria-label="Mapa de ubicación de Koru Center">
                        </iframe>
                    </div>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <a href="https://maps.google.com/maps?q=6405+NW+36th+St+Virginia+Gardens+FL+33166" target="_blank" class="inline-flex items-center justify-center rounded-3xl border border-white/15 bg-slate-900/95 px-6 py-4 text-sm font-semibold text-slate-100 transition hover:border-slate-400 hover:bg-slate-800">
                            Ver en Google Maps
                        </a>
                        <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center justify-center rounded-3xl bg-slate-200 px-6 py-4 text-sm font-semibold text-slate-950 transition hover:bg-slate-100">
                            Reservar por WhatsApp
                        </a>
                    </div>
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
                    "hero.slide1.title": "Relaxing Massage",
                    "hero.slide1.subtitle": "Therapeutic techniques to relieve muscle tension and improve mobility.",
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
                    "videos.testimonial2": "Muscle Tension Relief",
                    "videos.testimonial3": "Knee Ligament Rehab",
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
                    "hero.slide1.title": "Masaje Relajante",
                    "hero.slide1.subtitle": "Técnicas terapéuticas para aliviar tensión muscular y mejorar la movilidad.",
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
                    "videos.testimonial2": "Alivio de Contracturas",
                    "videos.testimonial3": "Rehabilitación Ligamentaria de Rodilla",
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