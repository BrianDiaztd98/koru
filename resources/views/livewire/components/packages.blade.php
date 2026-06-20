<section id="packages" class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center justify-center gap-3 mb-4">
                <span class="h-1.5 w-16 rounded-full bg-mint"></span>
                <span class="text-sm uppercase tracking-[0.3em] text-mint">Packages</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Flexible Packages Designed for Your Recovery and Performance</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Our therapeutic packages are designed to promote consistent progress, optimize recovery, and deliver long-term results. Choose the option that best suits your goals and schedule.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @foreach($packages as $package)
                <div x-data="{ expanded: false }" class="flex flex-col h-full rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl duration-300" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 50) }}" data-aos-duration="600">
                    <h3 class="text-xl font-semibold text-navy">{{ $package['name'] }}</h3>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-mint">${{ number_format($package['price']) }}</span>
                    </div>
                    <p class="mt-2 text-sm text-slate-600">{{ $package['sessions'] }} Session{{ $package['sessions'] > 1 ? 's' : '' }}</p>
                    @if($package['validity'])
                        <p class="mt-1 text-xs text-slate-500">{{ $package['validity'] }}</p>
                    @endif
                    <p class="mt-3 text-sm leading-6 text-slate-600" :class="{ 'line-clamp-3': !expanded }" x-ref="pkgDesc">{{ $package['description'] }}</p>
                    <button @click="expanded = !expanded" x-show="$refs.pkgDesc.scrollHeight > 60" class="mt-2 text-xs font-semibold text-mint hover:underline">
                        <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                    </button>
                    <a href="https://wa.me/17867528054" target="_blank" class="mt-6 inline-flex w-full items-center justify-center rounded-full bg-mint px-4 py-3 text-sm font-semibold text-white transition hover:bg-mint/90">Book Now</a>
                </div>
            @endforeach
        </div>

        <div class="mt-12 rounded-3xl border border-slate-200 bg-slate-50 p-8" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
            <h3 class="text-lg font-semibold text-navy mb-4">Package Policy</h3>
            <ul class="space-y-3 text-sm text-slate-600">
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2 w-2 rounded-full bg-mint"></span>Packages are designed for continuous use to ensure optimal therapeutic results. Sessions can be scheduled based on availability within the validity period.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2 w-2 rounded-full bg-mint"></span>Packages are not cumulative and must be used within the specified timeframe.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2 w-2 rounded-full bg-mint"></span>Unused sessions will expire at the end of the validity period.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2 w-2 rounded-full bg-mint"></span>Packages are transferable with prior authorization from the purchaser.</li>
                <li class="flex items-start gap-3"><span class="mt-1 inline-flex h-2 w-2 rounded-full bg-mint"></span>All packages are subject to a usage and payment agreement. Invest in your recovery. The packages and services are non-refundable.</li>
            </ul>
        </div>
    </div>
</section>