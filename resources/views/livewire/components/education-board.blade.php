<section id="education" class="py-24 bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-12 text-center">
            <span class="section-tag">Professional CE</span>
            <h2 class="mt-4 text-3xl font-bold text-navy">Continuing education built for clinicians and performance specialists</h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-7 text-slate-600">Browse upcoming workshops, credits, and clinical training designed for high-performing professionals.</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-3">
            @forelse($activeCourses as $course)
                <article class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <span class="inline-flex rounded-full bg-mint/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.35em] text-mint">Continuing Education Credits (CE) {{ $course['ce_credits'] }}</span>
                        <span class="text-xs font-semibold uppercase tracking-[0.35em] text-slate-500">{{ $course['date'] }}</span>
                    </div>
                    <h3 class="mt-6 text-2xl font-semibold text-navy">{{ $course['title'] }}</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">{{ $course['description'] }}</p>
                    <div class="mt-6 flex items-center justify-between gap-4 text-sm font-semibold text-slate-900">
                        <span>${{ $course['price'] }}</span>
                        <a href="https://wa.me/17867528054" target="_blank" class="rounded-full bg-mint px-4 py-2 text-white transition hover:bg-mint/90">Register</a>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-slate-100 bg-white p-10 text-center shadow-sm">
                    <p class="text-slate-600">No active courses available. Add CE content to the admin panel and refresh.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
