<div class="grid gap-6 lg:grid-cols-2">
    <div>
        <label for="name_en" class="block text-sm font-semibold text-navy">English Name</label>
        <input id="name_en" name="name_en" type="text" value="{{ old('name_en', $service->name_en ?? '') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('name_en')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="name_es" class="block text-sm font-semibold text-navy">Spanish Name</label>
        <input id="name_es" name="name_es" type="text" value="{{ old('name_es', $service->name_es ?? '') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('name_es')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="description_en" class="block text-sm font-semibold text-navy">English Description</label>
        <textarea id="description_en" name="description_en" rows="7" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">{{ old('description_en', $service->description_en ?? '') }}</textarea>
        @error('description_en')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="lg:col-span-2">
        <label for="description_es" class="block text-sm font-semibold text-navy">Spanish Description</label>
        <textarea id="description_es" name="description_es" rows="7" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">{{ old('description_es', $service->description_es ?? '') }}</textarea>
        @error('description_es')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="category" class="block text-sm font-semibold text-navy">Category</label>
        <select id="category" name="category" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
            @foreach ($categories as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $service->category ?? 'manual_therapy') === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('category')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="duration" class="block text-sm font-semibold text-navy">Duration</label>
        <input id="duration" name="duration" type="text" value="{{ old('duration', $service->duration ?? '') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('duration')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="price" class="block text-sm font-semibold text-navy">Price</label>
        <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $service->price ?? '') }}" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('price')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="image_path" class="block text-sm font-semibold text-navy">Image Path</label>
        <input id="image_path" name="image_path" type="text" value="{{ old('image_path', $service->image_path ?? '') }}" class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
        @error('image_path')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex items-center gap-3 rounded-3xl border border-slate-200 bg-slate-50 px-5 py-4 lg:col-span-2">
        <input id="active_status" name="active_status" type="checkbox" value="1" @checked(old('active_status', $service->active_status ?? true)) class="h-5 w-5 rounded border-slate-300 text-mint focus:ring-mint">
        <label for="active_status" class="text-sm font-semibold text-navy">Active</label>
    </div>
</div>
