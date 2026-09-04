{{-- Alerta de éxito estándar del panel administrativo. --}}
@if (session()->has('success'))
    <div class="mt-4 rounded-xl border border-emerald-500/20 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-300">
        {{ session('success') }}
    </div>
@endif
