<div class="rounded-3xl border border-slate-800/80 bg-slate-950/50 p-6 sm:p-8" wire:key="course-enrollment-form">
    <div class="max-w-2xl">
        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#0EB3B9]">Website registration</p>
        <h3 class="mt-3 text-2xl font-bold tracking-tight text-white">Register for a CE course</h3>
        <p class="mt-3 text-sm leading-relaxed text-slate-400 text-justify">
            Submit your information directly through the website. Our team will contact you with the next enrollment steps.
        </p>
    </div>

    @if ($submitted)
        <div class="mt-6 rounded-2xl border border-emerald-500/20 bg-emerald-500/10 p-5 text-sm text-emerald-200">
            <p class="font-semibold">Thank you. Your registration request has been received.</p>
            <p class="mt-1 text-emerald-300/80">Our team will contact you with the course details.</p>
            <button type="button" wire:click="$set('submitted', false)" class="mt-4 text-xs font-bold uppercase tracking-wider text-emerald-200 underline underline-offset-4">
                Submit another registration
            </button>
        </div>
    @else
        <form wire:submit="submit" class="mt-6 space-y-5">
            <div>
                <label for="ce-course" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Course <span class="text-[#0EB3B9]">(*)</span></label>
                <select id="ce-course" wire:model="course_id" required aria-required="true" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20">
                    @foreach ($courses as $course)
                        <option value="{{ $course['id'] }}">{{ $course['title'] }}{{ isset($course['date']) ? ' - '.$course['date'] : '' }}</option>
                    @endforeach
                </select>
                @error('course_id') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label for="ce-full-name" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Full name <span class="text-[#0EB3B9]">(*)</span></label>
                    <input id="ce-full-name" type="text" wire:model="full_name" autocomplete="name" required aria-required="true" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20" placeholder="Your full name">
                    @error('full_name') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="ce-email" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Email <span class="text-[#0EB3B9]">(*)</span></label>
                    <input id="ce-email" type="email" wire:model="email" autocomplete="email" required aria-required="true" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20" placeholder="you@example.com">
                    @error('email') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label for="ce-phone" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Phone <span class="text-[#0EB3B9]">(*)</span></label>
                <input id="ce-phone" type="tel" wire:model="phone" autocomplete="tel" inputmode="numeric" pattern="[2-9][0-9]{2}[2-9][0-9]{6}" minlength="10" maxlength="10" required aria-required="true" title="Enter a valid 10-digit US phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20" placeholder="3055550123">
                <span class="mt-1 block text-[11px] text-slate-500">Enter 10 digits, for example 3055550123.</span>
                @error('phone') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="ce-license-number" class="block text-xs font-bold uppercase tracking-wider text-slate-400">License number <span class="text-[#0EB3B9]">(*)</span></label>
                <input id="ce-license-number" type="text" wire:model="license_number" autocomplete="off" maxlength="8" required aria-required="true" pattern="MA ?[0-9]{5}" title="Enter your license number in the format MA12345 or MA 12345" oninput="this.value = this.value.toUpperCase().replace(/[^MA0-9 ]/g, '').replace(/\s+/g, ' ').slice(0, 8)" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm uppercase text-white placeholder:text-slate-600 focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20" placeholder="MA 12345">
                <span class="mt-1 block text-[11px] text-slate-500">Format: MA 12345 or MA12345.</span>
                @error('license_number') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="ce-message" class="block text-xs font-bold uppercase tracking-wider text-slate-400">Message <span class="text-slate-500">(Optional)</span></label>
                <textarea id="ce-message" wire:model="message" rows="4" class="mt-2 w-full rounded-xl border border-slate-800 bg-slate-900 px-4 py-3 text-sm text-white placeholder:text-slate-600 focus:border-[#0EB3B9] focus:outline-none focus:ring-2 focus:ring-[#0EB3B9]/20" placeholder="Questions or notes for our team"></textarea>
                @error('message') <span class="mt-1 block text-xs text-rose-300">{{ $message }}</span> @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center justify-center rounded-xl bg-[#0EB3B9] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0E788D] disabled:cursor-wait disabled:opacity-60">
                <span wire:loading.remove>Submit registration</span>
                <span wire:loading>Submitting...</span>
            </button>
        </form>
    @endif
</div>
