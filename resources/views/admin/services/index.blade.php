<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Services</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen">
        @include('admin.partials.topbar', ['title' => 'Services'])

        <div class="mx-auto max-w-7xl px-6 pt-8">
            <a href="{{ route('admin.services.create') }}" class="inline-flex rounded-full bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0EB3B9]/90">
                Create Service
            </a>
        </div>

        <main class="mx-auto max-w-7xl px-6 py-8">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-mint/30 bg-mint/10 px-5 py-4 text-sm font-semibold text-navy">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-navy">Service</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-navy">Category</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-navy">Duration</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-navy">Price</th>
                            <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-[0.25em] text-navy">Status</th>
                            <th class="px-5 py-4 text-right text-xs font-semibold uppercase tracking-[0.25em] text-navy">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($services as $service)
                            <tr class="hover:bg-slate-50">
                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-900">{{ $service->name_en }}</p>
                                    <p class="mt-1 text-sm text-slate-500">{{ $service->slug }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="rounded-full bg-navy/5 px-3 py-1 text-xs font-semibold text-navy">
                                        {{ $service->category }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-600">{{ $service->duration }}</td>
                                <td class="px-5 py-4">
                                    <span class="rounded-full bg-mint/10 px-3 py-1 text-sm font-semibold text-mint">
                                        ${{ number_format($service->price, 2) }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="rounded-full px-3 py-1 text-xs font-semibold {{ $service->active_status ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                        {{ $service->active_status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-3">
                                        <a href="{{ route('admin.services.edit', $service) }}" class="text-sm font-semibold text-mint hover:text-navy">Edit</a>
                                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm font-semibold text-slate-500 hover:text-red-600">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-10 text-center text-slate-500">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $services->links() }}
            </div>
        </main>
    </div>
</body>
</html>
