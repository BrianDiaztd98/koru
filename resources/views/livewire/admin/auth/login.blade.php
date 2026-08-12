<div class="w-full max-w-sm login-container animate-fade-in">
    <div
        class="relative rounded-2xl border border-slate-800/60 bg-slate-900/40 backdrop-blur-2xl p-5 sm:p-6 shadow-2xl shadow-black/40 overflow-hidden mx-2 sm:mx-0 box-border">

        <div
            class="absolute top-0 left-0 right-0 h-[1px] bg-gradient-to-r from-transparent via-[#0EB3B9]/60 to-transparent">
        </div>
        <div class="absolute -top-16 -right-16 w-40 h-40 bg-[#0EB3B9]/[0.03] rounded-full blur-3xl pointer-events-none"></div>
        <div
            class="absolute -bottom-16 -left-16 w-40 h-40 bg-[#0E788D]/[0.03] rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="relative z-10">
            <div class="flex items-center gap-2 mb-5">
                <span
                    class="inline-flex items-center gap-1.5 rounded-full bg-[#0EB3B9]/10 border border-[#0EB3B9]/20 px-2.5 py-0.5 text-[9px] font-bold uppercase tracking-[0.2em] text-[#0EB3B9] font-mono">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#0EB3B9] animate-pulse"></span>
                    KORU Core v1.0
                </span>
            </div>

            <div class="mb-6">
                <h1 class="text-xl font-black text-white tracking-tight leading-tight">Administrator Access</h1>
                <p class="text-xs text-slate-400 mt-1.5 leading-relaxed">Sign in to authorize your management session.
                </p>
            </div>

            @if ($errors->has(''))
                <div class="mb-5 rounded-xl border border-rose-500/20 bg-rose-500/[0.07] p-3 text-xs text-rose-400 font-medium flex items-start gap-2.5 animate-fade-in">
                    <svg class="h-4 w-4 shrink-0 text-rose-400 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <span class="leading-relaxed">{{ $errors->first('') }}</span>
                </div>
            @endif

            <form wire:submit="login" class="space-y-4">
                <div>
                    <label for="email"
                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">Identity /
                        Email</label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500 transition-colors group-focus-within:text-[#0EB3B9]">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        </div>
                        <input id="email" wire:model="email" type="email" required autofocus
                            class="w-full rounded-lg border border-slate-800/80 bg-slate-950/60 pl-9 pr-3 py-2.5 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600"
                            placeholder="admin@koru.center">
                    </div>
                    @error('email')
                        <span class="flex items-center gap-1 text-rose-400 font-mono text-[10px] mt-1.5 pl-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="password"
                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">Security
                        Code</label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500 transition-colors group-focus-within:text-[#0EB3B9]">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <input id="password" wire:model="password" type="password" required
                            class="w-full rounded-lg border border-slate-800/80 bg-slate-950/60 pl-9 pr-3 py-2.5 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <span class="flex items-center gap-1 text-rose-400 font-mono text-[10px] mt-1.5 pl-0.5">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                            </svg>
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="flex items-center justify-between py-0.5">
                    <div class="flex items-center gap-2">
                        <input id="remember" wire:model="remember" type="checkbox"
                            class="h-3.5 w-3.5 rounded border-slate-700 bg-slate-950/80 text-[#0EB3B9] focus:ring-[#0EB3B9]/20 focus:ring-offset-slate-900 cursor-pointer transition-all">
                        <label for="remember"
                            class="text-[11px] text-slate-400 cursor-pointer select-none hover:text-slate-300 transition-colors">Maintain
                            Session</label>
                    </div>

                    <a href="{{ route('admin.password.request') }}"
                        class="text-[11px] text-slate-400 hover:text-[#0EB3B9] transition-colors font-medium focus:outline-none focus:underline">
                        Forgot your password?
                    </a>
                </div>

                <div class="pt-1">
                    <button type="submit" wire:loading.attr="disabled"
                        class="group relative w-full h-[40px] inline-flex items-center justify-center rounded-lg bg-[#0EB3B9] px-4 text-sm font-semibold text-white shadow-md shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0EB3B9]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed disabled:active:scale-100">

                        <!-- Estado Normal: Se oculta limpiamente al cargar -->
                        <span wire:loading.remove wire:target="login" class="flex items-center justify-center gap-1.5">
                            Initialize Session
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5"
                                fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </span>

                        <!-- Estado de Carga: Fuerza el modo flex para alinear horizontalmente el spinner y el texto -->
                        <span wire:loading.flex wire:target="login"
                            class="hidden items-center justify-center gap-2 font-mono text-[10px] uppercase tracking-wider">
                            <svg class="animate-spin h-3.5 w-3.5 text-white shrink-0" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Authenticating...</span>
                        </span>

                    </button>
                </div>
            </form>

            <div class="mt-5 pt-4 border-t border-slate-800/50">
                <p class="text-[10px] text-slate-500 text-center font-mono">
                    Protected by KORU CMS Security Layer
                </p>
            </div>
        </div>
    </div>
</div>



