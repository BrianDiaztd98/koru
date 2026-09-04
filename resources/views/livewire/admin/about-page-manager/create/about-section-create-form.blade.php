<div class="admin-form-panel" x-data="{
    charCounts: {
        description: 0,
        philosophy: 0,
        vision: 0,
        mission: 0,
    },
    maxLengths: {
        description: 2000,
        philosophy: 2000,
        vision: 2000,
        mission: 2000,
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    <div class="flex bg-slate-950/80 p-1 rounded-xl border border-slate-800/80 self-start w-fit">
        <button type="button" @click="activeTab = 'copy'" :class="activeTab === 'copy' ? 'bg-[#02B8BC]/10 text-[#02B8BC] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
            Copy
        </button>
        <button type="button" @click="activeTab = 'glance'" :class="activeTab === 'glance' ? 'bg-[#02B8BC]/10 text-[#02B8BC] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
            At a Glance
        </button>
        <button type="button" @click="activeTab = 'media'" :class="activeTab === 'media' ? 'bg-[#02B8BC]/10 text-[#02B8BC] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
            Media
        </button>
    </div>

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="mt-6">

        <div x-show="activeTab === 'copy'" x-cloak x-transition class="space-y-5">
            <div class="grid gap-5 lg:grid-cols-2">
                <div>
                    <label for="title" class="admin-label">Title <span class="text-rose-400">(*)</span></label>
                    <input wire:model="title" id="title" type="text" value="{{ $title }}" maxlength="100" class="admin-input" placeholder="Main header title (max 100 chars)" />
                    @error('title') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="subtitle" class="admin-label">Subtitle <span class="text-slate-500">(Opcional)</span></label>
                    <input wire:model="subtitle" id="subtitle" type="text" value="{{ $subtitle }}" maxlength="150" class="admin-input" placeholder="Optional sub-heading (max 150 chars)" />
                    @error('subtitle') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="description" class="admin-label">Corporate Description <span class="text-slate-500">(Opcional)</span></label>
                <textarea wire:model="description" id="description" rows="4" x-ref="description" @input="updateCount('description')" class="admin-input" placeholder="Primary narrative content... (max 2000 chars)">{{ $description }}</textarea>
                <div class="mt-1.5 flex justify-between text-xs">
                    <span class="text-slate-500">Optional field</span>
                    <span class="font-mono text-slate-400" x-text="charCounts.description + ' / ' + maxLengths.description"></span>
                </div>
                @error('description') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>

            <div class="grid gap-5 lg:grid-cols-2">
                <div>
                    <label for="philosophy" class="admin-label">Core Philosophy <span class="text-rose-400">(*)</span></label>
                    <textarea wire:model="philosophy" id="philosophy" rows="4" x-ref="philosophy" @input="updateCount('philosophy')" class="koru-scrollbar max-h-40 admin-input" placeholder="Philosophy details... (max 2000 chars)">{{ $philosophy }}</textarea>
                    <div class="mt-1.5 flex justify-between text-xs">
                        <span class="text-slate-500">Required</span>
                        <span class="font-mono text-slate-400" x-text="charCounts.philosophy + ' / ' + maxLengths.philosophy"></span>
                    </div>
                    @error('philosophy') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="vision" class="admin-label">Misión / Visión <span class="text-rose-400">(*)</span></label>
                    <textarea wire:model="vision" id="vision" rows="4" x-ref="vision" @input="updateCount('vision')" class="koru-scrollbar max-h-40 admin-input" placeholder="Misión y visión... (max 2000 chars)">{{ $vision }}</textarea>
                    <div class="mt-1.5 flex justify-between text-xs">
                        <span class="text-slate-500">Required</span>
                        <span class="font-mono text-slate-400" x-text="charCounts.vision + ' / ' + maxLengths.vision"></span>
                    </div>
                    @error('vision') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="mission" class="admin-label">Mission Statement <span class="text-slate-500">(Opcional)</span></label>
                <textarea wire:model="mission" id="mission" rows="4" x-ref="mission" @input="updateCount('mission')" class="koru-scrollbar max-h-40 admin-input" placeholder="Mission statement... (max 2000 chars)">{{ $mission }}</textarea>
                <div class="mt-1.5 flex justify-between text-xs">
                    <span class="text-slate-500">Optional</span>
                    <span class="font-mono text-slate-400" x-text="charCounts.mission + ' / ' + maxLengths.mission"></span>
                </div>
                @error('mission') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
            </div>
        </div>

        <div x-show="activeTab === 'glance'" x-cloak x-transition class="space-y-4">
            <div class="flex items-center justify-between">
                <p class="font-mono text-xs font-bold uppercase tracking-widest text-[#02B8BC]">KORU at a Glance</p>
                <button type="button" wire:click="addGlanceItem" class="inline-flex items-center gap-1.5 rounded-lg border border-[#02B8BC]/30 bg-[#02B8BC]/10 px-3 py-1.5 text-xs font-mono font-bold text-[#02B8BC] transition hover:bg-[#02B8BC]/20">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                    Add Item
                </button>
            </div>

            @foreach($glanceItems as $index => $item)
                <div class="rounded-xl border border-slate-800/60 bg-slate-950/20 p-4 space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-mono font-bold text-slate-500 uppercase tracking-wider">Item #{{ $index + 1 }}</span>
                        @if(count($glanceItems) > 1)
                            <button type="button" wire:click="removeGlanceItem({{ $index }})" class="text-rose-400 hover:text-rose-300 transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg>
                            </button>
                        @endif
                    </div>
                    <div>
                        <label class="admin-label">Title</label>
                        <input wire:model="glanceItems.{{ $index }}.title" type="text" maxlength="80" class="admin-input" placeholder="Item title (max 80 chars)" />
                        @error("glanceItems.{{ $index }}.title") <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="admin-label">Description</label>
                        <textarea wire:model="glanceItems.{{ $index }}.description" rows="2" class="admin-input" placeholder="Short explanation... (max 500 chars)"></textarea>
                        @error("glanceItems.{{ $index }}.description") <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="activeTab === 'media'" x-cloak x-transition>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (range(1, 4) as $slot)
                    @php $upload = ${'image_' . $slot}; @endphp
                    <div class="space-y-2">
                        <div class="flex aspect-[4/3] w-full items-center justify-center overflow-hidden rounded-xl border border-slate-800 bg-slate-950/40">
                            @if ($upload && method_exists($upload, 'temporaryUrl'))
                                <img src="{{ $upload->temporaryUrl() }}" class="h-full w-full object-cover" loading="lazy" decoding="async" fetchpriority="low">
                            @elseif ($about?->{'image_' . $slot})
                                <img src="{{ asset($about->{'image_' . $slot}) }}" class="h-full w-full object-cover" loading="lazy" decoding="async" fetchpriority="low">
                            @else
                                <span class="font-mono text-[10px] uppercase tracking-wider text-slate-600">Empty</span>
                            @endif
                        </div>
                        <label class="admin-label">Image {{ $slot }} <span class="text-slate-500">(Opcional)</span></label>
                        <input wire:model="image_{{ $slot }}" type="file" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:rounded-md file:border-0 file:bg-[#02B8BC]/10 file:px-2.5 file:py-1 file:font-mono file:text-[10px] file:font-bold file:text-[#02B8BC] cursor-pointer" />
                        @error('image_' . $slot) <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
                    </div>
                @endforeach
            </div>
            <p class="mt-2 text-[11px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
        </div>

        <div class="mt-8 flex flex-col gap-4 border-t border-slate-800/60 pt-5 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs text-slate-500">
                Created: <span class="font-mono text-slate-400">{{ $about?->created_at?->diffForHumans() ?? 'Unsaved' }}</span>
                · Last update: <span class="font-mono text-slate-400">{{ $about?->updated_at?->diffForHumans() ?? 'N/A' }}</span>
                <span wire:loading.delay class="ml-2 font-mono text-[10px] uppercase text-[#02B8BC] animate-pulse">Syncing...</span>
            </p>
            <div class="flex flex-wrap gap-3">
                <button type="submit" class="admin-btn-primary">Publish Core</button>
                <a href="{{ route('admin.management.index') }}" class="admin-btn-secondary">Return to Admin</a>
            </div>
        </div>
    </form>
</div>
