<header x-data="{ mobileMenuOpen: false }"
    class="relative z-50 border-b border-slate-800/80 bg-[#020617] shadow-lg shadow-black/25"
        style="will-change: transform, background-color;">
    
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        
        <!-- Logo Principal -->
            <a href="#about-us" class="flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-aqua rounded-xl transition-transform active:scale-95" aria-label="KORU Center - Back to top">
            <img src="{{ asset('img/logo.png') }}" alt="KORU Center" width="144" height="56" class="h-14 w-auto object-contain" loading="eager" decoding="async" fetchpriority="high" />
        </a>

        <!-- Navegación de Escritorio (Desktop) -->
        <nav class="hidden items-center gap-8 lg:flex" aria-label="Main navigation">
            @foreach($headerNavItems ?? [] as $item)
                <a href="{{ $item['href'] }}" class="text-sm font-semibold text-cool-gray transition-colors duration-200 hover:text-aqua focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-aqua rounded">{{ $item['label'] }}</a>
            @endforeach

            <!-- Contacto principal, subordinado a la presentación institucional -->
            <a href="{{ $whatsappBookingUrl ?? 'https://wa.me/17867528054' }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center rounded-xl bg-[#02B8BC] px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-[#02B8BC]/10 transition-all duration-200 hover:bg-[#037E93] hover:shadow-lg hover:shadow-[#02B8BC]/20 active:scale-[0.98]">
                Contact KORU
            </a>
        </nav>

        <!-- Botón de Menú Móvil -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 p-2.5 text-cool-gray shadow-sm transition-all hover:border-aqua/40 hover:text-aqua lg:hidden focus:outline-none focus-visible:ring-2 focus-visible:ring-aqua"
                aria-expanded="false"
                :aria-expanded="mobileMenuOpen.toString()"
                aria-controls="mobile-menu">
            <span class="sr-only">Toggle main menu</span>
            <!-- Icono de Hamburguesa (Se oculta al abrir) -->
            <svg x-show="!mobileMenuOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icono de Cierre (Se muestra al abrir) -->
            <svg x-show="mobileMenuOpen" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Desplegable Móvil -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         id="mobile-menu"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="border-t border-slate-800/80 bg-[#020617] backdrop-blur-xl lg:hidden">
        
        <div class="space-y-2 px-4 py-4 shadow-inner">
            @if(isset($headerNavItems) && count($headerNavItems) > 0)
                @foreach($headerNavItems as $item)
                    <a href="{{ $item['href'] }}" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-semibold text-cool-gray transition hover:bg-slate-900 hover:text-aqua focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-aqua">{{ $item['label'] }}</a>
                @endforeach
            @else
                <!-- Fallbacks estáticos si el arreglo no está listo en el backend -->
                <a href="#about-us" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-semibold text-cool-gray transition hover:bg-slate-900 hover:text-aqua">About</a>
                <a href="#location" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-semibold text-cool-gray transition hover:bg-slate-900 hover:text-aqua">Location</a>
            @endif
            
            <!-- Contacto principal móvil -->
            <a href="{{ $whatsappBookingUrl ?? 'https://wa.me/17867528054' }}" target="_blank" rel="noopener noreferrer" class="block rounded-xl bg-[#02B8BC] px-4 py-3 text-center text-sm font-bold text-white shadow-md transition hover:bg-[#037E93]">
                Contact KORU
            </a>
        </div>
    </div>
</header>
