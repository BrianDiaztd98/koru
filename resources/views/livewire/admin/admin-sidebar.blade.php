<div class="flex flex-col h-full">
    <!-- Header del Sidebar (Mobile) -->
    <div class="flex items-center justify-between mb-6 lg:hidden">
        <a href="{{ route('admin.management.index') }}" class="flex items-center gap-3 shrink-0">
            <img src="{{ asset('img/logo.png') }}" alt="Koru CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
        </a>
        <button @click="sidebarOpen = false"
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 p-2 text-slate-400 hover:text-white hover:border-[#0EB3B9]/40 transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]"
                aria-label="Cerrar menú">
            <span class="sr-only">Cerrar menú</span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Logo (Desktop) -->
    <a href="{{ route('admin.management.index') }}" class="hidden lg:flex items-center gap-3 mb-6 shrink-0">
        <img src="{{ asset('img/logo.png') }}" alt="Koru CMS" class="h-10 w-auto object-contain brightness-110" loading="lazy" />
    </a>

    <!-- Navegación -->
    <div class="flex-1 overflow-y-auto koru-scrollbar space-y-6">
        <div>
            <h3
                class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
                Core Sections
            </h3>
            <nav class="space-y-3 mt-4">
                <a href="{{ route('admin.management.index') }}"
                   class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.management.index') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ request()->routeIs('admin.management.index') ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        Inicio
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.management.index') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>

                <a href="{{ route('admin.about.index') }}"
                   class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.about.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ request()->routeIs('admin.about.*') ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        About Section
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.about.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>

                <div class="space-y-3">
                    <a href="{{ route('admin.services.index') }}"
                       class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.services.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                       aria-current="{{ request()->routeIs('admin.services.*') ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            Services
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.services.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                    </a>

                    <a href="{{ route('admin.client-outcomes.index') }}"
                       class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.client-outcomes.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                       aria-current="{{ request()->routeIs('admin.client-outcomes.*') ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25M3 8.25l9 6 9-6M3 8.25l9 6 9-6" />
                            </svg>
                            Client Outcomes
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.client-outcomes.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                    </a>

                    <a href="{{ route('admin.team.index') }}"
                       class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.team.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                       aria-current="{{ request()->routeIs('admin.team.*') ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.25a8.25 8.25 0 0115 0" />
                            </svg>
                            Team
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.team.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                    </a>

                    <a href="{{ route('admin.packages.index') }}"
                       class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ request()->routeIs('admin.packages.*') ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                       aria-current="{{ request()->routeIs('admin.packages.*') ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                            Packages
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ request()->routeIs('admin.packages.*') ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Footer: Usuario y Logout -->
    <div class="mt-auto pt-6 border-t border-slate-800/50 shrink-0 space-y-3">
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
                    title="Cerrar Sesión"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-800 bg-slate-950/60 px-4 py-2.5 text-sm font-medium text-slate-400 transition-all duration-200 hover:bg-red-500/10 hover:border-red-500/30 hover:text-red-400 active:scale-95 focus:outline-none">
                <span class="sr-only">Logout</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"/>
                </svg>
                Cerrar Sesión
            </button>
        </form>
    </div>
</div>
