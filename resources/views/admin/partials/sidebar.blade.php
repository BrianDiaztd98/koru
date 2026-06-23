@php
    $dashboard = $dashboard ?? false;
    $activeTarget = $activeTarget ?? ($dashboard ? 'inicio' : null);
@endphp

<aside
    class="lg:col-span-1 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-5 shadow-xl shadow-black/20 space-y-6 sticky top-6">
    <div>
        <h3
            class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2.5 border-b border-slate-800/50">
            Core Sections</h3>
        <nav class="space-y-4 mt-4">
            <a href="{{ $dashboard ? '#inicio' : route('admin.management.index') }}"
               data-target="inicio"
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

            <a href="{{ $dashboard ? '#about' : route('admin.about.index') }}"
               data-target="about"
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
                <a href="{{ $dashboard ? '#service-pillars' : route('admin.services.index') }}"
                   data-target="service-pillars"
                   class="sidebar-link w-full text-left px-3.5 py-3 rounded-2xl font-semibold text-sm flex items-center justify-between border border-slate-800/70 bg-slate-900/80 transition-all duration-200 {{ $activeTarget === 'service-pillars' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9]' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }}"
                   aria-current="{{ $activeTarget === 'service-pillars' ? 'true' : 'false' }}">
                    <span class="flex items-center gap-2.5">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Service Pillars
                    </span>
                    <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'service-pillars' ? '' : 'opaque-dot' }}"></span>
                </a>
                <!-- Other Services removed: individual entries added below -->
                  <div class="mt-2 grid grid-cols-1 gap-2">
                         <a href="{{ $dashboard ? '#booster_shots' : route('admin.services.index', ['category' => 'booster_shots']) }}"
                          data-target="booster_shots"
                          class="sidebar-link w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 {{ $activeTarget === 'booster_shots' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40' }}"
                      aria-current="{{ $activeTarget === 'booster_shots' ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Booster Shots
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'booster_shots' ? '' : 'opaque-dot' }}"></span>
                    </a>

                          <a href="{{ $dashboard ? '#iv_therapy' : route('admin.services.index', ['category' => 'iv_therapy']) }}"
                              data-target="iv_therapy"
                              class="sidebar-link w-full text-left px-3.5 py-2.5 rounded-xl font-medium text-sm flex items-center justify-between border transition-all duration-200 {{ $activeTarget === 'iv_therapy' ? 'border-[#0EB3B9]/30 bg-[#0EB3B9]/10 text-[#0EB3B9] font-semibold' : 'border-transparent bg-transparent text-slate-400 hover:text-slate-200 hover:bg-slate-900/40' }}"
                       aria-current="{{ $activeTarget === 'iv_therapy' ? 'true' : 'false' }}">
                        <span class="flex items-center gap-2.5">
                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2s-5 6-5 10a5 5 0 0010 0c0-4-5-10-5-10z" />
                            </svg>
                            IV Therapy
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-current {{ $activeTarget === 'iv_therapy' ? '' : 'opaque-dot' }}"></span>
                    </a>
                </div>
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
        <span>Switch dynamic contexts smoothly without triggering global page mutations or losing
            ongoing uncommitted state matrices.</span>
    </div>
</aside>
