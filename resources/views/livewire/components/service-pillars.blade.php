<section id="services" class="py-24 bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div>
                <span class="section-tag">Service Pillars</span>
                <h2 class="mt-4 text-3xl font-bold text-navy">Clinical services built for recovery, performance and wellness.</h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600">Explore Koru’s clinical massage, recovery technology, medical services, and at-home concierge care.</p>
            </div>
            <div class="grid grid-cols-3 gap-3 md:grid-cols-3">
                @foreach($pillarLabels as $key => $pillar)
                    <button wire:click="setPillar('{{ $key }}')" class="rounded-full border px-4 py-3 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-mint @if($activePillar === $key) border-mint bg-mint/10 text-navy @else border-slate-200 bg-white text-slate-700 hover:border-mint hover:text-navy @endif">
                        {{ $pillar['title'] }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="mt-12 grid gap-6 xl:grid-cols-3">
            @forelse($servicesByPillar[$activePillar] ?? [] as $service)
                <article x-data="{ expanded: false }" class="service-card flex flex-col h-full overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">
                    <div class="aspect-[4/3] overflow-hidden bg-slate-100">
                        <img src="{{ $service['image'] }}" alt="{{ $service['title'] }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" />
                    </div>
                    <div class="flex flex-col flex-grow p-6">
                        <span class="inline-flex rounded-full bg-mint/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.35em] text-mint">{{ str($service['title'])->headline() }}</span>
                        <h3 class="mt-4 text-2xl font-semibold text-navy">{{ $service['title'] }}</h3>
                        <p class="mt-4 text-sm leading-6 text-slate-600" :class="{ 'line-clamp-3': !expanded }" x-ref="desc">{{ $service['description'] }}</p>
                        <button @click="expanded = !expanded" x-show="$refs.desc.scrollHeight > 72" class="mt-2 text-xs font-semibold text-mint hover:underline">
                            <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                        </button>
                        <div class="mt-6 flex items-center justify-between gap-4 text-sm text-slate-500">
                            <span>{{ $service['duration'] }}</span>
                            <span class="rounded-full bg-mint/10 px-3 py-1 text-sm font-semibold text-mint">${{ $service['price'] }}</span>
                        </div>
                        <a href="https://wa.me/17867528054" target="_blank" class="mt-8 inline-flex w-full items-center justify-center rounded-full bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#0EB3B9]/90">Book Now</a>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-slate-200 bg-white p-10 text-center shadow-sm">
                    <p class="text-slate-600">No services are active for this pillar yet. Add content in the CMS and refresh to populate this section.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
