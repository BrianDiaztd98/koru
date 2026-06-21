<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koru CMS — Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-[#0EB3B9]/30 selection:text-white flex flex-col justify-center relative overflow-hidden">
    
    <!-- Fondos con gradientes ambientales de estilo consola médica -->
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(14,179,185,0.12)_0%,_transparent_50%)] pointer-events-none"></div>
    <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#0E788D]/10 rounded-full blur-3xl pointer-events-none"></div>

    <main class="relative z-10 w-full max-w-md mx-auto px-6 py-12">
        <!-- Tarjeta de Login Premium -->
        <section class="w-full rounded-[2rem] border border-slate-800 bg-slate-900/40 backdrop-blur-xl p-8 sm:p-10 shadow-2xl shadow-black/50">
            
            <!-- Encabezado / Branding -->
            <div class="text-center">
                <span class="inline-flex items-center rounded-md bg-[#0EB3B9]/10 px-3 py-1 text-xs font-bold uppercase tracking-[0.25em] text-[#0EB3B9] font-mono">
                    Koru CMS
                </span>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-white">Admin Login</h1>
                <p class="mt-2.5 text-sm text-slate-400">Sign in to manage Koru Center content.</p>
            </div>

            <!-- Alertas de Error Estilizadas -->
            @if ($errors->any())
                <div class="mt-6 rounded-2xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-400" data-aos="fade-in">
                    <div class="flex gap-2">
                        <svg class="h-5 w-5 shrink-0 text-red-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                        </svg>
                        <ul class="list-disc space-y-1 pl-4 font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <!-- Formulario de Acceso -->
            <form action="{{ route('admin.login') }}" method="POST" class="mt-8 space-y-6" x-data="{ showPassword: false }">
                @csrf

                <!-- Campo: Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold tracking-wide text-slate-300">Email Address</label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus 
                           placeholder="admin@koru.center"
                           class="w-full rounded-2xl border border-slate-800 bg-slate-950/60 px-4 py-3.5 text-sm text-white placeholder-slate-600 outline-none transition-all duration-200 focus:border-[#0EB3B9] focus:ring-4 focus:ring-[#0EB3B9]/10">
                </div>

                <!-- Campo: Password con botón para revelar -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold tracking-wide text-slate-300">Password</label>
                    <div class="relative">
                        <input id="password" 
                               name="password" 
                               :type="showPassword ? 'text' : 'password'" 
                               required 
                               placeholder="••••••••"
                               class="w-full rounded-2xl border border-slate-800 bg-slate-950/60 pl-4 pr-12 py-3.5 text-sm text-white placeholder-slate-600 outline-none transition-all duration-200 focus:border-[#0EB3B9] focus:ring-4 focus:ring-[#0EB3B9]/10">
                        
                        <button type="button" 
                                @click="showPassword = !showPassword" 
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition-colors focus:outline-none">
                            <!-- Icono: Ojo Abierto -->
                            <svg x-show="!showPassword" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                            <!-- Icono: Ojo Cerrado -->
                            <svg x-show="showPassword" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Opciones de sesión -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-3 text-sm font-medium text-slate-400 cursor-pointer select-none group">
                        <input type="checkbox" 
                               name="remember" 
                               value="1" 
                               class="h-4 w-4 rounded border-slate-800 bg-slate-950 text-[#0EB3B9] transition focus:ring-[#0EB3B9] focus:ring-offset-slate-900 focus:ring-offset-2">
                        <span class="group-hover:text-slate-300 transition-colors">Remember this device</span>
                    </label>
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="w-full rounded-xl bg-[#0EB3B9] px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] active:scale-[0.99] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-950">
                    Sign In
                </button>
            </form>
        </section>
    </main>

    <!-- Opcional: Pequeño footer de marca estéril -->
    <footer class="absolute bottom-6 left-1/2 -translate-x-1/2 z-10 text-center w-full">
        <p class="text-xs text-slate-600 tracking-wide">&copy; {{ date('Y') }} Koru Wellness Center. All rights reserved.</p>
    </footer>
</body>
</html>