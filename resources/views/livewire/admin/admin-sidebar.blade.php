<div class="flex flex-col h-full">
    <div class="flex items-center justify-between mb-6 lg:hidden">
        <a href="{{ route('admin.management.index') }}" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('img/logo.png') }}" alt="KORU CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
            <img src="{{ asset('img/logo.webp') }}" alt="KORU CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
        </a>
        <button @click="sidebarOpen = false"
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 p-2 text-slate-400 hover:text-white hover:border-[#0EB3B9]/40 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]"
                aria-label="Close menu">
            <span class="sr-only">Close menu</span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <a href="{{ route('admin.management.index') }}" class="hidden lg:flex items-center gap-3 mb-6 shrink-0 px-1">
        <img src="{{ asset('img/logo.png') }}" alt="KORU CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
        <img src="{{ asset('img/logo.webp') }}" alt="KORU CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
    </a>

    <div class="flex-1 overflow-y-auto koru-scrollbar px-1 space-y-6">
        <div>
            <h3 class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
                Core Sections
            </h3>

            @php
                $isCommercialRoute = request()->routeIs('admin.services.*') || request()->routeIs('admin.packages.*') || request()->routeIs('admin.discounts.*');
                $isContentRoute = request()->routeIs('admin.hero-carousel.*') || request()->routeIs('admin.about.*') || request()->routeIs('admin.team.*') || request()->routeIs('admin.client-outcomes.*') || request()->routeIs('admin.google-reviews.*') || request()->routeIs('admin.education.*');
                $isAdministrationRoute = request()->routeIs('admin.users.*');
            @endphp

            <nav x-data="{
                comercialOpen: {{ $isCommercialRoute ? 'true' : 'false' }},
                contenidoOpen: {{ $isContentRoute ? 'true' : 'false' }},
                adminOpen: {{ $isAdministrationRoute ? 'true' : 'false' }}
            }" class="space-y-3 mt-4">

                <!-- ENLACE RAÍZ: Inicio -->
                <a href="{{ route('admin.management.index') }}"
                   class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.management.index') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ request()->routeIs('admin.management.index') ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Home
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.management.index') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>

                <!-- DROPDOWN 1: OFERTA COMERCIAL -->
                <div class="group">
                    <button type="button"
                            @click="comercialOpen = !comercialOpen"
                            class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ (request()->routeIs('admin.services.*') || request()->routeIs('admin.packages.*') || request()->routeIs('admin.discounts.*')) ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                            aria-expanded="{{ request()->routeIs('admin.services.*') || request()->routeIs('admin.packages.*') || request()->routeIs('admin.discounts.*') ? 'true' : 'false' }}"
                            aria-controls="comercial-submenu">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110 text-[#0EB3B9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Commercial Offer
                        </span>
                        <svg class="w-4 h-4 shrink-0 text-slate-500 transition-transform duration-300 ease-out" :class="{ 'rotate-180 text-[#0EB3B9]': comercialOpen }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="comercial-submenu" x-show="comercialOpen" x-collapse x-cloak class="border-l border-slate-800/60 ml-5 mt-1 space-y-1">
                        <!-- Services -->
                        <a href="{{ route('admin.services.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.services.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.services.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Services
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.services.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- Packages -->
                        <a href="{{ route('admin.packages.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.packages.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.packages.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 7.5A2.25 2.25 0 017.5 5.25h9A2.25 2.25 0 0118.75 7.5v9A2.25 2.25 0 0116.5 18.75h-9A2.25 2.25 0 015.25 16.5v-9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9.75h7.5" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 13.5h4.5" />
                                </svg>
                                Packages
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.packages.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- Deposits -->
                        <a href="{{ route('admin.discounts.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.discounts.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.discounts.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 0a2.25 2.25 0 100-4.5 2.25 2.25 0 000 4.5zm0 0v1.5m0 0a2.25 2.25 0 110 4.5 2.25 2.25 0 010-4.5zm0 0v1.5m0 0h4.5m-4.5 0H7.5" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75a1.5 1.5 0 011.5-1.5h12a1.5 1.5 0 011.5 1.5v6a1.5 1.5 0 01-1.5 1.5h-12a1.5 1.5 0 01-1.5-1.5v-6z" />
                                </svg>
                                Deposits
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.discounts.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>
                    </div>
                </div>

                <!-- DROPDOWN 2: IDENTIDAD Y CONTENIDO -->
                <div class="group">
                    <button type="button"
                            @click="contenidoOpen = !contenidoOpen"
                            class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $isContentRoute ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                            aria-expanded="{{ $isContentRoute ? 'true' : 'false' }}"
                            aria-controls="contenido-submenu">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110 text-[#0EB3B9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v4.5A.75.75 0 017 17z" />
                            </svg>
                            Identity & Content
                        </span>
                        <svg class="w-4 h-4 shrink-0 text-slate-500 transition-transform duration-300 ease-out" :class="{ 'rotate-180 text-[#0EB3B9]': contenidoOpen }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="contenido-submenu" x-show="contenidoOpen" x-collapse x-cloak class="border-l border-slate-800/60 ml-5 mt-1 space-y-1">
                        <!-- Hero Carousel -->
                        <a href="{{ route('admin.hero-carousel.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.hero-carousel.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.hero-carousel.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
                                </svg>
                                Hero Carousel
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.hero-carousel.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- About Section -->
                        <a href="{{ route('admin.about.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.about.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.about.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                </svg>
                                About Section
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.about.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- Team -->
                        <a href="{{ route('admin.team.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.team.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.team.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                                </svg>
                                Team
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.team.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- Client Outcomes -->
                        <a href="{{ route('admin.client-outcomes.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.client-outcomes.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.client-outcomes.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25M3 8.25l9 6 9-6M3 8.25l9 6 9-6" />
                                </svg>
                                Client Outcomes
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.client-outcomes.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- Google Reviews -->
                        <a href="{{ route('admin.google-reviews.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.google-reviews.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.google-reviews.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 17.5l-5.2 2.7 1-5.9-4.2-4.1 5.9-.9L12 3.5l2.6 5.8 5.9.9-4.2 4.1 1 5.9-5.3-2.7z" />
                                </svg>
                                Google Reviews
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.google-reviews.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>

                        <!-- CE Courses -->
                        <a href="{{ route('admin.education.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.education.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.education.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6.75A2.75 2.75 0 016.75 4h10.5A2.75 2.75 0 0120 6.75v10.5A2.75 2.75 0 0117.25 20H6.75A2.75 2.75 0 014 17.25V6.75zm4.5 0v10.5m5.25-10.5v10.5" />
                                </svg>
                                CE Courses
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.education.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>
                    </div>
                </div>

                <!-- DROPDOWN 3: ADMINISTRATION -->
                <div class="group">
                    <button type="button"
                            @click="adminOpen = !adminOpen"
                            class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $isAdministrationRoute ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                            aria-expanded="{{ $isAdministrationRoute ? 'true' : 'false' }}"
                            aria-controls="admin-submenu">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110 text-[#0EB3B9]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Administration
                        </span>
                        <svg class="w-4 h-4 shrink-0 text-slate-500 transition-transform duration-300 ease-out" :class="{ 'rotate-180 text-[#0EB3B9]': adminOpen }" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="admin-submenu" x-show="adminOpen" x-collapse x-cloak class="border-l border-slate-800/60 ml-5 mt-1 space-y-1">
                        <!-- User Management -->
                        <a href="{{ route('admin.users.index') }}"
                           class="sidebar-link group relative w-full text-left px-3.5 py-2 rounded-xl font-medium text-xs flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.users.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-slate-900/0 bg-transparent text-slate-500 hover:text-slate-300 hover:bg-slate-900/40 hover:translate-x-1' }}"
                           aria-current="{{ request()->routeIs('admin.users.*') ? 'true' : 'false' }}">
                            <span class="flex items-center gap-2">
                                <svg class="h-3.5 w-3.5 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                User Management
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.users.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                        </a>
                    </div>
                </div>

            </nav>
        </div>
    </div>

    <div class="mt-auto pt-6 border-t border-slate-800/50 shrink-0 space-y-3 px-1">
        <div class="flex items-center gap-3 px-1">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-[#0EB3B9]/10 text-[#0EB3B9]">
                <span class="text-xs font-bold">{{ substr(auth()->user()->name, 0, 1) }}</span>
            </div>
            <div class="flex flex-col">
                <span class="text-sm font-semibold text-slate-200">{{ auth()->user()->name }}</span>
                <span class="text-[10px] font-semibold text-slate-500 font-mono uppercase tracking-wider">
                    Administrator
                </span>
            </div>
        </div>

        <form action="{{ route('admin.logout') }}" method="POST" class="inline-flex w-full">
            @csrf
            <button type="submit"
                    title="Logout"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-800 bg-slate-950/60 px-4 py-2.5 text-sm font-medium text-slate-400 transition-all duration-200 hover:bg-red-500/10 hover:border-red-500/30 hover:text-red-400 active:scale-95 focus:outline-none">
                <span class="sr-only">Logout</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</div>


