<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900">
    <main class="flex min-h-screen items-center justify-center px-6 py-12">
        <section class="w-full max-w-md rounded-[2rem] border border-slate-200 bg-white p-8 shadow-xl">
            <p class="text-center text-xs font-semibold uppercase tracking-[0.35em] text-mint">Koru CMS</p>
            <h1 class="mt-3 text-center text-3xl font-bold text-navy">Admin Login</h1>
            <p class="mt-3 text-center text-sm leading-6 text-slate-600">Sign in to manage Koru Center content.</p>

            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <ul class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="mt-8 space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-navy">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-navy">Password</label>
                    <input id="password" name="password" type="password" required class="mt-2 w-full rounded-2xl border border-slate-200 px-4 py-3 outline-none transition focus:border-mint focus:ring-2 focus:ring-mint/20">
                </div>

                <label class="flex items-center gap-3 text-sm font-semibold text-slate-700">
                    <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-slate-300 text-mint focus:ring-mint">
                    Remember this device
                </label>

                <button type="submit" class="w-full rounded-full bg-[#0EB3B9] px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#0EB3B9]/90">
                    Sign in
                </button>
            </form>
        </section>
    </main>
</body>
</html>
