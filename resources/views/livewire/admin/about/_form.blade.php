<div class="grid gap-6 lg:grid-cols-2">
    <div class="lg:col-span-2">
        <label for="title" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Section Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $about->title ?? 'About KORU') }}" required class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @error('title')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="philosophy" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Philosophy (English)</label>
        <textarea id="philosophy" name="philosophy" rows="5" required class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">{{ old('philosophy', $about->philosophy ?? '') }}</textarea>
        @error('philosophy')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="vision" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Vision/Mission (English)</label>
        <textarea id="vision" name="vision" rows="5" required class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">{{ old('vision', $about->vision ?? '') }}</textarea>
        @error('vision')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_1" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Image 1 (Therapy)</label>
        <input id="image_1" name="image_1" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @if(!empty($about->image_1))
            <div class="mt-3 flex items-center gap-4">
                <div class="w-28 h-20 rounded-lg overflow-hidden border border-slate-800 bg-slate-900 flex items-center justify-center">
                    <img src="{{ str_starts_with($about->image_1, 'img/') ? asset($about->image_1) : asset('storage/' . $about->image_1) }}" alt="Image 1" class="object-cover w-full h-full" />
                </div>
                <div class="text-xs text-[#0EB3B9] font-mono">
                    <div>Current image</div>
                    <div class="text-slate-300 underline font-sans">{{ basename($about->image_1) }}</div>
                </div>
            </div>
        @endif
        @error('image_1')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_2" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Image 2 (Massage)</label>
        <input id="image_2" name="image_2" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @if(!empty($about->image_2))
            <div class="mt-3 flex items-center gap-4">
                <div class="w-28 h-20 rounded-lg overflow-hidden border border-slate-800 bg-slate-900 flex items-center justify-center">
                    <img src="{{ str_starts_with($about->image_2, 'img/') ? asset($about->image_2) : asset('storage/' . $about->image_2) }}" alt="Image 2" class="object-cover w-full h-full" />
                </div>
                <div class="text-xs text-[#0EB3B9] font-mono">
                    <div>Current image</div>
                    <div class="text-slate-300 underline font-sans">{{ basename($about->image_2) }}</div>
                </div>
            </div>
        @endif
        @error('image_2')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_3" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Image 3 (Team)</label>
        <input id="image_3" name="image_3" type="file" accept="image/*" class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @if(!empty($about->image_3))
            <div class="mt-3 flex items-center gap-4">
                <div class="w-28 h-20 rounded-lg overflow-hidden border border-slate-800 bg-slate-900 flex items-center justify-center">
                    <img src="{{ str_starts_with($about->image_3, 'img/') ? asset($about->image_3) : asset('storage/' . $about->image_3) }}" alt="Image 3" class="object-cover w-full h-full" />
                </div>
                <div class="text-xs text-[#0EB3B9] font-mono">
                    <div>Current image</div>
                    <div class="text-slate-300 underline font-sans">{{ basename($about->image_3) }}</div>
                </div>
            </div>
        @endif
        @error('image_3')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>
</div>