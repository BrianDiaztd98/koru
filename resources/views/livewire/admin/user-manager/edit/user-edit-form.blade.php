<div class="admin-form-panel" x-data="passwordStrength()">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h3 class="text-lg font-semibold text-white">Edit User</h3>
            <p class="text-sm text-slate-400">Update user account details.</p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Back
            </button>
        </div>
    </div>

    <form wire:submit.prevent="save" class="grid gap-5 md:grid-cols-2 mt-6">
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                First Name <span class="text-rose-400">(*)</span>
            </label>
            <input type="text" wire:model.defer="primer_nombre" maxlength="100" class="admin-input" placeholder="First name (max 100 chars)" />
            @error('primer_nombre') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Second Name <span class="text-slate-500">(Optional)</span>
            </label>
            <input type="text" wire:model.defer="segundo_nombre" maxlength="100" class="admin-input" placeholder="Second name (max 100 chars)" />
            @error('segundo_nombre') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Email <span class="text-rose-400">(*)</span>
            </label>
            <input type="email" wire:model.defer="email" maxlength="255" class="admin-input" placeholder="admin@koru.center" />
            @error('email') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Role <span class="text-rose-400">(*)</span>
            </label>
            <select wire:model.defer="role" class="admin-select">
                <option value="admin">Admin</option>
            </select>
            @error('role') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                New Password <span class="text-slate-500">(Leave blank to keep current)</span>
            </label>
            <div class="relative">
                <input type="password"
                       wire:model.defer="password"
                       id="password"
                       @input="$dispatch('password-changed', $event.target.value)"
                       class="admin-input pr-12"
                       placeholder="Min 8 chars, upper, lower, number, symbol" />
                <button type="button"
                        @click="$refs.password.type = $refs.password.type === 'password' ? 'text' : 'password'"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300">
                    <svg x-show="$refs.password.type === 'password'" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <svg x-show="$refs.password.type === 'text'" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7M12 5v.01"/></svg>
                </button>
            </div>

            {{-- Password Strength Indicator --}}
            <div class="mt-3 space-y-2" x-show="password.length > 0" x-transition>
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
                    <div class="flex items-center gap-1.5" :class="{ 'text-emerald-400': checks.includes('uncompromised'), 'text-slate-500': !checks.includes('uncompromised') }">
                        <svg class="h-3.5 w-3.5 shrink-0" :class="{ 'text-emerald-400': checks.includes('uncompromised'), 'text-slate-500': !checks.includes('uncompromised') }" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        <span :class="{ 'text-emerald-400': checks.includes('uncompromised'), 'text-slate-400': !checks.includes('uncompromised') }">Not compromised</span>
                    </div>
                </div>
            </div>

            @error('password')
                <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span>
            @enderror
        </div>

        <div class="md:col-span-2">
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Confirm New Password <span class="text-slate-500">(Required if changing password)</span>
            </label>
            <input type="password" wire:model.defer="password_confirmation" class="admin-input" placeholder="Confirm new password" />
            @error('password_confirmation') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="mb-2 block text-xs font-semibold uppercase tracking-[0.24em] text-slate-400 flex items-center gap-1">
                Status <span class="text-rose-400">(*)</span>
            </label>
            <select wire:model.defer="status" class="admin-select">
                <option value="activo">Active</option>
                <option value="inactivo">Inactive</option>
            </select>
            @error('status') <span class="mt-1.5 block text-xs text-rose-400 font-mono">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2 flex flex-wrap gap-3 pt-2">
            <button type="submit" class="admin-btn-primary">
                Save changes
            </button>
            <button type="button" wire:click="closeForm" class="admin-btn-secondary">
                Discard
            </button>
        </div>
    </form>

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

                    // Check length
                    if (pwd.length >= 8) this.checks.push('length');
                    // Check lowercase
                    if (/[a-z]/.test(pwd)) this.checks.push('lower');
                    // Check uppercase
                    if (/[A-Z]/.test(pwd)) this.checks.push('upper');
                    // Check number
                    if (/[0-9]/.test(pwd)) this.checks.push('number');
                    // Check symbol
                    if (/[^A-Za-z0-9]/.test(pwd)) this.checks.push('symbol');

                    // Calculate strength based on checks passed
                    const checkCount = this.checks.length;
                    if (checkCount <= 1) this.strength = 1;
                    else if (checkCount === 2) this.strength = 2;
                    else if (checkCount === 3) this.strength = 3;
                    else if (checkCount === 4) this.strength = 4;
                    else if (checkCount >= 5) this.strength = 4;

                    // Update strength bar width
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
</div>