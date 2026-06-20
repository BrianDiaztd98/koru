<section id="team" class="py-24 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up" data-aos-duration="800">
            <div class="inline-flex items-center justify-center gap-3 mb-4">
                <span class="h-1.5 w-16 rounded-full bg-mint"></span>
                <span class="text-sm uppercase tracking-[0.3em] text-mint">Team</span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Meet Our Team</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Certified specialists committed to your recovery and performance.</p>
        </div>

        <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 py-6">
            @foreach($teamMembers as $member)
                <div x-data="{ expanded: false }" class="team-card flex flex-col h-full overflow-hidden rounded-3xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="fade-up" data-aos-delay="{{ 100 + ($loop->index * 100) }}" data-aos-duration="600">
                    <div class="aspect-9/16 w-full overflow-hidden bg-gray-100">
                        <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                    </div>
                    <div class="flex flex-col flex-grow p-6">
                        <h3 class="text-xl font-semibold text-navy mb-1">{{ $member['name'] }}</h3>
                        <p class="text-sm uppercase tracking-[0.3em] font-semibold text-mint mb-4">{{ $member['instagram'] ? '@' . ltrim($member['instagram'], '@') : '' }}</p>
                        <p class="text-sm text-gray-600 mb-6" :class="{ 'line-clamp-3': !expanded }" x-ref="teamDesc">{{ $member['specialty'] }}</p>
                        <button @click="expanded = !expanded" x-show="$refs.teamDesc.scrollHeight > 72" class="mt-2 text-xs font-semibold text-mint hover:underline">
                            <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                        </button>
                        @if($member['instagram'])
                            <a href="https://www.instagram.com/{{ ltrim($member['instagram'], '@') }}/" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center justify-center w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-navy hover:bg-mint hover:text-white transition">
                                View Profile
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="md:hidden py-6">
            <div class="-mx-4 px-4 overflow-x-auto no-scrollbar snap-x snap-mandatory flex gap-4">
                @foreach($teamMembers as $member)
                    <div class="snap-center shrink-0 w-64 sm:w-72 max-w-xs">
                        <div x-data="{ expanded: false }" class="team-card flex flex-col h-full overflow-hidden rounded-3xl bg-white shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100" data-aos="zoom-in" data-aos-delay="{{ 100 + ($loop->index * 80) }}" data-aos-duration="600">
                            <div class="aspect-9/16 w-full overflow-hidden bg-gray-100">
                                <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                            </div>
                            <div class="flex flex-col flex-grow p-5">
                                <h3 class="text-lg font-semibold text-navy mb-1">{{ $member['name'] }}</h3>
                                <p class="text-xs uppercase tracking-[0.3em] font-semibold text-mint mb-3">{{ $member['instagram'] ? '@' . ltrim($member['instagram'], '@') : '' }}</p>
                                <p class="text-sm text-gray-600 mb-5" :class="{ 'line-clamp-3': !expanded }" x-ref="teamDescMobile">{{ $member['specialty'] }}</p>
                                <button @click="expanded = !expanded" x-show="$refs.teamDescMobile.scrollHeight > 72" class="mt-2 text-xs font-semibold text-mint hover:underline">
                                    <span x-text="expanded ? 'Read Less' : 'Read More'"></span>
                                </button>
                                @if($member['instagram'])
                                    <a href="https://www.instagram.com/{{ ltrim($member['instagram'], '@') }}/" target="_blank" rel="noopener noreferrer" class="mt-4 inline-flex items-center justify-center w-full rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-navy hover:bg-mint hover:text-white transition">
                                        View Profile
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>