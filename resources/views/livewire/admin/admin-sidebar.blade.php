<aside
    class="lg:col-span-1 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-5 shadow-xl shadow-black/20 space-y-6 sticky top-6">
    <div>
        <h3
            class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
            Core Sections</h3>
        <nav class="space-y-3 mt-4">
            <a href="{{ route('admin.management.index') }}"
               data-section="inicio"
               class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === 'inicio' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
               aria-current="{{ $activeTarget === 'inicio' ? 'true' : 'false' }}">
                <span class="flex items-center gap-2.5">
                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Inicio
                </span>
                <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === 'inicio' ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
            </a>

            <a href="{{ route('admin.about.index') }}"
               data-section="about"
               class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === 'about' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
               aria-current="{{ $activeTarget === 'about' ? 'true' : 'false' }}">
                <span class="flex items-center gap-2.5">
                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    About Section
                </span>
                <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === 'about' ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
            </a>

            <div class="space-y-3">
                <a href="{{ route('admin.services.index') }}"
                   data-section="services"
                   class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === 'services' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ $activeTarget === 'services' ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Services
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === 'services' ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>

                <a href="{{ route('admin.packages.index') }}"
                   data-section="packages"
                   class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === 'packages' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ $activeTarget === 'packages' ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0 1.125.504 1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>
                        Packages
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === 'packages' ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>
            </div>
        </nav>
    </div>

    </aside>
