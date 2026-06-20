<section id="testimonials" class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <span class="section-tag">Client Outcomes</span>
            <h2 class="mt-4 text-3xl font-bold text-navy">Real recovery stories from Koru Center members</h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-7 text-slate-600">From pain relief to athletic comeback, every client story is designed to inspire next-level care.</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            <article class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-slate-50 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 bg-cover bg-center opacity-0 transition group-hover:opacity-10" style="background-image:url('{{ asset('img/carrucel/relaxing.jpg') }}')"></div>
                <div class="relative">
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-3xl bg-white/90 text-mint shadow-sm">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M10 8.5v7.5l6-3.75-6-3.75Z" /></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-navy">Tour the recovery lounge</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">View how our IV and recovery lounge creates a premium clinical environment.</p>
                    <button type="button" class="mt-6 inline-flex items-center gap-2 rounded-full bg-mint px-5 py-3 text-sm font-semibold text-white transition hover:bg-mint/90" @click="$dispatch('open-video-modal', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&rel=0')">
                        Watch preview
                    </button>
                </div>
            </article>
            <article class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-slate-50 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 bg-cover bg-center opacity-0 transition group-hover:opacity-10" style="background-image:url('{{ asset('img/carrucel/relaxing.jpg') }}')"></div>
                <div class="relative">
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-3xl bg-white/90 text-mint shadow-sm">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8h16M4 12h16M4 16h16" /></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-navy">Athlete recovery in action</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">See how our protocols support athletes returning to training faster.</p>
                    <button type="button" class="mt-6 inline-flex items-center gap-2 rounded-full bg-mint px-5 py-3 text-sm font-semibold text-white transition hover:bg-mint/90" @click="$dispatch('open-video-modal', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&rel=0')">
                        Watch preview
                    </button>
                </div>
            </article>
            <article class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-slate-50 p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute inset-0 bg-cover bg-center opacity-0 transition group-hover:opacity-10" style="background-image:url('{{ asset('img/carrucel/relaxing.jpg') }}')"></div>
                <div class="relative">
                    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-3xl bg-white/90 text-mint shadow-sm">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3c1.7 0 3 1.3 3 3 0 2.5-3 5-3 5s-3-2.5-3-5c0-1.7 1.3-3 3-3Z" /></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-navy">Clinical performance stories</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">Discover the clinical outcomes behind our premium care services.</p>
                    <button type="button" class="mt-6 inline-flex items-center gap-2 rounded-full bg-mint px-5 py-3 text-sm font-semibold text-white transition hover:bg-mint/90" @click="$dispatch('open-video-modal', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&rel=0')">
                        Watch preview
                    </button>
                </div>
            </article>
        </div>
    </div>
</section>
