<section class="relative bg-slate-50 py-24" x-data="{ open: false, activeVideoUrl: '' }" x-on:open-video-modal.window="activeVideoUrl = $event.detail; open = true" x-on:keydown.escape.window="open = false; activeVideoUrl = ''">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] bg-navy/5 p-10 text-center shadow-xl">
            <span class="section-tag">Experience Koru</span>
            <h2 class="mt-4 text-3xl font-bold text-navy">A new standard for massage, wellness, and recovery.</h2>
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-600">Watch our clinic tour and discover how Koru blends clinical sports science with comfort-focused care.</p>
            <div class="mt-10 flex justify-center">
                <button type="button" class="inline-flex items-center gap-3 rounded-full bg-mint px-6 py-3 text-sm font-semibold text-white transition hover:bg-mint/90" @click="$dispatch('open-video-modal', 'https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&rel=0')">
                    <span>Watch the tour</span>
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M14.752 11.168l-5.197-3.023A1 1 0 008 9.003v5.994a1 1 0 001.555.832l5.197-3.023a1 1 0 000-1.664z"/></svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="open" x-cloak x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/70 px-4 py-6">
        <div class="relative w-full max-w-4xl overflow-hidden rounded-[2rem] bg-white shadow-2xl">
            <button @click="open = false; activeVideoUrl = ''" class="absolute right-4 top-4 rounded-full bg-slate-100 p-3 text-slate-700 transition hover:bg-slate-200">
                <span class="sr-only">Close video</span>
                ✕
            </button>
            <div class="aspect-video bg-slate-900">
                <template x-if="activeVideoUrl">
                    <iframe x-bind:src="activeVideoUrl" class="h-full w-full" title="Koru Center video tour" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                </template>
            </div>
        </div>
    </div>
</section>
