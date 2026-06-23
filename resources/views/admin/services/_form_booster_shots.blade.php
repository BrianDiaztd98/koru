<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <div>
        <label for="name_en" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">English Name</label>
        <input id="name_en" name="name_en" type="text" value="{{ old('name_en', $service->name_en ?? '') }}" required 
               class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @error('name_en')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="name_es" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Spanish Name</label>
        <input id="name_es" name="name_es" type="text" value="{{ old('name_es', $service->name_es ?? '') }}" required 
               class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @error('name_es')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="description_en" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">English Description</label>
        <textarea id="description_en" name="description_en" rows="6" required 
                  class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">{{ old('description_en', $service->description_en ?? '') }}</textarea>
        @error('description_en')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="description_es" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Spanish Description</label>
        <textarea id="description_es" name="description_es" rows="6" required 
                  class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">{{ old('description_es', $service->description_es ?? '') }}</textarea>
        @error('description_es')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="duration" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Duration</label>
        <input id="duration" name="duration" type="text" value="{{ old('duration', $service->duration ?? '') }}" required 
               class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @error('duration')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="price" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400">Price ($)</label>
        <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $service->price ?? '') }}" required 
               class="mt-2 w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
        @error('price')
            <p class="mt-2 text-xs font-semibold text-red-400 font-mono">⚠️ {{ $message }}</p>
        @enderror
    </div>

    <input type="hidden" name="category" value="booster_shots" />

    <div class="lg:col-span-2 mt-2">
        <label class="flex items-center gap-3 cursor-pointer group w-fit select-none">
            <div class="relative">
                <input id="active_status" name="active_status" type="checkbox" value="1" @checked(old('active_status', $service->active_status ?? true)) 
                       class="sr-only peer">
                <div class="h-6 w-11 rounded-full border border-slate-800 bg-slate-950/80 transition-all duration-200 peer-checked:bg-[#0EB3B9]/10 peer-checked:border-[#0EB3B9]/40 group-hover:border-slate-700 peer-checked:group-hover:border-[#0EB3B9]"></div>
                <div class="absolute top-1 left-1 h-4 w-4 rounded-full bg-slate-600 transition-all duration-200 peer-checked:translate-x-5 peer-checked:bg-[#0EB3B9] peer-checked:shadow-md peer-checked:shadow-[#0EB3B9]/40"></div>
            </div>
            <div class="flex flex-col">
                <span class="text-sm font-bold text-slate-200 group-hover:text-white transition-colors">Active Status</span>
                <span class="text-[11px] text-slate-400 font-normal leading-tight">Controls whether this service is viewable on the public frontend carousel.</span>
            </div>
        </label>
    </div>
</div>
