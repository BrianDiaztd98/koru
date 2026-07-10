<div class="admin-form-panel" x-data="{ 
    charCounts: {
        description: 0,
        philosophy: 0,
        vision: 0,
        feature_1_description: 0,
        feature_2_description: 0
    },
    maxLengths: {
        description: 2000,
        philosophy: 2000,
        vision: 2000,
        feature_1_description: 500,
        feature_2_description: 500
    },
    updateCount(field) {
        this.charCounts[field] = this.$refs[field]?.value?.length || 0;
    }
}">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">Create About Section</h3>
            <p class="text-sm text-slate-400">Configure core copywriting and media structures.</p>
        </div>
    </div>

    <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 items-start">
            
            <div class="lg:col-span-2 rounded-2xl border border-slate-800/80 bg-slate-900/20 backdrop-blur-xl p-6 sm:p-8 shadow-2xl shadow-black/40 space-y-6 relative overflow-hidden">
                
                <div class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#0EB3B9]/40 to-transparent"></div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-slate-800/60">
                    <div class="flex items-center gap-4">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex bg-slate-950/80 p-1 rounded-xl border border-slate-800/80 self-start sm:self-center">
                        <button type="button" @click="activeTab = 'copy'" :class="activeTab === 'copy' ? 'bg-[#0EB3B9]/10 text-[#0EB3B9] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
                            Copy
                        </button>
                        <button type="button" @click="activeTab = 'features'" :class="activeTab === 'features' ? 'bg-[#0EB3B9]/10 text-[#0EB3B9] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
                            Features
                        </button>
                        <button type="button" @click="activeTab = 'media'" :class="activeTab === 'media' ? 'bg-[#0EB3B9]/10 text-[#0EB3B9] border-slate-700/50' : 'text-slate-400 border-transparent'" class="px-3 py-1.5 text-xs font-mono font-bold uppercase rounded-lg border transition-all duration-150">
                            Media
                        </button>
                    </div>
                </div>

                <div x-show="activeTab === 'copy'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="space-y-5">
                    <div class="grid gap-5 lg:grid-cols-2">
                        <div>
                            <label for="title" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1">
                                Title <span class="text-rose-400">(*)</span>
                            </label>
                            <input wire:model="title" id="title" type="text" value="{{ $title }}" maxlength="100" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600" placeholder="Main header title (max 100 chars)" />
                            @error('title') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="subtitle" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1">
                                Subtitle <span class="text-slate-500">(Opcional)</span>
                            </label>
                            <input wire:model="subtitle" id="subtitle" type="text" value="{{ $subtitle }}" maxlength="150" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600" placeholder="Optional sub-heading (max 150 chars)" />
                            @error('subtitle') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 flex items-center gap-1">
                            Corporate Description <span class="text-slate-500">(Opcional)</span>
                        </label>
                        <textarea wire:model="description" id="description" rows="4" x-ref="description" @input="updateCount('description')" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600" placeholder="Primary narrative content... (max 2000 chars)">{{ $description }}</textarea>
                        <div class="mt-1.5 flex justify-between text-xs">
                            <span class="text-slate-500">Optional field</span>
                            <span class="font-mono text-slate-400" x-text="charCounts.description + ' / ' + maxLengths.description"></span>
                        </div>
                        @error('description') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                    </div>

                    <div class="grid gap-5 lg:grid-cols-2 pt-2">
                        <div class="p-4 rounded-xl border border-slate-800/60 bg-slate-950/20">
                            <label for="philosophy" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 text-[#0EB3B9] flex items-center gap-1">
                                Core Philosophy <span class="text-rose-400">(*)</span>
                            </label>
                            <textarea wire:model="philosophy" id="philosophy" rows="4" x-ref="philosophy" @input="updateCount('philosophy')" class="koru-scrollbar max-h-40 w-full overflow-y-auto rounded-xl border border-slate-800 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 focus:border-[#0EB3B9] focus:ring-1 focus:ring-[#0EB3B9]/20 placeholder:text-slate-600" placeholder="Philosophy details... (max 2000 chars)">{{ $philosophy }}</textarea>
                            <div class="mt-1.5 flex justify-between text-xs">
                                <span class="text-slate-500">Required</span>
                                <span class="font-mono text-slate-400" x-text="charCounts.philosophy + ' / ' + maxLengths.philosophy"></span>
                            </div>
                            @error('philosophy') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                        </div>
                        <div class="p-4 rounded-xl border border-slate-800/60 bg-slate-950/20">
                            <label for="vision" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-2 text-[#0EB3B9] flex items-center gap-1">
                                System Vision <span class="text-rose-400">(*)</span>
                            </label>
                            <textarea wire:model="vision" id="vision" rows="4" x-ref="vision" @input="updateCount('vision')" class="koru-scrollbar max-h-40 w-full overflow-y-auto rounded-xl border border-slate-800 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 focus:border-[#0EB3B9] focus:ring-1 focus:ring-[#0EB3B9]/20 placeholder:text-slate-600" placeholder="Vision declaration... (max 2000 chars)">{{ $vision }}</textarea>
                            <div class="mt-1.5 flex justify-between text-xs">
                                <span class="text-slate-500">Required</span>
                                <span class="font-mono text-slate-400" x-text="charCounts.vision + ' / ' + maxLengths.vision"></span>
                            </div>
                            @error('vision') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'features'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="space-y-6">
                    <div class="p-5 rounded-xl border border-slate-800/80 bg-slate-950/30 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-mono font-bold text-[#0EB3B9] uppercase tracking-widest">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9]"></span> Feature Module 01
                        </div>
                        <div class="grid gap-4">
                            <div>
                                <label for="feature_1_title" class="block font-mono text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5 flex items-center gap-1">
                                    Feature 1 Title <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <input wire:model="feature_1_title" id="feature_1_title" type="text" value="{{ $feature_1_title }}" maxlength="80" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Feature name (max 80 chars)" />
                                @error('feature_1_title') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="feature_1_description" class="block font-mono text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5 flex items-center gap-1">
                                    Feature 1 Description <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <textarea wire:model="feature_1_description" id="feature_1_description" rows="2" x-ref="feature_1_description" @input="updateCount('feature_1_description')" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Short explanation... (max 500 chars)">{{ $feature_1_description }}</textarea>
                                <div class="mt-1.5 flex justify-between text-xs">
                                    <span class="text-slate-500">Optional</span>
                                    <span class="font-mono text-slate-400" x-text="charCounts.feature_1_description + ' / ' + maxLengths.feature_1_description"></span>
                                </div>
                                @error('feature_1_description') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="p-5 rounded-xl border border-slate-800/80 bg-slate-950/30 space-y-4">
                        <div class="flex items-center gap-2 text-xs font-mono font-bold text-[#0EB3B9] uppercase tracking-widest">
                            <span class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9]"></span> Feature Module 02
                        </div>
                        <div class="grid gap-4">
                            <div>
                                <label for="feature_2_title" class="block font-mono text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5 flex items-center gap-1">
                                    Feature 2 Title <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <input wire:model="feature_2_title" id="feature_2_title" type="text" value="{{ $feature_2_title }}" maxlength="80" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Feature name (max 80 chars)" />
                                @error('feature_2_title') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="feature_2_description" class="block font-mono text-[11px] font-bold uppercase tracking-wider text-slate-500 mb-1.5 flex items-center gap-1">
                                    Feature 2 Description <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <textarea wire:model="feature_2_description" id="feature_2_description" rows="2" x-ref="feature_2_description" @input="updateCount('feature_2_description')" class="w-full rounded-xl border border-slate-800 bg-slate-950/40 px-4 py-2.5 text-sm text-slate-200 outline-none focus:border-[#0EB3B9]" placeholder="Short explanation... (max 500 chars)">{{ $feature_2_description }}</textarea>
                                <div class="mt-1.5 flex justify-between text-xs">
                                    <span class="text-slate-500">Optional</span>
                                    <span class="font-mono text-slate-400" x-text="charCounts.feature_2_description + ' / ' + maxLengths.feature_2_description"></span>
                                </div>
                                @error('feature_2_description') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div x-show="activeTab === 'media'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2" class="space-y-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        
                        <div class="p-4 rounded-xl border border-slate-800 bg-slate-950/40 flex flex-col justify-between items-center text-center space-y-3">
                            <div class="w-full aspect-[4/3] rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center overflow-hidden relative group">
                                @if ($image_1 && method_exists($image_1, 'temporaryUrl'))
                                    <img src="{{ $image_1->temporaryUrl() }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-xs font-mono text-slate-600 group-hover:text-[#0EB3B9] transition-colors">IMG_01_EMPTY</span>
                                @endif
                            </div>
                            <div class="w-full">
                                <label class="block font-mono text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5 flex items-center gap-1">
                                    Upload Slot A <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <input wire:model="image_1" type="file" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-2.5 file:py-1 file:font-mono file:text-[10px] file:font-bold file:text-[#0EB3B9] cursor-pointer" />
                                <p class="mt-1 text-[10px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
                                @error('image_1') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-800 bg-slate-950/40 flex flex-col justify-between items-center text-center space-y-3">
                            <div class="w-full aspect-[4/3] rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center overflow-hidden relative group">
                                @if ($image_2 && method_exists($image_2, 'temporaryUrl'))
                                    <img src="{{ $image_2->temporaryUrl() }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-xs font-mono text-slate-600 group-hover:text-[#0EB3B9] transition-colors">IMG_02_EMPTY</span>
                                @endif
                            </div>
                            <div class="w-full">
                                <label class="block font-mono text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5 flex items-center gap-1">
                                    Upload Slot B <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <input wire:model="image_2" type="file" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-2.5 file:py-1 file:font-mono file:text-[10px] file:font-bold file:text-[#0EB3B9] cursor-pointer" />
                                <p class="mt-1 text-[10px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
                                @error('image_2') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="p-4 rounded-xl border border-slate-800 bg-slate-950/40 flex flex-col justify-between items-center text-center space-y-3">
                            <div class="w-full aspect-[4/3] rounded-lg bg-slate-900 border border-slate-800 flex items-center justify-center overflow-hidden relative group">
                                @if ($image_3 && method_exists($image_3, 'temporaryUrl'))
                                    <img src="{{ $image_3->temporaryUrl() }}" class="object-cover w-full h-full">
                                @else
                                    <span class="text-xs font-mono text-slate-600 group-hover:text-[#0EB3B9] transition-colors">IMG_03_EMPTY</span>
                                @endif
                            </div>
                            <div class="w-full">
                                <label class="block font-mono text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5 flex items-center gap-1">
                                    Upload Slot C <span class="text-slate-500">(Opcional)</span>
                                </label>
                                <input wire:model="image_3" type="file" accept="image/*" class="w-full text-[11px] text-slate-500 file:mr-2 file:rounded-md file:border-0 file:bg-[#0EB3B9]/10 file:px-2.5 file:py-1 file:font-mono file:text-[10px] file:font-bold file:text-[#0EB3B9] cursor-pointer" />
                                <p class="mt-1 text-[10px] text-slate-600">JPG, PNG, WebP • Max 2MB</p>
                                @error('image_3') <span class="mt-1.5 block text-xs text-rose-400 font-mono">⚡ {{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="space-y-4 lg:sticky lg:top-6">
                <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-4">
                    <div class="flex items-center justify-between pb-2 border-b border-slate-800/50">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono">Update State</h3>
                        <div wire:loading.delay class="text-[10px] font-mono text-[#0EB3B9] animate-pulse uppercase">Syncing...</div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-950/50 border border-slate-800/60 space-y-2 text-xs text-slate-400">
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Created:</span>
                            <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">
                                Unsaved
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-medium">Last Update:</span>
                            <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">
                                N/A
                            </span>
                        </div>
                    </div>

                    <div class="pt-2 flex flex-col gap-3">
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182" />
                            </svg>
                            Publish Core
                        </button>

                        <a href="{{ route('admin.management.index') }}" 
                           class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3 text-sm font-semibold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">
                            Return to Admin
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>