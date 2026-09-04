<x-layouts.app title="Terms of Service | KORU Center" metaDescription="KORU Center Terms of Service.">
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
                <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-slate-900">Terms of Service</h1>
                <p class="mt-4 text-sm text-slate-500">Effective date: {{ date('F j, Y') }}</p>
            </div>

            <div class="prose prose-slate mt-10 max-w-none prose-headings:text-slate-900 prose-a:text-teal">
                <p>These Terms of Service govern your use of the KORU Center website and online registration tools. By using the website, you agree to these terms.</p>

                <h2>Website use</h2>
                <p>You agree to use this website lawfully and provide accurate information when submitting a request. You may not interfere with the website, attempt unauthorized access, submit malicious content, or use the website to abuse or impersonate another person.</p>

                <h2>Registration requests</h2>
                <p>Submitting an online registration form is a request, not a guarantee of enrollment, availability, or appointment. KORU Center may contact you to confirm details, availability, eligibility, and next steps.</p>

                <h2>Medical information</h2>
                <p>Website content is provided for general informational purposes and is not medical advice, diagnosis, or treatment. Do not use this website for emergencies. Call 911 or contact appropriate emergency services when immediate assistance is needed.</p>

                <h2>Third-party services</h2>
                <p>The website may include links or embedded services operated by third parties, including payment, security, communications, and Google Reviews providers. Their separate terms and privacy policies apply to your use of those services.</p>

                <h2>Intellectual property</h2>
                <p>Unless otherwise stated, website text, branding, design, images, and other content belong to KORU Center or its licensors. You may view the content for personal, non-commercial use. Any other use requires prior written permission.</p>

                <h2>Disclaimer and limitation of liability</h2>
                <p>The website is provided on an "as available" basis. To the extent permitted by law, KORU Center disclaims warranties not expressly stated in these terms and will not be liable for indirect, incidental, or consequential losses arising from website use.</p>

                <h2>Changes and termination</h2>
                <p>We may update these terms or suspend access to the website when necessary. The effective date above identifies the current version. Continued use after an update means you accept the revised terms.</p>

                <h2>Contact</h2>
                <p>Questions about these terms can be sent to <a href="mailto:info@korucenters.com">info@korucenters.com</a> or <a href="tel:+17867528054">+1 (786) 752-8054</a>.</p>
            </div>
        </div>
    </div>
</x-layouts.app>
