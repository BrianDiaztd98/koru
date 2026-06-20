<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-100 bg-white/95 backdrop-blur-xl shadow-sm shadow-slate-900/5">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="#top" class="flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-mint">
            <img src="{{ asset('img/logo.png') }}" alt="Koru Center" class="h-16 w-auto object-contain" />
        </a>

        <div class="hidden items-center gap-6 lg:flex">
            <a href="#services" class="text-sm font-semibold text-slate-700 transition hover:text-mint">Services</a>

            @foreach($headerNavItems as $item)
                <a href="{{ $item['href'] }}" class="text-sm font-semibold text-slate-700 transition hover:text-mint">{{ $item['label'] }}</a>
            @endforeach

            <div class="flex items-center gap-3 rounded-full border border-slate-200 bg-white px-3 py-2 shadow-sm">
                <select wire:model="locale" class="appearance-none bg-transparent text-sm font-semibold text-slate-900 outline-none">
                    <option value="en">EN</option>
                    <option value="es">ES</option>
                </select>
                <svg class="h-4 w-4 text-slate-400" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m6 8 4 4 4-4" />
                </svg>
            </div>

            <a href="https://wa.me/17867528054" target="_blank" class="inline-flex items-center rounded-full bg-mint px-5 py-2.5 text-sm font-semibold text-white shadow-lg transition hover:bg-mint/90">
                Book Appointment
            </a>
        </div>

        <button id="mobile-menu-button" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white p-2 text-slate-700 shadow-sm transition hover:border-mint hover:text-mint lg:hidden">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div id="mobile-menu" class="hidden border-t border-slate-200 bg-white/95 lg:hidden">
        <div class="space-y-3 px-4 py-4">
            <a href="#services" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Services</a>
            <a href="#education" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Education</a>
            <a href="#team" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Team</a>
            <a href="#location" class="block rounded-2xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Location</a>
            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-3">
                <label for="mobile-lang" class="sr-only">Language</label>
                <select id="mobile-lang" wire:model="locale" class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-sm font-semibold text-slate-900 outline-none">
                    <option value="en">English</option>
                    <option value="es">Español</option>
                </select>
            </div>
            <a href="https://wa.me/17867528054" target="_blank" class="block rounded-full bg-mint px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-mint/90">Book Appointment</a>
        </div>
    </div>
</header>
