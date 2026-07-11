<div class="flex min-h-screen flex-col bg-[#0b1329]" x-data="{ isLoaded: true }">
    @push('head')
        @php
            $firstHero = $this->heroSlides[0]['image'] ?? null;
        @endphp
        @if($firstHero)
            <link rel="preload" as="image" href="{{ $firstHero }}" fetchpriority="high">
        @endif
    @endpush

    <livewire:components.header :headerNavItems="$this->headerNavItems" />

    <main class="flex-1 overflow-x-hidden">
            {{-- HERO: LCP crítico, sin lazy --}}
            <livewire:components.hero-carousel :slides="$this->heroSlides" />

            {{-- AUTORIDAD: About Us temprano --}}
            <livewire:components.about-us :aboutData="$this->aboutData" />

            {{-- NAVEGACIÓN DE SERVICIOS --}}
            <livewire:components.service-pillars
                :pillarLabels="$this->pillarLabels"
                :servicesByPillar="$this->servicesByPillar"
            />

            {{-- SOLUCIÓN PRINCIPAL: IV Bento --}}
            <livewire:components.iv-bento :ivDrips="$this->ivDrips" />

            {{-- SOLUCIÓN COMPLEMENTARIA: Booster Shots --}}
            <livewire:components.booster-shots :boosterShots="$this->boosterShots" />

            {{-- PRUEBA SOCIAL: Testimonials (LAZY) --}}
            <livewire:components.testimonials-showcase :testimonials="$this->testimonials" wire:lazy />

            {{-- OFERTA: Packages (LAZY) --}}
            <livewire:components.packages :packages="$this->packages" :terms="$this->packageTerms" wire:lazy />

            {{-- AUTORIDAD ADICIONAL: Team (LAZY) --}}
            <livewire:components.team :teamMembers="$this->teamMembers" wire:lazy />

            {{-- EDUCACIÓN: Education Board (LAZY) --}}
            <livewire:components.education-board :activeCourses="$this->activeCourses" wire:lazy />

            {{-- CIERRE EMOCIONAL: Video Modal (LAZY) --}}
            <livewire:components.video-modal wire:lazy />

            {{-- FOOTER: Contacto y cierre (LAZY) --}}
            <livewire:components.clinical-footer :localizedSettings="$this->localizedSettings" wire:lazy />
        </main>
    </div>