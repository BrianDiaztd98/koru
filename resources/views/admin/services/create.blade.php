<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Service</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <div class="min-h-screen">
        @include('admin.partials.topbar', ['title' => 'Create Service'])

        <main class="mx-auto max-w-5xl px-6 py-8">
            <form action="{{ route('admin.services.store') }}" method="POST" class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                @csrf
                @include('admin.services._form')

                <div class="mt-8 flex justify-end gap-3">
                    <a href="{{ route('admin.services.index') }}" class="rounded-full border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-mint hover:text-navy">
                        Cancel
                    </a>
                    <button type="submit" class="rounded-full bg-[#0EB3B9] px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0EB3B9]/90">
                        Save Service
                    </button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
