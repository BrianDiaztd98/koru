{{--
    Encabezado estándar de páginas administrativas.
    Uso: @include('livewire.admin.partials.page-header', ['eyebrow' => '...', 'title' => '...', 'description' => '...'])
--}}
<div class="mb-6">
    <p class="font-mono text-xs font-bold uppercase tracking-[0.24em] text-[#02B8BC]">{{ $eyebrow }}</p>
    <h1 class="mt-2 text-3xl font-extrabold text-white tracking-tight">{{ $title }}</h1>
    @if (!empty($description))
        <p class="mt-2.5 max-w-2xl text-sm leading-relaxed text-slate-400">{{ $description }}</p>
    @endif
</div>
