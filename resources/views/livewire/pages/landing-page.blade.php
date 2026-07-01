<div class="flex flex-col min-h-screen bg-[#0b1329]">
    <livewire:components.header :locale="$this->locale" :headerNavItems="$this->headerNavItems" />
    
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
        
        {{-- PRUEBA SOCIAL: Testimonials --}}
        <livewire:components.testimonials-showcase :testimonials="$this->testimonials" />
        
        {{-- OFERTA: Packages --}}
        <livewire:components.packages :packages="$this->packages" :terms="$this->packageTerms" />
        
        {{-- AUTORIDAD ADICIONAL: Team --}}
        <livewire:components.team :teamMembers="$this->teamMembers" />
        
        {{-- EDUCACIÓN: Education Board --}}
        <livewire:components.education-board :activeCourses="$this->activeCourses" />
        
        {{-- CIERRE EMOCIONAL: Video Modal --}}
        <livewire:components.video-modal />
        
        {{-- FOOTER: Contacto y cierre --}}
        <livewire:components.clinical-footer :localizedSettings="$this->localizedSettings" />
    </main>
</div>