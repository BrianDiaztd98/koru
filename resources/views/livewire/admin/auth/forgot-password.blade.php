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
                <h1 class="text-xl font-black text-white tracking-tight leading-tight">Recover access</h1>
                <p class="text-xs text-slate-400 mt-1.5 leading-relaxed">Enter your email and we'll send you a secure
                    link to reset your password.</p>
            </div>

            @if ($sent)
                <div
                    class="mb-5 rounded-xl border border-[#0EB3B9]/20 bg-[#0EB3B9]/[0.07] p-3 text-xs text-[#0EB3B9] font-medium flex items-start gap-2.5 animate-fade-in">
                    <svg class="h-4 w-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="leading-relaxed">We've sent the recovery link to your email. Check your
                        inbox (and spam).</span>
                </div>
            @else
                @if ($errors->has('email') && ! $errors->has(''))
                    <div
                        class="mb-5 rounded-xl border border-rose-500/20 bg-rose-500/[0.07] p-3 text-xs text-rose-400 font-medium flex items-start gap-2.5 animate-fade-in">
                        <svg class="h-4 w-4 shrink-0 text-rose-400 mt-0.5" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                        <span class="leading-relaxed">{{ $errors->first('email') }}</span>
                    </div>
                @endif

                <form wire:submit="sendResetLink" class="space-y-4">
                    <div>
                        <label for="email"
                            class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">Email
                            address</label>
                        <div class="relative group">
                            <div
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500 transition-colors group-focus-within:text-[#0EB3B9]">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
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

                    <div class="pt-1">
                        <button type="submit" wire:loading.attr="disabled"
                            class="group relative w-full h-[40px] inline-flex items-center justify-center rounded-lg bg-[#0EB3B9] px-4 text-sm font-semibold text-white shadow-md shadow-[#0EB3B9]/10 transition-all duration-200 hover:bg-[#0E788D] hover:shadow-[#0EB3B9]/20 active:scale-[0.98] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9] focus:ring-offset-2 focus:ring-offset-slate-900 cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed disabled:active:scale-100">

                            <span wire:loading.remove wire:target="sendResetLink"
                                class="flex items-center justify-center gap-1.5">
                                Send link
                                <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5"
                                    fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                </svg>
                            </span>

                            <span wire:loading.flex wire:target="sendResetLink"
                                class="hidden items-center justify-center gap-2 font-mono text-[10px] uppercase tracking-wider">
                                <svg class="animate-spin h-3.5 w-3.5 text-white shrink-0" fill="none"
                                    viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span>Sending...</span>
                            </span>

                        </button>
                    </div>
                </form>
            @endif

            <div class="mt-5 pt-4 border-t border-slate-800/50 flex items-center justify-center">
                <a href="{{ route('admin.login') }}"
                    class="inline-flex items-center gap-1.5 text-[11px] text-slate-400 hover:text-[#0EB3B9] transition-colors font-medium">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Back to login
                </a>
            </div>
        </div>
    </div>
</div>


