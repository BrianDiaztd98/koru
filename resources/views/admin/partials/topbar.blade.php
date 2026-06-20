<header class="border-b border-slate-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-mint">Koru CMS</p>
            <h1 class="mt-2 text-2xl font-bold text-navy">{{ $title ?? 'Admin' }}</h1>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm font-semibold text-slate-600">{{ auth()->user()->name }}</span>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-mint hover:text-navy">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
