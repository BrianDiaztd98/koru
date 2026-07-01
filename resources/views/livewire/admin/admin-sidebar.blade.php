<aside
    class="relative bg-slate-900/40 backdrop-blur-xl shadow-xl shadow-black/20 h-full p-4 flex flex-col overflow-hidden">
    <button type="button"
            @click="sidebarOpen = false"
            class="lg:hidden absolute right-3 top-3 inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-700 bg-slate-950/90 text-slate-300 transition hover:bg-slate-900/95 hover:text-white focus:outline-none"
            aria-label="Cerrar menú">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Logo centrado -->
    <div class="flex justify-center mb-4">
        <a href="{{ route('admin.management.index') }}" 
           class="flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded-xl transition-transform active:scale-95"
           aria-label="Koru CMS - Back to dashboard">
            <img src="{{ asset('img/logo.png') }}" alt="Koru CMS" class="h-12 w-auto object-contain brightness-110" loading="lazy" decoding="async" fetchpriority="low" />
        </a>
    </div>

    <div class="flex-1">
        <h3
            class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pl-3
             pb-2.5 border-b border-slate-800/50">
            Core Sections
        </h3>
        <nav class="space-y-2.5 mt-3">
            @foreach ($coreLinks as $link)
                <a href="{{ route($link['route']) }}"
                   data-section="{{ $link['section'] }}"
                   class="sidebar-link group relative w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === $link['section'] ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                   aria-current="{{ $activeTarget === $link['section'] ? 'true' : 'false' }}">
                     <span class="flex items-center gap-2.5">
                         <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                             {!! $link['icon'] !!}
                         </svg>
                         {{ $link['label'] }}
                     </span>
                     <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === $link['section'] ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                </a>
            @endforeach

            <div class="space-y-3">
                @foreach ($sectionLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       data-section="{{ $link['section'] }}"
                       class="sidebar-link group relative w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border transition-all duration-300 ease-out {{ $activeTarget === $link['section'] ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] translate-x-1' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40 hover:translate-x-1' }}"
                       aria-current="{{ $activeTarget === $link['section'] ? 'true' : 'false' }}">
                         <span class="flex items-center gap-2.5">
                             <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                 {!! $link['icon'] !!}
                             </svg>
                             {{ $link['label'] }}
                         </span>
                         <span class="w-1.5 h-1.5 rounded-full transition-all duration-300 {{ $activeTarget === $link['section'] ? 'bg-[#0EB3B9] scale-100' : 'bg-slate-600 scale-0 group-hover:scale-100' }}"></span>
                    </a>
                @endforeach
            </div>
        </nav>
    </div>

    <!-- Footer: Botón de logout -->
    <div class="mt-2 pt-2 border-t border-slate-800/50 flex justify-center">
        <form action="{{ route('admin.logout') }}" method="POST" class="inline-flex">
            @csrf
            <button type="submit" 
                    title="Sign Out"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl border border-slate-800 bg-slate-950/60 text-slate-400 transition-all duration-200 hover:bg-red-500/10 hover:border-red-500/30 hover:text-red-400 active:scale-95 focus:outline-none">
                <span class="sr-only">Logout</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1 0 12.728 0M12 3v9"/>
                </svg>
            </button>
        </form>
    </div>
</aside>
