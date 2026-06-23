<div class="grid gap-6 lg:grid-cols-2">
    <div class="lg:col-span-2">
        <label for="title" class="block text-sm font-semibold text-navy">Section Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $about->title ?? 'About KORU') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('title')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="philosophy" class="block text-sm font-semibold text-navy">Philosophy (English)</label>
        <textarea id="philosophy" name="philosophy" rows="5" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">{{ old('philosophy', $about->philosophy ?? '') }}</textarea>
        @error('philosophy')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="vision" class="block text-sm font-semibold text-navy">Vision/Mission (English)</label>
        <textarea id="vision" name="vision" rows="5" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">{{ old('vision', $about->vision ?? '') }}</textarea>
        @error('vision')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_1" class="block text-sm font-semibold text-navy">Image 1 (Therapy)</label>
        <input id="image_1" name="image_1" type="file" accept="image/*" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @if(isset($about->image_1) && $about->image_1)
            <div class="mt-3">
                <img src="{{ str_starts_with($about->image_1, 'img/') ? asset($about->image_1) : asset('storage/' . $about->image_1) }}" alt="Image 1" class="h-24 w-24 object-cover rounded-lg border border-slate-300">
                <p class="mt-1 text-xs text-slate-500">Current: {{ $about->image_1 }}</p>
            </div>
        @endif
        @error('image_1')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_2" class="block text-sm font-semibold text-navy">Image 2 (Massage)</label>
        <input id="image_2" name="image_2" type="file" accept="image/*" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @if(isset($about->image_2) && $about->image_2)
            <div class="mt-3">
                <img src="{{ str_starts_with($about->image_2, 'img/') ? asset($about->image_2) : asset('storage/' . $about->image_2) }}" alt="Image 2" class="h-24 w-24 object-cover rounded-lg border border-slate-300">
                <p class="mt-1 text-xs text-slate-500">Current: {{ $about->image_2 }}</p>
            </div>
        @endif
        @error('image_2')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_3" class="block text-sm font-semibold text-navy">Image 3 (Team)</label>
        <input id="image_3" name="image_3" type="file" accept="image/*" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @if(isset($about->image_3) && $about->image_3)
            <div class="mt-3">
                <img src="{{ str_starts_with($about->image_3, 'img/') ? asset($about->image_3) : asset('storage/' . $about->image_3) }}" alt="Image 3" class="h-24 w-24 object-cover rounded-lg border border-slate-300">
                <p class="mt-1 text-xs text-slate-500">Current: {{ $about->image_3 }}</p>
            </div>
        @endif
        @error('image_3')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>