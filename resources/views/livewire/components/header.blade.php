<header x-data="{ mobileMenuOpen: false, scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
        class="fixed inset-x-0 top-0 z-50 border-b transition-all duration-300"
        :class="scrolled ? 'border-slate-800/80 bg-slate-950/90 backdrop-blur-md shadow-lg shadow-slate-950/20' : 'border-transparent bg-slate-900/40 backdrop-blur-sm'"
        style="will-change: transform, background-color;">
    
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        
        <!-- Logo Principal -->
        <a href="#top" class="flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded-xl transition-transform active:scale-95">
            <img src="{{ asset('img/logo.png') }}" alt="Koru Center" class="h-14 w-auto object-contain brightness-110" loading="lazy" decoding="async" fetchpriority="low" />
        </a>

        <!-- Navegación de Escritorio (Desktop) -->
        <nav class="hidden items-center gap-8 lg:flex">
            <a href="#services" class="text-sm font-medium text-slate-300 transition-colors duration-200 hover:text-[#0EB3B9]">Services</a>

            @foreach($headerNavItems ?? [] as $item)
                <a href="{{ $item['href'] }}" class="text-sm font-medium text-slate-300 transition-colors duration-200 hover:text-[#0EB3B9]">{{ $item['label'] }}</a>
            @endforeach

            <!-- Selector de Idioma Clínico Personalizado -->
            <div class="relative flex items-center gap-1.5 rounded-full border border-slate-800 bg-slate-950/60 pl-4 pr-3 py-1.5 shadow-sm transition-colors duration-200 focus-within:border-[#0EB3B9]/50">
                <select wire:model="locale" class="appearance-none bg-transparent pr-4 text-xs font-bold uppercase tracking-wider text-slate-200 outline-none cursor-pointer z-10">
                    <option value="en" class="bg-slate-950 text-slate-200">EN</option>
                    <option value="es" class="bg-slate-950 text-slate-200">ES</option>
                </select>
                <svg class="absolute right-3.5 h-3 w-3 text-slate-500 pointer-events-none" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 8 4 4 4-4" />
                </svg>
            </div>

            <!-- Botón de Conversión CTA -->
            <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center rounded-xl bg-[#0EB3B9] px-5 py-2.5 text-sm font-bold text-white shadow-md shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-lg hover:shadow-[#0EB3B9]/20 active:scale-[0.98]">
                Book Appointment
            </a>
        </nav>

        <!-- Botón de Menú Móvil -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" 
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 p-2.5 text-slate-400 shadow-sm transition-all hover:border-[#0EB3B9]/40 hover:text-white lg:hidden focus:outline-none">
            <span class="sr-only">Toggle main menu</span>
            <!-- Icono de Hamburguesa (Se oculta al abrir) -->
            <svg x-show="!mobileMenuOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Icono de Cierre (Se muestra al abrir) -->
            <svg x-show="mobileMenuOpen" x-cloak class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Menú Desplegable Móvil -->
    <div x-show="mobileMenuOpen" 
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="border-t border-slate-800/80 bg-slate-950/95 backdrop-blur-xl lg:hidden">
        
        <div class="space-y-2 px-4 py-4 shadow-inner">
            <!-- Mensaje de Bienvenida Móvil -->
            <div class="flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 px-4 py-2.5 text-sm font-semibold text-[#0EB3B9]">
                Bienvenido
            </div>

            <a href="#services" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-[#0EB3B9]">Services</a>
            
            @if(isset($headerNavItems) && count($headerNavItems) > 0)
                @foreach($headerNavItems as $item)
                    <a href="{{ $item['href'] }}" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-[#0EB3B9]">{{ $item['label'] }}</a>
                @endforeach
            @else
                <!-- Fallbacks estáticos si el arreglo no está listo en el backend -->
                <a href="#about-us" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-[#0EB3B9]">About</a>
                <a href="#location" @click="mobileMenuOpen = false" class="block rounded-xl px-4 py-3 text-sm font-medium text-slate-300 transition hover:bg-slate-900 hover:text-[#0EB3B9]">Location</a>
            @endif
            
            <!-- Selector de Idioma Móvil -->
            <div class="rounded-xl border border-slate-800 bg-slate-900/40 p-2.5">
                <label for="mobile-lang" class="sr-only">Language</label>
                <div class="relative flex items-center">
                    <select id="mobile-lang" wire:model="locale" class="w-full appearance-none rounded-lg border border-slate-800 bg-slate-950 px-3 py-2 text-sm font-semibold text-slate-200 outline-none focus:border-[#0EB3B9]/50">
                        <option value="en">English</option>
                        <option value="es">Español</option>
                    </select>
                    <svg class="absolute right-3 h-4 w-4 text-slate-500 pointer-events-none" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 8 4 4 4-4" />
                    </svg>
                </div>
            </div>

            <!-- Botón CTA Móvil -->
            <a href="https://wa.me/17867528054" target="_blank" class="block rounded-xl bg-[#0EB3B9] px-4 py-3 text-center text-sm font-bold text-white shadow-md transition hover:bg-[#0E788D]">
                Book Appointment
            </a>
        </div>
    </div>
</header>
