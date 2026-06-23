<div class="min-h-screen bg-slate-50">
    @include('livewire.components.header', [
        'pillarLabels' => $pillarLabels,
        'locale' => $locale,
        'activePillar' => $activePillar,
    ])

    <main class="overflow-hidden">
        @include('livewire.components.hero-carousel', [
            'localizedSettings' => $localizedSettings,
        ])
        @include('livewire.components.about-us')
        @include('livewire.components.service-pillars', [
            'pillarLabels' => $pillarLabels,
            'activePillar' => $activePillar,
            'servicesByPillar' => $servicesByPillar,
        ])
        @include('livewire.components.iv-bento', [
            'ivDrips' => $ivDrips,
        ])
        @include('livewire.components.booster-shots', [
            'boosterShots' => $boosterShots,
        ])
        @include('livewire.components.packages', [
            'packages' => $packages,
        ])
        @include('livewire.components.education-board', [
            'activeCourses' => $activeCourses,
        ])
        @include('livewire.components.team', [
            'teamMembers' => $teamMembers,
        ])
        @include('livewire.components.testimonials-showcase')
        @include('livewire.components.video-modal')
        @include('livewire.components.clinical-footer')
    </main>
</div>

