<section id="booster-shots" class="py-24 bg-slate-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center justify-center gap-3 mb-4">
                <span class="h-1.5 w-16 rounded-full bg-mint"></span>
                <span class="text-sm uppercase tracking-[0.3em] text-mint">Booster Shots</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Quick energy and wellness boosts</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Fast-acting injections for vitality, recovery and immune support.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($boosterShots as $shot)
                <div x-data="{ expanded: false }" class="flex flex-col h-full rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl duration-300" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}" data-aos-duration="600">
                    <h3 class="text-xl font-semibold text-navy">{{ $shot['title'] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600" :class="{ 'line-clamp-3': !expanded }" x-ref="boosterDesc">{{ $shot['description'] }}</p>
                    <button @click="expanded = !expanded" x-show="$refs.boosterDesc.scrollHeight > 60" class="mt-2 text-xs font-semibold text-mint hover:underline">
                        <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                    </button>
                    <div class="mt-6 flex items-center justify-between text-sm font-semibold text-slate-700">
                        <span>Quick shot</span>
                        <span>${{ $shot['price'] }}</span>
                    </div>
                    <a href="https://wa.me/17867528054" target="_blank" class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-mint px-4 py-3 text-sm font-semibold text-white transition hover:bg-mint/90">Book Now</a>
                </div>
            @endforeach
        </div>
    </div>
</section>