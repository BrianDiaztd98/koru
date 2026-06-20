<section id="iv-lounge" class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr] items-center">
            <div>
                <span class="section-tag">IV Lounge</span>
                <h2 class="mt-4 text-3xl font-bold text-navy">Advanced IV therapy for hydration, recovery and wellness.</h2>
                <p class="mt-4 max-w-2xl text-sm leading-7 text-slate-600">Each lounge drip is formulated for targeted recovery, energy and immune support with clinical guidance.</p>
            </div>
            <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-8 shadow-sm">
                <h3 class="text-xl font-semibold text-navy">IV lounge highlights</h3>
                <ul class="mt-6 space-y-4 text-slate-600">
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-3.5 w-3.5 rounded-full bg-mint"></span>Premium hydration with physician-led protocols.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-3.5 w-3.5 rounded-full bg-mint"></span>Custom blends for fatigue, performance and immunity.</li>
                    <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-3.5 w-3.5 rounded-full bg-mint"></span>Fast absorption and evidence-based nutrient dosing.</li>
                </ul>
            </div>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach($ivDrips as $drip)
                <div x-data="{ expanded: false }" class="flex flex-col h-full rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl duration-300">
                    <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-mint/10 text-mint">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            @if($drip['icon'] === 'hydration')
                                <path d="M8 2c0 3.5 4 6 4 6s4-2.5 4-6c0-1.7-1.3-3-3-3s-3 1.3-3 3Z" />
                                <path d="M6 15c0 0 1-4 6-4s6 4 6 4v5H6v-5Z" />
                            @elseif($drip['icon'] === 'performance')
                                <path d="M4 12l5 5L20 6" />
                                <path d="M7 12h3l3-4 2 5h3" />
                            @elseif($drip['icon'] === 'wellness')
                                <path d="M12 2.5C8.4 2.5 5.5 5.4 5.5 9S8.4 15.5 12 15.5 18.5 12.6 18.5 9 15.6 2.5 12 2.5Z" />
                                <path d="M12 9V7" />
                                <path d="M12 11.5v1.5" />
                            @else
                                <path d="M12 2c-3.3 0-6 2.7-6 6 0 1.2.4 2.3 1.1 3.2L12 22l4.9-10.8c.7-.9 1.1-2 1.1-3.2 0-3.3-2.7-6-6-6Z" />
                            @endif
                        </svg>
                    </div>
                    <h3 class="mt-6 text-xl font-semibold text-navy">{{ $drip['title'] }}</h3>
                    <p class="mt-4 text-sm leading-6 text-slate-600" :class="{ 'line-clamp-3': !expanded }" x-ref="ivDesc">{{ $drip['description'] }}</p>
                    <button @click="expanded = !expanded" x-show="$refs.ivDesc.scrollHeight > 72" class="mt-2 text-xs font-semibold text-mint hover:underline">
                        <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                    </button>
                    <div class="mt-6 flex items-center justify-between text-sm font-semibold text-slate-700">
                        <span>{{ $drip['duration'] }}</span>
                        <span>${{ $drip['price'] }}</span>
                    </div>
                    <a href="https://wa.me/17867528054" target="_blank" class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-mint px-4 py-3 text-sm font-semibold text-white transition hover:bg-mint/90">Reserve IV</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
