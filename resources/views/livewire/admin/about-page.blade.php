<div class="lg:col-span-3">
        <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 items-start">
                <div class="lg:col-span-2 rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-xl shadow-black/20 space-y-6">
                    <div class="flex items-center gap-4 pb-4 border-b border-slate-800/60">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9] border border-[#0EB3B9]/20 shadow-inner">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 3.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white tracking-tight">Edit About Section</h2>
                            <p class="text-sm text-slate-400 mt-0.5">Modify the core copywriting and media structures for the landing page.</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="grid gap-4 lg:grid-cols-2">
                            <label class="block">
                                <span class="text-sm text-slate-300">Title</span>
                                <input wire:model.defer="about.title" type="text" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="About section title" />
                            </label>

                            <label class="block">
                                <span class="text-sm text-slate-300">Subtitle</span>
                                <input wire:model.defer="about.subtitle" type="text" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Optional subtitle" />
                            </label>
                        </div>

                        <label class="block">
                            <span class="text-sm text-slate-300">Description</span>
                            <textarea wire:model.defer="about.description" rows="4" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Longer page description"></textarea>
                        </label>

                        <div class="grid gap-4 lg:grid-cols-2">
                            <label class="block">
                                <span class="text-sm text-slate-300">Philosophy</span>
                                <textarea wire:model.defer="about.philosophy" rows="3" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Philosophy summary"></textarea>
                            </label>

                            <label class="block">
                                <span class="text-sm text-slate-300">Vision</span>
                                <textarea wire:model.defer="about.vision" rows="3" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Vision statement"></textarea>
                            </label>
                        </div>

                        <div class="grid gap-4 lg:grid-cols-2">
                            <label class="block">
                                <span class="text-sm text-slate-300">Feature 1 Title</span>
                                <input wire:model.defer="about.feature_1_title" type="text" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Feature title" />
                            </label>

                            <label class="block">
                                <span class="text-sm text-slate-300">Feature 2 Title</span>
                                <input wire:model.defer="about.feature_2_title" type="text" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Feature title" />
                            </label>
                        </div>

                        <div class="grid gap-4 lg:grid-cols-2">
                            <label class="block">
                                <span class="text-sm text-slate-300">Feature 1 Description</span>
                                <textarea wire:model.defer="about.feature_1_description" rows="3" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Feature description"></textarea>
                            </label>

                            <label class="block">
                                <span class="text-sm text-slate-300">Feature 2 Description</span>
                                <textarea wire:model.defer="about.feature_2_description" rows="3" class="mt-1 block w-full rounded-xl border border-slate-800 bg-slate-950/70 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:ring-[#0EB3B9]" placeholder="Feature description"></textarea>
                            </label>
                        </div>

                        <div class="grid gap-4 lg:grid-cols-3">
                            <label class="block">
                                <span class="text-sm text-slate-300">Image 1</span>
                                <input wire:model="image_1" type="file" accept="image/*" class="mt-1 block w-full text-sm text-white" />
                            </label>
                            <label class="block">
                                <span class="text-sm text-slate-300">Image 2</span>
                                <input wire:model="image_2" type="file" accept="image/*" class="mt-1 block w-full text-sm text-white" />
                            </label>
                            <label class="block">
                                <span class="text-sm text-slate-300">Image 3</span>
                                <input wire:model="image_3" type="file" accept="image/*" class="mt-1 block w-full text-sm text-white" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-6 shadow-xl shadow-black/20 space-y-4">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-[#0EB3B9] font-mono pb-2 border-b border-slate-800/50">Update State</h3>

                        <div class="p-3.5 rounded-xl bg-slate-950/50 border border-slate-800/60 space-y-2 text-xs text-slate-400">
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Created:</span>
                                <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">{{ $about->created_at?->format('Y-m-d') ?? 'Unsaved' }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="font-medium">Last Update:</span>
                                <span class="text-slate-300 font-mono bg-slate-900 px-2 py-0.5 rounded border border-slate-800/80">{{ $about->updated_at?->format('H:i') ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="pt-2 flex flex-col gap-3">
                            <button type="submit" class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0E788D]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182" /></svg>
                                {{ $about->id ? 'Update Changes' : 'Create Record' }}
                            </button>

                            <a href="{{ route('admin.management.index') }}" class="w-full inline-flex items-center justify-center rounded-xl border border-slate-800 bg-slate-950/40 px-5 py-3 text-sm font-semibold text-slate-400 backdrop-blur-sm transition-all duration-200 hover:bg-slate-900/60 hover:border-slate-700 hover:text-slate-200 active:scale-[0.98]">Back to Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
