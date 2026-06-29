<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login — Koru CMS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white relative overflow-x-hidden">
    
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.06)_0%,_transparent_40%)] pointer-events-none"></div>
    <div class="absolute top-20 -right-40 w-96 h-96 bg-[#0E788D]/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md">
            <div class="rounded-2xl border border-slate-800/80 bg-slate-900/40 backdrop-blur-xl p-8 shadow-xl shadow-black/20">
                <div class="flex items-center gap-3 mb-6">
                    <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-[0.2em] text-[#0EB3B9] font-mono">
                        Koru CMS
                    </span>
                </div>
                
                <h1 class="text-2xl font-bold text-white mb-2">Administrator Access</h1>
                <p class="text-sm text-slate-400 mb-6">Sign in to manage content and services.</p>

                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-rose-500/30 bg-rose-500/10 px-4 py-3 text-sm text-rose-400">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
                    @csrf
                    
                    <div>
                        <label for="email" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                               class="w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
                    </div>

                    <div>
                        <label for="password" class="block font-mono text-xs font-bold uppercase tracking-wider text-slate-400 mb-1">Password</label>
                        <input id="password" name="password" type="password" required
                               class="w-full rounded-xl border border-slate-800/80 bg-slate-950/60 px-4 py-3 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10">
                    </div>

                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-800 bg-slate-950/60 text-[#0EB3B9] focus:ring-[#0EB3B9]/20">
                        <label for="remember" class="ml-2 text-sm text-slate-400">Remember me</label>
                    </div>

                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>