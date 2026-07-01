<section id="testimonials" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_120%,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-16 text-center" data-aos="fade-up" data-aos-duration="800" wire:ignore>
            <div class="inline-flex items-center gap-2.5 rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#0EB3B9]">
                Client Outcomes
            </div>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Real recovery stories from Koru Center members
            </h2>
            <p class="mt-4 max-w-2xl mx-auto text-sm leading-relaxed text-slate-400">
                From pain relief to athletic comeback, every client story is designed to inspire next-level care.
            </p>
        </div>

        @if(empty($visibleTestimonials))
            <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10">
                <h3 class="text-xl font-semibold text-white">No client outcomes available yet</h3>
                <p class="mt-3 max-w-sm mx-auto text-sm leading-relaxed text-slate-400">
                    This section is waiting for recovery stories.
                </p>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3 items-stretch" wire:key="testimonials-video-grid">
                @foreach($visibleTestimonials as $index => $testimonial)
                    <article wire:key="testimonial-card-{{ $testimonial['id'] ?? $index }}"
                             data-aos="fade-up"
                             data-aos-delay="{{ 100 + ($loop->index * 50) }}"
                             data-aos-duration="600"
                             class="group relative flex min-h-[280px] flex-col justify-between overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm p-6 transition-all duration-300 hover:-translate-y-1.5 hover:border-[#0EB3B9]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)] scroll-animate" data-speed="0.06">

                        <div class="flex-1 flex flex-col">
                            <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 border border-slate-800 text-[#0EB3B9] shadow-sm group-hover:bg-[#0EB3B9]/10 group-hover:border-[#0EB3B9]/30 transition-all duration-300">
                                @if(($testimonial['category'] ?? '') === 'lounge')
                                    <svg class="h-5 w-5 fill-current transition-transform duration-300 group-hover:scale-110" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M10 8.5v7.5l6-3.75-6-3.75Z" />
                                    </svg>
                                @elseif(($testimonial['category'] ?? '') === 'athlete')
                                    <svg class="h-5 w-5 transition-transform duration-300 group-hover:scale-105" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M4 8h16M4 12h16M4 16h16" />
                                    </svg>
                                @else
                                    <svg class="h-5 w-5 transition-transform duration-300 group-hover:scale-105" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                        <circle cx="12" cy="10" r="3" />
                                    </svg>
                                @endif
                            </div>

                            <h3 class="text-xl font-bold text-white tracking-tight group-hover:text-[#0EB3B9] transition-colors duration-200">
                                {{ $testimonial['title'] }}
                            </h3>
                            <p class="mt-3 text-xs sm:text-sm leading-relaxed text-slate-400 flex-1 line-clamp-4">
                                {{ $testimonial['description'] }}
                            </p>
                        </div>

                        <div class="mt-8 pt-4 border-t border-slate-800/60">
                            <button type="button"
                                    class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 border border-slate-800/80 px-4 py-2.5 text-xs font-bold text-slate-200 shadow-sm transition-all duration-200 hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white hover:shadow-md active:scale-[0.98] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]"
                                    @click="$dispatch('open-video-modal', '{{ asset($testimonial['video_path']) }}')">
                                Watch preview
                            </button>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        @if($totalPages > 1)
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <button type="button"
                        wire:click="previousPage"
                        @class([
                            'inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm font-semibold text-slate-300 transition',
                            'opacity-50 cursor-not-allowed' => $page === 1,
                            'hover:border-[#0EB3B9] hover:text-white' => $page > 1,
                        ])
                        @disabled($page === 1)>
                    <span aria-hidden="true">←</span>
                    <span class="ml-2">Previous</span>
                </button>

                <div class="flex items-center gap-2 text-sm text-slate-400">
                    @for($i = 1; $i <= $totalPages; $i++)
                        <button type="button"
                                wire:click="setPage({{ $i }})"
                                class="flex h-9 w-9 items-center justify-center rounded-full border transition {{ $page === $i ? 'border-[#0EB3B9] bg-[#0EB3B9]/15 text-[#0EB3B9]' : 'border-slate-700 bg-slate-950/70 text-slate-400 hover:border-[#0EB3B9] hover:text-white' }}">
                            {{ $i }}
                        </button>
                    @endfor
                </div>

                <button type="button"
                        wire:click="nextPage"
                        @class([
                            'inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm font-semibold text-slate-300 transition',
                            'opacity-50 cursor-not-allowed' => $page === $totalPages,
                            'hover:border-[#0EB3B9] hover:text-white' => $page < $totalPages,
                        ])
                        @disabled($page === $totalPages)>
                    <span class="mr-2">Next</span>
                    <span aria-hidden="true">→</span>
                </button>
            </div>
        @endif
    </div>
</section>
