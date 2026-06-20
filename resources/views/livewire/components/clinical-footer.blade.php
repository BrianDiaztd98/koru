<footer id="location" class="bg-white py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2 lg:items-start">
            <div class="space-y-8">
                <div>
                    <h2 class="text-xl font-semibold text-navy">Insurance & Self-Pay</h2>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        We accept a wide range of Florida health plans and also support self-pay clients with clear pricing, payment options, and straightforward intake. Our team can help verify benefits before your visit so you know what to expect.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Accepted plans</h3>

                    <div class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-mint/30 hover:shadow-lg">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-navy/5 text-navy">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 3 5 6v5c0 4.5 2.8 8.2 7 10 4.2-1.8 7-5.5 7-10V6l-7-3Z" />
                                        <path d="m8.5 12 2.25 2.25L16 9" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Aetna</p>
                                    <p class="mt-1 text-sm text-slate-500">Accepted health plan</p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-mint/30 hover:shadow-lg">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-navy/5 text-navy">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M12 3 5 6v5c0 4.5 2.8 8.2 7 10 4.2-1.8 7-5.5 7-10V6l-7-3Z" />
                                        <path d="M12 8v8M8 12h8" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Florida Blue / BCBS</p>
                                    <p class="mt-1 text-sm text-slate-500">Accepted health plan</p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-mint/30 hover:shadow-lg">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-navy/5 text-navy">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78Z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">Cigna</p>
                                    <p class="mt-1 text-sm text-slate-500">Accepted health plan</p>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-mint/30 hover:shadow-lg">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-navy/5 text-navy">
                                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M3 12h18" />
                                        <path d="M12 3c2 2.5 3 5.5 3 9s-1 6.5-3 9" />
                                        <path d="M12 3c-2 2.5-3 5.5-3 9s1 6.5 3 9" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-slate-900">UnitedHealthcare</p>
                                    <p class="mt-1 text-sm text-slate-500">Accepted health plan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative rounded-3xl border border-slate-100 bg-slate-50 p-8 shadow-sm">
                <div class="space-y-6">
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Hours</h3>
                        <p class="mt-3 text-sm text-slate-700">{{ $localizedSettings['hours'] ?? 'Thu-Tue, 8am-8pm' }}</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold uppercase tracking-[0.25em] text-slate-400">Address</h3>
                        <p class="mt-3 text-sm text-slate-700">{{ $localizedSettings['address'] ?? '6405 NW 36th St, #100, Virginia Gardens FL 33166' }}</p>
                    </div>
                </div>

                <div class="mt-8 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm">
                    <iframe class="h-72 w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3585.5573930895296!2d-80.30537858493692!3d25.843712983607492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9bfe9707737ff%3A0x4e652c7d1b1a3c7f!2s6405%20NW%2036th%20St%2C%20Virginia%20Gardens%2C%20FL%2033166!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <a href="https://wa.me/17867528054" target="_blank" class="group absolute right-8 bottom-8 inline-flex items-center gap-3 rounded-full bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-green-700">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white text-green-600 transition group-hover:bg-slate-100">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M16.67 7.33a5.88 5.88 0 0 0-8.34 0l-.6.59A5.88 5.88 0 0 0 6 14.1v1.07c0 .5.4.9.9.9h1.07c1.02 0 2.03-.28 2.92-.82a3.75 3.75 0 0 1 1.89-.52c.7 0 1.39.2 1.99.58l.74.43c.24.14.53.15.78.02.24-.13.39-.38.39-.66v-1.2a5.88 5.88 0 0 0-1.72-4.16Z"/></svg>
                    </span>
                    Chat on WhatsApp
                </a>
            </div>
        </div>
    </div>
</footer>
