<aside
    class="lg:col-span-1 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-5 shadow-xl shadow-black/20 space-y-6 sticky top-6">
    <div>
        <h3
            class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
            Core Sections</h3>
        <nav class="space-y-4 mt-4">
            <a href="{{ route('admin.management.index') }}"
               class="sidebar-link w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 {{ $activeTarget === 'inicio' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40' }}"
               aria-current="{{ $activeTarget === 'inicio' ? 'true' : 'false' }}">
                <span class="flex items-center gap-2.5">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Inicio
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'inicio' ? '' : 'opaque-dot' }}"></span>
            </a>

            <a href="{{ route('admin.about.index') }}"
               class="sidebar-link w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 {{ $activeTarget === 'about' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40' }}"
               aria-current="{{ $activeTarget === 'about' ? 'true' : 'false' }}">
                <span class="flex items-center gap-2.5">
                    <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg>
                    About Section
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'about' ? '' : 'opaque-dot' }}"></span>
            </a>

            <div class="space-y-3">
                <a href="{{ route('admin.services.index') }}"
                   class="sidebar-link w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border border-slate-800/70 bg-slate-900/80 transition-all duration-200 {{ $activeTarget === 'services' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
                   aria-current="{{ $activeTarget === 'services' ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        Services
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'services' ? '' : 'opaque-dot' }}"></span>
                </a>
            </div>
        </nav>
    </div>

    <div
        class="pt-4 border-t border-slate-800/50 flex gap-2.5 items-start text-[11px] text-slate-400 leading-relaxed">
        <svg class="w-4 h-4 text-[#0EB3B9] shrink-0 mt-0.5" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
        </svg>
        <span>Navigate native Livewire routes without page-wide DOM toggling or hash-based state.</span>
    </div>
</aside>
