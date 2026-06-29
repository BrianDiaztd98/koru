<footer id="location" class="relative overflow-hidden bg-slate-900 text-slate-300">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-[#0E788D]/10 via-slate-900 to-slate-900"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-10 py-16 sm:grid-cols-2 lg:grid-cols-4 lg:py-20">
            
            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-[#0EB3B9]/10 text-[#0EB3B9]">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 2L2 7l10 5 10-5-10-5z" />
                            <path d="M2 17l10 5 10-5" />
                            <path d="M2 12l10 5 10-5" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold tracking-tight text-white">Koru Center</h2>
                </div>
                <p class="text-sm leading-6 text-slate-400">
                    Clinical massage, recovery technology, medical services, and at-home concierge care in Virginia Gardens, Miami.
                </p>
                <div class="space-y-3 pt-2">
                    <h4 class="text-xs font-semibold uppercase tracking-[0.15em] text-slate-500">Follow us</h4>
                    <div class="flex items-center gap-2">
                        @if(!empty($localizedSettings['social_instagram']))
                            <a href="{{ $localizedSettings['social_instagram'] }}" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-800 bg-slate-800/40 text-slate-400 transition hover:border-[#0EB3B9] hover:text-[#0EB3B9] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                                </svg>
                            </a>
                        @endif
                        @if(!empty($localizedSettings['social_facebook']))
                            <a href="{{ $localizedSettings['social_facebook'] }}" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-slate-800 bg-slate-800/40 text-slate-400 transition hover:border-[#0EB3B9] hover:text-[#0EB3B9] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9]">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Contact & Hours</h3>
                <div class="space-y-3.5 text-sm">
                    <a href="tel:+17867528054" aria-label="Call us at {{ $localizedSettings['phone'] ?? '+1 (786) 752-8054' }}" class="group flex items-center gap-3 text-slate-300 transition hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded">
                        <svg class="h-4 w-4 text-[#0EB3B9]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92Z" />
                        </svg>
                        <span class="font-medium group-hover:underline decoration-[#0EB3B9]">{{ $localizedSettings['phone'] ?? '+1 (786) 752-8054' }}</span>
                    </a>
                    
                    <a href="mailto:{{ $localizedSettings['contact_email'] ?? 'info@korucenter.com' }}" aria-label="Send email to {{ $localizedSettings['contact_email'] ?? 'info@korucenter.com' }}" class="group flex items-center gap-3 text-slate-300 transition hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded">
                        <svg class="h-4 w-4 text-[#0EB3B9]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        <span class="font-medium group-hover:underline decoration-[#0EB3B9] text-ellipsis overflow-hidden">{{ $localizedSettings['contact_email'] ?? 'info@korucenter.com' }}</span>
                    </a>

                    <a href="https://wa.me/17867528054" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp" class="group flex items-center gap-3 text-slate-300 transition hover:text-green-400 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-green-500 rounded">
                        <svg class="h-4 w-4 text-green-500 fill-current transition group-hover:scale-110" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.746.953 3.71 1.454 5.709 1.455h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="font-medium group-hover:underline decoration-green-500">Chat on WhatsApp</span>
                    </a>

                    <div class="flex items-start gap-3 border-t border-slate-800/60 pt-3 text-slate-400">
                        <svg class="mt-0.5 h-4 w-4 shrink-0 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <circle cx="12" cy="12" r="9" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider">Schedule</p>
                            <p class="mt-0.5 text-xs font-medium text-slate-300">{{ $localizedSettings['hours'] ?? 'Thu-Tue: 8:00 AM - 8:00 PM (Wed: Closed)' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div>
                    <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Insurance Plans</h3>
                    <p class="mt-2 text-xs leading-5 text-slate-400">We accept major Florida health plans and self-pay alternatives.</p>
                </div>
                <div class="grid grid-cols-1 gap-2 border-t border-slate-800/60 pt-3">
                    @foreach(['Aetna', 'Florida Blue / BCBS', 'Cigna', 'UnitedHealthcare'] as $plan)
                        <div class="flex items-center gap-2 rounded-lg bg-slate-800/30 px-3 py-1.5 text-xs text-slate-300 border border-slate-800/50">
                            <svg class="h-3.5 w-3.5 text-[#0EB3B9]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            </svg>
                            <span class="font-medium text-white">{{ $plan }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-4">
                <h3 class="text-xs font-semibold uppercase tracking-[0.2em] text-slate-400">Our Location</h3>
                <div class="group relative overflow-hidden rounded-xl border border-slate-800 bg-slate-900 shadow-xl transition-all duration-300 hover:border-slate-700">
                    <div class="flex flex-col items-center justify-center h-36 w-full text-center p-4">
                        <svg class="h-8 w-8 text-[#0EB3B9] mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <p class="text-xs text-slate-400 leading-relaxed">
                            {{ $localizedSettings['address'] ?? '6405 NW 36th St, Suite 100, Virginia Gardens, FL 33166' }}
                        </p>
                        <a href="https://www.google.com/maps/dir/?api=1&destination=6405+NW+36th+St,+Virginia+Gardens,+FL+33166" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="mt-3 inline-flex items-center gap-2 rounded-lg bg-slate-800/60 border border-slate-700 px-3 py-1.5 text-xs font-bold text-slate-200 transition hover:bg-[#0EB3B9] hover:border-[#0EB3B9] hover:text-white">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a8 8 0 0 0-8 8c0 5.4 8 12 8 12s8-6.6 8-12a8 8 0 0 0-8-8Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                            Open in Google Maps
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="relative border-t border-slate-800 bg-slate-950/40">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-center text-xs text-slate-500 sm:text-left">
                {{ $localizedSettings['footer_copyright'] ?? '© '.date('Y').' Koru Center. All rights reserved.' }}
            </p>
            <div class="flex gap-4 text-[11px] text-slate-500">
                <a href="#" class="hover:text-slate-400 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded">Privacy Policy</a>
                <a href="#" class="hover:text-slate-400 transition focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#0EB3B9] rounded">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
