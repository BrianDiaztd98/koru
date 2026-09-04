<x-layouts.app title="Privacy Policy | KORU Center" metaDescription="KORU Center Privacy Policy.">
    <div class="min-h-screen bg-white text-slate-700">
        <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between gap-4">
                <a href="{{ url('/') }}" aria-label="KORU Center home" class="inline-flex rounded-xl transition-opacity hover:opacity-80 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal">
                    <img src="{{ asset('img/logo.png') }}" alt="KORU Center" width="144" height="56" class="h-14 w-auto object-contain" loading="eager" decoding="async">
                </a>
                <a href="{{ url('/') }}" class="text-sm font-semibold text-teal transition hover:text-aqua">&larr; Back to KORU Center</a>
            </div>

            <div class="mt-10 border-b border-slate-200 pb-8">
                <p class="text-xs font-bold uppercase tracking-[0.25em] text-teal">Legal</p>
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-slate-900">Privacy Policy</h1>
                <p class="mt-4 text-sm text-slate-500">Effective date: {{ date('F j, Y') }}</p>
            </div>

            <div class="prose prose-slate mt-10 max-w-none prose-headings:text-slate-900 prose-a:text-teal">
                <p>KORU Center respects your privacy. This policy explains how we collect, use, and protect information when you visit our website, contact us, or submit a registration request.</p>

                <h2>Information we collect</h2>
                <p>We may collect information you provide directly, such as your name, email address, phone number, professional license number, selected course, and message. We may also collect basic technical information, including browser type, device information, and pages visited.</p>

                <h2>How we use information</h2>
                <p>We use information to respond to requests, process course registrations, provide customer support, operate and improve the website, protect against abuse, and comply with legal obligations. We do not sell personal information.</p>

                <h2>Cookies and similar technologies</h2>
                <p>We use necessary technologies to operate the website and may use optional cookies or analytics tools to understand website usage. You can reject optional cookies through the cookie notice shown on the website.</p>

                <h2>Service providers</h2>
                <p>We may use trusted service providers for email delivery, security and bot prevention, website hosting, analytics, and embedded content such as Google Reviews. These providers may process information according to their own privacy policies.</p>

                <h2>Data retention and security</h2>
                <p>We retain information only for as long as reasonably necessary for the purposes described above, unless a longer period is required by law. We use reasonable administrative, technical, and organizational safeguards, but no internet transmission or storage system can be guaranteed completely secure.</p>

                <h2>Your choices</h2>
                <p>You may contact us to ask about personal information we hold, request correction of inaccurate information, or ask questions about this policy. We may need to verify your identity before completing a request.</p>

                <h2>Children's privacy</h2>
                <p>This website is not directed to children under 13, and we do not knowingly collect personal information from children under 13.</p>

                <h2>Changes to this policy</h2>
                <p>We may update this policy from time to time. The effective date above indicates when it was last revised.</p>

                <h2>Contact</h2>
                <p>For privacy questions, contact KORU Center at <a href="mailto:info@korucenters.com">info@korucenters.com</a> or <a href="tel:+17867528054">+1 (786) 752-8054</a>.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
