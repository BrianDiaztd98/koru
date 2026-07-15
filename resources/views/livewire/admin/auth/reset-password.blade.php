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
                    Koru Core v1.0
                </span>
            </div>

            <div class="mb-6">
                <h1 class="text-xl font-black text-white tracking-tight leading-tight">New password</h1>
                <p class="text-xs text-slate-400 mt-1.5 leading-relaxed">Set a secure password for your administrative
                    account.</p>
            </div>

            @if (session('status'))
                <div
                    class="mb-5 rounded-xl border border-[#0EB3B9]/20 bg-[#0EB3B9]/[0.07] p-3 text-xs text-[#0EB3B9] font-medium flex items-start gap-2.5 animate-fade-in">
                    <svg class="h-4 w-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="leading-relaxed">{{ session('status') }}</span>
                </div>
            @endif

            <form wire:submit="resetPassword" class="space-y-4">
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
                        <input id="email" wire:model="email" type="email" required
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

                <div x-data="passwordStrength()">
                    <label for="password"
                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">New
                        password</label>
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
                            placeholder="Min 8 chars, upper, lower, number & symbol">
                    </div>

                    {{-- Password complexity indicator --}}
                    <div class="mt-3 space-y-2" x-show="password.length > 0" x-cloak x-transition>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 h-1.5 bg-slate-800 rounded-full overflow-hidden">
                                <div x-ref="strengthBar"
                                    class="h-full transition-all duration-300 ease-out rounded-full"
                                    :class="{
                                        'w-1/4 bg-rose-500': strength === 1,
                                        'w-2/4 bg-amber-500': strength === 2,
                                        'w-3/4 bg-lime-500': strength === 3,
                                        'w-full bg-emerald-500': strength === 4
                                    }"
                                    style="width: 0%"></div>
                            </div>
                            <span x-ref="strengthText" class="text-xs font-mono text-slate-500 w-24">Weak</span>
                        </div>

                        <div class="grid grid-cols-2 gap-2 text-[11px]">
                            <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('length'), 'text-slate-500': !checks.includes('length') }">
                                <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('length'), 'text-slate-500': !checks.includes('length') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span :class="{ 'text-emerald-400': checks.includes('length'), 'text-slate-400': !checks.includes('length') }">Min 8 characters</span>
                            </div>
                            <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('lower'), 'text-slate-500': !checks.includes('lower') }">
                                <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('lower'), 'text-slate-500': !checks.includes('lower') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span :class="{ 'text-emerald-400': checks.includes('lower'), 'text-slate-400': !checks.includes('lower') }">Lowercase</span>
                            </div>
                            <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('upper'), 'text-slate-500': !checks.includes('upper') }">
                                <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('upper'), 'text-slate-500': !checks.includes('upper') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span :class="{ 'text-emerald-400': checks.includes('upper'), 'text-slate-400': !checks.includes('upper') }">Uppercase</span>
                            </div>
                            <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('number'), 'text-slate-500': !checks.includes('number') }">
                                <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('number'), 'text-slate-500': !checks.includes('number') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span :class="{ 'text-emerald-400': checks.includes('number'), 'text-slate-400': !checks.includes('number') }">Number</span>
                            </div>
                            <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('symbol'), 'text-slate-500': !checks.includes('symbol') }">
                                <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('symbol'), 'text-slate-500': !checks.includes('symbol') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                <span :class="{ 'text-emerald-400': checks.includes('symbol'), 'text-slate-400': !checks.includes('symbol') }">Special char</span>
        </div>
    </div>
</div>

<script>
    function passwordStrength() {
        return {
            password: '',
            strength: 0,
            checks: [],
            strengthLabels: ['Very Weak', 'Weak', 'Fair', 'Strong', 'Very Strong'],

            init() {
                this.$watch('password', (value) => {
                    this.password = value;
                    this.calculateStrength();
                });
            },

            calculateStrength() {
                const pwd = this.password;
                this.checks = [];

                if (!pwd) {
                    this.strength = 0;
                    return;
                }

                if (pwd.length >= 8) this.checks.push('length');
                if (/[a-z]/.test(pwd)) this.checks.push('lower');
                if (/[A-Z]/.test(pwd)) this.checks.push('upper');
                if (/[0-9]/.test(pwd)) this.checks.push('number');
                if (/[^A-Za-z0-9]/.test(pwd)) this.checks.push('symbol');

                const checkCount = this.checks.length;
                if (checkCount <= 1) this.strength = 1;
                else if (checkCount === 2) this.strength = 2;
                else if (checkCount === 3) this.strength = 3;
                else this.strength = 4;

                this.$nextTick(() => {
                    if (this.$refs.strengthBar) {
                        const widths = ['0%', '25%', '50%', '75%', '100%'];
                        this.$refs.strengthBar.style.width = widths[this.strength] || '0%';
                    }
                    if (this.$refs.strengthText) {
                        this.$refs.strengthText.textContent = this.strengthLabels[this.strength] || 'Weak';
                    }
                });
            }
        }
    }
</script>


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

                <div>
                    <label for="password_confirmation"
                        class="block text-[10px] font-bold uppercase tracking-wider text-slate-400 mb-1.5">Confirm
                        password</label>
                    <div class="relative group">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-500 transition-colors group-focus-within:text-[#0EB3B9]">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input id="password_confirmation" wire:model="password_confirmation" type="password" required
                            class="w-full rounded-lg border border-slate-800/80 bg-slate-950/60 pl-9 pr-3 py-2.5 text-sm text-slate-200 outline-none transition-all duration-200 shadow-inner focus:border-[#0EB3B9] focus:ring-2 focus:ring-[#0EB3B9]/10 placeholder:text-slate-600"
                            placeholder="••••••••">
                    </div>
                    @error('password_confirmation')
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

                        <span wire:loading.remove wire:target="resetPassword"
                            class="flex items-center justify-center gap-1.5">
                            Reset password
                            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5"
                                fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </span>

                        <span wire:loading.flex wire:target="resetPassword"
                            class="hidden items-center justify-center gap-2 font-mono text-[10px] uppercase tracking-wider">
                            <svg class="animate-spin h-3.5 w-3.5 text-white shrink-0" fill="none"
                                viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span>Saving...</span>
                        </span>

                    </button>
                </div>
            </form>

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


