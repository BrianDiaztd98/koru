<section id="team" class="relative py-24 bg-slate-900 text-slate-300 overflow-hidden scroll-mt-24" x-data="{ activeMember: null }" wire:lazy.1s>
    <!-- Luces ambientales de fondo clínicas -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,_var(--tw-gradient-stops))] from-[#037E93]/15 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <!-- Cabecera de la Sección (Aislada para AOS con wire:ignore) -->
        <div class="text-center mb-16" data-sal="fade" data-sal-duration="800" wire:ignore>
            <div class="inline-flex items-center justify-center gap-2.5 rounded-md bg-[#02B8BC]/10 px-3 py-1 text-xs font-bold uppercase tracking-widest text-[#02B8BC]">
                Team
            </div>
            <h2 class="mt-4 text-3xl md:text-4xl font-extrabold tracking-tight text-white mb-4">
                Meet Our Specialists
            </h2>
            <p class="text-sm sm:text-base text-slate-400 max-w-2xl mx-auto leading-relaxed text-justify">
                Certified professionals committed to your recovery, performance, and long-term wellness.
            </p>
        </div>

        @if(empty($visibleTeamMembers))
            <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-950/40 p-10 text-center shadow-inner shadow-black/10">
                <h3 class="text-xl font-semibold text-white">No team content available yet</h3>
                <p class="mt-3 max-w-sm mx-auto text-sm leading-relaxed text-slate-400">
                    This section is waiting for team member profiles.
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-4 py-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5" wire:key="team-grid">
                @foreach($visibleTeamMembers as $member)
                    <div wire:key="team-member-{{ $member['id'] ?? $loop->index }}"
                         class="group scroll-animate flex min-w-0 flex-col h-full overflow-hidden rounded-3xl border border-slate-800/80 bg-slate-950/40 backdrop-blur-sm transition-all duration-300 hover:-translate-y-1.5 hover:border-[#02B8BC]/30 hover:bg-slate-950/80 hover:shadow-[0_20px_40px_-15px_rgba(14,120,141,0.15)]"
                         data-speed="0.06"
                         data-sal="slide-up"
                         data-sal-delay="{{ 100 + ($loop->index * 100) }}"
                         data-sal-duration="700">

                        <div class="aspect-[3/4] w-full overflow-hidden bg-slate-950 relative border-b border-slate-800/60">
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" width="600" height="800" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" loading="lazy" decoding="async">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
                        </div>

                        <div class="flex flex-col flex-grow p-5">
                            <h3 class="text-lg font-bold text-white tracking-tight group-hover:text-[#02B8BC] transition-colors duration-200">
                                {{ $member['name'] }}
                            </h3>

                            <p class="text-[10px] uppercase tracking-widest font-bold text-[#02B8BC]/90 mt-0.5 mb-3 font-mono">
                                {{ $member['instagram'] ? '@' . ltrim($member['instagram'], '@') : 'Clinical Staff' }}
                            </p>

                            <div class="relative flex-grow">
                                <p class="text-xs sm:text-sm leading-relaxed text-slate-400 text-justify line-clamp-4">
                                    {{ $member['card'] ?? $member['bio'] ?? '' }}
                                </p>

                                <button @click="activeMember = @js($member)"
                                        type="button"
                                        class="mt-3 inline-flex items-center gap-1 text-xs font-bold text-[#02B8BC] hover:text-[#037E93] transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC] rounded">
                                    <span>Read More</span>
                                    <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                </button>
                            </div>

                            @if($member['instagram'] || !empty($member['instagram_url']) || !empty($member['linkedin_url']))
                                <div class="mt-5 pt-4 border-t border-slate-800/60">
                                    <div class="flex items-center justify-center gap-2.5">
                                        @if(!empty($member['instagram_url']))
                                            <a href="{{ $member['instagram_url'] }}"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               aria-label="View {{ $member['name'] }} on Instagram"
                                               class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-700 bg-slate-900 text-[#02B8BC] transition hover:border-[#02B8BC] hover:bg-[#02B8BC]/10 hover:text-white">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2.5a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2ZM12 6.3A5.7 5.7 0 1 1 6.3 12 5.7 5.7 0 0 1 12 6.3Zm0 1.5A4.2 4.2 0 1 0 16.2 12 4.2 4.2 0 0 0 12 7.8Z"/></svg>
                                            </a>
                                        @elseif($member['instagram'])
                                            <a href="https://www.instagram.com/{{ ltrim($member['instagram'], '@') }}/"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               aria-label="View {{ $member['name'] }} on Instagram"
                                               class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-700 bg-slate-900 text-[#02B8BC] transition hover:border-[#02B8BC] hover:bg-[#02B8BC]/10 hover:text-white">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5A4.25 4.25 0 0 0 7.75 20.5h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5A4.25 4.25 0 0 0 16.25 3.5h-8.5Zm8.75 2.5a1.1 1.1 0 1 1 0 2.2 1.1 1.1 0 0 1 0-2.2ZM12 6.3A5.7 5.7 0 1 1 6.3 12 5.7 5.7 0 0 1 12 6.3Zm0 1.5A4.2 4.2 0 1 0 16.2 12 4.2 4.2 0 0 0 12 7.8Z"/></svg>
                                            </a>
                                        @endif

                                        @if(!empty($member['linkedin_url']))
                                            <a href="{{ $member['linkedin_url'] }}"
                                               target="_blank"
                                               rel="noopener noreferrer"
                                               aria-label="View {{ $member['name'] }} on LinkedIn"
                                               class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-700 bg-slate-900 text-[#02B8BC] transition hover:border-[#02B8BC] hover:bg-[#02B8BC]/10 hover:text-white">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.45 20.45h-3.56v-5.57c0-1.33-.03-3.04-1.85-3.04-1.85 0-2.14 1.45-2.14 2.94v5.67H9.34V9h3.42v1.56h.05c.48-.9 1.64-1.85 3.37-1.85 3.6 0 4.27 2.37 4.27 5.46v6.28ZM5.32 7.43a2.07 2.07 0 1 1 0-4.14 2.07 2.07 0 0 1 0 4.14ZM3.54 20.45H7.1V9H3.54v11.45Z"/></svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div x-show="activeMember !== null"
             x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click.self="activeMember = null"
             @keydown.escape.window="activeMember = null"
             class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/80 p-4 backdrop-blur-sm"
             role="dialog"
             aria-modal="true"
             aria-labelledby="team-modal-title"
             x-init="document.body.classList.toggle('overflow-hidden', activeMember !== null); $watch('activeMember', value => document.body.classList.toggle('overflow-hidden', value !== null));">
            <div class="relative w-full max-w-3xl overflow-hidden rounded-3xl border border-slate-700 bg-slate-950 shadow-2xl shadow-black/40">
                <button @click="activeMember = null"
                        type="button"
                        class="absolute right-4 top-4 z-10 inline-flex h-9 w-9 items-center justify-center rounded-full border border-slate-700 bg-slate-900/80 text-slate-200 transition hover:border-[#02B8BC] hover:text-white"
                        aria-label="Close profile details">
                    ×
                </button>

                <div class="grid md:grid-cols-[240px_1fr] md:min-h-[380px]">
                    <div class="relative aspect-[3/4] w-full overflow-hidden bg-slate-900 md:h-full md:aspect-auto">
                        <img x-bind:src="activeMember?.image" x-bind:alt="activeMember?.name || 'Team member'" class="h-full w-full object-cover" loading="lazy" decoding="async">
                    </div>

                    <div class="flex flex-col p-6 md:p-7">
                        <div class="mb-4">
                            <h3 id="team-modal-title" class="text-2xl font-bold text-white" x-text="activeMember?.name || 'Team member'"></h3>
                            <p class="mt-1 text-[11px] uppercase tracking-[0.22em] font-bold text-[#02B8BC]" x-text="activeMember?.instagram ? '@' + activeMember.instagram.replace(/^@/, '') : 'Clinical Staff'"></p>
                        </div>

                        <p class="mb-5 text-sm font-medium text-slate-300" x-text="activeMember?.title || activeMember?.bio || ''"></p>

                        <div class="overflow-y-auto pr-1 text-sm leading-relaxed text-slate-300 text-justify" x-text="activeMember?.bio || activeMember?.specialty || ''"></div>
                    </div>
                </div>
            </div>
        </div>

        @if($totalPages > 1)
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <button type="button"
                        wire:click="previousPage"
                        @class([
                            'inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm font-semibold text-slate-300 transition',
                            'opacity-50 cursor-not-allowed' => $page === 1,
                            'hover:border-[#02B8BC] hover:text-white' => $page > 1,
                        ])
                        @disabled($page === 1)>
                    <span aria-hidden="true">←</span>
                    <span class="ml-2">Previous</span>
                </button>

                <div class="flex items-center gap-2 text-sm text-slate-400">
                    @for($i = 1; $i <= $totalPages; $i++)
                        <button type="button"
                                wire:click="setPage({{ $i }})"
                                aria-label="Go to team page {{ $i }}"
                                @class([
                                    'flex h-9 w-9 items-center justify-center rounded-full border transition',
                                    'border-[#02B8BC] bg-[#02B8BC]/15 text-[#02B8BC]' => $page === $i,
                                    'border-slate-700 bg-slate-950/70 text-slate-400 hover:border-[#02B8BC] hover:text-white' => $page !== $i,
                                ])>
                            {{ $i }}
                        </button>
                    @endfor
                </div>

                <button type="button"
                        wire:click="nextPage"
                        @class([
                            'inline-flex items-center justify-center rounded-full border border-slate-700 bg-slate-950/70 px-4 py-2 text-sm font-semibold text-slate-300 transition',
                            'opacity-50 cursor-not-allowed' => $page === $totalPages,
                            'hover:border-[#02B8BC] hover:text-white' => $page < $totalPages,
                        ])
                        @disabled($page === $totalPages)>
                    <span class="mr-2">Next</span>
                    <span aria-hidden="true">→</span>
                </button>
            </div>
        @endif
    </div>
</section>
