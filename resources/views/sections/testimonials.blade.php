<section id="testimonials" class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-slate-900 mb-6">What Patients Say</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testimonials as $t)
                <div class="bg-white border border-slate-100 rounded-2xl p-6">
                    @if(!empty($t['video_url']))
                        <div class="relative group">
                            <div class="aspect-video bg-slate-100 rounded-lg overflow-hidden">
                                <img src="{{ $t['thumbnail'] ?? '/img/testimonial-thumb.jpg' }}" class="w-full h-full object-cover" alt="video preview">
                                <button @click="$dispatch('open-video',{ src: '{{ $t['video_url'] }}' })" class="absolute inset-0 flex items-center justify-center bg-black/30 text-white opacity-0 group-hover:opacity-100 transition">Play</button>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-slate-100 rounded-full"></div>
                            <div>
                                <div class="font-bold text-slate-900">{{ $t['name'] ?? 'Anonymous' }}</div>
                                <div class="text-sm text-slate-700">"{{ $t['quote'] ?? $t['content'] ?? '' }}"</div>
                            </div>
                        </div>
                        <div class="mt-4 text-sm text-slate-700">{{ str_repeat('★', intval($t['rating'] ?? 5)) }}</div>
                    @endif
                </div>
            @endforeach
        </div>

        {{-- Video Modal (Alpine) --}}
        <div x-data="{ open:false, src:'' }" x-on:open-video.window="open=true; src=$event.detail.src; document.body.classList.add('overflow-hidden')" x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
            <div class="w-full max-w-4xl mx-4 bg-white rounded-2xl overflow-hidden">
                <div class="aspect-video">
                    <template x-if="src">
                        <iframe :src="src + '?autoplay=1'" class="w-full h-full" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </template>
                </div>
                <div class="p-4 text-right">
                    <button @click="open=false; src=''; document.body.classList.remove('overflow-hidden')" class="px-4 py-2 rounded bg-slate-100">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
