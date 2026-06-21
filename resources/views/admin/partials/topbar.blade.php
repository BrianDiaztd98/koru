<header class="sticky top-0 z-40 w-full border-b border-slate-800/60 bg-slate-950/70 backdrop-blur-xl shadow-lg shadow-black/10">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        
        <!-- Bloque de Título e Identidad -->
        <div class="flex flex-col">
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-[0.2em] text-[#0EB3B9] font-mono">
                    Koru CMS
                </span>
            </div>
            <h1 class="mt-1.5 text-xl sm:text-2xl font-extrabold tracking-tight text-white">
                {{ $title ?? 'Dashboard' }}
            </h1>
        </div>

        <!-- Bloque de Sesión / Usuario (Diseño Compacto Premium) -->
        <div class="flex items-center gap-4 rounded-2xl border border-slate-800 bg-slate-900/30 p-1.5 pl-4 shadow-inner">
            <div class="flex flex-col items-end pr-1">
                <span class="text-xs font-bold text-slate-200 tracking-wide">
                    {{ auth()->user()->name }}
                </span>
                <span class="text-[10px] font-semibold text-slate-500 font-mono uppercase tracking-wider">
                    Administrator
                </span>
            </div>
            
            <!-- Botón de Logout Optimizado con Icono -->
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

    </div>
</header>