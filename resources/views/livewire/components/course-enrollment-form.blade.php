<div class="relative min-h-screen overflow-hidden bg-[#07151c] text-slate-300 lg:h-screen lg:min-h-0" wire:key="course-enrollment-form">
    @if (config('services.cloudflare.turnstile.site_key'))
        @push('head')
            <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
            <script>
                window.onTurnstileSuccess = (token) => window.dispatchEvent(new CustomEvent('turnstile-token', { detail: token }));
                window.onTurnstileExpired = () => window.dispatchEvent(new CustomEvent('turnstile-token', { detail: '' }));
                window.onTurnstileError = () => window.dispatchEvent(new CustomEvent('turnstile-token', { detail: '' }));
            </script>
        @endpush
    @endif

    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(2,184,188,0.16),_transparent_38%),radial-gradient(circle_at_bottom_right,_rgba(3,126,147,0.16),_transparent_34%)]"></div>
    <div class="pointer-events-none absolute inset-0 opacity-[0.045] [background-image:linear-gradient(rgba(255,255,255,0.8)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.8)_1px,transparent_1px)] [background-size:42px_42px]"></div>

    <div class="relative mx-auto flex min-h-screen max-w-6xl flex-col px-4 py-6 sm:px-6 sm:py-10 lg:h-full lg:min-h-0 lg:px-8 lg:py-3">
        <header class="mb-6 flex items-center justify-between gap-4 sm:mb-8 lg:mb-3">
            <a href="{{ url('/') }}" aria-label="KORU Center home" class="inline-flex rounded-xl transition-opacity hover:opacity-80 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#02B8BC]">
                <img src="{{ asset('img/logo.png') }}" alt="KORU Center" width="144" height="56" class="h-12 w-auto object-contain sm:h-14" loading="eager" decoding="async">
            </a>
            <span class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.22em] text-slate-500">
                <span class="h-1.5 w-1.5 rounded-full bg-[#02B8BC] shadow-[0_0_12px_rgba(2,184,188,0.9)]"></span>
                Professional CE
            </span>
        </header>

        <div class="grid gap-6 lg:min-h-0 lg:flex-1 lg:grid-cols-[0.8fr_1.2fr] lg:items-center lg:gap-8">
            <div class="lg:sticky lg:top-10">
                <p class="text-xs font-bold uppercase tracking-[0.28em] text-[#02B8BC]">Website registration</p>
                <h1 class="mt-3 max-w-xl text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-5xl lg:text-4xl">Reserve your place in continuing education.</h1>
                <p class="mt-3 max-w-md text-sm leading-7 text-slate-400 lg:leading-6">Complete the form and our team will contact you with the next steps for your selected CE course.</p>

                @if (isset($courses[0]))
                    <div class="mt-6 overflow-hidden rounded-2xl border border-[#02B8BC]/25 bg-[#0c2730]/80 shadow-2xl shadow-black/20">
                        <div class="border-b border-white/10 px-5 py-3">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500">Selected course</p>
                            <h2 class="mt-2 text-lg font-bold leading-snug text-white">{{ $courses[0]['title'] }}</h2>
                        </div>
                        <div class="grid grid-cols-2 divide-x divide-white/10 px-5 py-3">
                            @if (isset($courses[0]['date']))
                                <div class="pr-4"><p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Date</p><p class="mt-1 text-sm font-semibold text-slate-200">{{ $courses[0]['date'] }}</p></div>
                            @endif
                            @if (isset($courses[0]['ce_credits']))
                                <div class="pl-4"><p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">Credits</p><p class="mt-1 text-sm font-semibold text-slate-200">{{ $courses[0]['ce_credits'] }} CE</p></div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <div class="rounded-3xl border border-white/10 bg-[#0b2028]/90 p-4 shadow-2xl shadow-black/30 backdrop-blur sm:p-7 lg:p-5">
                @if ($submitted)
                    <div class="flex min-h-[420px] flex-col items-center justify-center text-center">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full border border-emerald-400/30 bg-emerald-400/10 text-emerald-300"><svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" /></svg></div>
                        <h2 class="mt-6 text-2xl font-bold text-white">Registration received</h2>
                        <p class="mt-3 max-w-sm text-sm leading-6 text-slate-400">Thank you. Our team will contact you with the course details.</p>
                        <button type="button" wire:click="$set('submitted', false)" class="mt-8 inline-flex items-center rounded-xl border border-white/15 px-4 py-2.5 text-xs font-bold uppercase tracking-wider text-slate-200 transition hover:border-[#02B8BC] hover:text-[#02B8BC]">Submit another registration</button>
                    </div>
                @else
                    <div class="mb-4 border-b border-white/10 pb-3"><h2 class="text-xl font-bold text-white sm:text-2xl">Tell us about yourself</h2><p class="mt-1 text-sm text-slate-500"><span class="text-[#02B8BC]">*</span> Required fields</p></div>

                    <form wire:submit="submit" class="space-y-4 lg:grid lg:grid-cols-6 lg:gap-x-4 lg:gap-y-2 lg:space-y-0">
                        <div class="lg:col-span-6">
                            <label for="ce-course" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Course <span class="text-[#02B8BC]">*</span></label>
                            <select id="ce-course" wire:model="course_id" required aria-required="true" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20">
                                @foreach ($courses as $course)<option value="{{ $course['id'] }}">{{ $course['title'] }}{{ isset($course['date']) ? ' - '.$course['date'] : '' }}</option>@endforeach
                            </select>
                            @error('course_id') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2 lg:contents">
                            <div class="lg:col-span-3"><label for="ce-first-name" class="block text-xs font-bold uppercase tracking-wider text-slate-400">First name <span class="text-[#02B8BC]">*</span></label><input id="ce-first-name" type="text" wire:model="first_name" autocomplete="given-name" required aria-required="true" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="Your first name">@error('first_name') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror</div>
                            <div class="lg:col-span-3"><label for="ce-last-name" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Last name <span class="text-[#02B8BC]">*</span></label><input id="ce-last-name" type="text" wire:model="last_name" autocomplete="family-name" required aria-required="true" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="Your last name">@error('last_name') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror</div>
                        </div>

                        <div class="lg:col-span-6">
                            <label for="ce-email" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Email <span class="text-[#02B8BC]">*</span></label>
                            <input id="ce-email" type="email" wire:model="email" autocomplete="email" required aria-required="true" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="you@example.com">
                            @error('email') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2 lg:contents">
                            <div class="lg:col-span-3"><label for="ce-phone" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Phone <span class="text-[#02B8BC]">*</span></label><input id="ce-phone" type="tel" wire:model="phone" autocomplete="tel" inputmode="numeric" pattern="[2-9][0-9]{2}[2-9][0-9]{6}" minlength="10" maxlength="10" required aria-required="true" title="Enter a valid 10-digit US phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="3055550123">@error('phone') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror</div>
                            <div class="lg:col-span-3"><label for="ce-license-number" class="block text-xs font-bold uppercase tracking-wider text-slate-400">License number <span class="text-[#02B8BC]">*</span></label><input id="ce-license-number" type="text" wire:model="license_number" autocomplete="off" maxlength="8" required aria-required="true" pattern="MA ?[0-9]{5}" title="Enter your license number in the format MA12345 or MA 12345" oninput="this.value = this.value.toUpperCase().replace(/[^MA0-9 ]/g, '').replace(/\s+/g, ' ').slice(0, 8)" class="mt-1.5 w-full rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm uppercase text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="MA 12345">@error('license_number') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror</div>
                        </div>

                        <div class="lg:col-span-6"><label for="ce-message" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Message <span class="font-normal normal-case tracking-normal text-slate-600">(Optional)</span></label><textarea id="ce-message" wire:model="message" rows="2" maxlength="1000" class="mt-1.5 max-h-24 w-full resize-none overflow-y-auto rounded-xl border border-white/10 bg-[#07171e] px-4 py-2.5 text-sm text-white outline-none transition placeholder:text-slate-600 focus:border-[#02B8BC] focus:ring-2 focus:ring-[#02B8BC]/20" placeholder="Questions or notes for our team"></textarea>@error('message') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror</div>

                        @if (config('services.cloudflare.turnstile.site_key'))
                            <div x-data x-on:turnstile-token.window="$wire.set('turnstile_token', $event.detail)" class="space-y-1 lg:col-span-3">
                                <div wire:ignore>
                                    <div class="cf-turnstile" data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}" data-language="en" data-callback="onTurnstileSuccess" data-expired-callback="onTurnstileExpired" data-error-callback="onTurnstileError"></div>
                                </div>
                                @error('turnstile_token') <span class="block text-xs text-rose-300">{{ $message }}</span> @enderror
                            </div>
                        @endif

                        <button type="submit" wire:loading.attr="disabled" class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#02B8BC] px-5 py-3 text-sm font-bold text-[#052129] shadow-lg shadow-[#02B8BC]/15 transition hover:bg-[#44d7d4] disabled:cursor-wait disabled:opacity-60 lg:col-span-3 lg:mt-5 sm:w-auto lg:justify-self-end">Send request <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14m-6-6 6 6-6 6" /></svg></button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>